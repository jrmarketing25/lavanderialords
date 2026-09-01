import { cp, mkdir, rm, readFile, writeFile, access } from "node:fs/promises";
import { fileURLToPath } from "node:url";
import path from "node:path";

const root = path.resolve(path.dirname(fileURLToPath(import.meta.url)), "..");
const output = path.join(root, "dist");

console.log("==================================================");
console.log("  LORD'S LAVANDERIA - Build Estático de Produção");
console.log("==================================================");

// 1. Limpeza e recriação da pasta dist
console.log("1. Limpando diretório dist anterior...");
await rm(output, { recursive: true, force: true });
await mkdir(output, { recursive: true });

// 2. Extração de configurações de includes/config.php
console.log("2. Carregando configurações de includes/config.php...");
const configRaw = await readFile(path.join(root, "includes", "config.php"), "utf8");

const config = {
  APP_NAME: "Lord's Lavanderia",
  APP_TAGLINE: "Cuidado profissional para suas peças, desde 1962",
  APP_DESCRIPTION: "Lord's Lavanderia em Ijuí/RS. Tradição, cuidado e excelência em lavagem de roupas, tapetes, higienização de estofados e passadoria desde 1962.",
  APP_FOUNDATION_YEAR: 1962,
  BASE_URL: "",
  COMPANY_NAME: "Lord's Lavanderia",
  COMPANY_STREET: "Rua Sete de Setembro, 395",
  COMPANY_NEIGHBORHOOD: "Centro",
  COMPANY_CITY: "Ijuí",
  COMPANY_STATE: "RS",
  COMPANY_CEP: "98700-000",
  COMPANY_FULL_ADDRESS: "Rua Sete de Setembro, 395 - Centro, Ijuí - RS",
  PHONE_WHATSAPP_RAW: "5555996633439",
  PHONE_WHATSAPP_DISPLAY: "(55) 99663-3439",
  PHONE_LANDLINE_RAW: "555533321049",
  PHONE_LANDLINE_DISPLAY: "(55) 3332-1049",
  WHATSAPP_LINK: "https://wa.me/5555996633439",
  WHATSAPP_DEFAULT_MSG: "Olá! Gostaria de solicitar um orçamento com a Lord's Lavanderia.",
  INSTAGRAM_HANDLE: "@lavanderialordsijui",
  INSTAGRAM_URL: "https://instagram.com/lavanderialordsijui",
  DEVELOPER_NAME: "Nexar Solutions",
  DEVELOPER_URL: "#",
  GOOGLE_RATING: "4.7",
  nav_links: [
    { label: "Início", url: "index.php", id: "home" },
    { label: "Serviços", url: "#servicos", id: "servicos" },
    { label: "Sobre", url: "#sobre", id: "sobre" },
    { label: "Avaliações", url: "#avaliacoes", id: "avaliacoes" },
    { label: "Contato", url: "#contato", id: "contato" }
  ],
  main_services: [
    {
      id: "lavagem-roupas",
      anchor_id: "servico-lavagem-roupas",
      title: "Lavagem de Roupas",
      description: "Roupas limpas, perfumadas e bem cuidadas. Do dia a dia às peças mais especiais.",
      image: "/assets/images/service-roupas.jpg",
      icon: "hanger",
      iconSrc: "/assets/images/icon-roupas.png"
    },
    {
      id: "lavagem-tapetes",
      anchor_id: "servico-lavagem-tapetes",
      title: "Lavagem de Tapetes",
      description: "Removemos sujeiras, ácaros e odores, preservando as cores e a textura do seu tapete.",
      image: "/assets/images/service-tapetes.jpg",
      icon: "rug",
      iconSrc: "/assets/images/icon-tapetes.png"
    },
    {
      id: "higienizacao-estofados",
      anchor_id: "servico-higienizacao-estofados",
      title: "Higienização de Estofados",
      description: "Mais saúde e bem-estar para sua família com higienização profunda e segura.",
      image: "/assets/images/service-estofados.jpg",
      icon: "sofa",
      iconSrc: "/assets/images/icon-estofados.png"
    },
    {
      id: "passadoria",
      anchor_id: "servico-passadoria",
      title: "Passadoria",
      description: "Acabamento impecável com praticidade para o seu dia a dia. Peças prontas para usar.",
      image: "/assets/images/service-passadoria.jpg",
      icon: "iron",
      iconSrc: "/assets/images/icon-passadoria.png"
    }
  ]
};

// Extrair defines dinâmicos caso existam
const defineRegex = /define\(\s*['"]([^'"]+)['"]\s*,\s*['"]([^'"]*)['"]\s*\)/g;
let match;
while ((match = defineRegex.exec(configRaw)) !== null) {
  config[match[1]] = match[2];
}

const getWhatsAppUrl = (msg) => {
  return "https://wa.me/" + config.PHONE_WHATSAPP_RAW + "?text=" + encodeURIComponent(msg || config.WHATSAPP_DEFAULT_MSG);
};

// 3. Renderizar HTML estático a partir dos templates locais
console.log("3. Processando templates PHP locais e gerando HTML...");

let headerContent = await readFile(path.join(root, "includes", "header.php"), "utf8");
let footerContent = await readFile(path.join(root, "includes", "footer.php"), "utf8");
let indexContent = await readFile(path.join(root, "index.php"), "utf8");

// Dados da página inicial
const pageTitle = "Cuidado profissional para suas peças, desde 1962";
const pageDescription = "Lavagem de roupas, tapetes, estofados e passadoria em Ijuí. Tradição e cuidado desde 1962.";
const currentPage = "home";

// Remover tags PHP do header
headerContent = headerContent.replace(/<\?php[\s\S]*?\?>/, "");

// Processar links de navegação no header
const desktopNav = config.nav_links.map(l => `
                        <li class="nav-item">
                            <a href="${l.url === 'index.php' ? '/' : l.url}" class="nav-link ${currentPage === l.id ? 'active' : ''}">
                                ${l.label}
                            </a>
                        </li>`).join("\n");

const mobileNav = config.nav_links.map(l => `
                            <li class="mobile-nav-item">
                                <a href="${l.url === 'index.php' ? '/' : l.url}" class="mobile-nav-link ${currentPage === l.id ? 'active' : ''}">
                                    ${l.label}
                                </a>
                            </li>`).join("\n");

headerContent = headerContent.replace(
  /<\?php\s+foreach\s*\(\$nav_links\s+as\s+\$link\):[\s\S]*?<\?php\s+endforeach;\s*\?>/,
  desktopNav
);

headerContent = headerContent.replace(
  /<\?php\s+foreach\s*\(\$nav_links\s+as\s+\$link\):[\s\S]*?<\?php\s+endforeach;\s*\?>/,
  mobileNav
);

// Limpar includes do index.php
let bodyContent = indexContent
  .replace(/^<\?php[\s\S]*?include\s+__DIR__\s*\.\s*['"]\/includes\/header\.php['"];\s*\?>/m, "")
  .replace(/<\?php\s+include\s+__DIR__\s*\.\s*['"]\/includes\/footer\.php['"];\s*\?>/g, "");

// Processar loop de serviços no index.php
const servicesHtml = config.main_services.map(s => `
                <article class="service-card" id="${s.anchor_id}">
                    <div class="service-image-wrap">
                        <img src="${s.image}" alt="${s.title}" width="208" height="124" loading="lazy">
                        <span class="service-icon" aria-hidden="true">
                            <img src="${s.iconSrc}" alt="" width="60" height="60" loading="lazy">
                        </span>
                    </div>
                    <div class="service-content">
                        <h3>${s.title}</h3>
                        <p>${s.description}</p>
                        <a href="${getWhatsAppUrl('Olá! Gostaria de saber mais sobre ' + s.title + '.')}" target="_blank" rel="noopener noreferrer">Saiba mais <span>→</span></a>
                    </div>
                </article>`).join("\n");

bodyContent = bodyContent.replace(
  /<\?php\s+foreach\s*\(\$main_services\s+as\s+\$service\):[\s\S]*?<\?php\s+endforeach;\s*\?>/,
  servicesHtml
);

// Montar HTML completo
let fullHtml = headerContent + "\n" + bodyContent + "\n" + footerContent;

// Substituições globais de variáveis e helpers
fullHtml = fullHtml.replace(/<\?php\s+echo\s+htmlspecialchars\(\$page_title\);\s*\?>/g, pageTitle);
fullHtml = fullHtml.replace(/<\?php\s+echo\s+htmlspecialchars\(\$page_description\);\s*\?>/g, pageDescription);
fullHtml = fullHtml.replace(/<\?php\s+echo\s+BASE_URL\s*\?:\s*['"]\/['"];\s*\?>/g, "/");
fullHtml = fullHtml.replace(/<\?php\s+echo\s+BASE_URL;\s*\?>/g, "");
fullHtml = fullHtml.replace(/<\?php\s+echo\s+COMPANY_NAME;\s*\?>/g, config.COMPANY_NAME);
fullHtml = fullHtml.replace(/<\?php\s+echo\s+COMPANY_STREET;\s*\?>/g, config.COMPANY_STREET);
fullHtml = fullHtml.replace(/<\?php\s+echo\s+COMPANY_NEIGHBORHOOD;\s*\?>/g, config.COMPANY_NEIGHBORHOOD);
fullHtml = fullHtml.replace(/<\?php\s+echo\s+COMPANY_CITY;\s*\?>/g, config.COMPANY_CITY);
fullHtml = fullHtml.replace(/<\?php\s+echo\s+COMPANY_STATE;\s*\?>/g, config.COMPANY_STATE);
fullHtml = fullHtml.replace(/<\?php\s+echo\s+COMPANY_CEP;\s*\?>/g, config.COMPANY_CEP);
fullHtml = fullHtml.replace(/<\?php\s+echo\s+PHONE_WHATSAPP_DISPLAY;\s*\?>/g, config.PHONE_WHATSAPP_DISPLAY);
fullHtml = fullHtml.replace(/<\?php\s+echo\s+PHONE_WHATSAPP_RAW;\s*\?>/g, config.PHONE_WHATSAPP_RAW);
fullHtml = fullHtml.replace(/<\?php\s+echo\s+PHONE_LANDLINE_DISPLAY;\s*\?>/g, config.PHONE_LANDLINE_DISPLAY);
fullHtml = fullHtml.replace(/<\?php\s+echo\s+PHONE_LANDLINE_RAW;\s*\?>/g, config.PHONE_LANDLINE_RAW);
fullHtml = fullHtml.replace(/<\?php\s+echo\s+INSTAGRAM_URL;\s*\?>/g, config.INSTAGRAM_URL);
fullHtml = fullHtml.replace(/<\?php\s+echo\s+INSTAGRAM_HANDLE;\s*\?>/g, config.INSTAGRAM_HANDLE);
fullHtml = fullHtml.replace(/<\?php\s+echo\s+GOOGLE_RATING;\s*\?>/g, config.GOOGLE_RATING);
fullHtml = fullHtml.replace(/<\?php\s+echo\s+APP_FOUNDATION_YEAR;\s*\?>/g, String(config.APP_FOUNDATION_YEAR));
fullHtml = fullHtml.replace(/<\?php\s+echo\s+date\('Y'\);\s*\?>/g, String(new Date().getFullYear()));

// Helper de URL do WhatsApp
fullHtml = fullHtml.replace(/<\?php\s+echo\s+get_whatsapp_url\([^)]*\);\s*\?>/g, (match) => {
  const customMatch = match.match(/get_whatsapp_url\(['"]([^'"]+)['"]\)/);
  return getWhatsAppUrl(customMatch ? customMatch[1] : null);
});
fullHtml = fullHtml.replace(/<\?php\s+echo\s+get_whatsapp_url\(\);\s*\?>/g, getWhatsAppUrl());

// Limpar URLs internas
fullHtml = fullHtml.replace(/href="index\.php"/g, 'href="/"');

// Remover quaisquer tags PHP remanescentes
fullHtml = fullHtml.replace(/<\?php[\s\S]*?\?>/g, "");

// Salvar index.html na dist
await writeFile(path.join(output, "index.html"), fullHtml.trim() + "\n", "utf8");
console.log("✓ dist/index.html gerado com sucesso.");

// 4. Copiar Assets
console.log("4. Copiando pasta assets para dist/assets...");
await cp(path.join(root, "assets"), path.join(output, "assets"), { recursive: true });
console.log("✓ dist/assets copiado com sucesso.");

// 5. Copiar arquivos públicos adicionais (robots.txt, sitemap.xml, etc.)
console.log("5. Copiando arquivos públicos...");
const publicFiles = ["robots.txt", "sitemap.xml", "favicon.ico", "manifest.webmanifest"];
for (const file of publicFiles) {
  try {
    await access(path.join(root, file));
    await cp(path.join(root, file), path.join(output, file));
    console.log(`✓ dist/${file} copiado com sucesso.`);
  } catch {
    // Arquivo opcional não existe na raiz, ignorar
  }
}

// 6. Validação Automática de Integridade
console.log("6. Validando arquivos gerados...");

const requiredFiles = [
  path.join(output, "index.html"),
  path.join(output, "assets", "css", "style.css"),
  path.join(output, "assets", "js", "main.js"),
  path.join(output, "assets", "images", "logo.png"),
  path.join(output, "robots.txt"),
  path.join(output, "sitemap.xml")
];

for (const reqFile of requiredFiles) {
  try {
    await access(reqFile);
  } catch {
    throw new Error(`[ERRO DE BUILD] Arquivo obrigatório ausente: ${path.relative(root, reqFile)}`);
  }
}

// 7. Validação de Localhost/127.0.0.1
console.log("7. Verificando ausência de referências a localhost...");
const distHtml = await readFile(path.join(output, "index.html"), "utf8");
if (/localhost|127\.0\.0\.1/i.test(distHtml)) {
  throw new Error("[ERRO DE BUILD] Foram encontradas referências a localhost no HTML final gerado!");
}

console.log("\n==================================================");
console.log("  BUILD CONCLUÍDO COM SUCESSO! Pronto para Vercel.");
console.log("==================================================\n");

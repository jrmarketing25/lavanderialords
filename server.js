const http = require('http');
const fs = require('fs');
const path = require('path');

const PORT = 8000;
const ROOT_DIR = __dirname;

// MIME Types
const MIME_TYPES = {
  '.html': 'text/html; charset=utf-8',
  '.php': 'text/html; charset=utf-8',
  '.css': 'text/css; charset=utf-8',
  '.js': 'application/javascript; charset=utf-8',
  '.svg': 'image/svg+xml',
  '.png': 'image/png',
  '.jpg': 'image/jpeg',
  '.jpeg': 'image/jpeg',
  '.webp': 'image/webp',
  '.json': 'application/json; charset=utf-8',
  '.ico': 'image/x-icon',
};

// Renderizador dos templates PHP do projeto
function renderPhpTemplate(filePath) {
  const headerPath = path.join(ROOT_DIR, 'includes', 'header.php');
  const footerPath = path.join(ROOT_DIR, 'includes', 'footer.php');

  let headerContent = fs.readFileSync(headerPath, 'utf8');
  let footerContent = fs.readFileSync(footerPath, 'utf8');
  let pageContent = fs.readFileSync(filePath, 'utf8');

  // Variáveis extraídas de config.php
  const config = {
    APP_NAME: "Lord's Lavanderia",
    APP_TAGLINE: 'Cuidado profissional para suas peças, desde 1962',
    APP_DESCRIPTION: "Lord's Lavanderia em Ijuí/RS. Tradição, cuidado e excelência em lavagem de roupas, tapetes, higienização de estofados e passadoria desde 1962.",
    APP_FOUNDATION_YEAR: 1962,
    BASE_URL: '',
    COMPANY_NAME: "Lord's Lavanderia",
    COMPANY_STREET: 'Rua Sete de Setembro, 395',
    COMPANY_NEIGHBORHOOD: 'Centro',
    COMPANY_CITY: 'Ijuí',
    COMPANY_STATE: 'RS',
    COMPANY_CEP: '98700-000',
    COMPANY_FULL_ADDRESS: 'Rua Sete de Setembro, 395 - Centro, Ijuí - RS',
    PHONE_WHATSAPP_RAW: '5555996633439',
    PHONE_WHATSAPP_DISPLAY: '(55) 99663-3439',
    PHONE_LANDLINE_RAW: '555533321049',
    PHONE_LANDLINE_DISPLAY: '(55) 3332-1049',
    WHATSAPP_LINK: 'https://wa.me/5555996633439',
    WHATSAPP_DEFAULT_MSG: 'Olá! Gostaria de solicitar um orçamento com a Lord\'s Lavanderia.',
    INSTAGRAM_HANDLE: '@lavanderialordsijui',
    INSTAGRAM_URL: 'https://instagram.com/lavanderialordsijui',
    DEVELOPER_NAME: 'Nexar Solutions',
    DEVELOPER_URL: '#',
    GOOGLE_RATING: '4.7',
    business_hours: {
      weekdays: { label: 'Segunda a Sexta', morning: '09:00 às 12:00', afternoon: '14:00 às 18:00', full: '09:00 às 12:00 | 14:00 às 18:00' },
      saturday: { label: 'Sábado', morning: '09:00 às 12:00', full: '09:00 às 12:00' },
      sunday: { label: 'Domingo', full: 'Fechado' }
    },
    nav_links: [
      { label: 'Início', url: 'index.php', id: 'home' },
      { label: 'Serviços', url: '#servicos', id: 'servicos' },
      { label: 'Sobre', url: '#sobre', id: 'sobre' },
      { label: 'Avaliações', url: '#avaliacoes', id: 'avaliacoes' },
      { label: 'Contato', url: '#contato', id: 'contato' }
    ],
    main_services: [
      {
        id: 'lavagem-roupas',
        anchor_id: 'servico-lavagem-roupas',
        title: 'Lavagem de Roupas',
        description: 'Roupas limpas, perfumadas e bem cuidadas. Do dia a dia às peças mais especiais.',
        image: 'assets/images/service-roupas.jpg',
        icon: 'hanger'
      },
      {
        id: 'lavagem-tapetes',
        anchor_id: 'servico-lavagem-tapetes',
        title: 'Lavagem de Tapetes',
        description: 'Removemos sujeiras, ácaros e odores, preservando as cores e a textura do seu tapete.',
        image: 'assets/images/service-tapetes.jpg',
        icon: 'rug'
      },
      {
        id: 'higienizacao-estofados',
        anchor_id: 'servico-higienizacao-estofados',
        title: 'Higienização de Estofados',
        description: 'Mais saúde e bem-estar para sua família com higienização profunda e segura.',
        image: 'assets/images/service-estofados.jpg',
        icon: 'sofa'
      },
      {
        id: 'passadoria',
        anchor_id: 'servico-passadoria',
        title: 'Passadoria',
        description: 'Acabamento impecável com praticidade para o seu dia a dia. Peças prontas para usar.',
        image: 'assets/images/service-passadoria.jpg',
        icon: 'iron'
      }
    ],
  };

  const get_whatsapp_url = (msg) => {
    return 'https://wa.me/' + config.PHONE_WHATSAPP_RAW + '?text=' + encodeURIComponent(msg || config.WHATSAPP_DEFAULT_MSG);
  };

  // Limpa o bloco <?php do topo do header.php
  headerContent = headerContent.replace(/<\?php[\s\S]*?\?>/, '');
  
  // Limpa o bloco <?php do topo da página e substitui includes
  let bodyContent = pageContent;
  
  // Remove o bloco PHP inicial do index.php que faz os requires e includes do header
  bodyContent = bodyContent.replace(/^<\?php[\s\S]*?include\s+__DIR__\s*\.\s*['"]\/includes\/header\.php['"];\s*\?>/m, '');
  
  // Remove o include do footer no fim da página
  bodyContent = bodyContent.replace(/<\?php\s+include\s+__DIR__\s*\.\s*['"]\/includes\/footer\.php['"];\s*\?>/g, '');

  // Junta Header + Body + Footer
  let fullHtml = headerContent + '\n' + bodyContent + '\n' + footerContent;

  // 1. Processa o loop de cards de serviços na seção #servicos
  const serviceCardTemplate = (service) => {
  const iconMap = {
    hanger: 'assets/images/icon-roupas.png',
    rug:    'assets/images/icon-tapetes.png',
    sofa:   'assets/images/icon-estofados.png',
    iron:   'assets/images/icon-passadoria.png',
  };
  const iconSrc = iconMap[service.icon] || '';

    return `
      <article class="service-card" id="${service.anchor_id}">
        <div class="service-image-wrap">
          <img src="${service.image}" alt="${service.title}" width="208" height="124" loading="lazy">
          <span class="service-icon" aria-hidden="true">
            <img src="${iconSrc}" alt="" width="72" height="72" loading="lazy">
          </span>
        </div>
        <div class="service-content">
          <h3>${service.title}</h3>
          <p>${service.description}</p>
          <a href="${get_whatsapp_url('Olá! Gostaria de mais informações sobre o serviço de ' + service.title + ' da Lord\'s Lavanderia.')}" target="_blank" rel="noopener noreferrer" class="service-link" aria-label="Saiba mais sobre ${service.title}">
            <span>Saiba mais</span>
            <svg class="service-link-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <line x1="5" y1="12" x2="19" y2="12"></line>
              <polyline points="12 5 19 12 12 19"></polyline>
            </svg>
          </a>
        </div>
      </article>
    `;
  };

  const servicesHtml = config.main_services.map(serviceCardTemplate).join('\n');
  fullHtml = fullHtml.replace(/<\?php\s+foreach\s*\(\$main_services\s+as\s+\$service\):[\s\S]*?<\?php\s+endforeach;\s*\?>/, servicesHtml);

  // 2. Processa loop de navegação desktop
  const desktopNavHtml = config.nav_links.map(link => `
    <li class="nav-item">
      <a href="${link.url}" class="nav-link ${link.id === 'home' ? 'active' : ''}">${link.label}</a>
    </li>
  `).join('\n');
  fullHtml = fullHtml.replace(/<\?php\s+foreach\s*\(\$nav_links\s+as\s+\$link\):[\s\S]*?<\/li>\s*<\?php\s+endforeach;\s*\?>/, desktopNavHtml);

  // 3. Processa loop de navegação mobile
  const mobileNavHtml = config.nav_links.map(link => `
    <li class="mobile-nav-item">
      <a href="${link.url}" class="mobile-nav-link ${link.id === 'home' ? 'active' : ''}">${link.label}</a>
    </li>
  `).join('\n');
  fullHtml = fullHtml.replace(/<\?php\s+foreach\s*\(\$nav_links\s+as\s+\$link\):[\s\S]*?<\/li>\s*<\?php\s+endforeach;\s*\?>/, mobileNavHtml);

  // 4. Processa loop de links de navegação no rodapé
  const footerNavHtml = config.nav_links.map(link => `
    <li><a href="${link.url}">${link.label}</a></li>
  `).join('\n');
  fullHtml = fullHtml.replace(/<\?php\s+foreach\s*\(\$nav_links\s+as\s+\$link\):[\s\S]*?<\/li>\s*<\?php\s+endforeach;\s*\?>/, footerNavHtml);

  // 5. Processa loop de links de serviços no rodapé
  const footerServicesHtml = config.main_services.map(s => `
    <li><a href="#${s.anchor_id}">${s.title}</a></li>
  `).join('\n');
  fullHtml = fullHtml.replace(/<\?php\s+foreach\s*\(\$main_services\s+as\s+\$service\):[\s\S]*?<\/li>\s*<\?php\s+endforeach;\s*\?>/, footerServicesHtml);

  // 6. Substituições de funções e variáveis simples
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+get_whatsapp_url\([^)]*\);\s*\?>/g, (match) => {
    const customMatch = match.match(/get_whatsapp_url\(['"]([^'"]+)['"]\)/);
    return get_whatsapp_url(customMatch ? customMatch[1] : null);
  });
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+get_whatsapp_url\(\);\s*\?>/g, get_whatsapp_url());
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+htmlspecialchars\(\$page_title\);\s*\?>/g, "Lavanderia em Ijuí | " + config.COMPANY_NAME);
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+htmlspecialchars\(\$page_description\);\s*\?>/g, "Lavagem de roupas, tapetes, estofados e passadoria em Ijuí. Conheça a tradição da Lord's Lavanderia, desde 1962.");
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+BASE_URL\s*\.\s*\$_SERVER\['REQUEST_URI'\];\s*\?>/g, '/');
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+BASE_URL\s*\?:\s*['"]\/['"];\s*\?>/g, '/');
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+BASE_URL;\s*\?>/g, '');
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+COMPANY_NAME;\s*\?>/g, config.COMPANY_NAME);
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+COMPANY_STREET;\s*\?>/g, config.COMPANY_STREET);
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+COMPANY_NEIGHBORHOOD;\s*\?>/g, config.COMPANY_NEIGHBORHOOD);
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+COMPANY_CITY;\s*\?>/g, config.COMPANY_CITY);
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+COMPANY_STATE;\s*\?>/g, config.COMPANY_STATE);
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+COMPANY_CEP;\s*\?>/g, config.COMPANY_CEP);
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+mb_strtoupper\(COMPANY_CITY\);\s*\?>/g, config.COMPANY_CITY.toUpperCase());
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+PHONE_WHATSAPP_DISPLAY;\s*\?>/g, config.PHONE_WHATSAPP_DISPLAY);
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+PHONE_WHATSAPP_RAW;\s*\?>/g, config.PHONE_WHATSAPP_RAW);
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+PHONE_LANDLINE_DISPLAY;\s*\?>/g, config.PHONE_LANDLINE_DISPLAY);
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+PHONE_LANDLINE_RAW;\s*\?>/g, config.PHONE_LANDLINE_RAW);
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+INSTAGRAM_URL;\s*\?>/g, config.INSTAGRAM_URL);
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+INSTAGRAM_HANDLE;\s*\?>/g, config.INSTAGRAM_HANDLE);
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+DEVELOPER_NAME;\s*\?>/g, config.DEVELOPER_NAME);
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+DEVELOPER_URL;\s*\?>/g, config.DEVELOPER_URL);
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+GOOGLE_RATING;\s*\?>/g, config.GOOGLE_RATING);
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+APP_FOUNDATION_YEAR;\s*\?>/g, config.APP_FOUNDATION_YEAR);
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+date\('Y'\);\s*\?>/g, new Date().getFullYear());
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+\$business_hours\['weekdays'\]\['label'\];\s*\?>/g, config.business_hours.weekdays.label);
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+\$business_hours\['weekdays'\]\['morning'\];\s*\?>/g, config.business_hours.weekdays.morning);
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+\$business_hours\['weekdays'\]\['afternoon'\];\s*\?>/g, config.business_hours.weekdays.afternoon);
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+\$business_hours\['saturday'\]\['label'\];\s*\?>/g, config.business_hours.saturday.label);
  fullHtml = fullHtml.replace(/<\?php\s+echo\s+\$business_hours\['saturday'\]\['morning'\];\s*\?>/g, config.business_hours.saturday.morning);

  // Limpa tags PHP remanescentes
  fullHtml = fullHtml.replace(/<\?php[\s\S]*?\?>/g, '');

  return fullHtml;
}

// Cria o Servidor HTTP
const server = http.createServer((req, res) => {
  let parsedUrl = req.url.split('?')[0];

  if (parsedUrl === '/' || parsedUrl === '') {
    parsedUrl = '/index.php';
  }

  const filePath = path.join(ROOT_DIR, parsedUrl);
  const ext = path.extname(filePath).toLowerCase();

  // Se for PHP ou raiz
  if (ext === '.php' || ext === '') {
    const targetPhp = ext === '.php' ? filePath : filePath + '.php';
    if (fs.existsSync(targetPhp)) {
      try {
        const html = renderPhpTemplate(targetPhp);
        res.writeHead(200, { 'Content-Type': 'text/html; charset=utf-8' });
        res.end(html);
        return;
      } catch (err) {
        res.writeHead(500, { 'Content-Type': 'text/plain; charset=utf-8' });
        res.end('Erro ao processar template PHP: ' + err.message);
        return;
      }
    }
  }

  // Arquivos Estáticos (CSS, JS, Imagens, SVG, etc.)
  if (fs.existsSync(filePath) && fs.statSync(filePath).isFile()) {
    const contentType = MIME_TYPES[ext] || 'application/octet-stream';
    res.writeHead(200, { 'Content-Type': contentType });
    fs.createReadStream(filePath).pipe(res);
    return;
  }

  // 404
  res.writeHead(404, { 'Content-Type': 'text/plain; charset=utf-8' });
  res.end('404 - Arquivo não encontrado');
});

server.listen(PORT, () => {
  console.log(`\n==================================================`);
  console.log(` LORD'S LAVANDERIA - Servidor Local Ativo`);
  console.log(` Acesse no navegador: http://localhost:${PORT}`);
  console.log(`==================================================\n`);
});

<?php
/**
 * Header Template - Lord's Lavanderia
 * Otimizado para SEO Local, GEO Tags, Schema.org e Alta Performance.
 */
if (!defined('APP_NAME')) {
    require_once __DIR__ . '/config.php';
}

$page_title = isset($page_title) ? $page_title : "Lavanderia em Ijuí | " . COMPANY_NAME;
$page_description = isset($page_description) ? $page_description : "Lavagem de roupas, tapetes, estofados e passadoria em Ijuí. Conheça a tradição da Lord's Lavanderia, desde 1962.";
$current_page = isset($current_page) ? $current_page : 'home';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- SEO Primário -->
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?php echo BASE_URL ?: '/'; ?>">

    <!-- Favicon Oficial -->
    <link rel="icon" type="image/svg+xml" href="assets/images/favicon.svg">

    <!-- GEO Tags para SEO Local em Ijuí/RS -->
    <meta name="geo.region" content="BR-RS">
    <meta name="geo.placename" content="<?php echo COMPANY_CITY; ?>">
    <meta name="geo.position" content="-28.38887;-53.91728">
    <meta name="ICBM" content="-28.38887, -53.91728">

    <!-- Open Graph / Redes Sociais -->
    <meta property="og:locale" content="pt_BR">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta property="og:url" content="<?php echo BASE_URL ?: '/'; ?>">
    <meta property="og:site_name" content="<?php echo COMPANY_NAME; ?>">
    <meta property="og:image" content="assets/images/logo.svg">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta name="twitter:image" content="assets/images/logo.svg">

    <!-- Preconnect e Google Fonts: Playfair Display, DM Serif Display & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Estilo Principal -->
    <link rel="stylesheet" href="assets/css/style.css?v=1.1">

    <!-- Schema.org JSON-LD (Negócio Local / DryCleaningOrLaundry em Ijuí/RS) -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "DryCleaningOrLaundry",
      "name": "<?php echo COMPANY_NAME; ?>",
      "image": "assets/images/logo.svg",
      "url": "<?php echo BASE_URL ?: '/'; ?>",
      "telephone": "+55 55 3332-1049",
      "priceRange": "$$",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "<?php echo COMPANY_STREET; ?>",
        "addressLocality": "<?php echo COMPANY_CITY; ?>",
        "addressRegion": "<?php echo COMPANY_STATE; ?>",
        "postalCode": "<?php echo COMPANY_CEP; ?>",
        "addressCountry": "BR"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": -28.38887,
        "longitude": -53.91728
      },
      "openingHoursSpecification": [
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
          "opens": "09:00",
          "closes": "12:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
          "opens": "14:00",
          "closes": "18:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": "Saturday",
          "opens": "09:00",
          "closes": "12:00"
        }
      ],
      "sameAs": [
        "https://www.instagram.com/lavanderialordsijui/"
      ],
      "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "Serviços de Lavanderia",
        "itemListElement": [
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Lavagem de roupas",
              "description": "Cuidado especializado para roupas do dia a dia e peças que exigem atenção especial."
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Passadoria",
              "description": "Suas roupas cuidadosamente passadas e prontas para usar."
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Lavagem de tapetes",
              "description": "Limpeza cuidadosa para remover sujeiras e renovar a aparência dos seus tapetes."
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Higienização de estofados",
              "description": "Higienização profissional para renovar sofás, poltronas, cadeiras e outros estofados."
            }
          }
        ]
      },
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "<?php echo GOOGLE_RATING; ?>",
        "bestRating": "5"
      }
    }
    </script>
</head>
<body>
    <a href="#main-content" class="skip-link">Pular para o conteúdo</a>

    <!-- Cabeçalho Principal -->
    <header class="site-header" id="siteHeader">
        <div class="container header-container">
            <!-- Logo -->
            <a href="index.php" class="header-logo" aria-label="<?php echo COMPANY_NAME; ?> - Página Inicial">
                <img src="assets/images/logo.png?v=2.0" alt="<?php echo COMPANY_NAME; ?> - Desde 1962" width="220" height="118" fetchpriority="high">
            </a>

            <!-- Navegação Desktop -->
            <nav class="site-nav" id="desktopNav" aria-label="Navegação Principal">
                <ul class="nav-list">
                    <?php foreach ($nav_links as $link): ?>
                        <li class="nav-item">
                            <a href="<?php echo htmlspecialchars($link['url']); ?>" class="nav-link <?php echo ($current_page === $link['id']) ? 'active' : ''; ?>">
                                <?php echo htmlspecialchars($link['label']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <!-- Ações / CTA WhatsApp -->
            <div class="header-actions">
                <a href="<?php echo get_whatsapp_url(); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-header-whatsapp" aria-label="Falar no WhatsApp">
                    <svg class="icon-whatsapp" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M20.5 11.5a8.5 8.5 0 0 1-12.6 7.4L3 20.3l1.4-4.7a8.5 8.5 0 1 1 16.1-4.1Z"/>
                        <path d="M8.2 7.8c.2-.4.4-.4.7-.4h.5c.2 0 .3.1.4.4l.7 1.7c.1.2 0 .4-.1.6l-.6.8c-.2.2-.1.4 0 .6.7 1.2 1.7 2.1 3 2.7.3.1.4.1.6-.1l.8-1c.2-.2.4-.2.6-.1l1.8.8c.2.1.3.3.3.5-.1.7-.5 1.4-1.1 1.8-.6.4-1.4.6-2.2.4-1.1-.2-2.6-.8-4.2-2.2-1.3-1.2-2.3-2.8-2.6-3.9-.3-1.1-.1-2 .4-2.6Z"/>
                    </svg>
                    <span>WhatsApp <?php echo PHONE_WHATSAPP_DISPLAY; ?></span>
                </a>

                <!-- Botão Menu Mobile -->
                <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Abrir Menu de Navegação" aria-expanded="false" aria-controls="mobileDrawer">
                    <span class="hamburger-bar"></span>
                    <span class="hamburger-bar"></span>
                    <span class="hamburger-bar"></span>
                </button>
            </div>
        </div>

        <!-- Menu Mobile Drawer -->
        <div class="mobile-drawer" id="mobileDrawer" aria-hidden="true">
            <div class="mobile-drawer-inner">
                <nav class="mobile-nav" aria-label="Navegação Mobile">
                    <ul class="mobile-nav-list">
                        <?php foreach ($nav_links as $link): ?>
                            <li class="mobile-nav-item">
                                <a href="<?php echo htmlspecialchars($link['url']); ?>" class="mobile-nav-link <?php echo ($current_page === $link['id']) ? 'active' : ''; ?>">
                                    <?php echo htmlspecialchars($link['label']); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
                <div class="mobile-drawer-cta">
                    <a href="<?php echo get_whatsapp_url(); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-block">
                        Falar no WhatsApp
                    </a>
                </div>
            </div>
        </div>
        <div class="mobile-backdrop" id="mobileBackdrop"></div>
    </header>

    <main id="main-content">

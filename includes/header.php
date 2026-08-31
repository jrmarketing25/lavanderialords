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
                    <svg class="icon-whatsapp" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91C2.13 13.66 2.59 15.36 3.45 16.86L2.05 22L7.3 20.62C8.75 21.41 10.38 21.83 12.04 21.83C17.5 21.83 21.95 17.38 21.95 11.92C21.95 9.27 20.92 6.78 19.05 4.91C17.18 3.04 14.69 2 12.04 2M12.05 3.67C14.25 3.67 16.31 4.53 17.87 6.09C19.42 7.65 20.28 9.72 20.28 11.92C20.28 16.46 16.59 20.15 12.04 20.15C10.56 20.15 9.11 19.76 7.85 19.01L7.55 18.83L4.43 19.65L5.26 16.61L5.06 16.29C4.24 14.99 3.8 13.47 3.8 11.91C3.81 7.37 7.5 3.67 12.05 3.67M8.53 7.33C8.37 7.33 8.1 7.39 7.87 7.64C7.65 7.89 7.02 8.48 7.02 9.69C7.02 10.9 7.9 12.07 8.02 12.23C8.15 12.39 9.74 14.84 12.18 15.89C14.2 16.77 14.62 16.59 15.07 16.55C15.52 16.51 16.52 15.96 16.73 15.37C16.94 14.78 16.94 14.28 16.88 14.17C16.82 14.07 16.65 14.01 16.4 13.88C16.15 13.76 14.92 13.15 14.69 13.07C14.46 12.98 14.3 12.94 14.13 13.19C13.97 13.44 13.5 14.01 13.36 14.17C13.22 14.34 13.08 14.36 12.83 14.23C12.58 14.11 11.78 13.84 10.83 13C10.09 12.34 9.59 11.53 9.45 11.28C9.31 11.03 9.43 10.9 9.56 10.77C9.67 10.66 9.81 10.48 9.93 10.33C10.06 10.19 10.1 10.08 10.18 9.91C10.27 9.75 10.23 9.6 10.16 9.48C10.1 9.35 9.63 8.2 9.44 7.73C9.25 7.27 9.06 7.33 8.91 7.32C8.78 7.32 8.63 7.33 8.53 7.33Z"/>
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

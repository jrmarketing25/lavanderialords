<?php
/**
 * LORD'S LAVANDERIA - Configurações Gerais e Dados Institucionais
 * Centralização de informações comerciais, SEO, rotas e constantes.
 */

// Configurações do Ambiente
define('APP_NAME', "Lord's Lavanderia");
define('APP_TAGLINE', 'Cuidado profissional para suas peças, desde 1962');
define('APP_DESCRIPTION', "Lord's Lavanderia em Ijuí/RS. Tradição, cuidado e excelência em lavagem de roupas, tapetes, higienização de estofados e passadoria desde 1962.");
define('APP_FOUNDATION_YEAR', 1962);
define('BASE_URL', '');

// Dados de Contato e Localização Real
define('COMPANY_NAME', "Lord's Lavanderia");
define('COMPANY_STREET', 'Rua Sete de Setembro, 395');
define('COMPANY_NEIGHBORHOOD', 'Centro');
define('COMPANY_CITY', 'Ijuí');
define('COMPANY_STATE', 'RS');
define('COMPANY_CEP', '98700-000');
define('COMPANY_FULL_ADDRESS', 'Rua Sete de Setembro, 395 - Centro, Ijuí - RS');

// Telefones e Links de Atendimento
define('PHONE_WHATSAPP_RAW', '5555996633439');
define('PHONE_WHATSAPP_DISPLAY', '(55) 99663-3439');
define('PHONE_LANDLINE_RAW', '555533321049');
define('PHONE_LANDLINE_DISPLAY', '(55) 3332-1049');
define('WHATSAPP_LINK', 'https://wa.me/5555996633439');
define('WHATSAPP_DEFAULT_MSG', 'Olá! Gostaria de solicitar um orçamento com a Lord\'s Lavanderia.');

// Redes Sociais
define('INSTAGRAM_HANDLE', '@lavanderialordsijui');
define('INSTAGRAM_URL', 'https://instagram.com/lavanderialordsijui');

// Créditos de Desenvolvimento
define('DEVELOPER_NAME', 'Nexar Solutions');
define('DEVELOPER_URL', '#');

// Avaliações Reais
define('GOOGLE_RATING', '4.7');

// Horários de Atendimento Provisórios
$business_hours = [
    'weekdays' => [
        'label' => 'Segunda a Sexta',
        'morning' => '09:00 às 12:00',
        'afternoon' => '14:00 às 18:00',
        'full' => '09:00 às 12:00 | 14:00 às 18:00'
    ],
    'saturday' => [
        'label' => 'Sábado',
        'morning' => '09:00 às 12:00',
        'full' => '09:00 às 12:00'
    ],
    'sunday' => [
        'label' => 'Domingo',
        'full' => 'Fechado'
    ]
];

// Serviços Oficiais Oferecidos
$main_services = [
    [
        'id' => 'lavagem-roupas',
        'anchor_id' => 'servico-lavagem-roupas',
        'title' => 'Lavagem de Roupas',
        'description' => 'Roupas limpas, perfumadas e bem cuidadas. Do dia a dia às peças mais especiais.',
        'image' => 'assets/images/service-roupas.jpg',
        'icon' => 'hanger'
    ],
    [
        'id' => 'lavagem-tapetes',
        'anchor_id' => 'servico-lavagem-tapetes',
        'title' => 'Lavagem de Tapetes',
        'description' => 'Removemos sujeiras, ácaros e odores, preservando as cores e a textura do seu tapete.',
        'image' => 'assets/images/service-tapetes.jpg',
        'icon' => 'rug'
    ],
    [
        'id' => 'higienizacao-estofados',
        'anchor_id' => 'servico-higienizacao-estofados',
        'title' => 'Higienização de Estofados',
        'description' => 'Mais saúde e bem-estar para sua família com higienização profunda e segura.',
        'image' => 'assets/images/service-estofados.jpg',
        'icon' => 'sofa'
    ],
    [
        'id' => 'passadoria',
        'anchor_id' => 'servico-passadoria',
        'title' => 'Passadoria',
        'description' => 'Acabamento impecável com praticidade para o seu dia a dia. Peças prontas para usar.',
        'image' => 'assets/images/service-passadoria.jpg',
        'icon' => 'iron'
    ]
];

// Links de Navegação Principal
$nav_links = [
    ['label' => 'Início', 'url' => 'index.php', 'id' => 'home'],
    ['label' => 'Serviços', 'url' => '#servicos', 'id' => 'servicos'],
    ['label' => 'Sobre', 'url' => '#sobre', 'id' => 'sobre'],
    ['label' => 'Avaliações', 'url' => '#avaliacoes', 'id' => 'avaliacoes'],
    ['label' => 'Contato', 'url' => '#contato', 'id' => 'contato'],
];

/**
 * Retorna URL completa para o WhatsApp com mensagem formatada
 */
function get_whatsapp_url($custom_msg = null) {
    $msg = $custom_msg ? urlencode($custom_msg) : urlencode(WHATSAPP_DEFAULT_MSG);
    return 'https://wa.me/' . PHONE_WHATSAPP_RAW . '?text=' . $msg;
}


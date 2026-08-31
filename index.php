<?php
require_once __DIR__ . '/includes/config.php';

$page_title = "Cuidado profissional para suas peças, desde 1962";
$page_description = "Lavagem de roupas, tapetes, estofados e passadoria em Ijuí. Tradição e cuidado desde 1962.";
$current_page = 'home';

include __DIR__ . '/includes/header.php';
?>

<section class="hero-section" id="hero" aria-labelledby="hero-title">
    <div class="hero-grid">
        <div class="hero-content">
            <div class="hero-crown" aria-hidden="true">♛</div>
            <h1 class="hero-title" id="hero-title">Cuidado profissional<br>para suas peças,<br><span>desde 1962.</span></h1>
            <p class="hero-description">Lavagem de roupas, tapetes, estofados e passadoria com excelência em Ijuí. Mais de 60 anos de tradição, cuidado e confiança que se sente em cada detalhe.</p>
            <div class="hero-actions">
                <a href="<?php echo get_whatsapp_url(); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-hero-primary">
                    <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M21 11.5a8.4 8.4 0 0 1-9 8.4 8.8 8.8 0 0 1-3.7-.9L3 20.5l1.5-5.1a8.5 8.5 0 1 1 16.5-3.9Z"/><path d="M8.2 7.8c.2-.4.4-.4.7-.4h.5c.2 0 .3.1.4.4l.7 1.7c.1.2 0 .4-.1.6l-.6.8c-.2.2-.1.4 0 .6.7 1.2 1.7 2.1 3 2.7.3.1.4.1.6-.1l.8-1c.2-.2.4-.2.6-.1l1.8.8c.2.1.3.3.3.5-.1.7-.5 1.4-1.1 1.8-.6.4-1.4.6-2.2.4-1.1-.2-2.6-.8-4.2-2.2-1.3-1.2-2.3-2.8-2.6-3.9-.3-1.1-.1-2 .4-2.6Z"/></svg>
                    Falar no WhatsApp
                </a>
                <a href="#servicos" class="btn btn-hero-secondary">Conhecer Serviços <span aria-hidden="true">›</span></a>
            </div>
        </div>
        <div class="hero-visual"><img src="assets/images/hero-photo.jpg" alt="Toalhas cuidadosamente dobradas na Lord's Lavanderia" width="1024" height="768" fetchpriority="high"></div>
    </div>

    <div class="trust-bar" aria-label="Informações da lavanderia">
        <div class="trust-item"><span class="trust-symbol gold">♛</span><span><strong>Desde 1962</strong><small>Tradição que permanece</small></span></div>
        <div class="trust-item"><span class="trust-symbol">⌖</span><span><strong>Atendimento em Ijuí</strong><small>Rapidez e proximidade</small></span></div>
        <div class="trust-item"><span class="trust-symbol">☆</span><span><strong>4,7 no Google</strong><small>+500 avaliações</small></span></div>
        <div class="trust-item"><span class="trust-symbol">◔</span><span><strong>WhatsApp</strong><small>(55) 99663-3439</small></span></div>
    </div>
</section>

<section class="services-section" id="servicos" aria-labelledby="services-title">
    <div class="container">
        <header class="section-header">
            <span class="section-eyebrow">NOSSOS SERVIÇOS</span>
            <h2 class="section-title" id="services-title">Soluções completas para o seu dia a dia</h2>
            <div class="section-divider" aria-hidden="true"><i></i><span>♛</span><i></i></div>
        </header>
        <div class="services-grid">
            <?php foreach ($main_services as $service): ?>
                <article class="service-card" id="<?php echo htmlspecialchars($service['anchor_id']); ?>">
                    <div class="service-image-wrap">
                        <img src="<?php echo htmlspecialchars($service['image']); ?>" alt="<?php echo htmlspecialchars($service['title']); ?>" width="208" height="124" loading="lazy">
                        <span class="service-icon" aria-hidden="true">
                            <?php if ($service['icon'] === 'hanger'): ?><svg viewBox="0 0 24 24"><path d="M12 5a2 2 0 1 0-2-2M10 5 2.5 12.5A2 2 0 0 0 4 16h16a2 2 0 0 0 1.5-3.5L14 5"/></svg>
                            <?php elseif ($service['icon'] === 'rug'): ?><svg viewBox="0 0 24 24"><ellipse cx="8" cy="13" rx="3.5" ry="5.5"/><path d="M8 7.5h8c2 0 4 2.5 4 5.5s-2 5.5-4 5.5H8"/><ellipse cx="8" cy="13" rx="1.4" ry="2.3"/></svg>
                            <?php elseif ($service['icon'] === 'sofa'): ?><svg viewBox="0 0 24 24"><path d="M5 12V8a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3v4M3 12h18v6H3zM5 18v2m14-2v2"/></svg>
                            <?php else: ?><svg viewBox="0 0 24 24"><path d="M4 17h16a2 2 0 0 0 2-2v-4a4 4 0 0 0-4-4H9L4 14v3Z"/><path d="M8 7V4h8v3m-7 5h2"/></svg><?php endif; ?>
                        </span>
                    </div>
                    <div class="service-content">
                        <h3><?php echo htmlspecialchars($service['title']); ?></h3>
                        <p><?php echo htmlspecialchars($service['description']); ?></p>
                        <a href="<?php echo get_whatsapp_url('Olá! Gostaria de saber mais sobre ' . $service['title'] . '.'); ?>" target="_blank" rel="noopener noreferrer">Saiba mais <span>→</span></a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="about-section" id="sobre" aria-labelledby="about-title">
    <div class="container about-grid">
        <div class="about-composite">
            <div class="heritage-badge"><small>DESDE</small><strong>1962</strong><span>♛</span></div>
            <img src="assets/images/about-heritage.svg" alt="História da Lord's Lavanderia desde 1962" width="540" height="400" loading="lazy">
        </div>
        <div class="about-copy">
            <span class="about-eyebrow">SOBRE NÓS</span>
            <h2 id="about-title">Tradição, cuidado e confiança que passam de geração em geração.</h2>
            <p>A Lords Lavanderia nasceu em 1962 com um propósito simples e poderoso: cuidar de cada peça como se fosse única.</p>
            <p>Mais de 60 anos depois, seguimos com o mesmo compromisso de qualidade, investindo em tecnologia, equipe especializada e nos melhores produtos para entregar sempre o melhor para você.</p>
        </div>
        <div class="about-benefits">
            <div><span>♕</span><strong>Mais de 60 anos<br>de tradição</strong></div>
            <div><span>⚙</span><strong>Equipamentos modernos<br>e sustentáveis</strong></div>
            <div><span>♙</span><strong>Equipe treinada e<br>atendimento humano</strong></div>
            <div><span>♢</span><strong>Compromisso com<br>qualidade e prazos</strong></div>
        </div>
    </div>
</section>

<section class="process-section" id="como-funciona" aria-labelledby="process-title">
    <div class="container">
        <header class="section-header compact">
            <span class="section-eyebrow">COMO FUNCIONA</span>
            <h2 class="section-title" id="process-title">Prático, rápido e feito para você</h2>
            <div class="section-divider" aria-hidden="true"><i></i><span>♛</span><i></i></div>
        </header>
        <div class="process-grid">
            <article class="process-step"><span class="step-number">1</span><svg viewBox="0 0 48 48" aria-hidden="true"><path d="M6 20h15v21H6zM12 20v-5c0-4 3-7 7-7s7 3 7 7v26M24 16h18v25H24z"/></svg><div><h3>Você traz ou<br>solicita coleta</h3><p>Recebemos suas peças na loja ou buscamos no local combinado.</p></div></article>
            <article class="process-step"><span class="step-number">2</span><svg viewBox="0 0 48 48" aria-hidden="true"><rect x="7" y="5" width="34" height="38" rx="3"/><path d="M7 13h34M13 9h1m5 0h1"/><circle cx="24" cy="28" r="10"/><path d="M19 28c2 4 7 5 10 1"/></svg><div><h3>Cuidamos de<br>cada detalhe</h3><p>Lavamos com produtos premium e processos que preservam suas peças.</p></div></article>
            <article class="process-step"><span class="step-number">3</span><svg viewBox="0 0 48 48" aria-hidden="true"><path d="M5 36h38v6H5zM10 36c2-12 9-18 22-18h7v18M16 18c-2-3 1-5 3-7M25 16c-2-3 1-5 3-7"/><path d="M17 26h14"/></svg><div><h3>Higienizamos e<br>passamos</h3><p>Tudo com acabamento impecável, pronto para usar ou decorar.</p></div></article>
            <article class="process-step"><span class="step-number">4</span><svg viewBox="0 0 48 48" aria-hidden="true"><path d="m17 8 7 5 7-5 12 10-7 8v16H12V26l-7-8zM17 8c0 5 3 8 7 8s7-3 7-8"/></svg><div><h3>Entregamos com<br>pontualidade</h3><p>No prazo combinado, com qualidade que você pode confiar.</p></div></article>
        </div>
    </div>
</section>

<section class="reviews-section" id="avaliacoes" aria-labelledby="reviews-title">
    <div class="container">
        <header class="section-header compact reviews-header">
            <span class="section-eyebrow">AVALIAÇÕES</span>
            <h2 class="section-title" id="reviews-title">A confiança de quem já conhece</h2>
            <div class="section-divider" aria-hidden="true"><i></i><span>♛</span><i></i></div>
        </header>
        <div class="reviews-grid">
            <article class="review-card"><div class="review-top"><b class="google-g">G</b><span>★★★★★</span></div><p>Atendimento excelente e serviço impecável! Minhas roupas e tapetes ficaram como novos. Super recomendo!</p><footer><i>JM</i><span><strong>Juliana M.</strong><small>Ijuí/RS</small></span></footer></article>
            <article class="review-card"><div class="review-top"><b class="google-g">G</b><span>★★★★★</span></div><p>Tradição e qualidade que fazem a diferença. Confio na Lords há anos!</p><footer><i>CA</i><span><strong>Carlos A.</strong><small>Ijuí/RS</small></span></footer></article>
            <article class="review-card"><div class="review-top"><b class="google-g">G</b><span>★★★★★</span></div><p>Equipe atenciosa, serviço rápido e com acabamento perfeito. A melhor de Ijuí!</p><footer><i>MT</i><span><strong>Mariana T.</strong><small>Ijuí/RS</small></span></footer></article>
        </div>
    </div>
</section>

<section class="location-section" id="contato" aria-labelledby="location-title">
    <iframe src="https://maps.google.com/maps?q=Rua+Sete+de+Setembro,+395,+Iju%C3%AD,+RS&t=&z=15&ie=UTF8&iwloc=&output=embed" loading="lazy" title="Mapa da Lord's Lavanderia em Ijuí" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <div class="container location-overlay">
        <div class="location-card">
            <h2 id="location-title">Lavanderia Lords</h2><i></i>
            <p><span>⌖</span> Rua Sete de Setembro, 395<br><small>Centro - Ijuí/RS</small></p>
            <p><span>⌕</span> (55) 99663-3439</p>
            <a href="https://www.google.com/maps/dir/?api=1&destination=Rua+Sete+de+Setembro,+395,+Iju%C3%AD,+RS" target="_blank" rel="noopener noreferrer">⌂ &nbsp; Como Chegar</a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

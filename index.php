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
            <div class="hero-crown" aria-hidden="true">
                <svg viewBox="0 0 54 36" fill="none"><path d="M6 30 12 12l8 10 7-16 7 16 8-10 6 18c0 4-42 4-42 0Z" fill="currentColor"/><circle cx="12" cy="10" r="2.8" fill="currentColor"/><circle cx="27" cy="4" r="3.2" fill="currentColor"/><circle cx="42" cy="10" r="2.8" fill="currentColor"/></svg>
            </div>
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
        <div class="trust-item"><span class="trust-symbol gold" aria-hidden="true"><svg viewBox="0 0 44 28"><path d="M4 24 9 9l7 8 6-13 6 13 7-8 5 15c0 3-36 3-36 0Z" fill="currentColor"/><circle cx="9" cy="7" r="2" fill="currentColor"/><circle cx="22" cy="2" r="2.4" fill="currentColor"/><circle cx="35" cy="7" r="2" fill="currentColor"/></svg></span><span><strong>Desde 1962</strong><small>Tradição que permanece</small></span></div>
        <div class="trust-item"><span class="trust-symbol" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M20 10c0 5.8-8 12-8 12S4 15.8 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.7"/></svg></span><span><strong>Atendimento em Ijuí</strong><small>Rapidez e proximidade</small></span></div>
        <div class="trust-item"><span class="trust-symbol" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m12 2.5 2.9 5.9 6.5.9-4.7 4.6 1.1 6.5-5.8-3-5.8 3 1.1-6.5-4.7-4.6 6.5-.9Z"/></svg></span><span><strong>4,7 no Google</strong><small>+500 avaliações</small></span></div>
        <div class="trust-item"><span class="trust-symbol" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M20.5 11.5a8.5 8.5 0 0 1-12.6 7.4L3 20.3l1.4-4.7a8.5 8.5 0 1 1 16.1-4.1Z"/><path d="M8.2 7.8c.2-.4.4-.4.7-.4h.5c.2 0 .3.1.4.4l.7 1.7c.1.2 0 .4-.1.6l-.6.8c-.2.2-.1.4 0 .6.7 1.2 1.7 2.1 3 2.7.3.1.4.1.6-.1l.8-1c.2-.2.4-.2.6-.1l1.8.8c.2.1.3.3.3.5-.1.7-.5 1.4-1.1 1.8-.6.4-1.4.6-2.2.4-1.1-.2-2.6-.8-4.2-2.2-1.3-1.2-2.3-2.8-2.6-3.9-.3-1.1-.1-2 .4-2.6Z"/></svg></span><span><strong>WhatsApp</strong><small>(55) 99663-3439</small></span></div>
    </div>
</section>

<section class="services-section" id="servicos" aria-labelledby="services-title">
    <div class="container">
        <header class="section-header">
            <span class="section-eyebrow">NOSSOS SERVIÇOS</span>
            <h2 class="section-title" id="services-title">Soluções completas para o seu dia a dia</h2>
            <div class="section-divider" aria-hidden="true"><i></i><span class="divider-crown"><svg viewBox="0 0 54 36" fill="none"><path d="M6 30 12 12l8 10 7-16 7 16 8-10 6 18c0 4-42 4-42 0Z" fill="currentColor"/><circle cx="12" cy="10" r="2.8" fill="currentColor"/><circle cx="27" cy="4" r="3.2" fill="currentColor"/><circle cx="42" cy="10" r="2.8" fill="currentColor"/></svg></span><i></i></div>
        </header>
        <div class="services-grid">
            <?php foreach ($main_services as $service): ?>
                <article class="service-card" id="<?php echo htmlspecialchars($service['anchor_id']); ?>">
                    <div class="service-image-wrap">
                        <img src="<?php echo htmlspecialchars($service['image']); ?>" alt="<?php echo htmlspecialchars($service['title']); ?>" width="208" height="124" loading="lazy">
                        <?php
                            $icon_map = [
                                'hanger' => 'assets/images/icon-roupas.png',
                                'rug'    => 'assets/images/icon-tapetes.png',
                                'sofa'   => 'assets/images/icon-estofados.png',
                                'iron'   => 'assets/images/icon-passadoria.png',
                            ];
                            $icon_src = $icon_map[$service['icon']] ?? '';
                        ?>
                        <span class="service-icon" aria-hidden="true">
                            <img src="<?php echo $icon_src; ?>" alt="" width="60" height="60" loading="lazy">
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
            <div class="heritage-badge">
                <small>DESDE</small>
                <strong>1962</strong>
                <span class="heritage-crown" aria-hidden="true">
                    <svg viewBox="0 0 54 36" fill="none">
                        <path d="M6 30 12 12l8 10 7-16 7 16 8-10 6 18c0 4-42 4-42 0Z" fill="currentColor"/>
                        <circle cx="12" cy="10" r="2.8" fill="currentColor"/>
                        <circle cx="27" cy="4" r="3.2" fill="currentColor"/>
                        <circle cx="42" cy="10" r="2.8" fill="currentColor"/>
                    </svg>
                </span>
            </div>
            <img src="assets/images/about-heritage.jpg" alt="Toalhas dobradas representando a qualidade da Lord's Lavanderia" width="540" height="400" loading="lazy">
        </div>
        <div class="about-copy">
            <span class="about-eyebrow">SOBRE NÓS</span>
            <h2 id="about-title">Tradição, cuidado e confiança que passam de geração em geração.</h2>
            <p>A Lords Lavanderia nasceu em 1962 com um propósito simples e poderoso: cuidar de cada peça como se fosse única.</p>
            <p>Mais de 60 anos depois, seguimos com o mesmo compromisso de qualidade, investindo em tecnologia, equipe especializada e nos melhores produtos para entregar sempre o melhor para você.</p>
        </div>
        <div class="about-benefits">
            <div><img src="assets/images/about-tradition.png" alt="Tradição" class="benefit-icon" width="46" height="46" loading="lazy"><strong>Mais de 60 anos<br>de tradição</strong></div>
            <div><img src="assets/images/about-eco.png" alt="Sustentabilidade" class="benefit-icon" width="46" height="46" loading="lazy"><strong>Equipamentos modernos<br>e sustentáveis</strong></div>
            <div><img src="assets/images/about-team.png" alt="Equipe treinada" class="benefit-icon" width="46" height="46" loading="lazy"><strong>Equipe treinada e<br>atendimento humano</strong></div>
            <div><img src="assets/images/about-quality.png" alt="Qualidade" class="benefit-icon" width="46" height="46" loading="lazy"><strong>Compromisso com<br>qualidade e prazos</strong></div>
        </div>
    </div>
</section>

<section class="process-section" id="como-funciona" aria-labelledby="process-title">
    <div class="container">
        <header class="section-header compact">
            <span class="section-eyebrow">COMO FUNCIONA</span>
            <h2 class="section-title" id="process-title">Prático, rápido e feito para você</h2>
            <div class="section-divider" aria-hidden="true"><i></i><span class="divider-crown"><svg viewBox="0 0 54 36" fill="none"><path d="M6 30 12 12l8 10 7-16 7 16 8-10 6 18c0 4-42 4-42 0Z" fill="currentColor"/><circle cx="12" cy="10" r="2.8" fill="currentColor"/><circle cx="27" cy="4" r="3.2" fill="currentColor"/><circle cx="42" cy="10" r="2.8" fill="currentColor"/></svg></span><i></i></div>
        </header>
        <div class="process-grid">
            <article class="process-step">
                <span class="step-number">1</span>
                <img src="assets/images/process-step1.png" alt="Sacola de Coleta" class="process-icon" width="64" height="64" loading="lazy">
                <div>
                    <h3>Você traz ou<br>solicita coleta</h3>
                    <p>Recebemos suas peças na loja ou buscamos no local combinado.</p>
                </div>
            </article>

            <article class="process-step">
                <span class="step-number">2</span>
                <img src="assets/images/process-step2.png" alt="Máquina de Lavar" class="process-icon" width="64" height="64" loading="lazy">
                <div>
                    <h3>Cuidamos de<br>cada detalhe</h3>
                    <p>Lavamos com produtos premium e processos que preservam suas peças.</p>
                </div>
            </article>

            <article class="process-step">
                <span class="step-number">3</span>
                <img src="assets/images/process-step3.png" alt="Ferro a Vapor" class="process-icon" width="64" height="64" loading="lazy">
                <div>
                    <h3>Higienizamos e<br>passamos</h3>
                    <p>Tudo com acabamento impecável, pronto para usar ou decorar.</p>
                </div>
            </article>

            <article class="process-step">
                <span class="step-number">4</span>
                <img src="assets/images/process-step4.png" alt="Camisa Polo no Cabide" class="process-icon" width="64" height="64" loading="lazy">
                <div>
                    <h3>Entregamos com<br>pontualidade</h3>
                    <p>No prazo combinado, com qualidade que você pode confiar.</p>
                </div>
            </article>
        </div>
    </div>
</section>

<section class="reviews-section" id="avaliacoes" aria-labelledby="reviews-title">
    <div class="container">
        <header class="section-header compact reviews-header">
            <span class="section-eyebrow">AVALIAÇÕES</span>
            <h2 class="section-title" id="reviews-title">A confiança de quem já conhece</h2>
            <div class="section-divider" aria-hidden="true"><i></i><span class="divider-crown"><svg viewBox="0 0 54 36" fill="none"><path d="M6 30 12 12l8 10 7-16 7 16 8-10 6 18c0 4-42 4-42 0Z" fill="currentColor"/><circle cx="12" cy="10" r="2.8" fill="currentColor"/><circle cx="27" cy="4" r="3.2" fill="currentColor"/><circle cx="42" cy="10" r="2.8" fill="currentColor"/></svg></span><i></i></div>
        </header>
        <div class="reviews-grid">
            <article class="review-card">
                <div class="review-top">
                    <svg class="google-icon" width="22" height="22" viewBox="0 0 24 24" aria-label="Google">
                        <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.51h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.34z"/>
                        <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                        <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                        <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                    </svg>
                    <span class="review-stars" aria-label="5 estrelas">★★★★★</span>
                </div>
                <p class="review-text">Atendimento excelente e serviço impecável! Minhas roupas e tapetes ficaram como novos. Super recomendo!</p>
                <footer class="review-author">
                    <img src="assets/images/client-juliana.jpg" alt="Juliana M." class="review-avatar" width="44" height="44" loading="lazy">
                    <div class="review-author-info">
                        <strong>Juliana M.</strong>
                        <small>Ijuí/RS • Avaliação Google</small>
                    </div>
                </footer>
            </article>

            <article class="review-card">
                <div class="review-top">
                    <svg class="google-icon" width="22" height="22" viewBox="0 0 24 24" aria-label="Google">
                        <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.51h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.34z"/>
                        <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                        <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                        <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                    </svg>
                    <span class="review-stars" aria-label="5 estrelas">★★★★★</span>
                </div>
                <p class="review-text">Tradição e qualidade que fazem a diferença. Confio na Lord's há anos!</p>
                <footer class="review-author">
                    <img src="assets/images/client-carlos.jpg" alt="Carlos A." class="review-avatar" width="44" height="44" loading="lazy">
                    <div class="review-author-info">
                        <strong>Carlos A.</strong>
                        <small>Ijuí/RS • Avaliação Google</small>
                    </div>
                </footer>
            </article>

            <article class="review-card">
                <div class="review-top">
                    <svg class="google-icon" width="22" height="22" viewBox="0 0 24 24" aria-label="Google">
                        <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.51h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.34z"/>
                        <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                        <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                        <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                    </svg>
                    <span class="review-stars" aria-label="5 estrelas">★★★★★</span>
                </div>
                <p class="review-text">Equipe atenciosa, serviço rápido e com acabamento perfeito. A melhor de Ijuí!</p>
                <footer class="review-author">
                    <img src="assets/images/client-mariana.jpg" alt="Mariana T." class="review-avatar" width="44" height="44" loading="lazy">
                    <div class="review-author-info">
                        <strong>Mariana T.</strong>
                        <small>Ijuí/RS • Avaliação Google</small>
                    </div>
                </footer>
            </article>
        </div>
    </div>
</section>

<section class="location-section" id="contato" aria-label="Localização da Lord's Lavanderia no Google Maps">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3509.9930998098794!2d-53.91975912293515!3d-28.389276375798595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94fc2d67415d55d3%3A0x99b24a10b28f7eb6!2sLavanderia%20Lord's!5e0!3m2!1spt-BR!2sbr!4v1788217017463!5m2!1spt-BR!2sbr"
        loading="lazy"
        title="Mapa da Lord's Lavanderia em Ijuí"
        referrerpolicy="strict-origin-when-cross-origin"
        allowfullscreen>
    </iframe>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>


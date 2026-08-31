/**
 * LORD'S LAVANDERIA - Scripts Principais (Vanilla JS)
 * Alta performance, acessibilidade e interações fluidas.
 */

document.addEventListener('DOMContentLoaded', () => {
  'use strict';

  // 1. Elementos da Interface
  const siteHeader = document.getElementById('siteHeader');
  const mobileToggle = document.getElementById('mobileMenuToggle');
  const mobileDrawer = document.getElementById('mobileDrawer');
  const mobileBackdrop = document.getElementById('mobileBackdrop');
  const mobileLinks = document.querySelectorAll('.mobile-nav-link');

  // 2. Controle do Menu Mobile (Drawer + Acessibilidade)
  if (mobileToggle && mobileDrawer && mobileBackdrop) {
    const openMenu = () => {
      mobileToggle.setAttribute('aria-expanded', 'true');
      mobileDrawer.classList.add('is-active');
      mobileDrawer.setAttribute('aria-hidden', 'false');
      mobileBackdrop.classList.add('is-active');
      document.body.classList.add('menu-open');
    };

    const closeMenu = () => {
      mobileToggle.setAttribute('aria-expanded', 'false');
      mobileDrawer.classList.remove('is-active');
      mobileDrawer.setAttribute('aria-hidden', 'true');
      mobileBackdrop.classList.remove('is-active');
      document.body.classList.remove('menu-open');
    };

    mobileToggle.addEventListener('click', () => {
      const isOpen = mobileToggle.getAttribute('aria-expanded') === 'true';
      if (isOpen) {
        closeMenu();
      } else {
        openMenu();
      }
    });

    mobileBackdrop.addEventListener('click', closeMenu);

    // Fechar ao clicar em links do menu mobile
    mobileLinks.forEach(link => {
      link.addEventListener('click', closeMenu);
    });

    // Fechar com a tecla ESC
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && mobileDrawer.classList.contains('is-active')) {
        closeMenu();
      }
    });
  }

  // 3. Efeito do Header ao rolar a página
  if (siteHeader) {
    const handleScroll = () => {
      if (window.scrollY > 20) {
        siteHeader.classList.add('is-scrolled');
      } else {
        siteHeader.classList.remove('is-scrolled');
      }
    };

    window.addEventListener('scroll', handleScroll, { passive: true });
    handleScroll(); // Checagem inicial
  }

  // 4. Rolagem suave com compensação do Header Sticky para âncoras internas
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      const targetId = this.getAttribute('href');
      if (targetId && targetId !== '#' && document.querySelector(targetId)) {
        e.preventDefault();
        const targetElement = document.querySelector(targetId);
        const headerOffset = (siteHeader ? siteHeader.offsetHeight : 80) + 12;
        const elementPosition = targetElement.getBoundingClientRect().top;
        const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

        window.scrollTo({
          top: offsetPosition,
          behavior: 'smooth'
        });
      }
    });
  });

  // 5. Animações discretas de entrada (Scroll Reveal nativo sem bibliotecas)
  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  if (!prefersReducedMotion && 'IntersectionObserver' in window) {
    const revealElements = document.querySelectorAll(
      '.service-card, .about-composite-card, .about-content, .process-step, .location-card, .process-cta-banner'
    );

    revealElements.forEach(el => {
      el.classList.add('reveal-on-scroll');
    });

    const revealObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-revealed');
          observer.unobserve(entry.target);
        }
      });
    }, {
      root: null,
      threshold: 0.1,
      rootMargin: '0px 0px -30px 0px'
    });

    revealElements.forEach(el => revealObserver.observe(el));
  }
});

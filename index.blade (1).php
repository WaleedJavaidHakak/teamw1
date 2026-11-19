@extends('frontend.layouts.app')
@section('page_title', 'Home')
@section('page_meta')  
{!! generateMetaTagsSimple('Home',$setting) !!} 
{!! generateFaqSchema($faqs ?? collect()) !!}
@endsection 

@section('page_css')  
 <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('webassets/css/google-reviews.css') }}">
 

  <style>
/**
 * Official AOS 2.3.1 CSS + Premium Card Micro-Interactions
 */
[data-aos][data-aos][data-aos-duration="50"],body[data-aos-duration="50"] [data-aos]{transition-duration:50ms}[data-aos][data-aos][data-aos-delay="50"],body[data-aos-delay="50"] [data-aos]{transition-delay:0}[data-aos][data-aos][data-aos-delay="50"].aos-animate,body[data-aos-delay="50"] [data-aos].aos-animate{transition-delay:50ms}[data-aos][data-aos][data-aos-duration="100"],body[data-aos-duration="100"] [data-aos]{transition-duration:.1s}[data-aos][data-aos][data-aos-delay="100"],body[data-aos-delay="100"] [data-aos]{transition-delay:0}[data-aos][data-aos][data-aos-delay="100"].aos-animate,body[data-aos-delay="100"] [data-aos].aos-animate{transition-delay:.1s}[data-aos][data-aos][data-aos-duration="150"],body[data-aos-duration="150"] [data-aos]{transition-duration:.15s}[data-aos][data-aos][data-aos-delay="150"],body[data-aos-delay="150"] [data-aos]{transition-delay:0}[data-aos][data-aos][data-aos-delay="150"].aos-animate,body[data-aos-delay="150"] [data-aos].aos-animate{transition-delay:.15s}[data-aos][data-aos][data-aos-duration="200"],body[data-aos-duration="200"] [data-aos]{transition-duration:.2s}[data-aos][data-aos][data-aos-delay="200"],body[data-aos-delay="200"] [data-aos]{transition-delay:0}[data-aos][data-aos][data-aos-delay="200"].aos-animate,body[data-aos-delay="200"] [data-aos].aos-animate{transition-delay:.2s}[data-aos][data-aos][data-aos-duration="250"],body[data-aos-duration="250"] [data-aos]{transition-duration:.25s}[data-aos][data-aos][data-aos-delay="250"],body[data-aos-delay="250"] [data-aos]{transition-delay:0}[data-aos][data-aos][data-aos-delay="250"].aos-animate,body[data-aos-delay="250"] [data-aos].aos-animate{transition-delay:.25s}[data-aos][data-aos][data-aos-duration="300"],body[data-aos-duration="300"] [data-aos]{transition-duration:.3s}[data-aos][data-aos][data-aos-delay="300"],body[data-aos-delay="300"] [data-aos]{transition-delay:0}[data-aos][data-aos][data-aos-delay="300"].aos-animate,body[data-aos-delay="300"] [data-aos].aos-animate{transition-delay:.3s}[data-aos][data-aos][data-aos-duration="350"],body[data-aos-duration="350"] [data-aos]{transition-duration:.35s}[data-aos][data-aos][data-aos-delay="350"],body[data-aos-delay="350"] [data-aos]{transition-delay:0}[data-aos][data-aos][data-aos-delay="350"].aos-animate,body[data-aos-delay="350"] [data-aos].aos-animate{transition-delay:.35s}[data-aos][data-aos][data-aos-duration="400"],body[data-aos-duration="400"] [data-aos]{transition-duration:.4s}[data-aos][data-aos][data-aos-delay="400"],body[data-aos-delay="400"] [data-aos]{transition-delay:0}[data-aos][data-aos][data-aos-delay="400"].aos-animate,body[data-aos-delay="400"] [data-aos].aos-animate{transition-delay:.4s}[data-aos][data-aos][data-aos-duration="500"],body[data-aos-duration="500"] [data-aos]{transition-duration:.5s}[data-aos][data-aos][data-aos-delay="500"],body[data-aos-delay="500"] [data-aos]{transition-delay:0}[data-aos][data-aos][data-aos-delay="500"].aos-animate,body[data-aos-delay="500"] [data-aos].aos-animate{transition-delay:.5s}[data-aos][data-aos][data-aos-duration="600"],body[data-aos-duration="600"] [data-aos]{transition-duration:.6s}[data-aos][data-aos][data-aos-delay="600"],body[data-aos-delay="600"] [data-aos]{transition-delay:0}[data-aos][data-aos][data-aos-delay="600"].aos-animate,body[data-aos-delay="600"] [data-aos].aos-animate{transition-delay:.6s}[data-aos][data-aos][data-aos-duration="700"],body[data-aos-duration="700"] [data-aos]{transition-duration:.7s}[data-aos][data-aos][data-aos-delay="700"],body[data-aos-delay="700"] [data-aos]{transition-delay:0}[data-aos][data-aos][data-aos-delay="700"].aos-animate,body[data-aos-delay="700"] [data-aos].aos-animate{transition-delay:.7s}[data-aos][data-aos][data-aos-duration="800"],body[data-aos-duration="800"] [data-aos]{transition-duration:.8s}[data-aos][data-aos][data-aos-delay="800"],body[data-aos-delay="800"] [data-aos]{transition-delay:0}[data-aos][data-aos][data-aos-delay="800"].aos-animate,body[data-aos-delay="800"] [data-aos].aos-animate{transition-delay:.8s}[data-aos][data-aos][data-aos-duration="900"],body[data-aos-duration="900"] [data-aos]{transition-duration:.9s}[data-aos][data-aos][data-aos-delay="900"],body[data-aos-delay="900"] [data-aos]{transition-delay:0}[data-aos][data-aos][data-aos-delay="900"].aos-animate,body[data-aos-delay="900"] [data-aos].aos-animate{transition-delay:.9s}[data-aos][data-aos][data-aos-duration="1000"],body[data-aos-duration="1000"] [data-aos]{transition-duration:1s}[data-aos][data-aos][data-aos-delay="1000"],body[data-aos-delay="1000"] [data-aos]{transition-delay:0}[data-aos][data-aos][data-aos-delay="1000"].aos-animate,body[data-aos-delay="1000"] [data-aos].aos-animate{transition-delay:1s}[data-aos][data-aos][data-aos-easing=ease],body[data-aos-easing=ease] [data-aos]{transition-timing-function:ease}[data-aos][data-aos][data-aos-easing=ease-in-out],body[data-aos-easing=ease-in-out] [data-aos]{transition-timing-function:ease-in-out}[data-aos][data-aos][data-aos-easing=ease-out-cubic],body[data-aos-easing=ease-out-cubic] [data-aos]{transition-timing-function:cubic-bezier(.25,.46,.45,.94)}[data-aos^=fade][data-aos^=fade]{opacity:0;transition-property:opacity,transform}[data-aos^=fade][data-aos^=fade].aos-animate{opacity:1;transform:translateZ(0)}[data-aos=fade-up]{transform:translate3d(0,75px,0)}[data-aos=fade-down]{transform:translate3d(0,-75px,0)}[data-aos=fade-right]{transform:translate3d(-75px,0,0)}[data-aos=fade-left]{transform:translate3d(75px,0,0)}[data-aos^=zoom][data-aos^=zoom]{opacity:0;transition-property:opacity,transform}[data-aos^=zoom][data-aos^=zoom].aos-animate{opacity:1;transform:translateZ(0) scale(1)}[data-aos=zoom-in]{transform:scale(.75)}[data-aos=zoom-in-up]{transform:translate3d(0,75px,0) scale(.75)}[data-aos=zoom-out]{transform:scale(1.2)}[data-aos=flip-up]{transform:perspective(2500px) rotateX(-100deg)}[data-aos=flip-up].aos-animate{transform:perspective(2500px) rotateX(0)}

/* ═══════════════════════════════════════════════════════════
   GLOBAL BRAND DESIGN TOKENS
   ═══════════════════════════════════════════════════════════ */
:root {
    --kz-blue: #126e68;
    --kz-blue-dark: #0c514d;
    --kz-blue-light: #21877f;
    --kz-gold: #d6b36a;
    --kz-gold-hover: #bd9852;
    --kz-bg-soft: #f8fafc;
    --kz-text-main: #1e293b;
    --kz-text-muted: #64748b;
    --kz-border: rgba(18, 110, 104, 0.09);
    --kz-radius-sm: 12px;
    --kz-radius-md: 18px;
    --kz-radius-lg: 24px;
}

/* Smooth Page Scrolling */
html {
    scroll-behavior: smooth;
}

/* Card Hover Elevation */
.dst-card,
.kz-cat-card,
.kz-cab-box,
.kz-glass-card,
.kz-about-stat-card,
.kz-reason-card,
.kz-video-card,
.kz-count-box,
.kz-blog-card,
.kz-faq-card,
.kz-gallery-card {
    transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.25s ease;
}
.dst-card:hover,
.kz-cat-card:hover,
.kz-cab-box:hover,
.kz-glass-card:hover,
.kz-reason-card:hover,
.kz-blog-card:hover,
.kz-gallery-card:hover {
    transform: translateY(-6px) !important;
    box-shadow: 0 16px 36px rgba(18, 110, 104, 0.12) !important;
}

/* ═══════════════════════════════════════════════════════════
   SEARCH BAR POSITION & STYLING (OVER HERO / DESTINATIONS)
   ═══════════════════════════════════════════════════════════ */
.kt-slider-search {
    position: absolute;
    bottom: 0px;
    left: 0;
    width: 100%;
    z-index: 20;
}

.kt-search-bar {
    display: flex;
    height: 40px;
    align-items: center;
    max-width: 530px;
    margin: 0 auto;
    background: rgba(255, 255, 255, 0.95);
    border: 1px solid #126e68;
    backdrop-filter: blur(10px);
    border-radius: 60px;
    padding: 6px 6px 6px 24px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
}

.kt-s-icon {
    font-size: 18px;
    color: #999;
    margin-right: 12px;
}

.kt-search-bar input {
    flex: 1;
    border: none;
    outline: none;
    background: transparent !important;
    font-size: 13px;
    height:33px !important;
    color: #333;
    cursor: pointer;
}

.kt-search-bar input::placeholder {
    color: #aaa;
}

.kt-s-btn {
    background: #126e68;
    color: #fff;
    border: none;
    padding: 3px 24px;
    border-radius: 60px;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
    transition: background 0.3s ease;
}

.kt-s-btn:hover {
    background: #126e68;
}

@media (max-width: 768px) {
    .th-hero-bg .hero-bg-img {
        padding-left: 5px;
        padding-right: 5px;
    }

    .kt-slider-search {
        bottom: 1px;
        padding: 0 15px;
    }

    .kt-search-bar {
        width: 100%;
        max-width: 374px;
        height: 38px;
        margin: 0 auto;
        padding: 4px 6px 4px 14px;
    }

    .kt-s-icon {
        font-size: 13px;
        margin-right: 8px;
    }

    .kt-search-bar input {
        font-size: 16px !important; /* Prevents mobile browser auto-zoom */
        padding: 4px 0;
        min-width: 0;
    }

    .kt-search-bar input::placeholder {
        font-size: 12px;
    }

    .kt-s-btn {
        padding: 4px 14px;
        font-size: 11px;
        white-space: nowrap;
    }
}

/* ═══════════════════════════════════════════════════════════
   HERO BANNER & SLIDERS - CINEMATIC SLIDING ANIMATION & ELEGANT ZOOM
   ═══════════════════════════════════════════════════════════ */
.hero-slider-1 {
    overflow: hidden !important;
    position: relative !important;
    width: 100% !important;
}

.hero-slider-1 .swiper-wrapper {
    transition-timing-function: cubic-bezier(0.25, 1, 0.4, 1) !important;
    will-change: transform;
}

.hero-slider-1 .swiper-slide {
    overflow: hidden !important;
    position: relative !important;
    height: 100% !important;
    transform: translateZ(0);
    backface-visibility: hidden;
    -webkit-backface-visibility: hidden;
}

.hero-slider-1 .hero-inner {
    position: relative !important;
    overflow: hidden !important;
    width: 100% !important;
    height: 100% !important;
}

.hero-slider-1 .th-hero-bg {
    overflow: hidden !important;
    position: relative !important;
    width: 100% !important;
    height: 100% !important;
    border-radius: 0 !important;
    transform: translateY(var(--scroll-parallax, 0px)) scale(var(--scroll-zoom, 1));
    transform-origin: center top;
    transition: transform 0.15s ease-out;
    will-change: transform;
}

.hero-slider-1 .hero-inner::after {
    content: '';
    position: absolute;
    inset: 0;
    pointer-events: none;
    z-index: 2;
}

.hero-slider-1 .hero-bg-img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    display: block !important;
    transform-origin: center center;
    transform: scale(1.0);
    transition: transform 1.2s cubic-bezier(0.25, 1, 0.4, 1), filter 0.8s ease;
    will-change: transform, filter;
    backface-visibility: hidden;
    -webkit-backface-visibility: hidden;
}

@keyframes heroKenBurnsActive {
    0% {
        transform: scale(1.0) translate(0, 0);
        filter: brightness(0.96);
    }
    50% {
        transform: scale(1.06) translate(-5px, -3px);
        filter: brightness(1.01);
    }
    100% {
        transform: scale(1.10) translate(4px, -5px);
        filter: brightness(1.0);
    }
}

.hero-slider-1 .is-active-anim,
.hero-slider-1 .swiper-slide-active .hero-bg-img {
    animation: heroKenBurnsActive 8s cubic-bezier(0.25, 1, 0.5, 1) forwards !important;
}

.hero-slider-1 .swiper-slide:not(.swiper-slide-active) .hero-bg-img {
    transform: scale(1.0) !important;
    animation: none !important;
}

.hero-slider-1 .slider-arrow {
    width: 48px !important;
    height: 48px !important;
    border-radius: 50% !important;
    background: rgba(255, 255, 255, 0.92) !important;
    backdrop-filter: blur(10px) !important;
    -webkit-backdrop-filter: blur(10px) !important;
    border: 1px solid rgba(255, 255, 255, 0.6) !important;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.22) !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    transition: all 0.35s cubic-bezier(0.25, 1, 0.5, 1) !important;
    cursor: pointer !important;
    z-index: 10 !important;
}

.hero-slider-1 .slider-arrow:hover {
    background: var(--kz-blue) !important;
    transform: scale(1.12) !important;
    box-shadow: 0 12px 30px rgba(18, 110, 104, 0.45) !important;
}

.hero-slider-1 .slider-arrow:hover img {
    filter: brightness(0) invert(1);
}

.hero-slider-1 .slider-pagination,
.hero-slider-1 .swiper-pagination {
    display: none !important;
}

/* ═══════════════════════════════════════════════════════════
   STATE CAROUSEL LEFT/RIGHT NAVIGATION ARROWS
   ═══════════════════════════════════════════════════════════ */
.dst-carousel-wrap {
    position: relative;
    padding: 0 4px;
}
.dst-nav {
    position: static;
}
.dst-nav-btn {
    position: absolute !important;
    top: 50% !important;
    transform: translateY(-50%) !important;
    width: 44px !important;
    height: 44px !important;
    border-radius: 50% !important;
    background: #ffffff !important;
    color: var(--kz-blue) !important;
    border: 1px solid rgba(18, 110, 104, 0.15) !important;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15) !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    font-size: 18px !important;
    cursor: pointer !important;
    z-index: 10 !important;
    transition: all 0.25s ease !important;
    padding: 0 !important;
}
.dst-nav-btn:hover {
    background: var(--kz-blue) !important;
    color: #ffffff !important;
    box-shadow: 0 6px 20px rgba(18, 110, 104, 0.3) !important;
    transform: translateY(-50%) scale(1.08) !important;
}
.dst-nav-btn.swiper-button-disabled {
    opacity: 0.35 !important;
    cursor: not-allowed !important;
    pointer-events: none !important;
}
.dst-nav-prev {
    left: 2px !important;
}
.dst-nav-next {
    right: 2px !important;
}

@media (max-width: 768px) {
    .dst-nav-btn {
        width: 36px !important;
        height: 36px !important;
        font-size: 15px !important;
    }
    .dst-nav-prev {
        left: 0px !important;
    }
    .dst-nav-next {
        right: 0px !important;
    }
}

/* ═══════════════════════════════════════════════════════════
   1. KZ ABOUT US SECTION
   ═══════════════════════════════════════════════════════════ */
.kz-about-section {
    padding: 15px 0 15px;
    background: #ffffff;
    position: relative;
    overflow: hidden;
}
.kz-about-img-card {
    position: relative;
    border-radius: var(--kz-radius-lg);
    overflow: hidden;
    box-shadow: 0 16px 40px rgba(18, 110, 104, 0.12);
    border: 1px solid var(--kz-border);
}
.kz-about-img-frame img {
    width: 100%;
    height: 480px;
    object-fit: cover;
    display: block;
    transition: transform 0.6s ease;
}
.kz-about-img-card:hover .kz-about-img-frame img {
    transform: scale(1.03);
}
.kz-about-exp-badge {
    position: absolute;
    bottom: 22px;
    left: 22px;
    background: var(--kz-blue);
    color: #ffffff;
    padding: 14px 22px;
    border-radius: var(--kz-radius-md);
    border: 2px solid var(--kz-gold);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.25);
    display: flex;
    flex-direction: column;
    align-items: center;
    z-index: 2;
}
.kz-about-exp-badge span {
    font-size: 28px;
    font-weight: 800;
    line-height: 1;
    color: var(--kz-gold);
}
.kz-about-exp-badge small {
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: #ffffff;
    margin-top: 4px;
}
.kz-about-info-wrap {
    padding-left: 18px;
}
.kz-about-eyebrow {
    display: inline-block;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.14em;
    color: var(--kz-gold);
    margin-bottom: 8px;
}
.kz-about-heading {
    font-size: 32px;
    font-weight: 800;
    color: var(--kz-blue);
    line-height: 1.25;
    margin-bottom: 16px;
    letter-spacing: -0.02em;
}
.kz-about-body-text {
    font-size: 14px;
    line-height: 1.7;
    color: var(--kz-text-muted);
    margin-bottom: 22px;
}
.kz-about-features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 14px;
    margin-bottom: 24px;
}
.kz-about-feature-pill {
    background: var(--kz-bg-soft);
    border: 1px solid var(--kz-border);
    border-radius: var(--kz-radius-sm);
    padding: 12px 14px;
    display: flex;
    align-items: flex-start;
    gap: 12px;
    transition: all 0.25s ease;
}
.kz-about-feature-pill:hover {
    background: #ffffff;
    border-color: var(--kz-blue);
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(18, 110, 104, 0.08);
}
.kz-about-feature-ico {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    background: rgba(18, 110, 104, 0.08);
    color: var(--kz-blue);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 15px;
    flex-shrink: 0;
}
.kz-about-feature-txt h5 {
    font-size: 13.5px;
    font-weight: 700;
    color: var(--kz-blue);
    margin: 0 0 2px;
}
.kz-about-feature-txt p {
    font-size: 11.5px;
    color: var(--kz-text-muted);
    margin: 0;
    line-height: 1.4;
}
.kz-about-stat-row {
    display: flex;
    gap: 12px;
    margin-bottom: 26px;
}
.kz-about-stat-card {
    background: #ffffff;
    border: 1px solid rgba(18, 110, 104, 0.1);
    border-top: 3px solid var(--kz-blue);
    border-radius: 14px;
    padding: 12px 16px;
    flex: 1;
    text-align: center;
    box-shadow: 0 4px 14px rgba(18, 110, 104, 0.04);
    transition: all 0.25s ease;
}
.kz-about-stat-card:hover {
    border-top-color: var(--kz-gold);
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(18, 110, 104, 0.09);
}
.kz-about-stat-card h3 {
    font-size: 24px;
    font-weight: 800;
    color: var(--kz-blue);
    margin: 0 0 2px;
    line-height: 1.2;
}
.kz-about-stat-card span {
    font-size: 11px;
    font-weight: 700;
    color: var(--kz-text-muted);
    text-transform: uppercase;
    letter-spacing: 0.04em;
}
.kz-about-btn-cta {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: var(--kz-blue);
    color: #ffffff !important;
    font-size: 13.5px;
    font-weight: 700;
    padding: 10px 18px 10px 24px;
    border-radius: 30px;
    text-decoration: none;
    transition: all 0.25s ease;
    box-shadow: 0 6px 18px rgba(18, 110, 104, 0.25);
}
.kz-about-btn-cta:hover {
    background: var(--kz-blue-dark);
    transform: translateY(-2px);
    box-shadow: 0 10px 24px rgba(18, 110, 104, 0.35);
}
.kz-about-btn-icon {
    width: 26px;
    height: 26px;
    border-radius: 50%;
    background: var(--kz-gold);
    color: #000000;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    transition: transform 0.2s ease;
}
.kz-about-btn-cta:hover .kz-about-btn-icon {
    transform: translateX(3px);
}

/* ═══════════════════════════════════════════════════════════
   2. KZ TOUR CATEGORIES
   ═══════════════════════════════════════════════════════════ */
.kz-cat-section {
    padding: 15px 0 15px;
    position: relative;
    background: var(--kz-bg-soft);
    overflow: hidden;
}
.kz-cat-header {
    text-align: center;
    margin-bottom: 40px;
}
.kz-cat-eyebrow {
    display: inline-block;
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.12em;
    color: var(--kz-gold);
    margin-bottom: 8px;
}
.kz-cat-heading {
    font-size: 34px;
    font-weight: 800;
    color: var(--kz-blue);
    margin: 0;
    letter-spacing: -0.02em;
}
.kz-cat-card {
    background: #ffffff;
    border-radius: 22px;
    padding: 14px;
    box-shadow: 0 10px 30px rgba(11, 51, 88, 0.07);
    transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    height: 100%;
    display: flex;
    flex-direction: column;
}
.kz-cat-img-wrap {
    position: relative;
    height: 220px;
    border-radius: 16px;
    overflow: hidden;
    margin-bottom: 16px;
    background: #f1f5f9;
}
.kz-cat-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}
.kz-cat-card:hover .kz-cat-img {
    transform: scale(1.08);
}
.kz-cat-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    background: var(--kz-gold);
    color: #000000;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    padding: 4px 12px;
    border-radius: 20px;
    z-index: 2;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}
.kz-cat-tag {
    position: absolute;
    bottom: 12px;
    right: 12px;
    background: rgba(255, 255, 255, 0.94);
    backdrop-filter: blur(8px);
    color: var(--kz-blue);
    font-size: 12px;
    font-weight: 700;
    padding: 4px 12px;
    border-radius: 20px;
    z-index: 2;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}
.kz-cat-body {
    padding: 4px 8px 10px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}
.kz-cat-title {
    font-size: 14px;
    font-weight: 700;
    margin: 0 0 6px;
}
.kz-cat-title a {
    color: var(--kz-blue);
    text-decoration: none;
    transition: color 0.25s ease;
}
.kz-cat-title a:hover {
    color: var(--kz-gold);
}
.kz-cat-desc {
    font-size: 13px;
    color: var(--kz-text-muted);
    margin: 0 0 16px;
    line-height: 1.5;
    flex-grow: 1;
}
.kz-cat-btn {
    display: inline-flex;
    align-items: center;
    justify-content: space-between;
    background: var(--kz-blue);
    color: #ffffff !important;
    font-size: 13px;
    font-weight: 600;
    padding: 10px 14px 10px 20px;
    border-radius: 30px;
    text-decoration: none;
    transition: background 0.3s ease, transform 0.25s ease, box-shadow 0.25s ease;
}
.kz-cat-btn:hover {
    background: var(--kz-blue-dark);
    color: #ffffff !important;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(18, 110, 104, 0.25);
}
.kz-cat-btn-arrow {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    background: var(--kz-gold);
    color: #000000;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    margin-left: 10px;
    transition: transform 0.3s ease;
}
.kz-cat-btn:hover .kz-cat-btn-arrow {
    transform: translateX(2px) translateY(-2px);
}

/* ═══════════════════════════════════════════════════════════
   3. KZ CABS SECTION
   ═══════════════════════════════════════════════════════════ */
.kz-cabs-section {
    padding: 10px 0 10px;
    position: relative;
    background-color: #fafbfc;
    background-image: 
        linear-gradient(rgba(18, 110, 104, 0.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(18, 110, 104, 0.04) 1px, transparent 1px);
    background-size: 28px 28px;
    overflow: hidden;
}
.kz-cabs-header {
    text-align: center;
    margin-bottom: 40px;
}
.kz-cabs-eyebrow {
    display: inline-block;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.14em;
    color: var(--kz-blue);
    margin-bottom: 6px;
}
.kz-cabs-heading {
    font-size: 32px;
    font-weight: 800;
    color: var(--kz-blue);
    margin: 0 0 8px;
    letter-spacing: -0.02em;
}
.kz-cabs-subtitle {
    font-size: 14px;
    color: var(--kz-text-muted);
    margin: 0 auto;
    max-width: 520px;
}
.kz-cab-box {
    background: #ffffff;
    border-radius: 18px;
    padding: 10px;
    border: 1px solid var(--kz-border);
    box-shadow: 0 6px 20px rgba(18, 110, 104, 0.05);
    height: 100%;
    display: flex;
    flex-direction: column;
}
.kz-cab-box:hover {
    border-color: rgba(18, 110, 104, 0.3);
}
.kz-cab-media {
    position: relative;
    height: 190px;
    border-radius: 14px;
    overflow: hidden;
    margin-bottom: 12px;
    background: #f1f5f9;
}
.kz-cab-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}
.kz-cab-box:hover .kz-cab-media img {
    transform: scale(1.06);
}
.kz-cab-badge {
    position: absolute;
    top: 10px;
    left: 10px;
    background: var(--kz-blue);
    color: #ffffff;
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    padding: 3px 10px;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(18, 110, 104, 0.35);
}
.kz-cab-content {
    padding: 4px 6px 8px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}
.kz-cab-title {
    font-size: 15px;
    font-weight: 700;
    margin: 0 0 4px;
    line-height: 1.35;
}
.kz-cab-title a {
    color: var(--kz-blue);
    text-decoration: none;
    transition: color 0.2s ease;
}
.kz-cab-title a:hover {
    color: var(--kz-gold);
}
.kz-cab-loc {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 11px;
    font-weight: 600;
    color: var(--kz-text-muted);
    margin-bottom: 6px;
}
.kz-cab-desc {
    font-size: 12px;
    color: var(--kz-text-muted);
    margin: 0 0 12px;
    line-height: 1.45;
    flex-grow: 1;
}
.kz-cab-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 8px;
    border-top: 1px solid var(--kz-border);
}
.kz-cab-link {
    font-size: 12px;
    font-weight: 700;
    color: var(--kz-blue);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    transition: color 0.2s ease;
}
.kz-cab-link:hover {
    color: var(--kz-gold);
}
.kz-cab-btn {
    background: var(--kz-blue);
    color: #ffffff !important;
    font-size: 11px;
    font-weight: 600;
    padding: 6px 14px;
    border-radius: 20px;
    text-decoration: none;
    transition: background 0.25s ease, transform 0.2s ease;
}
.kz-cab-btn:hover {
    background: var(--kz-gold);
    color: #000000 !important;
    transform: translateY(-1px);
}

/* ═══════════════════════════════════════════════════════════
   4. KZ POPULAR DESTINATIONS (GLASS EFFECT)
   ═══════════════════════════════════════════════════════════ */
.kz-dest-section {
    padding: 15px 0 15px;
    position: relative;
    background: linear-gradient(180deg, rgba(8, 20, 38, 0.94) 0%, rgba(18, 110, 104, 0.85) 50%, rgba(8, 20, 38, 0.96) 100%), 
                url('/webassets/img/bg/tour_bg_1.jpg') center/cover no-repeat;
    background-attachment: scroll;
    overflow: hidden;
}
.kz-dest-header {
    text-align: center;
    margin-bottom: 45px;
    position: relative;
    z-index: 2;
}
.kz-dest-eyebrow {
    display: inline-block;
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.12em;
    color: var(--kz-gold);
    margin-bottom: 8px;
}
.kz-dest-heading {
    font-size: 36px;
    font-weight: 800;
    color: #ffffff;
    margin: 0 0 10px;
    letter-spacing: -0.02em;
}
.kz-dest-subtitle {
    font-size: 14px;
    color: rgba(255, 255, 255, 0.8);
    max-width: 580px;
    margin: 0 auto 22px;
}
.kz-glass-card {
    background: rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    border: 1px solid rgba(255, 255, 255, 0.16);
    border-radius: 24px;
    padding: 16px;
    box-shadow: 0 20px 45px rgba(0, 0, 0, 0.28);
    height: 100%;
    display: flex;
    flex-direction: column;
}
.kz-glass-card:hover {
    border-color: rgba(214, 179, 106, 0.45);
}
.kz-glass-img-wrap {
    position: relative;
    height: 220px;
    border-radius: 18px;
    overflow: hidden;
    margin-bottom: 16px;
    background: rgba(255, 255, 255, 0.05);
}
.kz-glass-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}
.kz-glass-card:hover .kz-glass-img {
    transform: scale(1.08);
}
.kz-glass-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    background: var(--kz-gold);
    color: #000000;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    padding: 4px 12px;
    border-radius: 20px;
    z-index: 2;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
}
.kz-glass-count {
    position: absolute;
    bottom: 12px;
    right: 12px;
    background: rgba(18, 110, 104, 0.88);
    backdrop-filter: blur(8px);
    color: #ffffff;
    font-size: 12px;
    font-weight: 700;
    padding: 4px 12px;
    border-radius: 20px;
    z-index: 2;
    border: 1px solid rgba(255, 255, 255, 0.25);
}
.kz-glass-body {
    padding: 4px 8px 8px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}
.kz-glass-title {
    font-size: 19px;
    font-weight: 700;
    margin: 0 0 6px;
}
.kz-glass-title a {
    color: #ffffff;
    text-decoration: none;
    transition: color 0.25s ease;
}
.kz-glass-title a:hover {
    color: var(--kz-gold);
}
.kz-glass-desc {
    font-size: 13px;
    color: rgba(255, 255, 255, 0.72);
    margin: 0 0 16px;
    line-height: 1.5;
    flex-grow: 1;
}
.kz-glass-btn {
    display: inline-flex;
    align-items: center;
    justify-content: space-between;
    background: var(--kz-blue);
    color: #ffffff !important;
    font-size: 13px;
    font-weight: 600;
    padding: 10px 14px 10px 20px;
    border-radius: 30px;
    text-decoration: none;
    border: 1px solid rgba(255, 255, 255, 0.15);
    transition: all 0.3s ease;
}
.kz-glass-btn:hover {
    background: var(--kz-gold);
    color: #000000 !important;
    border-color: var(--kz-gold);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(214, 179, 106, 0.35);
}
.kz-glass-btn-arrow {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    color: #ffffff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    margin-left: 10px;
    transition: all 0.3s ease;
}
.kz-glass-btn:hover .kz-glass-btn-arrow {
    background: #000000;
    color: #ffffff;
    transform: translateX(3px);
}

/* ═══════════════════════════════════════════════════════════
   5. KZ REASONS SECTION ("WHY CHOOSE US")
   ═══════════════════════════════════════════════════════════ */
.kz-reasons-section {
    padding: 10px 0 15px;
    background: #ffffff;
    position: relative;
}
.kz-reasons-header {
    margin-bottom: 45px;
}
.kz-reasons-eyebrow {
    display: inline-block;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.14em;
    color: var(--kz-gold);
    margin-bottom: 6px;
}
.kz-reasons-title {
    font-size: 32px;
    font-weight: 800;
    color: var(--kz-blue);
    margin: 0;
    letter-spacing: -0.02em;
}
.kz-reasons-title em {
    font-style: normal;
    color: var(--kz-gold);
}
.kz-reason-card {
    background: var(--kz-bg-soft);
    border: 1px solid var(--kz-border);
    border-radius: 20px;
    padding: 26px 22px;
    height: 100%;
    box-shadow: 0 6px 20px rgba(18, 110, 104, 0.03);
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
}
.kz-reason-card:hover {
    background: #ffffff;
    border-color: var(--kz-blue);
    transform: translateY(-6px);
    box-shadow: 0 16px 36px rgba(18, 110, 104, 0.1);
}
.kz-reason-icon-wrap {
    width: 54px;
    height: 54px;
    border-radius: 14px;
    background: rgba(18, 110, 104, 0.08);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 16px;
    transition: transform 0.3s ease;
}
.kz-reason-card:hover .kz-reason-icon-wrap {
    transform: scale(1.1) rotate(4deg);
    background: rgba(214, 179, 106, 0.15);
}
.kz-reason-heading {
    font-size: 16.5px;
    font-weight: 700;
    color: var(--kz-blue);
    margin: 0 0 8px;
}
.kz-reason-paragraph {
    font-size: 13px;
    line-height: 1.6;
    color: var(--kz-text-muted);
    margin: 0;
}

/* ═══════════════════════════════════════════════════════════
   6. KZ REVIEWS SECTION (VIDEO CAROUSEL)
   ═══════════════════════════════════════════════════════════ */
.kz-reviews-section {
    padding: 15px 0 10px;
    background: var(--kz-bg-soft);
    border-radius: 28px;
}
.kz-reviews-header {
    margin-bottom: 35px;
}
.kz-reviews-eyebrow {
    display: inline-block;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.14em;
    color: var(--kz-gold);
    margin-bottom: 6px;
}
.kz-reviews-heading {
    font-size: 30px;
    font-weight: 800;
    color: var(--kz-blue);
    letter-spacing: -0.02em;
    margin: 0;
}
.kz-video-card {
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 10px 28px rgba(18, 110, 104, 0.1);
    background: #0f172a;
    border: 1px solid rgba(18, 110, 104, 0.12);
}
.kz-video-wrapper {
    position: relative;
    padding-bottom: 56.25%;
    height: 0;
    overflow: hidden;
}
.kz-video-frame {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
}
.kz-video-caption {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 10px 14px;
    background: linear-gradient(180deg, transparent 0%, rgba(12, 81, 77, 0.92) 100%);
    pointer-events: none;
}
.kz-video-caption-title {
    font-size: 12.5px;
    font-weight: 600;
    color: #ffffff;
    margin: 0;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.kz-reviews-arrow {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: var(--kz-blue) !important;
    opacity: 0.95;
    top: 50%;
    transform: translateY(-50%);
    transition: all 0.25s ease;
}
.kz-reviews-prev { left: -22px; }
.kz-reviews-next { right: -22px; }
.kz-reviews-arrow:hover {
    background: var(--kz-gold) !important;
    opacity: 1;
}
.kz-reviews-social-bar {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 35px;
    gap: 14px;
}
.kz-reviews-social-badge {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: var(--kz-blue);
    color: var(--kz-gold);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    box-shadow: 0 6px 18px rgba(18, 110, 104, 0.2);
}
.kz-reviews-social-nav {
    display: flex;
    gap: 10px;
}
.kz-reviews-social-link {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: #ffffff;
    border: 1px solid rgba(18, 110, 104, 0.12);
    color: var(--kz-blue);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13.5px;
    text-decoration: none;
    transition: all 0.25s ease;
}
.kz-reviews-social-link:hover {
    background: var(--kz-blue);
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(18, 110, 104, 0.2);
}

/* ═══════════════════════════════════════════════════════════
   7. KZ SPITI PROMO SECTION
   ═══════════════════════════════════════════════════════════ */
.kz-spiti-section {
    padding: 30px 0 40px;
}
.kz-spiti-banner-card {
    width: 100%;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 16px 40px rgba(18, 110, 104, 0.18);
}
.kz-spiti-banner-inner {
    position: relative;
    padding: 55px 36px;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    color: #ffffff;
}
.kz-spiti-banner-inner::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, rgba(12, 81, 77, 0.92) 0%, rgba(18, 110, 104, 0.72) 55%, rgba(0, 0, 0, 0.3) 100%);
    pointer-events: none;
}
.kz-spiti-title {
    position: relative;
    z-index: 2;
    font-size: 30px;
    font-weight: 800;
    line-height: 1.25;
    margin-bottom: 12px;
    color: #ffffff;
}
.kz-spiti-tag {
    color: var(--kz-gold);
    font-weight: 800;
}
.kz-spiti-badge {
    position: relative;
    z-index: 2;
    font-size: 14px;
    font-weight: 600;
    color: rgba(255, 255, 255, 0.95);
    margin: 0;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(8px);
    padding: 8px 18px;
    border-radius: 30px;
    border: 1px solid rgba(255, 255, 255, 0.25);
    display: inline-block;
}

/* ═══════════════════════════════════════════════════════════
   8. KZ COUNTER TILES
   ═══════════════════════════════════════════════════════════ */
.kz-counter-section {
    padding: 20px 0 40px;
}
.kz-count-box {
    background: #ffffff;
    border: 1px solid var(--kz-border);
    border-radius: 18px;
    padding: 22px 16px;
    text-align: center;
    box-shadow: 0 6px 18px rgba(18, 110, 104, 0.04);
    transition: all 0.3s ease;
    height: 100%;
}
.kz-count-box:hover {
    border-color: var(--kz-blue);
    transform: translateY(-5px);
    box-shadow: 0 14px 30px rgba(18, 110, 104, 0.1);
}
.kz-count-ico {
    font-size: 2.2rem;
    color: var(--kz-blue);
    margin-bottom: 10px;
    transition: transform 0.3s ease;
}
.kz-count-box:hover .kz-count-ico {
    color: var(--kz-gold);
    transform: scale(1.1);
}
.kz-count-val {
    font-size: 19px;
    font-weight: 800;
    color: var(--kz-blue);
    margin-bottom: 3px;
}
.kz-count-lbl {
    font-size: 12.5px;
    color: var(--kz-text-muted);
    margin: 0;
}

/* ═══════════════════════════════════════════════════════════
   9. KZ BLOG SECTION
   ═══════════════════════════════════════════════════════════ */
.kz-blog-section {
    padding: 0px 0 15px;
    background: #ffffff;
}
.kz-blog-header {
    text-align: center;
    margin-bottom: 45px;
}
.kz-blog-eyebrow {
    display: inline-block;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.14em;
    color: var(--kz-gold);
    margin-bottom: 6px;
}
.kz-blog-heading {
    font-size: 32px;
    font-weight: 800;
    color: var(--kz-blue);
    margin: 0;
    letter-spacing: -0.02em;
}
.kz-blog-card {
    background: #ffffff;
    border-radius: 18px;
    overflow: hidden;
    border: 1px solid var(--kz-border);
    box-shadow: 0 6px 20px rgba(18, 110, 104, 0.05);
    height: 100%;
    display: flex;
    flex-direction: column;
}
.kz-blog-media {
    position: relative;
    height: 190px;
    overflow: hidden;
    background: #f1f5f9;
}
.kz-blog-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}
.kz-blog-card:hover .kz-blog-media img {
    transform: scale(1.08);
}
.kz-blog-pill-date {
    position: absolute;
    top: 12px;
    left: 12px;
    background: var(--kz-blue);
    color: #ffffff;
    font-size: 11px;
    font-weight: 700;
    padding: 4px 12px;
    border-radius: 20px;
    text-decoration: none;
    box-shadow: 0 4px 10px rgba(18, 110, 104, 0.3);
}
.kz-blog-pill-read {
    position: absolute;
    bottom: 12px;
    right: 12px;
    background: rgba(255, 255, 255, 0.94);
    backdrop-filter: blur(6px);
    color: var(--kz-blue-dark);
    font-size: 11px;
    font-weight: 700;
    padding: 3px 10px;
    border-radius: 20px;
}
.kz-blog-content {
    padding: 16px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}
.kz-blog-title {
    font-size: 15px;
    font-weight: 700;
    line-height: 1.4;
    margin: 0 0 14px;
    flex-grow: 1;
}
.kz-blog-title a {
    color: var(--kz-blue);
    text-decoration: none;
    transition: color 0.2s ease;
}
.kz-blog-title a:hover {
    color: var(--kz-gold);
}
.kz-blog-link {
    display: inline-flex;
    align-items: center;
    justify-content: space-between;
    font-size: 12px;
    font-weight: 700;
    color: var(--kz-blue);
    text-decoration: none;
    padding-top: 10px;
    border-top: 1px solid var(--kz-border);
    transition: color 0.2s ease;
}
.kz-blog-link:hover {
    color: var(--kz-gold);
}
.kz-blog-arrow-circle {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background: rgba(18, 110, 104, 0.08);
    color: var(--kz-blue);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    transition: all 0.25s ease;
}
.kz-blog-link:hover .kz-blog-arrow-circle {
    background: var(--kz-gold);
    color: #000000;
    transform: translateX(3px);
}
.kz-blog-footer-action {
    margin-top: 40px;
}
.kz-blog-viewall-btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: var(--kz-blue);
    color: #ffffff !important;
    font-size: 13.5px;
    font-weight: 700;
    padding: 10px 22px;
    border-radius: 30px;
    text-decoration: none;
    transition: all 0.25s ease;
    box-shadow: 0 6px 18px rgba(18, 110, 104, 0.2);
}
.kz-blog-viewall-btn:hover {
    background: var(--kz-blue-dark);
    transform: translateY(-2px);
    box-shadow: 0 10px 24px rgba(18, 110, 104, 0.3);
}
.kz-blog-viewall-ico {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background: var(--kz-gold);
    color: #000000;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
}

/* ═══════════════════════════════════════════════════════════
   10. KZ FAQS SECTION
   ═══════════════════════════════════════════════════════════ */
.kz-faq-section {
    padding: 10px 0 15px;
    background: var(--kz-bg-soft);
}
.kz-faq-header {
    text-align: center;
    margin-bottom: 40px;
}
.kz-faq-eyebrow {
    display: inline-block;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.14em;
    color: var(--kz-gold);
    margin-bottom: 6px;
}
.kz-faq-heading {
    font-size: 32px;
    font-weight: 800;
    color: var(--kz-blue);
    margin: 0;
    letter-spacing: -0.02em;
}
.kz-faq-list-wrap {
    max-width: 860px;
    margin: 0 auto;
}
.kz-faq-card {
    background: #ffffff;
    border: 1px solid var(--kz-border);
    border-radius: 16px;
    margin-bottom: 12px;
    box-shadow: 0 4px 12px rgba(18, 110, 104, 0.03);
    overflow: hidden;
    transition: all 0.25s ease;
}
.kz-faq-card:hover,
.kz-faq-card.active {
    border-color: var(--kz-blue);
    box-shadow: 0 8px 24px rgba(18, 110, 104, 0.08);
}
.kz-faq-trigger {
    width: 100%;
    border: none;
    background: transparent;
    padding: 16px 20px;
    display: flex;
    align-items: center;
    text-align: left;
    cursor: pointer;
    font-size: 14.5px;
    font-weight: 700;
    color: var(--kz-blue);
    gap: 12px;
    transition: color 0.2s ease;
}
.kz-faq-num {
    width: 28px;
    height: 28px;
    border-radius: 8px;
    background: rgba(18, 110, 104, 0.08);
    color: var(--kz-blue);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 800;
    flex-shrink: 0;
}
.kz-faq-question-txt {
    flex-grow: 1;
}
.kz-faq-chevron {
    width: 26px;
    height: 26px;
    border-radius: 50%;
    background: #f1f5f9;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    flex-shrink: 0;
    transition: transform 0.25s ease, background 0.25s ease;
}
.kz-faq-chevron::after {
    content: '\25BC';
    font-size: 9px;
    color: var(--kz-blue);
    transition: transform 0.25s ease;
}
.kz-faq-trigger:not(.collapsed) .kz-faq-chevron {
    background: var(--kz-blue);
}
.kz-faq-trigger:not(.collapsed) .kz-faq-chevron::after {
    color: #ffffff;
    transform: rotate(180deg);
}
.kz-faq-collapse-body {
    padding: 0 20px 18px 60px;
}
.kz-faq-paragraph {
    font-size: 13.5px;
    line-height: 1.65;
    color: var(--kz-text-muted);
    margin: 0;
}
.kz-faq-footer-action {
    margin-top: 35px;
}
.kz-faq-btn-more {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: var(--kz-blue);
    color: #ffffff !important;
    font-size: 13.5px;
    font-weight: 700;
    padding: 10px 22px;
    border-radius: 30px;
    text-decoration: none;
    transition: all 0.25s ease;
    box-shadow: 0 6px 18px rgba(18, 110, 104, 0.2);
}
.kz-faq-btn-more:hover {
    background: var(--kz-blue-dark);
    transform: translateY(-2px);
    box-shadow: 0 10px 24px rgba(18, 110, 104, 0.3);
}
.kz-faq-btn-ico {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background: var(--kz-gold);
    color: #000000;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
}

/* ═══════════════════════════════════════════════════════════
   11. KZ CONTACT SECTION
   ═══════════════════════════════════════════════════════════ */
.kz-contact-section {
    padding: 10px 0 15px;
    background: #ffffff;
}
.kz-contact-card {
    background: var(--kz-bg-soft);
    border: 1px solid var(--kz-border);
    border-radius: var(--kz-radius-lg);
    padding: 40px;
    box-shadow: 0 10px 30px rgba(18, 110, 104, 0.05);
}
.kz-contact-eyebrow {
    display: inline-block;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.14em;
    color: var(--kz-gold);
    margin-bottom: 6px;
}
.kz-contact-title {
    font-size: 30px;
    font-weight: 800;
    color: var(--kz-blue);
    margin-bottom: 8px;
}
.kz-contact-subtitle {
    font-size: 13.5px;
    color: var(--kz-text-muted);
    margin-bottom: 28px;
}
.kz-form-field {
    position: relative;
    margin-bottom: 16px;
}
.kz-form-input, .kz-form-select, .kz-form-textarea {
    width: 100%;
    background: #ffffff;
    border: 1px solid #cbd5e1;
    border-radius: 12px;
    padding: 12px 18px 12px 42px;
    font-size: 13.5px;
    color: var(--kz-text-main);
    transition: all 0.25s ease;
}
.kz-form-textarea {
    padding-left: 18px;
    resize: vertical;
}
.kz-form-input:focus, .kz-form-select:focus, .kz-form-textarea:focus {
    border-color: var(--kz-blue);
    box-shadow: 0 0 0 3px rgba(18, 110, 104, 0.12);
    outline: none;
}
.kz-form-icon {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    width: 16px;
    height: 16px;
    pointer-events: none;
    opacity: 0.6;
}
.kz-contact-submit-btn {
    background: var(--kz-blue);
    color: #ffffff;
    border: none;
    font-size: 14px;
    font-weight: 700;
    padding: 12px 28px;
    border-radius: 30px;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    transition: all 0.25s ease;
    box-shadow: 0 6px 18px rgba(18, 110, 104, 0.25);
    cursor: pointer;
}
.kz-contact-submit-btn:hover {
    background: var(--kz-gold);
    color: #000000;
    transform: translateY(-2px);
    box-shadow: 0 10px 24px rgba(214, 179, 106, 0.35);
}

/* ═══════════════════════════════════════════════════════════
   12. SWIPER DOTS REFINEMENTS
   ═══════════════════════════════════════════════════════════ */
.kz-swiper-dots {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-top: 25px;
}
.kz-swiper-dots .swiper-pagination-bullet {
    width: 9px;
    height: 9px;
    border-radius: 50%;
    background: #cbd5e1;
    opacity: 1;
    transition: all 0.3s ease;
}
.kz-swiper-dots .swiper-pagination-bullet-active {
    width: 24px;
    border-radius: 10px;
    background: var(--kz-blue);
}
.kz-glass-dots .swiper-pagination-bullet {
    background: rgba(255, 255, 255, 0.35);
}
.kz-glass-dots .swiper-pagination-bullet-active {
    background: var(--kz-gold);
    width: 24px;
    border-radius: 10px;
}

/* ═══════════════════════════════════════════════════════════
   13. KZ GALLERY SECTION (PREMIUM SWIPER & LIGHTBOX)
   ═══════════════════════════════════════════════════════════ */
.kz-gallery-section {
    padding: 25px 0 35px;
    background: #ffffff;
    position: relative;
    overflow: hidden;
}
.kz-gallery-header {
    text-align: center;
    margin-bottom: 30px;
}
.kz-gallery-eyebrow {
    display: inline-block;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.14em;
    color: var(--kz-gold);
    margin-bottom: 6px;
}
.kz-gallery-heading {
    font-size: 32px;
    font-weight: 800;
    color: var(--kz-blue);
    margin: 0 0 8px;
    letter-spacing: -0.02em;
}
.kz-gallery-subtitle {
    font-size: 14px;
    color: var(--kz-text-muted);
    max-width: 540px;
    margin: 0 auto;
}

.kz-gallery-slider-wrap {
    position: relative;
    padding: 6px 4px 10px;
}

.kz-gallery-card {
    background: #ffffff;
    border-radius: var(--kz-radius-md);
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(18, 110, 104, 0.08);
    border: 1px solid var(--kz-border);
    transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.3s ease;
    height: 100%;
}
.kz-gallery-card:hover {
    transform: translateY(-6px);
    border-color: var(--kz-gold);
    box-shadow: 0 16px 36px rgba(18, 110, 104, 0.16);
}

.kz-gallery-img-wrap {
    position: relative;
    width: 100%;
    height: 250px;
    overflow: hidden;
    background: var(--kz-bg-soft);
}
.kz-gallery-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.65s cubic-bezier(0.16, 1, 0.3, 1), filter 0.4s ease;
}
.kz-gallery-card:hover .kz-gallery-img {
    transform: scale(1.1);
    filter: brightness(0.94);
}

/* Glassmorphism Dark Vignette Overlay */
.kz-gallery-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(12, 81, 77, 0.1) 0%, rgba(12, 81, 77, 0.35) 50%, rgba(12, 81, 77, 0.9) 100%);
    opacity: 0;
    transition: opacity 0.35s ease;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 16px;
    z-index: 2;
}
.kz-gallery-card:hover .kz-gallery-overlay {
    opacity: 1;
}

/* Center Zoom Lightbox Trigger Button */
.kz-gallery-zoom-btn {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0.6);
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    color: var(--kz-blue) !important;
    border: 2px solid var(--kz-gold);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.28);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 17px;
    text-decoration: none;
    opacity: 0;
    transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    z-index: 3;
}
.kz-gallery-card:hover .kz-gallery-zoom-btn {
    opacity: 1;
    transform: translate(-50%, -50%) scale(1);
}
.kz-gallery-zoom-btn:hover {
    background: var(--kz-blue);
    color: var(--kz-gold) !important;
    border-color: #ffffff;
    transform: translate(-50%, -50%) scale(1.15) rotate(90deg);
    box-shadow: 0 10px 28px rgba(18, 110, 104, 0.45);
}

/* Bottom Caption Details */
.kz-gallery-caption {
    margin-top: auto;
    transform: translateY(10px);
    transition: transform 0.35s ease;
}
.kz-gallery-card:hover .kz-gallery-caption {
    transform: translateY(0);
}
.kz-gallery-tag {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    background: var(--kz-gold);
    color: #000000;
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    padding: 2px 8px;
    border-radius: 12px;
    margin-bottom: 4px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
}
.kz-gallery-title {
    color: #ffffff;
    font-size: 13.5px;
    font-weight: 700;
    margin: 0;
    line-height: 1.3;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Premium Floating Arrows Based on Root Variables */
.kz-gallery-nav-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: #ffffff;
    color: var(--kz-blue);
    border: 1px solid var(--kz-border);
    box-shadow: 0 6px 20px rgba(18, 110, 104, 0.16);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    cursor: pointer;
    z-index: 10;
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    outline: none;
    padding: 0;
}
.kz-gallery-nav-btn:hover {
    background: var(--kz-blue);
    color: var(--kz-gold);
    border-color: var(--kz-blue);
    box-shadow: 0 10px 26px rgba(18, 110, 104, 0.35);
    transform: translateY(-50%) scale(1.1);
}
.kz-gallery-prev {
    left: -20px;
}
.kz-gallery-next {
    right: -20px;
}
.kz-gallery-nav-btn.swiper-button-disabled {
    opacity: 0.3;
    cursor: not-allowed;
    pointer-events: none;
}

@media (max-width: 991px) {
    .kz-gallery-prev { left: 4px; }
    .kz-gallery-next { right: 4px; }
    .kz-gallery-nav-btn {
        width: 38px;
        height: 38px;
        font-size: 15px;
        background: rgba(255, 255, 255, 0.95);
    }
    .kz-gallery-img-wrap { height: 230px; }
}

/* Built-in High-End Lightbox Modal (Guaranteed Zero-Dependency Fallback) */
.kz-lightbox-modal {
    position: fixed;
    inset: 0;
    background: rgba(12, 81, 77, 0.94);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    z-index: 99999;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 24px;
    opacity: 0;
    transition: opacity 0.3s ease;
}
.kz-lightbox-modal.kz-active {
    display: flex;
    opacity: 1;
}
.kz-lightbox-content {
    position: relative;
    max-width: 90vw;
    max-height: 85vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    transform: scale(0.92);
    transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}
.kz-lightbox-modal.kz-active .kz-lightbox-content {
    transform: scale(1);
}
.kz-lightbox-img {
    max-width: 100%;
    max-height: 78vh;
    border-radius: var(--kz-radius-md);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
    border: 2px solid rgba(214, 179, 106, 0.5);
    object-fit: contain;
}
.kz-lightbox-caption {
    color: #ffffff;
    font-size: 14.5px;
    font-weight: 600;
    margin-top: 14px;
    text-align: center;
    text-shadow: 0 2px 6px rgba(0,0,0,0.6);
}
.kz-lightbox-close {
    position: absolute;
    top: -46px;
    right: 0;
    background: rgba(255, 255, 255, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.4);
    color: #ffffff;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    cursor: pointer;
    transition: all 0.2s ease;
}
.kz-lightbox-close:hover {
    background: var(--kz-gold);
    color: #000000;
    transform: scale(1.1);
}
.kz-lightbox-prev, .kz-lightbox-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    cursor: pointer;
    transition: all 0.25s ease;
}
.kz-lightbox-prev { left: -60px; }
.kz-lightbox-next { right: -60px; }
.kz-lightbox-prev:hover, .kz-lightbox-next:hover {
    background: var(--kz-gold);
    color: #000000;
    transform: translateY(-50%) scale(1.1);
}
@media (max-width: 768px) {
    .kz-lightbox-prev { left: 10px; }
    .kz-lightbox-next { right: 10px; }
    .kz-lightbox-close { top: 12px; right: 12px; }
}

/* Responsive Tweaks */
@media (max-width: 991px) {
    .kz-about-info-wrap { padding-left: 0; margin-top: 35px; }
    .kz-about-img-frame img { height: 380px; }
    .kz-about-heading, .kz-cat-heading, .kz-cabs-heading, .kz-dest-heading, .kz-reasons-title, .kz-blog-heading, .kz-faq-heading, .kz-gallery-heading {
        font-size: 27px;
    }
}
@media (max-width: 576px) {
    .kz-about-stat-row { flex-direction: column; }
    .kz-faq-collapse-body { padding-left: 20px; }
    .kz-spiti-banner-inner { padding: 40px 20px; }
    .kz-spiti-title { font-size: 23px; }
    .kz-contact-card { padding: 24px 16px; }
}
</style>
@endsection 

@section('content')

<!--==============================
Top Announcement Marquee (Moved above Slider)
==============================-->
<style>
/* LOVE LINK - AQUATIC TEAL ANNOUNCEMENT BAR
   High-specificity important rules keep this gradient above legacy styles. */
.kt-top-marquee.ll-water-marquee {
    position: relative !important;
    isolation: isolate;
    padding: 7px 0 !important;
    overflow: hidden !important;
    background: linear-gradient(105deg, #0c514d 0%, #126e68 35%, #238d83 70%, #126e68 100%) !important;
    border-top: 1px solid rgba(214,179,106,.45) !important;
    border-bottom: 1px solid rgba(255,255,255,.22) !important;
}
.kt-top-marquee.ll-water-marquee::before,
.kt-top-marquee.ll-water-marquee::after {
    content: "";
    position: absolute;
    pointer-events: none;
    left: -8%;
    width: 116%;
    height: 20px;
    border-radius: 50%;
    filter: blur(9px);
    z-index: -1;
}
.kt-top-marquee.ll-water-marquee::before {
    top: -13px;
    background: rgba(255,255,255,.20);
}
.kt-top-marquee.ll-water-marquee::after {
    bottom: -15px;
    background: rgba(130,220,205,.22);
}
.kt-top-marquee.ll-water-marquee .ll-water-window {
    position: relative;
    overflow: hidden;
    border: 1px solid rgba(255,255,255,.24);
    border-radius: 999px;
    background: linear-gradient(90deg, rgba(255,255,255,.13), rgba(190,235,225,.18), rgba(255,255,255,.13));
    box-shadow: inset 0 1px 0 rgba(255,255,255,.20), 0 5px 16px rgba(4,45,42,.16);
    backdrop-filter: blur(9px);
    -webkit-backdrop-filter: blur(9px);
}
.kt-top-marquee.ll-water-marquee .ll-water-track {
    display: flex;
    width: max-content;
    align-items: center;
    animation: llWaterFlow 38s linear infinite;
    will-change: transform;
}
.kt-top-marquee.ll-water-marquee .ll-water-window:hover .ll-water-track {
    animation-play-state: paused;
}
.kt-top-marquee.ll-water-marquee .ll-water-message {
    display: inline-flex;
    align-items: center;
    gap: 26px;
    flex: 0 0 auto;
    padding: 7px 22px;
    white-space: nowrap;
    color: #ffffff !important;
    font: 600 12px/1.3 'Nunito Sans', sans-serif;
    letter-spacing: .035em;
}
.kt-top-marquee.ll-water-marquee .ll-water-message span {
    display: inline-flex;
    align-items: center;
    gap: 9px;
}
.kt-top-marquee.ll-water-marquee .ll-water-dot {
    width: 6px;
    height: 6px;
    display: inline-block;
    flex: 0 0 6px;
    border-radius: 50%;
    background: #d6b36a;
    box-shadow: 0 0 0 4px rgba(214,179,106,.18);
}
@keyframes llWaterFlow {
    from { transform: translateX(0); }
    to { transform: translateX(-50%); }
}
@media (prefers-reduced-motion: reduce) {
    .kt-top-marquee.ll-water-marquee .ll-water-track { animation: none; }
}
@media (max-width: 575px) {
    .kt-top-marquee.ll-water-marquee { padding: 5px 0 !important; }
    .kt-top-marquee.ll-water-marquee .ll-water-message {
        font-size: 11px;
        padding: 7px 15px;
        gap: 18px;
    }
}
</style>
<div class="kt-top-marquee ll-water-marquee">
    <div class="container">
        <div class="ll-water-window">
            <div class="ll-water-track">
                <div class="ll-water-message">
                    <span><i class="ll-water-dot"></i>
                        {{ $setting->top_marquee_text ?: 'Handcrafted Kashmir Tour Packages • Verified Houseboats • Heated Cabs & Bikes • 24/7 Local Srinagar Support' }}
                    </span>
                </div>
                <div class="ll-water-message" aria-hidden="true">
                    <span><i class="ll-water-dot"></i>
                        {{ $setting->top_marquee_text ?: 'Handcrafted Kashmir Tour Packages • Verified Houseboats • Heated Cabs & Bikes • 24/7 Local Srinagar Support' }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!--==============================
Hero Area
==============================-->
<div class="th-hero-wrapper hero-1" id="hero">

    <div class="swiper th-slider hero-slider-1" id="heroSlide1"
        data-slider-options='{"speed":1200,"autoplay":{"delay":5500,"disableOnInteraction":false},"loop":true,"watchSlidesProgress":true,"grabCursor":true}'>

        <div class="swiper-wrapper">
            @foreach($sliders as $slider)
                @php
                    $sliderButtons = is_array($slider->buttons)
                        ? $slider->buttons
                        : (json_decode((string) $slider->buttons, true) ?? []);
                @endphp
                <div class="swiper-slide">
                    <div class="hero-inner kz-hero-slide-inner">
                        <div class="th-hero-bg">
                            <img src="{{ asset('storage/' . $slider->image) }}"
                                 alt="{{ $slider->title }}"
                                 class="hero-bg-img">
                        </div>
                        <div class="kz-hero-scrim"></div>
                        @if(!empty($slider->title) || !empty($slider->subtitle) || !empty($sliderButtons))
                        <div class="container kz-hero-content-wrap">
                            <div class="kz-hero-copy">
                                @if(!empty($slider->title))
                                    @if($loop->first)
                                        <h1 class="kz-hero-title">{{ $slider->title }}</h1>
                                    @else
                                        <h2 class="kz-hero-title">{{ $slider->title }}</h2>
                                    @endif
                                @endif
                                @if(!empty($slider->subtitle))
                                    <p class="kz-hero-subtitle">{{ $slider->subtitle }}</p>
                                @endif
                                @if(!empty($sliderButtons))
                                    <div class="kz-hero-actions">
                                        @foreach($sliderButtons as $btnIdx => $btn)
                                            @php
                                                $btnTitle = is_array($btn) ? ($btn['buttons_title'] ?? ($btn['title'] ?? 'Explore')) : ($btn->buttons_title ?? 'Explore');
                                                $btnLink  = trim((string) (is_array($btn) ? ($btn['buttons_link'] ?? ($btn['link'] ?? '#')) : ($btn->buttons_link ?? '#')));
                                                $isWaBtn  = str_contains(strtolower($btnLink), 'wa.me') || strtolower($btnLink) === '#whatsapp' || (str_contains(strtolower($btnTitle), 'whatsapp') && ($btnLink === '#' || $btnLink === ''));
                                                $isModalBtn = in_array(strtolower($btnLink), ['#quote', '#modal'], true);
                                                $resolvedHref = $isWaBtn ? getWhatsappUrl($setting) : (str_starts_with($btnLink, 'http') || str_starts_with($btnLink, '#') ? $btnLink : url($btnLink));
                                            @endphp
                                            @if($isModalBtn)
                                                <button type="button" class="kz-hero-btn {{ $btnIdx === 0 ? 'kz-hero-btn-primary' : 'kz-hero-btn-secondary' }}" data-bs-toggle="modal" data-bs-target="#globalContactModal">
                                                    {{ $btnTitle }}
                                                </button>
                                            @else
                                                <a href="{{ $resolvedHref }}"
                                                   @if($isWaBtn) target="_blank" rel="noopener noreferrer" @endif
                                                   class="kz-hero-btn {{ $isWaBtn ? 'kz-hero-btn-wa' : ($btnIdx === 0 ? 'kz-hero-btn-primary' : 'kz-hero-btn-secondary') }}">
                                                    @if($isWaBtn)<i class="fa-brands fa-whatsapp"></i>@endif
                                                    <span>{{ $btnTitle }}</span>
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="th-swiper-custom">
            <button data-slider-prev="#heroSlide1" class="slider-arrow slider-prev" aria-label="Previous Slide">
                <img src="{{ asset('webassets/img/icon/right-arrow.svg') }}" alt="Previous">
            </button>
            <button data-slider-next="#heroSlide1" class="slider-arrow slider-next" aria-label="Next Slide">
                <img src="{{ asset('webassets/img/icon/left-arrow.svg') }}" alt="Next">
            </button>
        </div>

    </div>

</div>

<style>
.hero-slider-1 .kz-hero-slide-inner {
    position: relative !important;
    min-height: 480px !important;
    display: flex !important;
    align-items: center !important;
    overflow: hidden !important;
}
.hero-slider-1 .kz-hero-slide-inner > .th-hero-bg {
    position: absolute !important;
    inset: 0 !important;
    width: 100% !important;
    height: 100% !important;
    z-index: 0 !important;
    border-radius: 0 !important;
}
.hero-slider-1 .kz-hero-slide-inner > .th-hero-bg .hero-bg-img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    padding: 0 !important;
    border-radius: 0 !important;
}
.kz-hero-scrim {
    position: absolute;
    inset: 0;
    background: linear-gradient(95deg, rgba(12, 81, 77, 0.86) 0%, rgba(12, 81, 77, 0.62) 48%, rgba(12, 81, 77, 0.25) 100%);
    z-index: 1;
}
.hero-slider-1 .kz-hero-slide-inner > .kz-hero-content-wrap {
    position: relative !important;
    inset: auto !important;
    bottom: auto !important;
    width: 100% !important;
    z-index: 3 !important;
    padding-top: 56px;
    padding-bottom: 56px;
}
.kz-hero-copy {
    max-width: 680px;
}
.kz-hero-title {
    color: #ffffff;
    font-size: clamp(28px, 3.6vw, 48px);
    font-weight: 800;
    line-height: 1.18;
    margin-bottom: 14px;
    text-shadow: 0 2px 14px rgba(0, 0, 0, 0.35);
}
.kz-hero-subtitle {
    color: rgba(255, 255, 255, 0.92);
    font-size: clamp(15px, 1.3vw, 18px);
    line-height: 1.6;
    margin-bottom: 24px;
}
.kz-hero-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}
.kz-hero-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 13px 24px;
    border-radius: 12px;
    font-size: 14.5px;
    font-weight: 700;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.kz-hero-btn:hover {
    transform: translateY(-2px);
}
.kz-hero-btn-primary {
    background: #d6b36a;
    color: #0c514d;
    box-shadow: 0 8px 22px rgba(214, 179, 106, 0.35);
}
.kz-hero-btn-primary:hover {
    color: #0c514d;
    background: #e2c27d;
}
.kz-hero-btn-wa {
    background: #25D366;
    color: #ffffff;
    box-shadow: 0 8px 22px rgba(37, 211, 102, 0.32);
}
.kz-hero-btn-wa:hover {
    color: #ffffff;
    background: #1fb857;
}
.kz-hero-btn-secondary {
    background: rgba(255, 255, 255, 0.16);
    color: #ffffff;
    border: 1.5px solid rgba(255, 255, 255, 0.65);
    backdrop-filter: blur(6px);
}
.kz-hero-btn-secondary:hover {
    background: rgba(255, 255, 255, 0.26);
    color: #ffffff;
}
.kz-trust-strip {
    background: #f8fafc;
    padding: 42px 0;
    border-bottom: 1px solid rgba(18, 110, 104, 0.08);
}
.kz-trust-card {
    background: #ffffff;
    border: 1px solid rgba(18, 110, 104, 0.09);
    border-radius: 16px;
    padding: 22px 20px;
    height: 100%;
    box-shadow: 0 8px 24px rgba(12, 81, 77, 0.05);
    transition: transform 0.22s ease, box-shadow 0.22s ease;
}
.kz-trust-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 14px 30px rgba(12, 81, 77, 0.1);
}
.kz-trust-icon {
    /* Larger photo window for the four homepage trust cards */
    width: 88px;
    height: 68px;
    border-radius: 12px;
    background: #e8f3f1;
    border: 1px solid rgba(18, 110, 104, 0.12);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    color: #126e68;
    margin-bottom: 14px;
    flex: 0 0 auto;
}
.kz-trust-icon img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: inherit;
}
.kz-trust-card-title {
    font-size: 16px;
    font-weight: 800;
    color: #0c514d;
    margin-bottom: 8px;
}
.kz-trust-card-desc {
    font-size: 13.5px;
    line-height: 1.6;
    color: #475569;
    margin: 0;
}
@media (max-width: 767px) {
    .hero-slider-1 .kz-hero-slide-inner {
        min-height: 400px !important;
        height: auto !important;
    }
    .hero-slider-1 .kz-hero-slide-inner > .kz-hero-content-wrap {
        position: relative !important;
        bottom: auto !important;
        padding-top: 40px !important;
        padding-bottom: 40px !important;
    }
    .kz-trust-strip {
        padding: 30px 0;
    }
}
</style>

@if(isset($travelBestie) && $travelBestie->count() > 0)
<!--==============================
Why Book With Us — 4-Card Trust Strip
==============================-->
<section class="kz-trust-strip" aria-label="Why Book With Us">
    <div class="container">
        <div class="text-center mb-4">
            <span class="kz-reasons-eyebrow">{{ $setting->trust_eyebrow ?: 'Why Book With Us' }}</span>
            <h2 class="h3 fw-bold mt-1 mb-0" style="color: #0c514d;">{{ $setting->trust_heading ?: 'Local Expertise & Verified Comfort Across Kashmir' }}</h2>
        </div>
        <div class="row g-3 g-lg-4">
            @foreach($travelBestie->take(4) as $tbIdx => $trustItem)
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="kz-trust-card">
                        <div class="kz-trust-icon">
                            @if(!empty($trustItem->image))
                                <img src="{{ asset('storage/' . $trustItem->image) }}" alt="{{ $trustItem->title }}" width="30" height="30">
                            @else
                                @php $icons = ['fa-solid fa-mountain-sun', 'fa-solid fa-car-side', 'fa-solid fa-hotel', 'fa-solid fa-headset']; @endphp
                                <i class="{{ $icons[$tbIdx % 4] }} fs-5"></i>
                            @endif
                        </div>
                        <h3 class="kz-trust-card-title">{{ $trustItem->title }}</h3>
                        <p class="kz-trust-card-desc">{{ $trustItem->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!--==============================
Destinations Section
==============================-->
<section class="dst-section position-relative overflow-hidden">
    <div class="dst-vignette"></div>
    <div class="container dst-inner">

        <div class="row align-items-center mb-3">
            <div class="col-lg-8" data-aos="fade-right" data-aos-duration="850">
                <form class="search-form m-0" method="GET" action="{{ route('home.tour') }}">
                    <div class="kt-search-bar" style="margin-top: 5px;">
                        <i class="fa fa-search kt-s-icon"></i>
                        <input type="text" name="search" placeholder="Enter Your Dream Destination!">
                        <button type="submit" class="kt-s-btn">Search</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 d-flex justify-content-center mt-lg-0" data-aos="fade-left" data-aos-duration="850">
                <div class="dst-toggle-group" id="countryTab" role="tablist">
                    @foreach($countries as $index => $country)
                    <button class="dst-toggle-btn dst-country-tab-btn {{ $index === 0 ? 'active' : '' }}"
                            id="country-tab-{{ $country->id }}"
                            data-bs-toggle="pill"
                            data-bs-target="#country-pane-{{ $country->id }}"
                            type="button" role="tab"
                            aria-controls="country-pane-{{ $country->id }}"
                            aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                        {{ $country->name }}
                    </button>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="tab-content" id="countryTabContent">
            @foreach($countries as $index => $country)
            <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                 id="country-pane-{{ $country->id }}"
                 role="tabpanel"
                 aria-labelledby="country-tab-{{ $country->id }}">

                @if($country->states->isNotEmpty())
                <div class="dst-carousel-wrap" data-aos="fade-up" data-aos-duration="850">
                    <div class="swiper" id="stateSwiper{{ $country->id }}"
                         data-slider-options='{"breakpoints":{"0":{"slidesPerView":1.2,"spaceBetween":16},"576":{"slidesPerView":2.2,"spaceBetween":20},"992":{"slidesPerView":2.2,"spaceBetween":24},"1200":{"slidesPerView":2.8,"spaceBetween":28}},"centeredSlides":false,"loop":false,"grabCursor":true}'>
                        <div class="swiper-wrapper">
                            @foreach($country->states as $stateIndex => $state)
                            <div class="swiper-slide">
                                <a href="{{ route('home.tour.state', $state->slug) }}" 
                                   class="dst-card"
                                   data-aos="fade-up"
                                   data-aos-delay="{{ ($stateIndex % 4) * 150 + 100 }}"
                                   data-aos-duration="800">
                                    @if($state->image)
                                        <img src="{{ asset('storage/' . $state->image) }}" alt="{{ $state->name }}" class="dst-card-img">
                                    @else
                                        <div class="dst-card-img dst-card-img-placeholder"></div>
                                    @endif
                                    <span class="dst-card-overlay"></span>
                                    <h3 class="dst-card-title">{{ $state->name }}</h3>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @if($country->states->count() > 3)
                    <div class="dst-nav">
                        <button class="dst-nav-btn dst-nav-prev" id="statePrev{{ $country->id }}" type="button" aria-label="Previous">
                            <i class="ti ti-chevron-left"></i>
                        </button>
                        <button class="dst-nav-btn dst-nav-next" id="stateNext{{ $country->id }}" type="button" aria-label="Next">
                            <i class="ti ti-chevron-right"></i>
                        </button>
                    </div>
                    @endif
                </div>
                @else
                <p class="text-center dst-empty-text">No states added yet for {{ $country->name }}.</p>
                @endif

            </div>
            @endforeach
        </div>
    </div>
</section>

<!--==============================
1. About Area
==============================-->
<section class="kz-about-section" id="about-sec">
    <div class="container">
        <div class="row align-items-center">

            <!-- Image Area -->
            <div class="col-xl-6">
                <div class="kz-about-img-card" data-aos="fade-right" data-aos-duration="950">

                    @php
                        $aboutImages = is_string($setting->about_images) ? json_decode($setting->about_images, true) : ($setting->about_images ?? []);
                        $aboutImage = collect($aboutImages)->firstWhere('order', 1);
                    @endphp

                    @if(!empty($aboutImage))
                    <div class="kz-about-img-frame">
                        <img src="{{ asset('storage/' . $aboutImage['image']) }}" alt="Travel Experience">
                    </div>
                    @endif

                    <div class="kz-about-exp-badge" data-aos="zoom-in" data-aos-delay="350" data-aos-duration="750">
                        <span>15+</span>
                        <small>Years of Excellence</small>
                    </div>

                </div>
            </div>

            <!-- Content Area -->
            <div class="col-xl-6">
                <div class="kz-about-info-wrap">

                    <span class="kz-about-eyebrow" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                        {{ $setting->about_subtitle ?? 'Welcome To Love Link Tour & Travels' }}
                    </span>

                    <h2 class="kz-about-heading" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
                        {{ $setting->about_title ?? 'Crafting Unforgettable Himalayan & Kashmir Journeys' }}
                    </h2>

                    <div class="kz-about-body-text" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
                        {!! $setting->about_content !!}
                    </div>

                    <!-- Features -->
                    <div class="kz-about-features-grid">
                        @if(!empty($setting->about_ot_content))
                            @foreach($setting->about_ot_content as $itemIndex => $item)
                            <div class="kz-about-feature-pill" 
                                 data-aos="fade-up" 
                                 data-aos-delay="{{ ($itemIndex * 120) + 350 }}"
                                 data-aos-duration="800">
                                <div class="kz-about-feature-ico">
                                    <i class="fas fa-map-marked-alt"></i>
                                </div>
                                <div class="kz-about-feature-txt">
                                    <h5>{{ $item['title'] ?? '' }}</h5>
                                    <p>{{ $item['content'] ?? '' }}</p>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>

                    <!-- Animated Stats -->
                    <div class="kz-about-stat-row">
                        <div class="kz-about-stat-card" data-aos="zoom-in" data-aos-delay="400" data-aos-duration="750">
                            <h3>50,000+</h3>
                            <span>Happy Travellers</span>
                        </div>
                        <div class="kz-about-stat-card" data-aos="zoom-in" data-aos-delay="500" data-aos-duration="750">
                            <h3>2500+</h3>
                            <span>Tour Packages</span>
                        </div>
                        <div class="kz-about-stat-card" data-aos="zoom-in" data-aos-delay="600" data-aos-duration="750">
                            <h3>4.9</h3>
                            <span>Guest Rating</span>
                        </div>
                    </div>

                    <!-- CTA -->
                    <div data-aos="fade-up" data-aos-delay="650" data-aos-duration="800">
                        <a href="{{ route('aboutus.index') }}" class="kz-about-btn-cta">
                            <span>Learn More</span>
                            <span class="kz-about-btn-icon"><i class="ti ti-arrow-right"></i></span>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!--==============================
2. Category Area
==============================-->
<section class="kz-cat-section" id="categories-sec">
    <div class="container">
        <div class="kz-cat-header" data-aos="fade-up" data-aos-duration="850">
            <span class="kz-cat-eyebrow">Wonderful Places For You</span>
            <h2 class="kz-cat-heading">Tour Categories</h2>
        </div>
        
        <div class="swiper" id="kzCategorySwiper" data-aos="fade-up" data-aos-delay="150" data-aos-duration="850">
            <div class="swiper-wrapper">
                @foreach($categories as $catIndex => $category)
                <div class="swiper-slide">
                    <div class="kz-cat-card" 
                         data-aos="fade-up" 
                         data-aos-delay="{{ ($catIndex % 4) * 120 + 100 }}"
                         data-aos-duration="800">
                        <div class="kz-cat-img-wrap">
                            @if($category->image)
                                <img class="kz-cat-img" src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}">
                            @else
                                <div class="kz-cat-img kaw-state-img-placeholder"></div>
                            @endif
                            <span class="kz-cat-badge">Category</span>
                            <span class="kz-cat-tag"><i class="ti ti-compass"></i> Explore</span>
                        </div>
                        <div class="kz-cat-body">
                            <h3 class="kz-cat-title">
                                <a href="{{ route('packages.by.category', $category->slug) }}">{{ $category->name }}</a>
                            </h3>
                            <p class="kz-cat-desc">{{ !empty($category->description) ? Str::limit(strip_tags($category->description), 92) : 'Curated itineraries & bespoke travel experiences' }}</p>
                            <a class="kz-cat-btn" href="{{ route('packages.by.category', $category->slug) }}">
                                <span>View Tours</span>
                                <span class="kz-cat-btn-arrow"><i class="ti ti-arrow-up-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="kz-swiper-dots kz-cat-pagination"></div>
        </div>
    </div>
</section>

@if(isset($tours) && $tours->count() > 0)
<!--==============================
Featured Kashmir Tour Packages
==============================-->

<section class="py-5" style="background: #f8fafc;">
    <div class="container">

        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
            <div>
                <span class="kz-reasons-eyebrow">Popular Itineraries</span>

                <h2 class="h2 fw-bold mt-1 mb-0" style="color: #0c514d;">
                    Handcrafted Kashmir Tour Packages
                </h2>
            </div>

            <a href="{{ route('home.tour') }}" class="kz-cat-btn">
                <span>View All Packages</span>
                <span class="kz-cat-btn-arrow">
                    <i class="ti ti-arrow-up-right"></i>
                </span>
            </a>
        </div>

        <div class="row g-4">

            @foreach($tours->take(4) as $pkgTour)

                <div class="col-lg-3 col-md-6">

                    <div
                        class="bg-white rounded-4 overflow-hidden h-100 d-flex flex-column shadow-sm border"
                        style="border-color: rgba(18, 110, 104, 0.08) !important;"
                    >

                        <!-- Package Image -->
                        <div
                            class="position-relative"
                            style="height: 205px; overflow: hidden; background: #0f172a;"
                        >
                            <a href="{{ route('tour.details', $pkgTour->slug) }}">
                                <img
                                    src="{{ asset('storage/' . $pkgTour->image) }}"
                                    alt="{{ $pkgTour->title }}"
                                    class="w-100 h-100"
                                    style="object-fit: cover;"
                                >
                            </a>

                            @if(!empty($pkgTour->duration))
                                <span
                                    class="position-absolute top-0 start-0 m-3 badge rounded-pill"
                                    style="background: #0c514d; color: #f6cf78; font-size: 11.5px;"
                                >
                                    {{ $pkgTour->duration > 1
                                        ? ($pkgTour->duration - 1) . 'N / ' . $pkgTour->duration . 'D'
                                        : $pkgTour->duration . ' Day'
                                    }}
                                </span>
                            @endif
                        </div>

                        <!-- Package Details -->
                        <div class="p-3 p-xl-4 d-flex flex-column flex-grow-1">

                            <h3 class="h6 fw-bold mb-2" style="line-height: 1.4;">
                                <a
                                    href="{{ route('tour.details', $pkgTour->slug) }}"
                                    class="text-decoration-none"
                                    style="color: #0c514d;"
                                >
                                    {{ $pkgTour->title }}
                                </a>
                            </h3>

                            @if(!empty($pkgTour->short_description))
                                <p
                                    class="text-muted small mb-3 flex-grow-1"
                                    style="font-size: 13px; line-height: 1.55;"
                                >
                                    {{ Str::limit(strip_tags($pkgTour->short_description), 120) }}
                                </p>
                            @endif

                            <!-- Pricing Section -->
                            <div class="d-flex justify-content-between align-items-center pt-2 mt-auto border-top">

                                <div>

                                    @if(
                                        !empty($pkgTour->discount_price) &&
                                        !empty($pkgTour->price) &&
                                        $pkgTour->price > 0 &&
                                        $pkgTour->discount_price < $pkgTour->price
                                    )

                                        <span class="d-block text-muted" style="font-size: 11px;">
                                            Starting From
                                        </span>

                                        <div class="d-flex align-items-center flex-wrap gap-2">

                                            <!-- Discounted Price -->
                                            <strong style="color: #126e68; font-size: 16px;">
                                                ₹ {{ number_format((float) $pkgTour->discount_price, 2) }}
                                            </strong>

                                            <!-- Original Price -->
                                            <del class="text-muted" style="font-size: 12px;">
                                                ₹ {{ number_format((float) $pkgTour->price, 2) }}
                                            </del>

                                            <!-- Discount Percentage -->
                                            <span class="badge bg-success">
                                                {{ round(
                                                    (($pkgTour->price - $pkgTour->discount_price) / $pkgTour->price) * 100
                                                ) }}% OFF
                                            </span>

                                        </div>

                                    @elseif(!empty($pkgTour->price))

                                        <span class="d-block text-muted" style="font-size: 11px;">
                                            Starting From
                                        </span>

                                        <strong style="color: #126e68; font-size: 16px;">
                                            ₹ {{ number_format((float) $pkgTour->price, 2) }}
                                        </strong>

                                    @else

                                        <strong style="color: #126e68; font-size: 14px;">
                                            Custom Quote
                                        </strong>

                                    @endif

                                </div>

                                <!-- View Details Button -->
                                <a
                                    href="{{ route('tour.details', $pkgTour->slug) }}"
                                    class="btn btn-sm fw-semibold text-white px-3"
                                    style="background: #126e68; border-radius: 9px;"
                                >
                                    View Details
                                </a>

                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </div>
</section>
@endif

<!--==============================
3. Cabs Section (In-Between)
==============================-->
@php
    $homeCabs = isset($cabs) && $cabs->isNotEmpty() 
        ? $cabs 
        : (\App\Models\Cab::where('status', 1)->orderByRaw('CASE WHEN `order` IS NULL THEN 1 ELSE 0 END, `order` ASC, id DESC')->get() ?? collect());
@endphp
@if(!empty($homeCabs) && $homeCabs->count() > 0)
<section class="kz-cabs-section" id="cabs-sec">
    <div class="container">
        <div class="kz-cabs-header" data-aos="fade-up" data-aos-duration="850">
            <span class="kz-cabs-eyebrow">Reliable & Comfortable Rides</span>
            <h2 class="kz-cabs-heading">Available Cabs & Fleet</h2>
            <p class="kz-cabs-subtitle">Well-maintained, sanitized vehicles with experienced local drivers for a smooth journey</p>
        </div>

        <div class="swiper" id="kzCabsSwiper" data-aos="fade-up" data-aos-delay="150" data-aos-duration="850">
            <div class="swiper-wrapper">
                @foreach($homeCabs as $cabIndex => $cab)
                <div class="swiper-slide">
                    <div class="kz-cab-box"
                         data-aos="fade-up" 
                         data-aos-delay="{{ ($cabIndex % 4) * 100 + 80 }}"
                         data-aos-duration="750">
                        <div class="kz-cab-media">
                            @if(!empty($cab->image))
                                <img src="{{ asset('storage/' . $cab->image) }}" alt="{{ $cab->name }}">
                            @else
                                <div class="kaw-state-img-placeholder"></div>
                            @endif
                            <span class="kz-cab-badge">Verified Fleet</span>
                        </div>
                        <div class="kz-cab-content">
                            <h4 class="kz-cab-title">
                                <a href="{{ route('home.cabdetails', $cab->slug) }}">{{ $cab->name }}</a>
                            </h4>
                            <span class="kz-cab-loc">
                                <i class="ti ti-map-pin"></i> {{ $cab->location ?? 'Kashmir' }}
                            </span>
                            <p class="kz-cab-desc">
                                {{ Str::limit($cab->short_description ?? 'Comfortable AC cab with professional chauffeur.', 48) }}
                            </p>
                            <div class="kz-cab-footer">
                                <a href="{{ route('home.cabdetails', $cab->slug) }}" class="kz-cab-link">
                                    Book Now <i class="ti ti-arrow-up-right"></i>
                                </a>
                                <a href="{{ route('home.cabdetails', $cab->slug) }}" class="kz-cab-btn">
                                    Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="kz-swiper-dots kz-cabs-pagination"></div>
        </div>
    </div>
</section>
@endif

<!--==============================
4. Popular Destinations (Glass Effect)
==============================-->
<section class="kz-dest-section" id="destination-sec">
    <div class="container">
        <div class="kz-dest-header" data-aos="fade-down" data-aos-duration="850">
            <span class="kz-dest-eyebrow">Top Places For You</span>
            <h2 class="kz-dest-heading">Popular Destinations</h2>
            <p class="kz-dest-subtitle">Explore Kashmir’s most captivating valleys, lakes, meadows and alpine wonderlands</p>
        </div>

        <div class="swiper" id="kzDestSwiper" data-aos="fade-up" data-aos-delay="150" data-aos-duration="850">
            <div class="swiper-wrapper">
                @foreach($destinations as $destIndex => $destination)
                <div class="swiper-slide">
                    <div class="kz-glass-card" 
                         data-aos="fade-up" 
                         data-aos-delay="{{ ($destIndex % 4) * 120 + 100 }}"
                         data-aos-duration="800">
                        <div class="kz-glass-img-wrap">
                            @if($destination->image)
                                <img class="kz-glass-img" src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->name }}">
                            @else
                                <div class="kz-glass-img kaw-state-img-placeholder"></div>
                            @endif
                            <span class="kz-glass-badge">FEATURED</span>
                            <span class="kz-glass-count">{{ getDestinationTourCountBySlug($destination->slug)->tours_count }} Packages</span>
                        </div>
                        <div class="kz-glass-body">
                            <h3 class="kz-glass-title">
                                <a href="{{ route('destination.details', $destination->slug) }}">{{ $destination->name }}</a>
                            </h3>
                            <p class="kz-glass-desc">Experience pristine valleys, snow trails and local culture</p>
                            <a href="{{ route('destination.details', $destination->slug) }}" class="kz-glass-btn">
                                <span>Explore Destination</span>
                                <span class="kz-glass-btn-arrow"><i class="ti ti-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="kz-swiper-dots kz-glass-dots kz-dest-pagination"></div>
        </div>
    </div>
</section>

<!--==============================
5. Reasons Section ("Why Choose Us" - Overflow items only; primary 4 sit under Hero)
==============================-->
@if(isset($travelBestie) && $travelBestie->count() > 4)
<section class="kz-reasons-section">
    <div class="container">
        <div class="kz-reasons-header text-center" data-aos="fade-up" data-aos-duration="850">
            <span class="kz-reasons-eyebrow">{{ $setting->trust_eyebrow ?: 'Why Choose Us' }}</span>
            <h2 class="kz-reasons-title">
                Reasons To Make Us Your <em>Travel Bestie.</em>
            </h2>
        </div>
        <div class="row g-4">
            @foreach($travelBestie->slice(4) as $tbIndex => $travel)
            <div class="col-lg-4 col-md-6">
                <div class="kz-reason-card" 
                     data-aos="fade-up" 
                     data-aos-delay="{{ ($tbIndex % 3) * 150 + 100 }}"
                     data-aos-duration="800">
                    <div class="kz-reason-icon-wrap">
                        @if($travel->image)
                            <img src="{{ asset('storage/' . $travel->image) }}" alt="{{ $travel->title }}" width="36" height="36">
                        @else
                            <i class="fas fa-gem text-primary fs-4"></i>
                        @endif
                    </div>
                    <h3 class="kz-reason-heading">{{ $travel->title }}</h3>
                    <p class="kz-reason-paragraph">
                        {{ $travel->description }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!--==============================
7. Promo Offer (Spiti)
==============================-->
@if($sliderSpiti)
<div class="container kz-spiti-section">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="kz-spiti-banner-card" data-aos="zoom-in" data-aos-duration="950">
                <div class="kz-spiti-banner-inner" 
                     style="background-image: url('{{ asset('storage/' . $sliderSpiti->image) }}');">
                     
                    <h3 class="kz-spiti-title" data-aos="fade-up" data-aos-delay="150" data-aos-duration="800">
                        <span class="kz-spiti-tag">{{ $sliderSpiti->title ?? 'Spiti' }}</span>
                        {{ $sliderSpiti->subtitle ?? 'is colder, than your ex but prettier' }}
                    </h3>

                    <p class="kz-spiti-badge" data-aos="fade-up" data-aos-delay="250" data-aos-duration="800">
                       <i class="fas fa-tag me-1 text-warning"></i> Book your summer Kashmir Tour and get flat ₹1999/- off
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<!--==============================
8. Stats Counter Grid
==============================-->
<div class="container kz-counter-section">
    <div class="row g-4">
        @if(!empty($setting->home_counter))
            @foreach($setting->home_counter as $counterIndex => $item)
                <div class="col-md-6 col-lg-3">
                  <div class="kz-count-box" 
                       data-aos="fade-up" 
                       data-aos-delay="{{ ($counterIndex * 120) + 100 }}"
                       data-aos-duration="800">
                    <div class="kz-count-ico">
                      <i class="{{ $item['count_number'] ?? 'fas fa-award' }}"></i>
                    </div>
                    <h5 class="kz-count-val">{{ $item['count_sufix'] ?? '' }}</h5>
                    <p class="kz-count-lbl">
                      {{ $item['count_text'] ?? '' }}
                    </p>
                  </div>
                </div> 
            @endforeach
        @endif 
    </div>
</div>

<!--==============================
Brand Partners
==============================-->
<div class="brand-area overflow-hidden py-4">
    <div class="container th-container">
        <div class="swiper th-slider brandSlider1" 
             id="brandSlider1" 
             data-aos="fade-in" 
             data-aos-duration="1000"
             data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"6"},"1400":{"slidesPerView":"8"}}}'>
            <div class="swiper-wrapper">
                @foreach($partners as $partnerIndex => $partner)
                <div class="swiper-slide">
                    <div class="brand-box" data-aos="zoom-in" data-aos-delay="{{ ($partnerIndex % 8) * 70 + 50 }}" data-aos-duration="700">
                        <a href="{{ $partner->link }}">
                            <img class="original" src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->name }}">
                            <img class="gray" src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->name }}">
                        </a>
                        <p class="d-none">{{ $partner->name }}</p>
                    </div>
                </div> 
                @endforeach
            </div>
        </div>
    </div>
</div>

@include('frontend.partials.customization-banner')

<!--==============================
9. Blog Area
==============================-->
<section class="kz-blog-section" id="blog-sec">
    <div class="container">
        <div class="kz-blog-header" data-aos="fade-down" data-aos-duration="850">
            <span class="kz-blog-eyebrow">Explore ideas, tips & experiences</span>
            <h2 class="kz-blog-heading">Blog & Insights</h2>
        </div>

        <div class="row g-4">
            @foreach($blogs->take(8) as $blogIndex => $blog)
            <div class="col-md-6 col-lg-3">
                <div class="kz-blog-card" 
                     data-aos="fade-up" 
                     data-aos-delay="{{ ($blogIndex % 4) * 120 + 100 }}"
                     data-aos-duration="800">
                    <div class="kz-blog-media">
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                        <a href="{{ route('blog.details', $blog->slug) }}" class="kz-blog-pill-date">
                            {{ \Carbon\Carbon::parse($blog->published_at)->format('M d, Y') }}
                        </a>
                        <span class="kz-blog-pill-read">6 min read</span>
                    </div>
                    <div class="kz-blog-content">
                        <h3 class="kz-blog-title">
                            <a href="{{ route('blog.details', $blog->slug) }}">{{ $blog->title }}</a>
                        </h3>
                        <a href="{{ route('blog.details', $blog->slug) }}" class="kz-blog-link">
                            <span>Read More</span>
                            <span class="kz-blog-arrow-circle"><i class="ti ti-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="kz-blog-footer-action text-center" data-aos="fade-up" data-aos-delay="200" data-aos-duration="750">
            <a href="{{ route('home.blogs') }}" class="kz-blog-viewall-btn">
                <span>View All Blogs</span>
                <span class="kz-blog-viewall-ico"><i class="ti ti-arrow-right"></i></span>
            </a>
        </div>
    </div>
</section>

<!--==============================
10. FAQ Area
==============================-->
<section class="kz-faq-section" id="faq-sec">
    <div class="container">
        <div class="kz-faq-header text-center" data-aos="fade-up" data-aos-duration="850">
            <span class="kz-faq-eyebrow">Frequently Asked Questions</span>
            <h2 class="kz-faq-heading">Find Quick Answers To Your Travel Queries</h2>
        </div>
        <div class="kz-faq-list-wrap" id="faqAccordion">
            @foreach($faqs as $faqIndex => $faq)
            <div class="kz-faq-card {{ $loop->first ? 'active' : '' }}" 
                 data-aos="fade-up" 
                 data-aos-delay="{{ ($faqIndex * 70) + 50 }}"
                 data-aos-duration="800">
                <div id="collapse-item-{{ $loop->index }}">
                    <button
                        class="kz-faq-trigger {{ $loop->first ? '' : 'collapsed' }}"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapse-{{ $loop->index }}"
                        aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                        aria-controls="collapse-{{ $loop->index }}">
                        <span class="kz-faq-num">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        <span class="kz-faq-question-txt">{{ $faq->question }}</span>
                        <span class="kz-faq-chevron"></span>
                    </button>
                </div>
                <div id="collapse-{{ $loop->index }}"
                     class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                     aria-labelledby="collapse-item-{{ $loop->index }}"
                     data-bs-parent="#faqAccordion">
                    <div class="kz-faq-collapse-body">
                        <p class="kz-faq-paragraph">{{ $faq->answer }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="kz-faq-footer-action text-center" data-aos="fade-up" data-aos-delay="200" data-aos-duration="750">
            <a href="{{ route('home.faq') }}" class="kz-faq-btn-more">
                <span>See More FAQs</span>
                <span class="kz-faq-btn-ico"><i class="ti ti-arrow-right"></i></span>
            </a>
        </div>
    </div>
</section>



<!--==============================
13. Recent Gallery (PREMIUM SWIPER & LIGHTBOX)
==============================-->
@if(isset($galleries) && $galleries->isNotEmpty())
<section class="kz-gallery-section" id="gallery-sec">
    <div class="container">
        <div class="kz-gallery-header" data-aos="fade-down" data-aos-duration="850">
            <span class="kz-gallery-eyebrow">Captured Moments</span>
            <h2 class="kz-gallery-heading">Recent Travel Gallery</h2>
            <p class="kz-gallery-subtitle">A glimpse into unforgettable memories, snowy peaks, and breathtaking valleys</p>
        </div>

        <div class="kz-gallery-slider-wrap" data-aos="fade-up" data-aos-duration="850">
            <div class="swiper" id="kzGallerySwiper">
                <div class="swiper-wrapper">
                    @foreach($galleries as $galleryIndex => $gallery)
                    <div class="swiper-slide">
                        <div class="kz-gallery-card">
                            <div class="kz-gallery-img-wrap">
                                <img src="{{ asset('storage/' . $gallery->file) }}" 
                                     alt="{{ $gallery->title ?? 'Kashmir Travel Memory' }}" 
                                     class="kz-gallery-img" 
                                     loading="lazy">

                                <div class="kz-gallery-overlay">
                                    <!-- Lightbox Open Button -->
                                    

                                    <div class="kz-gallery-caption">
                                        
                                        @if(!empty($gallery->title))
                                            <h5 class="kz-gallery-title">{{ $gallery->title }}</h5>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Custom Branded Arrows Based on Root Variables -->
            <button class="kz-gallery-nav-btn kz-gallery-prev" id="kzGalleryPrev" type="button" aria-label="Previous image">
                <i class="bi bi-chevron-left"></i>
            </button>
            <button class="kz-gallery-nav-btn kz-gallery-next" id="kzGalleryNext" type="button" aria-label="Next image">
                <i class="bi bi-chevron-right"></i>
            </button>

            <!-- Swiper Pagination Dots -->
            <div class="kz-swiper-dots kz-gallery-pagination"></div>
        </div>
    </div>
</section>

<!-- High-End Zero-Dependency Modal Lightbox Fallback -->
<div class="kz-lightbox-modal" id="kzGalleryLightbox" aria-hidden="true" role="dialog">
    <div class="kz-lightbox-content">
        <button class="kz-lightbox-close" id="kzLightboxClose" type="button" aria-label="Close modal">&times;</button>
        <button class="kz-lightbox-prev" id="kzLightboxPrev" type="button" aria-label="Previous">&lsaquo;</button>
        <img src="" alt="Enlarged view" class="kz-lightbox-img" id="kzLightboxImg">
        <p class="kz-lightbox-caption" id="kzLightboxCaption"></p>
        <button class="kz-lightbox-next" id="kzLightboxNext" type="button" aria-label="Next">&rsaquo;</button>
    </div>
</div>
@endif

<!--==============================
6. Reviews & Testimonials
==============================-->
<section class="kz-reviews-section">
    <div class="container">
        <div class="kz-reviews-header text-center" data-aos="fade-up" data-aos-duration="850">
            <span class="kz-reviews-eyebrow">Reviews That Make Me Blush</span>
            <h2 class="kz-reviews-heading">Testimonials, Reviews, Experiences & Virtual Tours</h2>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-10" data-aos="zoom-in" data-aos-duration="850">
                <div id="reviewsCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @php
                            $chunks = $youtube->chunk(3);
                        @endphp

                        @foreach($chunks as $key => $chunk)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <div class="row g-4">
                                    @foreach($chunk as $videoIndex => $y)
                                        <div class="col-12 col-md-4">
                                            <div class="kz-video-card" 
                                                 data-aos="fade-up" 
                                                 data-aos-delay="{{ ($videoIndex * 120) + 100 }}"
                                                 data-aos-duration="800">
                                                <div class="kz-video-wrapper">
                                                    <iframe class="kz-video-frame" 
                                                        src="{{ $y->youtube_link }}" 
                                                        allowfullscreen>
                                                    </iframe>
                                                    <div class="kz-video-caption">
                                                        <h5 class="kz-video-caption-title">{{ $y->title }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <button class="carousel-control-prev kz-reviews-arrow kz-reviews-prev" type="button" data-bs-target="#reviewsCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next kz-reviews-arrow kz-reviews-next" type="button" data-bs-target="#reviewsCarousel" data-bs-slide="next">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="kz-reviews-social-bar" data-aos="fade-up" data-aos-duration="850">
            <div class="kz-reviews-social-badge" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="700">
                <i class="fas fa-mountain"></i>
            </div>
            <div class="kz-reviews-social-nav" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                <a href="#" class="kz-reviews-social-link"><i class="fab fa-twitter"></i></a>
                <a href="#" class="kz-reviews-social-link"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="kz-reviews-social-link"><i class="fab fa-instagram"></i></a>
                <a href="#" class="kz-reviews-social-link"><i class="fab fa-linkedin-in"></i></a>
                <a href="{{ getWhatsappUrl($setting) }}" target="_blank" rel="noopener noreferrer" class="kz-reviews-social-link"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>
</section>
@include('frontend.components.google-reviews')

<!--==============================
11. Contact Us Form
==============================-->
<section class="kz-contact-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="kz-contact-card" data-aos="fade-up" data-aos-duration="850">
                    <div class="text-center mb-4">
                        <span class="kz-contact-eyebrow">Get In Touch</span>
                        <h3 class="kz-contact-title">Contact Us</h3>
                        <p class="kz-contact-subtitle">Have questions about your Kashmir trip? Reach out to our travel experts anytime.</p>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('home.contact.submit') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                                <div class="kz-form-field">
                                    <input type="text" class="kz-form-input" name="name" value="{{ old('name') }}" id="name3" placeholder="First Name" required>
                                    <img src="{{ asset('webassets/img/icon/user.svg') }}" alt="" class="kz-form-icon">
                                </div>
                            </div>
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="150" data-aos-duration="700">
                                <div class="kz-form-field">
                                    <input type="tel" class="kz-form-input" name="number" value="{{ old('number') }}" id="number" placeholder="Your Mobile Number" required>
                                    <img src="{{ asset('webassets/img/icon/call.svg') }}" alt="" class="kz-form-icon">
                                </div>
                            </div>
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                                <div class="kz-form-field">
                                    <input type="email" class="kz-form-input" name="email" value="{{ old('email') }}" id="email3" placeholder="Your Email Address" required>
                                    <img src="{{ asset('webassets/img/icon/mail.svg') }}" alt="" class="kz-form-icon">
                                </div>
                            </div>
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="250" data-aos-duration="700">
                                <div class="kz-form-field">
                                    <select name="subject" id="subject" class="kz-form-select">
                                        <option value="Select Tour Type" selected disabled>Select Tour Type</option>
                                        <option value="Kashmir Honeymoon Package">Kashmir Honeymoon Package</option>
                                        <option value="Kashmir Family Tour">Kashmir Family Tour</option>
                                        <option value="Ladakh Adventure Tour">Ladakh Adventure Tour</option>
                                        <option value="Gulmarg Ski & Snow Package">Gulmarg Ski & Snow Package</option>
                                        <option value="Custom Group Tour">Custom Group Tour</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                                <div class="kz-form-field">
                                    <textarea name="message" id="message" cols="30" rows="3" class="kz-form-textarea" placeholder="Tell us about your travel dates, group size, and preferences...">{{ old('message') }}</textarea>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-3" data-aos="fade-up" data-aos-delay="350" data-aos-duration="700">
                                <button type="submit" class="kz-contact-submit-btn">
                                    <span>Send Message</span>
                                    <img src="{{ asset('webassets/img/icon/plane.svg') }}" alt="" width="16" height="16">
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     ALL PAGE SCRIPTS
     ═══════════════════════════════════════════════════════════ -->
<script src="{{ asset('webassets/js/google-reviews.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


<style id="love-link-home-theme-overrides">
/* ==========================================================
   LOVE LINK HOMEPAGE THEME — TEAL / TURQUOISE / CHAMPAGNE
   Visual-only overrides. Existing CMS data and interactions remain intact.
   ========================================================== */
:root {
    --kz-blue: #126e68;
    --kz-blue-dark: #0c514d;
    --kz-blue-light: #21877f;
    --kz-gold: #d6b36a;
    --kz-gold-hover: #bd9852;
    --kz-bg-soft: #f3f8f7;
    --kz-text-main: #243b38;
    --kz-text-muted: #687b77;
    --kz-border: rgba(18, 110, 104, 0.13);
}

/* Typography: editorial serif headings + clean sans-serif body */
.kz-hero-title,
.kz-about-heading,
.kz-cat-heading,
.kz-cabs-heading,
.kz-dest-heading,
.kz-reasons-title,
.kz-blog-heading,
.kz-faq-heading,
.kz-gallery-heading,
.kz-trust-strip h2 {
    font-family: 'Cormorant Garamond', Georgia, serif !important;
    font-weight: 600 !important;
    letter-spacing: -0.015em !important;
}

.kz-hero-title {
    font-size: clamp(38px, 5vw, 64px) !important;
    line-height: 0.99 !important;
    max-width: 760px;
}

/* Keep all hero slides full-width and give the image and slider the same height.
   This removes the large blank area caused by the old theme's reserved hero space. */
.th-hero-wrapper.hero-1,
#hero {
    padding: 0 !important;
    margin: 0 !important;
    min-height: 0 !important;
    overflow: hidden !important;
}
#heroSlide1.hero-slider-1 {
    width: 100% !important;
    height: clamp(400px, 46vw, 500px) !important;
    min-height: 400px !important;
    margin: 0 !important;
    padding: 0 !important;
}
#heroSlide1 .swiper-wrapper,
#heroSlide1 .swiper-slide,
#heroSlide1 .hero-inner,
#heroSlide1 .kz-hero-slide-inner {
    height: 100% !important;
    min-height: 0 !important;
}
#heroSlide1 .kz-hero-slide-inner {
    display: flex !important;
    align-items: center !important;
}
#heroSlide1 .th-hero-bg,
#heroSlide1 .th-hero-bg .hero-bg-img {
    position: absolute !important;
    inset: 0 !important;
    width: 100% !important;
    height: 100% !important;
}
#heroSlide1 .th-hero-bg .hero-bg-img {
    object-fit: cover !important;
    object-position: center center !important;
}
#heroSlide1 .kz-hero-scrim {
    background: linear-gradient(95deg,
        rgba(7, 58, 55, 0.88) 0%,
        rgba(12, 81, 77, 0.66) 48%,
        rgba(12, 81, 77, 0.20) 100%) !important;
}
#heroSlide1 .kz-hero-content-wrap {
    padding-top: 48px !important;
    padding-bottom: 48px !important;
}

/* Trust strip should follow the hero directly, without legacy reserved spacing. */
.kz-trust-strip {
    margin-top: 0 !important;
    padding: 34px 0 !important;
    background: #f3f8f7 !important;
    border-bottom: 1px solid rgba(18, 110, 104, 0.12) !important;
}
.kz-trust-strip h2 {
    color: #0c514d !important;
    font-size: clamp(30px, 3vw, 42px) !important;
}
.kz-trust-card {
    border-color: rgba(18, 110, 104, 0.14) !important;
    box-shadow: 0 8px 24px rgba(12, 81, 77, 0.06) !important;
}
.kz-trust-icon {
    background: rgba(18, 110, 104, 0.09) !important;
    color: #126e68 !important;
}
.kz-trust-card-title {
    color: #0c514d !important;
}

/* Consistent teal headings, links and section surfaces */
.kz-about-heading,
.kz-cat-heading,
.kz-cabs-heading,
.kz-reasons-title,
.kz-blog-heading,
.kz-faq-heading,
.kz-gallery-heading,
.kz-cat-title a,
.kz-cab-title a,
.kz-cab-link,
.kz-count-val {
    color: #126e68 !important;
}
.kz-dest-section {
    background-image: linear-gradient(180deg,
        rgba(8, 42, 40, 0.94) 0%,
        rgba(18, 110, 104, 0.82) 50%,
        rgba(8, 42, 40, 0.96) 100%),
        url('/webassets/img/bg/tour_bg_1.jpg') !important;
}
.kz-hero-btn-primary,
.kz-about-btn-cta,
.kz-cat-btn,
.kz-cab-btn,
.kz-glass-btn,
.kz-reviews-arrow,
.kz-reviews-social-badge {
    background: #126e68 !important;
    color: #ffffff !important;
    border-color: #126e68 !important;
}
.kz-hero-btn-primary:hover,
.kz-about-btn-cta:hover,
.kz-cat-btn:hover,
.kz-cab-btn:hover,
.kz-glass-btn:hover,
.kz-reviews-arrow:hover {
    background: #0c514d !important;
    color: #ffffff !important;
    border-color: #0c514d !important;
}
.kz-hero-btn-primary {
    background: #d6b36a !important;
    color: #173d39 !important;
    border-color: #d6b36a !important;
}
.kz-hero-btn-primary:hover {
    background: #c7a45d !important;
    color: #173d39 !important;
    border-color: #c7a45d !important;
}
.kz-hero-btn-wa {
    background: #25D366 !important;
    border-color: #25D366 !important;
}
.kz-cat-badge,
.kz-glass-badge,
.kz-about-exp-badge span,
.kz-spiti-tag {
    color: #bd9852 !important;
}
.kz-cat-tag {
    color: #126e68 !important;
}
.kz-dst-nav-btn,
.dst-nav-btn {
    color: #126e68 !important;
}

/* Keep mobile hero content readable and prevent clipping on narrow screens. */
@media (max-width: 767px) {
    #heroSlide1.hero-slider-1 {
        height: auto !important;
        min-height: 470px !important;
    }
    #heroSlide1 .swiper-wrapper,
    #heroSlide1 .swiper-slide,
    #heroSlide1 .hero-inner,
    #heroSlide1 .kz-hero-slide-inner {
        height: auto !important;
        min-height: 470px !important;
    }
    #heroSlide1 .kz-hero-content-wrap {
        padding-top: 54px !important;
        padding-bottom: 54px !important;
    }
    .kz-hero-title {
        font-size: clamp(36px, 10vw, 48px) !important;
    }
    .kz-trust-strip {
        padding: 28px 0 !important;
    }
}


/* ==========================================================
   INTERACTIVE BACKGROUND FINISH — SOFT MINT / TEAL / GOLD
   Adds depth to light sections while keeping content readable.
   ========================================================== */

/* A subtle page canvas instead of flat white */
body {
    background-color: #f2f8f6 !important;
}

/* Announcement strip */
.kt-top-marquee {
    background: linear-gradient(110deg, #edf7f4 0%, #f8faf8 48%, #edf5f1 100%) !important;
    border-bottom: 1px solid rgba(18, 110, 104, 0.12) !important;
}
.kt-top-marquee marquee {
    background: linear-gradient(90deg, rgba(18,110,104,.08), rgba(214,179,106,.12), rgba(18,110,104,.08)) !important;
    border: 1px solid rgba(18,110,104,.08);
}
.kt-top-marquee .dst-heading {
    color: #315b55 !important;
}

/* Destination search and circular destination cards */
.dst-section {
    position: relative;
    isolation: isolate;
    background:
        radial-gradient(circle at 8% 18%, rgba(214,179,106,.13), transparent 25%),
        radial-gradient(circle at 92% 78%, rgba(18,110,104,.10), transparent 28%),
        linear-gradient(145deg, #f8fbfa 0%, #edf6f3 48%, #f5f8f4 100%) !important;
    padding-top: 28px;
    padding-bottom: 42px;
}
.dst-section::before,
.dst-section::after {
    content: "";
    position: absolute;
    width: 250px;
    height: 250px;
    border-radius: 50%;
    pointer-events: none;
    filter: blur(2px);
    z-index: -1;
}
.dst-section::before {
    top: -125px;
    left: -95px;
    background: radial-gradient(circle, rgba(18,110,104,.10), transparent 68%);
}
.dst-section::after {
    right: -110px;
    bottom: -135px;
    background: radial-gradient(circle, rgba(214,179,106,.14), transparent 68%);
}
.dst-section .dst-inner {
    position: relative;
    z-index: 1;
}
.dst-section .kt-search-bar {
    background: rgba(255,255,255,.94) !important;
    border-color: rgba(18,110,104,.38) !important;
    box-shadow: 0 12px 30px rgba(12,81,77,.10) !important;
    transition: box-shadow .25s ease, transform .25s ease;
}
.dst-section .kt-search-bar:focus-within {
    box-shadow: 0 14px 34px rgba(12,81,77,.17) !important;
    transform: translateY(-2px);
}
.dst-section .kt-s-btn,
.dst-section .dst-toggle-btn.active {
    background: #126e68 !important;
    color: #fff !important;
}
.dst-section .dst-toggle-group {
    background: rgba(255,255,255,.76) !important;
    border: 1px solid rgba(18,110,104,.10);
    border-radius: 999px;
    padding: 4px;
    box-shadow: 0 8px 22px rgba(12,81,77,.07);
}
.dst-section .dst-toggle-btn:not(.active) {
    color: #42645f !important;
}
.dst-section .dst-card {
    box-shadow: 0 12px 28px rgba(12,81,77,.13) !important;
    outline: 1px solid rgba(255,255,255,.5);
    transition: transform .35s ease, box-shadow .35s ease, outline-color .35s ease !important;
}
.dst-section .dst-card:hover {
    transform: translateY(-7px) scale(1.015) !important;
    box-shadow: 0 20px 38px rgba(12,81,77,.22) !important;
    outline-color: rgba(214,179,106,.75);
}

/* Alternating soft section backgrounds — no large flat-white blocks */
.kz-trust-strip {
    background:
        radial-gradient(circle at 2% 15%, rgba(214,179,106,.10), transparent 24%),
        linear-gradient(120deg, #edf7f4 0%, #f7faf8 52%, #eaf4f1 100%) !important;
}
.kz-about-section {
    background:
        radial-gradient(circle at 92% 12%, rgba(18,110,104,.07), transparent 26%),
        linear-gradient(135deg, #ffffff 0%, #f2f8f6 100%) !important;
}
.kz-cat-section {
    background:
        radial-gradient(circle at 7% 10%, rgba(214,179,106,.12), transparent 24%),
        radial-gradient(circle at 95% 85%, rgba(18,110,104,.09), transparent 28%),
        linear-gradient(145deg, #f3f9f7 0%, #eaf4f1 52%, #f8faf8 100%) !important;
}
.kz-cabs-section {
    background:
        radial-gradient(circle at 90% 10%, rgba(214,179,106,.10), transparent 25%),
        linear-gradient(135deg, #f9fbf8 0%, #edf6f3 100%) !important;
}
.kz-reasons-section,
.kz-blog-section,
.kz-gallery-section {
    background:
        radial-gradient(circle at 4% 15%, rgba(18,110,104,.07), transparent 25%),
        linear-gradient(135deg, #ffffff 0%, #f0f7f4 100%) !important;
}
.kz-reviews-section,
.kz-faq-section {
    background:
        radial-gradient(circle at 95% 12%, rgba(214,179,106,.11), transparent 25%),
        linear-gradient(135deg, #eaf4f1 0%, #f7faf8 58%, #eef6f3 100%) !important;
}
.kz-contact-section {
    background:
        radial-gradient(circle at 8% 12%, rgba(214,179,106,.12), transparent 25%),
        linear-gradient(135deg, #eff7f4 0%, #e4f1ed 100%) !important;
}

/* Featured package panel with inline legacy background */
section.py-5[style*="background: #f8fafc"] {
    background:
        radial-gradient(circle at 94% 12%, rgba(18,110,104,.07), transparent 24%),
        linear-gradient(135deg, #f5faf8 0%, #eaf4f1 100%) !important;
}

/* Bring a little depth to the white cards */
.kz-trust-card,
.kz-cat-card,
.kz-cab-box,
.kz-reason-card,
.kz-blog-card,
.kz-faq-card,
.kz-gallery-card,
.kz-about-stat-card {
    background: rgba(255,255,255,.92) !important;
    border-color: rgba(18,110,104,.15) !important;
    box-shadow: 0 10px 26px rgba(12,81,77,.07) !important;
    transition: transform .28s ease, box-shadow .28s ease, border-color .28s ease !important;
}
.kz-trust-card:hover,
.kz-cat-card:hover,
.kz-cab-box:hover,
.kz-reason-card:hover,
.kz-blog-card:hover,
.kz-faq-card:hover,
.kz-gallery-card:hover,
.kz-about-stat-card:hover {
    transform: translateY(-5px) !important;
    border-color: rgba(18,110,104,.34) !important;
    box-shadow: 0 18px 34px rgba(12,81,77,.13) !important;
}

/* Subtle section heading accent */
.kz-about-eyebrow,
.kz-cat-eyebrow,
.kz-cabs-eyebrow,
.kz-reasons-eyebrow,
.kz-blog-eyebrow,
.kz-reviews-eyebrow {
    color: #b18a43 !important;
}

/* Keep reduced-motion users comfortable */
@media (prefers-reduced-motion: reduce) {
    .dst-section .dst-card,
    .dst-section .kt-search-bar,
    .kz-trust-card,
    .kz-cat-card,
    .kz-cab-box,
    .kz-reason-card,
    .kz-blog-card,
    .kz-faq-card,
    .kz-gallery-card,
    .kz-about-stat-card {
        transition: none !important;
    }
}
</style>

<script>
(function() {
    // ── 1. AOS INITIALIZATION ──
    function startAOS() {
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 850,
                easing: 'ease-out-cubic',
                once: true,
                mirror: false,
                offset: 60
            });
            window.addEventListener('load', function () { AOS.refresh(); });
            document.querySelectorAll('[data-bs-toggle="pill"], [data-bs-toggle="tab"]').forEach(function (tab) {
                tab.addEventListener('shown.bs.tab', function () { AOS.refresh(); });
            });
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', startAOS);
    } else {
        startAOS();
    }

    // ── 2. HERO SLIDER PREMIUM SLIDING ANIMATIONS & CONTROLS ──
    (function initHeroSliderDynamics() {
        var heroEl = document.querySelector('#heroSlide1');
        if (!heroEl) return;

        function setupHeroSwiper() {
            if (typeof Swiper === 'undefined') {
                setTimeout(setupHeroSwiper, 80);
                return;
            }

            var swiper = heroEl.swiper;

            if (swiper && swiper.params && swiper.params.effect === 'fade') {
                swiper.destroy(true, true);
                swiper = null;
            }

            if (!swiper) {
                swiper = new Swiper(heroEl, {
                    slidesPerView: 1,
                    spaceBetween: 0,
                    speed: 1200,
                    loop: true,
                    grabCursor: true,
                    watchSlidesProgress: true,
                    autoplay: {
                        delay: 5500,
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true
                    },
                    navigation: {
                        nextEl: '.th-swiper-custom .slider-next, [data-slider-next="#heroSlide1"]',
                        prevEl: '.th-swiper-custom .slider-prev, [data-slider-prev="#heroSlide1"]'
                    }
                });
            }

            var prevBtn = heroEl.parentElement.querySelector('.slider-prev') || heroEl.querySelector('.slider-prev');
            var nextBtn = heroEl.parentElement.querySelector('.slider-next') || heroEl.querySelector('.slider-next');

            if (prevBtn && !prevBtn._boundSlide) {
                prevBtn._boundSlide = true;
                prevBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    if (swiper) swiper.slidePrev();
                });
            }
            if (nextBtn && !nextBtn._boundSlide) {
                nextBtn._boundSlide = true;
                nextBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    if (swiper) swiper.slideNext();
                });
            }

            function triggerActiveZoom() {
                var activeSlide = heroEl.querySelector('.swiper-slide-active');
                if (!activeSlide) return;

                heroEl.querySelectorAll('.hero-bg-img').forEach(function (img) {
                    img.classList.remove('is-active-anim');
                });

                var activeImg = activeSlide.querySelector('.hero-bg-img');
                if (activeImg) {
                    void activeImg.offsetWidth;
                    activeImg.classList.add('is-active-anim');
                }
            }

            swiper.on('slideChangeTransitionStart', triggerActiveZoom);
            swiper.on('init', triggerActiveZoom);
            triggerActiveZoom();
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', setupHeroSwiper);
        } else {
            setupHeroSwiper();
        }

        var isTicking = false;
        function onWindowScroll() {
            if (!isTicking) {
                window.requestAnimationFrame(function () {
                    var scrollY = window.pageYOffset || document.documentElement.scrollTop || 0;
                    if (scrollY < 900) {
                        var parallaxOffset = (scrollY * 0.3).toFixed(1);
                        var scrollScale = (1 + (scrollY * 0.00025)).toFixed(3);
                        heroEl.style.setProperty('--scroll-parallax', parallaxOffset + 'px');
                        heroEl.style.setProperty('--scroll-zoom', scrollScale);
                    }
                    isTicking = false;
                });
                isTicking = true;
            }
        }

        window.addEventListener('scroll', onWindowScroll, { passive: true });
    })();

    // ── 3. ANIMATED NUMBER COUNTER ──
    function initStatsCounters() {
        var statsSection = document.querySelector('.kz-about-stat-row') || document.querySelector('.kaw-about-stats');
        if (!statsSection) return;

        var statConfigs = [
            { target: 50000, decimals: 0, isComma: true,  suffix: '+', fallbackText: '50,000+' },
            { target: 2500,  decimals: 0, isComma: false, suffix: '+', fallbackText: '2500+' },
            { target: 4.9,   decimals: 1, isComma: false, suffix: '',  fallbackText: '4.9' }
        ];

        var statBoxes = statsSection.querySelectorAll('.kz-about-stat-card, .kaw-about-stat-box');
        if (!statBoxes.length) return;

        var items = [];
        statBoxes.forEach(function (box, index) {
            var cfg = statConfigs[index];
            if (!cfg) return;

            var targetSpan = box.querySelector('h3');
            if (!targetSpan) return;

            var targetNum = parseFloat(targetSpan.getAttribute('data-target')) || cfg.target;
            var decimals = targetSpan.hasAttribute('data-decimals') ? parseInt(targetSpan.getAttribute('data-decimals'), 10) : cfg.decimals;
            var isComma = targetSpan.getAttribute('data-format') === 'comma' || cfg.isComma;
            var suffix = targetSpan.getAttribute('data-suffix') !== null ? targetSpan.getAttribute('data-suffix') : cfg.suffix;

            items.push({
                el: targetSpan,
                target: targetNum,
                decimals: decimals,
                isComma: isComma,
                suffix: suffix,
                finalDisplay: cfg.fallbackText
            });

            targetSpan.textContent = (decimals > 0 ? '0.0' : '0') + suffix;
        });

        var hasAnimated = false;

        function runAnimation() {
            if (hasAnimated) return;
            hasAnimated = true;

            window.removeEventListener('scroll', checkStatsVisibility);
            window.removeEventListener('resize', checkStatsVisibility);

            var duration = 1800;
            var startTime = null;

            function step(timestamp) {
                if (!startTime) startTime = timestamp;
                var elapsed = timestamp - startTime;
                var progress = Math.min(elapsed / duration, 1);
                
                var ease = progress === 1 ? 1 : 1 - Math.pow(2, -10 * progress);

                items.forEach(function (item) {
                    var current = ease * item.target;
                    var displayVal;
                    if (item.decimals > 0) {
                        displayVal = current.toFixed(item.decimals);
                    } else {
                        var rounded = Math.floor(current);
                        displayVal = item.isComma ? rounded.toLocaleString('en-US') : rounded.toString();
                    }
                    item.el.textContent = displayVal + item.suffix;
                });

                if (progress < 1) {
                    requestAnimationFrame(step);
                } else {
                    items.forEach(function (item) {
                        item.el.textContent = item.finalDisplay;
                    });
                }
            }

            requestAnimationFrame(step);
        }

        function checkStatsVisibility() {
            if (hasAnimated) return;

            var scrollY = window.pageYOffset || document.documentElement.scrollTop || 0;
            if (scrollY < 200) return;

            var rect = statsSection.getBoundingClientRect();
            var windowHeight = window.innerHeight || document.documentElement.clientHeight;

            if (rect.top <= windowHeight * 0.85 && rect.bottom >= 40) {
                runAnimation();
            }
        }

        window.addEventListener('scroll', checkStatsVisibility, { passive: true });
        window.addEventListener('resize', checkStatsVisibility, { passive: true });

        window.addEventListener('load', function () {
            var scrollY = window.pageYOffset || document.documentElement.scrollTop || 0;
            if (scrollY >= 400) {
                checkStatsVisibility();
            }
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initStatsCounters);
    } else {
        initStatsCounters();
    }

    // ── 4. SWIPERS FOR CATEGORIES, CABS, DESTINATIONS & GALLERY ──
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof Swiper === 'undefined') return;

        // A. Tour Categories
        if (document.querySelector('#kzCategorySwiper')) {
            new Swiper('#kzCategorySwiper', {
                loop: false,
                grabCursor: true,
                speed: 700,
                autoplay: {
                    delay: 4500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.kz-cat-pagination',
                    clickable: true,
                },
                breakpoints: {
                    0: { slidesPerView: 1.2, spaceBetween: 16 },
                    576: { slidesPerView: 2.2, spaceBetween: 20 },
                    992: { slidesPerView: 3.2, spaceBetween: 24 },
                    1200: { slidesPerView: 4.2, spaceBetween: 26 }
                }
            });
        }

        // B. Cabs Fleet
        if (document.querySelector('#kzCabsSwiper')) {
            new Swiper('#kzCabsSwiper', {
                loop: false,
                grabCursor: true,
                speed: 650,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.kz-cabs-pagination',
                    clickable: true,
                },
                breakpoints: {
                    0: { slidesPerView: 1.3, spaceBetween: 14 },
                    576: { slidesPerView: 2.3, spaceBetween: 18 },
                    992: { slidesPerView: 3.3, spaceBetween: 22 },
                    1200: { slidesPerView: 4.2, spaceBetween: 22 }
                }
            });
        }

        // C. Popular Destinations
        if (document.querySelector('#kzDestSwiper')) {
            new Swiper('#kzDestSwiper', {
                loop: false,
                grabCursor: true,
                speed: 800,
                autoplay: {
                    delay: 4500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.kz-dest-pagination',
                    clickable: true,
                },
                breakpoints: {
                    0: { slidesPerView: 1.2, spaceBetween: 16 },
                    576: { slidesPerView: 2.2, spaceBetween: 20 },
                    992: { slidesPerView: 3.2, spaceBetween: 24 },
                    1200: { slidesPerView: 3.8, spaceBetween: 28 }
                }
            });
        }

        // D. Recent Gallery Swiper (with Premium Arrows & Root Tokens)
        var galleryEl = document.querySelector('#kzGallerySwiper');
        if (galleryEl) {
            var slideCount = galleryEl.querySelectorAll('.swiper-slide').length;
            new Swiper('#kzGallerySwiper', {
                slidesPerView: 1.3,
                spaceBetween: 14,
                loop: slideCount > 4,
                grabCursor: true,
                speed: 700,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true
                },
                navigation: {
                    nextEl: '#kzGalleryNext',
                    prevEl: '#kzGalleryPrev'
                },
                pagination: {
                    el: '.kz-gallery-pagination',
                    clickable: true
                },
                breakpoints: {
                    0: { slidesPerView: 1.3, spaceBetween: 14 },
                    480: { slidesPerView: 2.2, spaceBetween: 16 },
                    768: { slidesPerView: 3.2, spaceBetween: 20 },
                    992: { slidesPerView: 4.2, spaceBetween: 22 },
                    1200: { slidesPerView: 5, spaceBetween: 24 }
                }
            });
        }
    });

    // ── 5. GALLERY LIGHTBOX CONTROLLER (NATIVE / MODAL FALLBACK) ──
    document.addEventListener('DOMContentLoaded', function () {
        // If jQuery Magnific Popup is available in the theme, initialize it
        if (window.jQuery && typeof window.jQuery.fn.magnificPopup === 'function') {
            window.jQuery('.kz-gallery-slider-wrap .popup-image').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>'
                },
                zoom: {
                    enabled: true,
                    duration: 300
                }
            });
            return;
        }

        // Standalone Lightbox Modal Fallback (Works with Zero Dependencies)
        var modal = document.querySelector('#kzGalleryLightbox');
        if (!modal) return;

        var modalImg = document.querySelector('#kzLightboxImg');
        var modalCaption = document.querySelector('#kzLightboxCaption');
        var closeBtn = document.querySelector('#kzLightboxClose');
        var prevBtn = document.querySelector('#kzLightboxPrev');
        var nextBtn = document.querySelector('#kzLightboxNext');

        var links = Array.from(document.querySelectorAll('.kz-gallery-slider-wrap .kz-gallery-zoom-btn'));
        var currentIndex = 0;

        function showLightbox(index) {
            if (index < 0) index = links.length - 1;
            if (index >= links.length) index = 0;
            currentIndex = index;

            var link = links[currentIndex];
            modalImg.src = link.getAttribute('href');
            modalCaption.textContent = link.getAttribute('data-title') || '';
            modal.classList.add('kz-active');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            modal.classList.remove('kz-active');
            document.body.style.overflow = '';
        }

        links.forEach(function (link, idx) {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                showLightbox(idx);
            });
        });

        if (closeBtn) closeBtn.addEventListener('click', closeLightbox);
        if (prevBtn) prevBtn.addEventListener('click', function () { showLightbox(currentIndex - 1); });
        if (nextBtn) nextBtn.addEventListener('click', function () { showLightbox(currentIndex + 1); });

        modal.addEventListener('click', function (e) {
            if (e.target === modal) closeLightbox();
        });

        window.addEventListener('keydown', function (e) {
            if (!modal.classList.contains('kz-active')) return;
            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowLeft') showLightbox(currentIndex - 1);
            if (e.key === 'ArrowRight') showLightbox(currentIndex + 1);
        });
    });

    // ── 6. REVIEWS VIDEO CAROUSEL ──
    document.addEventListener('DOMContentLoaded', function () {
        var myCarousel = document.querySelector('#reviewsCarousel');
        if (myCarousel && typeof bootstrap !== 'undefined') {
            new bootstrap.Carousel(myCarousel, {
                interval: 5000,
                wrap: true
            });
            myCarousel.addEventListener('slide.bs.carousel', function () {
                var iframes = myCarousel.querySelectorAll('iframe');
                iframes.forEach(function(iframe) {
                    var src = iframe.src;
                    iframe.src = src;
                });
            });
        }
    });

    // ── 7. DESTINATION COUNTRY & STATE SWIPERS ──
    document.addEventListener('DOMContentLoaded', function () {
        const stateSwipers = {};

        function initStateSwiper(countryId) {
            const swiperEl = document.querySelector('#stateSwiper' + countryId);
            if (!swiperEl || typeof Swiper === 'undefined') return;

            if (stateSwipers[countryId]) {
                stateSwipers[countryId].update();
                stateSwipers[countryId].updateSize();
                stateSwipers[countryId].updateSlides();
                stateSwipers[countryId].updateProgress();
                stateSwipers[countryId].updateSlidesClasses();
                return;
            }

            stateSwipers[countryId] = new Swiper(swiperEl, {
                slidesPerView: 2.2,
                spaceBetween: 16,
                speed: 500,
                grabCursor: true,
                observer: true,
                observeParents: true,
                resizeObserver: true,
                navigation: {
                    nextEl: '#stateNext' + countryId,
                    prevEl: '#statePrev' + countryId,
                },
                breakpoints: {
                    0: { slidesPerView: 2.8, spaceBetween: 16 },
                    576: { slidesPerView: 2.8, spaceBetween: 20 },
                    992: { slidesPerView: 2.8, spaceBetween: 24 },
                    1200: { slidesPerView: 5.2, spaceBetween: 28 },
                },
                on: {
                    init: function () {
                        this.update();
                    }
                }
            });

            swiperEl.querySelectorAll('img').forEach(function(img){
                if (!img.complete) {
                    img.onload = function(){
                        stateSwipers[countryId].update();
                    };
                }
            });
        }

        const activePane = document.querySelector('#countryTabContent .tab-pane.show.active');
        if (activePane) {
            const countryId = activePane.id.replace('country-pane-', '');
            initStateSwiper(countryId);
        }

        document.querySelectorAll('.dst-country-tab-btn').forEach(function(btn){
            btn.addEventListener('shown.bs.tab', function(e){
                const countryId = e.target.dataset.bsTarget.replace('#country-pane-','');
                initStateSwiper(countryId);
                requestAnimationFrame(function(){
                    requestAnimationFrame(function(){
                        if (stateSwipers[countryId]) {
                            stateSwipers[countryId].update();
                            stateSwipers[countryId].updateSize();
                            stateSwipers[countryId].updateSlides();
                            stateSwipers[countryId].updateProgress();
                            stateSwipers[countryId].updateSlidesClasses();
                        }
                    });
                });
            });
        });

        window.addEventListener('resize', function(){
            Object.values(stateSwipers).forEach(function(swiper){
                swiper.update();
            });
        });
    });

})();
</script>
@endsection

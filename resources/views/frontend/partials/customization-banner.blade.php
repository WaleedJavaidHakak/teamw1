@php
    $bannerHeadline = $setting->cta_banner_headline ?? 'Want to Modify an Itinerary or Add Extra Days?';
    $bannerBody     = $setting->cta_banner_body ?? 'Tell us your travel dates, passenger count, and preferred hotel category. We will send you a personalized PDF itinerary and transparent quote within 30 minutes.';
    $bannerBtnText  = $setting->cta_banner_btn_text ?? 'Request a Customized Quote';
    $bannerBtnLink  = trim((string) ($setting->cta_banner_btn_link ?? '#quote'));
    $openModal      = in_array(strtolower($bannerBtnLink), ['', '#', '#quote', '#modal'], true);
    $waHref         = getWhatsappUrl($setting);
@endphp

@if(!empty($bannerHeadline))
<section class="kz-custom-banner-wrap ll-custom-banner-wrap my-5">
    <div class="container">
        <div class="kz-custom-banner ll-custom-banner">
            <div class="kz-custom-banner-glow ll-custom-banner-glow"></div>
            <div class="ll-custom-banner-wave ll-custom-banner-wave-one"></div>
            <div class="ll-custom-banner-wave ll-custom-banner-wave-two"></div>

            <div class="row align-items-center g-4 position-relative ll-custom-banner-content">
                <div class="col-lg-8">
                    <span class="kz-cb-eyebrow ll-cb-eyebrow">
                        <i class="fa-solid fa-wand-magic-sparkles"></i> Custom Kashmir Itineraries
                    </span>
                    <h2 class="kz-cb-title ll-cb-title">{{ $bannerHeadline }}</h2>
                    @if(!empty($bannerBody))
                        <p class="kz-cb-text ll-cb-text">{{ $bannerBody }}</p>
                    @endif
                </div>
                <div class="col-lg-4 text-lg-end">
                    <div class="d-flex flex-wrap flex-lg-column justify-content-lg-end gap-2 ll-cb-actions">
                        @if($openModal)
                            <button type="button" class="kz-cb-btn-primary ll-cb-btn-primary" data-bs-toggle="modal" data-bs-target="#globalContactModal">
                                <i class="fa-regular fa-paper-plane"></i>
                                <span>{{ $bannerBtnText }}</span>
                            </button>
                        @else
                            <a href="{{ url($bannerBtnLink) }}" class="kz-cb-btn-primary ll-cb-btn-primary">
                                <i class="fa-regular fa-paper-plane"></i>
                                <span>{{ $bannerBtnText }}</span>
                            </a>
                        @endif
                        <a href="{{ $waHref }}" target="_blank" rel="noopener noreferrer" class="kz-cb-btn-wa ll-cb-btn-wa">
                            <i class="fa-brands fa-whatsapp"></i>
                            <span>{{ $setting->whatsapp_cta_label ?: 'Chat on WhatsApp' }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* ============================================================
   LOVE LINK CUSTOM ITINERARY BANNER
   Brand palette: deep teal, turquoise, mint and champagne gold
   ============================================================ */
.kz-custom-banner-wrap.ll-custom-banner-wrap {
    position: relative;
    isolation: isolate;
}

.kz-custom-banner.ll-custom-banner {
    position: relative;
    isolation: isolate;
    overflow: hidden;
    background:
        radial-gradient(ellipse at 88% 8%, rgba(117, 218, 204, .24) 0%, transparent 34%),
        radial-gradient(ellipse at 5% 100%, rgba(214, 179, 106, .13) 0%, transparent 38%),
        linear-gradient(120deg, #0c514d 0%, #126e68 48%, #238d83 100%);
    border: 1px solid rgba(214, 179, 106, .42);
    border-radius: 22px;
    padding: 38px 40px;
    color: #ffffff;
    box-shadow: 0 18px 42px rgba(12, 81, 77, .20), inset 0 1px 0 rgba(255, 255, 255, .15);
}

.kz-custom-banner.ll-custom-banner::before {
    content: "";
    position: absolute;
    inset: 0;
    pointer-events: none;
    opacity: .20;
    background-image: radial-gradient(rgba(255,255,255,.45) .7px, transparent .7px);
    background-size: 22px 22px;
    mask-image: linear-gradient(90deg, transparent 5%, #000 60%, transparent 100%);
    z-index: -1;
}

.kz-custom-banner-glow.ll-custom-banner-glow {
    position: absolute;
    top: -95px;
    right: -55px;
    width: 300px;
    height: 300px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(172, 235, 224, .30) 0%, rgba(172, 235, 224, .08) 42%, transparent 72%);
    pointer-events: none;
    z-index: -1;
}

.ll-custom-banner-wave {
    position: absolute;
    left: -8%;
    width: 116%;
    height: 80px;
    border: 1px solid rgba(210, 245, 237, .12);
    border-radius: 50%;
    pointer-events: none;
    transform: rotate(-5deg);
    z-index: -1;
}
.ll-custom-banner-wave-one {
    bottom: -58px;
    background: rgba(184, 235, 225, .055);
}
.ll-custom-banner-wave-two {
    bottom: -76px;
    left: -4%;
    border-color: rgba(214, 179, 106, .16);
    background: rgba(214, 179, 106, .035);
}

.kz-custom-banner .ll-custom-banner-content {
    z-index: 1;
}

.kz-cb-eyebrow.ll-cb-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(214, 179, 106, .14);
    border: 1px solid rgba(230, 202, 145, .48);
    color: #f0d69d;
    padding: 6px 14px;
    border-radius: 999px;
    font-family: 'Nunito Sans', sans-serif;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: .09em;
    text-transform: uppercase;
    margin-bottom: 14px;
}

.kz-cb-title.ll-cb-title {
    color: #ffffff !important;
    font-family: 'Cormorant Garamond', Georgia, serif !important;
    font-size: clamp(27px, 3vw, 38px);
    font-weight: 700;
    line-height: 1.12;
    letter-spacing: -.015em;
    margin: 0 0 11px;
    text-shadow: 0 2px 14px rgba(0, 35, 32, .16);
}

.kz-cb-text.ll-cb-text {
    color: rgba(244, 253, 250, .90) !important;
    font-family: 'Nunito Sans', sans-serif;
    font-size: 14px;
    line-height: 1.7;
    margin: 0;
    max-width: 720px;
}

.ll-cb-actions {
    position: relative;
    z-index: 2;
}

.kz-cb-btn-primary.ll-cb-btn-primary,
.kz-cb-btn-wa.ll-cb-btn-wa {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    min-height: 46px;
    padding: 12px 20px;
    border-radius: 11px;
    font-family: 'Nunito Sans', sans-serif;
    font-size: 13px;
    font-weight: 800;
    line-height: 1.25;
    text-decoration: none !important;
    cursor: pointer;
    border: 1px solid transparent;
    white-space: normal;
    transition: transform .22s ease, box-shadow .22s ease, background .22s ease, border-color .22s ease;
}

.kz-cb-btn-primary.ll-cb-btn-primary {
    background: linear-gradient(135deg, #e6c77f 0%, #d6b36a 55%, #c69b4e 100%);
    border-color: rgba(255, 239, 199, .55);
    color: #103f3b !important;
    box-shadow: 0 8px 22px rgba(4, 43, 40, .18), inset 0 1px 0 rgba(255,255,255,.30);
}
.kz-cb-btn-primary.ll-cb-btn-primary:hover,
.kz-cb-btn-primary.ll-cb-btn-primary:focus-visible {
    background: linear-gradient(135deg, #f0d99d 0%, #dfbd78 100%);
    color: #0c514d !important;
    transform: translateY(-2px);
    box-shadow: 0 12px 26px rgba(4, 43, 40, .24);
}

.kz-cb-btn-wa.ll-cb-btn-wa {
    background: rgba(220, 248, 241, .12);
    border-color: rgba(197, 240, 229, .48);
    color: #f4fffc !important;
    box-shadow: 0 7px 18px rgba(4, 43, 40, .12), inset 0 1px 0 rgba(255,255,255,.12);
}
.kz-cb-btn-wa.ll-cb-btn-wa:hover,
.kz-cb-btn-wa.ll-cb-btn-wa:focus-visible {
    background: rgba(220, 248, 241, .24);
    border-color: rgba(237, 255, 250, .72);
    color: #ffffff !important;
    transform: translateY(-2px);
    box-shadow: 0 11px 24px rgba(4, 43, 40, .20);
}

.kz-cb-btn-primary.ll-cb-btn-primary:focus-visible,
.kz-cb-btn-wa.ll-cb-btn-wa:focus-visible {
    outline: 3px solid rgba(240, 214, 157, .55);
    outline-offset: 3px;
}

@media (max-width: 991px) {
    .kz-custom-banner.ll-custom-banner {
        padding: 32px 30px;
    }
}

@media (max-width: 767px) {
    .kz-custom-banner-wrap.ll-custom-banner-wrap {
        margin-top: 2rem !important;
        margin-bottom: 2rem !important;
    }
    .kz-custom-banner.ll-custom-banner {
        padding: 27px 21px;
        border-radius: 18px;
    }
    .kz-cb-title.ll-cb-title {
        font-size: clamp(25px, 7vw, 32px);
    }
    .kz-cb-text.ll-cb-text {
        font-size: 13px;
    }
    .kz-cb-btn-primary.ll-cb-btn-primary,
    .kz-cb-btn-wa.ll-cb-btn-wa {
        width: 100%;
        min-height: 45px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .kz-cb-btn-primary.ll-cb-btn-primary,
    .kz-cb-btn-wa.ll-cb-btn-wa {
        transition: none;
    }
}
</style>
@endif

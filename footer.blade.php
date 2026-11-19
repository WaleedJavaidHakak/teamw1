<!--==============================
	Footer Area (Unified Single Interactive Dynamic Footer)
==============================-->
<footer class="site-footer" id="siteFooter">

    {{-- Top Brand & Quick Action Strip --}}
    <div class="footer-logo-section">
        <div class="container">
            <div class="kz-ftr-brand-bar">

                {{-- 1. Left: Brand Logo + Tagline --}}
                <div class="kz-ftr-brand-identity">
                    @if(!empty($setting->footer_logo))
                        <a href="{{ route('home') }}" class="footer-logo-wrap" aria-label="{{ $setting->name ?? 'Home' }}">
                            <img src="{{ asset('storage/' . $setting->footer_logo) }}" alt="{{ $setting->name }}">
                        </a>
                    @elseif(!empty($setting->name))
                        <a href="{{ route('home') }}" class="kz-ftr-brand-fallback">
                            <span>{{ $setting->name }}</span>
                        </a>
                    @endif

                    <div class="kz-ftr-brand-copy">
                        @if(!empty($setting->name))
                            <div class="kz-ftr-brand-name-row">
                                <span class="kz-ftr-brand-badge">{{ $setting->name }}</span>
                                <span class="kz-ftr-verified-pill"><i class="fa-solid fa-circle-check"></i> Verified Travel Desk</span>
                            </div>
                        @endif
                        @if(!empty($setting->footer_about))
                            <div class="footer-tagline" style="color:#ffffff !important; -webkit-text-fill-color:#ffffff !important; opacity:1 !important;">{!! preg_replace('/\s(?:style|color)\s*=\s*(["\']).*?\1/i', '', (string) $setting->footer_about) !!}</div>
                        @endif
                    </div>
                </div>

                {{-- 2. Right: Interactive Quick Actions & Social Links --}}
                @php
                    $social_link = is_array($setting->social_link ?? null)
                        ? $setting->social_link
                        : (json_decode((string) ($setting->social_link ?? ''), true) ?? []);
                    $hasSocialIcons = collect($social_link)->contains(function ($item) {
                        $icon = is_array($item) ? ($item['social_icon'] ?? '') : ($item->social_icon ?? '');
                        return !empty($icon);
                    });
                @endphp
                <div class="kz-ftr-brand-actions">
                    <button type="button"
                            class="kz-ftr-cta-pill kz-ftr-cta-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#globalContactModal">
                        <i class="fa-regular fa-paper-plane"></i>
                        <span>Plan Custom Trip</span>
                    </button>

                    @if(!empty($setting->whatsapp_number) || !empty($setting->phone))
                        <a href="{{ getWhatsappUrl($setting) }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="kz-ftr-cta-pill kz-ftr-cta-whatsapp">
                            <i class="fab fa-whatsapp"></i>
                            <span>{{ $setting->whatsapp_cta_label ?: 'WhatsApp Us' }}</span>
                        </a>
                    @endif

                    @if($hasSocialIcons)
                        <div class="footer-social" aria-label="Social Links">
                            @foreach($social_link as $item)
                                @php
                                    $sLink = is_array($item) ? ($item['social_link'] ?? '#') : ($item->social_link ?? '#');
                                    $sName = is_array($item) ? ($item['social_name'] ?? '') : ($item->social_name ?? '');
                                    $sIcon = is_array($item) ? ($item['social_icon'] ?? '') : ($item->social_icon ?? '');
                                @endphp
                                @if(!empty($sIcon))
                                    <a href="{{ $sLink }}"
                                       title="{{ $sName }}"
                                       aria-label="{{ $sName ?: 'Social Profile' }}"
                                       target="_blank"
                                       rel="noopener noreferrer"
                                       class="social-icon">
                                        <i class="{{ $sIcon }}"></i>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>

    {{-- Main Footer Content: Interactive Filter + Dynamic Multi-Column Directory + Contact Hub --}}
    <div class="footer-main">
        <div class="container">
            @php
                $dirColumns = $footerColumns ?? [];
                $dirColCount = max(1, min(4, count($dirColumns)));
                $payOnlineUrl = getPayOnlineUrl($setting);
                $payOnlineLabel = $setting->pay_online_label ?: 'Pay Online';
                $payIsExternal = str_starts_with($payOnlineUrl, 'http');
                $totalDirLinks = 0;
                foreach ($dirColumns as $colGroups) {
                    foreach ($colGroups as $grp) {
                        $totalDirLinks += count($grp['links'] ?? []);
                    }
                }
            @endphp

            @if(!empty($dirColumns))
                {{-- Interactive Directory Toolbar --}}
                <div class="kz-ftr-dir-toolbar">
                    <div class="kz-ftr-dir-summary">
                        <span class="kz-ftr-dir-dot"></span>
                        <span class="kz-ftr-dir-summary-label">Explore Services &amp; Destinations</span>
                        @if($totalDirLinks > 0)
                            <span class="kz-ftr-count-pill">
                                <span id="kzFooterMatchCount">{{ $totalDirLinks }}</span>
                                <span class="kz-ftr-count-unit">links</span>
                            </span>
                        @endif
                    </div>

                    @if($totalDirLinks > 0)
                        <div class="kz-ftr-dir-controls">
                            <div class="kz-ftr-search-wrap">
                                <i class="fa-solid fa-magnifying-glass kz-ftr-search-icon" aria-hidden="true"></i>
                                <input type="search"
                                       id="kzFooterFilter"
                                       class="kz-ftr-search-input"
                                       placeholder="Quick find packages, cabs, bikes..."
                                       autocomplete="off"
                                       aria-label="Filter footer directory links">
                                <button type="button"
                                        id="kzFooterFilterClear"
                                        class="kz-ftr-search-clear"
                                        title="Clear filter"
                                        aria-label="Clear filter"
                                        hidden>
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>
                            <button type="button"
                                    id="kzFooterToggleAll"
                                    class="kz-ftr-expand-all d-md-none"
                                    aria-expanded="false">
                                <i class="fa-solid fa-angles-down"></i>
                                <span>Expand All</span>
                            </button>
                        </div>
                    @endif
                </div>

                {{-- Empty Search Feedback --}}
                <div id="kzFooterNoResults" class="kz-ftr-no-results" hidden>
                    <div class="kz-ftr-no-results-inner">
                        <i class="fa-regular fa-compass"></i>
                        <span>No directory links match <strong id="kzFooterNoResultsTerm"></strong>.</span>
                        <button type="button" id="kzFooterResetBtn" class="kz-ftr-reset-btn">Reset filter</button>
                    </div>
                </div>

                {{-- Dynamic Columns Grid --}}
                <div class="kz-ftr-dir-grid kz-ftr-cols-{{ $dirColCount }}" id="kzFooterDirGrid">
                    @foreach($dirColumns as $colIndex => $groups)
                        <div class="kz-ftr-dir-col">
                            @foreach($groups as $groupIndex => $group)
                                @php
                                    $groupLinks = $group['links'] ?? [];
                                    $groupOpenMobile = ($colIndex === 0 && $groupIndex === 0);
                                @endphp
                                <div class="kz-ftr-dir-group {{ $groupOpenMobile ? 'is-open' : '' }}" data-dir-group>
                                    <div class="kz-ftr-dir-head" data-dir-head>
                                        <h4 class="kz-ftr-dir-heading">
                                            @if(!empty($group['url']) && trim($group['url']) !== '#')
                                                <a href="{{ str_starts_with($group['url'], 'http') ? $group['url'] : url($group['url']) }}">{{ $group['heading'] }}</a>
                                            @else
                                                <span>{{ $group['heading'] }}</span>
                                            @endif
                                        </h4>
                                        <div class="kz-ftr-dir-head-meta">
                                            @if(!empty($groupLinks))
                                                <span class="kz-ftr-group-count">{{ count($groupLinks) }}</span>
                                                <button type="button"
                                                        class="kz-ftr-group-toggle"
                                                        data-dir-accordion
                                                        aria-expanded="{{ $groupOpenMobile ? 'true' : 'false' }}"
                                                        aria-label="Toggle {{ $group['heading'] }}">
                                                    <i class="fa-solid fa-chevron-down"></i>
                                                </button>
                                            @endif
                                        </div>
                                    </div>

                                    @if(!empty($groupLinks))
                                        <ul class="kz-ftr-dir-list">
                                            @foreach($groupLinks as $link)
                                                @php
                                                    $href = str_starts_with($link['url'], 'http') ? $link['url'] : url($link['url']);
                                                    $searchHaystack = strtolower(trim(strip_tags($link['label'] . ' ' . $group['heading'])));
                                                @endphp
                                                <li data-dir-item data-search="{{ $searchHaystack }}">
                                                    <a href="{{ $href }}">
                                                        <i class="fa-solid fa-angle-right kz-ftr-link-arrow" aria-hidden="true"></i>
                                                        <span>{{ $link['label'] }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            @endforeach

                            @if($loop->last && !empty($setting->pay_online_url))
                                <div class="kz-ftr-dir-group kz-ftr-pay-group is-open">
                                    <div class="kz-ftr-dir-head">
                                        <h4 class="kz-ftr-dir-heading"><span>{{ $payOnlineLabel }}</span></h4>
                                        <span class="kz-ftr-secure-tag"><i class="fa-solid fa-lock"></i> Secure</span>
                                    </div>
                                    <p class="kz-ftr-pay-note">Fast, protected online booking confirmation for tours &amp; rentals.</p>
                                    <a href="{{ $payOnlineUrl }}"
                                       class="kz-dir-pay-btn"
                                       @if($payIsExternal) target="_blank" rel="noopener noreferrer" @endif>
                                        <i class="fa-regular fa-credit-card"></i>
                                        <span>{{ $payOnlineLabel }}</span>
                                        <i class="fa-solid fa-arrow-up-right-from-square kz-dir-pay-ext"></i>
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- Interactive Contact Hub & Optional Gallery Card --}}
            <div class="kz-ftr-bottom-meta {{ !empty($footerGallery) && $footerGallery->isNotEmpty() ? 'has-gallery' : '' }}">
                <div class="kz-ftr-contact-hub">
                    <div class="kz-ftr-hub-top">
                        <div>
                            <span class="kz-ftr-hub-eyebrow"><i class="fa-regular fa-compass"></i> Customer Support Desk</span>
                            <h4 class="footer-heading">Contact &amp; Inquiries</h4>
                        </div>
                        <div class="kz-ftr-hub-cta-group">
                            
                            <a href="{{ route('home.contact') }}" class="kz-ftr-hub-btn kz-ftr-hub-btn-ghost">
                                <span>Contact Us</span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="kz-ftr-contact-chips">
                        @if(!empty($setting->phone))
                            <div class="kz-ftr-chip">
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $setting->phone) }}" class="kz-ftr-chip-link">
                                    <span class="kz-ftr-chip-icon"><i class="fas fa-phone-alt"></i></span>
                                    <span class="kz-ftr-chip-meta">
                                        <small>Helpline</small>
                                        <strong>{{ $setting->phone }}</strong>
                                    </span>
                                </a>
                                <button type="button"
                                        class="kz-ftr-copy-btn"
                                        data-copy-text="{{ $setting->phone }}"
                                        title="Copy phone number"
                                        aria-label="Copy phone number">
                                    <i class="fa-regular fa-copy"></i>
                                    <span class="kz-ftr-copy-label">Copy</span>
                                </button>
                            </div>
                        @endif

                        @if(!empty($setting->email))
                            <div class="kz-ftr-chip">
                                <a href="mailto:{{ $setting->email }}" class="kz-ftr-chip-link">
                                    <span class="kz-ftr-chip-icon"><i class="fas fa-envelope"></i></span>
                                    <span class="kz-ftr-chip-meta">
                                        <small>Email Support</small>
                                        <strong>{{ $setting->email }}</strong>
                                    </span>
                                </a>
                            </div>
                        @endif

                        @if(!empty($setting->address))
                            <div class="kz-ftr-chip kz-ftr-chip-address">
                                @if(!empty($setting->map_link))
                                    <a href="{{ $setting->map_link }}" target="_blank" rel="noopener noreferrer" class="kz-ftr-chip-link">
                                        <span class="kz-ftr-chip-icon"><i class="fas fa-map-marker-alt"></i></span>
                                        <span class="kz-ftr-chip-meta">
                                            <small>Office Location <span class="kz-ftr-map-pill">Open Map</span></small>
                                            <strong>{!! nl2br(e($setting->address)) !!}</strong>
                                        </span>
                                    </a>
                                @else
                                    <div class="kz-ftr-chip-link">
                                        <span class="kz-ftr-chip-icon"><i class="fas fa-map-marker-alt"></i></span>
                                        <span class="kz-ftr-chip-meta">
                                            <small>Office Location</small>
                                            <strong>{!! nl2br(e($setting->address)) !!}</strong>
                                        </span>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>

                    @if($setting->phone1 || $setting->email1)
                        <div class="footer-other-offices">
                            <button type="button" class="other-offices-toggle" data-offices-toggle aria-expanded="false">
                                <span class="other-offices-label"><i class="fa-solid fa-address-book"></i> Alternate Contacts</span>
                                <i class="fas fa-chevron-down other-offices-chevron"></i>
                            </button>
                            <div class="other-offices-body">
                                @if($setting->phone1)
                                    <div class="office-contact-item">
                                        <i class="fas fa-phone-alt office-icon"></i>
                                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $setting->phone1) }}" class="contact-link">{{ $setting->phone1 }}</a>
                                    </div>
                                @endif
                                @if($setting->email1)
                                    <div class="office-contact-item">
                                        <i class="fas fa-envelope office-icon"></i>
                                        <a href="mailto:{{ $setting->email1 }}" class="contact-link">{{ $setting->email1 }}</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>

                @if(!empty($footerGallery) && $footerGallery->isNotEmpty())
                    <div class="footer-col footer-accordion-col footer-instagram-col kz-ftr-gallery-card">
                        <div class="footer-col-header" data-accordion-toggle>
                            <div class="kz-ftr-gal-title-wrap">
                                <h4 class="footer-heading">Gallery</h4>
                                <a href="{{ route('home.photogallery') }}" class="kz-ftr-gal-viewall">View All <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                            <span class="accordion-icon"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div class="footer-col-body">
                            <div class="footer-gallery">
                                @foreach($footerGallery as $gg)
                                    <div class="gallery-item">
                                        <img src="{{ asset('storage/' . $gg->file) }}" alt="{{ $gg->title ?? 'Gallery Image' }}" loading="lazy">
                                        <a href="{{ route('home.photogallery') }}" class="gallery-overlay" aria-label="{{ $gg->title ?? 'View Gallery' }}">
                                            <i class="fa-regular fa-images"></i>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Copyright & Trust Bar --}}
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-inner">
                <p class="copyright-text">&copy; {{ date('Y') }} {{ $setting->footer_copyright ?: ($setting->name . '. All Rights Reserved.') }}</p>
                <div class="footer-bottom-actions">
                    <div class="footer-bottom-right d-none d-md-flex">
                        <span class="accept-label">We Accept</span>
                        <img src="{{ asset('webassets/img/shape/cards.png') }}" alt="Payment Methods">
                    </div>
                    <button type="button" id="kzFooterBackTop" class="kz-ftr-back-top" title="Back to top" aria-label="Back to top">
                        <i class="fa-solid fa-arrow-up"></i>
                        <span>Top</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

</footer>

<style>
/* ==========================================================
   UNIFIED INTERACTIVE FOOTER: BRAND BAR, FILTERABLE DIRECTORY & HUB
   ========================================================== */
.site-footer,
.site-footer .footer-logo-section,
.site-footer .footer-main {
    background: linear-gradient(180deg, #0c514d 0%, #073b38 100%) !important;
    color: #ffffff !important;
}
.site-footer {
    position: relative;
    border-top: 2px solid rgba(214, 179, 106, 0.42);
}
.site-footer [hidden] {
    display: none !important;
}

/* --- Top Brand & Quick Action Strip --- */
.site-footer .footer-logo-section {
    padding: 24px 0 !important;
    border-bottom: 1px solid rgba(255, 255, 255, 0.09) !important;
}
.kz-ftr-brand-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 18px 24px;
    flex-wrap: wrap;
}
.kz-ftr-brand-identity {
    display: flex;
    align-items: center;
    gap: 16px;
    flex: 1 1 320px;
    min-width: 0;
}
.site-footer .footer-logo-wrap {
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    background: #ffffff !important;
    padding: 8px 16px !important;
    border-radius: 12px !important;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.28) !important;
    text-decoration: none !important;
    flex-shrink: 0 !important;
    transition: transform 0.25s ease, box-shadow 0.25s ease !important;
}
.site-footer .footer-logo-wrap:hover {
    transform: translateY(-2px) !important;
    box-shadow: 0 10px 26px rgba(0, 0, 0, 0.38) !important;
}
.site-footer .footer-logo-wrap img {
    max-height: 44px !important;
    width: auto !important;
    object-fit: contain !important;
    display: block !important;
}
.kz-ftr-brand-fallback {
    display: inline-flex;
    align-items: center;
    padding: 9px 18px;
    border-radius: 10px;
    background: rgba(221, 171, 67, 0.14);
    border: 1px solid rgba(221, 171, 67, 0.4);
    color: #efd28f !important;
    font-weight: 800;
    font-size: 16px;
    letter-spacing: 0.04em;
    text-decoration: none !important;
    flex-shrink: 0;
}
.kz-ftr-brand-copy {
    min-width: 0;
}
.kz-ftr-brand-name-row {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
    margin-bottom: 4px;
}
.kz-ftr-brand-badge {
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: #efd28f;
}
.kz-ftr-verified-pill {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 11px;
    font-weight: 600;
    color: #6ee7b7;
    background: rgba(16, 185, 129, 0.12);
    border: 1px solid rgba(16, 185, 129, 0.28);
    padding: 2px 9px;
    border-radius: 999px;
}
.site-footer .footer-tagline {
    font-size: 13.5px !important;
    line-height: 1.5 !important;
    color: rgba(226, 232, 240, 0.82) !important;
    margin: 0 !important;
    max-width: 580px !important;
}
.kz-ftr-brand-actions {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
}
.kz-ftr-cta-pill {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    height: 40px;
    padding: 0 18px;
    border-radius: 999px;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none !important;
    border: 1px solid transparent;
    cursor: pointer;
    white-space: nowrap;
    transition: transform 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease, border-color 0.2s ease;
}
.kz-ftr-cta-primary {
    background: linear-gradient(135deg, #d6b36a 0%, #bd9852 100%);
    color: #0c3f3b !important;
    box-shadow: 0 6px 18px rgba(221, 171, 67, 0.26);
}
.kz-ftr-cta-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 24px rgba(221, 171, 67, 0.38);
    color: #0c3f3b !important;
}
.kz-ftr-cta-whatsapp {
    background: rgba(34, 197, 94, 0.13);
    border-color: rgba(34, 197, 94, 0.36);
    color: #86efac !important;
}
.kz-ftr-cta-whatsapp:hover {
    background: #16a34a;
    border-color: #16a34a;
    color: #ffffff !important;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(22, 163, 74, 0.35);
}
.site-footer .footer-social {
    display: inline-flex !important;
    gap: 8px !important;
    align-items: center !important;
    margin: 0 !important;
    padding-left: 4px;
}
.site-footer .social-icon {
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    width: 36px !important;
    height: 36px !important;
    border-radius: 50% !important;
    background: rgba(255, 255, 255, 0.07) !important;
    border: 1px solid rgba(255, 255, 255, 0.16) !important;
    color: #ffffff !important;
    font-size: 14px !important;
    text-decoration: none !important;
    transition: all 0.22s ease !important;
}
.site-footer .social-icon:hover {
    background: #126e68 !important;
    border-color: #d6b36a !important;
    color: #ffffff !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 6px 14px rgba(18, 110, 104, 0.42) !important;
}

/* --- Main Footer Area --- */
.site-footer .footer-main {
    padding: 32px 0 30px !important;
}

/* --- Interactive Directory Toolbar --- */
.kz-ftr-dir-toolbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 14px 20px;
    flex-wrap: wrap;
    margin-bottom: 22px;
    padding-bottom: 16px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
}
.kz-ftr-dir-summary {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
}
.kz-ftr-dir-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #d6b36a;
    box-shadow: 0 0 0 4px rgba(221, 171, 67, 0.18);
    flex-shrink: 0;
}
.kz-ftr-dir-summary-label {
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.07em;
    color: rgba(255, 255, 255, 0.9);
}
.kz-ftr-count-pill {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 12px;
    font-weight: 600;
    color: #efd28f;
    background: rgba(221, 171, 67, 0.14);
    border: 1px solid rgba(221, 171, 67, 0.28);
    padding: 2px 10px;
    border-radius: 999px;
}
.kz-ftr-dir-controls {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
}
.kz-ftr-search-wrap {
    position: relative;
    width: 280px;
    max-width: 100%;
}
.kz-ftr-search-icon {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 12.5px;
    color: rgba(255, 255, 255, 0.48);
    pointer-events: none;
}
.kz-ftr-search-input {
    width: 100%;
    height: 38px;
    padding: 0 34px 0 35px;
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.06);
    border: 1px solid rgba(255, 255, 255, 0.14);
    color: #ffffff;
    font-size: 13px;
    outline: none;
    transition: border-color 0.2s ease, background-color 0.2s ease, box-shadow 0.2s ease;
}
.kz-ftr-search-input::placeholder {
    color: rgba(255, 255, 255, 0.45);
}
.kz-ftr-search-input:focus {
    background: rgba(255, 255, 255, 0.09);
    border-color: #d6b36a;
    box-shadow: 0 0 0 3px rgba(221, 171, 67, 0.16);
}
.kz-ftr-search-clear {
    position: absolute;
    right: 8px;
    top: 50%;
    transform: translateY(-50%);
    width: 22px;
    height: 22px;
    border-radius: 50%;
    border: none;
    background: rgba(255, 255, 255, 0.14);
    color: #ffffff;
    font-size: 11px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    padding: 0;
}
.kz-ftr-search-clear:hover {
    background: rgba(221, 171, 67, 0.45);
}
.kz-ftr-expand-all {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    height: 38px;
    padding: 0 13px;
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.15);
    background: rgba(255, 255, 255, 0.06);
    color: #e2e8f0;
    font-size: 12.5px;
    font-weight: 600;
    cursor: pointer;
}
.kz-ftr-no-results {
    margin-bottom: 22px;
    padding: 16px 20px;
    border-radius: 12px;
    background: rgba(255, 255, 255, 0.04);
    border: 1px dashed rgba(214, 179, 106, 0.42);
}
.kz-ftr-no-results-inner {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    flex-wrap: wrap;
    font-size: 13.5px;
    color: rgba(226, 232, 240, 0.88);
}
.kz-ftr-no-results-inner i {
    color: #d6b36a;
}
.kz-ftr-reset-btn {
    border: 1px solid rgba(221, 171, 67, 0.45);
    background: rgba(221, 171, 67, 0.14);
    color: #efd28f;
    font-size: 12.5px;
    font-weight: 600;
    padding: 5px 12px;
    border-radius: 8px;
    cursor: pointer;
}

/* --- Dynamic Columns Grid & Group Cards --- */
.kz-ftr-dir-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 20px;
    align-items: start;
    padding-bottom: 28px;
}
.kz-ftr-cols-1 { grid-template-columns: 1fr; }
.kz-ftr-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
.kz-ftr-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
.kz-ftr-cols-4 { grid-template-columns: repeat(4, minmax(0, 1fr)); }
.kz-ftr-dir-col {
    display: flex;
    flex-direction: column;
    gap: 16px;
    min-width: 0;
}
.kz-ftr-dir-group {
    min-width: 0;
    background: rgba(255, 255, 255, 0.025);
    border: 1px solid rgba(255, 255, 255, 0.075);
    border-radius: 12px;
    padding: 15px 16px;
    transition: border-color 0.22s ease, background-color 0.22s ease;
}
.kz-ftr-dir-group:hover {
    background: rgba(255, 255, 255, 0.045);
    border-color: rgba(221, 171, 67, 0.28);
}
.kz-ftr-dir-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
}
.kz-ftr-dir-heading {
    font-size: 14px;
    font-weight: 700;
    color: #ffffff;
    margin: 0;
    line-height: 1.35;
    letter-spacing: 0.01em;
    padding-left: 10px;
    border-left: 3px solid #d6b36a;
}
.kz-ftr-dir-heading a {
    color: #ffffff;
    text-decoration: none;
    transition: color 0.16s ease;
}
.kz-ftr-dir-heading a:hover {
    color: #efd28f;
}
.kz-ftr-dir-head-meta {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    flex-shrink: 0;
}
.kz-ftr-group-count {
    font-size: 11px;
    font-weight: 600;
    color: rgba(255, 255, 255, 0.56);
    background: rgba(255, 255, 255, 0.06);
    padding: 2px 7px;
    border-radius: 999px;
}
.kz-ftr-group-toggle {
    display: none;
    align-items: center;
    justify-content: center;
    width: 26px;
    height: 26px;
    border-radius: 50%;
    border: 1px solid rgba(255, 255, 255, 0.12);
    background: rgba(255, 255, 255, 0.05);
    color: rgba(255, 255, 255, 0.72);
    font-size: 11px;
    cursor: pointer;
    padding: 0;
    transition: transform 0.25s ease, background-color 0.2s ease;
}
.kz-ftr-dir-group.is-open .kz-ftr-group-toggle i {
    transform: rotate(180deg);
}
.kz-ftr-dir-list {
    list-style: none;
    margin: 12px 0 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 3px;
}
.kz-ftr-dir-list li a {
    display: flex;
    align-items: flex-start;
    gap: 7px;
    font-size: 12.8px;
    line-height: 1.45;
    color: rgba(226, 232, 240, 0.78);
    text-decoration: none;
    padding: 4px 6px;
    margin: 0 -6px;
    border-radius: 7px;
    transition: color 0.16s ease, background-color 0.16s ease, transform 0.16s ease;
}
.kz-ftr-link-arrow {
    font-size: 10.5px;
    color: #d6b36a;
    opacity: 0.48;
    margin-top: 4px;
    flex-shrink: 0;
    transition: transform 0.18s ease, opacity 0.18s ease;
}
.kz-ftr-dir-list li a:hover {
    color: #ffffff;
    background: rgba(255, 255, 255, 0.06);
}
.kz-ftr-dir-list li a:hover .kz-ftr-link-arrow {
    opacity: 1;
    transform: translateX(3px);
}
.kz-ftr-mark {
    background: rgba(250, 204, 21, 0.26);
    color: #fef08a;
    padding: 0 2px;
    border-radius: 3px;
}

/* --- Pay Online Card --- */
.kz-ftr-pay-group {
    background: linear-gradient(145deg, rgba(16, 185, 129, 0.1) 0%, rgba(15, 23, 42, 0.45) 100%);
    border-color: rgba(16, 185, 129, 0.25);
}
.kz-ftr-secure-tag {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 10.5px;
    font-weight: 600;
    color: #6ee7b7;
    background: rgba(16, 185, 129, 0.15);
    padding: 2px 8px;
    border-radius: 999px;
}
.kz-ftr-pay-note {
    font-size: 12px;
    line-height: 1.45;
    color: rgba(226, 232, 240, 0.72);
    margin: 10px 0 12px;
}
.kz-dir-pay-btn {
    display: flex;
    width: 100%;
    align-items: center;
    justify-content: center;
    gap: 8px;
    background: linear-gradient(135deg, #22c55e 0%, #15803d 100%);
    color: #ffffff !important;
    font-size: 13.5px;
    font-weight: 700;
    padding: 10px 18px;
    border-radius: 9px;
    text-decoration: none !important;
    box-shadow: 0 6px 18px rgba(22, 163, 74, 0.3);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.kz-dir-pay-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 22px rgba(22, 163, 74, 0.45);
    color: #ffffff !important;
}
.kz-dir-pay-ext {
    font-size: 11px;
    opacity: 0.85;
}

/* --- Bottom Contact Hub & Optional Gallery --- */
.kz-ftr-bottom-meta {
    border-top: 1px solid rgba(255, 255, 255, 0.09);
    padding-top: 26px;
    display: grid;
    grid-template-columns: 1fr;
    gap: 24px;
}
.kz-ftr-contact-hub {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.04) 0%, rgba(18, 110, 104, 0.16) 100%);
    border: 1px solid rgba(255, 255, 255, 0.09);
    border-radius: 16px;
    padding: 22px 24px;
}
.kz-ftr-hub-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 14px 20px;
    flex-wrap: wrap;
    margin-bottom: 18px;
}
.kz-ftr-hub-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 11.5px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: #d6b36a;
}
.kz-ftr-contact-hub .footer-heading,
.kz-ftr-gallery-card .footer-heading {
    margin: 4px 0 0 !important;
    font-size: 17px !important;
    font-weight: 700 !important;
    color: #ffffff !important;
    text-transform: none !important;
    letter-spacing: 0.01em !important;
}
.kz-ftr-hub-cta-group {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
}
.kz-ftr-hub-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    height: 38px;
    padding: 0 16px;
    border-radius: 9px;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none !important;
    cursor: pointer;
    transition: all 0.2s ease;
}
.kz-ftr-hub-btn-gold {
    border: none;
    background: linear-gradient(135deg, #d6b36a 0%, #bd9852 100%);
    color: #0c3f3b !important;
    box-shadow: 0 6px 16px rgba(221, 171, 67, 0.25);
}
.kz-ftr-hub-btn-gold:hover {
    transform: translateY(-1px);
    box-shadow: 0 8px 20px rgba(221, 171, 67, 0.38);
}
.kz-ftr-hub-btn-ghost {
    border: 1px solid rgba(255, 255, 255, 0.18);
    background: rgba(255, 255, 255, 0.06);
    color: #ffffff !important;
}
.kz-ftr-hub-btn-ghost:hover {
    background: rgba(255, 255, 255, 0.13);
    border-color: rgba(255, 255, 255, 0.34);
    color: #ffffff !important;
}
.kz-ftr-contact-chips {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 12px;
}
.kz-ftr-chip {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    background: rgba(15, 23, 42, 0.56);
    border: 1px solid rgba(255, 255, 255, 0.09);
    border-radius: 12px;
    padding: 11px 14px;
    min-width: 0;
    transition: border-color 0.2s ease, transform 0.2s ease;
}
.kz-ftr-chip:hover {
    border-color: rgba(221, 171, 67, 0.36);
    transform: translateY(-1px);
}
.kz-ftr-chip-link {
    display: flex;
    align-items: center;
    gap: 12px;
    min-width: 0;
    flex: 1;
    text-decoration: none !important;
    color: inherit;
}
.kz-ftr-chip-icon {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    background: rgba(221, 171, 67, 0.14);
    color: #efd28f;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    flex-shrink: 0;
}
.kz-ftr-chip-meta {
    display: flex;
    flex-direction: column;
    min-width: 0;
}
.kz-ftr-chip-meta small {
    font-size: 11px;
    color: rgba(255, 255, 255, 0.54);
    line-height: 1.2;
    margin-bottom: 2px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}
.kz-ftr-chip-meta strong {
    font-size: 13px;
    font-weight: 600;
    color: #f8fafc;
    line-height: 1.35;
    word-break: break-word;
}
.kz-ftr-map-pill {
    font-size: 10px;
    color: #a8e2d9;
    background: rgba(18, 110, 104, 0.18);
    padding: 1px 6px;
    border-radius: 999px;
}
.kz-ftr-copy-btn {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    height: 30px;
    padding: 0 10px;
    border-radius: 8px;
    border: 1px solid rgba(255, 255, 255, 0.14);
    background: rgba(255, 255, 255, 0.07);
    color: rgba(255, 255, 255, 0.85);
    font-size: 11.5px;
    font-weight: 600;
    cursor: pointer;
    flex-shrink: 0;
    transition: all 0.18s ease;
}
.kz-ftr-copy-btn:hover {
    background: rgba(221, 171, 67, 0.22);
    border-color: rgba(221, 171, 67, 0.45);
    color: #ffffff;
}
.kz-ftr-copy-btn.is-copied {
    background: rgba(16, 185, 129, 0.2);
    border-color: rgba(16, 185, 129, 0.5);
    color: #6ee7b7;
}
.site-footer .footer-other-offices {
    margin-top: 14px;
    padding-top: 12px;
    border-top: 1px solid rgba(255, 255, 255, 0.09);
}
.site-footer .other-offices-toggle {
    display: flex;
    width: 100%;
    align-items: center;
    justify-content: space-between;
    background: transparent;
    border: none;
    padding: 4px 0;
    color: rgba(255, 255, 255, 0.78);
    font-size: 12.5px;
    font-weight: 600;
    cursor: pointer;
}
.site-footer .other-offices-label {
    display: inline-flex;
    align-items: center;
    gap: 8px;
}
.site-footer .other-offices-chevron {
    transition: transform 0.25s ease;
}
.site-footer .footer-other-offices.active .other-offices-chevron {
    transform: rotate(180deg);
}
.site-footer .other-offices-body {
    display: none;
    padding-top: 10px;
    gap: 10px 20px;
    flex-wrap: wrap;
}
.site-footer .footer-other-offices.active .other-offices-body {
    display: flex;
}
.site-footer .office-contact-item {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
}
.site-footer .office-icon {
    color: #d6b36a;
}
.site-footer .office-contact-item .contact-link {
    color: rgba(255, 255, 255, 0.85);
    text-decoration: none;
}
.site-footer .office-contact-item .contact-link:hover {
    color: #efd28f;
}

/* --- Gallery Card --- */
.kz-ftr-gallery-card {
    background: rgba(255, 255, 255, 0.03);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 16px;
    padding: 20px 22px;
}
.kz-ftr-gal-title-wrap {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    flex: 1;
}
.kz-ftr-gal-viewall {
    font-size: 12px;
    font-weight: 600;
    color: #d6b36a !important;
    text-decoration: none !important;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}
.kz-ftr-gal-viewall:hover {
    color: #efd28f !important;
}
.kz-ftr-gallery-card .footer-gallery {
    margin-top: 14px;
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 8px;
}
.kz-ftr-gallery-card .gallery-item {
    border-radius: 8px;
    overflow: hidden;
    aspect-ratio: 1 / 1;
    position: relative;
}
.kz-ftr-gallery-card .gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.3s ease;
}
.kz-ftr-gallery-card .gallery-item:hover img {
    transform: scale(1.06);
}

/* --- Bottom Copyright & Trust Bar --- */
.site-footer .footer-bottom {
    background-color: #062f2d !important;
    border-top: 1px solid rgba(255, 255, 255, 0.08) !important;
    padding: 16px 0 !important;
}
.site-footer .footer-bottom-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 14px;
    flex-wrap: wrap;
}
.site-footer .footer-bottom .copyright-text,
.site-footer .footer-bottom .accept-label {
    color: rgba(226, 232, 240, 0.72) !important;
    margin: 0 !important;
    font-size: 12.5px !important;
}
.footer-bottom-actions {
    display: flex;
    align-items: center;
    gap: 14px;
}
.kz-ftr-back-top {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    height: 32px;
    padding: 0 13px;
    border-radius: 999px;
    border: 1px solid rgba(255, 255, 255, 0.16);
    background: rgba(255, 255, 255, 0.06);
    color: #e2e8f0;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
}
.kz-ftr-back-top:hover {
    background: rgba(221, 171, 67, 0.2);
    border-color: #d6b36a;
    color: #efd28f;
    transform: translateY(-1px);
}

@media (min-width: 992px) {
    .fsb-wrapper .fsb-btn.fsb-whatsapp:hover {
        width: auto !important;
        min-width: 245px !important;
        padding-right: 16px !important;
    }
    .fsb-wrapper .fsb-btn.fsb-whatsapp .fsb-label {
        white-space: nowrap !important;
    }
}

/* --- Desktop >= 768px --- */
@media (min-width: 768px) {
    .kz-ftr-bottom-meta.has-gallery {
        grid-template-columns: 1.35fr 1fr !important;
        gap: 24px !important;
        align-items: stretch !important;
    }
    .site-footer .footer-accordion-col .footer-col-body {
        display: block !important;
        max-height: none !important;
        height: auto !important;
        overflow: visible !important;
    }
    .site-footer .footer-col-header {
        display: flex !important;
        cursor: default !important;
        padding: 0 !important;
        border: none !important;
    }
    .site-footer .accordion-icon {
        display: none !important;
    }
}

@media (max-width: 991px) {
    .kz-ftr-dir-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 16px;
    }
}

/* --- Mobile < 768px: Clean Stacked Brand + Filterable Directory Accordions --- */
@media (max-width: 767px) {
    .kz-ftr-brand-bar {
        flex-direction: column;
        align-items: flex-start;
    }
    .kz-ftr-dir-grid {
        grid-template-columns: 1fr;
        gap: 12px;
    }
    .kz-ftr-dir-controls,
    .kz-ftr-search-wrap {
        width: 100%;
    }
    .kz-ftr-search-wrap {
        flex: 1;
    }
    .kz-ftr-dir-group {
        padding: 13px 15px;
    }
    .kz-ftr-dir-head {
        cursor: pointer;
    }
    .kz-ftr-group-toggle {
        display: inline-flex;
    }
    .kz-ftr-dir-list {
        display: none;
        padding-top: 10px;
        margin-top: 10px;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
    }
    .kz-ftr-dir-group.is-open .kz-ftr-dir-list {
        display: flex;
    }
    .kz-ftr-contact-hub {
        padding: 18px 16px;
    }
    .site-footer .footer-col-header {
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        gap: 12px !important;
        cursor: pointer !important;
    }
    .site-footer .accordion-icon {
        display: inline-flex !important;
        font-size: 12px !important;
        color: rgba(255, 255, 255, 0.7) !important;
        transition: transform 0.25s ease !important;
    }
    .site-footer .footer-accordion-col.active .accordion-icon i,
    .site-footer .footer-accordion-col.is-open .accordion-icon i {
        transform: rotate(180deg) !important;
    }
    .site-footer .footer-accordion-col .footer-col-body {
        display: none !important;
    }
    .site-footer .footer-accordion-col.active .footer-col-body,
    .site-footer .footer-accordion-col.is-open .footer-col-body {
        display: block !important;
    }
}

/* ==========================================================
   FLOATING BUTTONS: PAY NOW BUTTON STYLING (MATCHES OTHERS)
   ========================================================== */
@media (min-width: 992px) {
    /* Desktop: Crisp white background, identical to Book Now / Call Us */
    .fsb-wrapper .fsb-btn.fsb-pay {
        background: #ffffff !important;
        border-bottom: 1px solid #f2f2f2 !important;
        width: 52px;
        transition: width 0.28s cubic-bezier(0.4, 0, 0.2, 1) !important;
    }

    /* Desktop Hover: Expands to reveal text with matching hover tone */
    .fsb-wrapper .fsb-btn.fsb-pay:hover {
        width: 150px !important;
        background: #fafafa !important;
    }

    /* Icon color on desktop: Love Link deep teal */
    .fsb-wrapper .fsb-pay .fsb-icon svg {
        stroke: #126e68 !important;
        fill: none !important;
        width: 20px !important;
        height: 20px !important;
        transition: transform 0.2s ease !important;
    }

    .fsb-wrapper .fsb-btn.fsb-pay:hover .fsb-icon svg {
        transform: scale(1.12) !important;
    }

    /* Text Label: Visible on Hover */
    .fsb-wrapper .fsb-btn.fsb-pay .fsb-label {
        font-size: 12.5px !important;
        font-weight: 600 !important;
        letter-spacing: 0.01em !important;
        white-space: nowrap !important;
        padding-right: 14px !important;
        opacity: 0 !important;
        transition: opacity 0.15s ease 0.08s !important;
        color: #222222 !important;
    }

    .fsb-wrapper .fsb-btn.fsb-pay:hover .fsb-label {
        opacity: 1 !important;
        color: #126e68 !important;
    }
}

@media (max-width: 991px) {
    /* Mobile: Matches other bottom bar buttons */
    .fsb-wrapper .fsb-btn.fsb-pay {
        flex: 1 !important;
        flex-direction: column !important;
        align-items: center !important;
        justify-content: center !important;
        padding: 6px 4px !important;
        gap: 3px !important;
        background: transparent !important;
        color: #ffffff !important;
        border: none !important;
        border-radius: 0 !important;
        width: auto !important;
        height: 54px !important;
        overflow: visible !important;
        position: relative !important;
        transition: background 0.2s ease !important;
    }

    .fsb-wrapper .fsb-btn.fsb-pay:hover,
    .fsb-wrapper .fsb-btn.fsb-pay:active {
        background: rgba(255, 255, 255, 0.08) !important;
        width: auto !important;
        box-shadow: none !important;
    }

    .fsb-wrapper .fsb-pay .fsb-icon svg {
        stroke: #ffffff !important;
        fill: none !important;
        stroke-width: 1.8px !important;
        width: 20px !important;
        height: 20px !important;
    }

    .fsb-wrapper .fsb-pay .fsb-label {
        font-size: 9.5px !important;
        font-weight: 600 !important;
        letter-spacing: 0.02em !important;
        white-space: nowrap !important;
        color: #ffffff !important;
        opacity: 1 !important;
        display: block !important;
        padding: 0 !important;
        line-height: 1 !important;
    }
}
</style>

<!--********************************
		Code End  Here 
******************************** -->

<!-- Scroll To Top -->
<div class="scroll-top">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
        </path>
    </svg>
</div>

<!--==============================
modal Area  
==============================-->
<div id="login-form" class="popup-login-register mfp-hide">
    <ul class="nav" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-menu" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="false">Login</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-menu active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">Register</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <h3 class="box-title mb-30">Sign in to your account</h3>
            <div class="th-login-form">
                <form action="mail.php" method="POST" class="login-form ajax-contact">
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Username or email</label>
                            <input type="text" class="form-control" name="email" id="email" required="required">
                        </div>
                        <div class="form-group col-12">
                            <label>Password</label>
                            <input type="password" class="form-control" name="pasword" id="pasword" required="required">
                        </div>

                        <div class="form-btn mb-20 col-12">
                            <button class="th-btn btn-fw th-radius2 ">Send Message</button>
                        </div>
                    </div>
                    <div id="forgot_url">
                        <a href="my-account.html">Forgot password?</a>
                    </div>
                    <p class="form-messages mb-0 mt-3"></p>
                </form>
            </div>
        </div>
        <div class="tab-pane fade active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <h3 class="th-form-title mb-30">Sign in to your account</h3>
            <form action="mail.php" method="POST" class="login-form ajax-contact">
                <div class="row">
                    <div class="form-group col-12">
                        <label>Username*</label>
                        <input type="text" class="form-control" name="usename" id="usename" required="required">
                    </div>
                    <div class="form-group col-12">
                        <label>First name*</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" required="required">
                    </div>
                    <div class="form-group col-12">
                        <label>Last name*</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" required="required">
                    </div>
                    <div class="form-group col-12">
                        <label for="new_email">Your email*</label>
                        <input type="text" class="form-control" name="new_email" id="new_email" required="required">
                    </div>
                    <div class="form-group col-12">
                        <label for="new_email_confirm">Confirm email*</label>
                        <input type="text" class="form-control" name="new_email_confirm" id="new_email_confirm" required="required">
                    </div>
                    <div class="statement">
                        <span class="register-notes">A password will be emailed to you.</span>
                    </div>

                    <div class="form-btn mt-20 col-12">
                        <button class="th-btn btn-fw th-radius2 ">Sign up</button>
                    </div>
                </div>
                <p class="form-messages mb-0 mt-3"></p>
            </form>
        </div>
    </div>
</div>

<?php
/**
 * ==============================================================================
 * FLOATING SIDEBAR (Desktop Right) + FLOATING BOTTOM BAR (Mobile)
 * ==============================================================================
 */

// Dynamic fallback constants if defined in CMS
$fsb_phone = defined('CONTACT_PHONE') ? CONTACT_PHONE : ($setting->phone ?? '+917006338617');
$fsb_phone_clean = preg_replace('/[^0-9]/', '', $fsb_phone);
$fsb_email = defined('CONTACT_EMAIL') ? CONTACT_EMAIL : ($setting->email ?? 'Lovelinktravels@gmail.com');
?>

@php
$fsb_email = $setting->email ?? 'Lovelinktravels@gmail.com';
$fsb_phone = $setting->phone ?? '+917006338617';
$fsb_wa_url = getWhatsappUrl($setting);
$fsb_wa_label = $setting->whatsapp_cta_label ?: 'Need a custom plan? Chat on WhatsApp';
$fsb_pay_url = getPayOnlineUrl($setting);
$fsb_pay_label = $setting->pay_online_label ?: 'Pay Online';
@endphp

<!-- FIXED RIGHT SIDEBAR (Desktop) + BOTTOM BAR (Mobile) -->
<div class="fsb-wrapper">

  <!-- WhatsApp -->
  <a href="{{ $fsb_wa_url }}" target="_blank" rel="noopener noreferrer" class="fsb-btn fsb-whatsapp" aria-label="{{ $fsb_wa_label }}" title="{{ $fsb_wa_label }}">
    <span class="fsb-icon">
      <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
        <path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.554 4.117 1.528 5.845L.057 23.617a.75.75 0 0 0 .92.919l5.84-1.47A11.945 11.945 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.75a9.718 9.718 0 0 1-4.953-1.354l-.355-.211-3.673.924.942-3.588-.231-.368A9.715 9.715 0 0 1 2.25 12C2.25 6.615 6.615 2.25 12 2.25S21.75 6.615 21.75 12 17.385 21.75 12 21.75z"/>
      </svg>
    </span>
    <span class="fsb-label">{{ $fsb_wa_label }}</span>
  </a>

  <!-- Email -->
  <a href="mailto:{{ $fsb_email }}" class="fsb-btn fsb-email" aria-label="Email">
    <span class="fsb-icon">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
        <rect x="2" y="4" width="20" height="16" rx="2"/>
        <path d="m2 7 10 7 10-7"/>
      </svg>
    </span>
    <span class="fsb-label">Email Us</span>
  </a>

  <!-- Book Now -->
  <a href="#" class="fsb-btn fsb-book" aria-label="Book Now"
     data-bs-toggle="modal" data-bs-target="#globalContactModal">
    <span class="fsb-icon">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
        <rect x="3" y="4" width="18" height="18" rx="2"/>
        <path d="M16 2v4M8 2v4M3 10h18"/>
        <path d="M8 14h.01M12 14h.01M16 14h.01M8 18h.01M12 18h.01"/>
      </svg>
    </span>
    <span class="fsb-label">Book Now</span>
  </a>

  <!-- Pay Now -->
  <a href="{{ $fsb_pay_url }}" @if(str_starts_with($fsb_pay_url, 'http')) target="_blank" rel="noopener noreferrer" @endif class="fsb-btn fsb-pay" aria-label="{{ $fsb_pay_label }}">
    <span class="fsb-icon">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
        <rect x="2" y="5" width="20" height="14" rx="2"/>
        <line x1="2" y1="10" x2="22" y2="10"/>
        <line x1="6" y1="15" x2="10" y2="15"/>
      </svg>
    </span>
    <span class="fsb-label">{{ $fsb_pay_label }}</span>
  </a>

  <!-- Call Us -->
  <a href="tel:{{ $fsb_phone }}" class="fsb-btn fsb-call" aria-label="Call Us">
    <span class="fsb-icon">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 1.27h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L7.91 8.8a16 16 0 0 0 6.29 6.29l.91-.91a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
      </svg>
    </span>
    <span class="fsb-label">Call Us</span>
  </a>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof Swiper !== 'undefined') {
        const kawSwiper = new Swiper('#kawDomesticSwiper', {
            loop: true,
            centeredSlides: false,
            grabCursor: true,
            speed: 700,
            breakpoints: {
                0:    { slidesPerView: 1.2, spaceBetween: 16 },
                576:  { slidesPerView: 2.2, spaceBetween: 20 },
                992:  { slidesPerView: 3.2, spaceBetween: 24 },
                1200: { slidesPerView: 3.8, spaceBetween: 28 }
            }
        });

        var prevBtn = document.getElementById('kawDomesticPrev');
        var nextBtn = document.getElementById('kawDomesticNext');
        if (prevBtn) prevBtn.addEventListener('click', function () { kawSwiper.slidePrev(); });
        if (nextBtn) nextBtn.addEventListener('click', function () { kawSwiper.slideNext(); });
    }
});
</script>

<script>
(function () {
    // 1. Gallery accordion toggle (mobile only)
    document.querySelectorAll('[data-accordion-toggle]').forEach(function (header) {
        header.addEventListener('click', function () {
            if (window.innerWidth >= 768) return;
            var col = this.closest('.footer-accordion-col');
            if (!col) return;
            var isOpen = col.classList.contains('active') || col.classList.contains('is-open');

            document.querySelectorAll('.footer-accordion-col').forEach(function (c) {
                c.classList.remove('active', 'is-open');
            });

            if (!isOpen) {
                col.classList.add('active', 'is-open');
            }
        });
    });

    // 2. Alternate Contacts dropdown toggle (desktop & mobile)
    document.querySelectorAll('[data-offices-toggle]').forEach(function (toggle) {
        toggle.addEventListener('click', function () {
            var wrapper = this.closest('.footer-other-offices');
            if (!wrapper) return;
            var active = wrapper.classList.toggle('active');
            this.setAttribute('aria-expanded', active ? 'true' : 'false');
        });
    });

    // 3. Mobile directory group accordions + Expand/Collapse All
    var dirGroups = Array.prototype.slice.call(document.querySelectorAll('[data-dir-group]'));
    dirGroups.forEach(function (group) {
        group.dataset.defaultOpen = group.classList.contains('is-open') ? '1' : '0';
        var head = group.querySelector('[data-dir-head]');
        var btn = group.querySelector('[data-dir-accordion]');
        if (!head || !btn) return;

        head.addEventListener('click', function (e) {
            if (window.innerWidth >= 768) return;
            if (e.target.closest('a')) return;
            var nextState = !group.classList.contains('is-open');
            group.classList.toggle('is-open', nextState);
            btn.setAttribute('aria-expanded', nextState ? 'true' : 'false');
        });
    });

    var toggleAllBtn = document.getElementById('kzFooterToggleAll');
    if (toggleAllBtn && dirGroups.length) {
        toggleAllBtn.addEventListener('click', function () {
            var expand = toggleAllBtn.getAttribute('aria-expanded') !== 'true';
            dirGroups.forEach(function (g) {
                if (g.hidden) return;
                g.classList.toggle('is-open', expand);
                var btn = g.querySelector('[data-dir-accordion]');
                if (btn) btn.setAttribute('aria-expanded', expand ? 'true' : 'false');
            });
            toggleAllBtn.setAttribute('aria-expanded', expand ? 'true' : 'false');
            var labelSpan = toggleAllBtn.querySelector('span');
            var icon = toggleAllBtn.querySelector('i');
            if (labelSpan) labelSpan.textContent = expand ? 'Collapse All' : 'Expand All';
            if (icon) icon.className = expand ? 'fa-solid fa-angles-up' : 'fa-solid fa-angles-down';
        });
    }

    // 4. Live Quick-Find Footer Directory Filter
    var filterInput = document.getElementById('kzFooterFilter');
    var clearBtn = document.getElementById('kzFooterFilterClear');
    var resetBtn = document.getElementById('kzFooterResetBtn');
    var matchCountEl = document.getElementById('kzFooterMatchCount');
    var noResultsEl = document.getElementById('kzFooterNoResults');
    var noResultsTerm = document.getElementById('kzFooterNoResultsTerm');
    var dirGrid = document.getElementById('kzFooterDirGrid');

    function highlightLabel(span, rawText, query) {
        span.textContent = '';
        if (!query) {
            span.textContent = rawText;
            return;
        }
        var lower = rawText.toLowerCase();
        var idx = lower.indexOf(query);
        if (idx === -1) {
            span.textContent = rawText;
            return;
        }
        if (idx > 0) span.appendChild(document.createTextNode(rawText.slice(0, idx)));
        var mark = document.createElement('mark');
        mark.className = 'kz-ftr-mark';
        mark.textContent = rawText.slice(idx, idx + query.length);
        span.appendChild(mark);
        var rest = rawText.slice(idx + query.length);
        if (rest) span.appendChild(document.createTextNode(rest));
    }

    if (filterInput && dirGrid) {
        var allItems = Array.prototype.slice.call(dirGrid.querySelectorAll('[data-dir-item]'));
        var payCards = Array.prototype.slice.call(dirGrid.querySelectorAll('.kz-ftr-pay-group'));
        var allCols = Array.prototype.slice.call(dirGrid.querySelectorAll('.kz-ftr-dir-col'));

        allItems.forEach(function (li) {
            var span = li.querySelector('a > span');
            if (span) span.dataset.origLabel = span.textContent;
        });

        function applyFooterFilter() {
            var rawQuery = filterInput.value.trim();
            var query = rawQuery.toLowerCase();
            var visibleTotal = 0;

            if (clearBtn) clearBtn.hidden = !query;

            dirGroups.forEach(function (group) {
                var items = Array.prototype.slice.call(group.querySelectorAll('[data-dir-item]'));
                var groupVisible = 0;

                items.forEach(function (li) {
                    var hay = li.dataset.search || '';
                    var matches = !query || hay.indexOf(query) !== -1;
                    li.hidden = !matches;

                    var span = li.querySelector('a > span');
                    if (span && span.dataset.origLabel) {
                        highlightLabel(span, span.dataset.origLabel, query);
                    }
                    if (matches) {
                        groupVisible++;
                        visibleTotal++;
                    }
                });

                var countBadge = group.querySelector('.kz-ftr-group-count');
                if (countBadge) countBadge.textContent = String(query ? groupVisible : items.length);

                group.hidden = query ? groupVisible === 0 : false;
                if (query && groupVisible > 0) {
                    group.classList.add('is-open');
                } else if (!query) {
                    var wasOpen = group.dataset.defaultOpen === '1';
                    group.classList.toggle('is-open', wasOpen);
                    var accBtn = group.querySelector('[data-dir-accordion]');
                    if (accBtn) accBtn.setAttribute('aria-expanded', wasOpen ? 'true' : 'false');
                }
            });

            payCards.forEach(function (card) {
                card.hidden = !!query;
            });

            allCols.forEach(function (col) {
                var visibleCards = col.querySelectorAll('.kz-ftr-dir-group:not([hidden])').length;
                col.hidden = visibleCards === 0;
            });

            if (matchCountEl) matchCountEl.textContent = String(visibleTotal);
            if (noResultsEl) {
                noResultsEl.hidden = !(query && visibleTotal === 0);
                if (noResultsTerm) noResultsTerm.textContent = '"' + rawQuery + '"';
            }
        }

        filterInput.addEventListener('input', applyFooterFilter);

        function resetFilter() {
            filterInput.value = '';
            applyFooterFilter();
            filterInput.focus();
        }

        if (clearBtn) clearBtn.addEventListener('click', resetFilter);
        if (resetBtn) resetBtn.addEventListener('click', resetFilter);
    }

    // 5. One-Click Copy Phone Feedback
    document.querySelectorAll('.kz-ftr-copy-btn[data-copy-text]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var text = btn.getAttribute('data-copy-text') || '';
            if (!text) return;

            function markCopied() {
                var label = btn.querySelector('.kz-ftr-copy-label');
                var icon = btn.querySelector('i');
                btn.classList.add('is-copied');
                if (label) label.textContent = 'Copied!';
                if (icon) icon.className = 'fa-solid fa-check';
                window.clearTimeout(btn._copyTimer);
                btn._copyTimer = window.setTimeout(function () {
                    btn.classList.remove('is-copied');
                    if (label) label.textContent = 'Copy';
                    if (icon) icon.className = 'fa-regular fa-copy';
                }, 2000);
            }

            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(text).then(markCopied).catch(function () {
                    fallbackCopy(text, markCopied);
                });
            } else {
                fallbackCopy(text, markCopied);
            }
        });
    });

    function fallbackCopy(text, done) {
        var ta = document.createElement('textarea');
        ta.value = text;
        ta.setAttribute('readonly', '');
        ta.style.position = 'fixed';
        ta.style.opacity = '0';
        document.body.appendChild(ta);
        ta.select();
        try {
            document.execCommand('copy');
            done();
        } catch (err) {}
        document.body.removeChild(ta);
    }

    // 6. Smooth Back to Top Button
    var backTopBtn = document.getElementById('kzFooterBackTop');
    if (backTopBtn) {
        backTopBtn.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
})();
</script>


<style>
/* Love Link aquatic footer palette */
.site-footer {
    background:
        radial-gradient(ellipse at 12% 0%, rgba(35, 141, 131, .20), transparent 42%),
        linear-gradient(180deg, #0c514d 0%, #073b38 100%) !important;
    color: #f4fbf9 !important;
}
.site-footer .footer-logo-section,
.site-footer .footer-main {
    background: transparent !important;
}
.site-footer .footer-bottom {
    background: #062f2d !important;
    border-top-color: rgba(214, 179, 106, .22) !important;
}
.site-footer .social-icon:hover {
    background: #126e68 !important;
    border-color: #d6b36a !important;
    box-shadow: 0 6px 14px rgba(18, 110, 104, .38) !important;
}
.site-footer .kz-ftr-dir-group,
.site-footer .kz-ftr-contact-hub,
.site-footer .kz-ftr-gallery-card {
    border-color: rgba(199, 231, 224, .16) !important;
}
.site-footer .kz-ftr-dir-group,
.site-footer .kz-ftr-contact-hub {
    background: rgba(255, 255, 255, .045) !important;
}
.site-footer .kz-ftr-dir-link:hover,
.site-footer .footer-col a:hover {
    color: #d6b36a !important;
}
</style>

<style>
/* ==========================================================
   FOOTER READABILITY + RESPONSIVE ALIGNMENT FIX
   Keeps all existing Blade data, directory links and scripts.
   ========================================================== */

/* Give the footer a wider, predictable content area. The default
   Bootstrap .container is only 720px wide between 768px and 991px. */
#siteFooter > .footer-logo-section .container,
#siteFooter > .footer-main .container,
#siteFooter > .footer-bottom .container {
    width: calc(100% - 40px) !important;
    max-width: 1240px !important;
    padding-left: 0 !important;
    padding-right: 0 !important;
    margin-left: auto !important;
    margin-right: auto !important;
    box-sizing: border-box !important;
}

/* Make the company description bright and comfortable to read. */
#siteFooter .footer-tagline,
#siteFooter .footer-tagline * {
    color: #ffffff !important;
    opacity: 1 !important;
}
#siteFooter .footer-tagline {
    max-width: 650px !important;
    font-size: 14px !important;
    line-height: 1.7 !important;
    font-weight: 400 !important;
    margin: 5px 0 0 !important;
    letter-spacing: 0.01em !important;
    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.12);
}
#siteFooter .kz-ftr-brand-copy {
    flex: 1 1 auto !important;
    min-width: 0 !important;
}
#siteFooter .kz-ftr-brand-name-row {
    align-items: center !important;
    row-gap: 6px !important;
}

/* At tablet and compact desktop widths, put brand information on
   its own row and actions beneath it instead of squeezing the text. */
@media (max-width: 1100px) {
    #siteFooter .kz-ftr-brand-bar {
        display: flex !important;
        flex-direction: column !important;
        align-items: stretch !important;
        justify-content: flex-start !important;
        gap: 18px !important;
    }
    #siteFooter .kz-ftr-brand-identity {
        width: 100% !important;
        flex: 0 0 auto !important;
        min-width: 0 !important;
        align-items: flex-start !important;
        gap: 18px !important;
    }
    #siteFooter .kz-ftr-brand-copy {
        flex: 1 1 auto !important;
        width: auto !important;
        min-width: 0 !important;
    }
    #siteFooter .footer-tagline {
        max-width: none !important;
    }
    #siteFooter .kz-ftr-brand-actions {
        width: 100% !important;
        justify-content: flex-start !important;
        align-items: center !important;
        gap: 10px !important;
    }

    /* Two roomy directory columns instead of four narrow columns. */
    #siteFooter .kz-ftr-dir-grid.kz-ftr-cols-2,
    #siteFooter .kz-ftr-dir-grid.kz-ftr-cols-3,
    #siteFooter .kz-ftr-dir-grid.kz-ftr-cols-4 {
        grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
        column-gap: 18px !important;
        row-gap: 18px !important;
    }
}

/* Improve contrast and spacing for directory links and group headings. */
#siteFooter .kz-ftr-dir-heading {
    font-size: 14.5px !important;
    line-height: 1.4 !important;
}
#siteFooter .kz-ftr-dir-list li a {
    color: rgba(255, 255, 255, 0.94) !important;
    font-size: 13px !important;
    line-height: 1.55 !important;
    padding-top: 5px !important;
    padding-bottom: 5px !important;
}
#siteFooter .kz-ftr-dir-list li a:hover {
    color: #ffffff !important;
}

/* Mobile: one full-width directory column and stacked brand details. */
@media (max-width: 767px) {
    #siteFooter > .footer-logo-section .container,
    #siteFooter > .footer-main .container,
    #siteFooter > .footer-bottom .container {
        width: calc(100% - 32px) !important;
    }
    #siteFooter .kz-ftr-dir-grid.kz-ftr-cols-1,
    #siteFooter .kz-ftr-dir-grid.kz-ftr-cols-2,
    #siteFooter .kz-ftr-dir-grid.kz-ftr-cols-3,
    #siteFooter .kz-ftr-dir-grid.kz-ftr-cols-4 {
        grid-template-columns: minmax(0, 1fr) !important;
        gap: 12px !important;
    }
    #siteFooter .kz-ftr-brand-actions {
        display: flex !important;
        flex-wrap: wrap !important;
    }
}

@media (max-width: 520px) {
    #siteFooter .kz-ftr-brand-identity {
        flex-direction: column !important;
        align-items: flex-start !important;
        gap: 12px !important;
    }
    #siteFooter .kz-ftr-brand-copy {
        width: 100% !important;
    }
    #siteFooter .footer-tagline {
        font-size: 13.5px !important;
        line-height: 1.65 !important;
    }
    #siteFooter .kz-ftr-cta-pill {
        max-width: 100% !important;
        white-space: normal !important;
        text-align: center !important;
    }
}
</style>


<style>
/* FINAL BRAND BAR FIX: keep the description readable and stop it being squeezed. */
#siteFooter .kz-ftr-brand-bar {
    display: flex !important;
    flex-direction: column !important;
    align-items: stretch !important;
    justify-content: flex-start !important;
    gap: 18px !important;
}
#siteFooter .kz-ftr-brand-identity {
    display: flex !important;
    width: 100% !important;
    max-width: 100% !important;
    flex: 0 0 auto !important;
    align-items: center !important;
    gap: 18px !important;
}
#siteFooter .kz-ftr-brand-copy {
    display: block !important;
    flex: 1 1 auto !important;
    width: auto !important;
    min-width: 0 !important;
}
#siteFooter .footer-tagline,
#siteFooter .footer-tagline p,
#siteFooter .footer-tagline span,
#siteFooter .footer-tagline a,
#siteFooter .footer-tagline strong,
#siteFooter .footer-tagline em,
#siteFooter .footer-tagline * {
    color: #ffffff !important;
    -webkit-text-fill-color: #ffffff !important;
    opacity: 1 !important;
    filter: none !important;
}
#siteFooter .footer-tagline {
    display: block !important;
    max-width: 100% !important;
    font-size: 15px !important;
    font-weight: 400 !important;
    line-height: 1.7 !important;
    letter-spacing: 0.01em !important;
    margin: 5px 0 0 !important;
    text-shadow: 0 1px 2px rgba(0,0,0,.25) !important;
}
#siteFooter .kz-ftr-brand-actions {
    display: flex !important;
    width: 100% !important;
    justify-content: flex-start !important;
    align-items: center !important;
    flex-wrap: wrap !important;
    gap: 10px !important;
}
@media (max-width: 520px) {
    #siteFooter .kz-ftr-brand-identity {
        flex-direction: column !important;
        align-items: flex-start !important;
    }
    #siteFooter .kz-ftr-brand-copy {
        width: 100% !important;
    }
    #siteFooter .footer-tagline {
        font-size: 14px !important;
    }
}
</style>

<!--********************************
    Code Start From Here 
******************************** -->

<!--==============================
    PRELOADER - LUXURY & MINIMAL (#126E68)
==============================-->
<div id="preloader" class="preloader kaw-preloader" aria-label="Loading page">
    <div class="kaw-preloader-backdrop"></div>
    <div class="kaw-preloader-glow"></div>
    <div class="kaw-preloader-content">
        <!-- Circular Orbital Accent Ring around Logo -->
        <div class="kaw-preloader-orbit-wrap">
            <div class="kaw-preloader-orbit-pulse"></div>
            <div class="kaw-preloader-orbit-ring"></div>
            <div class="kaw-preloader-logo-card">
                <img src="{{ asset('storage/' . $setting->header_logo) }}" 
                     alt="{{ $setting->name ?? 'Love Link' }}" 
                     class="kaw-preloader-logo">
            </div>
        </div>

        <!-- Minimalist Loading Progress Line -->
        <div class="kaw-preloader-progress-wrap">
            <div class="kaw-preloader-bar">
                <div class="kaw-preloader-bar-fill"></div>
            </div>
        </div>

        <!-- Premium Subtle Typography -->
        <div class="kaw-preloader-caption">
            <span class="kaw-preloader-brand-text">{{ $setting->name ?? 'LOVE LINK TOUR & TRAVELS' }}</span>
            <span class="kaw-preloader-status">
                <span>Loading Experience</span>
                <span class="kaw-preloader-dots">
                    <i></i><i></i><i></i>
                </span>
            </span>
        </div>
    </div>
</div>

<style>
/* ==========================================================
   PRELOADER STYLING - BRAND COLOR #126E68
   ========================================================== */
.kaw-preloader {
    position: fixed !important;
    inset: 0 !important;
    width: 100vw !important;
    height: 100vh !important;
    z-index: 99999999 !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    background: radial-gradient(circle at 50% 45%, #ffffff 0%, #f7f9fc 70%, #edf2f9 100%) !important;
    opacity: 1;
    visibility: visible;
    transition: opacity 0.65s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.65s cubic-bezier(0.16, 1, 0.3, 1);
    user-select: none;
    -webkit-user-select: none;
    overflow: hidden;
}

.kaw-preloader.kaw-loaded {
    opacity: 0 !important;
    visibility: hidden !important;
    pointer-events: none !important;
}

.kaw-preloader-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    position: relative;
    padding: 24px;
    transition: transform 0.65s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.5s ease;
}

.kaw-preloader.kaw-loaded .kaw-preloader-content {
    transform: scale(0.94);
    opacity: 0;
}

/* Ambient Radial Glow */
.kaw-preloader-glow {
    position: absolute;
    width: 280px;
    height: 280px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(18, 110, 104, 0.08) 0%, rgba(18, 110, 104, 0) 70%);
    pointer-events: none;
    z-index: 0;
    animation: kawGlowPulse 3s ease-in-out infinite alternate;
}

/* Central Orbit & Logo Disc */
.kaw-preloader-orbit-wrap {
    position: relative;
    width: 136px;
    height: 136px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 22px;
    z-index: 1;
}

/* Outer Breathing Ring */
.kaw-preloader-orbit-pulse {
    position: absolute;
    inset: -6px;
    border-radius: 50%;
    border: 1px dashed rgba(18, 110, 104, 0.22);
    animation: kawSpinSlow 24s linear infinite, kawPulseBorder 2.5s ease-in-out infinite;
}

/* Fast Minimalist Rotating Arc */
.kaw-preloader-orbit-ring {
    position: absolute;
    inset: 0;
    border-radius: 50%;
    border: 2.5px solid rgba(18, 110, 104, 0.08);
    border-top-color: #126E68;
    border-right-color: #2c8c83;
    animation: kawSpin 1.25s cubic-bezier(0.5, 0.1, 0.5, 0.9) infinite;
}

/* Inner Crisp White Logo Disc */
.kaw-preloader-logo-card {
    width: 108px;
    height: 108px;
    border-radius: 50%;
    background: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 14px;
    box-shadow: 0 12px 32px rgba(18, 110, 104, 0.09), 0 2px 6px rgba(0, 0, 0, 0.03);
    border: 1px solid rgba(18, 110, 104, 0.06);
    position: relative;
    z-index: 2;
}

.kaw-preloader-logo {
    max-width: 80px;
    max-height: 80px;
    width: auto;
    height: auto;
    object-fit: contain;
    animation: kawLogoBreathe 2.8s ease-in-out infinite;
    display: block;
}

/* Minimalist Progress Line */
.kaw-preloader-progress-wrap {
    width: 160px;
    margin-bottom: 14px;
    z-index: 1;
}

.kaw-preloader-bar {
    width: 100%;
    height: 3px;
    background: rgba(18, 110, 104, 0.1);
    border-radius: 99px;
    overflow: hidden;
    position: relative;
}

.kaw-preloader-bar-fill {
    position: absolute;
    top: 0;
    bottom: 0;
    width: 45%;
    background: linear-gradient(90deg, transparent, #126E68 50%, #54aaa0 85%, #126E68);
    border-radius: 99px;
    animation: kawBarSlide 1.5s cubic-bezier(0.4, 0, 0.2, 1) infinite;
}

/* Typography & Sub-status */
.kaw-preloader-caption {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 4px;
    z-index: 1;
}

.kaw-preloader-brand-text {
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 2.8px;
    text-transform: uppercase;
    color: #126E68;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
}

.kaw-preloader-status {
    display: flex;
    align-items: center;
    gap: 4px;
    font-size: 11.5px;
    font-weight: 500;
    color: #64748b;
    letter-spacing: 0.5px;
}

.kaw-preloader-dots {
    display: inline-flex;
    align-items: center;
    gap: 2.5px;
}

.kaw-preloader-dots i {
    width: 3px;
    height: 3px;
    border-radius: 50%;
    background-color: #126E68;
    display: inline-block;
    animation: kawDotBlink 1.4s infinite ease-in-out;
}

.kaw-preloader-dots i:nth-child(2) {
    animation-delay: 0.2s;
}

.kaw-preloader-dots i:nth-child(3) {
    animation-delay: 0.4s;
}

/* Animations */
@keyframes kawSpin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

@keyframes kawSpinSlow {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

@keyframes kawPulseBorder {
    0%, 100% { transform: scale(1) rotate(0deg); opacity: 0.35; }
    50% { transform: scale(1.06) rotate(180deg); opacity: 0.75; }
}

@keyframes kawLogoBreathe {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.035); }
}

@keyframes kawBarSlide {
    0% { left: -50%; width: 30%; }
    50% { left: 25%; width: 55%; }
    100% { left: 110%; width: 30%; }
}

@keyframes kawDotBlink {
    0%, 80%, 100% { opacity: 0.2; transform: scale(0.8); }
    40% { opacity: 1; transform: scale(1.2); }
}

@keyframes kawGlowPulse {
    0% { transform: scale(0.9); opacity: 0.4; }
    100% { transform: scale(1.15); opacity: 0.85; }
}
</style>

<script>
// Self-executing Preloader Dismissal (Fast & Robust)
(function () {
    function hideKawPreloader() {
        var loader = document.getElementById('preloader') || document.querySelector('.kaw-preloader');
        if (!loader || loader.classList.contains('kaw-loaded')) return;
        loader.classList.add('kaw-loaded');
        setTimeout(function () {
            if (loader && loader.parentNode) {
                loader.style.display = 'none';
            }
        }, 650);
    }

    if (document.readyState === 'complete') {
        hideKawPreloader();
    } else {
        window.addEventListener('load', hideKawPreloader);
        setTimeout(hideKawPreloader, 2600);
    }
})();
</script>

<!--==============================
    Sidemenu
============================== -->
    <div class="sidemenu-wrapper sidemenu-info ">
        <div class="sidemenu-content">
            <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
            <div class="widget  ">
                <div class="th-widget-about">
                    <div class="about-logo">
                        <a href="{{ route('home') }}">
                            @if(!empty($setting->header_logo))
                                <img src="{{ asset('storage/' . $setting->header_logo) }}" alt="{{ $setting->name }}">
                            @else
                                <span class="kaw-hdr-logo-text">{{ $setting->name ?? 'Travel Desk' }}</span>
                            @endif
                        </a>
                    </div>
                    @if(!empty($setting->footer_about))
                        <p class="about-text">{{ $setting->footer_about }}</p>
                    @endif
                    <div class="th-social">
                    @php
                        $social_link = is_array($setting->social_link ?? null)
                            ? $setting->social_link
                            : (json_decode((string) ($setting->social_link ?? ''), true) ?? []);
                    @endphp
                    @if(!empty($social_link))
                        @foreach($social_link as $item)
                            @php
                                $sLink = is_array($item) ? ($item['social_link'] ?? '#') : ($item->social_link ?? '#');
                                $sName = is_array($item) ? ($item['social_name'] ?? '') : ($item->social_name ?? '');
                                $sIcon = is_array($item) ? ($item['social_icon'] ?? '') : ($item->social_icon ?? '');
                            @endphp
                            @if(!empty($sIcon))
                                <a href="{{ $sLink }}" title="{{ $sName }}"><i class="{{ $sIcon }}"></i></a>
                            @endif
                        @endforeach
                    @endif
                    </div>
                </div>
            </div>
            <div class="widget  ">
                <h3 class="widget_title">Recent Posts</h3>
                <div class="recent-post-wrap">
                    @foreach($Headerblogs as $recentBlog)
                        <div class="recent-post">
                            <div class="media-img">
                                <a href="{{ route('blog.details', $recentBlog->slug) }}"><img src="{{ asset('storage/' . $recentBlog->image) }}" alt="Blog Image"></a>
                            </div>
                            <div class="media-body">
                                <h4 class="post-title"><a class="text-inherit" href="{{ route('blog.details', $recentBlog->slug) }}">{{ $recentBlog->title }}</a></h4>
                                <div class="recent-post-meta">
                                    <a href="{{ route('blog.details', $recentBlog->slug) }}"><i class="fa-regular fa-calendar"></i>{{ \Carbon\Carbon::parse($recentBlog->published_at)->format('F d, Y') }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach  
                </div>
            </div>
            <div class="widget  ">
                <h3 class="widget_title">Get In Touch</h3>
                <div class="th-widget-contact">
                    @if(!empty($setting->phone) || !empty($setting->phone1))
                        <div class="info-box_text">
                            <div class="icon">
                                <img src="{{ url('webassets/img/icon/phone.svg') }}" alt="img">
                            </div>
                            <div class="details">
                                @if(!empty($setting->phone))
                                    <p><a href="tel:{{ $setting->phone }}" class="info-box_link">{{ $setting->phone }}</a></p>
                                @endif
                                @if(!empty($setting->phone1))
                                    <p><a href="tel:{{ $setting->phone1 }}" class="info-box_link">{{ $setting->phone1 }}</a></p>
                                @endif
                            </div>
                        </div>
                    @endif
                    @if(!empty($setting->email) || !empty($setting->email1))
                        <div class="info-box_text">
                            <div class="icon">
                                <img src="{{ url('webassets/img/icon/envelope.svg') }}" alt="img">
                            </div>
                            <div class="details">
                                @if(!empty($setting->email))
                                    <p><a href="mailto:{{ $setting->email }}" class="info-box_link">{{ $setting->email }}</a></p>
                                @endif
                                @if(!empty($setting->email1))
                                    <p><a href="mailto:{{ $setting->email1 }}" class="info-box_link">{{ $setting->email1 }}</a></p>
                                @endif
                            </div>
                        </div>
                    @endif
                    @if(!empty($setting->address))
                        <div class="info-box_text">
                            <div class="icon"><img src="{{ url('webassets/img/icon/location-dot.svg') }}" alt="img"></div>
                            <div class="details">
                                <p>{{ $setting->address }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="popup-search-box">
        <button class="searchClose"><i class="fal fa-times"></i></button>
        <form action="#">
            <input type="text" placeholder="What are you looking for?">
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div>

<!--==============================
    Mobile Menu
============================== -->
    @php
        $resolveNavHref = function ($raw) {
            $val = trim((string) $raw);
            if ($val === '' || $val === '#') {
                return '#';
            }
            if (\Illuminate\Support\Str::startsWith($val, ['http://', 'https://', 'mailto:', 'tel:', '#'])) {
                return $val;
            }
            return url('/' . ltrim($val, '/'));
        };
    @endphp
    <div class="th-menu-wrapper onepage-nav">
        <div class="th-menu-area text-center">
            <button class="th-menu-toggle" aria-label="Close Menu"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="{{ route('home') }}">
                    @if(!empty($setting->header_logo))
                        <img src="{{ asset('storage/' . $setting->header_logo) }}" alt="{{ $setting->name }}">
                    @else
                        <span class="kaw-hdr-logo-text">{{ $setting->name ?? 'Travel Desk' }}</span>
                    @endif
                </a>
            </div>
            <div class="th-mobile-menu">
                <ul>
                    @foreach ($headerMenus as $menu)
                        @php $mobileMenuHref = $resolveNavHref($menu->link ?? '#'); @endphp
                        <li class="{{ $menu->children->isNotEmpty() ? 'menu-item-has-children' : '' }}">
                            <a href="{{ $mobileMenuHref }}">{{ $menu->title }}</a>
                            @if ($menu->children->isNotEmpty())
                                <ul class="sub-menu">
                                    @foreach ($menu->children as $submenu)
                                        @php $mobileSubHref = $resolveNavHref($submenu->link ?? '#'); @endphp
                                        <li class="{{ $submenu->children->isNotEmpty() ? 'menu-item-has-children' : '' }}">
                                            <a href="{{ $mobileSubHref }}">{{ $submenu->title }}</a>
                                            @if ($submenu->children->isNotEmpty())
                                                <ul class="sub-menu">
                                                    @foreach ($submenu->children as $subsubmenu)
                                                        <li><a href="{{ $resolveNavHref($subsubmenu->link ?? '#') }}">{{ $subsubmenu->title }}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

<!--==============================
	Header Area  
==============================-->
    <header class="kaw-hdr" id="kawMainHeader">
    <div class="kaw-hdr-sticky">
        <div class="container th-container">
            <div class="kaw-hdr-wrap" id="kawHdrWrap">

                {{-- LEFT: Logo --}}
                <div class="kaw-hdr-logo-area">
                    <a href="{{ route('home') }}" aria-label="{{ $setting->name ?? 'Home' }}">
                        @if(!empty($setting->header_logo))
                            <img src="{{ asset('storage/' . $setting->header_logo) }}" alt="{{ $setting->name }}">
                        @else
                            <span class="kaw-hdr-logo-text">{{ $setting->name ?? 'Travel Desk' }}</span>
                        @endif
                    </a>
                </div>

                {{-- CENTER: Feature Icons (Defensive Active Filtering) --}}
                @php
                    $isSliderIconSectionActive = true;

                    // 1. Check all standard toggle/status keys on $setting
                    $statusCheckKeys = [
                        'slider_icon_status',
                        'slidericon_status',
                        'slider_icons_status',
                        'slider_icon',
                        'slidericon',
                        'header_icon_status',
                        'header_icons_status',
                        'feature_icon_status',
                        'feature_icons_status',
                        'is_slider_icon',
                        'is_slidericon',
                        'is_slider_icon_active',
                        'show_slider_icons'
                    ];

                    if (isset($setting)) {
                        foreach ($statusCheckKeys as $key) {
                            if (isset($setting->$key)) {
                                $val = $setting->$key;
                                if ($val === 0 || $val === '0' || $val === false || $val === 'inactive' || $val === 'off') {
                                    $isSliderIconSectionActive = false;
                                    break;
                                }
                            }
                        }
                    }

                    // 2. Filter collection: remove items explicitly marked inactive (status = 0 / inactive)
                    $activeSliderIcons = collect($slidericon ?? [])->filter(function($item) {
                        if (is_object($item) && isset($item->status)) {
                            return $item->status == 1 || $item->status === true || $item->status === '1' || $item->status === 'active';
                        }
                        if (is_array($item) && isset($item['status'])) {
                            return $item['status'] == 1 || $item['status'] === true || $item['status'] === '1' || $item['status'] === 'active';
                        }
                        return true;
                    });
                @endphp

                @if($isSliderIconSectionActive && $activeSliderIcons->isNotEmpty())
                <div class="kaw-hdr-icons-area">
                    <div class="kaw-hdr-fi" id="kawHdrFi">
                        @foreach($activeSliderIcons as $index => $slid)
                            @php
                                $itemClass = '';
                                if ($index >= 8) {
                                    $itemClass = 'kaw-hdr-fi-hidden';
                                } elseif ($index >= 6) {
                                    $itemClass = 'kaw-hdr-fi-desktop-only';
                                }
                                $itemUrl = \Illuminate\Support\Str::startsWith($slid->link, ['http://', 'https://']) 
                                    ? $slid->link 
                                    : url('/' . ltrim($slid->link, '/'));
                            @endphp
                            <div class="kaw-hdr-fi-item {{ $itemClass }}"
                                 onclick="location.href='{{ $itemUrl }}'">
                                @if($slid->image)
                                    <div class="kaw-hdr-fi-icon">
                                        <img src="{{ asset('storage/' . $slid->image) }}"
                                             alt="{{ $slid->title }}"
                                             class="kaw-hdr-fi-img">
                                    </div>
                                @else
                                    <div class="kaw-hdr-fi-icon">
                                        <span class="kaw-hdr-fi-no-icon"></span>
                                    </div>
                                @endif
                                <p class="kaw-hdr-fi-label">{{ $slid->title }}</p>
                            </div>
                        @endforeach

                        {{-- More button (always visible if > 6 icons on mobile; only > 8 on desktop) --}}
                        @if($activeSliderIcons->count() > 6)
                            <button class="kaw-hdr-fi-more {{ $activeSliderIcons->count() <= 8 ? 'kaw-hdr-fi-more-mobile-only' : '' }}" id="kawFiMoreBtn" type="button"
                                    aria-expanded="false" aria-controls="kawFiPanel">
                                <div class="kaw-hdr-fi-icon">
                                    <span class="kaw-hdr-fi-more-svg">
                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                                            <circle cx="8" cy="8" r="2"></circle>
                                            <circle cx="16" cy="8" r="2"></circle>
                                            <circle cx="8" cy="16" r="2"></circle>
                                            <circle cx="16" cy="16" r="2"></circle>
                                        </svg>
                                    </span>
                                </div>
                                <p class="kaw-hdr-fi-label" id="kawFiMoreLabel">More</p>
                            </button>
                        @endif
                    </div>

                    {{-- Backdrop --}}
                    <div class="kaw-hdr-fi-backdrop" id="kawFiBackdrop"></div>

                    {{-- More dropdown panel --}}
                    @if($activeSliderIcons->count() > 6)
                        <div class="kaw-hdr-fi-panel" id="kawFiPanel">
                            @foreach($activeSliderIcons as $index => $slid)
                                @if($index >= 6)
                                    @php
                                        $panelItemUrl = \Illuminate\Support\Str::startsWith($slid->link, ['http://', 'https://']) 
                                            ? $slid->link 
                                            : url('/' . ltrim($slid->link, '/'));
                                    @endphp
                                    <div class="kaw-hdr-fi-panel-item {{ $index < 8 ? 'kaw-hdr-fi-mobile-only' : '' }}" onclick="location.href='{{ $panelItemUrl }}'">
                                        @if($slid->image)
                                            <div class="kaw-hdr-fi-icon">
                                                <img src="{{ asset('storage/' . $slid->image) }}"
                                                     alt="{{ $slid->title }}"
                                                     class="kaw-hdr-fi-img">
                                            </div>
                                        @else
                                            <div class="kaw-hdr-fi-icon">
                                                <span class="kaw-hdr-fi-no-icon"></span>
                                            </div>
                                        @endif
                                        <p class="kaw-hdr-fi-panel-title">{{ $slid->title }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
                @endif

                {{-- CENTER: Dynamic Adaptive Priority+ CMS Desktop Navbar (Pure White Light Theme) --}}
                @php
                    $checkUrlActive = function (string $href): bool {
                        if ($href === '#' || $href === '') {
                            return false;
                        }
                        $path = trim((string) parse_url($href, PHP_URL_PATH), '/');
                        if ($path === '') {
                            return request()->is('/');
                        }
                        if (request()->is($path) || request()->is($path . '/*')) {
                            return true;
                        }
                        $aliasMap = [
                            'tours'        => ['tour/*', 'tour-category/*'],
                            'cabs'         => ['cab/*'],
                            'hotels'       => ['hotel/*'],
                            'destinations' => ['destination/*'],
                            'blogs'        => ['blog/*'],
                        ];
                        foreach ($aliasMap[$path] ?? [] as $pattern) {
                            if (request()->is($pattern)) {
                                return true;
                            }
                        }
                        return false;
                    };

                    $hasActiveChild = function ($menuNode) use (&$hasActiveChild, $resolveNavHref, $checkUrlActive): bool {
                        foreach ($menuNode->children ?? [] as $child) {
                            $childHref = $resolveNavHref($child->link ?? '#');
                            if ($checkUrlActive($childHref) || $hasActiveChild($child)) {
                                return true;
                            }
                        }
                        return false;
                    };
                @endphp

                <nav class="kaw-hdr-nav" id="kawHdrNav" aria-label="Main Navigation">
                    <ul class="kaw-nav-list" id="kawNavList">
                        @foreach($headerMenus as $menu)
                            @php
                                $menuHref = $resolveNavHref($menu->link ?? '#');
                                $hasChildren = $menu->children->isNotEmpty();
                                $isActive = $checkUrlActive($menuHref) || $hasActiveChild($menu);
                                $hasGrandAny = $menu->children->contains(fn ($c) => $c->children->isNotEmpty());
                                $useTwoColDrop = !$hasGrandAny && $menu->children->count() > 8;
                            @endphp
                            <li class="kaw-nav-item {{ $hasChildren ? 'has-dropdown' : '' }} {{ $isActive ? 'is-active' : '' }}"
                                data-kaw-nav-primary
                                data-nav-index="{{ $loop->index }}">
                                <a href="{{ $menuHref }}"
                                   class="kaw-nav-link"
                                   @if($hasChildren) aria-haspopup="true" aria-expanded="false" @endif>
                                    <span>{{ $menu->title }}</span>
                                    @if($hasChildren)
                                        <i class="fa-regular fa-chevron-down kaw-nav-caret" aria-hidden="true"></i>
                                    @endif
                                </a>
                                @if($hasChildren)
                                    <ul class="kaw-nav-dropdown {{ $useTwoColDrop ? 'kaw-drop-cols-2' : '' }}">
                                        @foreach($menu->children as $submenu)
                                            @php
                                                $subHref = $resolveNavHref($submenu->link ?? '#');
                                                $hasGrand = $submenu->children->isNotEmpty();
                                                $subActive = $checkUrlActive($subHref);
                                            @endphp
                                            <li class="kaw-nav-subitem {{ $hasGrand ? 'has-subdropdown' : '' }} {{ $subActive ? 'is-active' : '' }}">
                                                <a href="{{ $subHref }}"
                                                   class="kaw-nav-sublink"
                                                   @if($hasGrand) aria-haspopup="true" aria-expanded="false" @endif>
                                                    <span>{{ $submenu->title }}</span>
                                                    @if($hasGrand)
                                                        <i class="fa-regular fa-chevron-right kaw-nav-subcaret" aria-hidden="true"></i>
                                                    @endif
                                                </a>
                                                @if($hasGrand)
                                                    <ul class="kaw-nav-subdropdown">
                                                        @foreach($submenu->children as $subsubmenu)
                                                            @php
                                                                $subSubHref = $resolveNavHref($subsubmenu->link ?? '#');
                                                                $subSubActive = $checkUrlActive($subSubHref);
                                                            @endphp
                                                            <li class="{{ $subSubActive ? 'is-active' : '' }}">
                                                                <a href="{{ $subSubHref }}" class="kaw-nav-sublink">{{ $subsubmenu->title }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach

                        {{-- Automatic Adaptive Overflow Item (Shown dynamically only when tabs exceed header width) --}}
                        <li class="kaw-nav-item has-dropdown kaw-nav-more-item" id="kawNavMoreItem" hidden>
                            <button type="button"
                                    class="kaw-nav-link kaw-nav-more-btn"
                                    id="kawNavMoreToggle"
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                <span>More</span>
                                <span class="kaw-nav-more-badge" id="kawNavMoreCount">0</span>
                                <i class="fa-regular fa-chevron-down kaw-nav-caret" aria-hidden="true"></i>
                            </button>
                            <ul class="kaw-nav-dropdown kaw-nav-more-menu" id="kawNavMoreMenu"></ul>
                        </li>
                    </ul>
                </nav>

                {{-- RIGHT: Customer Service + Hamburger (Always visible, Crisp Light Pill Surface) --}}
                <div class="kaw-hdr-actions">
                    <div class="kaw-hdr-cs-wrap">
                        <button class="kaw-hdr-cs-btn"
                                id="kawCsBtn"
                                type="button"
                                aria-haspopup="true"
                                aria-expanded="false">
                            <i class="fa-regular fa-headset" aria-hidden="true"></i>
                            <span class="kaw-hdr-cs-label">Customer Service</span>
                            <i class="fa-regular fa-chevron-down kaw-hdr-cs-arrow" aria-hidden="true"></i>
                        </button>
                        <div class="kaw-hdr-cs-drop" id="kawCsDrop">
                            @if(!empty($setting->phone))
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $setting->phone) }}" class="kaw-hdr-cs-link">
                                    <i class="fa-regular fa-phone"></i>
                                    <span>{{ $setting->phone }}</span>
                                </a>
                            @endif
                            @if(!empty($setting->email))
                                <a href="mailto:{{ $setting->email }}" class="kaw-hdr-cs-link">
                                    <i class="fa-regular fa-envelope"></i>
                                    <span>{{ $setting->email }}</span>
                                </a>
                            @endif
                            @if(!empty($setting->whatsapp_number) || !empty($setting->phone))
                                <a href="{{ getWhatsappUrl($setting) }}" target="_blank" rel="noopener noreferrer" class="kaw-hdr-cs-link kaw-hdr-cs-wa">
                                    <i class="fa-brands fa-whatsapp"></i>
                                    <span>{{ $setting->whatsapp_cta_label ?: 'WhatsApp' }}</span>
                                </a>
                            @endif
                            <button type="button"
                                    class="kaw-hdr-cs-link kaw-hdr-cs-quote"
                                    data-bs-toggle="modal"
                                    data-bs-target="#globalContactModal">
                                <i class="fa-regular fa-paper-plane"></i>
                                <span>Plan Custom Trip</span>
                            </button>
                        </div>
                    </div>

                    {{-- Hamburger: Drawer Toggle --}}
                    <button type="button"
                            class="kaw-hdr-burger th-menu-toggle"
                            aria-label="Open Navigation Menu">
                        <i class="far fa-bars"></i>
                    </button>
                </div>

            </div>
        </div>
    </div>
</header>

<style>
/* ==========================================================
   HEADER STYLING: CLEAN WHITE & TEAL EXECUTIVE NAVIGATION
   (Crisp white surface, deep teal #126E68 and warm gold #d6b36a)
   ========================================================== */
.kaw-hdr-icons-area {
    display: none !important;
}
.kaw-hdr {
    position: sticky !important;
    top: 0 !important;
    z-index: 990 !important;
    width: 100% !important;
}
.kaw-hdr-sticky {
    position: relative !important;
    background: #ffffff !important;
    border-bottom: 4px solid #e8f3f1 !important;
    box-shadow: 0 2px 12px rgba(12, 81, 77, 0.04) !important;
    transition: box-shadow 0.25s ease, border-color 0.25s ease !important;
}
.kaw-hdr-sticky::after {
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    height: 1.5px;
    background: #b6d7d0;
    pointer-events: none;
    z-index: 1;
}
.kaw-hdr-sticky > .container {
    padding-top: 0 !important;
    padding-bottom: 0 !important;
}
.kaw-hdr.is-scrolled .kaw-hdr-sticky {
    border-bottom-color: #e8f3f1 !important;
    box-shadow: 0 10px 28px rgba(12, 81, 77, 0.09) !important;
}
.kaw-hdr-wrap {
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    flex-wrap: nowrap !important;
    gap: 12px 18px !important;
    min-height: 74px !important;
}
.kaw-hdr-logo-area {
    order: 1 !important;
    flex: 0 0 auto !important;
    padding: 10px 0 !important;
}
.kaw-hdr-logo-text {
    display: inline-flex;
    align-items: center;
    font-size: 18px;
    font-weight: 800;
    color: #126E68;
    letter-spacing: 0.03em;
}

/* --- Priority+ Adaptive Desktop Navigation (Window Tab Style Connected to Header Border) --- */
.kaw-hdr-nav {
    order: 2 !important;
    align-self: stretch;
    display: flex;
    align-items: flex-end;
    justify-content: center;
    flex: 1 1 0%;
    min-width: 0;
    padding: 0 6px;
}
.kaw-nav-list {
    display: flex;
    align-items: flex-end;
    justify-content: center;
    flex-wrap: nowrap;
    gap: 4px;
    list-style: none;
    margin: 0;
    padding: 0;
    max-width: 100%;
}
.kaw-hdr-nav [hidden] {
    display: none !important;
}
.kaw-nav-item {
    position: relative;
    flex: 0 0 auto;
}
.kaw-nav-link,
.kaw-nav-link:focus,
.kaw-nav-link:visited {
    position: relative;
    z-index: 2;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 12px 16px 14px;
    margin-bottom: 0;
    border-radius: 10px 10px 0 0;
    font-size: 14px;
    font-weight: 600;
    color: #153f3b;
    text-decoration: none !important;
    white-space: nowrap;
    background: transparent;
    border: 1.5px solid transparent;
    cursor: pointer;
    line-height: 1.25;
    outline: none;
    transition: color 0.18s ease, background-color 0.18s ease, border-color 0.18s ease, box-shadow 0.18s ease;
}
.kaw-nav-link:hover,
.kaw-nav-item.is-open > .kaw-nav-link {
    z-index: 2;
    color: #126E68;
    background: #edf6f4;
    border-color: #d6e8e3;
    border-bottom-color: transparent;
    text-decoration: none !important;
}
.kaw-nav-item.is-active > .kaw-nav-link,
.kaw-nav-link:active {
    z-index: 3;
    color: #126E68;
    background: #e8f3f1;
    border-color: #b6d7d0;
    border-bottom-color: #e8f3f1;
    font-weight: 700;
    box-shadow: 0 -2px 10px rgba(18, 110, 104, 0.06);
    text-decoration: none !important;
}
.kaw-nav-caret {
    font-size: 10.5px;
    opacity: 0.7;
    transition: transform 0.2s ease;
}
.kaw-nav-item.has-dropdown:hover > .kaw-nav-link .kaw-nav-caret,
.kaw-nav-item.has-dropdown.is-open > .kaw-nav-link .kaw-nav-caret {
    transform: rotate(180deg);
}

/* --- "More" Adaptive Overflow Window Tab --- */
.kaw-nav-more-btn {
    border-color: #d8e8e4;
    border-bottom-color: transparent;
    background: #f5f9f8;
    padding: 11px 14px 14px;
}
.kaw-nav-more-btn:hover,
.kaw-nav-more-item.is-open > .kaw-nav-more-btn,
.kaw-nav-more-item.is-active > .kaw-nav-more-btn {
    z-index: 3;
    background: #e8f3f1;
    border-color: #b6d7d0;
    border-bottom-color: #e8f3f1;
}
.kaw-nav-more-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 19px;
    height: 19px;
    padding: 0 6px;
    border-radius: 999px;
    background: #126E68;
    color: #ffffff;
    font-size: 11px;
    font-weight: 700;
    line-height: 1;
}

/* --- Crisp White Dropdown Menus --- */
.kaw-nav-dropdown,
.kaw-nav-subdropdown {
    position: absolute;
    top: calc(100% + 4px);
    left: 0;
    min-width: 240px;
    background: #ffffff;
    border-radius: 0 12px 12px 12px;
    padding: 8px;
    margin: 0;
    list-style: none;
    box-shadow: 0 18px 42px rgba(12, 81, 77, 0.12), 0 2px 6px rgba(15, 23, 42, 0.05);
    border: 1px solid #dce8e5;
    opacity: 0;
    visibility: hidden;
    transform: translateY(6px);
    transition: opacity 0.18s ease, transform 0.18s ease, visibility 0.18s ease;
    z-index: 1050;
}
/* Invisible hover bridge so moving cursor into menu never drops hover */
.kaw-nav-dropdown::before {
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    top: -10px;
    height: 10px;
}
.kaw-nav-dropdown.kaw-flip-left,
.kaw-nav-more-menu {
    left: auto;
    right: 0;
    border-radius: 12px 0 12px 12px;
}
.kaw-nav-dropdown.kaw-drop-cols-2 {
    display: grid;
    grid-template-columns: repeat(2, minmax(200px, 1fr));
    gap: 2px 8px;
    min-width: 440px;
    max-height: min(70vh, 460px);
    overflow-y: auto;
}
.kaw-nav-subdropdown {
    top: -6px;
    left: calc(100% + 6px);
}
.kaw-nav-subdropdown.kaw-flip-left {
    left: auto;
    right: calc(100% + 6px);
}
.kaw-nav-item.has-dropdown:hover > .kaw-nav-dropdown,
.kaw-nav-item.has-dropdown:focus-within > .kaw-nav-dropdown,
.kaw-nav-item.has-dropdown.is-open > .kaw-nav-dropdown,
.kaw-nav-subitem.has-subdropdown:hover > .kaw-nav-subdropdown,
.kaw-nav-subitem.has-subdropdown:focus-within > .kaw-nav-subdropdown {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}
.kaw-nav-subitem {
    position: relative;
}
.kaw-nav-sublink,
.kaw-nav-sublink:focus,
.kaw-nav-sublink:active {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    padding: 9px 12px;
    border-radius: 9px;
    font-size: 13.5px;
    font-weight: 600;
    color: #1e293b;
    text-decoration: none !important;
    transition: background-color 0.16s ease, color 0.16s ease;
}
.kaw-nav-sublink:hover,
.kaw-nav-subitem.is-active > .kaw-nav-sublink,
.kaw-nav-subdropdown li.is-active > .kaw-nav-sublink {
    background: #eaf4f2;
    color: #126E68;
    text-decoration: none !important;
}
.kaw-nav-subcaret {
    font-size: 10px;
    opacity: 0.65;
}

/* --- Overflowed Tabs Styled Cleanly Inside White "More" Menu --- */
.kaw-nav-more-menu {
    right: 0;
    left: auto;
    min-width: 265px;
    max-height: min(72vh, 480px);
    overflow-y: auto;
}
.kaw-nav-more-menu .kaw-nav-item.kaw-in-more {
    width: 100%;
    position: static;
}
.kaw-nav-more-menu .kaw-nav-item.kaw-in-more > .kaw-nav-link {
    display: flex;
    width: 100%;
    justify-content: space-between;
    border-radius: 9px;
    border: none;
    margin-bottom: 0;
    box-shadow: none;
    padding: 9px 12px;
    font-size: 13.5px;
}
.kaw-nav-more-menu .kaw-nav-item.kaw-in-more.is-active > .kaw-nav-link {
    background: #e4f1ee;
    color: #126E68;
    border: none;
    box-shadow: none;
}
.kaw-nav-more-menu .kaw-nav-item.kaw-in-more > .kaw-nav-dropdown {
    position: static;
    display: none;
    min-width: 0;
    grid-template-columns: 1fr;
    max-height: none;
    overflow: visible;
    box-shadow: none;
    border: none;
    border-left: 2px solid #dce8e5;
    border-radius: 0;
    margin: 2px 0 6px 12px;
    padding: 2px 0 2px 10px;
    opacity: 1;
    visibility: visible;
    transform: none;
}
.kaw-nav-more-menu .kaw-nav-item.kaw-in-more > .kaw-nav-dropdown::before {
    display: none;
}
.kaw-nav-more-menu .kaw-nav-item.kaw-in-more.has-dropdown:hover > .kaw-nav-dropdown,
.kaw-nav-more-menu .kaw-nav-item.kaw-in-more.is-subopen > .kaw-nav-dropdown {
    display: block;
}
.kaw-nav-more-menu .kaw-nav-subdropdown {
    position: static;
    display: none;
    min-width: 0;
    box-shadow: none;
    border: none;
    border-left: 2px solid #eef2f7;
    border-radius: 0;
    margin: 2px 0 4px 10px;
    padding: 2px 0 2px 8px;
    opacity: 1;
    visibility: visible;
    transform: none;
}
.kaw-nav-more-menu .kaw-nav-subitem.has-subdropdown:hover > .kaw-nav-subdropdown {
    display: block;
}

/* --- Actions & Unified Teal Customer Service Pill (Overrides legacy teal & tablet hide) --- */
.kaw-hdr-actions {
    order: 3 !important;
    flex: 0 0 auto !important;
    display: flex !important;
    align-items: center !important;
    gap: 10px !important;
    padding: 10px 0 !important;
    margin-left: auto !important;
}
.kaw-hdr-cs-btn {
    display: inline-flex !important;
    background: linear-gradient(135deg, #126E68 0%, #0c514d 100%) !important;
    color: #ffffff !important;
    box-shadow: 0 4px 14px rgba(18, 110, 104, 0.22) !important;
}
.kaw-hdr-cs-btn:hover {
    background: linear-gradient(135deg, #0c514d 0%, #083d3a 100%) !important;
    box-shadow: 0 6px 18px rgba(18, 110, 104, 0.34) !important;
    transform: translateY(-1px) !important;
}
.kaw-hdr-cs-drop {
    border: 1px solid #dce8e5 !important;
    box-shadow: 0 18px 42px rgba(12, 81, 77, 0.14) !important;
}
.kaw-hdr-cs-link {
    color: #153f3b !important;
    width: 100%;
    text-align: left;
    border: none;
    background: transparent;
}
.kaw-hdr-cs-link i {
    color: #126E68 !important;
}
.kaw-hdr-cs-link:hover {
    background: #eaf4f2 !important;
    color: #126E68 !important;
}
.kaw-hdr-cs-quote {
    border-top: 1px solid #f1f5f9 !important;
    margin-top: 4px;
    padding-top: 12px !important;
    color: #126E68 !important;
    font-weight: 600 !important;
}
.kaw-hdr-cs-quote i {
    color: #d6b36a !important;
}
.kaw-hdr-burger {
    border-color: #dce8e5 !important;
    background: #ffffff !important;
    color: #153f3b !important;
}
.kaw-hdr-burger:hover {
    background: #eaf4f2 !important;
    border-color: rgba(18, 110, 104, 0.35) !important;
    color: #126E68 !important;
}

/* Mobile & Drawer Scroll Safety for Many Dynamic Tabs */
.th-menu-wrapper .th-menu-area {
    max-height: 100vh;
    overflow-y: auto;
}

@media (max-width: 991px) {
    .kaw-hdr-nav {
        display: none !important;
    }
    .kaw-hdr-wrap {
        min-height: 64px !important;
    }
    .kaw-hdr-cs-btn {
        display: inline-flex !important;
        padding: 9px 15px !important;
        font-size: 12.5px !important;
    }
}
@media (max-width: 767px) {
    .kaw-hdr-cs-label,
    .kaw-hdr-cs-arrow {
        display: none !important;
    }
    .kaw-hdr-cs-btn {
        width: 40px !important;
        height: 40px !important;
        padding: 0 !important;
        border-radius: 50% !important;
        justify-content: center !important;
    }
    .kaw-hdr-burger {
        width: 40px !important;
        height: 40px !important;
    }
}


/* ==========================================================
   LOVE LINK NAVIGATION — LARGER, MORE DISTINCTIVE MENU TABS
   Keeps the original text color and teal header palette.
   ========================================================== */
@media (min-width: 992px) {
    .kaw-hdr-nav .kaw-nav-list > .kaw-nav-item[data-kaw-nav-primary] > .kaw-nav-link {
        font-size: 16px !important;
    }

    .kaw-hdr-nav .kaw-nav-list > .kaw-nav-item[data-kaw-nav-primary] > .kaw-nav-link::after {
        content: "";
        position: absolute;
        left: 16px;
        right: 16px;
        bottom: 6px;
        height: 3px;
        border-radius: 99px;
        background: #d6b36a;
        transform: scaleX(0);
        transform-origin: center;
        transition: transform 0.22s ease;
        pointer-events: none;
    }

    .kaw-hdr-nav .kaw-nav-list > .kaw-nav-item[data-kaw-nav-primary]:hover > .kaw-nav-link::after,
    .kaw-hdr-nav .kaw-nav-list > .kaw-nav-item[data-kaw-nav-primary].is-open > .kaw-nav-link::after,
    .kaw-hdr-nav .kaw-nav-list > .kaw-nav-item[data-kaw-nav-primary].is-active > .kaw-nav-link::after {
        transform: scaleX(1);
    }
}

@media (prefers-reduced-motion: reduce) {
    .kaw-hdr-nav .kaw-nav-list > .kaw-nav-item[data-kaw-nav-primary] > .kaw-nav-link::after {
        transition: none;
    }
}



/* ==========================================================
   LOVE LINK — AQUATIC MINT NAVIGATION BAR
   Soft branded header surface + clearer, larger main menu
   ========================================================== */
.kaw-hdr-sticky {
    background: linear-gradient(112deg, #f3faf8 0%, #e8f4f1 54%, #f3f7ee 100%) !important;
    border-bottom: 3px solid #c5dfd9 !important;
    box-shadow: 0 5px 18px rgba(12, 81, 77, 0.09) !important;
}
.kaw-hdr-sticky::after {
    height: 2px !important;
    background: linear-gradient(90deg, #126e68 0%, #238d83 52%, #d6b36a 100%) !important;
}
.kaw-hdr.is-scrolled .kaw-hdr-sticky {
    background: linear-gradient(112deg, #edf7f4 0%, #e2f0ec 54%, #eef5e9 100%) !important;
    box-shadow: 0 10px 26px rgba(12, 81, 77, 0.13) !important;
}

@media (min-width: 992px) {
    .kaw-hdr-wrap {
        min-height: 82px !important;
        gap: 12px 18px !important;
    }

    .kaw-hdr-nav {
        align-self: center !important;
        align-items: center !important;
        min-height: 54px !important;
        padding: 5px 7px !important;
        border: 1px solid rgba(18, 110, 104, 0.17) !important;
        border-radius: 17px !important;
        background: linear-gradient(135deg, rgba(255,255,255,0.72) 0%, rgba(222,241,236,0.94) 58%, rgba(249,243,224,0.72) 100%) !important;
        box-shadow: inset 0 1px 0 rgba(255,255,255,0.95), 0 7px 18px rgba(12,81,77,0.08) !important;
    }

    .kaw-nav-list {
        align-items: center !important;
        gap: 6px !important;
    }

    .kaw-hdr-nav .kaw-nav-list > .kaw-nav-item[data-kaw-nav-primary] > .kaw-nav-link,
    .kaw-hdr-nav .kaw-nav-list > .kaw-nav-more-item > .kaw-nav-link {
        min-height: 44px !important;
        align-items: center !important;
        justify-content: center !important;
        padding: 10px 18px !important;
        border: 1px solid transparent !important;
        border-radius: 12px !important;
        background: transparent !important;
        color: #174d48 !important;
        font-size: 16.5px !important;
        font-weight: 750 !important;
        letter-spacing: 0.01em !important;
        line-height: 1.2 !important;
        box-shadow: none !important;
        transition: color .2s ease, background .2s ease, border-color .2s ease, transform .2s ease, box-shadow .2s ease !important;
    }

    .kaw-hdr-nav .kaw-nav-list > .kaw-nav-item[data-kaw-nav-primary] > .kaw-nav-link:hover,
    .kaw-hdr-nav .kaw-nav-list > .kaw-nav-item[data-kaw-nav-primary].is-open > .kaw-nav-link,
    .kaw-hdr-nav .kaw-nav-list > .kaw-nav-more-item > .kaw-nav-link:hover {
        color: #0c514d !important;
        background: rgba(255,255,255,0.88) !important;
        border-color: rgba(18,110,104,0.18) !important;
        box-shadow: 0 5px 13px rgba(12,81,77,0.10) !important;
        transform: translateY(-1px);
    }

    .kaw-hdr-nav .kaw-nav-list > .kaw-nav-item[data-kaw-nav-primary].is-active > .kaw-nav-link,
    .kaw-hdr-nav .kaw-nav-list > .kaw-nav-more-item.is-active > .kaw-nav-link {
        color: #ffffff !important;
        background: linear-gradient(135deg, #126e68 0%, #0c514d 100%) !important;
        border-color: rgba(12,81,77,0.45) !important;
        box-shadow: 0 6px 15px rgba(12,81,77,0.22), inset 0 1px 0 rgba(255,255,255,0.18) !important;
    }

    .kaw-hdr-nav .kaw-nav-item.is-active > .kaw-nav-link .kaw-nav-caret,
    .kaw-hdr-nav .kaw-nav-item.is-open > .kaw-nav-link .kaw-nav-caret {
        color: #f2d99f !important;
        opacity: 1 !important;
    }

    .kaw-hdr-nav .kaw-nav-list > .kaw-nav-item[data-kaw-nav-primary] > .kaw-nav-link::after {
        left: 18px !important;
        right: 18px !important;
        bottom: 3px !important;
        height: 2px !important;
        background: #d6b36a !important;
    }

    .kaw-hdr-nav .kaw-nav-list > .kaw-nav-item[data-kaw-nav-primary].is-active > .kaw-nav-link::after {
        transform: scaleX(0) !important;
    }

    .kaw-hdr-actions {
        gap: 9px !important;
    }
}

@media (max-width: 991px) {
    .kaw-hdr-sticky {
        background: linear-gradient(112deg, #f3faf8 0%, #e8f4f1 65%, #f3f7ee 100%) !important;
    }
    .kaw-hdr-wrap {
        min-height: 70px !important;
    }
    .kaw-hdr-burger {
        background: #e6f3ef !important;
        border: 1px solid rgba(18,110,104,0.24) !important;
        color: #0c514d !important;
        border-radius: 12px !important;
        box-shadow: 0 4px 12px rgba(12,81,77,0.08) !important;
    }
}

@media (prefers-reduced-motion: reduce) {
    .kaw-hdr-nav .kaw-nav-link {
        transition: none !important;
        transform: none !important;
    }
}

</style>

<script>
(function () {
    /* ---- 1. Sticky Header Scroll Shadow ---- */
    var mainHeader = document.getElementById('kawMainHeader');
    function syncHeaderScroll() {
        if (!mainHeader) return;
        mainHeader.classList.toggle('is-scrolled', window.scrollY > 10);
    }
    window.addEventListener('scroll', syncHeaderScroll, { passive: true });
    syncHeaderScroll();

    /* ---- 2. Priority+ Dynamic Adaptive Navigation (Zero Line-Wrap for Any Tab Count) ---- */
    var navEl = document.getElementById('kawHdrNav');
    var navList = document.getElementById('kawNavList');
    var moreItem = document.getElementById('kawNavMoreItem');
    var moreMenu = document.getElementById('kawNavMoreMenu');
    var moreCountEl = document.getElementById('kawNavMoreCount');
    var moreToggle = document.getElementById('kawNavMoreToggle');

    var primaryItems = navList
        ? Array.prototype.slice.call(navList.querySelectorAll('[data-kaw-nav-primary]'))
        : [];

    var isLayingOutNav = false;

    function layoutAdaptiveNav() {
        if (isLayingOutNav || !navEl || !navList || !moreItem || !moreMenu || !primaryItems.length) return;
        if (window.innerWidth < 992) return;
        isLayingOutNav = true;
        try {
            // Restore all primary tabs cleanly in original order for measurement
            primaryItems.forEach(function (item) {
                item.classList.remove('kaw-in-more', 'is-subopen', 'is-open');
                navList.insertBefore(item, moreItem);
            });
            moreMenu.innerHTML = '';
            moreItem.hidden = true;
            moreItem.classList.remove('is-active', 'is-open');

            var navRect = navEl.getBoundingClientRect();
            var availableW = Math.floor(navRect.width);
            if (availableW <= 0) return;

            var cs = window.getComputedStyle(navList);
            var gap = parseFloat(cs.columnGap || cs.gap) || 6;

            var widths = primaryItems.map(function (item) {
                return Math.ceil(item.getBoundingClientRect().width);
            });

            var totalW = widths.reduce(function (sum, w, idx) {
                return sum + w + (idx > 0 ? gap : 0);
            }, 0);

            if (totalW <= availableW - 4) {
                return; // All tabs fit cleanly on a single line
            }

            // Measure "More" button width accurately with placeholder count
            if (moreCountEl) moreCountEl.textContent = String(primaryItems.length);
            moreItem.hidden = false;
            var moreW = Math.ceil(moreItem.getBoundingClientRect().width);
            var budget = Math.max(0, availableW - moreW - gap - 4);

            var usedW = 0;
            var overflowing = false;
            var overflowItems = [];

            primaryItems.forEach(function (item, idx) {
                var needed = (idx > 0 ? gap : 0) + widths[idx];
                if (!overflowing && usedW + needed <= budget) {
                    usedW += needed;
                } else {
                    overflowing = true;
                    overflowItems.push(item);
                }
            });

            var hasActiveInMore = false;
            overflowItems.forEach(function (item) {
                item.classList.add('kaw-in-more');
                if (item.classList.contains('is-active')) {
                    hasActiveInMore = true;
                }
                moreMenu.appendChild(item);
            });

            if (overflowItems.length === 0) {
                moreItem.hidden = true;
                return;
            }

            if (moreCountEl) moreCountEl.textContent = String(overflowItems.length);
            moreItem.hidden = false;
            moreItem.classList.toggle('is-active', hasActiveInMore);
        } finally {
            isLayingOutNav = false;
        }
    }

    // Immediate first calculation before paint completes + observer for font/viewport changes
    layoutAdaptiveNav();
    if (document.fonts && document.fonts.ready) {
        document.fonts.ready.then(layoutAdaptiveNav);
    }
    if (typeof ResizeObserver !== 'undefined' && navEl) {
        var navResizeTimer = null;
        var ro = new ResizeObserver(function () {
            window.clearTimeout(navResizeTimer);
            navResizeTimer = window.setTimeout(layoutAdaptiveNav, 50);
        });
        ro.observe(navEl);
        var hdrWrap = document.getElementById('kawHdrWrap');
        if (hdrWrap) ro.observe(hdrWrap);
    } else {
        window.addEventListener('resize', layoutAdaptiveNav);
    }

    /* ---- 3. Viewport-Aware Edge Collision for Dropdowns ---- */
    function checkDropdownEdges(item) {
        var drop = item.querySelector(':scope > .kaw-nav-dropdown');
        if (!drop) return;
        drop.classList.remove('kaw-flip-left');
        var rect = drop.getBoundingClientRect();
        if (rect.right > window.innerWidth - 12) {
            drop.classList.add('kaw-flip-left');
        }
    }

    if (navList) {
        navList.addEventListener('mouseenter', function (e) {
            var item = e.target.closest('.kaw-nav-item.has-dropdown');
            if (item && !item.classList.contains('kaw-in-more')) {
                checkDropdownEdges(item);
            }
            var subItem = e.target.closest('.kaw-nav-subitem.has-subdropdown');
            if (subItem && !subItem.closest('.kaw-in-more')) {
                var subDrop = subItem.querySelector(':scope > .kaw-nav-subdropdown');
                if (subDrop) {
                    subDrop.classList.remove('kaw-flip-left');
                    var sr = subDrop.getBoundingClientRect();
                    if (sr.right > window.innerWidth - 12) {
                        subDrop.classList.add('kaw-flip-left');
                    }
                }
            }
        }, true);

        // Click / touch toggle for "#" placeholder links, More button, and overflowed nested menus
        navList.addEventListener('click', function (e) {
            var moreBtn = e.target.closest('#kawNavMoreToggle');
            if (moreBtn && moreItem) {
                e.preventDefault();
                e.stopPropagation();
                var willOpen = !moreItem.classList.contains('is-open');
                closeAllNavDrops();
                moreItem.classList.toggle('is-open', willOpen);
                moreBtn.setAttribute('aria-expanded', willOpen ? 'true' : 'false');
                if (willOpen) checkDropdownEdges(moreItem);
                return;
            }

            var inMoreLink = e.target.closest('.kaw-in-more.has-dropdown > .kaw-nav-link');
            if (inMoreLink) {
                var parentItem = inMoreLink.closest('.kaw-in-more');
                var href = inMoreLink.getAttribute('href') || '#';
                if (href === '#' || e.target.closest('.kaw-nav-caret')) {
                    e.preventDefault();
                    e.stopPropagation();
                    parentItem.classList.toggle('is-subopen');
                }
                return;
            }

            var navLink = e.target.closest('.kaw-nav-item.has-dropdown > .kaw-nav-link');
            if (navLink && navLink.getAttribute('href') === '#') {
                e.preventDefault();
                e.stopPropagation();
                var topItem = navLink.closest('.kaw-nav-item');
                var next = !topItem.classList.contains('is-open');
                closeAllNavDrops();
                topItem.classList.toggle('is-open', next);
                navLink.setAttribute('aria-expanded', next ? 'true' : 'false');
                if (next) checkDropdownEdges(topItem);
            }
        });
    }

    function closeAllNavDrops() {
        if (!navList) return;
        navList.querySelectorAll('.kaw-nav-item.is-open').forEach(function (el) {
            el.classList.remove('is-open');
            var trigger = el.querySelector(':scope > .kaw-nav-link');
            if (trigger) trigger.setAttribute('aria-expanded', 'false');
        });
        if (moreToggle) moreToggle.setAttribute('aria-expanded', 'false');
    }

    /* ---- 4. Customer Service & Feature-Icon Panels (Existing Behavior Preserved) ---- */
    document.addEventListener('DOMContentLoaded', function () {
        var csBtn = document.getElementById('kawCsBtn');
        var csDrop = document.getElementById('kawCsDrop');

        function closeCS() {
            if (!csDrop || !csBtn) return;
            csDrop.classList.remove('is-open');
            csBtn.classList.remove('is-active');
            csBtn.setAttribute('aria-expanded', 'false');
        }

        function openCS() {
            if (!csDrop || !csBtn) return;
            var rect = csBtn.getBoundingClientRect();
            var dropW = 240;
            var margin = 12;
            var viewportW = window.innerWidth;

            var top = rect.bottom + 8;
            var left = rect.right - dropW;
            if (left < margin) left = margin;
            if (left + dropW > viewportW - margin) left = viewportW - dropW - margin;

            csDrop.style.top = top + 'px';
            csDrop.style.left = left + 'px';
            csDrop.style.right = 'auto';

            csDrop.classList.add('is-open');
            csBtn.classList.add('is-active');
            csBtn.setAttribute('aria-expanded', 'true');
        }

        var moreBtn = document.getElementById('kawFiMoreBtn');
        var panel = document.getElementById('kawFiPanel');
        var backdrop = document.getElementById('kawFiBackdrop');
        var moreLabel = document.getElementById('kawFiMoreLabel');

        function openPanel() {
            if (!panel) return;
            panel.classList.add('is-visible');
            if (backdrop) backdrop.classList.add('is-active');
            if (moreBtn) {
                moreBtn.classList.add('is-expanded');
                moreBtn.setAttribute('aria-expanded', 'true');
            }
            if (moreLabel) moreLabel.textContent = 'Less';
        }

        function closePanel() {
            if (!panel) return;
            panel.classList.remove('is-visible');
            if (backdrop) backdrop.classList.remove('is-active');
            if (moreBtn) {
                moreBtn.classList.remove('is-expanded');
                moreBtn.setAttribute('aria-expanded', 'false');
            }
            if (moreLabel) moreLabel.textContent = 'More';
        }

        if (csBtn && csDrop) {
            csBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                if (csDrop.classList.contains('is-open')) {
                    closeCS();
                } else {
                    closePanel();
                    closeAllNavDrops();
                    openCS();
                }
            });
            window.addEventListener('scroll', closeCS, { passive: true });
            window.addEventListener('resize', closeCS);
        }

        if (moreBtn && panel) {
            moreBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                if (panel.classList.contains('is-visible')) {
                    closePanel();
                } else {
                    closeCS();
                    closeAllNavDrops();
                    openPanel();
                }
            });
        }

        if (backdrop) {
            backdrop.addEventListener('click', closePanel);
        }

        document.addEventListener('click', function (e) {
            if (csDrop && !csDrop.contains(e.target) && e.target !== csBtn) {
                closeCS();
            }
            if (navList && !navList.contains(e.target)) {
                closeAllNavDrops();
            }
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                closePanel();
                closeCS();
                closeAllNavDrops();
            }
        });
    });
})();
</script>


@extends('frontend.layouts.app')

@section('page_title', 'Luxury Cabs & Car Rentals')
@section('page_meta')  
{!! generateMetaTagsSimple('Cabs', $setting) !!} 
@endsection 

@section('content')

@php
    $cabsIndexRoute = Route::has('home.cabs') ? route('home.cabs') : url('/cabs');
    $contactRoute   = Route::has('home.contact') ? route('home.contact') : url('/contact');
    $phoneNumber    = $setting->phone ?? '+91 7006338617';
    $phoneClean     = preg_replace('/[^0-9+]/', '', $phoneNumber);
    if (empty($phoneClean)) { $phoneClean = '+917006338617'; }
@endphp

<!--================================================================
    KZ LUXURY CABS DIRECTORY DESIGN SYSTEM (SCOPED CSS)
    Colors: Deep Teal (#0c514d), Turquoise (#126e68), Champagne Gold (#d6b36a)
=================================================================-->
<style>
:root {
    --kz-blue: #126e68;
    --kz-blue-dark: #0c514d;
    --kz-blue-light: #238d83;
    --kz-gold: #d6b36a;
    --kz-gold-hover: #bd9852;
    --kz-gold-light: #fff8e8;
    --kz-text-dark: #193b38;
    --kz-text-muted: #647b78;
    --kz-bg-soft: #eff8f6;
    --kz-border: rgba(18, 110, 104, 0.08);
}

/* ══════════════════════════════════════════════════════════════════
   1. CINEMATIC HERO & BREADCRUMBS
   ══════════════════════════════════════════════════════════════════ */
.kz-cabs-hero {
    position: relative;
    padding: 70px 0 65px;
    background:
        radial-gradient(circle at 82% 18%, rgba(190, 235, 225, 0.20), transparent 34%),
        linear-gradient(125deg, #0c514d 0%, #126e68 56%, #238d83 100%);
    color: #ffffff;
    overflow: hidden;
}
.kz-cabs-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: 
        radial-gradient(rgba(214, 179, 106, 0.12) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
    background-size: 24px 24px, 40px 40px;
    pointer-events: none;
    opacity: 0.85;
}
.kz-cabs-hero::after {
    content: "";
    position: absolute;
    width: 360px;
    height: 360px;
    right: -110px;
    bottom: -220px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(190, 235, 225, 0.20) 0%, rgba(190, 235, 225, 0) 70%);
    pointer-events: none;
}
.kz-cabs-hero .container {
    position: relative;
    z-index: 2;
}
.kz-cabs-breadcrumb {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.12);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.18);
    padding: 6px 16px;
    border-radius: 30px;
    font-size: 13px;
    color: rgba(255, 255, 255, 0.85);
    margin-bottom: 16px;
}
.kz-cabs-breadcrumb a {
    color: #ffffff;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.2s ease;
}
.kz-cabs-breadcrumb a:hover {
    color: var(--kz-gold);
}
.kz-cabs-breadcrumb i {
    font-size: 11px;
    color: var(--kz-gold);
}
.kz-cabs-breadcrumb .active-crumb {
    color: var(--kz-gold);
    font-weight: 700;
}
.kz-cabs-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.14em;
    color: var(--kz-gold);
    margin-bottom: 8px;
}
.kz-cabs-title {
    font-size: 38px;
    font-weight: 800;
    line-height: 1.25;
    letter-spacing: -0.02em;
    color: #ffffff;
    margin: 0 0 12px;
}
.kz-cabs-subtitle {
    font-size: 14.5px;
    color: rgba(255, 255, 255, 0.85);
    max-width: 600px;
    margin: 0;
    line-height: 1.6;
}

/* ══════════════════════════════════════════════════════════════════
   2. MAIN DIRECTORY LAYOUT
   ══════════════════════════════════════════════════════════════════ */
.kz-cabs-page {
    background:
        radial-gradient(circle at 8% 7%, rgba(35, 141, 131, 0.07), transparent 28%),
        linear-gradient(180deg, #eff8f6 0%, #f8fbfa 100%);
    padding: 55px 0 80px;
}

/* --- Search & View Toggle Toolbar --- */
.kz-cab-toolbar {
    background: #ffffff;
    border-radius: 18px;
    border: 1px solid var(--kz-border);
    box-shadow: 0 6px 20px rgba(18, 110, 104, 0.04);
    padding: 16px 22px;
    margin-bottom: 30px;
}
.kz-cab-search-form {
    display: flex;
    align-items: center;
    background: #eff8f6;
    border: 1px solid #c7ded9;
    border-radius: 30px;
    padding: 4px 6px 4px 16px;
    transition: all 0.25s ease;
    max-width: 380px;
}
.kz-cab-search-form:focus-within {
    border-color: var(--kz-blue);
    background: #ffffff;
    box-shadow: 0 0 0 3px rgba(18, 110, 104, 0.1);
}
.kz-cab-search-input {
    border: none;
    background: transparent;
    font-size: 13.5px;
    color: var(--kz-text-dark);
    width: 100%;
    outline: none;
}
.kz-cab-search-btn {
    border: none;
    background: var(--kz-blue);
    color: #ffffff;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    cursor: pointer;
    transition: all 0.2s ease;
    flex-shrink: 0;
}
.kz-cab-search-btn:hover {
    background: var(--kz-gold);
    color: #0c514d;
    transform: scale(1.05);
}
.kz-view-toggle {
    display: inline-flex;
    align-items: center;
    background: #e8f3f1;
    padding: 4px;
    border-radius: 12px;
    gap: 4px;
}
.kz-view-btn {
    width: 36px;
    height: 36px;
    border-radius: 9px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: var(--kz-text-muted);
    font-size: 15px;
    border: none;
    background: transparent;
    transition: all 0.2s ease;
    cursor: pointer;
    text-decoration: none;
}
.kz-view-btn:hover {
    color: var(--kz-blue);
}
.kz-view-btn.active {
    background: var(--kz-blue);
    color: #ffffff;
    box-shadow: 0 4px 12px rgba(18, 110, 104, 0.2);
}

/* ══════════════════════════════════════════════════════════════════
   3. CAB CARDS (GRID VIEW)
   ══════════════════════════════════════════════════════════════════ */
.kz-cab-card {
    background: #ffffff;
    border-radius: 20px;
    border: 1px solid var(--kz-border);
    box-shadow: 0 6px 20px rgba(18, 110, 104, 0.04);
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
    transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.35s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.25s ease;
}
.kz-cab-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 36px rgba(18, 110, 104, 0.12);
    border-color: rgba(18, 110, 104, 0.25);
}
.kz-cab-media {
    position: relative;
    height: 220px;
    overflow: hidden;
    background: #0c514d;
}
.kz-cab-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}
.kz-cab-card:hover .kz-cab-media img {
    transform: scale(1.08);
}
.kz-cab-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(12, 81, 77, 0.3) 0%, rgba(12, 81, 77, 0) 40%, rgba(12, 81, 77, 0.7) 100%);
    pointer-events: none;
}
.kz-cab-type-badge {
    position: absolute;
    top: 14px;
    left: 14px;
    background: var(--kz-blue);
    color: #ffffff;
    font-size: 11.5px;
    font-weight: 700;
    padding: 5px 12px;
    border-radius: 20px;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    z-index: 2;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}
.kz-cab-badge-loc {
    position: absolute;
    bottom: 14px;
    left: 14px;
    background: rgba(12, 81, 77, 0.85);
    backdrop-filter: blur(6px);
    border: 1px solid rgba(214, 179, 106, 0.3);
    color: #ffffff;
    font-size: 12px;
    font-weight: 600;
    padding: 4px 12px;
    border-radius: 20px;
    z-index: 2;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}
.kz-cab-badge-loc i {
    color: var(--kz-gold);
}

.kz-cab-content {
    padding: 22px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}
.kz-cab-name {
    font-size: 18px;
    font-weight: 800;
    color: var(--kz-blue-dark);
    margin: 0 0 8px;
    line-height: 1.35;
}
.kz-cab-name a {
    color: inherit;
    text-decoration: none;
    transition: color 0.2s ease;
}
.kz-cab-name a:hover {
    color: var(--kz-blue);
}
.kz-cab-desc {
    font-size: 13px;
    color: var(--kz-text-muted);
    line-height: 1.6;
    margin: 0 0 16px;
    flex-grow: 1;
}

/* Quick specs row */
.kz-cab-specs-row {
    display: flex;
    align-items: center;
    gap: 8px;
    background: #eff8f6;
    border: 1px solid rgba(18, 110, 104, 0.06);
    border-radius: 10px;
    padding: 8px 12px;
    margin-bottom: 18px;
    font-size: 11.5px;
    font-weight: 600;
    color: var(--kz-text-dark);
}
.kz-cab-spec-item {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    flex: 1;
    justify-content: center;
}
.kz-cab-spec-item i {
    color: var(--kz-gold-hover);
    font-size: 12px;
}

/* Action buttons */
.kz-cab-actions {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: auto;
}
.kz-cab-btn-details {
    flex: 1;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    background: var(--kz-blue);
    color: #ffffff;
    font-size: 13px;
    font-weight: 700;
    padding: 10px 14px;
    border-radius: 25px;
    text-decoration: none;
    transition: all 0.25s ease;
    box-shadow: 0 4px 12px rgba(18, 110, 104, 0.2);
}
.kz-cab-btn-details:hover {
    background: var(--kz-blue-dark);
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(18, 110, 104, 0.3);
}
.kz-cab-btn-wa {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #25D366;
    color: #ffffff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    text-decoration: none;
    box-shadow: 0 4px 12px rgba(37, 211, 102, 0.3);
    transition: all 0.2s ease;
    flex-shrink: 0;
}
.kz-cab-btn-wa:hover {
    background: #1da851;
    color: #ffffff;
    transform: scale(1.08);
}

/* ══════════════════════════════════════════════════════════════════
   4. CAB CARDS (LIST VIEW)
   ══════════════════════════════════════════════════════════════════ */
.kz-cab-card-list {
    background: #ffffff;
    border-radius: 20px;
    border: 1px solid var(--kz-border);
    box-shadow: 0 6px 20px rgba(18, 110, 104, 0.04);
    overflow: hidden;
    display: flex;
    flex-direction: row;
    margin-bottom: 22px;
    transition: all 0.3s ease;
}
.kz-cab-card-list:hover {
    transform: translateY(-4px);
    box-shadow: 0 16px 36px rgba(18, 110, 104, 0.12);
    border-color: rgba(18, 110, 104, 0.25);
}
.kz-cab-card-list .kz-cab-media {
    width: 320px;
    height: auto;
    min-height: 220px;
    flex-shrink: 0;
}
.kz-cab-card-list .kz-cab-content {
    padding: 24px 28px;
}
.kz-cab-card-list .kz-cab-actions {
    max-width: 260px;
}

/* ══════════════════════════════════════════════════════════════════
   5. SIDEBAR DESIGN
   ══════════════════════════════════════════════════════════════════ */
.kz-cab-sidebar {
    position: sticky;
    top: 90px;
}
.kz-sidebar-box {
    background: #ffffff;
    border-radius: 18px;
    border: 1px solid var(--kz-border);
    box-shadow: 0 6px 20px rgba(18, 110, 104, 0.04);
    padding: 24px;
    margin-bottom: 24px;
}
.kz-sidebar-title {
    font-size: 16px;
    font-weight: 800;
    color: var(--kz-blue-dark);
    margin: 0 0 16px;
    display: flex;
    align-items: center;
    gap: 8px;
}
.kz-sidebar-title i {
    color: var(--kz-gold);
}
.kz-filter-list {
    list-style: none;
    padding: 0;
    margin: 0;
}
.kz-filter-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 0;
    border-bottom: 1px solid rgba(18, 110, 104, 0.06);
    font-size: 13.5px;
}
.kz-filter-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
}
.kz-filter-item a {
    color: #315652;
    text-decoration: none;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: color 0.2s ease, transform 0.2s ease;
}
.kz-filter-item a:hover {
    color: var(--kz-blue);
    transform: translateX(4px);
}
.kz-filter-badge {
    background: #e8f3f1;
    color: var(--kz-text-muted);
    font-size: 11px;
    font-weight: 700;
    padding: 3px 8px;
    border-radius: 12px;
}

/* 24/7 Support Banner */
.kz-cab-support-card {
    background: linear-gradient(135deg, #0c514d 0%, #126e68 100%);
    border-radius: 18px;
    padding: 28px 24px;
    color: #ffffff;
    text-align: center;
    position: relative;
    overflow: hidden;
    box-shadow: 0 14px 35px -8px rgba(12, 81, 77, 0.35);
}
.kz-cab-support-card::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: radial-gradient(rgba(214, 179, 106, 0.15) 1px, transparent 1px);
    background-size: 18px 18px;
    pointer-events: none;
}
.kz-support-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(6px);
    border: 1px solid rgba(214, 179, 106, 0.3);
    color: var(--kz-gold);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    margin: 0 auto 16px;
}
.kz-support-title {
    font-size: 17px;
    font-weight: 800;
    margin: 0 0 6px;
    color: #ffffff;
}
.kz-support-text {
    font-size: 12.5px;
    color: rgba(255, 255, 255, 0.8);
    margin: 0 0 16px;
    line-height: 1.5;
}
.kz-support-phone {
    display: inline-block;
    color: var(--kz-gold);
    font-size: 18px;
    font-weight: 800;
    text-decoration: none;
    letter-spacing: 0.02em;
    margin-bottom: 16px;
    transition: transform 0.2s ease;
}
.kz-support-phone:hover {
    transform: scale(1.04);
    color: #f0d18b;
}
.kz-support-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--kz-gold);
    color: #0c514d;
    font-size: 13px;
    font-weight: 700;
    padding: 10px 22px;
    border-radius: 25px;
    text-decoration: none;
    transition: all 0.25s ease;
    box-shadow: 0 4px 14px rgba(214, 179, 106, 0.3);
}
.kz-support-btn:hover {
    background: #ffffff;
    color: var(--kz-blue);
    transform: translateY(-2px);
}

/* ══════════════════════════════════════════════════════════════════
   6. PAGINATION & EMPTY STATE
   ══════════════════════════════════════════════════════════════════ */
.kz-pagination-wrap {
    margin-top: 45px;
    display: flex;
    justify-content: center;
}
.kz-pagination-wrap nav .pagination {
    gap: 6px;
}
.kz-pagination-wrap nav .page-item .page-link {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid var(--kz-border);
    color: var(--kz-text-dark);
    font-weight: 600;
    font-size: 14px;
    background: #ffffff;
    transition: all 0.2s ease;
}
.kz-pagination-wrap nav .page-item.active .page-link {
    background: var(--kz-blue);
    border-color: var(--kz-blue);
    color: #ffffff;
    box-shadow: 0 4px 12px rgba(18, 110, 104, 0.25);
}
.kz-pagination-wrap nav .page-item .page-link:hover {
    background: var(--kz-gold-light);
    border-color: var(--kz-gold);
    color: #76531c;
}

.kz-empty-state {
    background: #ffffff;
    border-radius: 20px;
    padding: 60px 30px;
    text-align: center;
    border: 1px dashed rgba(18, 110, 104, 0.15);
}
.kz-empty-icon {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    background: var(--kz-gold-light);
    color: var(--kz-gold-hover);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    margin: 0 auto 18px;
}
.kz-empty-title {
    font-size: 18px;
    font-weight: 800;
    color: var(--kz-blue-dark);
    margin: 0 0 8px;
}
.kz-empty-text {
    font-size: 13.5px;
    color: var(--kz-text-muted);
    margin: 0 0 20px;
}

/* ══════════════════════════════════════════════════════════════════
   RESPONSIVE DESIGN
   ══════════════════════════════════════════════════════════════════ */
@media (max-width: 991px) {
    .kz-cabs-hero {
        padding: 55px 0 50px;
    }
    .kz-cabs-title {
        font-size: 30px;
    }
    .kz-cab-card-list {
        flex-direction: column;
    }
    .kz-cab-card-list .kz-cab-media {
        width: 100%;
        height: 220px;
    }
    .kz-cab-sidebar {
        margin-top: 35px;
        position: static;
    }
}
@media (max-width: 767px) {
    .kz-cabs-title {
        font-size: 26px;
    }
    .kz-cab-toolbar {
        padding: 14px 16px;
    }
    .kz-cab-search-form {
        max-width: 100%;
        margin-bottom: 12px;
    }
}
</style>

<!--==============================
    1. CINEMATIC HERO BANNER
==============================-->
<section class="kz-cabs-hero">
    <div class="container text-center text-md-start">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="kz-cabs-breadcrumb">
                    <a href="{{ url('/') }}"><i class="fa-solid fa-house"></i> Home</a>
                    <i class="fa-solid fa-chevron-right"></i>
                    <span class="active-crumb">Luxury Cabs & Rentals</span>
                </div>
                <div class="kz-cabs-eyebrow">
                    <i class="fa-solid fa-car-side"></i> Premium Fleet & Chauffeurs
                </div>
                <h1 class="kz-cabs-title">Luxury Cabs & Travel Rentals</h1>
                <p class="kz-cabs-subtitle">
                    Experience effortless, sanitized, and comfortable intercity travels, airport transfers, and sightseeing tours with verified local chauffeurs.
                </p>
            </div>
            <div class="col-lg-4 text-center text-lg-end mt-4 mt-lg-0">
                <a href="https://wa.me/{{ $phoneClean }}?text={{ urlencode('Hi Love Link, I want to book a cab.') }}" target="_blank" class="kz-support-btn d-inline-flex px-4 py-3">
                    <i class="fa-brands fa-whatsapp fs-5"></i> Instant Cab Booking
                </a>
            </div>
        </div>
    </div>
</section>

<!--==============================
    2. DIRECTORY MAIN SECTION
==============================-->
<section class="kz-cabs-page">
    <div class="container">
        <!-- Toolbar: Search + Grid/List Controls -->
        <div class="kz-cab-toolbar">
            <div class="row g-3 align-items-center justify-content-between">
                <!-- Search Form -->
                <div class="col-md-5 col-12">
                    <form class="kz-cab-search-form" method="GET" action="{{ $cabsIndexRoute }}">
                        <input type="text" name="search" class="kz-cab-search-input" placeholder="Search cabs, sedans, SUVs, locations..." value="{{ $search ?? '' }}">
                        <button type="submit" class="kz-cab-search-btn" aria-label="Search">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>

                <!-- Right Side: View Toggles & Status -->
                <div class="col-md-auto col-12 d-flex align-items-center justify-content-between gap-3">
                    <span class="text-muted small fw-semibold">
                        Showing <strong>{{ $cabs->count() }}</strong> Cabs Available
                    </span>

                    <div class="kz-view-toggle nav" role="tablist">
                        <button class="kz-view-btn active" id="tab-cabs-grid-btn" data-bs-toggle="tab" data-bs-target="#tab-cabs-grid" role="tab" aria-controls="tab-cabs-grid" aria-selected="true" title="Grid View">
                            <i class="fa-solid fa-grid-2"></i>
                        </button>
                        <button class="kz-view-btn" id="tab-cabs-list-btn" data-bs-toggle="tab" data-bs-target="#tab-cabs-list" role="tab" aria-controls="tab-cabs-list" aria-selected="false" title="List View">
                            <i class="fa-solid fa-list"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Main Content Area -->
            <div class="col-xxl-9 col-lg-8">
                <div class="tab-content" id="kzCabsTabContent">
                    @if ($cabs->count() > 0)
                        <!-- GRID VIEW TAB -->
                        <div class="tab-pane fade active show" id="tab-cabs-grid" role="tabpanel" aria-labelledby="tab-cabs-grid-btn">
                            <div class="row g-4">
                                @foreach ($cabs as $cab)
                                @php
                                    $cabDetailsUrl = route('home.cabdetails', $cab->slug);
                                    $cabWaMsg      = urlencode("Hi Love Link, I would like to book the cab: {$cab->name} ({$cab->location}). Please share rate & availability.");
                                @endphp
                                <div class="col-md-6 col-12">
                                    <div class="kz-cab-card">
                                        <!-- Vehicle Image -->
                                        <div class="kz-cab-media">
                                            <a href="{{ $cabDetailsUrl }}">
                                                <img src="{{ asset('storage/' . $cab->image) }}" alt="{{ $cab->name }}">
                                            </a>
                                            <div class="kz-cab-overlay"></div>
                                            
                                            <!-- Type Tag -->
                                            <span class="kz-cab-type-badge">
                                                <i class="fa-solid fa-car"></i> {{ $cab->cab_type ?? 'Luxury Cab' }}
                                            </span>

                                            <!-- Location Badge -->
                                            <span class="kz-cab-badge-loc">
                                                <i class="fa-solid fa-location-dot"></i> {{ $cab->location }}
                                            </span>
                                        </div>

                                        <!-- Content -->
                                        <div class="kz-cab-content">
                                            <h3 class="kz-cab-name">
                                                <a href="{{ $cabDetailsUrl }}">{{ $cab->name }}</a>
                                            </h3>

                                            <p class="kz-cab-desc">
                                                {{ Str::limit(strip_tags($cab->short_description), 75) }}
                                            </p>

                                            <!-- Quick Specs -->
                                            <div class="kz-cab-specs-row">
                                                <div class="kz-cab-spec-item" title="Capacity">
                                                    <i class="fa-solid fa-users"></i>
                                                    <span>{{ $cab->seating_capacity ?? '4-6' }} Seats</span>
                                                </div>
                                                <div class="kz-cab-spec-item" title="AC Available">
                                                    <i class="fa-solid fa-snowflake"></i>
                                                    <span>AC / Heater</span>
                                                </div>
                                                <div class="kz-cab-spec-item" title="Driver">
                                                    <i class="fa-solid fa-id-card"></i>
                                                    <span>Chauffeur</span>
                                                </div>
                                            </div>

                                            <!-- Dual Actions -->
                                            <div class="kz-cab-actions">
                                                <a href="{{ $cabDetailsUrl }}" class="kz-cab-btn-details">
                                                    <span>View Details</span>
                                                    <i class="fa-solid fa-arrow-right-long"></i>
                                                </a>
                                                <a href="https://wa.me/{{ $phoneClean }}?text={{ $cabWaMsg }}" target="_blank" class="kz-cab-btn-wa" title="Book via WhatsApp">
                                                    <i class="fa-brands fa-whatsapp"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- LIST VIEW TAB -->
                        <div class="tab-pane fade" id="tab-cabs-list" role="tabpanel" aria-labelledby="tab-cabs-list-btn">
                            <div class="row">
                                @foreach ($cabs as $cab)
                                @php
                                    $cabDetailsUrl = route('home.cabdetails', $cab->slug);
                                    $cabWaMsg      = urlencode("Hi Love Link, I would like to book the cab: {$cab->name} ({$cab->location}). Please share rate & availability.");
                                @endphp
                                <div class="col-12">
                                    <div class="kz-cab-card-list">
                                        <!-- Vehicle Image -->
                                        <div class="kz-cab-media">
                                            <a href="{{ $cabDetailsUrl }}">
                                                <img src="{{ asset('storage/' . $cab->image) }}" alt="{{ $cab->name }}">
                                            </a>
                                            <div class="kz-cab-overlay"></div>
                                            
                                            <span class="kz-cab-type-badge">
                                                <i class="fa-solid fa-car"></i> {{ $cab->cab_type ?? 'Luxury Cab' }}
                                            </span>

                                            <span class="kz-cab-badge-loc">
                                                <i class="fa-solid fa-location-dot"></i> {{ $cab->location }}
                                            </span>
                                        </div>

                                        <!-- Content -->
                                        <div class="kz-cab-content">
                                            <h3 class="kz-cab-name">
                                                <a href="{{ $cabDetailsUrl }}">{{ $cab->name }}</a>
                                            </h3>

                                            <p class="kz-cab-desc">
                                                {{ Str::limit(strip_tags($cab->short_description), 130) }}
                                            </p>

                                            <!-- Quick Specs -->
                                            <div class="kz-cab-specs-row mb-3" style="max-width: 460px;">
                                                <div class="kz-cab-spec-item">
                                                    <i class="fa-solid fa-users"></i>
                                                    <span>{{ $cab->seating_capacity ?? '4-6' }} Seater</span>
                                                </div>
                                                <div class="kz-cab-spec-item">
                                                    <i class="fa-solid fa-snowflake"></i>
                                                    <span>AC Equipped</span>
                                                </div>
                                                <div class="kz-cab-spec-item">
                                                    <i class="fa-solid fa-shield-check"></i>
                                                    <span>Certified Driver</span>
                                                </div>
                                            </div>

                                            <!-- Actions -->
                                            <div class="kz-cab-actions">
                                                <a href="{{ $cabDetailsUrl }}" class="kz-cab-btn-details">
                                                    <span>View Details & Rates</span>
                                                    <i class="fa-solid fa-arrow-right-long"></i>
                                                </a>
                                                <a href="https://wa.me/{{ $phoneClean }}?text={{ $cabWaMsg }}" target="_blank" class="kz-cab-btn-wa" title="Book via WhatsApp">
                                                    <i class="fa-brands fa-whatsapp"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <!-- EMPTY STATE -->
                        <div class="kz-empty-state">
                            <div class="kz-empty-icon">
                                <i class="fa-solid fa-car"></i>
                            </div>
                            <h3 class="kz-empty-title">No Cabs Found</h3>
                            <p class="kz-empty-text">We couldn't find any vehicles matching your search criteria. Try a different query or explore our full fleet.</p>
                            <a href="{{ $cabsIndexRoute }}" class="kz-cab-btn-details d-inline-flex px-4">
                                <i class="fa-solid fa-rotate-left"></i> View All Cabs
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Pagination Links -->
                <div class="kz-pagination-wrap">
                    {{ $cabs->links() }}
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-xxl-3 col-lg-4">
                <aside class="kz-cab-sidebar">
                    <!-- Cab Types Filter Widget -->
                    @if(isset($cabtypes) && count($cabtypes) > 0)
                    <div class="kz-sidebar-box">
                        <h4 class="kz-sidebar-title">
                            <i class="fa-solid fa-layer-group"></i> Vehicle Types
                        </h4>
                        <ul class="kz-filter-list">
                            @foreach($cabtypes as $type)
                            <li class="kz-filter-item">
                                <a href="{{ $cabsIndexRoute }}?search={{ urlencode($type->cab_type) }}">
                                    <i class="fa-solid fa-car-side text-muted small"></i>
                                    {{ $type->cab_type }}
                                </a>
                                <span class="kz-filter-badge">{{ $type->count }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Fast WhatsApp Booking Card -->
                    <div class="kz-sidebar-box" style="border: 1.5px solid rgba(214, 179, 106, 0.4); background: linear-gradient(180deg, #ffffff 0%, #f6faf8 100%);">
                        <div class="small fw-bold text-uppercase" style="color: var(--kz-gold-hover); letter-spacing: 0.1em; margin-bottom: 4px;">Quick Rental</div>
                        <h4 class="kz-sidebar-title mb-2">Book Cab in 2 Minutes</h4>
                        <p class="text-muted small mb-3">Speak directly with our transport manager for best package deals and custom route planning.</p>
                        
                        <a href="https://wa.me/{{ $phoneClean }}?text={{ urlencode('Hi Love Link, I would like to book a cab.') }}" target="_blank" class="kz-cab-btn-details w-100 mb-2" style="background: #25D366; box-shadow: 0 4px 14px rgba(37, 211, 102, 0.35);">
                            <i class="fa-brands fa-whatsapp fs-5"></i>
                            <span>WhatsApp Booking</span>
                        </a>

                        <a href="tel:{{ $phoneClean }}" class="kz-cab-btn-details w-100" style="background: var(--kz-blue-dark);">
                            <i class="fa-solid fa-phone"></i>
                            <span>Call {{ $phoneNumber }}</span>
                        </a>
                    </div>

                    <!-- 24/7 Dedicated Support Banner -->
                    <div class="kz-cab-support-card">
                        <div class="kz-support-icon">
                            <i class="fa-solid fa-headset"></i>
                        </div>
                        <h4 class="kz-support-title">Need Help Booking?</h4>
                        <p class="kz-support-text">
                            Our local drivers & travel dispatchers are active 24/7 for pickup assistance and emergency transfers.
                        </p>
                        <a href="tel:{{ $phoneClean }}" class="kz-support-phone">
                            {{ $phoneNumber }}
                        </a>
                        <div>
                            <a href="{{ $contactRoute }}" class="kz-support-btn">
                                <i class="fa-solid fa-envelope"></i> Contact Us
                            </a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

@endsection

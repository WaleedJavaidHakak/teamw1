@php
    // 1. Resolve the active State (from controller $state, route slug, or query parameter)
    $currentState = null;
    if (isset($state) && is_object($state)) {
        $currentState = $state;
    } elseif (!empty($state)) {
        $currentState = \App\Models\State::where('slug', $state)->orWhere('id', $state)->first();
    } elseif (request()->filled('state')) {
        $currentState = \App\Models\State::where('slug', request('state'))->orWhere('id', request('state'))->first();
    } elseif (request()->route('stateSlug')) {
        $currentState = \App\Models\State::where('slug', request()->route('stateSlug'))->first();
    }

    // 2. Get the State's specific image, or fallback to the default setting image
    $breadcrumbImage = null;
    if ($currentState) {
        if (!empty($currentState->banner)) {
            $breadcrumbImage = asset('storage/' . $currentState->banner);
        } elseif (!empty($currentState->banner_image)) {
            $breadcrumbImage = asset('storage/' . $currentState->banner_image);
        } elseif (!empty($currentState->image)) {
            $breadcrumbImage = asset('storage/' . $currentState->image);
        }
    }

    // Fallback to default if no state image exists or viewing all tours
    if (!$breadcrumbImage) {
        $breadcrumbImage = getImageByType(request()->segment(1), $setting);
    }

    // 3. Dynamic Title
    $pageTitle = $currentState ? ($currentState->name . ' Tours') : 'Our Tours';
@endphp

@extends('frontend.layouts.app')
@section('page_title', $pageTitle)
@section('page_meta')  
{!! generateMetaTagsSimple($pageTitle, $setting) !!} 
@endsection 

@section('content')

<!--================================================================
    LOVE LINK AQUATIC TEAL TOURS & PACKAGES DIRECTORY DESIGN SYSTEM
    Colors: Deep Teal (#0c514d), Turquoise (#126e68), Champagne Gold (#d6b36a)
=================================================================-->
<style>
:root {
    --kz-navy: #126e68;
    --kz-navy-dark: #0c514d;
    --kz-navy-light: #238d83;
    --kz-gold: #d6b36a;
    --kz-gold-hover: #bd9852;
    --kz-gold-light: #fff8e8;
    --kz-text-dark: #193b38;
    --kz-text-muted: #647b78;
    --kz-bg-soft: #eff8f6;
    --kz-border: rgba(18, 110, 104, 0.14);
}

/* ══════════════════════════════════════════════════════════════════
   1. CINEMATIC BREADCRUMB & HERO BANNER
   ══════════════════════════════════════════════════════════════════ */
.breadcumb-wrapper {
    position: relative;
    padding: 75px 0 70px;
    background-size: cover !important;
    background-position: center center !important;
    background-repeat: no-repeat !important;
    color: #ffffff;
    overflow: hidden;
    text-align: center;
}
/* Deep teal cinematic overlay keeps the breadcrumb text readable */
.breadcumb-wrapper::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(105deg, rgba(7, 57, 53, 0.86) 0%, rgba(12, 81, 77, 0.66) 52%, rgba(18, 110, 104, 0.30) 100%);
    pointer-events: none;
    z-index: 1;
}
.breadcumb-wrapper::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: radial-gradient(rgba(214,179,106,.18) 1px, transparent 1px), radial-gradient(rgba(255,255,255,.10) 1px, transparent 1px);
    background-size: 24px 24px, 40px 40px;
    pointer-events: none;
    opacity: 0.45;
    z-index: 2;
}
.breadcumb-wrapper .container {
    position: relative;
    z-index: 3;
}
.breadcumb-content {
    max-width: 700px;
    margin: 0 auto;
}
.breadcumb-title {
    font-size: 38px;
    font-weight: 800;
    letter-spacing: -0.02em;
    color: #ffffff;
    margin: 0 0 16px;
    line-height: 1.25;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.35);
}
.breadcumb-menu {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.12);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    padding: 7px 22px;
    border-radius: 30px;
    font-size: 13.5px;
    color: rgba(255, 255, 255, 0.9);
    list-style: none;
    margin: 0;
}
.breadcumb-menu li {
    display: inline-flex;
    align-items: center;
    gap: 8px;
}
.breadcumb-menu li:not(:last-child)::after {
    content: '›';
    color: var(--kz-gold);
    font-size: 16px;
    font-weight: 700;
    line-height: 1;
}
.breadcumb-menu a {
    color: #ffffff;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.2s ease;
}
.breadcumb-menu a:hover {
    color: var(--kz-gold);
}
.breadcumb-menu li:last-child {
    color: var(--kz-gold);
    font-weight: 700;
}

/* ══════════════════════════════════════════════════════════════════
   2. MAIN PRODUCT AREA & SORTING TOOLBAR
   ══════════════════════════════════════════════════════════════════ */
.space {
    padding: 24px 0 32px;
    background: linear-gradient(180deg, #edf7f5 0%, #f7fbfa 52%, #edf7f5 100%);
    position: relative;
}
.th-sort-bar {
    background: linear-gradient(135deg, rgba(255,255,255,.98), rgba(232,246,242,.96));
    border-radius: 18px;
    border: 1px solid rgba(18, 110, 104, .16);
    box-shadow: 0 10px 28px rgba(12, 81, 77, .07), inset 0 1px 0 rgba(255,255,255,.9);
    padding: 8px 22px;
    margin-bottom: 30px;
}
.search-form-area .search-form {
    display: flex;
    height:50px !important;
    align-items: center;
    background: rgba(255,255,255,.88);
    border: 1px solid rgba(18,110,104,.22);
    border-radius: 30px;
    padding: 4px 6px 4px 16px;
    transition: all 0.25s ease;
    max-width: 360px;
}
.search-form-area .search-form:focus-within {
    border-color: var(--kz-navy);
    background: #ffffff;
    box-shadow: 0 0 0 3px rgba(18, 110, 104, 0.12);
}
.search-form-area input[type="text"] {
    border: none;
    background: transparent;
    font-size: 13.5px;
    color: var(--kz-text-dark);
    width: 100%;
    outline: none;
}
.search-form-area button[type="submit"] {
    border: none;
    background: var(--kz-navy);
    color: #ffffff;
    width: 34px;
    height: 34px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    cursor: pointer;
    transition: all 0.2s ease;
    flex-shrink: 0;
}
.search-form-area button[type="submit"]:hover {
    background: var(--kz-gold);
    color: #0c514d;
    transform: scale(1.05);
}

.sorting-filter-wrap {
    display: flex;
    align-items: center;
    gap: 14px;
    flex-wrap: wrap;
}
.sorting-filter-wrap .nav {
    display: inline-flex;
    align-items: center;
    background: linear-gradient(135deg, #e1f1ed, #f3faf8);
    border: 1px solid rgba(18,110,104,.10);
    padding: 4px;
    border-radius: 12px;
    gap: 4px;
}
.sorting-filter-wrap .nav a {
    width: 34px;
    height: 34px;
    border-radius: 8px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: var(--kz-text-muted);
    font-size: 14px;
    border: none;
    background: transparent;
    transition: all 0.2s ease;
    cursor: pointer;
    text-decoration: none;
}
.sorting-filter-wrap .nav a:hover {
    color: var(--kz-navy);
}
.sorting-filter-wrap .nav a.active {
    background: var(--kz-navy);
    color: #ffffff;
    box-shadow: 0 4px 10px rgba(18, 110, 104, 0.20);
}
.woocommerce-ordering select.orderby {
    background: #eff8f6;
    border: 1px solid #c9ded9;
    border-radius: 20px;
    padding: 8px 16px;
    font-size: 13px;
    color: var(--kz-text-dark);
    font-weight: 500;
    outline: none;
    cursor: pointer;
    transition: border-color 0.2s ease;
}
.woocommerce-ordering select.orderby:focus {
    border-color: var(--kz-navy);
}

/* ══════════════════════════════════════════════════════════════════
   3. KAW PACKAGE CARD DESIGN (GRID VIEW)
   ══════════════════════════════════════════════════════════════════ */
.kaw-pkg-card {
    background: #ffffff;
    border-radius: 18px;
    border: 1px solid var(--kz-border);
    box-shadow: 0 6px 20px rgba(18, 110, 104, 0.06);
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
    position: relative;
    transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.35s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.25s ease;
}
.kaw-pkg-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 36px rgba(18, 110, 104, 0.14);
    border-color: rgba(18, 110, 104, 0.26);
}

/* Badges */
.kaw-pkg-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    z-index: 3;
    font-size: 11px;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 20px;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}
.kaw-badge-deal {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    color: #ffffff;
    box-shadow: 0 3px 10px rgba(239, 68, 68, 0.3);
}
.kaw-badge-booked {
    background: linear-gradient(135deg, #d6b36a 0%, #bd9852 100%);
    color: #0c514d;
    box-shadow: 0 3px 10px rgba(214, 179, 106, 0.28);
}

/* Image Wrap */
.kaw-pkg-img-wrap {
    position: relative;
    width: 100%;
    height: 190px;
    overflow: hidden;
    flex-shrink: 0;
}

.kaw-pkg-img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform .65s cubic-bezier(.16, 1, .3, 1);
}
.kaw-pkg-card:hover .kaw-pkg-img {
    transform: scale(1.08);
}
.kaw-img-overlay {
    position: absolute;
    inset: 0;
    pointer-events: none;
    background: linear-gradient(180deg, rgba(7,57,53,0) 42%, rgba(7,57,53,.68) 100%);
}
.kaw-img-title {
    position: absolute;
    bottom: 12px;
    left: 14px;
    right: 14px;
    margin: 0;
    font-size: 12.5px;
    font-weight: 700;
    color: #ffffff;
    line-height: 1.35;
    z-index: 2;
    text-shadow: 0 2px 6px rgba(0, 0, 0, 0.4);
}
.kaw-img-title a:hover {
    color: var(--kz-gold) !important;
}

/* Arrows */
.kaw-pkg-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 28px;
    height: 28px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(4px);
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #0c514d;
    font-size: 11px;
    cursor: pointer;
    opacity: 0;
    transition: all 0.2s ease;
    z-index: 2;
}
.kaw-pkg-card:hover .kaw-pkg-arrow {
    opacity: 1;
}
.kaw-pkg-arrow:hover {
    background: var(--kz-gold);
    color: #0c514d;
}
.kaw-pkg-arrow-prev {
    left: 8px;
}
.kaw-pkg-arrow-next {
    right: 8px;
}

/* Card Body */
.kaw-pkg-body {
    padding: 16px 14px 14px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}
.kaw-pkg-tags {
    display: flex;
    align-items: center;
    gap: 6px;
    margin-bottom: 6px;
}
.kaw-pkg-pill {
    background: var(--kz-gold-light);
    color: #80602a;
    font-size: 11px;
    font-weight: 700;
    padding: 3px 9px;
    border-radius: 12px;
    border: 1px solid rgba(214, 179, 106, 0.38);
    display: inline-block;
}
.kaw-pkg-date {
    font-size: 11.5px;
    color: var(--kz-text-muted);
    margin: 0 0 6px;
    font-weight: 500;
}
.kaw-pkg-itinerary {
    font-size: 12px;
    color: #47635f;
    margin: 6px 0 14px;
    line-height: 1.45;
    font-weight: 500;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.kaw-pkg-description {
    font-size: 13px;
    line-height: 1.5;
    color: #647b78;
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
    overflow: hidden;
    min-height: 78px;
    margin-bottom: 8px;
}
.kaw-itinerary-stop {
    color: #365651;
}
.kaw-itinerary-dot {
    color: var(--kz-gold);
    font-weight: 800;
    margin: 0 3px;
}

/* Bottom Panel & Amenities */
.kaw-pkg-bottom {
    background: linear-gradient(135deg, #0c514d 0%, #126e68 58%, #238d83 100%);
    border: 1px solid rgba(255,255,255,.18);
    border-radius: 13px;
    padding: 12px 10px 10px;
    margin-top: auto;
    box-shadow: 0 8px 18px rgba(12,81,77,.16), inset 0 1px 0 rgba(255,255,255,.10);
}
.kaw-pkg-amenities {
    display: flex;
    align-items: center;
    justify-content: space-around;
    gap: 4px;
    padding-bottom: 10px;
    border-bottom: 1px dashed rgba(255,255,255,.28);
    margin-bottom: 10px;
}
.kaw-amenity-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 3px;
    text-align: center;
    color: rgba(255,255,255,.82);
}
.kaw-amenity-item i {
    font-size: 14px;
    color: #f0d99f;
    transition: color 0.2s ease;
}
.kaw-pkg-card:hover .kaw-amenity-item i {
    color: #ffffff;
}
.kaw-amenity-item span {
    font-size: 9.5px;
    font-weight: 600;
    white-space: nowrap;
}

/* Pricing & Button */
.kaw-pkg-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
}
.kaw-pkg-price-block {
    line-height: 1.2;
}
.kaw-pkg-old-price-row {
    display: flex;
    align-items: center;
    gap: 6px;
    margin-bottom: 2px;
}
.kaw-pkg-old-price {
    font-size: 11px;
    text-decoration: line-through;
    color: rgba(255,255,255,.62);
    font-weight: 500;
}
.kaw-pkg-discount {
    font-size: 10px;
    font-weight: 700;
    color: #f7dfa5;
    background: rgba(214,179,106,.18);
    padding: 2px 5px;
    border-radius: 6px;
}
.kaw-pkg-price {
    font-size: 16px;
    font-weight: 800;
    color: #ffffff;
    margin: 0;
}
.kaw-pkg-price-label {
    font-size: 9.5px;
    color: rgba(255,255,255,.76);
    display: block;
    font-weight: 500;
}
.kaw-pkg-btn {
    background: var(--kz-gold);
    color: #0c514d;
    font-size: 11.5px;
    font-weight: 700;
    padding: 8px 14px;
    border-radius: 20px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.25s ease;
    white-space: nowrap;
    box-shadow: 0 4px 12px rgba(0,0,0,.16);
}
.kaw-pkg-btn:hover {
    background: #f1dfb7;
    color: #0c514d;
    transform: translateY(-2px);
    box-shadow: 0 7px 16px rgba(214, 179, 106, 0.30);
}

/* ══════════════════════════════════════════════════════════════════
   4. KAW PACKAGE CARD DESIGN (LIST VIEW)
   ══════════════════════════════════════════════════════════════════ */
.kaw-pkg-card.style-flex {
    flex-direction: row;
    margin-bottom: 24px;
}
.kaw-pkg-card.style-flex .kaw-pkg-img-wrap {
    width: 320px;
    height: auto;
    min-height: 220px;
    flex-shrink: 0;
}
.kaw-pkg-card.style-flex .kaw-pkg-body {
    padding: 22px 26px;
}
.kaw-pkg-card.style-flex .kaw-pkg-bottom {
    margin-top: 14px;
    padding: 14px 18px;
}
.kaw-pkg-card.style-flex .kaw-pkg-amenities {
    justify-content: flex-start;
    gap: 24px;
}

/* ══════════════════════════════════════════════════════════════════
   5. PAGINATION & SHAPES
   ══════════════════════════════════════════════════════════════════ */
.pagination {
    margin-top: 40px;
    justify-content: center;
    gap: 6px;
}
.pagination .page-item .page-link {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid var(--kz-border);
    color: var(--kz-text-dark);
    font-weight: 600;
    font-size: 13.5px;
    background: #ffffff;
    transition: all 0.2s ease;
}
.pagination .page-item.active .page-link {
    background: var(--kz-navy);
    border-color: var(--kz-navy);
    color: #ffffff;
    box-shadow: 0 4px 10px rgba(18, 110, 104, 0.24);
}
.pagination .page-item .page-link:hover {
    background: var(--kz-gold-light);
    border-color: var(--kz-gold);
    color: #80602a;
}

/* ══════════════════════════════════════════════════════════════════
   RESPONSIVE DESIGN
   ══════════════════════════════════════════════════════════════════ */
@media (max-width: 991px) {
    .breadcumb-wrapper {
        padding: 55px 0 50px;
    }
    .breadcumb-title {
        font-size: 30px;
    }
    .kaw-pkg-card.style-flex {
        flex-direction: column;
    }
    .kaw-pkg-card.style-flex .kaw-pkg-img-wrap {
        width: 100%;
        height: 200px;
    }
}
@media (max-width: 767px) {
    .breadcumb-title {
        font-size: 26px;
    }
    .th-sort-bar {
        padding: 4px 16px;
    }
    .search-form-area .search-form {
        max-width: 100%;
        margin-bottom: 12px;
    }
}

/* ══════════════════════════════════════════════════════════════════
   AQUATIC THEME FINISHING DETAILS
   ══════════════════════════════════════════════════════════════════ */
.breadcumb-title {
    font-family: 'Cormorant Garamond', Georgia, serif;
    font-weight: 600;
    letter-spacing: -.015em;
}
.breadcumb-menu {
    background: rgba(255,255,255,.13);
    border-color: rgba(255,255,255,.28);
}
.th-sort-bar,
.kaw-pkg-card {
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
}
.kaw-pkg-card {
    border-color: rgba(18,110,104,.15);
    box-shadow: 0 8px 24px rgba(12,81,77,.07);
}
.kaw-pkg-card:hover {
    border-color: rgba(35,141,131,.42);
    box-shadow: 0 18px 38px rgba(12,81,77,.15);
}
.kaw-pkg-pill {
    background: #fff8e8;
    color: #80602a;
    border-color: rgba(214,179,106,.42);
}
.kaw-pkg-date i {
    color: var(--kz-navy) !important;
}
.kaw-pkg-arrow {
    color: var(--kz-navy-dark);
    box-shadow: 0 4px 12px rgba(12,81,77,.16);
}
.kaw-pkg-arrow:hover {
    background: var(--kz-gold);
    color: var(--kz-navy-dark);
}
.search-form-area .search-form:focus-within {
    border-color: var(--kz-navy-light);
    box-shadow: 0 0 0 3px rgba(35,141,131,.13);
}
.pagination .page-item.active .page-link {
    background: linear-gradient(135deg, var(--kz-navy-dark), var(--kz-navy));
    border-color: var(--kz-navy);
}
.pagination .page-item .page-link:hover {
    background: #fff8e8;
    border-color: var(--kz-gold);
    color: #80602a;
}
.kaw-pkg-btn:focus-visible,
.search-form-area button[type="submit"]:focus-visible,
.sorting-filter-wrap .nav a:focus-visible,
.pagination .page-link:focus-visible {
    outline: 3px solid rgba(214,179,106,.65);
    outline-offset: 3px;
}
@media (prefers-reduced-motion: reduce) {
    .kaw-pkg-card,
    .kaw-pkg-img,
    .kaw-pkg-btn,
    .kaw-pkg-arrow {
        transition: none !important;
    }
}


/* FINAL PACKAGE PANEL COLOUR OVERRIDE — MATCH SITE TEAL THEME */
.kaw-pkg-card .kaw-pkg-bottom {
    background: linear-gradient(125deg, #0c514d 0%, #126e68 55%, #238d83 100%) !important;
    border: 1px solid rgba(255,255,255,.20) !important;
    border-radius: 13px !important;
    box-shadow: 0 8px 20px rgba(12,81,77,.18), inset 0 1px 0 rgba(255,255,255,.12) !important;
}
.kaw-pkg-card .kaw-pkg-amenities {
    border-bottom: 1px dashed rgba(255,255,255,.32) !important;
}
.kaw-pkg-card .kaw-amenity-item,
.kaw-pkg-card .kaw-amenity-item span {
    color: rgba(255,255,255,.90) !important;
}
.kaw-pkg-card .kaw-amenity-item i {
    color: #e7c77f !important;
}
.kaw-pkg-card:hover .kaw-amenity-item i {
    color: #ffffff !important;
}
.kaw-pkg-card .kaw-pkg-price {
    color: #ffffff !important;
}
.kaw-pkg-card .kaw-pkg-price-label {
    color: rgba(255,255,255,.82) !important;
}
.kaw-pkg-card .kaw-pkg-old-price {
    color: rgba(255,255,255,.68) !important;
}
.kaw-pkg-card .kaw-pkg-discount {
    color: #f8e7bd !important;
    background: rgba(214,179,106,.20) !important;
}
.kaw-pkg-card .kaw-pkg-bottom .kaw-pkg-btn,
.kaw-pkg-card .kaw-pkg-btn {
    background: #d6b36a !important;
    border: 1px solid #d6b36a !important;
    color: #0c514d !important;
    box-shadow: 0 4px 12px rgba(0,0,0,.16) !important;
}
.kaw-pkg-card .kaw-pkg-bottom .kaw-pkg-btn:hover,
.kaw-pkg-card .kaw-pkg-btn:hover {
    background: #f0dfb6 !important;
    border-color: #f0dfb6 !important;
    color: #0c514d !important;
    transform: translateY(-2px) !important;
}
.kaw-pkg-card .kaw-pkg-pill {
    background: #edf7f4 !important;
    border-color: rgba(18,110,104,.18) !important;
    color: #0c514d !important;
}
.kaw-pkg-card .kaw-pkg-tags .kaw-pkg-pill[style] {
    background: #fff8e8 !important;
    border-color: rgba(214,179,106,.42) !important;
    color: #80602a !important;
}
.pagination .page-item.active .page-link {
    background: linear-gradient(135deg, #0c514d, #238d83) !important;
    border-color: #126e68 !important;
    color: #ffffff !important;
}


/* FIX: remove the light strip below the teal price panel in grid cards.
   Keep the price panel anchored to the bottom, regardless of description length. */
#tab-grid .kaw-pkg-card {
    height: 100%;
}
#tab-grid .kaw-pkg-card > .kaw-pkg-body {
    flex: 1 1 auto;
    padding-bottom: 0 !important;
}
#tab-grid .kaw-pkg-card .kaw-pkg-bottom {
    margin-top: auto !important;
    margin-bottom: 0 !important;
    border-radius: 13px 13px 0 0 !important;
}

</style>

<!--==============================
    Dynamic Breadcrumb Section
============================== -->
<div class="breadcumb-wrapper" 
     data-bg-src="{{ $breadcrumbImage }}" 
     style="background-image: url('{{ $breadcrumbImage }}');">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">{{ $pageTitle }}</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                @if($currentState)
                    <li><a href="{{ route('home.tour') }}">Our Tours</a></li>
                    <li>{{ $currentState->name }}</li>
                @else
                    <li>Our Tours</li>
                @endif
            </ul>
        </div>
    </div>
</div> 

<!--==============================
    Product Area
==============================-->
<section class="space">
    <div class="container">
        <!-- Filter / Sort Bar -->
        <div class="th-sort-bar">
            <div class="row justify-content-between align-items-center g-3">
                <div class="col-md-4">
                    <div class="search-form-area">
                        <form class="search-form" method="GET" action="{{ route('home.tour') }}">
                            {{-- Preserve active sort order during search --}}
                            @if(request('orderby'))
                                <input type="hidden" name="orderby" value="{{ request('orderby') }}">
                            @endif
                            @if(!empty($currentState))
                                <input type="hidden" name="state" value="{{ $currentState->slug ?? $currentState->id }}">
                            @elseif(request('state'))
                                <input type="hidden" name="state" value="{{ request('state') }}">
                            @endif
                            <input type="text" name="search" placeholder="Search tours, destinations..." value="{{ request('search', $search ?? '') }}">
                            <button type="submit" aria-label="Search"><i class="fa-light fa-magnifying-glass fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                </div>

                <div class="col-md-auto">
                    <div class="sorting-filter-wrap">
                        <div class="nav" role="tablist">
                            <a class="active" href="#" id="tab-destination-grid" data-bs-toggle="tab" data-bs-target="#tab-grid" role="tab" aria-controls="tab-grid" aria-selected="true" title="Grid View">
                                <i class="fa-light fa-grid-2 fa-solid fa-table-cells"></i>
                            </a>
                            <a href="#" id="tab-destination-list" data-bs-toggle="tab" data-bs-target="#tab-list" role="tab" aria-controls="tab-list" aria-selected="false" title="List View">
                                <i class="fa-solid fa-list"></i>
                            </a>
                        </div>
                        <form class="woocommerce-ordering" method="GET" action="{{ route('home.tour') }}">
                            {{-- Preserve search keyword during sorting --}}
                            @if(request('search'))
                                <input type="hidden" name="search" value="{{ request('search') }}">
                            @endif
                            {{-- Preserve state so default sorting knows which state to show --}}
                            @if(!empty($currentState))
                                <input type="hidden" name="state" value="{{ $currentState->slug ?? $currentState->id }}">
                            @elseif(request('state'))
                                <input type="hidden" name="state" value="{{ request('state') }}">
                            @endif
                            <select name="orderby" class="orderby" aria-label="destination order" onchange="this.form.submit()">
                                <option value="menu_order" {{ request('orderby', 'menu_order') == 'menu_order' ? 'selected' : '' }}>Default Sorting</option>
                                <option value="popularity" {{ request('orderby') == 'popularity' ? 'selected' : '' }}>Sort by popularity</option>
                                
                                <option value="date" {{ request('orderby') == 'date' ? 'selected' : '' }}>Sort by latest</option>
                                <option value="price" {{ request('orderby') == 'price' ? 'selected' : '' }}>Sort by price: low to high</option>
                                <option value="price-desc" {{ request('orderby') == 'price-desc' ? 'selected' : '' }}>Sort by price: high to low</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xxl-12 col-lg-12">
                <div class="tab-content" id="nav-tabContent">
                    {{-- ========== GRID VIEW ========== --}}
                    <div class="tab-pane fade active show" id="tab-grid" role="tabpanel" aria-labelledby="tab-destination-grid">
                        <div class="row gy-24 gx-24 align-items-stretch">
                            @forelse($tours as $tour)
                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 d-flex">
                                <div class="kaw-pkg-card">
                                    @if($tour->badge_type === 'deal')
                                        <span class="kaw-pkg-badge kaw-badge-deal">
                                            <i class="ti ti-discount-2"></i> Deal Available
                                        </span>
                                    @elseif($tour->badge_type === 'most_booked')
                                        <span class="kaw-pkg-badge kaw-badge-booked">
                                            <i class="ti ti-thumb-up"></i> Most Booked
                                        </span>
                                    @endif

                                    <div class="kaw-pkg-img-wrap">
                                        <img src="{{ asset('storage/' . $tour->image) }}" alt="{{ $tour->title }}" class="kaw-pkg-img">
                                        @if($tour->gallery_count > 1)
                                        <button class="kaw-pkg-arrow kaw-pkg-arrow-prev" aria-label="Previous"><i class="ti ti-chevron-left"></i></button>
                                        <button class="kaw-pkg-arrow kaw-pkg-arrow-next" aria-label="Next"><i class="ti ti-chevron-right"></i></button>
                                        @endif
                                        <div class="kaw-img-overlay"></div>
                                        <h3 class="kaw-img-title">
                                            <a href="{{ route('tour.details', $tour->slug) }}" style="color:inherit;text-decoration:none;">{{ $tour->title }}</a>
                                        </h3>
                                    </div>

                                    <div class="kaw-pkg-body">
                                        <div class="kaw-pkg-tags">
                                            <span class="kaw-pkg-pill">{{ $tour->duration - 1 }}N|{{ $tour->duration }}D</span>
                                            <span class="kaw-pkg-pill" style="background:rgba(214,179,106,.16); color:#80602a; border-color:rgba(214,179,106,.38);"><i class="fa-solid fa-star text-warning me-1"></i>{{ number_format($tour->rating ?? 4.8, 1) }}</span>
                                        </div>

                                        @if($tour->type != 1)
                                        <p class="kaw-pkg-date"><i class="fa-regular fa-calendar-days text-muted me-1"></i>{{ \Carbon\Carbon::parse($tour->venue_date)->format('d M Y') }}</p>
                                        @endif

                                        @if(!empty($tour->short_description))
                                        <p class="kaw-pkg-description">{{ Str::limit(strip_tags($tour->short_description), 150) }}</p>
                                        @endif

                                        {{-- Short Itinerary --}}
                                        @if(!empty($tour->highlights))
                                        <p class="kaw-pkg-itinerary">
                                            @php
                                                $highlights = is_array($tour->highlights) ? $tour->highlights : json_decode($tour->highlights, true);
                                            @endphp
                                            @if(is_array($highlights))
                                                @foreach($highlights as $index => $item)
                                                    <span class="kaw-itinerary-stop">{{ $item }}</span>
                                                    @if($index < count($highlights) - 1)
                                                        <span class="kaw-itinerary-dot">></span>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </p>
                                        @endif

                                        {{-- Bottom Amenities & Price Panel --}}
                                        <div class="kaw-pkg-bottom">
                                            <div class="kaw-pkg-amenities">
                                                <div class="kaw-amenity-item" title="Hotels">
                                                    <i class="ti ti-building"></i>
                                                    <span>Hotels</span>
                                                </div>
                                                <div class="kaw-amenity-item" title="Sightseeing">
                                                    <i class="ti ti-camera"></i>
                                                    <span>Sightseeing</span>
                                                </div>
                                                <div class="kaw-amenity-item" title="Meals">
                                                    <i class="ti ti-tools-kitchen-2"></i>
                                                    <span>Meal</span>
                                                </div>
                                                <div class="kaw-amenity-item" title="Tour Manager">
                                                    <i class="ti ti-user-check"></i>
                                                    <span>Manager</span>
                                                </div>
                                                <div class="kaw-amenity-item" title="Cab Transfer">
                                                    <i class="ti ti-car"></i>
                                                    <span>Cab</span>
                                                </div>
                                            </div>

                                            <div class="kaw-pkg-footer">
                                                <div class="kaw-pkg-price-block">
                                                    @if($tour->discount_percent)
                                                    <div class="kaw-pkg-old-price-row">
                                                        <span class="kaw-pkg-old-price">{{ $tour->original_formatted_price }}</span>
                                                        <span class="kaw-pkg-discount">{{ $tour->discount_percent }}% OFF</span>
                                                    </div>
                                                    @endif
                                                    <p class="kaw-pkg-price">
                                                        {{ $tour->formatted_price }}
                                                        <span class="kaw-pkg-price-label">Starting price per adult</span>
                                                    </p>
                                                </div>
                                                <a href="{{ route('tour.details', $tour->slug) }}" class="kaw-pkg-btn">
                                                    View Details
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12 text-center py-5">
                                <p class="text-muted fs-5">No tours found matching your search criteria.</p>
                                <a href="{{ route('home.tour') }}" class="kaw-pkg-btn mt-2">View All Tours</a>
                            </div>
                            @endforelse
                        </div>
                    </div>

                    {{-- ========== LIST VIEW ========== --}}
                    <div class="tab-pane fade" id="tab-list" role="tabpanel" aria-labelledby="tab-destination-list">
                        <div class="row gy-30">
                            @forelse($tours as $tour)
                            <div class="col-12">
                                <div class="kaw-pkg-card style-flex">
                                    @if($tour->badge_type === 'deal')
                                        <span class="kaw-pkg-badge kaw-badge-deal">
                                            <i class="ti ti-discount-2"></i> Deal Available
                                        </span>
                                    @elseif($tour->badge_type === 'most_booked')
                                        <span class="kaw-pkg-badge kaw-badge-booked">
                                            <i class="ti ti-thumb-up"></i> Most Booked
                                        </span>
                                    @endif

                                    <div class="kaw-pkg-img-wrap">
                                        <img src="{{ asset('storage/' . $tour->image) }}" alt="{{ $tour->title }}" class="kaw-pkg-img">
                                        @if($tour->gallery_count > 1)
                                        <button class="kaw-pkg-arrow kaw-pkg-arrow-prev" aria-label="Previous"><i class="ti ti-chevron-left"></i></button>
                                        <button class="kaw-pkg-arrow kaw-pkg-arrow-next" aria-label="Next"><i class="ti ti-chevron-right"></i></button>
                                        @endif
                                        <div class="kaw-img-overlay"></div>
                                        <h3 class="kaw-img-title">
                                            <a href="{{ route('tour.details', $tour->slug) }}" style="color:inherit;text-decoration:none;">{{ $tour->title }}</a>
                                        </h3>
                                    </div>

                                    <div class="kaw-pkg-body">
                                        <div class="kaw-pkg-tags">
                                            <span class="kaw-pkg-pill">{{ $tour->duration - 1 }}N/{{ $tour->duration }}D</span>
                                            <span class="kaw-pkg-pill" style="background:rgba(214,179,106,.16); color:#80602a; border-color:rgba(214,179,106,.38);"><i class="fa-solid fa-star text-warning me-1"></i>{{ number_format($tour->rating ?? 4.8, 1) }}</span>
                                        </div>

                                        @if($tour->type != 1)
                                        <p class="kaw-pkg-date"><i class="fa-regular fa-calendar-days text-muted me-1"></i>{{ \Carbon\Carbon::parse($tour->venue_date)->format('d M Y') }}</p>
                                        @endif

                                        @if(!empty($tour->short_description))
                                        <p class="kaw-pkg-description">{{ Str::limit(strip_tags($tour->short_description), 150) }}</p>
                                        @endif

                                        {{-- Short Itinerary --}}
                                        @if(!empty($tour->highlights))
                                        <p class="kaw-pkg-itinerary">
                                            @php
                                                $highlights = is_array($tour->highlights) ? $tour->highlights : json_decode($tour->highlights, true);
                                            @endphp
                                            @if(is_array($highlights))
                                                @foreach($highlights as $index => $item)
                                                    <span class="kaw-itinerary-stop">{{ $item }}</span>
                                                    @if($index < count($highlights) - 1)
                                                        <span class="kaw-itinerary-dot">></span>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </p>
                                        @endif

                                        {{-- Bottom Amenities & Price Panel --}}
                                        <div class="kaw-pkg-bottom">
                                            <div class="kaw-pkg-amenities">
                                                <div class="kaw-amenity-item" title="Hotels">
                                                    <i class="ti ti-building"></i>
                                                    <span>Hotels</span>
                                                </div>
                                                <div class="kaw-amenity-item" title="Sightseeing">
                                                    <i class="ti ti-camera"></i>
                                                    <span>Sightseeing</span>
                                                </div>
                                                <div class="kaw-amenity-item" title="Meals">
                                                    <i class="ti ti-tools-kitchen-2"></i>
                                                    <span>Meal</span>
                                                </div>
                                                <div class="kaw-amenity-item" title="Tour Manager">
                                                    <i class="ti ti-user-check"></i>
                                                    <span>Manager</span>
                                                </div>
                                                <div class="kaw-amenity-item" title="Cab Transfer">
                                                    <i class="ti ti-car"></i>
                                                    <span>Cab</span>
                                                </div>
                                            </div>

                                            <div class="kaw-pkg-footer">
                                                <div class="kaw-pkg-price-block">
                                                    @if($tour->discount_percent)
                                                    <div class="kaw-pkg-old-price-row">
                                                        <span class="kaw-pkg-old-price">₹ {{ $tour->original_formatted_price }}</span>
                                                        <span class="kaw-pkg-discount">{{ $tour->discount_percent }}% OFF</span>
                                                    </div>
                                                    @endif
                                                    <p class="kaw-pkg-price">
                                                        ₹ {{ $tour->formatted_price }}
                                                        <span class="kaw-pkg-price-label">Starting price per adult</span>
                                                    </p>
                                                </div>
                                                <a href="{{ route('tour.details', $tour->slug) }}" class="kaw-pkg-btn">
                                                    View Details
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12 text-center py-5">
                                <p class="text-muted fs-5">No tours found matching your search criteria.</p>
                                <a href="{{ route('home.tour') }}" class="kaw-pkg-btn mt-2">View All Tours</a>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Pagination Links -->
                <div class="pagination text-center mt-5 mb-0">
                    {{ $tours->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="shape-mockup shape1 d-none d-xxl-block" data-bottom="7%" data-right="8%">
        <img src="{{ asset('webassets/img/shape/shape_1.png')}}" alt="shape">
    </div>
    <div class="shape-mockup shape2 d-none d-xl-block" data-bottom="1%" data-right="7%">
        <img src="{{ asset('webassets/img/shape/shape_2.png')}}" alt="shape">
    </div>
    <div class="shape-mockup shape3 d-none d-xxl-block" data-bottom="2%" data-right="4%">
        <img src="{{ asset('webassets/img/shape/shape_3.png')}}" alt="shape">
    </div>
</section>

@include('frontend.partials.customization-banner')

@endsection

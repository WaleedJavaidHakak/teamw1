@extends('frontend.layouts.app')

@section('page_title', 'Activities')

@section('page_meta')
    {!! generateMetaTagsSimple('Activities', $setting) !!}
@endsection

@section('content')

{{-- Activities hero --}}
<div class="breadcumb-wrapper kz-activities-hero" data-bg-src="{{ getImageByType(request()->segment(1), $setting) }}">
    <div class="container">
        <div class="breadcumb-content kz-activities-hero-content">
            <span class="kz-activities-eyebrow">Discover Kashmir</span>
            <h1 class="breadcumb-title">Activities & Experiences</h1>
            <ul class="breadcumb-menu kz-activities-breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Activities</li>
            </ul>
        </div>
    </div>
</div>

<section class="kz-activities-section">
    <div class="container">

        {{-- Full-width search toolbar --}}
        <div class="kz-activity-search-panel">
            <div class="kz-activity-search-heading">
                <span class="kz-activity-search-kicker">Find your experience</span>
                <h2>Explore Activities</h2>
                <p>Search experiences by activity name or location.</p>
            </div>

            <form class="kz-activity-search-form" method="GET" action="{{ route('activity.index') }}" role="search">
                <label class="kz-activity-search-input-wrap">
                    <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                    <span class="visually-hidden">Search activities</span>
                    <input
                        type="search"
                        name="search"
                        value="{{ $search ?? '' }}"
                        placeholder="Search by activity or location..."
                        aria-label="Search activities by name or location"
                    >
                </label>
                <button type="submit" class="kz-activity-search-button">
                    <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                    Search
                </button>
                @if(!empty($search))
                    <a href="{{ route('activity.index') }}" class="kz-activity-clear-search">Clear</a>
                @endif
            </form>
        </div>

        <div class="kz-activities-results-row">
            <div>
                <span class="kz-activities-section-label">Love Link Tour & Travels</span>
                <h2 class="kz-activities-section-title">
                    {{ !empty($search) ? 'Search Results' : 'Things to Do in Kashmir' }}
                </h2>
            </div>
            <div class="kz-activities-result-count">
                Showing {{ $activities->firstItem() ?? 0 }}–{{ $activities->lastItem() ?? 0 }} of {{ $activities->total() }} activities
            </div>
        </div>

        @if($activities->count() > 0)
            <div class="kz-activities-grid">
                @foreach ($activities as $activity)
                    @php
                        $activityRating = is_numeric($activity->rating) ? (float) $activity->rating : 4.8;
                        $activityRating = max(0, min(5, $activityRating));
                    @endphp

                    <article class="kz-activity-card">
                        <a href="{{ route('activity.details', $activity->slug) }}" class="kz-activity-image-link" aria-label="View {{ $activity->title }}">
                            <img
                                src="{{ asset('storage/' . $activity->image) }}"
                                alt="{{ $activity->title }}"
                                class="kz-activity-image"
                                loading="lazy"
                            >
                            <span class="kz-activity-image-tag">
                                <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                                Kashmir Experience
                            </span>
                        </a>

                        <div class="kz-activity-card-content">
                            <h3 class="kz-activity-card-title">
                                <a href="{{ route('activity.details', $activity->slug) }}">{{ $activity->title }}</a>
                            </h3>

                            <div class="kz-activity-rating" aria-label="Rated {{ number_format($activityRating, 1) }} out of 5">
                                <span class="kz-activity-stars" style="--kz-rating-width: {{ ($activityRating / 5) * 100 }}%;" aria-hidden="true">★★★★★</span>
                                <span class="kz-activity-rating-text">({{ number_format($activityRating, 1) }} Rating)</span>
                            </div>

                            <div class="kz-activity-price">
                                <span class="kz-activity-price-value">{{ $activity->formatted_price }}</span>
                                <span class="kz-activity-price-unit">/ Person</span>
                            </div>

                            <div class="kz-activity-card-footer">
                                <span class="kz-activity-duration">
                                    <i class="fa-regular fa-clock" aria-hidden="true"></i>
                                    {{ $activity->days }} Days
                                </span>
                                <a href="{{ route('activity.details', $activity->slug) }}" class="kz-activity-detail-button">
                                    Detail View
                                    <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="kz-activities-pagination">
                {{ $activities->appends(request()->query())->links() }}
            </div>
        @else
            <div class="kz-activities-empty-state">
                <div class="kz-activities-empty-icon"><i class="fa-solid fa-compass" aria-hidden="true"></i></div>
                <h3>No activities found</h3>
                <p>We couldn't find an activity matching your search. Try another activity name or location.</p>
                @if(!empty($search))
                    <a href="{{ route('activity.index') }}" class="kz-activity-search-button">View All Activities</a>
                @endif
            </div>
        @endif

    </div>
</section>

<style>
    :root {
        --kz-deep-teal: #0c514d;
        --kz-primary-teal: #126e68;
        --kz-turquoise: #238d83;
        --kz-mint: #eff8f6;
        --kz-mint-soft: #f7faf9;
        --kz-gold: #d6b36a;
        --kz-gold-hover: #bd9852;
        --kz-ink: #193b38;
        --kz-muted: #647b78;
    }

    .kz-activities-hero {
        position: relative;
        isolation: isolate;
        min-height: 270px;
        display: flex;
        align-items: center;
        overflow: hidden;
        background-color: var(--kz-deep-teal);
        background-position: center;
        background-size: cover;
    }

    .kz-activities-hero::before {
        content: "";
        position: absolute;
        inset: 0;
        z-index: -1;
        background: linear-gradient(115deg, rgba(8, 61, 57, .94), rgba(18, 110, 104, .82) 62%, rgba(35, 141, 131, .72));
    }

    .kz-activities-hero-content {
        position: relative;
        z-index: 1;
        padding-top: 46px;
        padding-bottom: 46px;
    }

    .kz-activities-eyebrow,
    .kz-activities-section-label,
    .kz-activity-search-kicker {
        display: inline-block;
        color: var(--kz-gold);
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1.7px;
        line-height: 1.5;
        text-transform: uppercase;
    }

    .kz-activities-hero .breadcumb-title {
        color: #fff !important;
        margin: 8px 0 12px;
        font-size: clamp(32px, 4vw, 48px);
        font-weight: 800;
    }

    .kz-activities-breadcrumb,
    .kz-activities-breadcrumb li,
    .kz-activities-breadcrumb a {
        color: rgba(255, 255, 255, .88) !important;
    }

    .kz-activities-breadcrumb a:hover {
        color: var(--kz-gold) !important;
    }

    .kz-activities-section {
        padding: 58px 0 72px;
        background: var(--kz-mint-soft);
    }

    .kz-activity-search-panel {
        display: grid;
        grid-template-columns: minmax(220px, .8fr) minmax(0, 1.6fr);
        align-items: center;
        gap: 28px;
        padding: 26px 30px;
        margin-bottom: 48px;
        background: #fff;
        border: 1px solid rgba(18, 110, 104, .13);
        border-radius: 18px;
        box-shadow: 0 12px 34px rgba(12, 81, 77, .07);
    }

    .kz-activity-search-heading h2 {
        margin: 5px 0 4px;
        color: var(--kz-ink);
        font-size: 23px;
        font-weight: 800;
    }

    .kz-activity-search-heading p {
        margin: 0;
        color: var(--kz-muted);
        font-size: 13px;
    }

    .kz-activity-search-form {
        display: flex;
        align-items: stretch;
        gap: 10px;
        min-width: 0;
    }

    .kz-activity-search-input-wrap {
        display: flex;
        align-items: center;
        flex: 1 1 auto;
        min-width: 0;
        min-height: 54px;
        gap: 12px;
        padding: 0 17px;
        background: #f6faf9;
        border: 1px solid #dcebe8;
        border-radius: 11px;
        color: var(--kz-primary-teal);
    }

    .kz-activity-search-input-wrap:focus-within {
        border-color: var(--kz-turquoise);
        box-shadow: 0 0 0 3px rgba(35, 141, 131, .10);
    }

    .kz-activity-search-input-wrap input {
        width: 100%;
        min-width: 0;
        height: 52px;
        padding: 0;
        color: var(--kz-ink);
        background: transparent !important;
        border: 0 !important;
        outline: 0 !important;
        box-shadow: none !important;
        font-size: 14px;
    }

    .kz-activity-search-input-wrap input::placeholder {
        color: #899d99;
    }

    .kz-activity-search-button,
    .kz-activity-detail-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        min-height: 52px;
        padding: 0 23px;
        color: #fff !important;
        background: var(--kz-primary-teal);
        border: 1px solid var(--kz-primary-teal);
        border-radius: 11px;
        font-size: 13px;
        font-weight: 800;
        text-decoration: none !important;
        white-space: nowrap;
        transition: background .2s ease, border-color .2s ease, transform .2s ease;
    }

    .kz-activity-search-button:hover,
    .kz-activity-detail-button:hover {
        color: #fff !important;
        background: var(--kz-deep-teal);
        border-color: var(--kz-deep-teal);
        transform: translateY(-1px);
    }

    .kz-activity-clear-search {
        display: inline-flex;
        align-items: center;
        padding: 0 7px;
        color: var(--kz-primary-teal);
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
    }

    .kz-activity-clear-search:hover {
        color: var(--kz-deep-teal);
        text-decoration: underline;
    }

    .kz-activities-results-row {
        display: flex;
        align-items: end;
        justify-content: space-between;
        gap: 18px;
        margin-bottom: 22px;
    }

    .kz-activities-section-title {
        margin: 5px 0 0;
        color: var(--kz-ink);
        font-size: clamp(23px, 2.5vw, 30px);
        font-weight: 800;
    }

    .kz-activities-result-count {
        padding-bottom: 4px;
        color: var(--kz-muted);
        font-size: 13px;
        white-space: nowrap;
    }

    .kz-activities-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 26px;
        width: 100%;
    }

    .kz-activity-card {
        display: flex;
        min-width: 0;
        flex-direction: column;
        overflow: hidden;
        background: #fff;
        border: 1px solid #dcebe8;
        border-radius: 15px;
        box-shadow: 0 7px 22px rgba(12, 81, 77, .055);
        transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
    }

    .kz-activity-card:hover {
        transform: translateY(-5px);
        border-color: rgba(35, 141, 131, .42);
        box-shadow: 0 16px 34px rgba(12, 81, 77, .13);
    }

    .kz-activity-image-link {
        position: relative;
        display: block;
        height: 245px;
        overflow: hidden;
        background: #e4efec;
    }

    .kz-activity-image {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .5s ease;
    }

    .kz-activity-card:hover .kz-activity-image {
        transform: scale(1.045);
    }

    .kz-activity-image-tag {
        position: absolute;
        left: 14px;
        bottom: 14px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 11px;
        color: #fff;
        background: rgba(12, 81, 77, .91);
        border: 1px solid rgba(255, 255, 255, .2);
        border-radius: 30px;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: .2px;
    }

    .kz-activity-card-content {
        display: flex;
        flex: 1 1 auto;
        flex-direction: column;
        padding: 19px 20px 18px;
    }

    .kz-activity-card-title {
        margin: 0 0 10px;
        font-size: 17px;
        font-weight: 800;
        line-height: 1.4;
    }

    .kz-activity-card-title a {
        color: var(--kz-ink) !important;
        text-decoration: none !important;
    }

    .kz-activity-card-title a:hover {
        color: var(--kz-primary-teal) !important;
    }

    .kz-activity-rating {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 15px;
    }

    .kz-activity-stars {
        color: transparent;
        background: linear-gradient(90deg, #e69b3e var(--kz-rating-width), #d7e2df var(--kz-rating-width));
        -webkit-background-clip: text;
        background-clip: text;
        font-size: 15px;
        letter-spacing: 1px;
    }

    .kz-activity-rating-text {
        color: var(--kz-muted);
        font-size: 12px;
    }

    .kz-activity-price {
        display: flex;
        align-items: baseline;
        gap: 4px;
        margin: 0 0 18px;
    }

    .kz-activity-price-value {
        color: var(--kz-ink);
        font-size: 23px;
        font-weight: 800;
        line-height: 1.2;
    }

    .kz-activity-price-unit {
        color: var(--kz-muted);
        font-size: 12px;
    }

    .kz-activity-card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        margin-top: auto;
        padding-top: 14px;
        border-top: 1px solid #e8f0ee;
    }

    .kz-activity-duration {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        color: var(--kz-muted);
        font-size: 12px;
        font-weight: 600;
    }

    .kz-activity-duration i {
        color: var(--kz-turquoise);
    }

    .kz-activity-detail-button {
        min-height: 40px;
        padding: 0 15px;
        border-radius: 30px;
        font-size: 10px;
        letter-spacing: .35px;
        text-transform: uppercase;
    }

    .kz-activities-pagination {
        display: flex;
        justify-content: center;
        margin-top: 42px;
    }

    .kz-activities-pagination nav {
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .kz-activities-pagination nav > div:first-child {
        color: var(--kz-muted);
        font-size: 13px;
    }

    .kz-activities-pagination a,
    .kz-activities-pagination span[aria-current="page"] span {
        color: var(--kz-primary-teal) !important;
        border-color: #dcebe8 !important;
    }

    .kz-activities-pagination a:hover,
    .kz-activities-pagination span[aria-current="page"] span {
        color: #fff !important;
        background: var(--kz-primary-teal) !important;
        border-color: var(--kz-primary-teal) !important;
    }

    .kz-activities-empty-state {
        padding: 58px 24px;
        text-align: center;
        background: #fff;
        border: 1px solid #dcebe8;
        border-radius: 16px;
        box-shadow: 0 7px 22px rgba(12, 81, 77, .05);
    }

    .kz-activities-empty-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 62px;
        height: 62px;
        margin-bottom: 14px;
        color: var(--kz-primary-teal);
        background: var(--kz-mint);
        border-radius: 50%;
        font-size: 25px;
    }

    .kz-activities-empty-state h3 {
        margin-bottom: 8px;
        color: var(--kz-ink);
        font-size: 22px;
        font-weight: 800;
    }

    .kz-activities-empty-state p {
        max-width: 520px;
        margin: 0 auto 18px;
        color: var(--kz-muted);
        font-size: 14px;
    }

    @media (max-width: 991.98px) {
        .kz-activities-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .kz-activity-search-panel {
            grid-template-columns: 1fr;
            gap: 18px;
            padding: 23px;
            margin-bottom: 38px;
        }

        .kz-activity-search-heading p {
            max-width: 520px;
        }
    }

    @media (max-width: 575.98px) {
        .kz-activities-hero {
            min-height: 220px;
        }

        .kz-activities-hero-content {
            padding-top: 34px;
            padding-bottom: 34px;
        }

        .kz-activities-section {
            padding: 35px 0 48px;
        }

        .kz-activity-search-panel {
            padding: 19px 16px;
            margin-bottom: 32px;
            border-radius: 14px;
        }

        .kz-activity-search-form {
            flex-wrap: wrap;
        }

        .kz-activity-search-input-wrap {
            flex-basis: 100%;
        }

        .kz-activity-search-button {
            flex: 1 1 auto;
        }

        .kz-activity-clear-search {
            justify-content: center;
            min-width: 54px;
        }

        .kz-activities-results-row {
            align-items: flex-start;
            flex-direction: column;
            gap: 5px;
        }

        .kz-activities-grid {
            grid-template-columns: 1fr;
            gap: 19px;
        }

        .kz-activity-image-link {
            height: 230px;
        }

        .kz-activity-card-content {
            padding: 17px;
        }

        .kz-activity-price-value {
            font-size: 21px;
        }
    }
</style>

@endsection

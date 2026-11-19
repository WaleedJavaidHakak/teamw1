@extends('frontend.layouts.app')

@section('page_title', 'Activities & Experiences')

@section('page_meta')
    {!! generateMetaTagsSimple('Activities', $setting) !!}
@endsection

@section('content')
@php
    $activitySearch = $search ?? request('search', '');
@endphp

<main class="kz-experiences" id="kzExperiences">
    <section class="kz-experience-hero" style="--kz-hero-image: url('{{ getImageByType(request()->segment(1), $setting) }}');">
        <div class="container kz-experience-hero-inner">
            <nav class="kz-experience-breadcrumb" aria-label="Breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                <span aria-current="page">Experiences</span>
            </nav>

            <div class="kz-experience-hero-copy">
                <span class="kz-experience-eyebrow"><span></span> The Kashmir collection</span>
                <h1>Find your kind<br>of <em>adventure.</em></h1>
                <p>From quiet moments in the mountains to days full of discovery, find an experience that feels like yours.</p>
                <div class="kz-experience-hero-actions">
                    <a class="kz-experience-button kz-experience-button-gold" href="#experience-list">Explore experiences <i class="fa-solid fa-arrow-down" aria-hidden="true"></i></a>
                    <span class="kz-experience-hero-note"><i class="fa-regular fa-compass" aria-hidden="true"></i> Made for memorable days</span>
                </div>
            </div>

            <div class="kz-experience-hero-stamp" aria-hidden="true">
                <span>DISCOVER</span><strong>01</strong><span>YOUR KASHMIR</span>
            </div>
        </div>
    </section>

    <section class="kz-experience-main" id="experience-list">
        <div class="container">
            <div class="kz-experience-search-panel">
                <div class="kz-experience-search-copy">
                    <span class="kz-experience-kicker">A little inspiration</span>
                    <h2>What would you love to do?</h2>
                    <p>Search by activity or place to find your next favourite moment.</p>
                </div>
                <form class="kz-experience-search" method="GET" action="{{ route('activity.index') }}" role="search">
                    <label class="kz-experience-search-field">
                        <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                        <span class="visually-hidden">Search activities</span>
                        <input type="search" name="search" value="{{ $activitySearch }}" placeholder="Try ‘Gulmarg’ or ‘skiing’" aria-label="Search activities by name or location">
                    </label>
                    <button class="kz-experience-button kz-experience-button-teal" type="submit">Find an experience <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></button>
                    @if(!empty($activitySearch))
                        <a class="kz-experience-clear" href="{{ route('activity.index') }}">Clear</a>
                    @endif
                </form>
            </div>

            <div class="kz-experience-list-heading">
                <div>
                    <span class="kz-experience-kicker">Love Link Tour &amp; Travels</span>
                    <h2>{{ !empty($activitySearch) ? 'Your search results' : 'Experiences to remember' }}</h2>
                </div>
                <span class="kz-experience-count">Showing {{ $activities->firstItem() ?? 0 }}–{{ $activities->lastItem() ?? 0 }} of {{ $activities->total() }} experiences</span>
            </div>

            @if($activities->count() > 0)
                <div class="kz-experience-grid">
                    @foreach($activities as $activity)
                        @php
                            $activityRating = is_numeric($activity->rating) ? (float) $activity->rating : 4.8;
                            $activityRating = max(0, min(5, $activityRating));
                            $activityUrl = route('activity.details', $activity->slug);
                        @endphp
                        <article class="kz-experience-card" style="--kz-card-order: {{ $loop->index }}">
                            <a class="kz-experience-card-image" href="{{ $activityUrl }}" aria-label="View {{ $activity->title }}">
                                <img src="{{ asset('storage/' . $activity->image) }}" alt="{{ $activity->title }}" loading="lazy">
                                <span class="kz-experience-image-shade"></span>
                                <span class="kz-experience-image-label"><i class="fa-solid fa-location-dot" aria-hidden="true"></i> Kashmir, your way</span>
                                <span class="kz-experience-image-arrow" aria-hidden="true"><i class="fa-solid fa-arrow-up-right-from-square"></i></span>
                            </a>
                            <div class="kz-experience-card-body">
                                <div class="kz-experience-rating" aria-label="Rated {{ number_format($activityRating, 1) }} out of 5">
                                    <span class="kz-experience-stars" style="--kz-rating-width: {{ ($activityRating / 5) * 100 }}%;" aria-hidden="true">★★★★★</span>
                                    <span>{{ number_format($activityRating, 1) }} <span class="kz-experience-rating-label">guest rating</span></span>
                                </div>
                                <h3><a href="{{ $activityUrl }}">{{ $activity->title }}</a></h3>
                                <div class="kz-experience-card-meta">
                                    <span><i class="fa-regular fa-clock" aria-hidden="true"></i> {{ $activity->days }} {{ (int) $activity->days === 1 ? 'day' : 'days' }}</span>
                                    <span class="kz-experience-price"><strong>{{ $activity->formatted_price }}</strong><small> / person</small></span>
                                </div>
                                <a class="kz-experience-card-link" href="{{ $activityUrl }}">Discover this experience <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="kz-experience-pagination">{{ $activities->appends(request()->query())->links() }}</div>
            @else
                <div class="kz-experience-empty">
                    <span class="kz-experience-empty-icon"><i class="fa-regular fa-compass" aria-hidden="true"></i></span>
                    <span class="kz-experience-kicker">Keep exploring</span>
                    <h3>No experiences found just yet</h3>
                    <p>Try a different activity or location. Kashmir always has another story to tell.</p>
                    @if(!empty($activitySearch))
                        <a class="kz-experience-button kz-experience-button-teal" href="{{ route('activity.index') }}">Explore all experiences <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                    @endif
                </div>
            @endif

            <section class="kz-experience-trust" aria-label="Planning your experience">
                <div class="kz-experience-trust-intro">
                    <span class="kz-experience-kicker">A better way to explore</span>
                    <h2>Little details.<br><em>Big memories.</em></h2>
                </div>
                <div class="kz-experience-trust-item">
                    <span class="kz-experience-trust-icon"><i class="fa-regular fa-map" aria-hidden="true"></i></span>
                    <div><h3>Discover more</h3><p>Explore experiences across Kashmir and find something new at every turn.</p></div>
                </div>
                <div class="kz-experience-trust-item">
                    <span class="kz-experience-trust-icon"><i class="fa-regular fa-compass" aria-hidden="true"></i></span>
                    <div><h3>Choose your pace</h3><p>Compare the details and choose an experience that fits your kind of trip.</p></div>
                </div>
                <div class="kz-experience-trust-item">
                    <span class="kz-experience-trust-icon"><i class="fa-regular fa-heart" aria-hidden="true"></i></span>
                    <div><h3>Make it personal</h3><p>Have a question? Get in touch to talk through your travel plans.</p></div>
                </div>
            </section>
        </div>
    </section>
</main>

<style>
    /* Page-level design tokens: adjust these values to retheme the experience. */
    .kz-experiences {
        --kz-forest: #123f39;
        --kz-teal: #17675e;
        --kz-teal-bright: #278578;
        --kz-gold: #d7b574;
        --kz-paper: #fbfaf6;
        --kz-ink: #1d312d;
        --kz-muted: #74817b;
        --kz-line: #e8e8df;
        color: var(--kz-ink);
        font-family: inherit;
    }
    .kz-experience-hero {
        position: relative;
        isolation: isolate;
        display: flex;
        min-height: 480px;
        align-items: center;
        overflow: hidden;
        color: #fff;
        background: var(--kz-forest);
    }
    .kz-experience-hero::before,
    .kz-experience-hero::after { position: absolute; inset: 0; content: ""; pointer-events: none; }
    .kz-experience-hero::before {
        z-index: -2;
        background-image: linear-gradient(90deg, rgba(10, 36, 32, .91) 0%, rgba(12, 49, 43, .76) 47%, rgba(12, 49, 43, .2) 100%), var(--kz-hero-image);
        background-position: center;
        background-size: cover;
        animation: kz-experience-hero-drift 18s ease-in-out infinite alternate;
    }
    .kz-experience-hero::after {
        z-index: -1;
        background: radial-gradient(ellipse at 70% 20%, rgba(215, 181, 116, .14), transparent 34%);
    }
    .kz-experience-hero-inner { position: relative; padding-top: 42px; padding-bottom: 56px; }
    .kz-experience-breadcrumb { display: flex; align-items: center; gap: 11px; margin-bottom: 40px; color: rgba(255,255,255,.72); font-size: 12px; }
    .kz-experience-breadcrumb a { color: #fff; text-decoration: none; }
    .kz-experience-breadcrumb i { color: var(--kz-gold); font-size: 9px; }
    .kz-experience-hero-copy { max-width: 650px; animation: kz-experience-rise .7s both; }
    .kz-experience-eyebrow,.kz-experience-kicker { color: var(--kz-teal); font-size: 10px; font-weight: 800; letter-spacing: .17em; line-height: 1.5; text-transform: uppercase; }
    .kz-experience-eyebrow { display: inline-flex; align-items: center; gap: 10px; color: #eed69e; }
    .kz-experience-eyebrow span { width: 24px; height: 1px; background: currentColor; }
    .kz-experience-hero h1 { margin: 14px 0 15px; color: #fff; font-family: Georgia, 'Times New Roman', serif; font-size: clamp(44px, 7vw, 76px); font-weight: 500; letter-spacing: -.045em; line-height: .99; }
    .kz-experience-hero h1 em,.kz-experience-trust-intro h2 em { color: var(--kz-gold); font-weight: 400; }
    .kz-experience-hero-copy > p { max-width: 460px; margin: 0; color: rgba(255,255,255,.8); font-size: 15px; line-height: 1.8; }
    .kz-experience-hero-actions { display: flex; align-items: center; flex-wrap: wrap; gap: 22px; margin-top: 27px; }
    .kz-experience-button { display: inline-flex; min-height: 48px; align-items: center; justify-content: center; gap: 12px; padding: 0 19px; border: 1px solid transparent; border-radius: 4px; font-size: 12px; font-weight: 750; text-decoration: none; transition: transform .2s ease, box-shadow .2s ease, background .2s ease; }
    .kz-experience-button:hover { transform: translateY(-2px); }
    .kz-experience-button-gold { color: #183b35; background: var(--kz-gold); }
    .kz-experience-button-gold:hover { color: #183b35; box-shadow: 0 10px 24px rgba(0,0,0,.2); }
    .kz-experience-button-teal { color: #fff; background: var(--kz-teal); }
    .kz-experience-button-teal:hover { color: #fff; background: var(--kz-forest); }
    .kz-experience-hero-note { display: inline-flex; align-items: center; gap: 8px; color: rgba(255,255,255,.76); font-size: 12px; }
    .kz-experience-hero-note i { color: var(--kz-gold); }
    .kz-experience-hero-stamp { position: absolute; right: 7%; bottom: 56px; display: flex; width: 112px; height: 112px; align-items: center; justify-content: center; flex-direction: column; border: 1px solid rgba(255,255,255,.43); border-radius: 50%; color: #fff; transform: rotate(9deg); }
    .kz-experience-hero-stamp strong { color: var(--kz-gold); font-family: Georgia,serif; font-size: 35px; font-weight: 400; line-height: 1.05; }
    .kz-experience-hero-stamp span { font-size: 7px; letter-spacing: .18em; }
    .kz-experience-main { padding: 0 0 76px; background: var(--kz-paper); }
    .kz-experience-search-panel { position: relative; display: grid; grid-template-columns: minmax(210px,.8fr) minmax(0,1.3fr); align-items: center; gap: 28px; padding: 25px 28px; margin: -35px 0 56px; background: #fff; border: 1px solid rgba(29,49,45,.07); box-shadow: 0 18px 48px rgba(29,49,45,.1); z-index: 2; }
    .kz-experience-search-copy h2 { margin: 5px 0 4px; color: var(--kz-ink); font-family: Georgia,serif; font-size: 24px; font-weight: 500; }
    .kz-experience-search-copy p { margin: 0; color: var(--kz-muted); font-size: 12px; }
    .kz-experience-search { display: flex; align-items: center; gap: 9px; min-width: 0; }
    .kz-experience-search-field { display: flex; min-width: 0; min-height: 48px; flex: 1; align-items: center; gap: 11px; padding: 0 14px; border: 1px solid var(--kz-line); color: var(--kz-teal); background: #fcfcfa; }
    .kz-experience-search-field:focus-within { border-color: var(--kz-teal-bright); box-shadow: 0 0 0 3px rgba(39,133,120,.1); }
    .kz-experience-search-field input { width: 100%; min-width: 0; padding: 0; border: 0; outline: 0; color: var(--kz-ink); background: transparent !important; box-shadow: none !important; font-size: 13px; }
    .kz-experience-search-field input::placeholder { color: #9aa39d; }
    .kz-experience-clear { padding: 8px; color: var(--kz-teal); font-size: 12px; text-decoration: none; }
    .kz-experience-list-heading { display: flex; align-items: end; justify-content: space-between; gap: 20px; margin-bottom: 24px; }
    .kz-experience-list-heading h2 { margin: 6px 0 0; color: var(--kz-ink); font-family: Georgia,serif; font-size: clamp(27px,3vw,38px); font-weight: 500; letter-spacing: -.025em; }
    .kz-experience-count { padding-bottom: 5px; color: var(--kz-muted); font-size: 11px; }
    .kz-experience-grid { display: grid; grid-template-columns: repeat(auto-fit,minmax(min(100%,275px),1fr)); gap: 23px; }
    .kz-experience-card { min-width: 0; overflow: hidden; background: #fff; border: 1px solid rgba(29,49,45,.08); box-shadow: 0 7px 22px rgba(29,49,45,.045); animation: kz-experience-rise .55s both; animation-delay: calc(min(var(--kz-card-order), 7) * 55ms); transition: transform .28s ease, box-shadow .28s ease, border-color .28s ease; }
    .kz-experience-card:hover { transform: translateY(-6px); border-color: rgba(39,133,120,.28); box-shadow: 0 18px 38px rgba(29,49,45,.12); }
    .kz-experience-card-image { position: relative; display: block; height: 255px; overflow: hidden; background: #e2e8e3; }
    .kz-experience-card-image > img { display: block; width: 100%; height: 100%; object-fit: cover; transition: transform .65s cubic-bezier(.2,.7,.2,1); }
    .kz-experience-card:hover .kz-experience-card-image > img { transform: scale(1.055); }
    .kz-experience-image-shade { position: absolute; inset: 35% 0 0; background: linear-gradient(transparent,rgba(13,36,32,.48)); }
    .kz-experience-image-label { position: absolute; bottom: 15px; left: 16px; display: inline-flex; align-items: center; gap: 7px; color: #fff; font-size: 10px; font-weight: 650; letter-spacing: .035em; }
    .kz-experience-image-label i { color: #f0d99f; }
    .kz-experience-image-arrow { position: absolute; top: 14px; right: 14px; display: grid; width: 34px; height: 34px; place-items: center; color: var(--kz-forest); background: rgba(255,255,255,.92); border-radius: 50%; font-size: 12px; transition: transform .2s ease, background .2s ease; }
    .kz-experience-card:hover .kz-experience-image-arrow { transform: rotate(45deg); background: var(--kz-gold); }
    .kz-experience-card-body { padding: 18px 19px 16px; }
    .kz-experience-rating { display: flex; align-items: center; gap: 8px; color: #64736c; font-size: 10px; }
    .kz-experience-stars { color: transparent; background: linear-gradient(90deg,#c9943b var(--kz-rating-width),#e2e5df var(--kz-rating-width)); -webkit-background-clip: text; background-clip: text; font-size: 14px; letter-spacing: 1px; }
    .kz-experience-rating-label { color: #929b95; }
    .kz-experience-card h3 { margin: 8px 0 15px; color: var(--kz-ink); font-family: Georgia,serif; font-size: 22px; font-weight: 500; line-height: 1.25; }
    .kz-experience-card h3 a { color: inherit; text-decoration: none; }
    .kz-experience-card h3 a:hover { color: var(--kz-teal); }
    .kz-experience-card-meta { display: flex; align-items: center; justify-content: space-between; gap: 12px; padding-bottom: 15px; border-bottom: 1px solid var(--kz-line); color: var(--kz-muted); font-size: 11px; }
    .kz-experience-card-meta > span:first-child { display: inline-flex; align-items: center; gap: 7px; }
    .kz-experience-card-meta > span:first-child i { color: var(--kz-teal); }
    .kz-experience-price strong { color: var(--kz-ink); font-size: 17px; }
    .kz-experience-price small { color: var(--kz-muted); font-size: 10px; }
    .kz-experience-card-link { display: flex; align-items: center; justify-content: space-between; gap: 8px; padding-top: 14px; color: var(--kz-teal); font-size: 11px; font-weight: 750; text-decoration: none; }
    .kz-experience-card-link i { transition: transform .2s ease; }
    .kz-experience-card-link:hover { color: var(--kz-forest); }
    .kz-experience-card-link:hover i { transform: translateX(4px); }
    .kz-experience-pagination { display: flex; justify-content: center; margin-top: 38px; }
    .kz-experience-pagination nav { width: 100%; display: flex; justify-content: center; }
    .kz-experience-pagination a,.kz-experience-pagination span[aria-current="page"] span { color: var(--kz-teal) !important; border-color: var(--kz-line) !important; }
    .kz-experience-pagination a:hover,.kz-experience-pagination span[aria-current="page"] span { color: #fff !important; background: var(--kz-teal) !important; border-color: var(--kz-teal) !important; }
    .kz-experience-empty { padding: 58px 24px; text-align: center; background: #fff; border: 1px solid var(--kz-line); }
    .kz-experience-empty-icon { display: grid; width: 58px; height: 58px; place-items: center; margin: 0 auto 15px; color: var(--kz-teal); background: #eef4ef; border-radius: 50%; font-size: 23px; }
    .kz-experience-empty h3 { margin: 7px 0; font-family: Georgia,serif; font-size: 27px; font-weight: 500; }
    .kz-experience-empty p { max-width: 420px; margin: 0 auto 18px; color: var(--kz-muted); font-size: 13px; }
    .kz-experience-trust { display: grid; grid-template-columns: 1.1fr repeat(3,1fr); gap: 24px; align-items: center; margin-top: 74px; padding: 33px 30px; color: #fff; background: var(--kz-forest); }
    .kz-experience-trust-intro h2 { margin: 7px 0 0; color: #fff; font-family: Georgia,serif; font-size: 29px; font-weight: 500; line-height: 1.08; }
    .kz-experience-trust-item { display: flex; align-items: flex-start; gap: 12px; }
    .kz-experience-trust-icon { display: grid; width: 36px; height: 36px; flex: 0 0 36px; place-items: center; color: var(--kz-gold); border: 1px solid rgba(215,181,116,.38); border-radius: 50%; font-size: 13px; }
    .kz-experience-trust-item h3 { margin: 0 0 5px; color: #fff; font-size: 12px; font-weight: 750; }
    .kz-experience-trust-item p { margin: 0; color: rgba(255,255,255,.68); font-size: 10px; line-height: 1.65; }
    @keyframes kz-experience-rise { from { opacity: 0; transform: translateY(14px); } to { opacity: 1; transform: translateY(0); } }
    @keyframes kz-experience-hero-drift { from { transform: scale(1); } to { transform: scale(1.045); } }
    @media (max-width: 991.98px) {
        .kz-experience-hero { min-height: 420px; }
        .kz-experience-hero-stamp { right: 5%; width: 88px; height: 88px; }
        .kz-experience-search-panel { grid-template-columns: 1fr; gap: 15px; }
        .kz-experience-trust { grid-template-columns: repeat(2,1fr); }
    }
    @media (max-width: 575.98px) {
        .kz-experience-hero { min-height: 420px; }
        .kz-experience-hero-inner { padding-top: 27px; padding-bottom: 54px; }
        .kz-experience-breadcrumb { margin-bottom: 43px; }
        .kz-experience-hero h1 { font-size: clamp(43px,13vw,60px); }
        .kz-experience-hero-copy > p { max-width: 340px; font-size: 13px; }
        .kz-experience-hero-stamp { right: 16px; bottom: 20px; width: 62px; height: 62px; opacity: .8; }
        .kz-experience-hero-stamp strong { font-size: 22px; }
        .kz-experience-hero-stamp span { font-size: 5px; }
        .kz-experience-main { padding-bottom: 48px; }
        .kz-experience-search-panel { gap: 12px; padding: 19px 16px; margin-bottom: 38px; }
        .kz-experience-search { flex-wrap: wrap; }
        .kz-experience-search-field { flex-basis: 100%; }
        .kz-experience-search .kz-experience-button { flex: 1; }
        .kz-experience-list-heading { align-items: flex-start; flex-direction: column; gap: 7px; }
        .kz-experience-grid { gap: 16px; }
        .kz-experience-card-image { height: 235px; }
        .kz-experience-trust { grid-template-columns: 1fr; gap: 20px; margin-top: 48px; padding: 25px 20px; }
    }
    @media (prefers-reduced-motion: reduce) {
        .kz-experiences *, .kz-experiences *::before, .kz-experiences *::after { scroll-behavior: auto !important; animation-duration: .01ms !important; animation-iteration-count: 1 !important; transition-duration: .01ms !important; }
    }
</style>
@endsection

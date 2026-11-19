@extends('frontend.layouts.app')

@section('page_title', $bikePage->meta_title ?? $bikePage->title ?? 'Bike Rental in Srinagar & Kashmir')
@section('page_meta')
    @if(!empty($bikePage))
        {!! generateMetaTags($bikePage) !!}
    @else
        {!! generateMetaTagsSimple('Bike Rental in Srinagar & Kashmir', $setting) !!}
    @endif
@endsection

@section('content')
@php
    $bikesIndexRoute = Route::has('home.bikes') ? route('home.bikes') : url('/bikes');
    $cabsIndexRoute  = Route::has('home.cabs') ? route('home.cabs') : url('/cabs');
    $contactRoute    = Route::has('home.contact') ? route('home.contact') : url('/contact');
    $waNumber        = getWhatsappNumber($setting);
    $phoneNumber     = $setting->phone ?? '+91 7006338617';
@endphp


<div class="ll-bikes-page">
<style>
/* LOVE LINK BIKES PAGE — AQUATIC TEAL THEME */
.ll-bikes-page {
    --ll-bike-deep: #0c514d;
    --ll-bike-primary: #126e68;
    --ll-bike-turquoise: #238d83;
    --ll-bike-gold: #d6b36a;
    --ll-bike-gold-dark: #bd9852;
    --ll-bike-mint: #eff8f6;
    --ll-bike-text: #193b38;
    --ll-bike-muted: #647b78;
    background: var(--ll-bike-mint);
    color: var(--ll-bike-text);
}

.ll-bikes-page .kz-bikes-hero {
    position: relative;
    overflow: hidden;
    background: linear-gradient(120deg, #0c514d 0%, #126e68 52%, #238d83 100%) !important;
    color: #fff;
}
.ll-bikes-page .kz-bikes-hero::before {
    content: "";
    position: absolute;
    inset: 0;
    pointer-events: none;
    background:
      radial-gradient(circle at 88% 18%, rgba(214,179,106,.22), transparent 28%),
      radial-gradient(circle at 12% 100%, rgba(177,229,218,.16), transparent 34%);
}
.ll-bikes-page .kz-bikes-hero > .container { position: relative; z-index: 1; }
.ll-bikes-page .kz-bikes-hero .breadcrumb-item a { color: rgba(255,255,255,.76) !important; }
.ll-bikes-page .kz-bikes-hero .breadcrumb-item.active { color: #f0d89e !important; }
.ll-bikes-page .kz-bikes-hero h1 {
    color: #fff !important;
    font-family: 'Cormorant Garamond', serif;
    font-weight: 700 !important;
}
.ll-bikes-page .kz-bikes-hero p { color: rgba(255,255,255,.86) !important; }
.ll-bikes-page .kz-bikes-hero .form-control {
    min-height: 46px;
    border: 1px solid rgba(255,255,255,.28);
    background: rgba(255,255,255,.96);
    color: var(--ll-bike-text);
    box-shadow: 0 8px 24px rgba(5,45,42,.12);
}
.ll-bikes-page .ll-bike-search-btn {
    min-height: 46px;
    border: 1px solid var(--ll-bike-gold) !important;
    background: var(--ll-bike-gold) !important;
    color: var(--ll-bike-deep) !important;
    white-space: nowrap;
    transition: all .22s ease;
}
.ll-bikes-page .ll-bike-search-btn:hover {
    background: #e7c982 !important;
    border-color: #e7c982 !important;
    transform: translateY(-1px);
}
.ll-bikes-page .ll-bikes-listing { background: var(--ll-bike-mint) !important; }
.ll-bikes-page .ll-bikes-intro {
    background: rgba(255,255,255,.92) !important;
    border-color: rgba(18,110,104,.14) !important;
    box-shadow: 0 10px 28px rgba(12,81,77,.06);
}
.ll-bikes-page .kz-bike-card {
    border: 1px solid rgba(18,110,104,.14) !important;
    border-radius: 18px !important;
    box-shadow: 0 8px 24px rgba(12,81,77,.07) !important;
    transition: transform .28s ease, box-shadow .28s ease, border-color .28s ease;
}
.ll-bikes-page .kz-bike-card:hover {
    transform: translateY(-5px);
    border-color: rgba(35,141,131,.42) !important;
    box-shadow: 0 18px 38px rgba(12,81,77,.13) !important;
}
.ll-bikes-page .kz-bike-card img { transition: transform .55s ease; }
.ll-bikes-page .kz-bike-card:hover img { transform: scale(1.045); }
.ll-bikes-page .kz-bike-card h3 a { color: var(--ll-bike-deep) !important; }
.ll-bikes-page .kz-bike-card h3 a:hover { color: var(--ll-bike-primary) !important; }
.ll-bikes-page .kz-bike-card .border-bottom { border-color: rgba(18,110,104,.16) !important; }
.ll-bikes-page .text-primary { color: var(--ll-bike-primary) !important; }
.ll-bikes-page .text-warning { color: var(--ll-bike-gold-dark) !important; }
.ll-bikes-page .text-success { color: #25836d !important; }
.ll-bikes-page .ll-bike-action {
    background: linear-gradient(135deg, #126e68, #0c514d) !important;
    border: 1px solid #126e68 !important;
    border-radius: 10px;
    color: #fff !important;
    transition: all .22s ease;
}
.ll-bikes-page .ll-bike-action:hover {
    background: #238d83 !important;
    border-color: #238d83 !important;
    transform: translateY(-2px);
    box-shadow: 0 7px 18px rgba(18,110,104,.22);
}
.ll-bikes-page .ll-bike-outline-btn {
    color: var(--ll-bike-primary) !important;
    border: 1px solid var(--ll-bike-primary) !important;
    background: transparent !important;
    border-radius: 10px;
}
.ll-bikes-page .ll-bike-outline-btn:hover {
    color: #fff !important;
    background: var(--ll-bike-primary) !important;
}
.ll-bikes-page .ll-bike-text-link { color: var(--ll-bike-primary) !important; }
.ll-bikes-page .ll-bike-text-link:hover { color: var(--ll-bike-deep) !important; }
.ll-bikes-page aside > .bg-white {
    border: 1px solid rgba(18,110,104,.14) !important;
    box-shadow: 0 8px 24px rgba(12,81,77,.06) !important;
}
.ll-bikes-page aside h4,
.ll-bikes-page aside h5 { color: var(--ll-bike-deep) !important; }
.ll-bikes-page .ll-bike-empty-state {
    border: 1px solid rgba(18,110,104,.14) !important;
    box-shadow: 0 10px 28px rgba(12,81,77,.06);
}
.ll-bikes-page .ll-bike-empty-state h3 { color: var(--ll-bike-deep) !important; }
.ll-bikes-page .badge.ll-bike-type-badge {
    background: rgba(12,81,77,.94) !important;
    color: #f0d89e !important;
}
.ll-bikes-page .pagination .page-link {
    color: var(--ll-bike-primary);
    border-color: rgba(18,110,104,.16);
}
.ll-bikes-page .pagination .page-item.active .page-link {
    background: var(--ll-bike-primary);
    border-color: var(--ll-bike-primary);
    color: #fff;
}
.ll-bikes-page .pagination .page-link:hover {
    color: var(--ll-bike-deep);
    background: #e2f2ee;
}
@media (max-width: 767px) {
    .ll-bikes-page .kz-bikes-hero { padding-top: 2rem !important; padding-bottom: 2rem !important; }
    .ll-bikes-page .kz-bikes-hero form { width: 100%; }
    .ll-bikes-page .kz-bike-card { border-radius: 15px !important; }
}
@media (prefers-reduced-motion: reduce) {
    .ll-bikes-page *, .ll-bikes-page *::before, .ll-bikes-page *::after {
        transition-duration: .01ms !important;
        animation-duration: .01ms !important;
    }
}
</style>

<section class="kz-bikes-hero py-5" style="background: linear-gradient(135deg, #0c514d 0%, #126e68 70%, #238d83 100%); color: #fff;">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <nav aria-label="breadcrumb" class="mb-2">
                    <ol class="breadcrumb mb-0" style="font-size: 13px;">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item active text-warning" aria-current="page">Bike Rentals</li>
                    </ol>
                </nav>
                <h1 class="text-white fw-bold mb-2" style="font-size: clamp(26px, 3vw, 38px);">
                    {{ $bikePage->title ?? 'Bike Rental in Srinagar, Kashmir & Ladakh' }}
                </h1>
                <p class="text-white-50 mb-0" style="max-width: 720px; font-size: 15px;">
                    {{ !empty($bikePage->content) ? Str::limit(strip_tags($bikePage->content), 210) : 'Well-maintained Royal Enfield Classic 350, Himalayan 411/450, and city scooties inspected by local mechanics for Srinagar, Gulmarg, Gurez, and Leh-Ladakh rides.' }}
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <form action="{{ $bikesIndexRoute }}" method="GET" class="d-flex gap-2">
                    <input type="text" name="search" value="{{ $search ?? '' }}" class="form-control rounded-3" placeholder="Search Himalayan, Classic 350, Scooty...">
                    <button type="submit" class="btn ll-bike-search-btn fw-bold px-3 rounded-3">Search</button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="ll-bikes-listing py-5" style="background: #eff8f6;">
    <div class="container">
        @if(!empty($bikePage->content))
            <div class="bg-white rounded-4 p-4 mb-4 border" style="border-color: rgba(18, 110, 104, 0.14) !important;">
                {!! $bikePage->content !!}
            </div>
        @endif

        <div class="row g-4">
            <div class="col-lg-9">
                @if($bikes->count() > 0)
                    <div class="row g-4">
                        @foreach($bikes as $bike)
                            @php
                                $bikeDetailsUrl = route('home.cabdetails', $bike->slug);
                                $bikeWaMsg = urlencode("Hi, I want to rent {$bike->name} in {$bike->location}. Please share daily tariff and availability.");
                            @endphp
                            <div class="col-md-6">
                                <div class="kz-bike-card bg-white rounded-4 overflow-hidden h-100 d-flex flex-column shadow-sm border" style="border-color: rgba(18,110,104,0.14) !important;">
                                    <div class="position-relative" style="height: 230px; overflow: hidden; background: #0c514d;">
                                        <a href="{{ $bikeDetailsUrl }}">
                                            <img src="{{ asset('storage/' . $bike->image) }}" alt="{{ $bike->name }}" class="w-100 h-100" style="object-fit: cover;">
                                        </a>
                                        <span class="position-absolute top-0 start-0 m-3 badge rounded-pill" style="background: #0c514d; color: #f0d89e;">
                                            <i class="fa-solid fa-motorcycle me-1"></i> {{ $bike->cab_type ?? 'Bike Rental' }}
                                        </span>
                                        <span class="position-absolute top-0 end-0 m-3 badge rounded-pill bg-white text-dark">
                                            <i class="fa-solid fa-location-dot text-primary me-1"></i> {{ $bike->location ?? 'Srinagar' }}
                                        </span>
                                    </div>
                                    <div class="p-4 d-flex flex-column flex-grow-1">
                                        <h3 class="h5 fw-bold mb-2">
                                            <a href="{{ $bikeDetailsUrl }}" class="text-decoration-none" style="color: #0c514d;">{{ $bike->name }}</a>
                                        </h3>
                                        <p class="text-muted small mb-3 flex-grow-1">
                                            {{ Str::limit(strip_tags($bike->short_description), 120) }}
                                        </p>
                                        <div class="d-flex flex-wrap gap-3 small text-secondary mb-3 pb-3 border-bottom">
                                            <span><i class="fa-solid fa-helmet-safety text-warning me-1"></i> Helmets Included</span>
                                            <span><i class="fa-solid fa-wrench text-primary me-1"></i> Road-Ready Serviced</span>
                                            <span><i class="fa-solid fa-route text-success me-1"></i> Ladakh Permit Ready</span>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <a href="{{ $bikeDetailsUrl }}" class="btn flex-grow-1 fw-semibold text-white ll-bike-action">
                                                View Specs & Tariff <i class="fa-solid fa-arrow-right ms-1"></i>
                                            </a>
                                            <a href="https://wa.me/{{ $waNumber }}?text={{ $bikeWaMsg }}" target="_blank" rel="noopener" class="btn fw-semibold text-white" style="background: #25D366; border-radius: 10px;" title="Book on WhatsApp">
                                                <i class="fa-brands fa-whatsapp fs-5"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-4">
                        {{ $bikes->links() }}
                    </div>
                @else
                    <div class="ll-bike-empty-state bg-white rounded-4 p-5 text-center border">
                        <div class="mb-3 fs-1 text-warning"><i class="fa-solid fa-motorcycle"></i></div>
                        <h3 class="h4 fw-bold" style="color: #0c514d;">Custom Bike Rental Fleet Available on Request</h3>
                        <p class="text-muted mx-auto mb-4" style="max-width: 560px;">
                            Need Royal Enfield Himalayan, Classic 350, or a scooty delivered in Srinagar or Leh? Message our local bike coordinator for instant rates and bike photos.
                        </p>
                        <div class="d-flex justify-content-center flex-wrap gap-2">
                            <a href="{{ getWhatsappUrl($setting, 'Hi, I want to rent a bike (Classic 350 / Himalayan / Scooty) in Srinagar. Please share availability & daily rates.') }}" target="_blank" rel="noopener" class="btn text-white fw-semibold px-4" style="background: #25D366; border-radius: 10px;">
                                <i class="fa-brands fa-whatsapp me-1"></i> Check Availability on WhatsApp
                            </a>
                            <a href="{{ $cabsIndexRoute }}" class="btn ll-bike-outline-btn fw-semibold px-4" style="border-radius: 10px;">
                                Explore Cabs & Tempo Travellers
                            </a>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-lg-3">
                <aside class="d-flex flex-column gap-3">
                    <div class="bg-white rounded-4 p-4 border shadow-sm">
                        <div class="small fw-bold text-uppercase text-warning mb-1">Instant Booking</div>
                        <h4 class="h5 fw-bold mb-2" style="color: #0c514d;">Reserve Your Bike</h4>
                        <p class="small text-muted mb-3">Helmet, bungee cords, and toolkit included. Airport pickup or Lal Chowk garage handoff.</p>
                        <a href="{{ getWhatsappUrl($setting, 'Hi, I want to book a motorbike rental in Kashmir.') }}" target="_blank" rel="noopener" class="btn w-100 text-white fw-semibold mb-2" style="background: #25D366; border-radius: 10px;">
                            <i class="fa-brands fa-whatsapp me-1"></i> Book via WhatsApp
                        </a>
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $phoneNumber) }}" class="btn w-100 text-white fw-semibold" style="background: #0c514d; border-radius: 10px;">
                            <i class="fa-solid fa-phone me-1"></i> {{ $phoneNumber }}
                        </a>
                    </div>
                    <div class="bg-white rounded-4 p-4 border shadow-sm">
                        <h5 class="h6 fw-bold mb-2" style="color: #0c514d;">Need a Support Backup Cab?</h5>
                        <p class="small text-muted mb-3">Planning Srinagar-Leh or Gurez group ride with luggage backup SUV? Explore our heated cab fleet.</p>
                        <a href="{{ $cabsIndexRoute }}" class="btn ll-bike-outline-btn w-100 btn-sm fw-semibold">View Cabs & Fleet</a>
                        <a href="{{ $contactRoute }}" class="btn ll-bike-text-link w-100 btn-sm text-decoration-none mt-1">Request Group Quote</a>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

@include('frontend.partials.customization-banner')
</div>
@endsection


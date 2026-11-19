<section class="ll-custom-trip" aria-labelledby="ll-custom-trip-title">
    <div class="container">
        <div class="ll-custom-trip-card">
            <div class="ll-custom-trip-copy">
                <span class="ll-custom-trip-eyebrow"><i class="fa-regular fa-compass" aria-hidden="true"></i> Your trip, your way</span>
                <h2 id="ll-custom-trip-title">A journey that feels like <em>you.</em></h2>
                <p>Tell us what you have in mind. Our local team can help you shape a Kashmir trip around your dates, interests and pace.</p>
            </div>
            <div class="ll-custom-trip-actions">
                <button type="button" class="ll-custom-trip-button" data-bs-toggle="modal" data-bs-target="#globalContactModal">
                    Plan a custom trip <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                </button>
                @if(!empty($setting->whatsapp_number) || !empty($setting->phone))
                    <a class="ll-custom-trip-link" href="{{ getWhatsappUrl($setting, 'Hi, I would like help planning a custom trip to Kashmir.') }}" target="_blank" rel="noopener noreferrer">
                        <i class="fa-brands fa-whatsapp" aria-hidden="true"></i> Chat with our team
                    </a>
                @endif
            </div>
        </div>
    </div>
</section>

@once
<style>
    .ll-custom-trip { padding: 0 0 54px; background: #edf4ef; }
    .ll-custom-trip-card { position: relative; display: flex; align-items: center; justify-content: space-between; gap: 24px; overflow: hidden; padding: clamp(24px, 4vw, 42px); color: #fff; background: linear-gradient(120deg, #123f39, #17675e); border: 1px solid rgba(215,181,116,.45); border-radius: 18px; box-shadow: 0 18px 42px rgba(18,63,57,.14); }
    .ll-custom-trip-card::after { content: ""; position: absolute; width: 240px; height: 240px; right: 24%; top: -150px; border: 1px solid rgba(255,255,255,.12); border-radius: 50%; pointer-events: none; box-shadow: 0 0 0 28px rgba(255,255,255,.035), 0 0 0 58px rgba(255,255,255,.025); }
    .ll-custom-trip-copy { position: relative; z-index: 1; max-width: 600px; }
    .ll-custom-trip-eyebrow { display: inline-flex; align-items: center; gap: 8px; color: #efd69a; font-size: 10px; font-weight: 800; letter-spacing: .15em; text-transform: uppercase; }
    .ll-custom-trip-copy h2 { margin: 9px 0; color: #fff; font-family: Georgia, 'Times New Roman', serif; font-size: clamp(27px, 4vw, 40px); font-weight: 500; letter-spacing: -.03em; line-height: 1.1; }
    .ll-custom-trip-copy h2 em { color: #e2c47e; font-weight: 400; }
    .ll-custom-trip-copy p { max-width: 530px; margin: 0; color: rgba(255,255,255,.78); font-size: 13px; line-height: 1.7; }
    .ll-custom-trip-actions { position: relative; z-index: 1; display: flex; flex: 0 0 auto; align-items: flex-start; flex-direction: column; gap: 12px; }
    .ll-custom-trip-button { display: inline-flex; min-height: 46px; align-items: center; justify-content: center; gap: 12px; padding: 0 18px; border: 1px solid #d7b574; border-radius: 5px; color: #123f39; background: #d7b574; font-size: 12px; font-weight: 800; cursor: pointer; transition: transform .2s ease, background .2s ease; }
    .ll-custom-trip-button:hover { transform: translateY(-2px); background: #e7cd91; }
    .ll-custom-trip-link { display: inline-flex; align-items: center; gap: 8px; color: rgba(255,255,255,.85); font-size: 11px; font-weight: 650; text-decoration: none; }
    .ll-custom-trip-link:hover { color: #efd69a; }
    @media (max-width: 767.98px) { .ll-custom-trip { padding-bottom: 38px; } .ll-custom-trip-card { align-items: flex-start; flex-direction: column; } .ll-custom-trip-actions { width: 100%; } .ll-custom-trip-button { width: 100%; } }
    @media (prefers-reduced-motion: reduce) { .ll-custom-trip-button { transition: none; } }
</style>
@endonce

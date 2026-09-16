<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EA | Consultora de Software</title>
    <style>
        :root {
            color-scheme: light;
            --bg: #fcf8ff;
            --surface: #ffffff;
            --surface-2: #f4ebff;
            --text: #231a31;
            --muted: #655b74;
            --primary: #7b2cbf;
            --primary-dark: #4f197d;
            --accent: #7b2cbf;
            --accent-soft: #fde8d7;
            --border: #e8d9f7;
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: radial-gradient(circle at top left, #fffdf7 0%, var(--bg) 55%, #f8f1ff 100%);
            color: var(--text);
            line-height: 1.7;
        }
        a { color: inherit; text-decoration: none; }
        img { max-width: 100%; display: block; }
        .container { width: min(1180px, calc(100% - 32px)); margin: 0 auto; }
        .site-header { position: sticky; top: 0; z-index: 20; background: rgba(252, 248, 255, 0.92); backdrop-filter: blur(12px); border-bottom: 1px solid var(--border); }
        .nav { display: flex; align-items: center; justify-content: space-between; padding: 16px 0; gap: 20px; }
        .brand { display: flex; align-items: center; gap: 12px; font-weight: 700; font-size: 1.05rem; color: var(--primary-dark); }
        .brand img { width: 180px; height: auto; object-fit: contain; border-radius: 18px; border: 1px solid var(--border); display: block; }
        .nav-links { display: flex; flex-wrap: wrap; gap: 18px; color: var(--muted); font-size: 0.95rem; }
        .hero { display: grid; grid-template-columns: 1.15fr 0.85fr; gap: 32px; padding: 70px 0 56px; align-items: center; }
        .eyebrow { display: inline-block; padding: 8px 12px; border-radius: 999px; background: var(--surface-2); color: var(--primary-dark); font-size: 0.8rem; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 16px; }
        h1, h2, h3 { line-height: 1.2; margin: 0 0 12px; }
        h1 { font-size: clamp(2rem, 3.2vw, 3.1rem); color: var(--primary-dark); }
        h2 { font-size: 1.7rem; color: var(--primary-dark); }
        p { margin: 0 0 16px; color: var(--muted); }
        .hero p { font-size: 1.05rem; }
        .actions { display: flex; flex-wrap: wrap; gap: 12px; margin: 24px 0 20px; }
        .btn { display: inline-flex; align-items: center; justify-content: center; padding: 12px 18px; border-radius: 999px; font-weight: 700; transition: transform 0.2s ease, box-shadow 0.2s ease; }
        .btn:hover { transform: translateY(-2px); }
        .btn-primary { background: var(--primary); color: white; box-shadow: 0 12px 24px rgba(123, 44, 191, 0.22); }
        .btn-secondary { background: var(--primary); color: white; border: 1px solid transparent; box-shadow: 0 12px 24px rgba(123, 44, 191, 0.22); }
        .hero-list { display: grid; gap: 8px; padding: 0; margin: 0; list-style: none; color: var(--text); }
        .hero-list li { display: flex; gap: 8px; align-items: center; }
        .hero-list li::before { content: "•"; color: var(--accent); font-size: 1.2rem; }
        .hero-panel { background: linear-gradient(145deg, #f6ebff 0%, var(--accent-soft) 100%); border-radius: 28px; padding: 24px; box-shadow: none; border: 1px solid var(--border); }
        .hero-panel img { border-radius: 24px; margin-bottom: 16px; box-shadow: none; filter: saturate(1.05) contrast(1.02); }
        .badge { display: inline-block; padding: 8px 12px; border-radius: 999px; background: rgba(255,255,255,0.85); color: var(--primary-dark); font-size: 0.9rem; font-weight: 700; }
        .section { padding: 24px 0 72px; }
        .section-heading { margin-bottom: 24px; }
        .section-heading p { max-width: 720px; }
        .grid-3, .grid-4, .grid-2 { display: grid; gap: 20px; }
        .grid-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
        .grid-4 { grid-template-columns: repeat(4, minmax(0, 1fr)); }
        .grid-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .card { background: var(--surface); border: 1px solid var(--border); border-radius: 20px; padding: 24px; box-shadow: 0 10px 24px rgba(79, 25, 125, 0.06); }
        .card h3 { color: var(--primary-dark); font-size: 1.15rem; }
        .stat-card { text-align: center; }
        .stat-card .number { font-size: 1.6rem; font-weight: 700; color: var(--accent); }
        .list-check { margin: 0; padding: 0; list-style: none; display: grid; gap: 10px; }
        .list-check li { display: flex; gap: 10px; align-items: flex-start; }
        .list-check li::before { content: "✓"; color: var(--primary); font-weight: 700; margin-top: 2px; }
        .process-step { position: relative; padding-top: 10px; }
        .process-step span { display: inline-flex; width: 44px; height: 44px; align-items: center; justify-content: center; border-radius: 50%; background: var(--surface-2); color: var(--primary-dark); font-weight: 700; margin-bottom: 10px; }
        .contact-card { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; background: var(--surface); border: 1px solid var(--border); border-radius: 24px; padding: 24px; box-shadow: 0 10px 24px rgba(79, 25, 125, 0.06); }
        .contact-item { margin-bottom: 12px; }
        label { display: block; font-size: 0.95rem; font-weight: 700; margin-bottom: 6px; color: var(--primary-dark); }
        input, textarea { width: 100%; border: 1px solid var(--border); border-radius: 12px; padding: 12px 14px; margin-bottom: 12px; font: inherit; background: #fff; }
        textarea { min-height: 110px; resize: vertical; }
        .footer { padding: 24px 0 40px; text-align: center; color: var(--muted); font-size: 0.95rem; }
        .whatsapp-button {
            position: fixed;
            right: 20px;
            bottom: 20px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #25d366;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 24px rgba(37, 211, 102, 0.3);
            z-index: 1000;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            overflow: hidden;
            border: 2px solid rgba(255,255,255,0.9);
        }
        .whatsapp-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 28px rgba(37, 211, 102, 0.35);
        }
        .whatsapp-button svg {
            width: 28px;
            height: 28px;
            display: block;
        }
        @media (max-width: 900px) { .hero, .contact-card, .grid-3, .grid-4, .grid-2 { grid-template-columns: 1fr; } .hero { padding-top: 44px; } }
        @media (max-width: 640px) { .nav { flex-direction: column; align-items: flex-start; } .nav-links { gap: 12px; } .brand img { width: 140px; height: auto; } .whatsapp-button { width: 56px; height: 56px; right: 16px; bottom: 16px; } }
    </style>
</head>
<body>
    @yield('content')

    <a href="https://wa.me/2345413571?text={{ urlencode('¡Hola! Me gustaría obtener más información.') }}"
       class="whatsapp-button"
       target="_blank"
       rel="noopener noreferrer"
       aria-label="Contáctanos por WhatsApp"
       title="Contáctanos por WhatsApp">
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 11.5a9.5 9.5 0 1 1-9.5-9.5c2.6 0 5 1 6.8 2.8A9.45 9.45 0 0 1 21 11.5Z"></path>
            <path d="M15.8 13.8c-.2.5-.9.8-1.3.9-.3.1-.6.1-.9.1-1.8 0-3.5-1.1-4.1-2.7-.2-.5-.2-1.1 0-1.6.1-.2.3-.4.5-.5.1-.1.2-.2.4-.2h.3c.1 0 .2 0 .3.2l.4.8c.1.1.1.2 0 .3l-.3.4c-.1.1-.1.2 0 .3.2.2.4.4.6.6.2.2.4.4.6.6.1.1.2.1.3 0l.4-.3c.1-.1.2-.1.3 0l.8.4c.1.1.2.2.2.3Z"></path>
        </svg>
    </a>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('code') — @yield('title')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after {
            margin: 0; padding: 0; box-sizing: border-box;
        }

        :root {
            --bg:       #07070f;
            --surface:  #0e0e1a;
            --border:   rgba(255,255,255,0.07);
            --text:     #e2e8f0;
            --muted:    #64748b;
            --radius:   20px;
        }

        body {
            font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            overflow: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /* ── Background ── */
        .bg {
            position: fixed;
            inset: 0;
            z-index: 0;
            pointer-events: none;
        }

        /* Dot grid */
        .bg::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(255,255,255,0.035) 1px, transparent 1px);
            background-size: 28px 28px;
        }

        /* Ambient glow blobs */
        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(120px);
            opacity: 0.12;
            animation: float linear infinite;
        }

        .blob-1 {
            width: 700px; height: 700px;
            background: #6366f1;
            top: -250px; left: -200px;
            animation-duration: 22s;
        }

        .blob-2 {
            width: 500px; height: 500px;
            background: #8b5cf6;
            bottom: -200px; right: -150px;
            animation-duration: 28s;
            animation-direction: reverse;
        }

        .blob-3 {
            width: 350px; height: 350px;
            background: #06b6d4;
            top: 45%; left: 60%;
            animation-duration: 17s;
        }

        @keyframes float {
            0%   { transform: translate(0, 0)       rotate(0deg);   }
            33%  { transform: translate(40px, 25px)  rotate(120deg); }
            66%  { transform: translate(-25px, 45px) rotate(240deg); }
            100% { transform: translate(0, 0)       rotate(360deg); }
        }

        /* ── Card ── */
        .card {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 540px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow:
                0 0 0 1px var(--border),
                0 40px 100px rgba(0,0,0,0.6),
                0 0 80px rgba(99,102,241,0.08);
            animation: cardIn 0.75s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        @keyframes cardIn {
            from { opacity: 0; transform: translateY(48px) scale(0.95); }
            to   { opacity: 1; transform: translateY(0)    scale(1);    }
        }

        /* ── Header ── */
        .card-header {
            position: relative;
            padding: 52px 40px 44px;
            text-align: center;
            overflow: hidden;
            background: @yield('header-bg', 'linear-gradient(135deg, #1e1b4b 0%, #312e81 100%)');
        }

        /* Top shine */
        .card-header::after {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at 50% -10%, rgba(255,255,255,0.15) 0%, transparent 60%);
            pointer-events: none;
        }

        /* Subtle scanlines */
        .card-header::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: repeating-linear-gradient(
                0deg,
                transparent 0px,
                transparent 3px,
                rgba(0,0,0,0.06) 3px,
                rgba(0,0,0,0.06) 4px
            );
            pointer-events: none;
        }

        /* Noise texture overlay */
        .header-noise {
            position: absolute;
            inset: 0;
            opacity: 0.4;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.08'/%3E%3C/svg%3E");
            background-size: 200px 200px;
            pointer-events: none;
        }

        /* Floating particles in header */
        .particles {
            position: absolute;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            width: 3px;
            height: 3px;
            background: rgba(255,255,255,0.4);
            border-radius: 50%;
            animation: rise linear infinite;
        }

        .particle:nth-child(1)  { left: 15%; animation-duration: 6s;  animation-delay: 0s;    }
        .particle:nth-child(2)  { left: 30%; animation-duration: 8s;  animation-delay: 1.5s;  }
        .particle:nth-child(3)  { left: 50%; animation-duration: 7s;  animation-delay: 0.8s;  }
        .particle:nth-child(4)  { left: 65%; animation-duration: 9s;  animation-delay: 2.2s;  }
        .particle:nth-child(5)  { left: 80%; animation-duration: 5.5s; animation-delay: 0.4s; }
        .particle:nth-child(6)  { left: 42%; animation-duration: 7.5s; animation-delay: 3s;   }

        @keyframes rise {
            0%   { transform: translateY(120px) scale(0); opacity: 0;   }
            10%  { opacity: 1; }
            90%  { opacity: 0.6; }
            100% { transform: translateY(-20px) scale(1.5); opacity: 0; }
        }

        /* ── Icon ── */
        .icon-wrap {
            position: relative;
            z-index: 2;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 76px;
            height: 76px;
            border-radius: 22px;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255,255,255,0.18);
            font-size: 38px;
            margin-bottom: 22px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.25), inset 0 1px 0 rgba(255,255,255,0.2);
            animation: iconIn 0.6s 0.3s cubic-bezier(0.34, 1.56, 0.64, 1) both;
        }

        @keyframes iconIn {
            from { opacity: 0; transform: scale(0.4) rotate(-15deg); }
            to   { opacity: 1; transform: scale(1)   rotate(0deg);   }
        }

        /* ── Error code ── */
        .error-code {
            position: relative;
            z-index: 2;
            font-size: 96px;
            font-weight: 700;
            color: #fff;
            line-height: 1;
            letter-spacing: -5px;
            text-shadow: 0 4px 24px rgba(0,0,0,0.35);
            animation: slideDown 0.55s 0.1s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-20px); }
            to   { opacity: 1; transform: translateY(0);     }
        }

        /* Glitch effect on code */
        .error-code:hover {
            animation: glitch 0.4s steps(1) both;
        }

        @keyframes glitch {
            0%   { text-shadow: 0 4px 24px rgba(0,0,0,0.35); }
            20%  { text-shadow: -3px 0 #f43f5e, 3px 0 #38bdf8; clip-path: inset(10% 0 70% 0); }
            40%  { text-shadow: 3px 0 #f43f5e, -3px 0 #38bdf8; clip-path: inset(60% 0 10% 0); }
            60%  { text-shadow: -2px 0 #a78bfa, 2px 0 #34d399; clip-path: inset(30% 0 40% 0); }
            80%  { text-shadow: 2px 0 #f59e0b, -2px 0 #6366f1; clip-path: inset(0% 0 0% 0); }
            100% { text-shadow: 0 4px 24px rgba(0,0,0,0.35); }
        }

        .error-message {
            position: relative;
            z-index: 2;
            margin-top: 10px;
            font-size: 16px;
            font-weight: 500;
            color: rgba(255,255,255,0.65);
            letter-spacing: 0.5px;
            animation: slideDown 0.55s 0.2s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        /* ── Divider ── */
        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent 0%, var(--border) 30%, var(--border) 70%, transparent 100%);
        }

        /* ── Body ── */
        .card-body {
            padding: 40px 40px 44px;
            text-align: center;
            animation: bodyIn 0.6s 0.4s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        @keyframes bodyIn {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0);    }
        }

        .description {
            font-size: 15px;
            line-height: 1.8;
            color: var(--muted);
            margin-bottom: 36px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        /* ── Buttons ── */
        .actions {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 28px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            font-family: inherit;
            text-decoration: none;
            cursor: pointer;
            border: none;
            letter-spacing: 0.3px;
            transition: transform 0.2s ease, box-shadow 0.2s ease, opacity 0.2s ease;
            position: relative;
            overflow: hidden;
        }

        /* Shimmer on hover */
        .btn::before {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 60%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.15), transparent);
            transition: left 0.4s ease;
        }

        .btn:hover::before { left: 160%; }
        .btn:hover  { transform: translateY(-2px); }
        .btn:active { transform: translateY(0) scale(0.98); }

        .btn-primary {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            color: #fff;
            box-shadow: 0 4px 16px rgba(99,102,241,0.3);
        }

        .btn-primary:hover {
            box-shadow: 0 8px 28px rgba(99,102,241,0.45);
        }

        .btn-secondary {
            background: rgba(255,255,255,0.06);
            color: var(--text);
            border: 1px solid var(--border);
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.06);
        }

        .btn-secondary:hover {
            background: rgba(255,255,255,0.1);
            border-color: rgba(255,255,255,0.14);
        }

        /* ── Footer hint ── */
        .footer-hint {
            margin-top: 28px;
            font-size: 12px;
            color: rgba(100,116,139,0.6);
            letter-spacing: 0.3px;
        }

        .footer-hint span {
            display: inline-block;
            width: 6px; height: 6px;
            border-radius: 50%;
            background: #22c55e;
            margin-right: 6px;
            vertical-align: middle;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1;   transform: scale(1);    box-shadow: 0 0 0 0 rgba(34,197,94,0.5); }
            50%       { opacity: 0.7; transform: scale(1.15); box-shadow: 0 0 0 6px rgba(34,197,94,0);  }
        }

        /* ── Responsive ── */
        @media (max-width: 480px) {
            .card-header { padding: 40px 24px 36px; }
            .card-body   { padding: 32px 24px 36px; }
            .error-code  { font-size: 72px; letter-spacing: -3px; }
            .error-message { font-size: 15px; }
            .actions { flex-direction: column; }
            .btn { width: 100%; justify-content: center; }
            .blob-1 { width: 400px; height: 400px; }
            .blob-2 { width: 300px; height: 300px; }
            .blob-3 { display: none; }
        }
    </style>
</head>
<body>

    {{-- Animated background --}}
    <div class="bg">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="blob blob-3"></div>
    </div>

    {{-- Card --}}
    <div class="card">

        {{-- Header --}}
        <div class="card-header">
            <div class="header-noise"></div>
            <div class="particles">
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
            </div>

            <div class="icon-wrap">@yield('icon', '⚠️')</div>
            <div class="error-code">@yield('code')</div>
            <div class="error-message">@yield('message')</div>
        </div>

        <div class="divider"></div>

        {{-- Body --}}
        <div class="card-body">
            <p class="description">
                @yield('description', 'An unexpected error occurred. Please try again later.')
            </p>

            <div class="actions">
                <a href="{{ url('/') }}" class="btn btn-primary">
                    ← Back to Home
                </a>
                <a href="javascript:history.back()" class="btn btn-secondary">
                    Go Back
                </a>
            </div>

            <p class="footer-hint">
                <span></span> All systems are being monitored
            </p>
        </div>

    </div>

</body>
</html>
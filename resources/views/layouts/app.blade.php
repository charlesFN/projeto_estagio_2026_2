<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">

        <style>
            :root {
                --ink: #16232E;
                --ink-soft: #3A4E5C;
                --blue: #0E86D9;
                --blue-dark: #0A63A3;
                --blue-deep: #0B3A63;
                --yellow: #FFC229;
                --yellow-dark: #E8A800;
                --paper: #FFFFFF;
                --cloud: #F2F7FB;
                --line: #DCE6ED;
                --muted: #5A6B76;
                --green: #15803D;
                --green-bg: rgba(34,197,94,.15);
                --amber: #8A6410;
                --amber-bg: rgba(255,194,41,.25);
                --red: #B91C1C;
                --red-bg: rgba(239,68,68,.14);
            }

            * { box-sizing: border-box; }
            body {
                font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
                color: var(--ink); background: var(--cloud); line-height: 1.55;
            }
            h1, h4, .modal-title { font-family: 'Baloo 2', 'Nunito', sans-serif; font-weight: 700; color: var(--ink); }
            h1 { font-size: 1.7rem; margin-bottom: .2rem; }
            :focus-visible { outline: 2px solid var(--yellow-dark); outline-offset: 2px; }

            .admin-nav { background: #fff; border-bottom: 1px solid var(--line); padding: .8rem 0; }
            .admin-nav .navbar-brand { font-family: 'Baloo 2', sans-serif; font-weight: 700; font-size: 1.25rem; color: var(--ink); }
            .admin-nav .navbar-brand span { color: var(--yellow-dark); }
            .admin-nav__label { font-weight: 700; color: var(--muted); font-size: .85rem; background: var(--cloud); padding: .3rem .75rem; border-radius: 999px; }

            .admin-main { max-width: 1140px; }

            .btn-cta { background: var(--yellow); border: 1.5px solid var(--yellow); color: var(--ink); font-weight: 700; border-radius: 10px; }
            .btn-cta:hover, .btn-cta:focus { background: var(--yellow-dark); border-color: var(--yellow-dark); color: var(--ink); }
            .btn-ghost { background: transparent; border: 1.5px solid var(--line); color: var(--ink-soft); font-weight: 700; border-radius: 10px; }
            .btn-ghost:hover, .btn-ghost:focus { background: var(--cloud); color: var(--ink); }
            .btn-link-muted { color: var(--muted); font-weight: 700; text-decoration: none; font-size: .9rem; }
            .btn-link-muted:hover { color: var(--blue); }

            .stat-card { background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 1.1rem 1.3rem; display: flex; flex-direction: column; gap: .1rem; height: 100%; }
            .stat-card__value { font-family: 'Baloo 2', sans-serif; font-size: 1.9rem; font-weight: 700; line-height: 1; }
            .stat-card__label { color: var(--muted); font-size: .82rem; font-weight: 700; }
            .stat-card--pendente .stat-card__value { color: var(--amber); }
            .stat-card--confirmado .stat-card__value { color: var(--green); }
            .stat-card--concluido .stat-card__value { color: var(--blue-dark); }

            .admin-filters .form-control, .admin-filters .form-select {
                border: 1.5px solid var(--line); border-radius: 10px; padding: .55rem .9rem;
            }
            .admin-filters .form-control:focus, .admin-filters .form-select:focus {
                border-color: var(--blue); box-shadow: 0 0 0 .2rem rgba(14,134,217,.15);
            }

            .admin-table-wrap { background: #fff; border: 1px solid var(--line); border-radius: 16px; overflow: hidden; }
            .admin-table { margin-bottom: 0; }
            .admin-table thead th {
                background: var(--cloud); font-size: .76rem; text-transform: uppercase; letter-spacing: .04em;
                color: var(--muted); font-weight: 800; border-bottom: 1px solid var(--line); padding: .8rem 1rem; white-space: nowrap;
            }
            .admin-table td { padding: .8rem 1rem; vertical-align: middle; border-bottom: 1px solid var(--line); }
            .admin-table tbody tr:last-child td { border-bottom: none; }
            .admin-table tbody tr:hover { background: var(--cloud); }

            .status-badge { display: inline-block; padding: .3rem .7rem; border-radius: 999px; font-size: .78rem; font-weight: 700; white-space: nowrap; }
            .status-pendente { background: var(--amber-bg); color: var(--amber); }
            .status-confirmado { background: var(--green-bg); color: var(--green); }
            /* .status-concluido { background: rgba(14,134,217,.14); color: var(--blue-dark); } */
            .status-cancelado { background: var(--red-bg); color: var(--red); }

            .btn-icon {
                background: #fff; border: 1px solid var(--line); width: 34px; height: 34px; border-radius: 8px;
                display: inline-flex; align-items: center; justify-content: center; color: var(--ink-soft); margin-left: .35rem;
                transition: background-color .15s ease, color .15s ease;
            }
            .btn-icon:hover { background: var(--blue); color: #fff; border-color: var(--blue); }

            .empty-state { padding: 3.5rem 1rem; text-align: center; color: var(--muted); }
            .empty-state i { font-size: 2rem; color: var(--line); display: block; margin-bottom: .75rem; }

            .modal-content { border-radius: 18px; border: none; }
            .modal-header, .modal-footer { border-color: var(--line); }

            .detail-header { display: flex; justify-content: space-between; align-items: flex-start; gap: 1rem; margin-bottom: 1.1rem; }
            .detail-header h4 { margin-bottom: .1rem; font-size: 1.2rem; }
            .detail-row { display: flex; gap: 1rem; padding: .6rem 0; border-bottom: 1px solid var(--line); }
            .detail-row:last-child { border-bottom: none; }
            .detail-label { flex: 0 0 140px; color: var(--muted); font-weight: 700; font-size: .85rem; }
            .detail-value { flex: 1; font-weight: 600; }

            .toast { border-radius: 12px; }
            #statusToast { background: var(--blue-deep); color: #fff; }
            #statusToast .btn-close { filter: invert(1) grayscale(100%) brightness(200%); }

            .loading-row td { text-align: center; padding: 2.5rem; color: var(--muted); }

            @media (max-width: 575.98px) {
                .detail-row { flex-direction: column; gap: .2rem; }
                .detail-label { flex: none; }
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        @include('layouts.navigation')

        <!-- Page Content -->
        <main class="container-fluid admin-main py-4 py-lg-5">
            {{ $slot }}
        </main>
    </body>
</html>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgendaPet — Agendamento online para o seu pet</title>
    <meta name="theme-color" content="#0E86D9">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
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
            --cloud: #E7F4FC;
            --line: #BFE0F5;
            --muted: #4C5F6E;
        }

        html { scroll-behavior: smooth; }
        [id] { scroll-margin-top: 84px; }

        @media (prefers-reduced-motion: reduce) {
            html { scroll-behavior: auto; }
            *, *::before, *::after {
            animation-duration: .01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: .01ms !important;
            }
        }

        body {
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            color: var(--ink);
            background: var(--paper);
            line-height: 1.6;
        }

        h1, h2 { font-family: 'Baloo 2', 'Nunito', sans-serif; color: var(--ink); font-weight: 700; line-height: 1.15; }
        h1 { font-size: clamp(2.1rem, 1.4rem + 2.8vw, 3.25rem); }
        h2 { font-size: clamp(1.65rem, 1.35rem + 1.2vw, 2.15rem); }
        h3 { font-family: 'Nunito', sans-serif; font-weight: 800; font-size: 1.2rem; color: var(--ink); }

        a { color: var(--blue); }
        :focus-visible { outline: 2px solid var(--yellow-dark); outline-offset: 3px; }

        .section { padding: 5.5rem 0; }
        .section--cloud { background: var(--cloud); }
        .section--paper { background: var(--paper); }
        .section--dark { background: var(--blue-deep); color: rgba(255,255,255,.85); }
        .section--dark h2 { color: #fff; }

        .section-head { max-width: 46ch; margin-bottom: 3rem; }
        .section-head p { color: var(--muted); font-size: 1.05rem; margin-top: .5rem; }
        .section--dark .section-head p, .booking-lead { color: rgba(255,255,255,.72); }

        .btn-cta {
            background: var(--yellow); border: 1.5px solid var(--yellow); color: var(--ink);
            font-weight: 700; border-radius: 999px;
        }
        .btn-cta:hover, .btn-cta:focus { background: var(--yellow-dark); border-color: var(--yellow-dark); color: var(--ink); }
        .btn-ghost {
            background: transparent; border: 1.5px solid var(--ink); color: var(--ink);
            font-weight: 700; border-radius: 999px;
        }
        .btn-ghost:hover, .btn-ghost:focus { background: var(--ink); color: #fff; }

        .navbar { background: var(--paper); border-bottom: 1px solid var(--line); padding-top: .8rem; padding-bottom: .8rem; }
        .navbar-brand { font-family: 'Baloo 2', sans-serif; font-weight: 700; font-size: 1.4rem; color: var(--ink); }
        .navbar-brand span { color: var(--yellow-dark); }
        .nav-link { font-weight: 700; color: var(--ink-soft) !important; margin: 0 .5rem; }
        .nav-link:hover { color: var(--blue) !important; }
        @media (max-width: 991.98px) {
            .navbar-collapse { background: var(--paper); margin-top: .75rem; padding: 1rem .25rem; border-top: 1px solid var(--line); }
        }

        .hero { padding: 3.5rem 0 4.5rem; overflow: hidden; }
        .hero .lead-text { max-width: 48ch; color: var(--muted); font-size: 1.15rem; margin: 1rem 0 2rem; }
        .hero-trust { margin-top: 1.75rem; font-size: .95rem; color: var(--muted); }
        .hero-trust i { color: var(--blue); margin-right: .4rem; }

        .hero-visual { position: relative; max-width: 360px; margin: 2rem auto 0; }
        .hero-illustration { width: 100%; height: auto; display: block; }
        .mini-badge {
            position: absolute; bottom: 6%; right: -4%; background: #fff; border-radius: 18px;
            padding: .8rem 1rem; box-shadow: 0 20px 40px rgba(11,58,99,.28); max-width: 190px;
        }
        .mini-badge__status {
            display: inline-flex; align-items: center; gap: .3rem; background: rgba(255,194,41,.3); color: var(--blue-dark);
            font-weight: 800; font-size: .68rem; padding: .15rem .55rem; border-radius: 999px; margin-bottom: .45rem;
            animation: confirmPop .45s ease-out .7s both;
        }
        @keyframes confirmPop { 0% { transform: scale(.6); opacity: 0; } 70% { transform: scale(1.08); opacity: 1; } 100% { transform: scale(1); } }
        .mini-badge strong { display: block; font-family: 'Baloo 2', sans-serif; font-size: 1rem; }
        .mini-badge .detail { color: var(--muted); font-size: .8rem; }
        @media (max-width: 575.98px) { .mini-badge { right: 1%; } }

        .wave-divider { display: block; line-height: 0; }
        .wave-divider svg { width: 100%; height: 50px; display: block; }

        .service-col p { color: var(--muted); max-width: 32ch; margin-bottom: 1.1rem; }
        @media (min-width: 768px) {
            .service-col + .service-col { border-left: 1px solid var(--line); }
        }
        @media (max-width: 767.98px) {
            .service-col { margin-bottom: 2.5rem; }
            .service-col:last-child { margin-bottom: 0; }
        }
        .service-icon {
            width: 68px; height: 68px; border-radius: 50%; display: flex; align-items: center; justify-content: center;
            font-size: 1.7rem; margin-bottom: 1.25rem;
        }
        .service-icon--blue { background: var(--blue); color: #fff; }
        .service-icon--yellow { background: var(--yellow); color: var(--blue-dark); }
        .service-link { color: var(--blue-dark); font-weight: 700; text-decoration: none; border-bottom: 1.5px solid transparent; padding-bottom: 2px; }
        .service-link:hover, .service-link:focus { border-bottom-color: var(--blue-dark); }

        .steps-row { display: flex; flex-wrap: wrap; gap: 2.5rem 2rem; position: relative; }
        .step { flex: 1 1 210px; }
        .step__num {
            display: inline-flex; align-items: center; justify-content: center; width: 42px; height: 42px;
            border-radius: 50%; background: var(--blue); color: #fff; font-weight: 800; margin-bottom: 1rem;
            position: relative; z-index: 1;
        }
        .step p { color: var(--muted); max-width: 26ch; }
        @media (min-width: 992px) {
            .steps-row::before { content: ''; position: absolute; top: 21px; left: 5%; right: 5%; height: 2px; background: var(--line); z-index: 0; }
        }

        .booking-card {
            background: #fff; border-radius: 28px; padding: 2.75rem; box-shadow: 0 30px 60px rgba(0,0,0,.35); color: var(--ink);
        }
        .booking-card .form-label { font-weight: 700; font-size: .9rem; margin-bottom: .4rem; }
        .booking-card .form-control, .booking-card .form-select {
            border: 1.5px solid var(--line); border-radius: 12px; padding: .65rem .9rem;
        }
        .booking-card .form-control:focus, .booking-card .form-select:focus {
            border-color: var(--yellow); box-shadow: 0 0 0 .2rem rgba(255,194,41,.3);
        }
        .success-note {
            margin-top: 1.5rem; background: rgba(255,255,255,.08); border: 1px solid rgba(255,255,255,.2);
            color: #fff; padding: 1rem 1.25rem; border-radius: 14px; text-align: center;
        }
        .success-note i { color: var(--yellow); margin-right: .4rem; }
        @media (max-width: 767.98px) { .booking-card { padding: 1.75rem; } }

        footer { background: var(--blue-deep); color: rgba(255,255,255,.7); padding: 3.5rem 0 1.5rem; }
        footer h6 { color: #fff; font-weight: 700; margin-bottom: 1rem; font-size: .95rem; }
        footer a { color: rgba(255,255,255,.7); text-decoration: none; }
        footer a:hover { color: var(--yellow); }
        footer ul { list-style: none; padding: 0; margin: 0; }
        footer li { margin-bottom: .55rem; }
        .footer-social a {
            display: inline-flex; width: 38px; height: 38px; border-radius: 50%; background: rgba(255,255,255,.1);
            align-items: center; justify-content: center; margin-right: .6rem;
        }
        .footer-social a:hover { background: var(--yellow); color: var(--ink); }
        .footer-bottom { border-top: 1px solid rgba(255,255,255,.1); margin-top: 2.5rem; padding-top: 1.5rem; font-size: .85rem; text-align: center; color: rgba(255,255,255,.5); }

        .whatsapp-float {
            position: fixed; bottom: 24px; right: 24px; width: 56px; height: 56px; border-radius: 50%;
            background: #25D366; color: #fff; display: flex; align-items: center; justify-content: center;
            font-size: 1.5rem; box-shadow: 0 10px 25px rgba(0,0,0,.25); z-index: 1000; transition: transform .15s ease;
        }
        .whatsapp-float:hover { transform: scale(1.08); color: #fff; }

        @media (max-width: 767.98px) { .section { padding: 3.5rem 0; } }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="#home">
                Agenda<span>Pet</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Abrir menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item"><a href="#home" class="nav-link">Início</a></li>
                    <li class="nav-item"><a href="#servicos" class="nav-link">Serviços</a></li>
                    <li class="nav-item"><a href="#como-funciona" class="nav-link">Como funciona</a></li>
                    <li class="nav-item"><a href="#contato" class="nav-link">Contato</a></li>
                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0"><a href="#agendamento" class="btn btn-cta btn-sm">Agendar</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="home" class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1>Agende o cuidado do seu pet em poucos minutos</h1>
                    <p class="lead-text">Consulta, vacina, banho e tosa — tudo em um só lugar, sem telefonema nem espera.</p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#agendamento" class="btn btn-cta btn-lg">Agendar agora</a>
                        <a href="#servicos" class="btn btn-ghost btn-lg">Ver serviços</a>
                    </div>
                    <p class="hero-trust"><i class="bi bi-patch-check-fill"></i>Mais de 10 anos cuidando dos pets da nossa vizinhança</p>
                </div>
                <div class="col-lg-6">
                    <div class="hero-visual">
                        <svg class="hero-illustration" viewBox="0 0 420 420" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Ilustração de um cachorro feliz usando coleira">
                            <circle cx="210" cy="225" r="180" fill="var(--yellow)"/>
                            <g fill="var(--blue)" opacity="0.55">
                                <g transform="translate(30,55) scale(0.38) rotate(-20)">
                                    <ellipse cx="50" cy="65" rx="28" ry="24"/>
                                    <ellipse cx="22" cy="30" rx="13" ry="16" transform="rotate(-15 22 30)"/>
                                    <ellipse cx="42" cy="12" rx="13" ry="16" transform="rotate(-5 42 12)"/>
                                    <ellipse cx="62" cy="12" rx="13" ry="16" transform="rotate(5 62 12)"/>
                                    <ellipse cx="82" cy="30" rx="13" ry="16" transform="rotate(15 82 30)"/>
                                </g>
                                <g transform="translate(30,330) scale(0.3) rotate(12)">
                                    <ellipse cx="50" cy="65" rx="28" ry="24"/>
                                    <ellipse cx="22" cy="30" rx="13" ry="16" transform="rotate(-15 22 30)"/>
                                    <ellipse cx="42" cy="12" rx="13" ry="16" transform="rotate(-5 42 12)"/>
                                    <ellipse cx="62" cy="12" rx="13" ry="16" transform="rotate(5 62 12)"/>
                                    <ellipse cx="82" cy="30" rx="13" ry="16" transform="rotate(15 82 30)"/>
                                </g>
                            </g>
                            <ellipse cx="122" cy="185" rx="40" ry="65" fill="var(--blue)" transform="rotate(-25 122 185)"/>
                            <ellipse cx="298" cy="185" rx="40" ry="65" fill="var(--blue)" transform="rotate(25 298 185)"/>
                            <circle cx="210" cy="215" r="98" fill="var(--blue)"/>
                            <ellipse cx="210" cy="260" rx="60" ry="46" fill="#FFFFFF"/>
                            <circle cx="178" cy="195" r="9" fill="var(--ink)"/>
                            <circle cx="242" cy="195" r="9" fill="var(--ink)"/>
                            <circle cx="181" cy="192" r="3" fill="#FFFFFF"/>
                            <circle cx="245" cy="192" r="3" fill="#FFFFFF"/>
                            <ellipse cx="210" cy="250" rx="14" ry="10" fill="var(--ink)"/>
                            <path d="M 210 260 Q 210 270 195 272" stroke="var(--ink)" stroke-width="4" fill="none" stroke-linecap="round"/>
                            <path d="M 210 260 Q 210 270 225 272" stroke="var(--ink)" stroke-width="4" fill="none" stroke-linecap="round"/>
                            <path d="M 150 278 Q 210 300 270 278 L 270 290 Q 210 312 150 290 Z" fill="var(--yellow)"/>
                            <circle cx="210" cy="322" r="13" fill="#FFFFFF" stroke="var(--blue)" stroke-width="3"/>
                            <circle cx="210" cy="322" r="5" fill="var(--blue)"/>
                        </svg>
                        <div class="mini-badge">
                            <span class="mini-badge__status"><i class="bi bi-check-circle-fill"></i>Confirmado</span>
                            <strong>Nina</strong>
                            <span class="detail">Banho e tosa · Sáb, 14h</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="wave-divider">
        <svg vewBox="0 0 1400 1400" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,40 C240,90 480,0 720,40 C960,80 1200,10 1440,40 L1440,100 L0,100 Z" fill="var(--cloud)"/>
        </svg>
    </div>

    <section id="servicos" class="section section--cloud">
        <div class="container">
            <div class="section-head">
                <h2>Nossos serviços</h2>
                <p>Escolha o cuidado que o seu pet precisa e agende no fim da página.</p>
            </div>
            <div class="row">
                <div class="col-md-4 service-col">
                    <div class="service-icon service-icon--blue"><i class="bi bi-heart-pulse"></i></div>
                    <h3>Consulta veterinária</h3>
                    <p>Avaliação clínica com veterinários experientes, do check-up de rotina a sintomas específicos</p>
                    <a href="#agendamento" class="service-link" data-service="consulta">Agendar consulta</a>
                </div>
                <div class="col-md-4 service-col">
                    <div class="service-icon service-icon--yellow"><i class="bi bi-shield-check"></i></div>
                    <h3>Vacinação</h3>
                    <p>Aplicação das vacinas do calendário oficial, com registro de doses e datas de reforço.</p>
                    <a href="#agendamento" class="service-link" data-service="vacinacao">Agendar vacina</a>
                </div>
                <div class="col-md-4 service-col">
                    <div class="service-icon service-icon--blue"><i class="bi bi-scissors"></i></div>
                    <h3>Banho e tosa</h3>
                    <p>Banho, escovação e tosa higiênica ou na tesoura, do jeito que o seu pet precisa.</p>
                    <a href="#agendamento" class="service-link" data-service="banho">Agendar banho e tosa</a>
                </div>
            </div>
        </div>
    </section>

    <section id="como-funciona" class="section section--paper">
        <div class="container">
            <div class="section-head">
                <h2>Como funciona</h2>
                <p>Do agendamento à confirmação, em quatro passos.</p>
            </div>
            <div class="steps-row">
                <div class="step">
                    <span class="step__num">1</span>
                    <h3>Escolha o serviço</h3>
                    <p>Consulta, vacina ou banho e tosa.</p>
                </div>
                <div class="step">
                    <span class="step__num">2</span>
                    <h3>Escolha a data</h3>
                    <p>Veja um horário que funciona pra você.</p>
                </div>
                <div class="step">
                    <span class="step__num">3</span>
                    <h3>Preencha seus dados</h3>
                    <p>Seu nome, e-mail e o nome do seu pet.</p>
                </div>
                <div class="step">
                    <span class="step__num">4</span>
                    <h3>Aguarde a confirmação</h3>
                    <p>Confirmamos por e-mail para garantir o horário.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="agendamento" class="section section--dark">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-7">
                    <h2>Faça seu agendamento</h2>
                    <p class="booking-lead">Preencha os dados abaixo. Nossa equipe confirma por e-mail em até um dia útil.</p>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-lg-8">
                    <form action="" id="bookingForm" class="booking-card row g-4">
                        <div class="col-md-6">
                            <label for="nome" class="form-label">Nome completo</label>
                            <input type="text" class="form-control" id="nome" required>
                            <div class="invalid-feedback">Informe seu nome.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" required>
                            <div class="invalid-feedback">Informe um e-mail válido.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="animal" class="form-label">Animal</label>
                            <input type="text" class="form-control" id="animal" placeholder="Ex: Rex, Mimi..." required>
                            <div class="invalid-feedback">Informe o nome do seu pet.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="servico" class="form-label">Tipo de serviço</label>
                            <select class="form-select" id="servico" required>
                            <option value="" selected disabled>Selecione um serviço</option>
                            <option value="consulta">Consulta veterinária</option>
                            <option value="vacinacao">Vacinação</option>
                            <option value="banho">Banho e tosa</option>
                            </select>
                            <div class="invalid-feedback">Selecione um serviço.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="data" class="form-label">Data desejada</label>
                            <input type="date" class="form-control" id="data" required>
                            <div class="invalid-feedback">Escolha uma data.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="observacoes" class="form-label">Observações <span class="fw-normal text-muted">(opcional)</span></label>
                            <input type="text" class="form-control" id="observacoes" placeholder="Alguma informação importante?">
                        </div>
                        <div class="col-12 text-center pt-2">
                            <button type="submit" class="btn btn-cta btn-lg px-5">Solicitar agendamento</button>
                        </div>
                        <div id="successMessage" class="success-note d-none" role="status">
                            <i class="bi bi-check-circle-fill"></i>Solicitação enviada! Entraremos em contato para confirmar o horário.
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer id="contato">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h6 style="font-family:'Baloo 2',sans-serif; font-size:1.3rem;">Agenda<span style="color:var(--yellow);">Pet</span></h6>
                    <p>Cuidando da saúde e do bem-estar dos pets da região há mais de 10 anos.</p>
                    <div class="footer-social mt-3">
                        <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="https://wa.me/5500000000000" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <h6>Navegação</h6>
                    <ul>
                        <li><a href="#home">Início</a></li>
                        <li><a href="#servicos">Serviços</a></li>
                        <li><a href="#como-funciona">Como funciona</a></li>
                        <li><a href="#agendamento">Agendar</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-6">
                    <h6>Serviços</h6>
                    <ul>
                        <li>Consulta veterinária</li>
                        <li>Vacinação</li>
                        <li>Banho e tosa</li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h6>Contato</h6>
                    <ul>
                        <li><i class="bi bi-geo-alt me-2"></i>Rua dos Pets, 123 – Centro</li>
                        <li><i class="bi bi-telephone me-2"></i>(00) 00000-0000</li>
                        <li><i class="bi bi-envelope me-2"></i>contato@agendapet.com.br</li>
                        <li><i class="bi bi-clock me-2"></i>Seg. a sáb., 8h às 18h</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">© 2026 AgendaPet. Todos os direitos reservados.</div>
        </div>
    </footer>

    <a href="https://wa.me/0000000000000" target="_blank" rel="noopener" class="whatsapp-float" aria-label="Falar no WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>

    <main>
        <form action="{{ route('agendar') }}" method="POST">
            @csrf

            <div>
                <label for="cliente">Nome</label>
                <input type="text" name="cliente" id="cliente">
            </div>

            <div>
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email">
            </div>

            <div>
                <label for>Animal</label>
                <input type="text" name="animal" id="animal">
            </div>

            <div>
                <label for="servico">Serviço</label>
                <select name="servico" id="servico">
                    <option value="">Escolha uma opção</option>
                    <option value="consulta">Consulta</option>
                    <option value="vacinacao">Vacinação</option>
                    <option value="banho">Banho</option>
                    <option value="tosa">Tosa</option>
                </select>
            </div>

            <div>
                <label for="data">Data</label>
                <input type="date" name="data" id="data">
            </div>

            <div>
                <button type="submit">Enviar</button>
            </div>
        </form>
    </main>
</body>
</html>

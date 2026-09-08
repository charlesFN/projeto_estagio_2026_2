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

    <link rel="stylesheet" href="{{ asset('css/landingpage.css') }}">
</head>
<body>
    {{-- Navbar --}}
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

    {{-- Mensagem exibida caso o formulário seja enviado com sucesso --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Mensagem exibida caso haja um erro no envio do formulário --}}
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-ban-fill me-2"></i>
                {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

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

    {{-- Formulário de agendamento --}}
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
                    <form action="{{ route('agendar') }}" id="bookingForm" class="booking-card row g-4" method="POST">
                        @csrf

                        <div class="col-md-6">
                            <label for="cliente" class="form-label">Nome completo</label>
                            <input type="text" name="cliente" class="form-control @error('cliente') is-invalid @enderror" id="cliente" required>
                            @error('cliente')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="animal" class="form-label @error('animal') is-invalid @enderror">Pet</label>
                            <select class="form-select" name="animal" id="animal" required>
                                <option value="{{ null }}" selected disabled>Selecione o tipo de pet...</option>
                                <option value="cachorro">Cachorro</option>
                                <option value="gato">Gato</option>
                            </select>
                            @error('animal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="nome_animal" class="form-label @error('nome_animal') is-invalid @enderror">Nome do pet</label>
                            <input type="text" class="form-control" name="nome_animal" id="nome_animal" placeholder="Ex: Rex, Mimi..." required>
                            @error('nome_animal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="servico" class="form-label @error('servico') is-invalid @enderror">Tipo de serviço</label>
                            <select class="form-select" name="servico" id="servico" required>
                                <option value="{{ null }}" selected disabled>Selecione um serviço</option>
                                <option value="consulta">Consulta veterinária</option>
                                <option value="vacinacao">Vacinação</option>
                                <option value="banho">Banho</option>
                                <option value="tosa">Banho e tosa</option>
                            </select>
                            @error('servico')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="data" class="form-label @error('data') is-invalid @enderror">Data desejada</label>
                            <input type="date" class="form-control" name="data" id="data" required>
                            @error('data')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="observacoes" class="form-label @error('observacoes') is-invalid @enderror">Observações <span class="fw-normal text-muted">(opcional)</span></label>
                            <textarea name="observacoes" id="observacoes" class="form-control" name="observacoes" placeholder="Alguma informação importante?"></textarea>
                            @error('observacoes')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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
</body>
</html>

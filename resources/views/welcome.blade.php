<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SecureAccess · Sistema</title>
    <style>
        /* ----- reset + base ----- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background: #f4f7fd;
            color: #1a2639;
            min-height: 100vh;
        }

        /* ----- header ----- */
        header {
            width: 100%;
            padding: 1rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            position: sticky;
            top: 0;
            z-index: 20;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 1.2rem;
            font-weight: 600;
            color: #0b1f3b;
        }

        .logo-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            background: #eef2f9;
            border-radius: 10px;
            color: #1f3a6b;
            border: 1px solid #d5dfec;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        nav a {
            color: #3e4f66;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.15s;
        }

        nav a:hover {
            color: #0b1f3b;
        }

        .nav-button {
            padding: 0.5rem 1.2rem;
            border-radius: 30px;
            background: #eef2f9;
            border: 1px solid #cdd9e9;
            color: #1f3a6b !important;
            font-weight: 500;
            transition: background 0.15s, border-color 0.15s;
        }

        .nav-button:hover {
            background: #e2eaf5;
            border-color: #a0b8d9;
        }

        /* ----- hero ----- */
        .hero {
            min-height: calc(100vh - 80px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4rem 5%;
            background: #f4f7fd;
        }

        .content {
            width: 100%;
            max-width: 1024px;
            text-align: center;
        }

        /* ----- tag ----- */
        .tag {
            display: inline-block;
            padding: 0.3rem 1.2rem;
            border-radius: 30px;
            background: #eaf0fa;
            border: 1px solid #d5dfec;
            color: #1f3a6b;
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            margin-bottom: 1.8rem;
        }

        /* ----- tipografia ----- */
        h1 {
            font-size: clamp(2.2rem, 5vw, 4rem);
            font-weight: 600;
            letter-spacing: -0.03em;
            line-height: 1.15;
            color: #0b1a33;
            margin-bottom: 1.2rem;
        }

        h1 span {
            color: #1f3a6b;
            border-bottom: 4px solid #b7c9e2;
            padding-bottom: 0.1rem;
        }

        .description {
            max-width: 640px;
            margin: 0 auto 2.4rem;
            color: #3a4d66;
            font-size: 1.05rem;
            line-height: 1.7;
            background: #ffffff;
            padding: 0.8rem 1.6rem;
            border-radius: 40px;
            border: 1px solid #e2eaf5;
            display: inline-block;
        }

        /* ----- botões ----- */
        .buttons {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
            margin-top: 0.5rem;
        }

        .button {
            padding: 0.7rem 2rem;
            border-radius: 40px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: background 0.15s, border-color 0.15s, transform 0.1s;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .primary {
            background: #1f3a6b;
            color: #ffffff;
            border: 1px solid #1f3a6b;
        }

        .primary:hover {
            background: #142d52;
            border-color: #142d52;
            transform: translateY(-2px);
        }

        .secondary {
            background: #ffffff;
            color: #1f3a6b;
            border: 1px solid #cdd9e9;
        }

        .secondary:hover {
            background: #f0f5ff;
            border-color: #a0b8d9;
            transform: translateY(-2px);
        }

        /* ----- features ----- */
        .features {
            margin-top: 4rem;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            text-align: left;
        }

        .feature {
            padding: 1.8rem 1.6rem 1.6rem;
            border-radius: 16px;
            background: #ffffff;
            border: 1px solid #e2eaf5;
            transition: box-shadow 0.2s, transform 0.15s;
        }

        .feature:hover {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
            transform: translateY(-4px);
        }

        .feature-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: #eef2f9;
            border-radius: 10px;
            color: #1f3a6b;
            border: 1px solid #d5dfec;
            margin-bottom: 1rem;
        }

        .feature h3 {
            font-size: 1rem;
            font-weight: 600;
            color: #0b1a33;
            margin-bottom: 0.3rem;
        }

        .feature p {
            color: #4d627c;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        /* ----- responsivo ----- */
        @media (max-width: 768px) {
            header {
                padding: 0.8rem 1.5rem;
            }

            nav {
                gap: 1rem;
            }

            nav a:not(.nav-button) {
                display: none;
            }

            .hero {
                padding: 2.5rem 1.5rem;
                min-height: auto;
            }

            .description {
                padding: 0.6rem 1.2rem;
                font-size: 0.95rem;
                display: block;
                max-width: 100%;
                border-radius: 20px;
            }

            .features {
                grid-template-columns: 1fr;
                margin-top: 2.5rem;
                gap: 1rem;
            }

            .feature {
                padding: 1.4rem;
            }
        }

        @media (max-width: 480px) {
            .buttons {
                flex-direction: column;
                width: 100%;
            }

            .button {
                width: 100%;
                justify-content: center;
            }

            .nav-button {
                padding: 0.4rem 0.9rem;
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>

<header>
    <div class="logo">
        <span class="logo-icon" aria-hidden="true">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                <path d="M7 11V7a5 5 0 0 1 10 0v4" />
            </svg>
        </span>
        SecureAccess
    </div>
    <nav>
        <a href="/">Início</a>
        <a href="#recursos">Recursos</a>
        <a href="/acesso" class="nav-button">Área restrita</a>
    </nav>
</header>

<main class="hero">
    <div class="content">

        <div class="tag">Controle de acesso · Laravel</div>

        <h1>
            Segurança e controle<br />
            <span>em um só lugar</span>
        </h1>

        <p class="description">
            Aplicação desenvolvida com Laravel para demonstrar rotas,
            Controllers, Middlewares e Views em um sistema moderno.
        </p>

        <div class="buttons">
            <a href="/acesso" class="button primary">
                Acessar área restrita
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12" />
                    <polyline points="12 5 19 12 12 19" />
                </svg>
            </a>
            <a href="#recursos" class="button secondary">Conhecer o sistema</a>
        </div>

        <!-- features -->
        <div class="features" id="recursos">

            <div class="feature">
                <div class="feature-icon" aria-hidden="true">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                        <path d="M9 12l2 2 4-4" />
                    </svg>
                </div>
                <h3>Controle de acesso</h3>
                <p>Middleware gerencia permissões e restringe áreas protegidas com segurança.</p>
            </div>

            <div class="feature">
                <div class="feature-icon" aria-hidden="true">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="12 2 2 7 12 12 22 7 12 2" />
                        <polyline points="2 17 12 22 22 17" />
                        <polyline points="2 12 12 17 22 12" />
                    </svg>
                </div>
                <h3>Laravel</h3>
                <p>Construído sobre a estrutura do framework, com boas práticas e organização.</p>
            </div>

            <div class="feature">
                <div class="feature-icon" aria-hidden="true">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                    </svg>
                </div>
                <h3>Área protegida</h3>
                <p>Usuários sem permissão recebem uma mensagem clara sobre o bloqueio.</p>
            </div>

        </div>
    </div>
</main>

</body>
</html>
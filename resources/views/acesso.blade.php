<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloqueado · SecureAccess</title>
    <style>
        /* ----- reset + base ----- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f0f4fb;
            color: #1a2639;
            padding: 1.5rem;
            position: relative;
        }

        /* ----- background sutil ----- */
        body::before {
            content: '';
            position: fixed;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(ellipse at 30% 40%, rgba(31, 58, 107, 0.04) 0%, transparent 60%),
                        radial-gradient(ellipse at 70% 60%, rgba(31, 58, 107, 0.03) 0%, transparent 50%);
            z-index: 0;
            pointer-events: none;
        }

        /* ----- container principal ----- */
        .container {
            width: 100%;
            max-width: 520px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        /* ----- card redesenhado ----- */
        .card {
            background: #ffffff;
            border-radius: 24px;
            padding: 3rem 2.8rem 2.5rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.06), 0 8px 24px rgba(0, 0, 0, 0.03);
            border: 1px solid #e8edf5;
            position: relative;
            overflow: hidden;
        }

        /* ----- detalhe decorativo ----- */
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #1f3a6b, #4a7ab5, #1f3a6b);
            background-size: 200% 100%;
            animation: shimmer 3s ease-in-out infinite;
        }

        @keyframes shimmer {
            0%, 100% { background-position: 0% 0%; }
            50% { background-position: 100% 0%; }
        }

        /* ----- cabeçalho com ícone circular ----- */
        .card-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin-bottom: 2rem;
        }

        .icon-circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: #eef4fc;
            border: 2px solid #d5e0ed;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.2rem;
            color: #1f3a6b;
            position: relative;
            transition: transform 0.3s ease;
        }

        .icon-circle:hover {
            transform: scale(1.05);
        }

        .icon-circle svg {
            width: 36px;
            height: 36px;
        }

        /* ----- status badge ----- */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.4rem 1.2rem;
            border-radius: 30px;
            background: #fff5f5;
            border: 1px solid #fcd5d0;
            color: #b3403a;
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
        }

        .status-badge .dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #b3403a;
            display: inline-block;
            animation: pulse 1.5s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(0.8); }
        }

        /* ----- tipografia ----- */
        h1 {
            font-size: 2rem;
            font-weight: 600;
            letter-spacing: -0.03em;
            color: #0b1a33;
            margin-bottom: 0.5rem;
        }

        .subhead {
            font-size: 0.95rem;
            color: #4d627c;
            line-height: 1.6;
            max-width: 380px;
            margin: 0 auto 0.5rem;
        }

        /* ----- divisor decorativo ----- */
        .divider {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin: 1.8rem 0;
        }

        .divider-line {
            flex: 1;
            height: 1px;
            background: #e2e8f0;
        }

        .divider-icon {
            color: #9aafc9;
            font-size: 0.8rem;
            flex-shrink: 0;
        }

        /* ----- mensagem e contato (estilo novo) ----- */
        .info-card {
            background: #f8faff;
            border: 1px solid #e2eaf5;
            border-radius: 14px;
            padding: 1.2rem 1.4rem;
            margin-bottom: 0.8rem;
            color: #1a2639;
            font-size: 0.95rem;
            line-height: 1.6;
            display: flex;
            align-items: flex-start;
            gap: 0.8rem;
            transition: background 0.2s;
        }

        .info-card:hover {
            background: #f5f9ff;
        }

        .info-card .emoji {
            font-size: 1.2rem;
            flex-shrink: 0;
            margin-top: 0.1rem;
        }

        .info-card .content {
            flex: 1;
        }

        .info-card .label {
            font-weight: 600;
            color: #1f3a6b;
            display: block;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            margin-bottom: 0.15rem;
        }

        .contact-card {
            background: #eef4fc;
            border: 1px solid #d5e0ed;
            border-radius: 14px;
            padding: 1.2rem 1.4rem;
            margin-bottom: 1.8rem;
            color: #1a2639;
            font-size: 0.95rem;
            line-height: 1.6;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .contact-card .emoji {
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .contact-card strong {
            font-weight: 600;
            color: #1f3a6b;
        }

        /* ----- botão estilizado ----- */
        .back-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            width: 100%;
            padding: 0.9rem 1.6rem;
            background: #1f3a6b;
            border: none;
            border-radius: 40px;
            color: #ffffff;
            font-weight: 500;
            font-size: 0.95rem;
            text-decoration: none;
            transition: background 0.2s, transform 0.1s, box-shadow 0.2s;
            box-shadow: 0 4px 12px rgba(31, 58, 107, 0.15);
        }

        .back-button:hover {
            background: #142d52;
            box-shadow: 0 6px 20px rgba(31, 58, 107, 0.2);
            transform: translateY(-2px);
        }

        .back-button:active {
            transform: translateY(0px);
        }

        .back-button svg {
            flex-shrink: 0;
        }

        /* ----- rodapé ----- */
        .footer {
            margin-top: 2rem;
            font-size: 0.75rem;
            color: #7d8ba3;
            text-align: center;
            border-top: 1px solid #e4eaf3;
            padding-top: 1.5rem;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .footer span {
            opacity: 0.8;
        }

        .footer .pill {
            background: #f0f4fc;
            padding: 0.2rem 0.8rem;
            border-radius: 30px;
            font-size: 0.7rem;
            color: #3f5a7a;
            border: 1px solid #dfe8f3;
        }

        /* ----- responsivo ----- */
        @media (max-width: 500px) {
            .card {
                padding: 2.2rem 1.5rem 2rem;
            }

            h1 {
                font-size: 1.7rem;
            }

            .icon-circle {
                width: 64px;
                height: 64px;
            }

            .icon-circle svg {
                width: 28px;
                height: 28px;
            }

            .info-card {
                padding: 1rem 1.2rem;
                font-size: 0.9rem;
                flex-direction: column;
                gap: 0.3rem;
            }

            .contact-card {
                padding: 1rem 1.2rem;
                font-size: 0.9rem;
                flex-wrap: wrap;
            }

            .footer {
                flex-direction: column;
                gap: 0.5rem;
            }
        }
    </style>
</head>
<body>

<main class="container">
    <section class="card">

        <!-- cabeçalho com ícone circular -->
        <div class="card-header">
            <div class="icon-circle" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                    <circle cx="12" cy="16" r="1" fill="currentColor" />
                </svg>
            </div>

            <div class="status-badge">
                <span class="dot"></span>
                Acesso negado
            </div>

            <h1>Área bloqueada</h1>
            <p class="subhead">
                Você não possui as permissões necessárias para acessar este conteúdo.
            </p>
        </div>

        <!-- divisor decorativo -->
        <div class="divider">
            <span class="divider-line"></span>
            <span class="divider-icon">◆</span>
            <span class="divider-line"></span>
        </div>

        <!-- mensagem dinâmica -->
        <div class="info-card">
           
            <div class="content">
                <span class="label">Mensagem</span>
                <span id="mensagem-placeholder">{{ $mensagem ?? 'Acesso negado para este recurso.' }}</span>
            </div>
        </div>

        <!-- contato dinâmico -->
        <div class="contact-card">
            
            <div>
                <strong>Suporte</strong> <br>
                <span id="contato-placeholder" style="color: #3a4d66;">
                    {{ $contato ?? 'Entre em contato com o administrador do sistema.' }}
                </span>
            </div>
        </div>

        <!-- botão voltar -->
        <a href="/" class="back-button">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="19" y1="12" x2="5" y2="12" />
                <polyline points="12 19 5 12 12 5" />
            </svg>
            Voltar para o início
        </a>

        <!-- rodapé -->
        <div class="footer">
            <span>Sistema protegido · Middleware de acesso</span>
        
        </div>

    </section>
</main>

</body>
</html>
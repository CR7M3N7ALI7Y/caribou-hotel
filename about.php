<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Информация</title>
    <link rel="stylesheet" href="caribou-hotel/css/style.css">
</head>
<body>
    <style>
        /* =========================================================
        НОВЫЕ СТИЛИ ДЛЯ ВНУТРЕННИХ СТРАНИЦ
        ========================================================= */

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Заголовок страницы */
        .page-hero {
            position: relative;
            height: 300px;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
        }

        .page-hero-overlay {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background-image: url(img/slider2.5.png);
            display: flex;
            padding-top: 140px;
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            letter-spacing: 5px;
            font-weight: 400;
            margin-bottom: 0px;
        }

        .breadcrumbs {
            font-size: 13px;
            letter-spacing: 1px;
            opacity: 0.8;
            margin-bottom: 10px;
        }
        .breadcrumbs a { color: #fff; transition: var(--transition); }
        .breadcrumbs a:hover { opacity: 0.7; }
        .breadcrumbs span { color: var(--gold); }

        /* Секция контента */
        .page-content-section {
            padding: 60px 0 80px;
            background-color: #f9f9f9;
        }

        .content-block {
            background: #ffffff;
            padding: 50px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
            border-radius: 4px;
        }

        .text-content h2 {
            font-size: 28px;
            color: var(--dark-blue);
            margin-bottom: 20px;
            font-weight: 600;
        }
        .text-content p {
            font-size: 16px;
            line-height: 1.8;
            color: #555;
            margin-bottom: 15px;
        }
        .text-content a { color: var(--gold); font-weight: 600; }
        .text-content a:hover { text-decoration: underline; }

        .divider {
            border: 0; height: 1px; background: #eee; margin: 30px 0;
        }

        .document-item h3 {
            font-size: 20px; color: #333; margin-bottom: 5px;
        }
        .document-item .doc-meta { color: #888; font-size: 14px; margin-bottom: 15px; }

        .doc-pagination { font-size: 15px; }
        .doc-nav { color: #333; margin: 0 3px; }
        .doc-nav.active { color: var(--gold); font-weight: 600; cursor: default; }
        .doc-nav:hover:not(.active) { color: var(--gold); }

        .disclaimer { font-style: italic; color: #777; font-size: 14px; margin-top: 10px; }


        /* =========================================================
        АДАПТИВНОСТЬ (ПК, Планшеты, Телефоны 320px)
        ========================================================= */

        @media (max-width: 1024px) {
            .features-grid { grid-template-columns: repeat(2, 1fr); height: auto; }
            .feature-item { height: 300px; }
            .footer-info, .footer-image { width: 100%; clip-path: none; }
            .footer-image { height: 300px; margin-top: 30px; }
            .footer-info { padding: 0 30px; }
        }

        @media (max-width: 768px) {
            .site-header { padding: 10px 15px; flex-direction: column; gap: 10px; background: rgba(0,0,0,0.7); }
            .main-nav { gap: 8px; width: 100%; justify-content: center; }
            .main-nav a { font-size: 10px; letter-spacing: 0.5px; }
            .header-actions { width: 100%; justify-content: center; gap: 10px; flex-wrap: wrap; }
            
            .hero-title { font-size: 40px; letter-spacing: 4px; }
            .hero-subtitle { font-size: 14px; letter-spacing: 4px; margin-top: 0; }
            .scroll-hint { display: none; }
            .features-grid { grid-template-columns: 1fr; }
            .feature-item { height: 250px; }

            /* Адаптация для promo.php на планшетах и телефонах */
            .page-hero { height: 250px; }
            .page-title { font-size: 32px; }
            .content-block { padding: 30px; }
            .text-content h2 { font-size: 24px; }
        }

        /* СПЕЦИАЛЬНО ДЛЯ 320px (КАК НА ВАШЕМ СКРИНШОТЕ) */
        @media (max-width: 400px) {
            .main-nav a { font-size: 9px; gap: 4px; } /* Уменьшаем шрифт меню */
            
            .logo { font-size: 16px; }
            .logo-text small { font-size: 8px; }
            .logo-icon { font-size: 22px; }

            .btn-reservation { font-size: 10px; padding: 6px 12px; }
            .hero-title { font-size: 28px; }
            .hero-subtitle { font-size: 11px; }

            /* Адаптация promo.php для экранов 320px */
            .page-hero { height: 200px; } /* Уменьшаем шапку страницы еще сильнее */
            .page-title { font-size: 24px; letter-spacing: 3px; }
            .content-block { padding: 15px 15px 25px; } /* Убираем отступы по бокам, чтобы текст не прилипал к краям */
            .text-content h2 { font-size: 20px; }
            .text-content p { font-size: 14px; }
        }

        @media (max-width: 350px) {
            .header-actions { flex-direction: column; gap: 5px; }
            .btn-reservation { width: 100%; text-align: center; }
        }
    </style>
    <?php include 'includes/header.php'; ?>
<main>
    <!-- 1. Секция с заголовком (Hero для внутренней страницы) -->
    <section class="page-hero">
        <div class="page-hero-overlay">
            <div class="container">
                <div class="breadcrumbs">
                    <a href="index.php">Главная</a> / <span style="color: black;">Информация</span>
                </div>
                <h1 class="page-title">ИНФОРМАЦИЯ</h1>
            </div>
        </div>
    </section>
    <!-- 2. Основной контент (Чистый белый блок) -->
    <section class="page-content-section">
        <div class="container">
            <div class="content-block">
                
                <!-- Текстовый блок -->
                <div class="text-content">
                    <h2>Официальные документы</h2>
                    <p>Гостиница Карибу - современный интегрированный комплекс, включающий в себя ресторан с чилаут зоной, сауну и хаммам.</p>
                    <p>Мы предоставляем полную прозрачность нашей деятельности. Ниже представлена информация о бухгалтерской отчетности.</p>
                    
                    <hr class="divider">

                    <div class="document-item">
                        <h3>Аудиторское Заключение о бухгалтерской отчетности</h3>
                        <p class="doc-meta">ООО «КАЛТЭН» за 2020 год</p>
                        
                        <!-- Пагинация документов -->
                        <div class="doc-pagination">
                            <span class="doc-nav">(</span>
                            <a href="download/аудиторское заключение 2020.part1.exe" download="аудиторское заключение 2020.part1.rar" class="doc-nav">1 из 2</a>
                            <span class="doc-nav">,</span>
                            <a href="download/аудиторское заключение 2020.part2.rar" download="аудиторское заключение 2020.part2.rar" class="doc-nav">2 из 2</a>
                            <span class="doc-nav">)</span>
                        </div>
                    </div>

                    <hr class="divider">

                    <p class="disclaimer">* Для просмотра полной версии документов, пожалуйста, свяжитесь с нами через раздел <a href="contact.php">Контакты</a>.</p>
                </div>

            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
</body>
</html>
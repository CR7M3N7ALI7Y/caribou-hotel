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
        .logo {width: 100px;}
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
            top: 0; left: 0; width: 100%; height: auto;
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
            font-size: 15px;
            letter-spacing: 1px;
            opacity: 0.8;
            margin-bottom: 10px;
        }
        .breadcrumbs a { color: #fff; transition: var(--transition); }
        .breadcrumbs a:hover { opacity: 0.7; }
        .breadcrumbs span { color: var(--gold); }
        /* =========================================================
   СТИЛИ ДЛЯ СТРАНИЦЫ КОНКУРСОВ (competitions.php)
   ========================================================= */

        /* Блок с годом */
        .tender-year-block {
            margin-top: 24px;
            margin-bottom: 20px;
        }

        .tender-year {
            background-color: #e2e2e2; /* Цвет схожий со старым синим блоком, но мягче */
            color: #353535;
            font-size: 20px;
            font-weight: 700;
            text-align: center;
            padding: 10px 0;
            border-radius: 4px;
            letter-spacing: 2px;
            margin-bottom: 30px;
        }

        /* Отдельный тендер */
        .tender-item {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 30px;
        }

        /* Дата слева */
        .tender-date {
            flex: 0 0 120px;
            font-weight: 600;
            color: var(--gold);
            font-size: 16px;
            padding-top: 2px;
        }

        /* Контент справа */
        .tender-content {
            flex: 1 1 300px;
        }

        .tender-title {
            font-size: 25px;
            color: var(--dark-blue);
            margin-bottom: 10px;
            font-weight: 600;
        }

        .tender-desc {
            font-size: 15px;
            line-height: 1.7;
            color: #555;
            margin-bottom: 20px;
        }

        /* Список файлов для скачивания */
        .tender-files {
            background: #f8f9fa;
            border-radius: 6px;
            padding: 10px 20px;
            border: 1px solid #eee;
        }

        .file-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }
        .file-row:last-child {
            border-bottom: none;
        }

        .file-name {
            font-size: 14px;
            color: #444;
        }

        .file-download {
            color: var(--gold);
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            transition: var(--transition);
            padding: 5px 15px;
            border: 1px solid var(--gold);
            border-radius: 20px;
        }
        .file-download:hover {
            background-color: var(--gold);
            color: #fff;
        }

        /* Адаптивность для маленьких экранов */
        @media (max-width: 600px) {
            .tender-item {
                flex-direction: column;
                gap: 5px;
            }
            .tender-date {
                flex: none;
                width: 100%;
                margin-bottom: 5px;
            }
            .file-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            .file-download {
                width: 100%;
                text-align: center;
                padding: 8px;
            }
        }
    </style>
    <?php include 'includes/header.php'; ?>
<main>
    <!-- 1. Секция с заголовком (Hero для внутренней страницы) -->
    <section class="page-hero">
        <div class="page-hero-overlay">
            <div class="container">
                <div class="breadcrumbs">
                    <a href="index.php">Главная</a> / <span style="color: var(--dark-blue);">Конкурсы</span>
                </div>
                <h1 class="page-title">КОНКУРСЫ</h1>
            </div>
        </div>
    </section>
    <!-- 2. Основной контент -->
    <section class="page-content-section">
        <div class="container">
            <div class="content-block">

                <!-- Список конкурсов -->
                <div class="tenders-list">

                    <!-- БЛОК 2021 ГОДА (Ваши данные со скриншота) -->
                    <div class="tender-year-block">
                        <div class="tender-year">2021</div>
                        
                        <div class="tender-item">
                            <div class="tender-date">31.12.2020</div>
                            <div class="tender-content">
                                <h3 class="tender-title">О проведении открытого конкурса по отбору аудиторских организаций</h3>
                                <p class="tender-desc">
                                    О проведении открытого конкурса по отбору аудиторских организаций на оказание услуг проведения аудиторской проверки бухгалтерской и налоговой отчетности АО «Калтэн» за период с 01.01.2020г. по 31.12.2020г. с целью выражения мнения о достоверности бухгалтерской (финансовой) отчетности и соответствия совершенных им финансовых и хозяйственных операций действующему законодательству Российской Федерации.
                                </p>
                                
                                <div class="tender-files">
                                    <div class="file-row">
                                        <span class="file-name">Извещение о проведении открытого конкурса</span>
                                        <a href="download/Конкурсы/Извещение о проведении открытого конкурска.pdf" download="Извещение о проведении открытого конкурска.pdf" class="file-download">Скачать</a>
                                    </div>
                                    <div class="file-row">
                                        <span class="file-name">Конкурсная документация</span>
                                        <a href="download/Конкурсы/Конкурсная документация.rtf" download="download/Конкурсы/Конкурсная документация.rtf" class="file-download">Скачать</a>
                                    </div>
                                    <div class="file-row">
                                        <span class="file-name">Приложение 1 к конкурсной документации</span>
                                        <a href="download/Конкурсы/Приложение 1 к конкурсной документации.rtf" download="Приложение 1 к конкурсной документации.rtf" class="file-download">Скачать</a>
                                    </div>
                                    <div class="file-row">
                                        <span class="file-name">Приложение 2 к конкурсной документации</span>
                                        <a href="download/Конкурсы/Приложение 2 к конкурсной документации.rtf" download="Приложение 2 к конкурсной документации.rtf" class="file-download">Скачать</a>
                                    </div>
                                    <div class="file-row">
                                        <span class="file-name">Приложение 3 к конкурсной документации</span>
                                        <a href="download/Конкурсы/Приложение 3 к конкурсной документации.rtf" download="Приложение 3 к конкурсной документации.rtf" class="file-download">Скачать</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
</body>
</html>
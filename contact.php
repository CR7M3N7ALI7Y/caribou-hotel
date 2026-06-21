<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакты</title>
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
/* =========================================================
   СТИЛИ ДЛЯ СТРАНИЦЫ КОНТАКТЫ (contact.php)
   ========================================================= */

.contacts-wrapper {
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    background: #fff;
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
}

.contacts-info {
    flex: 1 1 45%;
    margin-top: 1.8%;
}

.contacts-info h2 {
    font-family: 'Playfair Display', serif;
    font-size: 32px;
    color: var(--dark-blue);
    margin-bottom: 30px;
}

.contact-item {
    display: flex;
    gap: 15px;
    margin-bottom: 30px;
    padding-bottom: 25px;
    border-bottom: 1px solid #eee;
}
.contact-item:last-child {
    border-bottom: none;
    margin-bottom: 0;
}

.ci-icon {
    font-size: 24px;
    color: var(--gold);
    flex-shrink: 0;
    width: 30px;
    text-align: center;
}

.ci-text {
    display: flex;
    flex-direction: column;
    gap: 5px;
    flex: 1;
}

.ci-label {
    font-size: 13px;
    text-transform: uppercase;
    color: #999;
    letter-spacing: 1px;
}

.ci-value {
    font-size: 16px;
    color: #333;
}

.ci-phone-row {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
}

.ci-phone {
    font-size: 20px;
    font-weight: 600;
    color: var(--gold);
    transition: var(--transition);
}
.ci-phone:hover {
    color: var(--dark-blue);
}

.ci-email {
    font-size: 16px;
    color: var(--dark-blue);
    font-weight: 500;
    transition: var(--transition);
}
.ci-email:hover {
    color: var(--gold);
}

/* Карта */
.contacts-map {
    flex: 1 1 45%;
    min-height: 350px;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
}
.map-placeholder {
    width: 100%;
    height: 100%;
    min-height: 350px;
    background: #e9ecef;
    position: relative;
}
.map-placeholder iframe {
    position: absolute;
    top: 0; left: 0;
    width: 100%;
    height: 100%;
}

/* Адаптивность */
@media (max-width: 768px) {
    .contacts-wrapper { padding: 20px; flex-direction: column; }
    .contacts-info h2 { font-size: 26px; }
    .ci-phone { font-size: 18px; }
    .contacts-map, .map-placeholder { min-height: 250px; }
    .ci-phone-row { flex-direction: column; gap: 5px; }
}
    </style>
    <?php include 'includes/header.php'; ?>
<main>
    <!-- 1. Секция с заголовком (Hero для внутренней страницы) -->
    <section class="page-hero">
        <div class="page-hero-overlay">
            <div class="container">
                <div class="breadcrumbs">
                    <a href="index.php">Главная</a> / <span style="color: black;">Контакты</span>
                </div>
                <h1 class="page-title">КОНТАКТЫ</h1>
            </div>
        </div>
    </section>
<!-- 2. Основной блок с контактами и картой -->
    <section class="page-content-section">
        <div class="container">
            <div class="content-block content-block-no-shadow">
                <div class="contacts-wrapper">
                    
                    <!-- ЛЕВАЯ ЧАСТЬ: Информация -->
                    <div class="contacts-info">
                        <h2>Свяжитесь с нами</h2>
                        
                        <div class="contact-item">
                            <div class="ci-icon">📍</div>
                            <div class="ci-text">
                                <span class="ci-label">Адрес:</span>
                                <span class="ci-value">Россия, г. Белоярский, микрорайон 4а, д. 1</span>
                            </div>
                        </div>

                        <div class="contact-item phone-group">
                            <div class="ci-icon">📞</div>
                            <div class="ci-text">
                                <span class="ci-label">Телефоны для бронирования:</span>
                                <div class="ci-phone-row">
                                    <a href="tel:+73467050701" class="ci-phone">8 (34670) 50-701</a>
                                    <a href="tel:+79526968978" class="ci-phone">+7 (952) 696-89-78</a>
                                </div>
                            </div>
                        </div>

                        <div class="contact-item phone-group">
                            <div class="ci-icon">🍽️</div>
                            <div class="ci-text">
                                <span class="ci-label">Бронирование ресторана:</span>
                                <div class="ci-phone-row">
                                    <a href="tel:+73467050703" class="ci-phone">8 (34670) 50-703</a>
                                    <a href="tel:+79526968781" class="ci-phone">+7 (952) 696-87-81</a>
                                </div>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="ci-icon">✉️</div>
                            <div class="ci-text">
                                <span class="ci-label">E-mail:</span>
                                <a href="mailto:reception@caribou-hotel.ru" class="ci-email">reception@caribou-hotel.ru</a>
                            </div>
                        </div>
                    </div>

                    <!-- ПРАВАЯ ЧАСТЬ: Карта -->
                    <div class="contacts-map">
                        <div class="map-placeholder">
                            <!-- ЗАМЕНИТЕ ССЫЛКУ НИЖЕ НА ССЫЛКУ ВАШЕЙ ЯНДЕКС КАРТЫ -->
                            <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A7f2e4f6d8a2d8b2c8e4f6d8a2d8b2c8e&amp;source=constructor" width="100%" height="100%" frameborder="0"></iframe>
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
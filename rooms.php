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

        .page-content-section {
            margin-top: 50px;
        }
                /* Сетка для карточек */
        .rooms-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 40px;
        }

        /* Сама карточка номера */
        .room-card {
            background: #fff;
            /* Легкая тень, как на скрине */
            transition: var(--transition);
            border-radius: 4px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }
        .room-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        /* Картинка карточки */
        .room-card-img {
            width: 100%;
            height: 280px;
            overflow: hidden;
        }
        .room-card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }
        .room-card:hover .room-card-img img {
            transform: scale(1.03);
        }

        /* Контент карточки (текст) */
        .room-card-content {
            padding: 25px 30px 30px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .room-card-title {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            color: var(--dark-blue);
            letter-spacing: 1px;
            margin-bottom: 10px;
            font-weight: 400;
        }
        .room-card-desc {
            font-size: 14px;
            line-height: 1.6;
            color: #666;
            margin-bottom: 20px;
            flex-grow: 1; /* Растягивает описание, чтобы кнопки были на одной линии */
        }

        /* Бейджики с характеристиками (квадраты/гости) */
        .room-card-features {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
        }
        .feature-badge {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #555;
            border: 1px solid #e0e0e0;
            padding: 5px 15px;
            border-radius: 30px; /* Овальная форма как на скрине */
        }
        .feature-icon {
            font-size: 14px;
            opacity: 0.6;
        }

        /* Низ карточки: Цена и Кнопка */
        .room-card-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid #f0f0f0;
            padding-top: 20px;
        }

        .room-card-price {
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }
        .room-card-price span { font-size: 14px; color: #999; font-weight: 400; }

        .btn-reserve-card {
            background-color: var(--gold);
            color: #fff;
            padding: 10px 25px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 4px;
            transition: var(--transition);
        }
        .btn-reserve-card:hover {
            background-color: gray;
            color: #fff;
        }
        /* =========================================================
        СТИЛИ ДЛЯ МОДАЛЬНЫХ ОКОН
        ========================================================= */

        /* Затемненный фон (Без размытия, чтобы не лагать) */
        .modal-overlay {
            display: none; /* Скрыто по умолчанию */
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.75); /* Просто темный цвет, без фильтров */
            z-index: 9999;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        /* Когда окно открыто (активно) */
        .modal-overlay.active {
            display: flex;
            animation: fadeInModal 0.25s ease-out forwards;
        }

        /* Само белое окно */
        .modal-window {
            background: #fff;
            max-width: 900px;
            width: 100%;
            max-height: 90vh;
            border-radius: 8px;
            box-shadow: 0 15px 50px rgba(0,0,0,0.4);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            /* Анимация появления - легкая и быстрая */
            animation: slideUpModal 0.3s cubic-bezier(0.2, 0.9, 0.3, 1.1) forwards;
        }

        /* Кнопка закрытия (крестик) */
        .modal-close {
            position: absolute;
            top: 15px; right: 20px;
            font-size: 32px;
            font-weight: 300;
            color: #999;
            cursor: pointer;
            z-index: 10;
            transition: all 0.2s ease;
            line-height: 1;
            background: rgba(255,255,255,0.8);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .modal-close:hover {
            color: #333;
            background: #fff;
            transform: rotate(90deg);
        }

        /* Контент внутри окна */
        .modal-content {
            display: flex;
            flex-wrap: wrap;
            height: 100%;
        }

        .modal-gallery {
            flex: 1 1 50%;
            background: #f8f8f8;
            padding: 30px 30px 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .modal-main-img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 6px;
            margin-bottom: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .modal-thumbs {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }
        .modal-thumbs img {
            width: 100%;
            height: 70px;
            object-fit: cover;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.2s ease;
            border: 2px solid transparent;
        }
        .modal-thumbs img:hover {
            opacity: 0.8;
            border-color: var(--gold);
        }

        /* Информация справа */
        .modal-info {
            flex: 1 1 50%;
            padding: 30px 35px;
            display: flex;
            flex-direction: column;
        }

        .modal-info h2 {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            color: var(--dark-blue);
            margin-bottom: 15px;
        }

        .modal-info .modal-desc {
            font-size: 15px;
            line-height: 1.7;
            color: #555;
            flex-grow: 1;
            margin-bottom: 20px;
        }

        .modal-features {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 30px;
        }
        .modal-features span {
            background: #f5f5f5;
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 13px;
            color: #555;
        }

        .modal-bottom {
            border-top: 1px solid #eee;
            padding-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-price {
            font-size: 24px;
            font-weight: 600;
            color: var(--dark-blue);
        }
        .modal-price span {
            font-size: 14px;
            font-weight: 400;
            color: #888;
            margin-left: 5px;
        }

        .btn-reserve-room {
            background-color: var(--gold);
            color: #fff;
            padding: 10px 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 4px;
            transition: all 0.3s ease;
            font-size: 12px;
            display: inline-block;
        }
        .btn-reserve-room:hover {
            background-color: gray;
            transform: translateY(-2px);
        }
        /* =========================================================
        СТИЛИ ДЛЯ ФОРМЫ БРОНИРОВАНИЯ (booking.php)
        ========================================================= */

        /* Специальное окно для формы (чуть шире) */
        .modal-form-window {
            max-width: 650px;
        }

        .modal-form-content {
            padding: 40px;
        }

        .modal-form-title {
            font-family: 'Playfair Display', serif;
            font-size: 26px;
            color: var(--dark-blue);
            text-align: center;
            margin-bottom: 30px;
        }

        /* Сетка формы */
        .booking-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .form-group label {
            font-size: 14px;
            font-weight: 600;
            color: #444;
        }
        .form-group .required { color: #d9534f; }

        /* Инпуты и Текстареа */
        .booking-form input[type="text"],
        .booking-form input[type="tel"],
        .booking-form input[type="email"],
        .booking-form input[type="date"],
        .booking-form select,
        .booking-form textarea {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            font-size: 14px;
            font-family: inherit;
            color: #333;
            background: #fafafa;
            transition: var(--transition);
            outline: none;
        }

        .booking-form input:focus,
        .booking-form select:focus,
        .booking-form textarea:focus {
            border-color: var(--gold);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(200, 164, 83, 0.15);
        }

        /* Две колонки (ФИО и Телефон) */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        /* Даты заезда/выезда */
        .form-row-dates {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        /* Счетчики (номера и взрослые) */
        .form-row-counters {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        /* Капча */
        .form-captcha-block {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            padding-top: 10px;
        }
        .captcha-left {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        .captcha-img-box {
            border: 1px solid #ddd;
            padding: 5px;
            background: #fff;
            border-radius: 4px;
        }
        .captcha-right {
            flex-grow: 1;
        }

        /* Кнопка отправки */
        .form-submit-row {
            margin-top: 15px;
            text-align: center;
        }
        .btn-submit-form {
            background-color: var(--gold);
            color: #fff;
            border: none;
            padding: 14px 40px;
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 4px;
            cursor: pointer;
            transition: var(--transition);
            width: 100%;
        }
        .btn-submit-form:hover {
            background-color: gray;
            transform: translateY(-2px);
        }

        /* Адаптация формы на телефонах */
        @media (max-width: 600px) {
            .modal-form-content { padding: 20px; }
            .form-row, .form-row-dates, .form-row-counters {
                grid-template-columns: 1fr;
            }
            .form-captcha-block {
                flex-direction: column;
                align-items: stretch;
            }
        }
        /* Легкие анимации открытия */
        @keyframes fadeInModal {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideUpModal {
            from { opacity: 0; transform: translateY(30px) scale(0.98); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        /* Адаптация модалок на телефонах */
        @media (max-width: 768px) {
            .modal-content { flex-direction: column; }
            .modal-gallery { padding: 15px; }
            .modal-main-img { height: 180px; }
            .modal-thumbs img { height: 50px; }
            .modal-info { padding: 20px; }
            .modal-bottom { flex-direction: column; align-items: stretch; gap: 15px; }
            .btn-reserve-room { width: 100%; text-align: center; }
        }
        /* --- Адаптивность для карточек --- */
        @media (max-width: 1024px) {
            .rooms-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 25px;
            }
        }

        @media (max-width: 768px) {
            .rooms-grid {
                grid-template-columns: 1fr; /* На телефонах становится 1 колонка */
                gap: 30px;
            }
            .room-card-img { height: 220px; }
            .intro-header h2 { font-size: 28px; }
            .intro-header .pre-title::before, 
            .intro-header .pre-title::after { display: none; }
            .room-card-bottom {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            .btn-reserve-card { width: 100%; text-align: center; padding: 12px; }
        }
    </style>
<?php include 'includes/header.php'; ?>

<main>
    <section class="page-hero">
        <div class="page-hero-overlay">
            <div class="container">
                <div class="breadcrumbs">
                    <a href="index.php">Главная</a> / <span style="color:black;">Номера</span>
                </div>
                <h1 class="page-title">НОМЕРА</h1>
            </div>
        </div>
    </section>

    <section class="page-content-section">
        <div class="container">
            <div class="content-block">
                <div class="rooms-grid">
                    <!-- ========================================= -->
                    <!-- Карточка 1: Одноместный номер первой категории                      -->
                    <!-- ========================================= -->
                    <div class="room-card" onclick="openModal('modal-desc-1')">
                        <div class="room-card-img">
                            <img src="img/Номера/Одноместный номер первой категории/1 (1).jpg" alt="Стандарт">
                        </div>
                        <div class="room-card-content">
                            <h3 class="room-card-title">Одноместный номер первой категории</h3>
                            <p class="room-card-desc">Однокомнатный номер с одной односпальной кроватью.</p>

                            <div class="room-card-bottom">
                                <div class="room-card-price">4200.00 руб. / сутки</div>
                                <button class="btn-reserve-card" onclick="event.stopPropagation(); openModal('modal-book-1')">ЗАБРОНИРОВАТЬ</button>
                            </div>
                        </div>
                    </div>
                    <!-- ========================================= -->
                    <!-- Карточка 2: Двухместный номер первой категории                      -->
                    <!-- ========================================= -->
                    <div class="room-card" onclick="openModal('modal-desc-2')">
                        <div class="room-card-img">
                            <img src="img/Номера/Двухместный номер первой категории/2.jpg" alt="Стандарт">
                        </div>
                        <div class="room-card-content">
                            <h3 class="room-card-title">Двухместный номер первой категории</h3>
                            <p class="room-card-desc">Двухместный номер с двумя односпальными кроватями.</p>

                            <div class="room-card-bottom">
                                <div class="room-card-price">4200.00 руб. / сутки</div>
                                <button class="btn-reserve-card" onclick="event.stopPropagation(); openModal('modal-book-2')">ЗАБРОНИРОВАТЬ</button>
                            </div>
                        </div>
                    </div>
                    <!-- ========================================= -->
                    <!-- Карточка 3: Двухместный номер первой категории                      -->
                    <!-- ========================================= -->
                    <div class="room-card" onclick="openModal('modal-desc-3')">
                        <div class="room-card-img">
                            <img src="img/Номера/Двухместный номер первой категории. Премиум/1 (1).jpg" alt="Стандарт">
                        </div>
                        <div class="room-card-content">
                            <h3 class="room-card-title">Двухместный номер первой категории. Премиум.</h3>
                            <p class="room-card-desc">Двухместный номер с одной двуспальной кроватью.</p>

                            <div class="room-card-bottom">
                                <div class="room-card-price">5600.00 руб. / сутки</div>
                                <button class="btn-reserve-card" onclick="event.stopPropagation(); openModal('modal-book-3')">ЗАБРОНИРОВАТЬ</button>
                            </div>
                        </div>
                    </div>
                    <!-- ========================================= -->
                    <!-- Карточка 4: Двухместный номер первой категории                      -->
                    <!-- ========================================= -->
                    <div class="room-card" onclick="openModal('modal-desc-4')">
                        <div class="room-card-img">
                            <img src="img/Номера/Трехместный номер первой категории/146_image.jpg" alt="Стандарт">
                        </div>
                        <div class="room-card-content">
                            <h3 class="room-card-title">Трехместный номер первой категории</h3>
                            <p class="room-card-desc">Двухместный номер с двумя раздельными кроватями + койко-место с подселением</p>

                            <div class="room-card-bottom">
                                <div class="room-card-price">4200.00 руб. / сутки</div>
                                <button class="btn-reserve-card" onclick="event.stopPropagation(); openModal('modal-book-4')">ЗАБРОНИРОВАТЬ</button>
                            </div>
                        </div>
                    </div>
                    <!-- ========================================= -->
                    <!-- Карточка 5: Студия                      -->
                    <!-- ========================================= -->
                    <div class="room-card" onclick="openModal('modal-desc-5')">
                        <div class="room-card-img">
                            <img src="img/Номера/Студия/1.jpg" alt="Стандарт">
                        </div>
                        <div class="room-card-content">
                            <h3 class="room-card-title">Студия</h3>
                            <p class="room-card-desc">Двухместный номер повышеной комфортности с одной двуспальной кроватью.</p>

                            <div class="room-card-bottom">
                                <div class="room-card-price">7500.00 руб. / сутки</div>
                                <button class="btn-reserve-card" onclick="event.stopPropagation(); openModal('modal-book-5')">ЗАБРОНИРОВАТЬ</button>
                            </div>
                        </div>
                    </div>
                    <!-- =========================================
                    Карточка 6: Cвадебный номер. Cтудия                     -->
                    <!-- ========================================= -->
                    <div class="room-card" onclick="openModal('modal-desc-6')">
                        <div class="room-card-img">
                            <img src="img/Номера/Cвадебный номер. Cтудия/1.jpg" alt="Стандарт">
                        </div>
                        <div class="room-card-content">
                            <h3 class="room-card-title">Cвадебный номер. Cтудия</h3>
                            <p class="room-card-desc">Двухместный номер повышеной комфортности с одной двуспальной кроватью.</p>

                            <div class="room-card-bottom">
                                <div class="room-card-price">7500.00 руб. / сутки</div>
                                <button class="btn-reserve-card" onclick="event.stopPropagation(); openModal('modal-book-6')">ЗАБРОНИРОВАТЬ</button>
                            </div>
                        </div>
                    </div> 
                    <!-- ========================================= -->
                    <!-- Карточка 7: Люкс                      -->
                    <!-- ========================================= -->
                    <div class="room-card" onclick="openModal('modal-desc-7')">
                        <div class="room-card-img">
                            <img src="img/Номера/Люкс/1.jpg" alt="Стандарт">
                        </div>
                        <div class="room-card-content">
                            <h3 class="room-card-title">Люкс</h3>
                            <p class="room-card-desc">Двухместный двухкомнатный номер повышеной комфортности с одной двуспальной кроватью.</p>

                            <div class="room-card-bottom">
                                <div class="room-card-price">8100.00 руб. / сутки</div>
                                <button class="btn-reserve-card" onclick="event.stopPropagation(); openModal('modal-book-7')">ЗАБРОНИРОВАТЬ</button>
                            </div>
                        </div>
                    </div>
                    <!-- ========================================= -->
                    <!-- Карточка 8: Люкс +                      -->
                    <!-- ========================================= -->
                    <div class="room-card" onclick="openModal('modal-desc-8')">
                        <div class="room-card-img">
                            <img src="img/Номера/Люкс+/1 (1).jpg" alt="Стандарт">
                        </div>
                        <div class="room-card-content">
                            <h3 class="room-card-title">Люкс +</h3>
                            <p class="room-card-desc">Двухместный двухкомнатный номер повышеной комфортности с одной двуспальной кроватью.</p>

                            <div class="room-card-bottom">
                                <div class="room-card-price">8600.00 руб. / сутки</div>
                                <button class="btn-reserve-card" onclick="event.stopPropagation(); openModal('modal-book-8')">ЗАБРОНИРОВАТЬ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- =========================================================== -->
<!-- МОДАЛЬНЫЕ ОКНА (ОПИСАНИЯ НОМЕРОВ)                           -->
<!-- =========================================================== -->

<div id="modal-desc-1" class="modal-overlay" onclick="closeModalOutside(event)">
    <div class="modal-window">
        <span class="modal-close" onclick="closeModal('modal-desc-1')">×</span>
        <div class="modal-content">
            <div class="modal-gallery">
                <img src="img/Номера/Одноместный номер первой категории/1 (1).jpg" class="modal-main-img">
                <div class="modal-thumbs">
                    <img src="img/Номера/Одноместный номер первой категории/1 (1).jpg" onclick="changeModalImg(this, 'modal-desc-1')">
                    <img src="img/Номера/Одноместный номер первой категории/2.jpg" onclick="changeModalImg(this, 'modal-desc-1')">
                    <img src="img/Номера/Одноместный номер первой категории/3.jpg" onclick="changeModalImg(this, 'modal-desc-1')">
                </div>
            </div>
            <div class="modal-info">
                <h2>Одноместный номер первой категории</h2>
                <p class="modal-desc">Практичный и комфортабельный номер для одного гостя, выполненный в строгом, деловом стиле. В номере есть всё необходимое для комфортного проживания и работы: односпальная кровать, просторный письменный стол, кресло для отдыха и телевизор. Большое окно с плотными шторами гарантирует тишину и спокойный сон.</p>
                <div class="modal-bottom">
                    <div class="modal-price">4200.00 руб.<span>/ сутки</span></div>
                    <button class="btn-reserve-room" onclick="closeModal('modal-desc-1'); openModal('modal-book-1')">ЗАБРОНИРОВАТЬ</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal-desc-2" class="modal-overlay" onclick="closeModalOutside(event)">
    <div class="modal-window">
        <span class="modal-close" onclick="closeModal('modal-desc-2')">×</span>
        <div class="modal-content">
            <div class="modal-gallery">
                <img src="img/Номера/Двухместный номер первой категории/2.jpg" class="modal-main-img">
                <div class="modal-thumbs">
                    <img src="img/Номера/Двухместный номер первой категории/2.jpg" onclick="changeModalImg(this, 'modal-desc-2')">
                    <img src="img/Номера/Двухместный номер первой категории/3.jpg" onclick="changeModalImg(this, 'modal-desc-2')">
                    <img src="img/Номера/Двухместный номер первой категории/5.jpg" onclick="changeModalImg(this, 'modal-desc-2')">
                </div>
            </div>
            <div class="modal-info">
                <h2>Двухместный номер первой категории</h2>
                <p class="modal-desc">Просторный и функциональный номер, оснащенный двумя удобными односпальными кроватями. Идеальный выбор для комфортного размещения двоих гостей. В номере предусмотрена просторная рабочая зона с письменным столом, современный телевизор, а также уютная зона отдыха с кожаным креслом и журнальным столиком. Классический интерьер в спокойных тонах создает атмосферу для полноценного отдыха и продуктивной работы.</p>
                <div class="modal-bottom">
                    <div class="modal-price">4200.00 руб.<span>/ сутки</span></div>
                    <button class="btn-reserve-room" onclick="closeModal('modal-desc-2'); openModal('modal-book-2')">ЗАБРОНИРОВАТЬ</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal-desc-3" class="modal-overlay" onclick="closeModalOutside(event)">
    <div class="modal-window">
        <span class="modal-close" onclick="closeModal('modal-desc-3')">×</span>
        <div class="modal-content">
            <div class="modal-gallery">
                <img src="img/Номера/Двухместный номер первой категории. Премиум/1 (1).jpg" class="modal-main-img">
                <div class="modal-thumbs">
                    <img src="img/Номера/Двухместный номер первой категории. Премиум/1 (1).jpg" onclick="changeModalImg(this, 'modal-desc-3')">
                    <img src="img/Номера/Двухместный номер первой категории. Премиум/2.jpg" onclick="changeModalImg(this, 'modal-desc-3')">
                    <img src="img/Номера/Двухместный номер первой категории. Премиум/3.jpg" onclick="changeModalImg(this, 'modal-desc-3')">
                </div>
            </div>
            <div class="modal-info">
                <h2>Двухместный номер первой категории. Премиум.</h2>
                <p class="modal-desc">Просторный номер с большой двуспальной кроватью и эргономичной планировкой. Интерьер выполнен в спокойных, теплых бежевых и коричневых тонах с акцентной деревянной стеной. В вашем распоряжении: комфортное кожаное кресло и журнальный столик для отдыха, функциональный рабочий стол, вместительный шкаф-купе для вещей и большой телевизор. Продуманный свет и качественная мебель сделают ваше пребывание максимально приятным.</p>
                <p>Стоимость:</p>
                <p>1 местное размещение - 5600.00 руб. / сутки.</p>
                <p>2х местное размещение - 7800.00 руб. / сутки. </p>
                <p>Завтрак включен.</p>
                <div class="modal-bottom">
                    <div class="modal-price">5600.00 руб.<span>/ сутки</span></div>
                    <button class="btn-reserve-room" onclick="closeModal('modal-desc-3'); openModal('modal-book-3')">ЗАБРОНИРОВАТЬ</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal-desc-4" class="modal-overlay" onclick="closeModalOutside(event)">
    <div class="modal-window">
        <span class="modal-close" onclick="closeModal('modal-desc-4')">×</span>
        <div class="modal-content">
            <div class="modal-gallery">
                <img src="img/Номера/Трехместный номер первой категории/146_image.jpg" class="modal-main-img">
                <div class="modal-thumbs">
                    <img src="img/Номера/Трехместный номер первой категории/146_image.jpg" onclick="changeModalImg(this, 'modal-desc-4')">
                </div>
            </div>
            <div class="modal-info">
                <h2>Трехместный номер первой категории</h2>
                <p class="modal-desc">Практичный и комфортный номер, оснащенный двумя раздельными односпальными кроватями. Идеальное решение для размещения двух гостей, которые ценят личное пространство и комфорт. Интерьер выполнен в спокойных, светлых тонах с акцентной деревянной стеной, создающей уютную атмосферу. Номер оборудован рабочей зоной, телевизором, удобным кожаным креслом.</p>
                <p>Стоимость:</p>
                <p>1 местное размещение - 4200.00 руб. / сутки.</p>
                <p>койко-место с подселением - 3600.00 руб. / сутки. </p>
                <p>Завтрак включен.</p>
                <div class="modal-bottom">
                    <div class="modal-price">4200.00 руб.<span>/ сутки</span></div>
                    <button class="btn-reserve-room" onclick="closeModal('modal-desc-4'); openModal('modal-book-4')">ЗАБРОНИРОВАТЬ</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal-desc-5" class="modal-overlay" onclick="closeModalOutside(event)">
    <div class="modal-window">
        <span class="modal-close" onclick="closeModal('modal-desc-5')">×</span>
        <div class="modal-content">
            <div class="modal-gallery">
                <img src="img/Номера/Студия/1.jpg" class="modal-main-img">
                <div class="modal-thumbs">
                    <img src="img/Номера/Студия/1.jpg" onclick="changeModalImg(this, 'modal-desc-5')">
                    <img src="img/Номера/Студия/2.jpg" onclick="changeModalImg(this, 'modal-desc-5')">
                    <img src="img/Номера/Студия/8.jpg" onclick="changeModalImg(this, 'modal-desc-5')">
                    <img src="img/Номера/Студия/3.jpg" onclick="changeModalImg(this, 'modal-desc-5')">
                </div>
            </div>
            <div class="modal-info">
                <h2>Студия</h2>
                <p class="modal-desc">Идеальный выбор для тех, кто ценит личное пространство. Номер оснащен большой двуспальной кроватью с мягким изголовьем. Отличительная особенность номера — наличие отдельной уютной гостиной зоны с комфортабельным кожаным диваном, просторным письменным столом, большим напольным зеркалом и местом для хранения вещей. Продуманный дизайн, теплые древесные оттенки и мягкий рассеянный свет создают атмосферу домашнего уюта и располагают к качественному отдыху.</p>
                <p>Стоимость:</p>
                <p>1 местное размещение - 7500.00 руб. / сутки.</p>
                <p>2х местное размещение - 8800.00 руб. / сутки. </p>
                <p>Завтрак включен.</p>
                <div class="modal-bottom">
                    <div class="modal-price">7500.00 руб.<span>/ сутки</span></div>
                    <button class="btn-reserve-room" onclick="closeModal('modal-desc-5'); openModal('modal-book-5')">ЗАБРОНИРОВАТЬ</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal-desc-6" class="modal-overlay" onclick="closeModalOutside(event)">
    <div class="modal-window">
        <span class="modal-close" onclick="closeModal('modal-desc-6')">×</span>
        <div class="modal-content">
            <div class="modal-gallery">
                <img src="img/Номера/Cвадебный номер. Cтудия/1.jpg" class="modal-main-img">
                <div class="modal-thumbs">
                    <img src="img/Номера/Cвадебный номер. Cтудия/1.jpg" onclick="changeModalImg(this, 'modal-desc-6')">
                    <img src="img/Номера/Cвадебный номер. Cтудия/2.jpg" onclick="changeModalImg(this, 'modal-desc-6')">
                    <img src="img/Номера/Cвадебный номер. Cтудия/3.jpg" onclick="changeModalImg(this, 'modal-desc-6')">
                    <img src="img/Номера/Cвадебный номер. Cтудия/4.jpg" onclick="changeModalImg(this, 'modal-desc-6')">
                    <img src="img/Номера/Cвадебный номер. Cтудия/5.jpg" onclick="changeModalImg(this, 'modal-desc-6')">
                    <img src="img/Номера/Cвадебный номер. Cтудия/7.jpg" onclick="changeModalImg(this, 'modal-desc-6')">
                </div>
            </div>
            <div class="modal-info">
                <h2>Cвадебный номер. Cтудия</h2>
                <p class="modal-desc">Изысканный и воздушный номер, созданный специально для самых важных и романтичных моментов в жизни. Абсолютно белый интерьер, наполненный мягким естественным светом, подчеркивает чистоту, нежность и торжественность события. В номере вас ждет роскошная кровать с изысканным покрывалом, уютная зона отдыха с двумя креслами, большие зеркала и стильные дизайнерские светильники.</p>
                <p>Стоимость:</p>
                <p>1 местное размещение - 7500.00 руб / сутки.</p>
                <p>2х местное размещение - 8800.00 руб / сутки. </p>
                <p>Завтрак включен.</p>
                <div class="modal-bottom">
                    <div class="modal-price">7500.00 руб.<span>/ сутки</span></div>
                    <button class="btn-reserve-room" onclick="closeModal('modal-desc-6'); openModal('modal-book-6')">ЗАБРОНИРОВАТЬ</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal-desc-7" class="modal-overlay" onclick="closeModalOutside(event)">
    <div class="modal-window">
        <span class="modal-close" onclick="closeModal('modal-desc-7')">×</span>
        <div class="modal-content">
            <div class="modal-gallery">
                <img src="img/Номера/Люкс/1.jpg" class="modal-main-img">
                <div class="modal-thumbs">
                    <img src="img/Номера/Люкс/1.jpg" onclick="changeModalImg(this, 'modal-desc-7')">
                    <img src="img/Номера/Люкс/2.jpg" onclick="changeModalImg(this, 'modal-desc-7')">
                    <img src="img/Номера/Люкс/3.jpg" onclick="changeModalImg(this, 'modal-desc-7')">
                    <img src="img/Номера/Люкс/4.jpg" onclick="changeModalImg(this, 'modal-desc-7')">
                    <img src="img/Номера/Люкс/8.jpg" onclick="changeModalImg(this, 'modal-desc-7')">
                </div>
            </div>
            <div class="modal-info">
                <h2>Люкс</h2>
                <p class="modal-desc">Идеальный выбор для тех, кто ценит личное пространство и домашний уют во время путешествий. Этот уникальный номер отличается эргономичной планировкой: просторная спальня с большой кроватью и отдельная, светлая гостиная зона с кожаным диваном, креслами и телевизором. Интерьер выполнен в строгом, но уютном стиле с использованием натуральных древесных оттенков и мягкого рассеянного света. Ванная комната оборудована современной душевой кабиной, премиальной косметикой и махровыми халатами. Ощутите себя как дома.</p>
                <p>Стоимость:</p>
                <p>1 местное размещение - 8100.00 руб. / сутки.</p>
                <p>2х местное размещение - 9400.00 руб. / сутки. </p>
                <p>Завтрак включен.</p>
                <div class="modal-bottom">
                    <div class="modal-price">8100.00 руб.<span>/ сутки</span></div>
                    <button class="btn-reserve-room" onclick="closeModal('modal-desc-7'); openModal('modal-book-7')">ЗАБРОНИРОВАТЬ</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal-desc-8" class="modal-overlay" onclick="closeModalOutside(event)">
    <div class="modal-window">
        <span class="modal-close" onclick="closeModal('modal-desc-8')">×</span>
        <div class="modal-content">
            <div class="modal-gallery">
                <img src="img/Номера/Люкс+/1 (1).jpg" class="modal-main-img">
                <div class="modal-thumbs">
                    <img src="img/Номера/Люкс+/1 (1).jpg" onclick="changeModalImg(this, 'modal-desc-8')">
                    <img src="img/Номера/Люкс+/3.jpg" onclick="changeModalImg(this, 'modal-desc-8')">
                    <img src="img/Номера/Люкс+/6.jpg" onclick="changeModalImg(this, 'modal-desc-8')">
                    <img src="img/Номера/Люкс+/8.jpg" onclick="changeModalImg(this, 'modal-desc-8')">
                    <img src="img/Номера/Люкс+/9.jpg" onclick="changeModalImg(this, 'modal-desc-8')">
                </div>
            </div>
            <div class="modal-info">
                <h2>Люкс +</h2>
                <p class="modal-desc">Роскошный номер с уникальной планировкой, разделенный на три функциональные зоны: кабинет, гостиная и спальня. Интерьер выполнен в светлых, строгих и элегантных тонах, создающих ощущение чистоты и простора. Спальня имеет большую кровать с мягким изголовьем и огромный шкаф-купе. Гостиная оснащена удобным диваном, а кабинет — полноценным рабочим местом с компьютером и печатной техникой. Очень просторный санузел и дополнительный гостевой туалет обеспечивают максимальный уровень комфорта. Отличный вариант для премиальных гостей и руководителей.</p>
                <p>Стоимость:</p>
                <p>1 местное размещение - 8100.00 руб. / сутки.</p>
                <p>2х местное размещение - 9400.00 руб. / сутки. </p>
                <p>Завтрак включен.</p>
                <div class="modal-bottom">
                    <div class="modal-price">8100.00 руб.<span>/ сутки</span></div>
                    <button class="btn-reserve-room" onclick="closeModal('modal-desc-8'); openModal('modal-book-8')">ЗАБРОНИРОВАТЬ</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- =========================================================== -->
<!-- МОДАЛЬНЫЕ ОКНА (ФОРМЫ БРОНИРОВАНИЯ)                        -->
<!-- =========================================================== -->

<!-- =========================================================== -->
<!-- МОДАЛЬНЫЕ ОКНА (ФОРМЫ БРОНИРОВАНИЯ) - 8 ШТУК                -->
<!-- =========================================================== -->

<div id="modal-book-1" class="modal-overlay" onclick="closeModalOutside(event)">
    <div class="modal-window modal-form-window">
        <span class="modal-close" onclick="closeModal('modal-book-1')">×</span>
        <div class="modal-form-content">
            <h2 class="modal-form-title">Бронирование: Одноместный номер первой категории</h2>
            <form action="#" method="POST" class="booking-form">
                <div class="form-row">
                    <div class="form-group">
                        <label for="fio">ФИО <span class="required">*</span></label>
                        <input type="text" id="fio" name="fio" placeholder="Иванов Иван Иванович" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Телефон <span class="required">*</span></label>
                        <input type="tel" id="phone" name="phone" placeholder="+7 (900) 000-00-00" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="example@mail.ru">
                </div>
                <div class="form-row-dates">
                    <div class="form-group date-group">
                        <label>Дата заезда:</label>
                        <input type="date" name="checkin" required>
                    </div>
                    <div class="form-group date-group">
                        <label>Дата выезда:</label>
                        <input type="date" name="checkout" required>
                    </div>
                </div>
                <div class="form-row-counters">
                    <div class="form-group counter-group">
                        <label>Количество номеров:</label>
                        <select name="rooms_count"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select>
                    </div>
                    <div class="form-group counter-group">
                        <label>Взрослых:</label>
                        <select name="adults"><option value="1">1</option><option value="2" selected>2</option><option value="3">3</option><option value="4">4</option></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Текстовое сообщение / Пожелания</label>
                    <textarea id="message" name="message" rows="3" placeholder="Напишите ваши пожелания..."></textarea>
                </div>
                <div class="form-submit-row">
                    <button type="submit" class="btn-submit-form">ОТПРАВИТЬ ЗАЯВКУ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modal-book-2" class="modal-overlay" onclick="closeModalOutside(event)">
    <div class="modal-window modal-form-window">
        <span class="modal-close" onclick="closeModal('modal-book-2')">×</span>
        <div class="modal-form-content">
            <h2 class="modal-form-title">Бронирование: Двухместный номер первой категории</h2>
            <form action="#" method="POST" class="booking-form">
                <div class="form-row">
                    <div class="form-group">
                        <label for="fio">ФИО <span class="required">*</span></label>
                        <input type="text" id="fio" name="fio" placeholder="Иванов Иван Иванович" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Телефон <span class="required">*</span></label>
                        <input type="tel" id="phone" name="phone" placeholder="+7 (900) 000-00-00" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="example@mail.ru">
                </div>
                <div class="form-row-dates">
                    <div class="form-group date-group">
                        <label>Дата заезда:</label>
                        <input type="date" name="checkin" required>
                    </div>
                    <div class="form-group date-group">
                        <label>Дата выезда:</label>
                        <input type="date" name="checkout" required>
                    </div>
                </div>
                <div class="form-row-counters">
                    <div class="form-group counter-group">
                        <label>Количество номеров:</label>
                        <select name="rooms_count"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select>
                    </div>
                    <div class="form-group counter-group">
                        <label>Взрослых:</label>
                        <select name="adults"><option value="1">1</option><option value="2" selected>2</option><option value="3">3</option><option value="4">4</option></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Текстовое сообщение / Пожелания</label>
                    <textarea id="message" name="message" rows="3" placeholder="Напишите ваши пожелания..."></textarea>
                </div>
                <div class="form-submit-row">
                    <button type="submit" class="btn-submit-form">ОТПРАВИТЬ ЗАЯВКУ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modal-book-3" class="modal-overlay" onclick="closeModalOutside(event)">
    <div class="modal-window modal-form-window">
        <span class="modal-close" onclick="closeModal('modal-book-3')">×</span>
        <div class="modal-form-content">
            <h2 class="modal-form-title">Бронирование: Двухместный номер первой категории. Премиум.</h2>
            <form action="#" method="POST" class="booking-form">
                <div class="form-row">
                    <div class="form-group">
                        <label for="fio">ФИО <span class="required">*</span></label>
                        <input type="text" id="fio" name="fio" placeholder="Иванов Иван Иванович" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Телефон <span class="required">*</span></label>
                        <input type="tel" id="phone" name="phone" placeholder="+7 (900) 000-00-00" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="example@mail.ru">
                </div>
                <div class="form-row-dates">
                    <div class="form-group date-group">
                        <label>Дата заезда:</label>
                        <input type="date" name="checkin" required>
                    </div>
                    <div class="form-group date-group">
                        <label>Дата выезда:</label>
                        <input type="date" name="checkout" required>
                    </div>
                </div>
                <div class="form-row-counters">
                    <div class="form-group counter-group">
                        <label>Количество номеров:</label>
                        <select name="rooms_count"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select>
                    </div>
                    <div class="form-group counter-group">
                        <label>Взрослых:</label>
                        <select name="adults"><option value="1">1</option><option value="2" selected>2</option><option value="3">3</option><option value="4">4</option></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Текстовое сообщение / Пожелания</label>
                    <textarea id="message" name="message" rows="3" placeholder="Напишите ваши пожелания..."></textarea>
                </div>
                <div class="form-submit-row">
                    <button type="submit" class="btn-submit-form">ОТПРАВИТЬ ЗАЯВКУ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modal-book-4" class="modal-overlay" onclick="closeModalOutside(event)">
    <div class="modal-window modal-form-window">
        <span class="modal-close" onclick="closeModal('modal-book-4')">×</span>
        <div class="modal-form-content">
            <h2 class="modal-form-title">Бронирование: Трехместный номер первой категории</h2>
            <form action="#" method="POST" class="booking-form">
                <div class="form-row">
                    <div class="form-group">
                        <label for="fio">ФИО <span class="required">*</span></label>
                        <input type="text" id="fio" name="fio" placeholder="Иванов Иван Иванович" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Телефон <span class="required">*</span></label>
                        <input type="tel" id="phone" name="phone" placeholder="+7 (900) 000-00-00" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="example@mail.ru">
                </div>
                <div class="form-row-dates">
                    <div class="form-group date-group">
                        <label>Дата заезда:</label>
                        <input type="date" name="checkin" required>
                    </div>
                    <div class="form-group date-group">
                        <label>Дата выезда:</label>
                        <input type="date" name="checkout" required>
                    </div>
                </div>
                <div class="form-row-counters">
                    <div class="form-group counter-group">
                        <label>Количество номеров:</label>
                        <select name="rooms_count"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select>
                    </div>
                    <div class="form-group counter-group">
                        <label>Взрослых:</label>
                        <select name="adults"><option value="1">1</option><option value="2" selected>2</option><option value="3">3</option><option value="4">4</option></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Текстовое сообщение / Пожелания</label>
                    <textarea id="message" name="message" rows="3" placeholder="Напишите ваши пожелания..."></textarea>
                </div>
                <div class="form-submit-row">
                    <button type="submit" class="btn-submit-form">ОТПРАВИТЬ ЗАЯВКУ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modal-book-5" class="modal-overlay" onclick="closeModalOutside(event)">
    <div class="modal-window modal-form-window">
        <span class="modal-close" onclick="closeModal('modal-book-5')">×</span>
        <div class="modal-form-content">
            <h2 class="modal-form-title">Бронирование: Студия</h2>
            <form action="#" method="POST" class="booking-form">
                <div class="form-row">
                    <div class="form-group">
                        <label for="fio">ФИО <span class="required">*</span></label>
                        <input type="text" id="fio" name="fio" placeholder="Иванов Иван Иванович" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Телефон <span class="required">*</span></label>
                        <input type="tel" id="phone" name="phone" placeholder="+7 (900) 000-00-00" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="example@mail.ru">
                </div>
                <div class="form-row-dates">
                    <div class="form-group date-group">
                        <label>Дата заезда:</label>
                        <input type="date" name="checkin" required>
                    </div>
                    <div class="form-group date-group">
                        <label>Дата выезда:</label>
                        <input type="date" name="checkout" required>
                    </div>
                </div>
                <div class="form-row-counters">
                    <div class="form-group counter-group">
                        <label>Количество номеров:</label>
                        <select name="rooms_count"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select>
                    </div>
                    <div class="form-group counter-group">
                        <label>Взрослых:</label>
                        <select name="adults"><option value="1">1</option><option value="2" selected>2</option><option value="3">3</option><option value="4">4</option></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Текстовое сообщение / Пожелания</label>
                    <textarea id="message" name="message" rows="3" placeholder="Напишите ваши пожелания..."></textarea>
                </div>
                <div class="form-submit-row">
                    <button type="submit" class="btn-submit-form">ОТПРАВИТЬ ЗАЯВКУ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modal-book-6" class="modal-overlay" onclick="closeModalOutside(event)">
    <div class="modal-window modal-form-window">
        <span class="modal-close" onclick="closeModal('modal-book-6')">×</span>
        <div class="modal-form-content">
            <h2 class="modal-form-title">Бронирование: Cвадебный номер. Cтудия</h2>
            <form action="#" method="POST" class="booking-form">
                <div class="form-row">
                    <div class="form-group">
                        <label for="fio">ФИО <span class="required">*</span></label>
                        <input type="text" id="fio" name="fio" placeholder="Иванов Иван Иванович" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Телефон <span class="required">*</span></label>
                        <input type="tel" id="phone" name="phone" placeholder="+7 (900) 000-00-00" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="example@mail.ru">
                </div>
                <div class="form-row-dates">
                    <div class="form-group date-group">
                        <label>Дата заезда:</label>
                        <input type="date" name="checkin" required>
                    </div>
                    <div class="form-group date-group">
                        <label>Дата выезда:</label>
                        <input type="date" name="checkout" required>
                    </div>
                </div>
                <div class="form-row-counters">
                    <div class="form-group counter-group">
                        <label>Количество номеров:</label>
                        <select name="rooms_count"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select>
                    </div>
                    <div class="form-group counter-group">
                        <label>Взрослых:</label>
                        <select name="adults"><option value="1">1</option><option value="2" selected>2</option><option value="3">3</option><option value="4">4</option></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Текстовое сообщение / Пожелания</label>
                    <textarea id="message" name="message" rows="3" placeholder="Напишите ваши пожелания..."></textarea>
                </div>
                <div class="form-submit-row">
                    <button type="submit" class="btn-submit-form">ОТПРАВИТЬ ЗАЯВКУ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modal-book-7" class="modal-overlay" onclick="closeModalOutside(event)">
    <div class="modal-window modal-form-window">
        <span class="modal-close" onclick="closeModal('modal-book-7')">×</span>
        <div class="modal-form-content">
            <h2 class="modal-form-title">Бронирование: Люкс</h2>
            <form action="#" method="POST" class="booking-form">
                <div class="form-row">
                    <div class="form-group">
                        <label for="fio">ФИО <span class="required">*</span></label>
                        <input type="text" id="fio" name="fio" placeholder="Иванов Иван Иванович" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Телефон <span class="required">*</span></label>
                        <input type="tel" id="phone" name="phone" placeholder="+7 (900) 000-00-00" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="example@mail.ru">
                </div>
                <div class="form-row-dates">
                    <div class="form-group date-group">
                        <label>Дата заезда:</label>
                        <input type="date" name="checkin" required>
                    </div>
                    <div class="form-group date-group">
                        <label>Дата выезда:</label>
                        <input type="date" name="checkout" required>
                    </div>
                </div>
                <div class="form-row-counters">
                    <div class="form-group counter-group">
                        <label>Количество номеров:</label>
                        <select name="rooms_count"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select>
                    </div>
                    <div class="form-group counter-group">
                        <label>Взрослых:</label>
                        <select name="adults"><option value="1">1</option><option value="2" selected>2</option><option value="3">3</option><option value="4">4</option></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Текстовое сообщение / Пожелания</label>
                    <textarea id="message" name="message" rows="3" placeholder="Напишите ваши пожелания..."></textarea>
                </div>
                <div class="form-submit-row">
                    <button type="submit" class="btn-submit-form">ОТПРАВИТЬ ЗАЯВКУ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modal-book-8" class="modal-overlay" onclick="closeModalOutside(event)">
    <div class="modal-window modal-form-window">
        <span class="modal-close" onclick="closeModal('modal-book-8')">×</span>
        <div class="modal-form-content">
            <h2 class="modal-form-title">Бронирование: Люкс +</h2>
            <form action="#" method="POST" class="booking-form">
                <div class="form-row">
                    <div class="form-group">
                        <label for="fio">ФИО <span class="required">*</span></label>
                        <input type="text" id="fio" name="fio" placeholder="Иванов Иван Иванович" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Телефон <span class="required">*</span></label>
                        <input type="tel" id="phone" name="phone" placeholder="+7 (900) 000-00-00" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="example@mail.ru">
                </div>
                <div class="form-row-dates">
                    <div class="form-group date-group">
                        <label>Дата заезда:</label>
                        <input type="date" name="checkin" required>
                    </div>
                    <div class="form-group date-group">
                        <label>Дата выезда:</label>
                        <input type="date" name="checkout" required>
                    </div>
                </div>
                <div class="form-row-counters">
                    <div class="form-group counter-group">
                        <label>Количество номеров:</label>
                        <select name="rooms_count"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select>
                    </div>
                    <div class="form-group counter-group">
                        <label>Взрослых:</label>
                        <select name="adults"><option value="1">1</option><option value="2" selected>2</option><option value="3">3</option><option value="4">4</option></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Текстовое сообщение / Пожелания</label>
                    <textarea id="message" name="message" rows="3" placeholder="Напишите ваши пожелания..."></textarea>
                </div>
                <div class="form-submit-row">
                    <button type="submit" class="btn-submit-form">ОТПРАВИТЬ ЗАЯВКУ</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // Функция открытия окна
    function openModal(modalId) {
        var modal = document.getElementById(modalId);
        if(modal) {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }

    // Функция закрытия окна
    function closeModal(modalId) {
        var modal = document.getElementById(modalId);
        if(modal) {
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }
    }

    // Закрытие по клику на темный фон
    function closeModalOutside(event) {
        if (event.target === event.currentTarget) {
            event.target.classList.remove('active');
            document.body.style.overflow = 'auto';
        }
    }

    // Смена фото в галерее
    function changeModalImg(thumbElement, modalId) {
        var modal = document.getElementById(modalId);
        var mainImg = modal.querySelector('.modal-main-img');
        if(mainImg && thumbElement) {
            mainImg.src = thumbElement.src;
        }
    }
</script>

<?php include 'includes/footer.php'; ?>
</body>
</html>
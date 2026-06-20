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
                    <!-- Карточка 1: Одноместный номер первой категории -->
                    <div class="room-card" onclick="openModal('modal-1')">
                        <div class="room-card-img">
                            <img src="img/Номера/Одноместный номер первой категории\1 (1).jpg" alt="Стандарт">
                        </div>
                        <div class="room-card-content">
                            <h3 class="room-card-title">Одноместный номер первой категории</h3>
                            <p class="room-card-desc">Уютные однокомнатные номера в классическом стиле с большой двуспальной кроватью.</p>
                            <div class="room-card-bottom">
                                <div class="room-card-price">4200.00 руб./сут.</div>
                                <a class="btn-reserve-card">ПОДРОБНЕЕ</a>
                                <a href="#" class="btn-reserve-room">ЗАБРОНИРОВАТЬ</a>
                            </div>
                        </div>
                    </div>

                    <!-- Карточка 2: Двухместный номер первой категории -->
                    <div class="room-card" onclick="openModal('modal-2')">
                        <div class="room-card-img">
                            <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=800&auto=format&fit=crop" alt="Премиум">
                        </div>
                        <div class="room-card-content">
                            <h3 class="room-card-title">Двухместный номер первой категории</h3>
                            <p class="room-card-desc">Комфортный номер с двумя раздельными либо 1 большой кроватью. Идеален для группового заезда.</p>
                            <div class="room-card-bottom">
                                <div class="room-card-price">4200.00 руб./сут.</div>
                                <a class="btn-reserve-card">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                    </div>
                    <!-- Карточка 3: Двухместный номер первой категории. Премиум. -->
                    <div class="room-card" onclick="openModal('modal-3')">
                        <div class="room-card-img">
                            <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?q=80&w=800&auto=format&fit=crop" alt="Стандарт">
                        </div>
                        <div class="room-card-content">
                            <h3 class="room-card-title">Двухместный номер первой категории. Премиум.</h3>
                            <p class="room-card-desc">Уютные однокомнатные номера в классическом стиле с большой двуспальной кроватью.</p>
                            <div class="room-card-bottom">
                                <div class="room-card-price">5600.00 руб./сут.</div>
                                <a class="btn-reserve-card">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                    </div>
                    <!-- Карточка 4: Трехместный номер первой категории -->
                    <div class="room-card" onclick="openModal('modal-4')">
                        <div class="room-card-img">
                            <img src="https://images.unsplash.com/photo-1582719478250-c89dae6c2c4d?q=80&w=800&auto=format&fit=crop" alt="Люкс">
                        </div>
                        <div class="room-card-content">
                            <h3 class="room-card-title">Трехместный номер первой категории</h3>
                            <p class="room-card-desc">Просторный номер класса Люкс с гостиной зоной, панорамными окнами и премиальным сервисом.</p>
                            <div class="room-card-bottom">
                                <div class="room-card-price">4200.00 руб./сут.</div>
                                <a class="btn-reserve-card">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                    </div>
                    <!-- Карточка 5: Студия -->
                    <div class="room-card" onclick="openModal('modal-5')">
                        <div class="room-card-img">
                            <img src="https://images.unsplash.com/photo-1582719478250-c89dae6c2c4d?q=80&w=800&auto=format&fit=crop" alt="Люкс">
                        </div>
                        <div class="room-card-content">
                            <h3 class="room-card-title">Студия</h3>
                            <p class="room-card-desc">Просторный номер класса Люкс с гостиной зоной, панорамными окнами и премиальным сервисом.</p>
                            <div class="room-card-bottom">
                                <div class="room-card-price">7500.00 руб./сут.</div>
                                <a class="btn-reserve-card">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                    </div>
                    <!-- Карточка 6: Cвадебный номер. Cтудия -->
                    <div class="room-card" onclick="openModal('modal-6')">
                        <div class="room-card-img">
                            <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=800&auto=format&fit=crop" alt="Премиум">
                        </div>
                        <div class="room-card-content">
                            <h3 class="room-card-title">Cвадебный номер. Cтудия</h3>
                            <p class="room-card-desc">Комфортный номер с двумя раздельными либо 1 большой кроватью. Идеален для группового заезда.</p>
                            <div class="room-card-bottom">
                                <div class="room-card-price">7500.00 руб./сут.</div>
                                <a class="btn-reserve-card">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                    </div>
        

                    <!-- Карточка 7: Люкс -->
                    <div class="room-card" onclick="openModal('modal-7')">
                        <div class="room-card-img">
                            <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=800&auto=format&fit=crop" alt="Премиум">
                        </div>
                        <div class="room-card-content">
                            <h3 class="room-card-title">Люкс</h3>
                            <p class="room-card-desc">Комфортный номер с двумя раздельными либо 1 большой кроватью. Идеален для группового заезда.</p>
                            <div class="room-card-bottom">
                                <div class="room-card-price">8100.00 руб./сут.</div>
                                <a class="btn-reserve-card">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                    </div>

                    <!-- Карточка 8: Люкс+ -->
                    <div class="room-card" onclick="openModal('modal-8')">
                        <div class="room-card-img">
                            <img src="https://images.unsplash.com/photo-1582719478250-c89dae6c2c4d?q=80&w=800&auto=format&fit=crop" alt="Люкс">
                        </div>
                        <div class="room-card-content">
                            <h3 class="room-card-title">Люкс+</h3>
                            <p class="room-card-desc">Просторный номер класса Люкс с гостиной зоной, панорамными окнами и премиальным сервисом.</p>
                            <div class="room-card-bottom">
                                <div class="room-card-price">8600.00 руб./сут.</div>
                                <a class="btn-reserve-card">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                    </div>
    


                </div>
            </div>
        </div>
    </section>
</main>

<!-- =============================================== -->
<!-- МОДАЛЬНЫЕ ОКНА (Всплывающие окна с деталями) -->
<!-- =============================================== -->

<!-- Окно 1: Одноместный номер первой категории -->
<div id="modal-1" class="modal-overlay" onclick="closeModalOutside(event)">
    <div class="modal-window">
        <span class="modal-close" onclick="closeModal('modal-1')">×</span>
        <div class="modal-content">
            <div class="modal-gallery">
                <img src="img/Номера/Одноместный номер первой категории\1 (1).jpg" class="modal-main-img" alt="Фото номера">
                <div class="modal-thumbs">
                    <img src="img/Номера/Одноместный номер первой категории\1 (1).jpg" onclick="changeModalImg(this, 'modal-1')">
                    <img src="img/Номера/Одноместный номер первой категории\2.jpg" onclick="changeModalImg(this, 'modal-1')">
                    <img src="img/Номера/Одноместный номер первой категории\3.jpg" onclick="changeModalImg(this, 'modal-1')">
                </div>
            </div>
            <div class="modal-info">
                <h2>Одноместный номер первой категории</h2>
                <p class="modal-desc">Практичный и комфортабельный номер для одного гостя, выполненный в строгом, деловом стиле. В номере есть всё необходимое для комфортного проживания и работы: односпальная кровать, просторный письменный стол, кресло для отдыха и телевизор. Большое окно с плотными шторами гарантирует тишину и спокойный сон.</p>
                <div class="modal-bottom">
                    <div class="modal-price">4200.00 руб. <span>/ сутки</span></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Окно 2: Премиум -->
<div id="modal-2" class="modal-overlay" onclick="closeModalOutside(event)">
    <div class="modal-window">
        <span class="modal-close" onclick="closeModal('modal-2')">×</span>
        <div class="modal-content">
            <div class="modal-gallery">
                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=800&auto=format&fit=crop" class="modal-main-img" alt="Фото номера">
                <div class="modal-thumbs">
                    <img src="https://images.unsplash.com/photo-1618773928121-c32242e63f39?q=80&w=200&auto=format&fit=crop" onclick="changeModalImg(this, 'modal-2')">
                    <img src="https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?q=80&w=200&auto=format&fit=crop" onclick="changeModalImg(this, 'modal-2')">
                    <img src="https://images.unsplash.com/photo-1582719478250-c89dae6c2c4d?q=80&w=200&auto=format&fit=crop" onclick="changeModalImg(this, 'modal-2')">
                </div>
            </div>
            <div class="modal-info">
                <h2>Премиум номер</h2>
                <p class="modal-desc">Комфортный номер с двумя раздельными либо одной большой кроватью. Просторное помещение идеально подходит для деловых встреч или группового заезда. Панорамные окна и улучшенная шумоизоляция.</p>
                <div class="modal-features">
                    <span>⬜ 30 м²</span>
                    <span>👤 До 4 гостей</span>
                    <span>🛏 2 кровати</span>
                </div>
                <div class="modal-bottom">
                    <div class="modal-price">5 700 ₽ <span>/ сутки</span></div>
                    <a href="#" class="btn-reserve-room">ЗАБРОНИРОВАТЬ</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Окно 3: Люкс -->
<div id="modal-3" class="modal-overlay" onclick="closeModalOutside(event)">
    <div class="modal-window">
        <span class="modal-close" onclick="closeModal('modal-3')">×</span>
        <div class="modal-content">
            <div class="modal-gallery">
                <img src="https://images.unsplash.com/photo-1582719478250-c89dae6c2c4d?q=80&w=800&auto=format&fit=crop" class="modal-main-img" alt="Фото номера">
                <div class="modal-thumbs">
                    <img src="https://images.unsplash.com/photo-1618773928121-c32242e63f39?q=80&w=200&auto=format&fit=crop" onclick="changeModalImg(this, 'modal-3')">
                    <img src="https://images.unsplash.com/photo-1522771753033-748a2d32395c?q=80&w=200&auto=format&fit=crop" onclick="changeModalImg(this, 'modal-3')">
                    <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?q=80&w=200&auto=format&fit=crop" onclick="changeModalImg(this, 'modal-3')">
                </div>
            </div>
            <div class="modal-info">
                <h2>Номер Люкс</h2>
                <p class="modal-desc">Максимальный комфорт для самых взыскательных гостей. Номер состоит из спальни и гостиной зоны. В номере: премиальная косметика, халаты, тапочки, мини-бар и кофемашина.</p>
                <div class="modal-features">
                    <span>⬜ 45 м²</span>
                    <span>👤 До 2 гостей</span>
                    <span>🛏 1 большая кровать</span>
                </div>
                <div class="modal-bottom">
                    <div class="modal-price">9 500 ₽ <span>/ сутки</span></div>
                    <a href="#" class="btn-reserve-room">ЗАБРОНИРОВАТЬ</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Окно 4: Студия -->
<div id="modal-4" class="modal-overlay" onclick="closeModalOutside(event)">
    <div class="modal-window">
        <span class="modal-close" onclick="closeModal('modal-4')">×</span>
        <div class="modal-content">
            <div class="modal-gallery">
                <img src="https://images.unsplash.com/photo-1618773928121-c32242e63f39?q=80&w=800&auto=format&fit=crop" class="modal-main-img" alt="Фото номера">
                <div class="modal-thumbs">
                    <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?q=80&w=200&auto=format&fit=crop" onclick="changeModalImg(this, 'modal-4')">
                    <img src="https://images.unsplash.com/photo-1582719478250-c89dae6c2c4d?q=80&w=200&auto=format&fit=crop" onclick="changeModalImg(this, 'modal-4')">
                    <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=200&auto=format&fit=crop" onclick="changeModalImg(this, 'modal-4')">
                </div>
            </div>
            <div class="modal-info">
                <h2>Номер Студия</h2>
                <p class="modal-desc">Современный дизайн с открытой планировкой. Спальня объединена с мини-гостиной. Отлично подходит для молодежных пар и командировок. Есть рабочая зона.</p>
                <div class="modal-features">
                    <span>⬜ 22 м²</span>
                    <span>👤 До 2 гостей</span>
                    <span>🛏 1 кровать</span>
                </div>
                <div class="modal-bottom">
                    <div class="modal-price">3 900 ₽ <span>/ сутки</span></div>
                    <a href="#" class="btn-reserve-room">ЗАБРОНИРОВАТЬ</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Окно 1: Стандарт -->
<div id="modal-5" class="modal-overlay" onclick="closeModalOutside(event)">
    <div class="modal-window">
        <span class="modal-close" onclick="closeModal('modal-5')">×</span>
        <div class="modal-content">
            <div class="modal-gallery">
                <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?q=80&w=800&auto=format&fit=crop" class="modal-main-img" alt="Фото номера">
                <div class="modal-thumbs">
                    <img src="https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?q=80&w=200&auto=format&fit=crop" onclick="changeModalImg(this, 'modal-5')">
                    <img src="https://images.unsplash.com/photo-1582719478250-c89dae6c2c4d?q=80&w=200&auto=format&fit=crop" onclick="changeModalImg(this, 'modal-5')">
                    <img src="https://images.unsplash.com/photo-1522771753033-748a2d32395c?q=80&w=200&auto=format&fit=crop" onclick="changeModalImg(this, 'modal-5')">
                </div>
            </div>
            <div class="modal-info">
                <h2>Стандартный номер</h2>
                <p class="modal-desc">Уютный однокомнатный номер в классическом стиле с большой двуспальной кроватью. В номере есть кондиционер, телевизор, холодильник и бесплатный Wi-Fi. Ванная комната укомплектована всеми необходимыми принадлежностями.</p>
                <div class="modal-bottom">
                    <div class="modal-price">4 700 ₽ <span>/ сутки</span></div>
                    <a href="#" class="btn-reserve-room">ЗАБРОНИРОВАТЬ</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Окно 2: Премиум -->
<div id="modal-6" class="modal-overlay" onclick="closeModalOutside(event)">
    <div class="modal-window">
        <span class="modal-close" onclick="closeModal('modal-6')">×</span>
        <div class="modal-content">
            <div class="modal-gallery">
                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=800&auto=format&fit=crop" class="modal-main-img" alt="Фото номера">
                <div class="modal-thumbs">
                    <img src="https://images.unsplash.com/photo-1618773928121-c32242e63f39?q=80&w=200&auto=format&fit=crop" onclick="changeModalImg(this, 'modal-6')">
                    <img src="https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?q=80&w=200&auto=format&fit=crop" onclick="changeModalImg(this, 'modal-6')">
                    <img src="https://images.unsplash.com/photo-1582719478250-c89dae6c2c4d?q=80&w=200&auto=format&fit=crop" onclick="changeModalImg(this, 'modal-6')">
                </div>
            </div>
            <div class="modal-info">
                <h2>Премиум номер</h2>
                <p class="modal-desc">Комфортный номер с двумя раздельными либо одной большой кроватью. Просторное помещение идеально подходит для деловых встреч или группового заезда. Панорамные окна и улучшенная шумоизоляция.</p>
                <div class="modal-bottom">
                    <div class="modal-price">5 700 ₽ <span>/ сутки</span></div>
                    <a href="#" class="btn-reserve-room">ЗАБРОНИРОВАТЬ</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Окно 3: Люкс -->
<div id="modal-6" class="modal-overlay" onclick="closeModalOutside(event)">
    <div class="modal-window">
        <span class="modal-close" onclick="closeModal('modal-7')">×</span>
        <div class="modal-content">
            <div class="modal-gallery">
                <img src="https://images.unsplash.com/photo-1582719478250-c89dae6c2c4d?q=80&w=800&auto=format&fit=crop" class="modal-main-img" alt="Фото номера">
                <div class="modal-thumbs">
                    <img src="https://images.unsplash.com/photo-1618773928121-c32242e63f39?q=80&w=200&auto=format&fit=crop" onclick="changeModalImg(this, 'modal-7')">
                    <img src="https://images.unsplash.com/photo-1522771753033-748a2d32395c?q=80&w=200&auto=format&fit=crop" onclick="changeModalImg(this, 'modal-7')">
                    <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?q=80&w=200&auto=format&fit=crop" onclick="changeModalImg(this, 'modal-7')">
                </div>
            </div>
            <div class="modal-info">
                <h2>Номер Люкс</h2>
                <p class="modal-desc">Максимальный комфорт для самых взыскательных гостей. Номер состоит из спальни и гостиной зоны. В номере: премиальная косметика, халаты, тапочки, мини-бар и кофемашина.</p>
                <div class="modal-bottom">
                    <div class="modal-price">9 500 ₽ <span>/ сутки</span></div>
                    <a href="#" class="btn-reserve-room">ЗАБРОНИРОВАТЬ</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Окно 4: Студия -->
<div id="modal-8" class="modal-overlay" onclick="closeModalOutside(event)">
    <div class="modal-window">
        <span class="modal-close" onclick="closeModal('modal-8')">×</span>
        <div class="modal-content">
            <div class="modal-gallery">
                <img src="https://images.unsplash.com/photo-1618773928121-c32242e63f39?q=80&w=800&auto=format&fit=crop" class="modal-main-img" alt="Фото номера">
                <div class="modal-thumbs">
                    <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?q=80&w=200&auto=format&fit=crop" onclick="changeModalImg(this, 'modal-8')">
                    <img src="https://images.unsplash.com/photo-1582719478250-c89dae6c2c4d?q=80&w=200&auto=format&fit=crop" onclick="changeModalImg(this, 'modal-8')">
                    <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=200&auto=format&fit=crop" onclick="changeModalImg(this, 'modal-8')">
                </div>
            </div>
            <div class="modal-info">
                <h2>Номер Студия</h2>
                <p class="modal-desc">Современный дизайн с открытой планировкой. Спальня объединена с мини-гостиной. Отлично подходит для молодежных пар и командировок. Есть рабочая зона.</p>
                <div class="modal-bottom">
                    <div class="modal-price">3 900 ₽ <span>/ сутки</span></div>
                    <a href="#" class="btn-reserve-room">ЗАБРОНИРОВАТЬ</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Функция открытия окна (добавляет класс active к оверлею)
    function openModal(modalId) {
        document.getElementById(modalId).classList.add('active');
        document.body.style.overflow = 'hidden'; // Блокирует прокрутку страницы за окном
    }

    // Функция закрытия окна
    function closeModal(modalId) {
        document.getElementById(modalId).classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    // Закрытие при клике на затемненную область (передается событие)
    function closeModalOutside(event) {
        if (event.target === event.currentTarget) {
            event.target.classList.remove('active');
            document.body.style.overflow = 'auto';
        }
    }

    // Смена главной картинки при клике на превьюшку
    function changeModalImg(thumbElement, modalId) {
        const modal = document.getElementById(modalId);
        const mainImg = modal.querySelector('.modal-main-img');
        // Берем src из превью и ставим в главную картинку
        mainImg.src = thumbElement.src;
    }
</script>

<?php include 'includes/footer.php'; ?>
</body>
</html>
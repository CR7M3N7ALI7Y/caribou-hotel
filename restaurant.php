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
            margin-top: 20px;
        }
        .breadcrumbs a { color: #fff; transition: var(--transition); }
        .breadcrumbs a:hover { opacity: 0.7; }
        .breadcrumbs span { color: var(--gold); }
.restaurant-intro {
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    background: #fff;
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
}

.resto-text-col {
    flex: 1 1 50%;
}

.resto-text-col h2 {
    font-weight: 600;
    font-size: 25px;
    color: var(--dark-blue);
    margin-bottom: 20px;
}

.resto-text-col p {
    font-size: 16px;
    line-height: 1.8;
    color: #555;
    margin-bottom: 15px;
}

.resto-img-col {
    flex: 1 1 40%;
}
.resto-img-col img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 8px;
    min-height: 300px;
}

.resto-highlights {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 25px;
    padding-top: 25px;
    border-top: 1px solid #eee;
}

.highlight-item {
    display: flex;
    align-items: center;
    gap: 15px;
}
.highlight-item .h-icon {
    font-size: 28px;
}
.highlight-item .h-label {
    display: block;
    font-size: 12px;
    text-transform: uppercase;
    color: #999;
    letter-spacing: 1px;
}
.highlight-item .h-value {
    display: block;
    font-size: 16px;
    font-weight: 600;
    color: var(--dark-blue);
}

        /* Меню ресторана (Сетка) */
.menu-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
}

.menu-card {
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    transition: var(--transition);
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
}
.menu-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.menu-img {
    height: 200px;
    overflow: hidden;
}
.menu-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transition);
}
.menu-card:hover .menu-img img { transform: scale(1.05); }

.menu-desc {
    padding: 20px 25px 25px;
}

.menu-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
    border-bottom: 1px dashed #eee;
    padding-bottom: 10px;
}
.menu-top h3 {
    font-size: 18px;
    color: var(--dark-blue);
}
.menu-top .menu-price {
    font-size: 16px;
    font-weight: 700;
    color: var(--gold);
}

.menu-desc p {
    font-size: 14px;
    color: #777;
    line-height: 1.6;
    margin: 0;
}

/* Адаптивность */
@media (max-width: 768px) {
    .restaurant-intro { padding: 20px; }
    .resto-text-col h2 { font-size: 20px; margin-top: 25px;}
    .menu-img { height: 180px; }
    .menu-grid { grid-template-columns: 1fr; }
    .page-title { font-size: 32px; }
}
    </style>
    <?php include 'includes/header.php'; ?>
<main>
    <!-- 1. Секция с заголовком (Hero для внутренней страницы) -->
    <section class="page-hero">
        <div class="page-hero-overlay">
            <div class="container">
                <div class="breadcrumbs">
                    <a href="index.php">Главная</a> / <span style="color: var(--dark-blue);">Ресторан</span>
                </div>
                <h1 class="page-title">РЕСТОРАН</h1>
            </div>
        </div>
    </section>
    <!-- 2. О ресторане (Текст + Фото) -->
    <section class="page-content-section">
        <div class="container">
            <div class="content-block content-block-no-shadow">
                <div class="restaurant-intro">
                    <div class="resto-text-col">
                        <h2>Гастрономический опыт в центре города</h2>
                        <p><strong>Ресторан «Карибу»</strong> расположен на 1 этаже отеля и приглашает жителей и гостей города отведать непревзойденные кулинарные шедевры.</p>
                        <p>Насладиться колоритным интерьером и прекрасным обслуживанием — это лишь малая часть того, что вас ждет. Меню не оставит равнодушным даже самого искушенного гурмана. Под руководством нашего шеф-повара традиционные блюда обретают новый, уникальный вкус.</p>
                        <p>Особого внимания заслуживают <strong>фирменные угощения из мяса оленя</strong>, которые стали визитной карточкой нашего ресторана. Каждое блюдо — это произведение искусства, приготовленное с душой.</p>
                        
                        <div class="resto-highlights">
                            <div class="highlight-item">
                                <span class="h-icon">🍽️</span>
                                <div>
                                    <span class="h-label">Часы работы</span>
                                    <span class="h-value">с 12:00 до 24:00</span>
                                </div>
                            </div>
                            <div class="highlight-item">
                                <span class="h-icon">🛎️</span>
                                <div>
                                    <span class="h-label">Заказ в номер</span>
                                    <span class="h-value">Круглосуточно</span>
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
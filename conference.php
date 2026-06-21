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

        .conf-text-block {
    flex: 1 1 50%;
    margin-top: 4%;
}

.conf-text-block h2 {
    font-family: 'Playfair Display', serif;
    font-size: 32px;
    color: var(--dark-blue);
    margin-bottom: 20px;
}

.conf-text-block p {
    font-size: 16px;
    line-height: 1.8;
    color: #555;
    margin-bottom: 15px;
}

.conf-highlight {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-top: 25px;
    padding-top: 25px;
    border-top: 1px solid #eee;
}

.conf-icon {
    background: var(--gold);
    color: #fff;
    width: 50px;
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    font-size: 24px;
}

.conf-label {
    display: block;
    font-size: 13px;
    text-transform: uppercase;
    color: #999;
    letter-spacing: 1px;
}

.conf-value {
    display: block;
    font-size: 20px;
    font-weight: 600;
    color: var(--dark-blue);
}

.conf-image-block {
    flex: 1 1 40%;
}
.conf-image-block img {
    width: 100%;
    height: 100%;
    min-height: 300px;
    object-fit: cover;
    border-radius: 8px;
}

/* Сетка оснащения (4 иконки) */
.equipment-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 30px;
}

.equip-item {
    background: #fff;
    padding: 30px 20px;
    text-align: center;
    border-radius: 8px;
    transition: var(--transition);
    box-shadow: 0 4px 15px rgba(0,0,0,0.03);
    border: 1px solid #eee;
}
.equip-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    border-color: var(--gold);
}

.equip-icon {
    font-size: 40px;
    margin-bottom: 15px;
    display: block;
}

.equip-item h4 {
    font-size: 18px;
    color: var(--dark-blue);
    margin-bottom: 10px;
}

.equip-item p {
    font-size: 14px;
    line-height: 1.5;
    color: #777;
    margin: 0;
}

/* Адаптивность */
@media (max-width: 768px) {
    .conference-wrapper { padding: 20px; flex-direction: column; }
    .conf-text-block h2 { font-size: 26px; }
    .conf-image-block img { min-height: 200px; }
    .equipment-grid { grid-template-columns: 1fr 1fr; }
}

@media (max-width: 450px) {
    .equipment-grid { grid-template-columns: 1fr; }
}
    </style>
    <?php include 'includes/header.php'; ?>
<main>
    <!-- 1. Секция с заголовком (Hero для внутренней страницы) -->
    <section class="page-hero">
        <div class="page-hero-overlay">
            <div class="container">
                <div class="breadcrumbs">
                    <a href="index.php">Главная</a> / <span style="color: black;">Конференц-зал</span>
                </div>
                <h1 class="page-title">КОНФЕРЕНЦ-ЗАЛ</h1>
            </div>
        </div>
    </section>
    <section class="page-content-section">
        <div class="container">
            <div class="content-block content-block-no-shadow">
                <div class="conference-wrapper">
                    
                    <!-- Текстовый блок -->
                    <div class="conf-text-block">
                        <h2>Проведите встречу на высшем уровне</h2>
                        <p>Вам необходимо обсудить важную сделку, заключить прибыльный контракт или просто договориться о сотрудничестве? Для этих целей как нельзя лучше подойдет более вместительная комната для переговоров.</p>
                        <p>Закрытая от посторонних глаз, эта комната — лучшее место для бизнес-решений. Она обустроена таким образом, что независимо от количества находящихся в ней людей, каждому будет комфортно обсуждать деловые вопросы.</p>
                        
                        <div class="conf-highlight">
                            <div class="conf-icon">👥</div>
                            <div>
                                <span class="conf-label">Вместимость зала</span>
                                <span class="conf-value">До 40 человек</span>
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
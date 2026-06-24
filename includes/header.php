<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Отель Карибу</title>
    <!-- Подключаем шрифты ДО стилей -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<style>
.site-header {
    position: absolute;
    top: 0; left: 0; width: 100%; z-index: 100;
    padding: 15px 40px;
    background: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0) 100%);
}

.header-container {
    max-width: 1000px; 
    margin: 0 auto;
    display: flex; 
    justify-content: space-between; 
    align-items: center; 
    flex-wrap: wrap;
}

.logo { 
    flex-shrink: 0; 
    display: flex;
    align-items: flex-start;
}
.logo img {
    display: block;
    align-items: flex-start;
    max-width: 100px; /* Максимальная ширина логотипа. Он не будет больше 100px */
    height: auto; /* Высота подстроится сама */
    width: 100%; /* Займет столько, сколько доступно */
}

.header-right-wrapper {
    display: flex;
    align-items: center;
    gap: 30px;
    flex-shrink: 0; 
}

.main-nav { 
    display: flex; 
    gap: 5px; 
    align-items: center;
}

.main-nav a { 
    color: #fff; 
    font-size: 14px; 
    letter-spacing: 1px; 
    text-transform: uppercase; 
    opacity: 0.9; 
    transition: var(--transition); 
    white-space: nowrap; 
}
.main-nav a:hover { 
    opacity: 1; 
    color: #ccc; 
}

/* Слэши между пунктами меню */
.nav-slash {
    color: rgba(255, 255, 255, 0.4); /* Бледный, полупрозрачный цвет */
    font-size: 14px;
    margin: 0 2px;
}

/* Кнопка Забронировать */
.header-actions { 
    display: flex; 
    align-items: center; 
    flex-shrink: 0; 
}
/* --- АДАПТИВНОСТЬ --- */
@media (max-width: 2560px) {
    .site-header { padding: 15px 20px; }
    .header-right-wrapper {
        flex-wrap: wrap;
        justify-content: flex-end;
        gap: 10px;
    }
}
/* --- АДАПТИВНОСТЬ --- */
@media (max-width: 1024px) {
    .site-header { padding: 15px 20px; }
    .header-right-wrapper {
        flex-wrap: wrap;
        justify-content: flex-end;
        gap: 10px;
    }
}

/* Телефоны */
@media (max-width: 768px) {
    .site-header { padding: 10px; }
    .page-hero { min-height: 250px; } /* Уменьшаем шапку на телефонах */
    .page-title { font-size: 32px; margin-top: 15px; margin-bottom: 15px;}
    .header-container { gap: 10px; }
    .header-right-wrapper { gap: 5px; }
    .main-nav a { font-size: 11px; }
    .nav-slash { font-size: 11px; }
    .btn-reservation { width: 100%; text-align: center; padding: 10px; box-sizing: border-box; }
}
.page-hero .site-header {
    position: relative; /* Меню больше не вылезает за пределы */
    background: rgba(0, 0, 0, 0.5); /* Темный фон, чтобы было красиво */
    padding-bottom: 20px; /* Даем место снизу */
    min-height: 320px;
    justify-content: flex-end;

}
/* ДОБАВИТЬ ЭТОТ БЛОК СРАЗУ ПОСЛЕ ПРЕДЫДУЩЕГО */
.page-hero .container {
    padding-top: 40px; /* ОТСТУП СВЕРХУ. Это отодвинет хлебные крошки и заголовок от меню */
}
</style>
<header class="site-header">
    <div class="header-container">
        <!-- ЛЕВАЯ ЧАСТЬ: Логотип -->
        <div class="logo">
            <a href="index.php">
                <img src="img/logo.png" alt="Логотип Карибу" style="width: 100px;">
            </a>
        </div>

        <!-- ПРАВАЯ ЧАСТЬ: Меню + Кнопка -->
        <div class="header-right-wrapper">
            <!-- Навигация -->
            <nav class="main-nav">
                <a href="about.php">Информация</a> <span class="nav-slash">/</span>
                <a href="promo.php">Конкурсы</a> <span class="nav-slash">/</span>
                <a href="rooms.php">Номера</a> <span class="nav-slash">/</span>
                <a href="restaurant.php">Ресторан</a> <span class="nav-slash">/</span>
                <a href="spa.php">Спа-салон</a> <span class="nav-slash">/</span>
                <a href="conference.php">Конференц-зал</a> <span class="nav-slash">/</span>
                <a href="contact.php">Контакты</a>
            </nav>

        </div>
        
    </div>
</header>
<?php include 'includes/header.php'; ?>
<style>
/* ВАЖНО: Убирает белую полосу справа на мобильных */
html, body { 
        overflow-x: hidden; 
    width: 100%;
    min-height: 100vh; /* Важно: позволяет странице расти вниз */
    font-family: 'Montserrat', sans-serif; 
    background-color: #f4f4f4; 
    color: #333; 
}
</style>
<main>
    <!-- 1. HERO СЕКЦИЯ СО СЛАЙДЕРОМ (Анимация на CSS) -->
    <section class="hero-slider-wrapper">
        <div class="hero-slides">
            <div class="slide slide-2" style="background-image: url('img/slider2.png');"></div>
        </div>

        <div class="hero-content">
            <h1 class="hero-title">Карибу</h1>
            <p class="hero-subtitle">Отель & Спа</p>
            <a href="rooms.php" class="bronomera">Забронировать номер</a>
        </div>
    </section>

    <!-- 2. СЕКЦИЯ ПРЕИМУЩЕСТВ -->
    <section class="features-grid">
        <a href="rooms.php" class="feature-item" style="background-image: url('img/Номера.jpg');">
            <div class="overlay">
                <h3>Номера</h3>
                <div class="icon-circle">🛏</div>
            </div>
        </a>
        <a href="restaurant.php" class="feature-item" style="background-image: url('img/Ресторан.webp');">
            <div class="overlay">
                <h3>Ресторан</h3>
                <div class="icon-circle">📍</div>
            </div>
        </a>
        <a href="spa.php" class="feature-item" style="background-image: url('img/спасалон.jpeg');">
            <div class="overlay">
                <h3>Спа-Салон</h3>
                <div class="icon-circle">🛀</div>
            </div>
        </a>
        <a href="conference.php" class="feature-item" style="background-image: url('img/конференцзал.jpeg');">
            <div class="overlay">
                <h3>Конференц-Зал</h3>
                <div class="icon-circle">💬</div>
            </div>
        </a>
    </section>

    <!-- 3. ФУТЕР -->
    <footer class="site-footer">
        <div class="footer-container">
            <div class="footer-info">
                <div class="footer-logo">
                    <span class="logo-icon">//</span> <span style="font-weight: 500;">Отель Карибу</span>
                </div>
                <p class="address">
                    г. Белоярский, Микрорайон 4А, 1<br>
                    Ханты-Мансийский автономный округ — Югра, 628162
                </p>
                <a href="contact.php" class="btn-contact">Контакты</a>
                <p class="email">Email : reception@caribou-hotel.ru</p>
                <p class="copyright">© 2026 "Карибу"</p>
            </div>
            
            <div class="footer-image">
                <img src="img/футер.jpg" alt="Отель вечером">
            </div>
        </div>
    </footer>
</main>
</body>
</html>
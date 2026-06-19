<?php include 'includes/header.php'; ?>

<main>
    <!-- 1. HERO СЕКЦИЯ СО СЛАЙДЕРОМ (Анимация на CSS) -->
    <section class="hero-slider-wrapper">
        <div class="hero-slides">
            <!-- Замените ссылки на свои локальные картинки. Сейчас стоят быстрые плейсхолдеры. -->
            <div class="slide slide-1" style="background-image: url('caribou-hotel\img\Airbrush-IMAGE-ENHANCER-1781864996781-1781864996781.png')"></div>
            <div class="slide slide-2" style="background-image: url('https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?q=80&w=1920&auto=format&fit=crop');"></div>
            <div class="slide slide-3" style="background-image: url('https://images.unsplash.com/photo-1449156285139-025ce67a2240?q=80&w=1920&auto=format&fit=crop');"></div>
        </div>

        <div class="hero-content">
            <h1 class="hero-title">Карибу</h1>
            <p class="hero-subtitle">Отель & Спа</p>
            <a href="#" class="bronomera">Забронировать номер</a>
        </div>
    </section>

    <!-- 2. СЕКЦИЯ ПРЕИМУЩЕСТВ -->
    <section class="features-grid">
        <div class="feature-item" style="background-image: url('https://images.unsplash.com/photo-1618773928121-c32242e63f39?q=80&w=800&auto=format&fit=crop');">
            <div class="overlay">
                <h3>ROOM</h3>
                <div class="icon-circle">🛏</div>
                <p>Introduction to the facilities</p>
            </div>
        </div>
        <div class="feature-item" style="background-image: url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?q=80&w=800&auto=format&fit=crop');">
            <div class="overlay">
                <h3>ACCESS</h3>
                <div class="icon-circle">📍</div>
                <p>5 minute walk from the center</p>
            </div>
        </div>
        <div class="feature-item" style="background-image: url('https://images.unsplash.com/photo-1500375592092-40eb2168fd21?q=80&w=800&auto=format&fit=crop');">
            <div class="overlay">
                <h3>LOCATION</h3>
                <div class="icon-circle">🌲</div>
                <p>Introduction to Natural Caribou</p>
            </div>
        </div>
        <div class="feature-item" style="background-image: url('https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=800&auto=format&fit=crop');">
            <div class="overlay">
                <h3>GREETINGS</h3>
                <div class="icon-circle">💬</div>
                <p>Greetings from the owner</p>
            </div>
        </div>
    </section>

    <!-- 3. ФУТЕР -->
    <footer class="site-footer">
        <div class="footer-container">
            <div class="footer-info">
                <div class="footer-logo">
                    <span class="logo-icon">//</span> CARIBOU HOTEL
                </div>
                <p class="address">
                    г. Казань, ул. Примерная, д. 1<br>
                    Республика Татарстан, 420000
                </p>
                <a href="booking.php" class="btn-contact">CONTACT</a>
                <p class="email">Email : info@caribou-hotel.ru</p>
                
                <div class="footer-links">
                    <a href="#">Sitemaps</a>
                    <a href="#">Privacy policy</a>
                </div>
                <p class="copyright">© CARIBOU HOTEL. All Rights Reserved.</p>
            </div>
            
            <div class="footer-image">
                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=1920&auto=format&fit=crop" alt="Отель вечером">
            </div>
        </div>
    </footer>
</main>

<!-- ВАЖНО: Скрипт убран полностью. Теперь слайдер работает на чистом CSS без тормозов. -->

</body>
</html>
<?php
require 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fio'])) {
    // Получаем данные из формы
    $name = $_POST['fio'];
    $phone = $_POST['phone'];
    $email = $_POST['email'] ?? '';
    $date = $_POST['checkin'];
    $time = $_POST['time'];
    $message = $_POST['message'] ?? '';

    // Вставляем в БД
    $sql = "INSERT INTO spa_bookings (name, phone, email, booking_date, booking_time, message) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$name, $phone, $email, $date, $time, $message])) {
        echo "<script>alert('Заявка успешно отправлена! Мы скоро с вами свяжемся.');</script>";
    } else {
        echo "<script>alert('Ошибка при отправке, попробуйте позже.');</script>";
    }
}

include 'includes/header.php'; 
?>

<!-- ВЕСЬ CSS ОСТАВЛЯЕМ ТУТ, НО БЕЗ ПОВТОРНОГО ПОДКЛЮЧЕНИЯ HEADER -->
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

    .spa-text-col {
        flex: 1 1 45%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin-bottom: 40px;
    }

    .spa-text-col h2 {
        font-family: 'Playfair Display', serif;
        font-size: 32px;
        color: var(--dark-blue);
        margin-top: 4%;
        margin-bottom: 20px;
    }

    .spa-text-col p {
        font-size: 16px;
        line-height: 1.8;
        color: #555;
        margin-bottom: 25px;
    }

    /* Сетка услуг */
    .spa-services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 30px;
    }

    .spa-service-card {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        transition: var(--transition);
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }
    .spa-service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    .spa-serv-img {
        height: 220px;
        overflow: hidden;
    }
    .spa-serv-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: var(--transition);
    }
    .spa-service-card:hover .spa-serv-img img {
        transform: scale(1.05);
    }

    .spa-serv-content {
        padding: 25px 25px 30px;
        position: relative;
        text-align: center;
    }

    .spa-serv-icon {
        display: inline-block;
        background: var(--gold);
        color: #fff;
        width: 60px;
        height: 60px;
        line-height: 60px;
        border-radius: 50%;
        font-size: 28px;
        margin-top: -45px;
        margin-bottom: 15px;
        box-shadow: 0 5px 15px rgba(200, 164, 83, 0.3);
    }

    .spa-serv-content h3 {
        font-size: 22px;
        color: var(--dark-blue);
        margin-bottom: 10px;
    }

    .spa-serv-content p {
        font-size: 14px;
        line-height: 1.6;
        color: #666;
        margin-bottom: 20px;
    }

    .spa-serv-bottom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 1px solid #eee;
        padding-top: 15px;
    }

    .spa-serv-price {
        font-weight: 600;
        color: var(--dark-blue);
        font-size: 15px;
    }

    .spa-serv-btn {
        background: var(--gold);
        color: #fff;
        padding: 8px 20px;
        border-radius: 4px;
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        transition: var(--transition);
    }
    .spa-serv-btn:hover {
        background: var(--dark-blue);
        transform: translateY(-2px);
    }

    .btn-reservation-large {
        display: inline-block;
        background-color: var(--gold);
        color: #fff;
        padding: 16px 50px;
        font-size: 14px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        border-radius: 4px;
        transition: var(--transition);
    }
    .btn-reservation-large:hover {
        background-color: gray;
        color: white;
    }

    /* =========================================================
    ПОЛНЫЕ СТИЛИ ФОРМЫ И МОДАЛЬНОГО ОКНА (СПА-САЛОН)
    ========================================================= */

    .modal-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.75);
        z-index: 9999;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .modal-overlay.active {
        display: flex;
        animation: fadeInModal 0.25s ease-out forwards;
    }

    .modal-window {
        background: #fff;
        max-width: 650px;
        width: 100%;
        max-height: 90vh;
        border-radius: 8px;
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.4);
        position: relative;
        overflow-y: auto;
        animation: slideUpModal 0.3s cubic-bezier(0.2, 0.9, 0.3, 1.1) forwards;
    }

    .modal-close {
        position: absolute;
        top: 15px;
        right: 20px;
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

    @keyframes fadeInModal {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    @keyframes slideUpModal {
        from { opacity: 0; transform: translateY(30px) scale(0.98); }
        to { opacity: 1; transform: translateY(0) scale(1); }
    }

    .modal-form-content {
        padding: 40px 40px 30px;
    }

    .modal-form-title {
        font-family: 'Playfair Display', serif;
        font-size: 28px;
        color: var(--dark-blue);
        text-align: center;
        margin-bottom: 30px;
    }

    .booking-form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .form-group label {
        font-size: 14px;
        font-weight: 600;
        color: #444;
    }
    .form-group .required { color: #d9534f; }

    .booking-form input[type="text"],
    .booking-form input[type="tel"],
    .booking-form input[type="email"],
    .booking-form input[type="date"],
    .booking-form input[type="time"],
    .booking-form textarea {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #e0e0e0;
        border-radius: 4px;
        font-size: 14px;
        font-family: inherit;
        color: #333;
        background: #fafafa;
        transition: all 0.3s ease;
        outline: none;
        box-sizing: border-box;
    }

    .booking-form input:focus, 
    .booking-form textarea:focus {
        border-color: var(--gold);
        background: #fff;
        box-shadow: 0 0 0 3px rgba(200, 164, 83, 0.15);
    }

    .form-row { 
        display: grid; 
        grid-template-columns: 1fr 1fr; 
        gap: 15px; 
    }

    .form-row-dates { 
        display: grid; 
        grid-template-columns: 1fr 1fr; 
        gap: 15px; 
    }

    .booking-form textarea {
        resize: vertical;
        min-height: 80px;
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
        transition: all 0.3s ease;
        width: 100%;
        margin-top: 10px;
    }
    .btn-submit-form:hover {
        background-color: var(--dark-blue);
        transform: translateY(-2px);
    }

    @media (max-width: 600px) {
        .modal-form-content { padding: 25px 20px; }
        .form-row, .form-row-dates { grid-template-columns: 1fr; }
        .modal-form-title { font-size: 24px; }
    }
    @media (max-width: 768px) {
        .spa-intro { padding: 20px; flex-direction: column; }
        .spa-img-col { flex: 1 1 100%; }
        .spa-img-col img { height: 250px; }
        .spa-text-col h2 { font-size: 26px; }
        .spa-services-grid { grid-template-columns: 1fr; }
        .spa-serv-bottom { flex-direction: column; gap: 15px; }
        .spa-serv-btn { width: 100%; text-align: center; padding: 10px; }
    }
</style>

<main>
    <!-- 1. Секция с заголовком (Hero для внутренней страницы) -->
    <section class="page-hero">
        <div class="page-hero-overlay">
            <div class="container">
                <div class="breadcrumbs">
                    <a href="index.php">Главная</a> / <span style="color: black;">Спа-салон</span>
                </div>
                <h1 class="page-title">СПА-САЛОН</h1>
            </div>
        </div>
    </section>
    <!-- 2. Философия и основное описание -->
    <section class="page-content-section">
        <div class="container">
            <div class="content-block content-block-no-shadow">
                <div class="spa-intro">
                    <div class="spa-text-col">
                        <h2>Философия спа-салона «Карибу»</h2>
                        <p><strong>Спа</strong> – три буквы, сразу говорящие о покое и умиротворении, о здоровье и красоте, внутренней гармонии.</p>
                        <p>Философия нашего спа-салона — это особый мир, который встретит вас в «Карибу». Уютный спокойный интерьер и профессиональный персонал сделают всё, чтобы ваше время прошло с максимальной пользой для души, красоты и здоровья.</p>
                        <p>Наш салон — это пространство, где вы можете забыть о суете мегаполиса и посвятить время себе.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 3. Призыв к действию (Кнопка) -->
    <section class="booking-cta" style="background-color: #f9f9f9; padding: 60px 0; text-align: center;">
        <div class="container">
            <h2 style="font-family: 'Playfair Display', serif; font-size: 34px; color: var(--dark-blue); margin-bottom: 15px;">Готовы к релаксации?</h2>
            <p style="font-size: 16px; color: #777; margin-bottom: 30px; max-width: 600px; margin-left: auto; margin-right: auto;">
                Наши двери открыты для вас. Оставьте заявку, и администратор подберет для вас идеальную процедуру.
            </p>
            <a href="javascript:void(0)" onclick="openModal('modal-spa-book')" class="btn-reservation-large">ЗАПИСАТЬСЯ НА ПРОЦЕДУРУ</a>
        </div>
    </section>
</main>

<!-- МОДАЛЬНОЕ ОКНО (УНИВЕРСАЛЬНАЯ ФОРМА ЗАПИСИ) -->
<div id="modal-spa-book" class="modal-overlay" onclick="closeModalOutside(event)">
    <div class="modal-window modal-form-window">
        <span class="modal-close" onclick="closeModal('modal-spa-book')">×</span>
        <div class="modal-form-content">
            <h2 class="modal-form-title">Запись на процедуру</h2>
            <!-- ЗДЕСЬ УБРАЛИ action="#" ТЕПЕРЬ РАБОТАЕТ -->
            <form action="" method="POST" class="booking-form">
                <div class="form-row">
                    <div class="form-group">
                        <label for="fio">Ваше имя <span class="required">*</span></label>
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
                        <label>Желаемая дата:</label>
                        <input type="date" name="checkin" required>
                    </div>
                    <div class="form-group date-group">
                        <label>Желаемое время:</label>
                        <input type="time" name="time" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Текстовое сообщение / Пожелания</label>
                    <textarea id="message" name="message" rows="4" placeholder="Напишите, какую процедуру вы хотели бы попробовать, или ваши пожелания..."></textarea>
                </div>
                <div class="form-submit-row">
                    <button type="submit" class="btn-submit-form">ОТПРАВИТЬ ЗАЯВКУ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openModal(modalId) {
        var modal = document.getElementById(modalId);
        if(modal) {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeModal(modalId) {
        var modal = document.getElementById(modalId);
        if(modal) {
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }
    }

    function closeModalOutside(event) {
        if (event.target === event.currentTarget) {
            event.target.classList.remove('active');
            document.body.style.overflow = 'auto';
        }
    }
</script>

<?php include 'includes/footer.php'; ?>
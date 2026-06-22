<?php
require 'config/database.php';

// ===== ОБРАБОТЧИК ЗАЯВОК НА БРОНИРОВАНИЕ =====
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fio'])) {
    
    $room_id = $_POST['room_id'] ?? 0;
    $name = $_POST['fio'];
    $phone = $_POST['phone'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];

    // Записываем в таблицу bookings
    $sql = "INSERT INTO bookings (room_id, guest_name, guest_phone, check_in, check_out) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$room_id, $name, $phone, $checkin, $checkout])) {
        echo "<script>alert('Спасибо, " . addslashes($name) . "! Ваша заявка принята! Мы скоро свяжемся.');</script>";
    } else {
        echo "<script>alert('Ошибка при отправке заявки, попробуйте позже.');</script>";
    }
}

include 'includes/header.php';
?>

<style>
    /* =========================================================
    СТИЛИ ДЛЯ НОМЕРОВ
    ========================================================= */
    .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
    .page-hero { position: relative; height: 300px; background-size: cover; background-position: center; display: flex; align-items: center; justify-content: center; text-align: center; color: #fff; }
    .page-hero-overlay { position: absolute; top: 0; left: 0; width: 100%; height: auto; background-image: url(img/slider2.5.png); display: flex; padding-top: 140px; }
    .page-title { font-family: 'Playfair Display', serif; font-size: 48px; letter-spacing: 5px; font-weight: 400; margin-bottom: 0px; }
    .breadcrumbs { font-size: 13px; letter-spacing: 1px; opacity: 0.8; margin-bottom: 10px; }
    .breadcrumbs a { color: #fff; transition: var(--transition); }
    .breadcrumbs a:hover { opacity: 0.7; }
    .breadcrumbs span { color: var(--gold); }
    .page-content-section { margin-top: 50px; }

    .rooms-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 40px; }
    .room-card { background: #fff; transition: var(--transition); border-radius: 4px; overflow: hidden; display: flex; flex-direction: column; cursor: pointer; }
    .room-card:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
    .room-card-img { width: 100%; height: 280px; overflow: hidden; }
    .room-card-img img { width: 100%; height: 100%; object-fit: cover; transition: var(--transition); }
    .room-card:hover .room-card-img img { transform: scale(1.03); }
    .room-card-content { padding: 25px 30px 30px; display: flex; flex-direction: column; flex-grow: 1; }
    .room-card-title {font-size: 22px; color: var(--dark-blue); letter-spacing: 1px; margin-bottom: 10px; font-weight: 600; }
    .room-card-desc { font-size: 14px; line-height: 1.6; color: #666; margin-bottom: 20px; flex-grow: 1; }
    .room-card-bottom { display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #f0f0f0; padding-top: 20px; }
    .room-card-price { font-size: 18px; font-weight: 600; color: #333; }
    .room-card-price span { font-size: 14px; color: #999; font-weight: 400; }
    .btn-reserve-card { background-color: var(--gold); color: #fff; padding: 10px 25px; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; border-radius: 4px; transition: var(--transition); }
    .btn-reserve-card:hover { background-color: gray; color: #fff; }
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
    /* Модальные окна */
    .modal-overlay { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.75); z-index: 9999; justify-content: center; align-items: center; padding: 20px; }
    .modal-overlay.active { display: flex; animation: fadeInModal 0.25s ease-out forwards; }
    .modal-window { background: #fff; max-width: 900px; width: 100%; max-height: 90vh; border-radius: 8px; box-shadow: 0 15px 50px rgba(0,0,0,0.4); position: relative; overflow-x: hidden; display: flex; flex-direction: column; animation: slideUpModal 0.3s cubic-bezier(0.2, 0.9, 0.3, 1.1) forwards; }
    .modal-close { position: absolute; top: 15px; right: 20px; font-size: 32px; font-weight: 300; color: #999; cursor: pointer; z-index: 10; transition: all 0.2s ease; line-height: 1; background: rgba(255,255,255,0.8); border-radius: 50%; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; }
    .modal-close:hover { color: #333; background: #fff; transform: rotate(90deg); }
    .modal-content { display: flex; flex-wrap: wrap; height: 100%; }
    .modal-gallery { flex: 1 1 50%; background: #f8f8f8; padding: 30px 30px 20px; display: flex; flex-direction: column; justify-content: center; }
    .modal-main-img { width: 100%; height: 300px; object-fit: cover; border-radius: 6px; margin-bottom: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
    .modal-thumbs { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; }
    .modal-thumbs img { width: 100%; height: 70px; object-fit: cover; border-radius: 4px; cursor: pointer; transition: all 0.2s ease; border: 2px solid transparent; }
    .modal-thumbs img:hover { opacity: 0.8; border-color: var(--gold); }
    .modal-info { flex: 1 1 50%; padding: 30px 35px; display: flex; flex-direction: column; }
    .modal-info h2 { font-family: 'Playfair Display', serif; font-size: 28px; color: var(--dark-blue); margin-bottom: 15px; }
    .modal-info .modal-desc { font-size: 15px; line-height: 1.7; color: #555; flex-grow: 1; margin-bottom: 20px; }
    .modal-bottom { border-top: 1px solid #eee; padding-top: 20px; display: flex; justify-content: space-between; align-items: center; }
    .modal-price { font-size: 24px; font-weight: 600; color: var(--dark-blue); }
    .modal-price span { font-size: 14px; font-weight: 400; color: #888; margin-left: 5px; }
    .btn-reserve-room { background-color: var(--gold); color: #fff; padding: 10px 10px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; border-radius: 4px; transition: all 0.3s ease; font-size: 12px; display: inline-block; }
    .btn-reserve-room:hover { background-color: gray; transform: translateY(-2px); }
    .modal-form-window { max-width: 650px; }
    .modal-form-content { padding: 40px; }
    .modal-form-title { font-family: 'Playfair Display', serif; font-size: 26px; color: var(--dark-blue); text-align: center; margin-bottom: 30px; }
    .booking-form { display: flex; flex-direction: column; gap: 15px; }
    .form-group { display: flex; flex-direction: column; gap: 5px; }
    .form-group label { font-size: 14px; font-weight: 600; color: #444; }
    .form-group .required { color: #d9534f; }
    .booking-form input[type="text"], .booking-form input[type="tel"], .booking-form input[type="email"], .booking-form input[type="date"], .booking-form select, .booking-form textarea { width: 100%; padding: 10px 15px; border: 1px solid #e0e0e0; border-radius: 4px; font-size: 14px; font-family: inherit; color: #333; background: #fafafa; transition: var(--transition); outline: none; }
    .booking-form input:focus, .booking-form select:focus, .booking-form textarea:focus { border-color: var(--gold); background: #fff; box-shadow: 0 0 0 3px rgba(200, 164, 83, 0.15); }
    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
    .form-row-dates { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
    .form-row-counters { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
    .btn-submit-form { background-color: var(--gold); color: #fff; border: none; padding: 14px 40px; font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; border-radius: 4px; cursor: pointer; transition: var(--transition); width: 100%; }
    .btn-submit-form:hover { background-color: gray; transform: translateY(-2px); }
    @keyframes fadeInModal { from { opacity: 0; } to { opacity: 1; } }
    @keyframes slideUpModal { from { opacity: 0; transform: translateY(30px) scale(0.98); } to { opacity: 1; transform: translateY(0) scale(1); } }
    @media (max-width: 768px) { .page-title { font-size: 32px; margin-bottom: 15px;} .modal-content { flex-direction: column; } .modal-gallery { padding: 15px; } .modal-main-img { height: 180px; } .modal-thumbs img { height: 50px; } .modal-info { padding: 20px; } .modal-bottom { flex-direction: column; align-items: stretch; gap: 15px; } .btn-reserve-room { width: 100%; text-align: center; } }
    @media (max-width: 768px) { .rooms-grid { grid-template-columns: 1fr; } .room-card-img { height: 220px; } .room-card-bottom { flex-direction: column; align-items: flex-start; gap: 15px; } .btn-reserve-card { width: 100%; text-align: center; padding: 12px; } }
</style>

<main>
    <section class="page-hero">
        <div class="page-hero-overlay">
            <div class="container">
                <div class="breadcrumbs">
                    <a href="index.php">Главная</a> / <span style="color: var(--dark-blue);">Номера</span>
                </div>
                <h1 class="page-title">НОМЕРА</h1>
            </div>
        </div>
    </section>

    <section class="page-content-section">
        <div class="container">
            <div class="content-block">
                <div class="rooms-grid">
                    <?php
                    // Берем все номера из базы
                    $stmt = $pdo->query("SELECT * FROM rooms ORDER BY id ASC");
                    while ($room = $stmt->fetch()) {
                        // Разбиваем список фото по запятой
                        $images = explode(',', $room['images_list']);
                        $first_img = $images[0];
                        $desc_short = mb_substr($room['description'], 0, 120) . '...';
                        
                        echo '
                        <div class="room-card" onclick="openModal(\'modal-desc-' . $room['id'] . '\')">
                            <div class="room-card-img">
                                <img src="' . $first_img . '" alt="' . $room['title'] . '">
                            </div>
                            <div class="room-card-content">
                                <h3 class="room-card-title">' . $room['title'] . '</h3>
                                <p class="room-card-desc">' . $desc_short . '</p>
                                <div class="room-card-bottom">
                                    <div class="room-card-price">' . number_format($room['price'], 2, '.', ' ') . ' руб. / сутки</div>
                                    <button class="btn-reserve-card" onclick="event.stopPropagation(); openModal(\'modal-book-' . $room['id'] . '\')">ЗАБРОНИРОВАТЬ</button>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- =========================================================== -->
<!-- МОДАЛЬНЫЕ ОКНА (ГЕНЕРИРУЮТСЯ АВТОМАТИЧЕСКИ ИЗ БАЗЫ)        -->
<!-- =========================================================== -->
<?php
// Возвращаемся к базе, чтобы сгенерировать модальные окна для каждого номера
$stmt = $pdo->query("SELECT * FROM rooms ORDER BY id ASC");
while ($room = $stmt->fetch()) {
    $images = explode(',', $room['images_list']);
    $first_img = $images[0];
    
    // Формируем миниатюры для галереи
    $thumbs_html = '';
    foreach ($images as $img) {
        $thumbs_html .= '<img src="' . $img . '" onclick="changeModalImg(this, \'modal-desc-' . $room['id'] . '\')">';
    }
    ?>

    <!-- Модалка: Описание номера -->
    <div id="modal-desc-<?= $room['id'] ?>" class="modal-overlay" onclick="closeModalOutside(event)">
        <div class="modal-window">
            <span class="modal-close" onclick="closeModal('modal-desc-<?= $room['id'] ?>')">×</span>
            <div class="modal-content">
                <div class="modal-gallery">
                    <img src="<?= $first_img ?>" class="modal-main-img">
                    <div class="modal-thumbs">
                        <?= $thumbs_html ?>
                    </div>
                </div>
                <div class="modal-info">
                    <h2><?= $room['title'] ?></h2>
                    <p class="modal-desc"><?= nl2br($room['description']) ?></p>
                    <div class="modal-bottom">
                        <div class="modal-price"><?= number_format($room['price'], 2, '.', ' ') ?> руб.<span>/ сутки</span></div>
                        <button class="btn-reserve-room" onclick="closeModal('modal-desc-<?= $room['id'] ?>'); openModal('modal-book-<?= $room['id'] ?>')">ЗАБРОНИРОВАТЬ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Модалка: Форма бронирования -->
    <div id="modal-book-<?= $room['id'] ?>" class="modal-overlay" onclick="closeModalOutside(event)">
        <div class="modal-window modal-form-window">
            <span class="modal-close" onclick="closeModal('modal-book-<?= $room['id'] ?>')">×</span>
            <div class="modal-form-content">
                <h2 class="modal-form-title">Бронирование: <?= $room['title'] ?></h2>
                <form action="" method="POST" class="booking-form">
                    <input type="hidden" name="room_id" value="<?= $room['id'] ?>">
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
<?php } ?>

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
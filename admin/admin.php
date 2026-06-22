<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
require '../config/database.php';

session_start();
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
    if ($_POST['password'] === 'admin123') {
        $_SESSION['admin_logged_in'] = true;
    } else {
        $error = 'Неверный пароль!';
    }
}

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    ?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Вход в админку</title>
        <link rel="stylesheet" href="../css/style.css">
        <style>
            body { display: flex; justify-content: center; align-items: center; height: 100vh; background: #f4f4f4; }
            .login-box { background: #fff; padding: 40px; border-radius: 8px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); text-align: center; min-width: 300px; }
            .login-box h2 { color: var(--dark-blue); margin-bottom: 20px; }
            .login-box input { width: 100%; padding: 12px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; }
            .login-box button { background: var(--gold); color: #fff; border: none; padding: 12px; width: 100%; border-radius: 4px; cursor: pointer; font-weight: 600; }
            .login-box button:hover { background: gray; }
            .error { color: red; margin-bottom: 10px; font-size: 14px; }
            
        </style>
    </head>
    <body>
        <div class="login-box">
            <h2>Вход в админку</h2>
            <?php if ($error): ?><div class="error"><?= $error ?></div><?php endif; ?>
            <form method="POST">
                <input type="password" name="password" placeholder="Введите пароль" required>
                <button type="submit">Войти</button>
            </form>
        </div>
    </body>
    </html>
    <?php
    exit;
}
?>
<style>
    body {
            overflow-x: hidden;
            margin: 0px;
            padding: 0px;
        }
        .container1 {
                color: white;
                margin-bottom: 50px;
        }
        .container1 a {
                color: white;

        }
    /* Заголовок страницы */
        .page-hero {
            position: relative;
            height: 170px;
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
            justify-content: center;
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
        

        @media (max-width: 768px) {
            .site-header { padding: 10px 15px; flex-direction: column; gap: 10px;}
            
            .hero-title { font-size: 40px; letter-spacing: 4px; }
            .hero-subtitle { font-size: 14px; letter-spacing: 4px; margin-top: 0; }
            .scroll-hint { display: none; }
            .features-grid { grid-template-columns: 1fr; }
            .feature-item { height: 250px; }

            /* Адаптация для promo.php на планшетах и телефонах */
            .page-hero { height: 200px; }
            .page-title { font-size: 28px; }
            .content-block { padding: 20px; }
            .text-content h2 { font-size: 20px; }
            
            /* Адаптация для таблиц админки на телефонах */
            main .container { padding-left: 10px; padding-right: 10px; }
            main .container > div { padding: 15px; }
            main table { font-size: 12px; }
            main table th, main table td { padding: 8px 10px !important; }
        }

        /* ПРАВКА 2: Добавлен медиа-запрос для маленьких телефонов (как 320px) */
        @media (max-width: 400px) {
            .logo { font-size: 16px; }
            .logo-text small { font-size: 8px; }
            .logo-icon { font-size: 22px; }
            .hero-title { font-size: 28px; }
            .hero-subtitle { font-size: 11px; }
            .page-hero { height: 150px; } /* Уменьшаем шапку страницы еще сильнее */
            .page-title { font-size: 22px; letter-spacing: 3px; }
            
            main table { font-size: 10px; }
            main table th, main table td { padding: 5px 8px !important; }
            .container1 { margin-bottom: 20px; }
        }

</style>
<!-- 1. Секция с заголовком (Hero для внутренней страницы) -->
            <section class="page-hero">
                <div class="page-hero-overlay">
                    <div class="container1">
                        <div class="breadcrumbs">
                            <a href="../index.php">Главная</a> / <span style="color: var(--dark-blue);">Админ</span>
                        </div>
                        <h1 class="page-title">Админ</h1>
                    </div>
                </div>
            </section>
<main style="padding-top: 0px; background: #f4f4f4; min-height: 100vh;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
    
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <h2 style="color: var(--dark-blue);">Панель управления</h2>
            <a href="logout.php" style="color: #d9534f; font-weight: 600;">Выйти</a>
        </div>
        <div style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
            
            <h3 style="margin-bottom: 20px; color: var(--gold);">📅 Заявки на номера</h3>
            <table style="width: 100%; border-collapse: collapse; margin-bottom: 40px;">
                <thead>
                    <tr style="background: var(--dark-blue); color: #fff;">
                        <th style="padding: 12px; text-align: left;">ID</th>
                        <th style="padding: 12px; text-align: left;">Имя</th>
                        <th style="padding: 12px; text-align: left;">Телефон</th>
                        <th style="padding: 12px; text-align: left;">Заезд</th>
                        <th style="padding: 12px; text-align: left;">Выезд</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stmt = $pdo->query("SELECT * FROM bookings ORDER BY created_at DESC");
                    while ($b = $stmt->fetch()):
                    ?>
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 12px;">#<?= $b['id'] ?></td>
                        <td style="padding: 12px; font-weight: 600;"><?= htmlspecialchars($b['guest_name']) ?></td>
                        <td style="padding: 12px;"><?= htmlspecialchars($b['guest_phone']) ?></td>
                        <td style="padding: 12px;"><?= $b['check_in'] ?></td>
                        <td style="padding: 12px;"><?= $b['check_out'] ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <h3 style="margin-bottom: 20px; color: var(--gold);">🧖 Заявки из СПА</h3>
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: var(--dark-blue); color: #fff;">
                        <th style="padding: 12px; text-align: left;">ID</th>
                        <th style="padding: 12px; text-align: left;">Имя</th>
                        <th style="padding: 12px; text-align: left;">Телефон</th>
                        <th style="padding: 12px; text-align: left;">Дата</th>
                        <th style="padding: 12px; text-align: left;">Время</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stmt = $pdo->query("SELECT * FROM spa_bookings ORDER BY created_at DESC");
                    while ($b = $stmt->fetch()):
                    ?>
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 12px;">#<?= $b['id'] ?></td>
                        <td style="padding: 12px; font-weight: 600;"><?= htmlspecialchars($b['name']) ?></td>
                        <td style="padding: 12px;"><?= htmlspecialchars($b['phone']) ?></td>
                        <td style="padding: 12px;"><?= $b['booking_date'] ?></td>
                        <td style="padding: 12px;"><?= $b['booking_time'] ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>
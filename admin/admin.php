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
            body { display: flex; justify-content: center; align-items: center; height: 100vh; background: #f4f4f4; font-family: 'Montserrat', sans-serif; }
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

// Чтобы меню и логотип работали правильно, мы подключаем header.php из корня
include '../includes/header.php'; 
?>

<main style="padding-top: 120px; background: #f4f4f4; min-height: 100vh;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <h2 style="font-family: 'Playfair Display', serif; color: var(--dark-blue);">Панель управления</h2>
            <a href="logout.php" style="color: #d9534f; font-weight: 600;">Выйти</a>
        </div>

        <div style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
            
            <h3 style="margin-bottom: 20px; color: var(--gold);">📅 Заявки на номера (bookings)</h3>
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

            <h3 style="margin-bottom: 20px; color: var(--gold);">🧖 Заявки из СПА (spa_bookings)</h3>
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
<?php
session_start();

$users = [
    ["username" => "admin", "password" => "123456"],
    ["username" => "staff", "password" => "abcdef"]
];

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $found = false;

    foreach ($users as $user) {
        if ($user['username'] === $username && $user['password'] === $password) {
            $_SESSION['admin'] = $username;
            $found = true;
            break;
        }
    }

    if ($found) {
        header("Location: index.php");
        exit;
    } else {
        $error = "Sai tài khoản hoặc mật khẩu!";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #f4f6f9 0%, #dbeafe 100%);
        }

        .login-card {
            width: min(100%, 420px);
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center p-3">
    <main class="login-card">
        <div class="card border-0 shadow">
            <div class="card-body p-4 p-md-5">
                <div class="mb-4 text-center">
                    <h1 class="h3 fw-bold mb-1">Đăng nhập Admin</h1>
                    <p class="text-secondary mb-0">Truy cập trang quản lý sản phẩm.</p>
                </div>

                <?php if (isset($error)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>

                <form method="POST" class="vstack gap-3">
                    <div>
                        <label class="form-label" for="username">Tên đăng nhập</label>
                        <input class="form-control form-control-lg" type="text" id="username" name="username" required autofocus>
                    </div>
                    <div>
                        <label class="form-label" for="password">Mật khẩu</label>
                        <input class="form-control form-control-lg" type="password" id="password" name="password" required>
                    </div>
                    <button class="btn btn-primary btn-lg w-100" type="submit" name="submit">Đăng nhập</button>
                </form>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

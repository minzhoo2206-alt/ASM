<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include __DIR__ . '/../data.php';
$id = $_GET['id'] ?? 0;

$product = null;
foreach ($products as $p) {
    if ($p['id'] == $id) {
        $product = $p;
        break;
    }
}

if (!$product) {
    die("Không tìm thấy sản phẩm!");
}

if (isset($_POST['submit'])) {
    foreach ($products as &$p) {
        if ($p['id'] == $id) {
            $p['name'] = $_POST['name'];
            $p['price'] = $_POST['price'];
            $p['image'] = $_POST['image'];
            $p['stock'] = $_POST['stock'];
        }
    }
    unset($p);

    $content = "<?php\n\$products = " . var_export($products, true) . ";\n?>";
    file_put_contents(__DIR__ . "/../data.php", $content);

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sửa sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f6f9;
        }

        .admin-shell {
            max-width: 760px;
        }

        .preview-img {
            width: 96px;
            height: 96px;
            object-fit: cover;
            background: #eef1f5;
        }
    </style>
</head>
<body>
    <nav class="navbar bg-white border-bottom shadow-sm">
        <div class="container admin-shell">
            <a class="navbar-brand fw-bold text-primary" href="index.php">Admin Panel</a>
            <a class="btn btn-outline-secondary btn-sm" href="index.php">Quay lại</a>
        </div>
    </nav>

    <main class="container admin-shell py-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h1 class="h4 mb-0">Sửa sản phẩm</h1>
                <span class="badge text-bg-light">ID #<?= htmlspecialchars($product['id']) ?></span>
            </div>
            <div class="card-body">
                <form method="POST" class="row g-3">
                    <div class="col-12 d-flex align-items-center gap-3">
                        <?php if (!empty($product['image'])): ?>
                            <img class="preview-img rounded border" src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                        <?php else: ?>
                            <div class="preview-img rounded border d-flex align-items-center justify-content-center text-secondary">N/A</div>
                        <?php endif; ?>
                        <div>
                            <div class="fw-semibold"><?= htmlspecialchars($product['name']) ?></div>
                            <div class="text-secondary small"><?= number_format((int)$product['price']) ?> VND</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="name">Tên sản phẩm</label>
                        <input class="form-control" type="text" id="name" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="price">Giá</label>
                        <div class="input-group">
                            <input class="form-control" type="number" id="price" name="price" min="0" value="<?= htmlspecialchars($product['price']) ?>" required>
                            <span class="input-group-text">VND</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="stock">Số lượng</label>
                        <input class="form-control" type="number" id="stock" name="stock" min="0" value="<?= htmlspecialchars($product['stock'] ?? 0) ?>" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="image">Link ảnh</label>
                        <input class="form-control" type="url" id="image" name="image" value="<?= htmlspecialchars($product['image'] ?? '') ?>" placeholder="https://...">
                    </div>
                    <div class="col-12 d-flex justify-content-end gap-2">
                        <a class="btn btn-light" href="index.php">Hủy</a>
                        <button class="btn btn-primary" type="submit" name="submit">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

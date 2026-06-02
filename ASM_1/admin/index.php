<?php
include __DIR__ . '/../data.php';

session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$totalProducts = count($products);
$totalStock = array_sum(array_map(function ($product) {
    return (int)($product['stock'] ?? 0);
}, $products));
$totalValue = array_sum(array_map(function ($product) {
    return (int)$product['price'] * (int)($product['stock'] ?? 0);
}, $products));
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f6f9;
        }

        .admin-shell {
            max-width: 1180px;
        }

        .product-thumb {
            width: 56px;
            height: 56px;
            object-fit: cover;
            background: #eef1f5;
        }

        .table > :not(caption) > * > * {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm">
        <div class="container admin-shell">
            <a class="navbar-brand fw-bold text-primary" href="index.php">Admin Panel</a>
            <div class="d-flex align-items-center gap-3">
                <span class="text-secondary small">Xin chào, <strong><?= htmlspecialchars($_SESSION['admin']) ?></strong></span>
                <a class="btn btn-outline-danger btn-sm" href="logout.php">Đăng xuất</a>
            </div>
        </div>
    </nav>

    <main class="container admin-shell py-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
            <div>
                <h1 class="h3 mb-1">Quản lý sản phẩm</h1>
                <p class="text-secondary mb-0">Theo dõi danh sách, tồn kho và giá bán sản phẩm.</p>
            </div>
            <a href="add.php" class="btn btn-primary">+ Thêm sản phẩm</a>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="text-secondary small">Tổng sản phẩm</div>
                        <div class="fs-3 fw-bold"><?= $totalProducts ?></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="text-secondary small">Tổng tồn kho</div>
                        <div class="fs-3 fw-bold"><?= $totalStock ?></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="text-secondary small">Giá trị tồn kho</div>
                        <div class="fs-5 fw-bold"><?= number_format($totalValue) ?> VND</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h2 class="h5 mb-0">Danh sách sản phẩm</h2>
                <span class="badge text-bg-light"><?= $totalProducts ?> sản phẩm</span>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th class="text-end">Giá</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-end">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $p): ?>
                            <tr>
                                <td class="fw-semibold">#<?= htmlspecialchars($p['id']) ?></td>
                                <td>
                                    <?php if (!empty($p['image'])): ?>
                                        <img class="product-thumb rounded border" src="<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['name']) ?>">
                                    <?php else: ?>
                                        <div class="product-thumb rounded border d-flex align-items-center justify-content-center text-secondary small">N/A</div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="fw-semibold"><?= htmlspecialchars($p['name']) ?></div>
                                </td>
                                <td class="text-end"><?= number_format((int)$p['price']) ?> VND</td>
                                <td class="text-center">
                                    <span class="badge <?= (int)($p['stock'] ?? 0) > 0 ? 'text-bg-success' : 'text-bg-secondary' ?>">
                                        <?= (int)($p['stock'] ?? 0) ?>
                                    </span>
                                </td>
                                <td class="text-end">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Hành động sản phẩm">
                                        <a class="btn btn-outline-primary" href="edit.php?id=<?= urlencode($p['id']) ?>">Sửa</a>
                                        <a class="btn btn-outline-danger" href="delete.php?id=<?= urlencode($p['id']) ?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">Xóa</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

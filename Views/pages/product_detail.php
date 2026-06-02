<?php
include 'chi-tiet-san-pham.php';
$id = intval($_GET['id'] ?? 0);

if (isset($chiTietNhan[$id])) {
    $nhan = $chiTietNhan[$id];
} else {
    echo "<p>Sản phẩm không tồn tại!</p>";
    exit;
}
?>

<?php include 'Views/layouts/header.php'; ?>

<h2><?= htmlspecialchars($nhan['name']); ?></h2>
<img src="<?= $nhan['image']; ?>" alt="<?= htmlspecialchars($nhan['name']); ?>">
<p>Giá: <?= number_format($nhan['price']); ?> ₫</p>
<p>Mô tả: <?= $nhan['description']; ?></p>
<p>Loại sản phẩm: <?= $nhan['category']; ?></p>

<?php include 'Views/layouts/footer.php'; ?>

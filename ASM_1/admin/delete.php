<?php
include __DIR__ . '/../data.php';
$id = $_GET['id'] ?? 0;

$products = array_filter($products, fn($p) => $p['id'] != $id);

$content = "<?php\n\$products = " . var_export(array_values($products), true) . ";\n?>";
file_put_contents("../data.php", $content);

header("Location: index.php");
exit;


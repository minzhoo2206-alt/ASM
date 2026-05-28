<div class="container my-5">
    <h3 class="mb-4">Giỏ hàng của bạn</h3>

    <?php if (empty($gioHang)): ?>
        <div class="alert alert-info">
            Giỏ hàng đang trống.
            <a href="index.php" class="alert-link">Tiếp tục mua sắm</a>
        </div>
    <?php else: ?>
        <form action="index.php?pages=gio-hang-cap-nhat" method="POST">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Tên</th>
                            <th>Đơn giá</th>
                            <th style="width: 140px;">Số lượng</th>
                            <th>Thành tiền</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($gioHang as $item): ?>
                            <tr>
                                <td>
                                    <img src="<?= htmlspecialchars($item['image']) ?>"
                                         alt="<?= htmlspecialchars($item['name']) ?>"
                                         height="70">
                                </td>
                                <td><?= htmlspecialchars($item['name']) ?></td>
                                <td><?= number_format($item['price'], 0, ',', '.') ?> đ</td>
                                <td>
                                    <input type="number"
                                           name="so_luong[<?= (int)$item['id'] ?>]"
                                           value="<?= (int)$item['so_luong'] ?>"
                                           min="0"
                                           class="form-control form-control-sm">
                                </td>
                                <td>
                                    <?= number_format($item['price'] * $item['so_luong'], 0, ',', '.') ?> đ
                                </td>
                                <td>
                                    <a href="index.php?pages=gio-hang-xoa&id=<?= (int)$item['id'] ?>"
                                       class="btn btn-sm btn-outline-danger"
                                       onclick="return confirm('Xóa sản phẩm này khỏi giỏ?');">
                                        Xóa
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4" class="text-end">Tổng cộng:</th>
                            <th colspan="2"><?= number_format($tongTien, 0, ',', '.') ?> đ</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="d-flex justify-content-between">
                <div>
                    <a href="index.php" class="btn btn-outline-secondary">← Tiếp tục mua sắm</a>
                    <a href="index.php?pages=gio-hang-xoa-tat-ca"
                       class="btn btn-outline-danger"
                       onclick="return confirm('Xóa toàn bộ giỏ hàng?');">
                        Xóa tất cả
                    </a>
                </div>
                <div>
                    <button type="submit" class="btn btn-warning">Cập nhật giỏ</button>
                    <a href="#" class="btn btn-success">Thanh toán</a>
                </div>
            </div>
        </form>
    <?php endif; ?>
</div>

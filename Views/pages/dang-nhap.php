<?php if (isset($_GET['thanh_cong'])): ?>
    <div class="alert-success">Đăng ký thành công! Mời bạn đăng nhập.</div>
<?php endif; ?>

<div class="form-box">
    <h2>Đăng nhập</h2>
    <?php if (!empty($loi)): ?>
        <div class="alert-danger">
            <ul>
                <?php foreach ($loi as $l): ?>
                    <li><?= htmlspecialchars($l) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="index.php?pages=dang-nhap" method="POST">
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email"
                   value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                   placeholder="your@email.com">
        </div>
        <div class="form-group">
            <label>Mật khẩu</label>
            <input type="password" name="mat_khau" placeholder="Nhập mật khẩu">
        </div>
        <button type="submit" class="btn btn-primary btn-full">Đăng nhập</button>
    </form>
    <p style="margin-top: 16px; text-align:center;">
        Chưa có tài khoản? <a href="index.php?pages=dang-ky">Đăng ký ngay</a>
    </p>
</div>
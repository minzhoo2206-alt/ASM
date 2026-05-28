<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4">Đăng nhập</h3>

                    <?php if (isset($_GET['thanh_cong'])): ?>
                        <div class="alert alert-success">
                            Đăng ký thành công! Mời bạn đăng nhập.
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($loi)): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach ($loi as $l): ?>
                                    <li><?= htmlspecialchars($l) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="index.php?pages=dang-nhap" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                   value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                                   placeholder="your@email.com">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mật khẩu</label>
                            <input type="password" name="mat_khau" class="form-control"
                                   placeholder="Nhập mật khẩu">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
                    </form>

                    <p class="text-center mt-3 mb-0">
                        Chưa có tài khoản?
                        <a href="index.php?pages=dang-ky">Đăng ký ngay</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

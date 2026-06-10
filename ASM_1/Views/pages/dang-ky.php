<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4">Đăng ký tài khoản</h3>

                    <?php if (!empty($loi)): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach ($loi as $l): ?>
                                    <li><?= htmlspecialchars($l) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="index.php?pages=dang-ky" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Họ tên</label>
                            <input type="text" name="ho_ten" class="form-control"
                                   value="<?= htmlspecialchars($_POST['ho_ten'] ?? '') ?>"
                                   placeholder="Nguyễn Văn A">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                   value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                                   placeholder="your@email.com">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mật khẩu</label>
                            <input type="password" name="mat_khau" class="form-control"
                                   placeholder="Tối thiểu 6 ký tự">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nhập lại mật khẩu</label>
                            <input type="password" name="nhap_lai_mat_khau" class="form-control"
                                   placeholder="Nhập lại mật khẩu">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Đăng ký</button>
                    </form>

                    <p class="text-center mt-3 mb-0">
                        Đã có tài khoản?
                        <a href="index.php?pages=dang-nhap">Đăng nhập</a>
                    </p>


                </div>
            </div>
        </div>
    </div>
</div>

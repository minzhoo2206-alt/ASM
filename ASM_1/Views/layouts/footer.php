<style>
    .footer {
        background: #111827;
        color: #f8fafc;
        margin-top: 48px;
    }

    .footer .footer-logo {
        width: 150px;
        height: 110px;
        object-fit: contain;
        background: #ffffff;
        border-radius: 8px;
        padding: 8px;
        margin-bottom: 16px;
    }

    .footer p,
    .footer li,
    .footer a {
        color: #cbd5e1;
        font-size: 15px;
        line-height: 1.7;
    }

    .footer a {
        text-decoration: none;
        transition: color 0.2s ease, padding-left 0.2s ease;
    }

    .footer a:hover {
        color: #ffffff;
        padding-left: 4px;
    }

    .footer ul {
        list-style: none;
        padding-left: 0;
        margin-bottom: 0;
    }

    .footer li {
        margin-bottom: 8px;
    }

    .title-footer {
        color: #ffffff;
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 18px;
        padding-bottom: 10px;
        position: relative;
    }

    .title-footer::after {
        content: "";
        width: 42px;
        height: 3px;
        background: #f97316;
        border-radius: 999px;
        position: absolute;
        left: 0;
        bottom: 0;
    }

    .footer hr {
        border-color: rgba(255, 255, 255, 0.18);
        margin: 32px 0 18px;
    }

    .footer-bottom {
        max-width: 1140px;
        margin: 0 auto;
        padding: 0 12px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        flex-wrap: wrap;
    }

    .footer-bottom p {
        margin-bottom: 0;
    }

    .footer-bottom span {
        color: #64748b;
        margin: 0 8px;
    }

    @media (max-width: 767.98px) {
        .footer {
            text-align: center;
        }

        .title-footer::after {
            left: 50%;
            transform: translateX(-50%);
        }

        .footer-bottom {
            justify-content: center;
            text-align: center;
        }
    }
</style>

<footer class="footer py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="logo">
                    <img class="footer-logo"
                        src="https://inkythuatso.com/uploads/thumbnails/800/2021/12/logo-fpt-polytechnic-inkythuatso-09-13-08-21.jpg"
                        alt="">
                </div>
                <p>Thời trang hiện đại, để mặc và phù hợp với phong cách mỗi ngày của bạn.</p>
            </div>

            <div class="col-lg-3 col-md-6">
                <h5 class="title-footer">
                    Danh mục
                </h5>
                <ul>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="Views/pages/chi-tiet-san-pham.php">Sản phẩm </a></li>
                    <li><a href="Views/pages/bai-viet.php">Bài viết</a></li>
                    <li><a href="Views/pages/gioi-thieu.php">Giới thiệu</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h5 class="title-footer">
                    Thông tin liên hệ
                </h5>
                <div class="list-group "> 
                    <ul>
                        <li>Email: mnshop@gmail.com</li>
                        <li>Hotline: 0900 123 456</li>
                        <li>Dia chi: TP. Ho Chi Minh</li>
                        <li>Gio mo cua: 8:00 - 21:00</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <h5 class="title-footer">
                   Hỗ trợ
                </h5>
                <ul>
                <li><a href="#">Hướng dẫn mua hàng</a></li>
                <li><a href="#">Chính sách đổi trả</a></li>
                <li><a href="#">Vận chuyển</a></li>
                <li><a href="Views/pages/lien-he.php">Liên hệ</a></li>
            </ul>
            </div>
        </div>
    </div>
    <hr>
    <div class="footer-bottom">
        <p>&copy; 2026 FPT Shop. All rights reserved.</p>
        <div>
            <a href="#">Điều khoản </a>
            <span>|</span>
            <a href="#">Bảo mật </a>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
</body>

</html>

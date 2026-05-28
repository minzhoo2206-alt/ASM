<main>
    <?php
    $chiTietNhan = [
        [
            "name" => "Nhẫn cưới nam Kim cương Vàng 75% (18K) PNJ Chung Đôi",
            "image" => "https://cdn.pnj.io/images/thumbnails/485/485/detailed/180/sp-GNDD00C000074-nhan-cuoi-nam-kim-cuong-vang-18k-pnj-chung-doi-1.png",
            "price" => "13 731 000"
        ],
        [
            "name" => "Nhẫn cưới Kim cương Vàng 75% (18K) PNJ",
            "image" => "https://cdn.pnj.io/images/thumbnails/485/485/detailed/179/sp-GNDD00C000081-nhan-cuoi-kim-cuong-vang-18k-pnj-chung-doi-1.png",
            "price" => "9 511 000"
        ],
        [
            "name" => "",
            "image" => "",
            "price" => "13 731 000"
        ],
        [
            "name" => "",
            "image" => "",
            "price" => "13 731 000"
        ],
        [
            "name" => "",
            "image" => "",
            "price" => "13 731 000"
        ],
        [
            "name" => "",
            "image" => "",
            "price" => "13 731 000"
        ],
        [
            "name" => "",
            "image" => "",
            "price" => "13 731 000"
        ],
        [
            "name" => "",
            "image" => "",
            "price" => "13 731 000"
        ],
        [
            "name" => "",
            "image" => "",
            "price" => "13 731 000"
        ],
        [
            "name" => "",
            "image" => "",
            "price" => "13 731 000"
        ],
        [
            "name" => "",
            "image" => "",
            "price" => "13 731 000"
        ],
        [
            "name" => "",
            "image" => "",
            "price" => "13 731 000"
        ],
        [
            "name" => "",
            "image" => "",
            "price" => "13 731 000"
        ],
        [
            "name" => "",
            "image" => "",
            "price" => "13 731 000"
        ],
        [
            "name" => "",
            "image" => "",
            "price" => "13 731 000"
        ],
        [
            "name" => "",
            "image" => "",
            "price" => "13 731 000"
        ],
        [
            "name" => "",
            "image" => "",
            "price" => "13 731 000"
        ],
        [
            "name" => "",
            "image" => "",
            "price" => "13 731 000"
        ],
        [
            "name" => "",
            "image" => "",
            "price" => "13 731 000"
        ],
    ];
    ?>
</main>


<div class="container ">
    <div class="row">

        <?php foreach ($chiTietNhan as $product): ?>
            <div class="col-lg-2">

                <div class="box-img text-center">
                    <img src="<?= $product['image'] ?>" height="150" class="card-img-top w-auto " alt="<?= $product['name'] ?>">
                </div>

                <h6 class="text-center "><?= $product['name'] ?></h6>
                <ins><?= $product['price'] ?></ins>




            </div>
        <?php endforeach; ?>

    </div>
</div>
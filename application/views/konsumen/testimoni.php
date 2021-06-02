<div class="header-services">
    <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery
            on every order with Sky Store</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery
            on every order with Sky Store</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery
            on every order with Sky Store</p>
    </div>
</div>
<main class="ps-main">
    <div style="text-align: center;padding-top: 20px;">
        <!-- <img src="<?= base_url(
                        'assetsKonsumen/'
                    ) ?>images/cart-preview/shopping-cart.png" alt="" width=150> -->
        <h1>Testimoni dan Hasil Produk Kami</h1>
    </div>

    <div class="ps-blog-grid pt-40 pb-80">
        <div class="ps-container">

            <div class="row">

                <?= $this->session->flashdata('pesan') ?>

                <?php foreach ($testimoni as $pk) : ?>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                        <div class="ps-post mb-30">
                            <div class="ps-post__thumbnail">
                                <!-- <a class="ps-post__overlay" href="#">
                                </a> -->
                                <img src="<?= base_url('assetsKonsumen/img_testi/') . $pk->foto_hasil ?>" alt="" height="250" style="border-radius: 20px;object-fit: cover;">
                            </div>
                            <div class="ps-post__content">
                                <h1><?=$pk->nama_kategori?></h1>
                                <h4><?=$pk->nama_pemesan?></h4>
                                <?php 
                                    for ($i=1; $i <=5 ; $i++) { 
                                       if($i<=$pk->bintang){
                                           echo "<i class='fa fa-star' style='color:yellow'></i>";
                                        }else{
                                           echo "<i class='fa fa-star'></i>";
                                       }
                                    }
                                ?>
                            </div>
                            <center>
                                <p style="color: #6200c4;"><?= $pk->keterangan ?></p>
                            </center>
                        </div>
                    </div>
                <?php endforeach; ?>



            </div>
        </div>
    </div>
    <!-- </div> -->
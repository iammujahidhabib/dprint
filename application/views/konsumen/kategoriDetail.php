<div class="header-services">
    <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard
            delivery
            on every order with Sky Store</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard
            delivery
            on every order with Sky Store</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i></i><strong>Free delivery</strong>: Get free standard
            delivery
            on every order with Sky Store</p>
    </div>
</div>
<main class="ps-main">
    <div class="test">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                </div>
            </div>
        </div>
    </div>
    <div class="ps-product--detail pt-60">
        <div class="ps-container">
            <div class="row">
                <div class="col-lg-10 col-md-12 col-lg-offset-1">
                    <div class="ps-product__thumbnail">
                        <!-- <img src="<?php echo base_url() ?>assetsKonsumen/img_kategori/<?= $detail->gambar_kategori ?>" alt=""> -->
                        <!-- <img -->
                        <div class="ps-product__preview">
                            <div class="ps-product__variants">
                                <div class="item">
                                    <img src="<?php echo base_url() ?>assetsKonsumen/img_kategori/<?= $detail->gambar_kategori ?>" alt="">
                                </div>
                                <!-- <div class="item">
                                    <img src="<?php echo base_url() ?>assetsKonsumen/img_kategori/<?= $detail->gambar_kategori ?>" alt="">
                                </div> -->
                                <!-- <a class="popup-youtube ps-product__video" href="https://www.youtube.com/watch?v=JYoafOTmivM"><img src="<?= base_url('assetsKonsumen/') ?>images/shoe-detail/1.jpg" alt=""><i class="fa fa-play"></i></a> -->

                            </div>
                        </div>
                        <div class="ps-product__image">
                            <div class="item">
                                <img class="zoom" src="<?php echo base_url() ?>assetsKonsumen/img_kategori/<?= $detail->gambar_kategori ?>" alt="" data-zoom-image="<?php echo base_url() ?>assetsKonsumen/img_kategori/<?= $detail->gambar_kategori ?>">
                            </div>
                            <!-- <div class="item">
                                <img class="zoom" src="<?php echo base_url() ?>assetsKonsumen/img_kategori/<?= $detail->gambar_kategori ?>" alt="" data-zoom-image="<?php echo base_url() ?>assetsKonsumen/img_kategori/<?= $detail->gambar_kategori ?>">
                            </div> -->
                        </div>
                    </div>
                    <div class="ps-product__thumbnail--mobile">
                        <div class="ps-product__main-img"><img src="<?php echo base_url() ?>assetsKonsumen/img_kategori/<?= $detail->gambar_kategori ?>" alt=""></div>
                        <div class="ps-product__preview owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="false" data-owl-item="3" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="3" data-owl-item-lg="3" data-owl-duration="1000" data-owl-mousedrag="on">
                            <img src="<?php echo base_url() ?>assetsKonsumen/img_kategori/<?= $detail->gambar_kategori ?>" alt="">
                        </div>
                    </div>
                    <div class="ps-product__info">

                        <h1><?= $detail->nama_kategori ?></h1>
                        <a href="<?=site_url('konsumen/pesanBarang/'.$detail->id_kategori)?>" class="btn btn-dark">Pesan</a>
                        <!-- <p class="ps-product__category"><a href="#"><?= $detail->nama_kategori ?></a></p> -->

                        <div class="ps-product__block ps-product__quickview">
                        <br>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Lihat Paket
                            </button>
                            <h4>Deskripsi</h4>
                            <p>
                                <?= $detail->deskripsi ?>
                            </p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- <div class="ps-product__content mt-50">
                        <ul class="tab-list" role="tablist">
                            <li class="active"><a href="#tab_01" aria-controls="tab_01" role="tab" data-toggle="tab">Overview</a></li>
                            <li><a href="#tab_02" aria-controls="tab_02" role="tab" data-toggle="tab">Review</a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Paket <?=$detail->nama_kategori?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="<?php echo base_url() ?>assetsKonsumen/paket/<?= $detail->list_paket ?>" class="w-100 img" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
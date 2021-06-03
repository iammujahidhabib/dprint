<main class="ps-main">
    <div style="text-align: center;padding-top: 20px;">
        <h1>Status Pemesanan</h1>
    </div>
    <div class="ps-blog-grid pt-40 pb-80">
        <div class="ps-container">

            <ul class="nav nav-tabs mb-5">
                <li class="nav-item">
                    <a class="nav-link <?= $aktif_pending ?>" href="<?= base_url('Konsumen/statusPemesanan/') ?>">Pending</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $aktif_proses ?>" href="<?= base_url('Konsumen/statusPemesanan/proses') ?>">Sedang Diproses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $aktif_kirim ?>" href="<?= base_url('Konsumen/statusPemesanan/dikirim') ?>">Sedang Dikirim</a>
                </li>
                <li class="nav-item <?= $aktif_dp ?>">
                    <a class="nav-link" href="<?= base_url('Konsumen/statusPemesanan/kurang') ?>">DP</a>
                </li>

            </ul>

            <div class="row">



                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <div class="form-row">
                            <table id="" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Atas Nama</th>
                                        <th scope="col">Jumlah Barang</th>
                                        <th scope="col">Total harga</th>
                                        <th scope="col">Jenis Bayar</th>
                                        <th scope="col">Status Pesanan</th>
                                        <th scope="col">Action</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($allPesanan as $pesanan) :
                                        $hasil_rupiah = 'Rp ' . number_format($pesanan['total_harga'], 2, ',', '.');
                                    ?>
                                        <?php
                                        $buktinya = '';
                                        if ($pesanan['jenis_bayar'] == 0 && $pesanan['bukti_bayar'] == '') {
                                            $buktinya = $pesanan['bukti_dp'];
                                        } elseif ($pesanan['jenis_bayar'] == 0 && $pesanan['bukti_bayar'] != '') {
                                            $buktinya = $pesanan['bukti_bayar'];
                                        } elseif ($pesanan['jenis_bayar'] == 1) {
                                            $buktinya = $pesanan['bukti_bayar'];
                                        }
                                        // echo $buktinya;
                                        ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $pesanan['nama_pemesan'] ?></td>
                                            <td><?= $pesanan['jmlBarang'] ?></td>
                                            <td><?= $hasil_rupiah ?></td>
                                            <td><?= ($pesanan['jenis_bayar'] == 1) ? 'Lunas' : 'Pakai DP' ?> </td>
                                            <td><?= $pesanan['status_pesanan'] ?></td>
                                            <td>
                                                <a class="btn btn-primary" href="<?= base_url('konsumen/det_pesanan/' . $pesanan['id_bayar']) ?>">
                                                    Detail
                                                </a>
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" id="bukti_bayar" data-foto="<?= $buktinya; ?>">
                                                    Bukti Bayar
                                                </button>
                                                <?php if ($pesanan['status_pesanan'] == "Pembayaran kurang (sedang diproses)") : ?>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#pelunasan" data-idbayar="<?= $pesanan['id_bayar'] ?>" id="pelunasannnnn">
                                                        Pelunasan
                                                    </button>
                                                <?php endif; ?>
                                                <?php if ($pesanan['status_pesanan'] == "pesanan dikirim") : ?>
                                                    <a class="btn btn-info" href="<?= base_url('konsumen/selesaikan_pesanan/') . $pesanan['id_pesanan'] ?>">Selesai</a>
                                                <?php elseif($pesanan['bukti_bayar'] == '' && ($pesanan['status_pesanan'] != 'sedang diproses' || $pesanan['status_pesanan'] !='Pembayaran kurang (sedang diproses)')) : ?>
                                                    <a href=" <?= base_url('konsumen/batal_pesan/' . $pesanan['id_bayar']) ?>" class="btn btn-danger">Batalkan</a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Bayar Pelunasa-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal_view">
                    <!-- <label for="formFile" class="form-label">Default file input example</label> -->
                    <img src="" class="rounded mx-auto d-block" alt="..." id="image_bayar" width="400">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Bayar Pelunasa-->
    <div class="modal fade" id="pelunasan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pelunasan Pembayaran</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal_view">
                    <form action="<?= base_url('konsumen/bayar_dp') ?>" enctype="multipart/form-data" method="POST">
                        <!-- <label for="formFile" class="form-label">Default file input example</label> -->
                        <input class="" type="file" id="formFile" name="bukti_bayar">
                        <input type="hidden" id="id_bayar" name="id_bayar">
                        <br>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
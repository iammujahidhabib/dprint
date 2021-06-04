<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Barang/index/'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Barang</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="container">
                <?= $this->session->flashdata('pesan') ?>
                <form action="<?= base_url('admin/addKategori') ?>" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kategori</label>
                        <input type="text" class="form-control" name="namaKategori" required>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="exampleInputEmail1">Mulai Harga</label>
                            <input type="text" class="form-control" name="mulai" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="exampleInputEmail1">Sampai Harga</label>
                            <input type="text" class="form-control" name="sampai" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi Kategori</label>
                        <textarea class="form-control" name="deskripsiKategori" required></textarea>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Gambar Kategori</span>
                        </div>
                        <div class="custom-file">
                            <input required type="file" name="gambar" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">List Paket</span>
                        </div>
                        <div class="custom-file">
                            <input required type="file" name="paket" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>



        </div>
    </div>

</div>

<!-- Modal -->
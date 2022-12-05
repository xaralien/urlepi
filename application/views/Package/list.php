<!-- Pricing Plan Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Jenis Masalah</h5>
            <h1 class="display-4">Silahkan Pilih Problem Anda</h1>
        </div>
        <?php
        if ($this->session->userdata('role_id') == 1) {

        ?>
            <div class="text-center py-5">
                <a style="" href="<?= base_url('package/tambah'); ?>" class="btn btn-primary rounded-pill py-3 px-5 my-2 ">Tambah Paket</a>
            </div>
        <?php
        }
        ?>
        <div class="owl-carousel price-carousel position-relative" style="padding: 0 45px 45px 45px;">
            <?php foreach ($paket as $p) { ?>
                <div class="bg-light rounded text-center">
                    <div class="position-relative">
                        <?Php if ($p->image == "No Image") {
                        ?>
                            <img class="img-fluid rounded-top" src="<?= base_url('assets/'); ?>img/virus.png" alt="">
                        <?php } else {
                        ?>
                            <img class="img-fluid rounded-top" src="data:;base64,<?php echo $p->image; ?>" alt="">

                        <?php } ?>
                        <div class="position-absolute w-100 h-100 top-50 start-50 translate-middle rounded-top d-flex flex-column align-items-center justify-content-center" style="background: rgba(29, 42, 77, .8);">
                            <h3 class="text-white"><?= $p->nama_paket ?></h3>
                            <h1 class="display-4 text-white mb-0">
                                <small class="align-top fw-normal" style="font-size: 22px; line-height: 45px;">Rp.</small><?= $p->harga_paket ?><small class="align-bottom fw-normal" style="font-size: 16px; line-height: 40px;">,00</small>
                            </h1>
                        </div>
                    </div>
                    <div class="text-center py-5">
                        <p><?= $p->deskripsi ?></p>
                        <a href="<?= base_url('package/detail/' . $p->id); ?>" class="btn btn-primary rounded-pill py-3 px-5 my-2">Apply Now</a>
                    </div>
                </div>
            <?php } ?>
            <!-- <div class="bg-light rounded text-center">
                <div class="position-relative">
                    <img class="img-fluid rounded-top" src="<?= base_url('assets/'); ?>img/slow.jpg" alt="">
                    <div class="position-absolute w-100 h-100 top-50 start-50 translate-middle rounded-top d-flex flex-column align-items-center justify-content-center" style="background: rgba(29, 42, 77, .8);">
                        <h3 class="text-white">Laptop Lemot</h3>
                        <h1 class="display-4 text-white mb-0">
                            <small class="align-top fw-normal" style="font-size: 22px; line-height: 45px;">Rp.</small>100.000<small class="align-bottom fw-normal" style="font-size: 16px; line-height: 40px;">,00</small>
                        </h1>
                    </div>
                </div>
                <div class="text-center py-5">
                    <p>Mencari Solusi Terbaik</p>
                    <p>Tidak ada Biaya Tambahan</p>
                    <p>Harga Komponen + Service</p>
                    <p>Perbaikan Cepat</p>
                    <a href="" class="btn btn-primary rounded-pill py-3 px-5 my-2">Apply Now</a>
                </div>
            </div>
            <div class="bg-light rounded text-center">
                <div class="position-relative">
                    <img class="img-fluid rounded-top" src="<?= base_url('assets/'); ?>img/price-3.jpg" alt="">
                    <div class="position-absolute w-100 h-100 top-50 start-50 translate-middle rounded-top d-flex flex-column align-items-center justify-content-center" style="background: rgba(29, 42, 77, .8);">
                        <h3 class="text-white">Booting Lemot</h3>
                        <h1 class="display-4 text-white mb-0">
                            <small class="align-top fw-normal" style="font-size: 22px; line-height: 45px;">Rp.</small>150.000<small class="align-bottom fw-normal" style="font-size: 16px; line-height: 40px;">,00</small>
                        </h1>
                    </div>
                </div>
                <div class="text-center py-5">
                    <p>Mencari Solusi Terbaik</p>
                    <p>Tidak ada Biaya Tambahan</p>
                    <p>Harga HDD/SSD + Service</p>
                    <p>Perbaikan Cepat</p>
                    <a href="" class="btn btn-primary rounded-pill py-3 px-5 my-2">Apply Now</a>
                </div>
            </div> -->
            <!-- <div class="bg-light rounded text-center">
                <div class="position-relative">
                    <img class="img-fluid rounded-top" src="<?= base_url('assets/'); ?>img/price-4.jpg" alt="">
                    <div class="position-absolute w-100 h-100 top-50 start-50 translate-middle rounded-top d-flex flex-column align-items-center justify-content-center" style="background: rgba(29, 42, 77, .8);">
                        <h3 class="text-white"> Laptop Mati Total</h3>
                        <h1 class="display-4 text-white mb-0">
                            <small class="align-top fw-normal" style="font-size: 22px; line-height: 45px;">Rp.</small>200.000<small class="align-bottom fw-normal" style="font-size: 16px; line-height: 40px;">,00</small>
                        </h1>
                    </div>
                </div>
                <div class="text-center py-5">
                    <p>Mencari Solusi Terbaik</p>
                    <p>Tidak ada Biaya Tambahan</p>
                    <p>Harga Komponen + Service</p>
                    <p>Perbaikan Cepat</p>
                    <a href="" class="btn btn-primary rounded-pill py-3 px-5 my-2">Apply Now</a>
                </div> -->
        </div>
    </div>
</div>
</div>
<!-- Pricing Plan End -->
<!-- Appointment Start -->
<div class="container-fluid bg-primary my-5 py-5">
    <?= $this->session->flashdata('pesan'); ?>

    <div class="container py-5">
        <div class="row gx-5">
            <?php
            if ($status == "Solusi Terkirim!" || $status == "Bukti Pembayaran Di Tolak!" || $status == "Proses Pembayaran" || $status == "Bukti Pembayaran Tambahan Di Tolak!") {
            ?>
                <div class="col-lg-12 mb-5 mb-lg-0">

                <?php
            } else {
                ?>
                    <div class="col-lg-6 mb-5 mb-lg-0">
                    <?php
                }
                $invoice = '500000' + $id;

                    ?>
                    <div class="mb-4">
                        <h5 class="d-inline-block text-white text-uppercase border-bottom border-5">Detail Diagnosa</h5>
                        <h1 class="display-4"><?= $judul ?></h1>
                    </div>
                    <div class=" " style="margin: auto">
                        <table class="bg-light table table-border rounded">
                            <thead>
                                <tr class="bg-light">

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><b>Invoice</b></td>
                                    <td><?= $invoice ?></td>
                                </tr>
                                <tr>
                                    <td><b>Nama</b></td>
                                    <td><?= $nama ?></td>
                                </tr>
                                <tr>
                                    <td><b>Alamat</b></td>
                                    <td><?= $alamat ?></td>
                                </tr>
                                <tr>
                                    <td><b>Nomor Telpon</b></td>
                                    <td><?= $nomor_tlp ?></td>
                                </tr>
                                <tr>
                                    <td><b>Tipe</b></td>
                                    <td><?= $type ?></td>
                                </tr>
                                <tr>
                                    <td s><b>Deksripsi</b></td>
                                    <td><?= $deskripsi ?></td>
                                </tr>
                                <tr>
                                    <td s><b>Solusi</b></td>
                                    <td><?= $solusi ?></td>
                                </tr>
                                <tr>
                                    <td><b>Status</b></td>
                                    <td><?= $status ?></td>
                                </tr>
                                <?php
                                if ($status_garansi != Null) {
                                ?>
                                    <tr>

                                        <?php
                                        $garansi = date('Y-m-d', strtotime($tanggal_selesai . ' + 3 months'));

                                        ?>
                                        <td><b>Kadaluarsa Garansi</b></td>
                                        <td><?= $garansi ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Status Garansi</b></td>
                                        <td><?= $status_garansi ?></td>
                                    </tr>
                                <?php
                                }

                                if ($total_harga != 0) { ?>
                                    <tr>
                                        <td><b>Total</b></td>
                                        <td>Rp.<?= $total_harga ?>,00</td>
                                    </tr>
                                <?php
                                }
                                if ($metode_kirim != '-') {

                                ?>
                                    <tr>
                                        <td s><b>Metode Kirim</b></td>
                                        <td><?= $metode_kirim ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Metode Pembayaran</b></td>
                                        <td><?= $metode_pembayaran ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Durasi Pengerjaan</b></td>
                                        <td><?= $durasi_kerja ?></td>
                                    </tr>


                                    <tr>
                                        <td><b>Bukti Pembayaran</b></td>
                                        <td>
                                            <img style="width: 100%; height: auto;" src="data:;base64,<?php echo $bukti_pembayaran; ?>" alt="...">
                                        </td>
                                    </tr>

                                <?php
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- <a class="btn btn-dark rounded-pill py-3 px-5 me-3" href="">Find Doctor</a>
                <a class="btn btn-outline-dark rounded-pill py-3 px-5" href="">Read More</a> -->
                    </div>
                    <?php if ($status == "Proses Konsultasi") {
                    ?>
                        <div class="col-lg-5" style="margin-left:5%;margin-top: 9.5%;">
                            <div class="bg-white text-center rounded p-5">
                                <h1 class="mb-4">Kirim Solusi</h1>
                                <!-- <h1 class="mb-4">Kirim Bukti</h1> -->
                                <div class="row g-3">
                                    <div class="col-12">
                                        <form method="post" action="<?= base_url('diagnosa/solusi/' . $id); ?>">
                                            <label style="float: left; " for=""><b>Isi Solusi</b> </label>
                                            <input type="text" name="solusi" class="form-control bg-light border-0" style="height: 55px;">
                                            <br>
                                            <button class="btn btn-primary w-100 py-3" type="submit">Kirim</button>
                                        </form>
                                        <!-- <br>
                                <form method="post" action="<?= base_url('pesanan/buktitolak/' . $id); ?>">
                                    <button class="btn btn-danger w-100 py-3" type="submit">Tolak</button>
                                </form> -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php } else if ($status == "Proses Konfirmasi") {
                    ?>
                        <div class="col-lg-5" style="margin-left:5%;margin-top: 9.5%;">
                            <div class="bg-white text-center rounded p-5">
                                <!-- <h1 class="mb-4">Kirim Bukti</h1> -->
                                <div class="row g-3">


                                    <!-- <div class="col-12 col-sm-6">
                                <select class="form-select bg-light border-0" style="height: 55px;">
                                    <option selected>Choose Department</option>
                                    <option value="1">Department 1</option>
                                    <option value="2">Department 2</option>
                                    <option value="3">Department 3</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6">
                                <select class="form-select bg-light border-0" style="height: 55px;">
                                    <option selected>Select Doctor</option>
                                    <option value="1">Doctor 1</option>
                                    <option value="2">Doctor 2</option>
                                    <option value="3">Doctor 3</option>
                                </select>
                            </div> -->
                                    <!-- <input type="hidden" name="">
                                <div class="col-12">
                                    <label style="float: left; " for=""><b>Masukan Bukti Pembayaran Anda</b> </label>

                                    <input type="file" name="bukti_pembayaran" class="form-control bg-light border-0" style="height: px;">
                                </div> -->
                                    <!-- <div class="col-12 col-sm-6">
                                <input type="email" class="form-control bg-light border-0" placeholder="Your Email" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="date" id="date" data-target-input="nearest">
                                    <input type="text" class="form-control bg-light border-0 datetimepicker-input" placeholder="Date" data-target="#date" data-toggle="datetimepicker" style="height: 55px;">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="time" id="time" data-target-input="nearest">
                                    <input type="text" class="form-control bg-light border-0 datetimepicker-input" placeholder="Time" data-target="#time" data-toggle="datetimepicker" style="height: 55px;">
                                </div>
                            </div> -->

                                    <div class="col-12">
                                        <form method="post" action="<?= base_url('diagnosa/buktikonfirmasi/' . $id); ?>">
                                            <input type="hidden" name="metode_kirim" value="<?= $metode_kirim ?>">
                                            <button class="btn btn-primary w-100 py-3" type="submit">Konfirmasi</button>
                                        </form>
                                        <br>
                                        <form method="post" action="<?= base_url('diagnosa/buktitolak/' . $id); ?>">
                                            <button class="btn btn-danger w-100 py-3" type="submit">Tolak</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php } else if ($status == "Petugas sedang Menjemput Laptop" || $status == "Petugas sedang menuju Lokasi" || $status == "Silahkan antar Laptop Anda") {
                    ?>
                        <div class="col-lg-5" style="margin-left:5%;margin-top: 9.5%;">
                            <div class="bg-white text-center rounded p-5">
                                <!-- <h1 class="mb-4">Kirim Bukti</h1> -->
                                <div class="row g-3">
                                    <div class="col-12">
                                        <form method="post" action="<?= base_url('diagnosa/perbaiki/' . $id); ?>">
                                            <button class="btn btn-primary w-100 py-3" type="submit">Perbaiki!</button>
                                        </form>
                                        <!-- <br>
                                <form method="post" action="<?= base_url('pesanan/buktitolak/' . $id); ?>">
                                    <button class="btn btn-danger w-100 py-3" type="submit">Tolak</button>
                                </form> -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php  } else if ($status == "Sedang Di Perbaiki") {
                    ?>
                        <div class="col-lg-5" style="margin-left:5%;margin-top: 9.5%;">
                            <div class="bg-white text-center rounded p-5">
                                <!-- <h1 class="mb-4">Kirim Bukti</h1> -->
                                <div class="row g-3">
                                    <div class="col-12">

                                        <form method="post" action="<?= base_url('diagnosa/selesaiperbaiki/' . $id); ?>">
                                            <input type="hidden" name="metode_kirim" value="<?= $metode_kirim ?>">
                                            <button class="btn btn-primary w-100 py-3" type="submit">Selesai Perbaiki</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>


                    <?php } else if ($status == "Laptop Sedang di Antar") { ?>
                        <div class="col-lg-5" style="margin-left:5%;margin-top: 9.5%;">
                            <div class="bg-white text-center rounded p-5">
                                <!-- <h1 class="mb-4">Kirim Bukti</h1> -->
                                <div class="row g-3">
                                    <div class="col-12">
                                        <form method="post" action="<?= base_url('diagnosa/selesai/' . $id); ?>">
                                            <button class="btn btn-primary w-100 py-3" type="submit">Selesai!</button>
                                        </form>
                                        <!-- <br>
                                <form method="post" action="<?= base_url('pesanan/buktitolak/' . $id); ?>">
                                    <button class="btn btn-danger w-100 py-3" type="submit">Tolak</button>
                                </form> -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php  } else if ($status == "SELESAI!") { ?>
                        <div class="col-lg-5" style="margin-left:5%;margin-top: 9.5%;">
                            <div class="bg-white text-center rounded p-5">
                                <!-- <h1 class="mb-4">Kirim Bukti</h1> -->
                                <div class="row g-3">
                                    <div class="col-12">
                                        <a href="<?= base_url('diagnosa/exportToPdf/' . $id); ?>" class="btn btn-primary w-100 py-3"><i class="far fa-lg fa-fw fa-file-pdf"></i> Export to PDF!</a>
                                        <?php
                                        if ($status_garansi == 'TERSEDIA') {
                                        ?>
                                            <a href="<?= base_url('diagnosa/cekgaransi/' . $id); ?>" class="btn btn-warning w-100 py-3" style="margin-top: 10px;">Cek Garansi</a>
                                            <a href="<?= base_url('diagnosa/pakaigaransi/' . $id); ?>" class="btn btn-success w-100 py-3" style="margin-top: 10px;">Gunakan Garansi</a>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php  } ?>

                </div>
        </div>
    </div>
    <!-- Appointment End -->
<!-- Appointment Start -->
<div class="container-fluid bg-primary my-5 py-5">
    <div class="container py-5">
        <div class="row gx-5">
            <div class="col-lg-6">
                <div class="bg-white text-center rounded p-5">
                    <h1 class="mb-4">Pilih Metode</h1>
                    <form method="post" action="<?= base_url('package/proses/' . $this->uri->segment(3)); ?>">
                        <div class="row g-3">
                            <!-- <div class="col-12 col-sm-6">
                                <select class="form-select bg-light border-0" style="height: 55px;">
                                    <option selected>Choose Department</option>
                                    <option value="1">Department 1</option>
                                    <option value="2">Department 2</option>
                                    <option value="3">Department 3</option>
                                </select>
                            </div>-->
                            <div class="col-12 ">
                                <label style="float: left; " for=""><b>Metode Service</b> </label>
                                <!-- <br>
                                <hr> -->
                                <select name="metode_kirim" id="metodes" class="form-select border-0" style="height: 55px; ">
                                    <option selected>Pilih Metode</option>
                                    <option value="Antar Jemput">Antar - Jemput</option>
                                    <option value="Di Tempat">Di Tempat</option>
                                    <option value="Di Toko">Di Toko</option>
                                </select>
                                <hr style="margin-top: -5px;">
                            </div>
                            <div class="col-12 ">
                                <label style="float: left; " for=""><b>Metode Pembayaran</b> </label>
                                <!-- <br>
                                <hr> -->
                                <select name="metode_pembayaran" id="metodes" class="form-select border-0" style="height: 55px; ">
                                    <option selected>Pilih Metode</option>
                                    <option value="BRI">BRI</option>
                                    <option value="BCA">BCA</option>
                                    <option value="MANDIRI">MANDIRI</option>
                                    <option value="GOPAY">GOPAY</option>
                                    <option value="DANA">DANA</option>
                                </select>
                                <hr style="margin-top: -5px;">
                            </div>
                            <!-- <div class="col-12">
                                <input type="text" class="form-control bg-light border-0" placeholder="Your Name" style="height: 55px;">
                            </div> -->
                            <!-- <div class="col-12">
                                <label id="dmpt" style="float: left;" for=""><b>Nama Pemilik Nomor</b> </label>
                                <input type="email" class="form-control border-0" placeholder="Your Email" style="height: 55px;">
                                <hr style="margin-top: -5px;">

                            </div>
                            <div class="col-12">
                                <label id="dmpt" style="float: left;"><b>Nomor Pemilik</b> </label>
                                <input type="email" class="form-control border-0" placeholder="Your Email" style="height: 55px;">
                                <hr style="margin-top: -5px;">

                            </div> -->
                            <!-- <div class="col-12">
                                <div class="date" id="date" data-target-input="nearest">
                                    <input type="text" class="form-control bg-light border-0 datetimepicker-input" placeholder="Date" data-target="#date" data-toggle="datetimepicker" style="height: 55px;">
                                </div>
                            </div> -->
                            <!-- <div class="col-12">
                                <div class="time" id="time" data-target-input="nearest">
                                    <input type="text" class="form-control bg-light border-0 datetimepicker-input" placeholder="Time" data-target="#time" data-toggle="datetimepicker" style="height: 55px;">
                                </div>
                            </div> -->
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Konfirmasi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="mb-4">
                    <h5 class="d-inline-block text-white text-uppercase border-bottom border-5">Detail Package</h5>
                    <h1 class="display-4">Paket Hapus Virus/Malware</h1>
                </div>
                <p class="text-white mb-5">
                    Menghapus Virus/Malware pada laptop anda dan pengerjaan dengan estimasi waktu <b>1 - 2 Hari</b>, dan Kamu berusaha agar data pada laptop anda tetap aman.
                </p>
                <h1 class="display-4 text-white mb-0">
                    <small class="align-top fw-normal" style="font-size: 22px; line-height: 45px;">Rp.</small>50.000<small class="align-bottom fw-normal" style="font-size: 16px; line-height: 40px;">,00</small>
                </h1>

                <!-- <a class="btn btn-dark rounded-pill py-3 px-5 me-3" href="">Find Doctor</a>
                <a class="btn btn-outline-dark rounded-pill py-3 px-5" href="">Read More</a> -->
            </div>

        </div>
    </div>
</div>

<script>
    var myEl = document.getElementById('metodes');
    const rekening = document.getElementById('rkning');
    const dompet = document.getElementById('dmpt');
    myEl.addEventListener('click', function() {
        var value = $(this).val();
        if (value == "4" || value == "5") {
            rekening.textContent("Nama Pemilik Rekening");
            // dompet.style.visibility = 'visible';
            // rekening.style.visibility = 'hidden'

        } else if (value == "1" || value == "2" || value == "3") {
            if (rekening.style.visibility === 'hidden') {
                rekening.style.visibility = 'visible';
                dompet.style.visibility = 'hidden'
            }
        }
    }, false);
</script>
<!-- Appointment End -->
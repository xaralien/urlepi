<!-- Appointment Start -->
<div class="container-fluid bg-primary my-5 py-5">
    <div class="container py-5">

        <div class="row gx-5">
            <div class="col-lg-8">
                <div class="bg-white text-center rounded p-5">
                    <h1 class="mb-4">Detail Paket</h1>
                    <form method="post" action="<?= base_url('transaksi'); ?>">
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
                                <label style="float: left; " for=""><b>Nama Paket</b> </label>
                                <!-- <br>
                                <hr> -->
                                <input type="paket" class="form-control border-0" readonly value="Virus/Malware" style="height: 55px;">

                                <hr style="margin-top: -5px;">
                            </div>
                            <!-- <div class="col-12">
                                <input type="text" class="form-control bg-light border-0" placeholder="Your Name" style="height: 55px;">
                            </div> -->
                            <div class="col-12">
                                <label id="dmpt" style="float: left;" for=""><b>Nama Pemilik</b> </label>
                                <input type="name" class="form-control border-0" readonly value="Nama Pemilik" style="height: 55px;">
                                <hr style="margin-top: -5px;">

                            </div>
                            <!-- <div class="col-12">
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
                        </div>
                </div>
            </div>
            <div style="height: 325px;" class=" bg-white text-center rounded p-2 col-lg-4 mb-5 mb-lg-100">
                <div class="mb-3">
                    <h5 class="d-inline-block text-black text-uppercase border-bottom border-5">Ringkasan Belanja</h5>
                </div>
                <!-- <p class="text-black mb-5">
                    Menghapus Virus/Malware pada laptop anda dan pengerjaan dengan estimasi waktu <b>1 - 2 Hari</b>, dan Kamu berusaha agar data pada laptop anda tetap aman.
                </p> -->
                <label style="float: left; " for=""><b>Harga</b> </label>
                <h3 class="display-10 text-black mb-0" style="float: right;">
                    <small class="align-top fw-normal" style="font-size: 22px; line-height: 45=px;">Rp.</small>50.000<small class="align-bottom fw-normal" style="font-size: 16px; line-height: 40px;">,00</small>
                </h3>
                <br>
                <div class="col-12" style="margin-top: 20px;">
                    <label style="float: left; " for=""><b>Diskon</b> </label>
                    <!-- <br>
                                <hr> -->
                    <select id="metodes" class="form-select border-0" style="height: 55px; ">
                        <option selected>Pilih Metode</option>
                        <option value="1">BRI</option>
                        <option value="2">Mandiri</option>
                        <option value="3">BNI</option>
                        <option value="4">Gopay</option>
                        <option value="5">Dana</option>
                    </select>
                    <hr style="margin-top: -5px;">
                </div>
                <!-- <hr>    -->
                <label style="float: left; " for=""><b>Total Harga</b> </label>
                <h3 class="display-10 text-black mb-3" style="float: right;">
                    <small class="align-top fw-normal" style="font-size: 22px; line-height: 45=px;">Rp.</small>50.000<small class="align-bottom fw-normal" style="font-size: 16px; line-height: 40px;">,00</small>
                </h3>
                <div class="col-12">
                    <button class="btn btn-primary w-100 py-3" type="submit">Konfirmasi</button>
                </div>
                <!-- <a class="btn btn-dark rounded-pill py-3 px-5 me-3" href="">Find Doctor</a>
                <a class="btn btn-outline-dark rounded-pill py-3 px-5" href="">Read More</a> -->
            </div>
            </form>

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
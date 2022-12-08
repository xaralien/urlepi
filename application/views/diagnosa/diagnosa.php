<!-- Appointment Start -->
<div class="container-fluid bg-primary my-5 py-5">
    <div class="container py-5">
        <div class="row gx-5">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="mb-4">
                    <h5 class="d-inline-block text-white text-uppercase border-bottom border-5">Pengajuan</h5>
                    <h1 class="display-4">Buat Pengajuan Anda</h1>
                </div>
                <p class="text-white mb-5">Buat Pengajuan dengan memasukan Keluhan yang anda alami pada laptop anda
                    dan kami akan mencoba menganalisa apa yang di alami laptop anda.
                </p>
                <!-- <a class="btn btn-dark rounded-pill py-3 px-5 me-3" href="">Find Doctor</a>
                <a class="btn btn-outline-dark rounded-pill py-3 px-5" href="">Read More</a> -->
            </div>
            <div class="col-lg-6">
                <div class="bg-white text-center rounded p-5">
                    <h1 class="mb-4">Keluhan Anda</h1>
                    <form method="post" action="<?= base_url('diagnosa/proses'); ?>">
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
                            <div class="col-12">
                                <label style="float: left; " for=""><b>Masukan Judul Keluhan</b> </label>

                                <input type="label" class="form-control bg-light border-0" name="judul" placeholder="Judul Keluhan" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <label style="float: left; " for=""><b>Masukan Deskripsi Masalah Anda</b> </label>

                                <input type="label" class="form-control bg-light border-0" name="deskripsi" placeholder="Deskripsi Masalah" style="height: 55px;">
                            </div>
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
                                <button class="btn btn-primary w-100 py-3" type="submit">Buat Pengajuan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Appointment End -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

<link rel="stylesheet" href="<?= base_url('assets/'); ?>css-table/fonts/icomoon/style.css">

<link rel="stylesheet" href="<?= base_url('assets/'); ?>css-table/css/owl.carousel.min.css">

<!-- Bootstrap CSS -->
<!-- <link rel="stylesheet" href="<?= base_url('assets/'); ?>css-table/css/bootstrap.min.css"> -->

<!-- Style -->
<link rel="stylesheet" href="<?= base_url('assets/'); ?>css-table/css/style.css">
<?= $this->session->flashdata('pesan'); ?>

<div class="content" style="margin-top: -60px;">

    <div class="container">
        <h2 class="mb-1">Table Diagnosa</h2>

        <div class="table-responsive custom-table-responsive">

            <table class="table custom-table">
                <thead>
                    <tr>
                        <!-- 
                        <th scope="col">
                            <label class="control control--checkbox">
                                <input type="checkbox" class="js-check-all" />
                                <div class="control__indicator"></div>
                            </label>
                        </th> -->

                        <th scope="col">Order</th>
                        <th scope="col">Type</th>
                        <th scope="col">Name</th>
                        <th scope="col">Pembayaran</th>
                        <th scope="col">Pengiriman</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Progress </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($order as $o) { ?>
                        <tr scope="row">

                            <!-- <th scope="row">
                            <label class="control control--checkbox">
                                <input type="checkbox" />
                                <div class="control__indicator"></div>
                            </label>
                        </th> -->

                            <td>
                                <?= $o->id ?>
                            </td>
                            <td> <?= $o->type ?></td>
                            <td>
                                <?= $o->judul ?>
                                <small class="d-block"><?= $o->deskripsi ?></small>
                            </td>
                            <td><?= $o->metode_pembayaran ?></td>
                            <td><?= $o->metode_kirim ?></td>
                            <td> <?= $o->tanggal ?></td>
                            <?php if ($o->status == "BATAL!") { ?>
                                <td><a href="<?= base_url('diagnosa/detail/' . $o->id) ?>" class=" btn btn-danger"> <?= $o->status ?></a></td>
                            <?php } else if ($o->status == "SELESAI!") { ?>
                                <td><a href="<?= base_url('diagnosa/detail/' . $o->id) ?>" class=" btn btn-success"> <?= $o->status ?></a></td>
                            <?php } else { ?>
                                <td><a href="<?= base_url('diagnosa/detail/' . $o->id) ?>" class=" btn btn-warning"> <?= $o->status ?></a></td>

                            <?php } ?>
                        </tr>
                        <tr class="spacer">
                            <td colspan="100"></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <!-- <th scope="row">
                            <label class="control control--checkbox">
                                <input type="checkbox" />
                                <div class="control__indicator"></div>
                            </label>
                        </th> -->

                        <!-- <td>4616</td>
                        <td><a href="#">Matthew Wasil</a></td>
                        <td>
                            Graphic Designer
                            <small class="d-block">Far far away, behind the word mountains</small>
                        </td>
                        <td>+02 020 3994 929</td>
                        <td>London College</td>
                    </tr>
                    <tr class="spacer">
                        <td colspan="100"></td>
                    </tr> -->

                </tbody>
            </table>
        </div>


    </div>

</div>



<script src="<?= base_url('assets/'); ?>css-table/js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url('assets/'); ?>css-table/js/popper.min.js"></script>
<script src="<?= base_url('assets/'); ?>css-table/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/'); ?>css-table/js/main.js"></script>
<link href="<?= base_url('assets/'); ?>formadd/css/form.css" rel="stylesheet" type="text/css">
<script src="<?= base_url('assets/'); ?>formadd/js/validation.js"></script>

<!-- Change or deletion of the name attributes in the input tag will lead to empty values on record submission-->
<div class="zf-templateWidth">
    <form action="<?= base_url('package/tambahpaket'); ?>" method="POST" enctype="multipart/form-data">
        <!-- To Track referrals , place the referrer name within the " " in the above hidden input field -->
        <input type="hidden" name="zf_redirect_url" value="">
        <!-- To redirect to a specific page after record submission , place the respective url within the " " in the above hidden input field -->
        <input type="hidden" name="zc_gad" value="">
        <!-- If GCLID is enabled in Zoho CRM Integration, click details of AdWords Ads will be pushed to Zoho CRM -->
        <div class="zf-templateWrapper">
            <!---------template Header Starts Here---------->
            <ul class="zf-tempHeadBdr">
                <li class="zf-tempHeadContBdr">
                    <h2 class="zf-frmTitle">Tambah Paket</h2>
                    <p class="zf-frmDesc"></p>
                    <div class="zf-clearBoth"></div>
                </li>
            </ul>
            <!---------template Header Ends Here---------->
            <!---------template Container Starts Here---------->
            <div class="zf-subContWrap zf-leftAlign">
                <ul>
                    <!---------Name Starts Here---------->
                    <li class="zf-tempFrmWrapper zf-name zf-namemedium"><label class="zf-labelName">
                            Gambar
                            <em class="zf-important">*</em>
                        </label>
                        <div class="zf-tempContDiv zf-twoType">
                            <div class="zf-nameWrapper">
                                <span> <input type="file" maxlength="255" name="image" fieldType=7 placeholder="" />
                                </span>
                                <div class="zf-clearBoth"></div>
                            </div>
                            <p id="Name_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
                        </div>
                        <div class="zf-clearBoth"></div>
                    </li>
                    <!---------Name Ends Here---------->
                    <!---------Name Starts Here---------->
                    <li class="zf-tempFrmWrapper zf-name zf-namemedium"><label class="zf-labelName">
                            Nama Paket
                            <em class="zf-important">*</em>
                        </label>
                        <div class="zf-tempContDiv zf-twoType">
                            <div class="zf-nameWrapper">
                                <span> <input type="text" maxlength="255" name="nama_paket" fieldType=7 placeholder="" />
                                </span>
                                <div class="zf-clearBoth"></div>
                            </div>
                            <p id="Name_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
                        </div>
                        <div class="zf-clearBoth"></div>
                    </li>
                    <!---------Name Ends Here---------->
                    <!---------Multiple Line Starts Here---------->
                    <li class="zf-tempFrmWrapper zf-medium"><label class="zf-labelName">
                            Deskripsi Paket
                        </label>
                        <div class="zf-tempContDiv">
                            <span> <textarea name="deskripsi" checktype="c1" maxlength="65535" placeholder=""></textarea> </span>
                            <p id="MultiLine_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
                        </div>
                        <div class="zf-clearBoth"></div>
                    </li>
                    <!---------Multiple Line Ends Here---------->
                    <!---------Email Starts Here---------->
                    <li class="zf-tempFrmWrapper zf-small"><label class="zf-labelName">
                            Harga Paket
                            <em class="zf-important">*</em>
                        </label>
                        <div class="zf-tempContDiv">
                            <span> <input onkeypress="return onlyNumberKey(event)" fieldType=9 type="text" maxlength="255" name="harga_paket" checktype="c5" value="" placeholder="" /></span>
                            <p id="Email_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
                        </div>
                        <div class="zf-clearBoth"></div>
                    </li>
                    <!---------Email Ends Here---------->
                    <!---------Email Starts Here---------->
                    <li class="zf-tempFrmWrapper zf-name zf-namemedium"><label class="zf-labelName">
                            Durasi Kerja
                            <em class="zf-important">*</em>
                        </label>
                        <div class="zf-tempContDiv zf-twoType">
                            <div class="zf-nameWrapper">
                                <span> <input style="size: 25;" type="number" maxlength="255" name="durasi_kerja1" fieldType=7 placeholder="" /> <label>Hari</label>
                                </span>
                                </span> </span>
                                <span> <input type="number" maxlength="255" name="durasi_kerja2" fieldType=7 placeholder="" /> <label>Hari</label>
                                </span>
                                </span> </span>
                                <div class="zf-clearBoth"></div>
                            </div>
                            <p id="Name_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
                        </div>
                        <div class="zf-clearBoth"></div>
                    </li>
                    <!---------Email Ends Here---------->

                </ul>
            </div>
            <!---------template Container Starts Here---------->
            <div class="text-center py-5">

                <input type="submit" class="btn btn-primary rounded-pill py-3 px-5 my-2 " value="Tambah Paket">
            </div>
        </div><!-- 'zf-templateWrapper' ends -->
    </form>
</div><!-- 'zf-templateWidth' ends -->
<script>
    function onlyNumberKey(evt) {

        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>
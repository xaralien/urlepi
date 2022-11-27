<!-- Appointment Start -->
<div class="container-fluid bg-primary my-5 py-5">
    <div class="container py-5">
        <div class="row gx-5">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="mb-4">
                    <h5 class="d-inline-block text-white text-uppercase border-bottom border-5">Sukses!</h5>
                    <h1 class="display-4">Terima Kasih!</h1>
                </div>
                <p class="text-white mb-5">
                    Silahkan Lanjutkan Proses atau Lihat detail Proses di Profile Anda, atau hubungi kami atau Kami akan menghubungi anda segera!
                </p>
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
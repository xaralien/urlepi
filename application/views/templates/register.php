<link rel="stylesheet" href="<?= base_url('assets/'); ?>fonts/material-icon/css/material-design-iconic-font.min.css">
<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style1.css">
<div class="main">

    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <?= $this->session->flashdata('pesan'); ?>
                    <h2 class="form-title">Sign up</h2>
                    <form action="<?= base_url('member/daftar'); ?>" method="POST" class="register-form" id="register-form">
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="nama" id="nama" placeholder="Your Name" />
                        </div>
                        <div class="form-group">
                            <label for="alamat"><i class="zmdi zmdi-city"></i></label>
                            <input type="text" name="alamat" id="alamat" placeholder="Your Address" />
                        </div>
                        <div class="form-group">
                            <label for="alamat"><i class="zmdi zmdi-phone"></i></label>
                            <input type="text" onkeypress="return onlyNumberKey(event)" name="nomor_tlp" id="alamat" placeholder="Your Phone Number" />
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email" />
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password1" id="password1" placeholder="Password" />
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="password2" id="password2" placeholder="Repeat your password" />
                        </div>
                        <!-- <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
                        </div> -->
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="<?= base_url('assets/'); ?>img/signup-image.jpg" alt="sing up image"></figure>
                    <a href="<?= base_url('home/login');  ?> " class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Sing in  Form -->
    <!-- <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="<?= base_url('assets/'); ?>img/signin-image.jpg" alt="sing up image"></figure>
                    <a href="#" class="signup-image-link">Create an account</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" class="register-form" id="login-form">
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="your_name" id="your_name" placeholder="Your Name" />
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="your_pass" id="your_pass" placeholder="Password" />
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                        </div>
                    </form>
                    <div class="social-login">
                        <span class="social-label">Or login with</span>
                        <ul class="socials">
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

</div>
<!-- JS -->
<script>
    function onlyNumberKey(evt) {

        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main1.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
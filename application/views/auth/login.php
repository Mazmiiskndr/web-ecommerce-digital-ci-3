<!-- Breadcrumb Section Start -->
<div class="section">

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Login</h1>
                <ul>
                    <li>
                        <a href="<?= base_url('') ?>">Home </a>
                    </li>
                    <li class="active">Login</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

</div>
<!-- Breadcrumb Section End -->

<!-- Login | Register Section Start -->
<div class="section section-margin">
    <div class="container">

        <div class="row mb-n10">
            <div class="col-lg-12 col-md-12 m-auto m-lg-0 pb-10">
                <?= $this->session->flashdata('pesan'); ?>
                <!-- Login Wrapper Start -->
                <div class="login-wrapper">

                    <!-- Login Title & Content Start -->
                    <div class="section-content text-center mb-5">
                        <h2 class="title mb-2">Login</h2>
                        <p class="desc-content">Please login using account detail bellow.</p>
                    </div>
                    <!-- Login Title & Content End -->

                    <!-- Form Action Start -->
                    <form action="<?= base_url('auth/login/proses_login') ?>" method="post">

                        <!-- Input Email Start -->
                        <div class="single-input-item mb-3">
                            <input type="email" name="email_users" placeholder="Masuk Email ">
                            <?= form_error('email_users', '<small class="text-danger" style="color: red;">','</small>'); ?>
                        </div>
                        <!-- Input Email End -->

                        <!-- Input Password Start -->
                        <div class="single-input-item mb-3">
                            <input type="password" name="password_users" placeholder="Masukan Password">
                            <?= form_error('password_users', '<small class="text-danger" style="color: red;">','</small>'); ?>
                        </div>
                        <!-- Input Password End -->

                        <!-- Checkbox/Forget Password Start -->
                        <div class="single-input-item">
                            <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                
                                <a href="#" class="forget-pwd mb-3">Lupa Password?</a>
                            </div>
                        </div>
                        <!-- Checkbox/Forget Password End -->

                        <!-- Login Button Start -->
                        <div class="single-input-item mb-3">
                            <button type="submit" class="btn btn btn-dark btn-hover-primary rounded-0">Login</button>
                        </div>
                        <!-- Login Button End -->

                        <!-- Lost Password & Creat New Account Start -->
                        <div class="lost-password">
                            <a href="<?= base_url('auth/register') ?>">Register</a>
                        </div>
                        <!-- Lost Password & Creat New Account End -->

                    </form>
                    <!-- Form Action End -->

                </div>
                <!-- Login Wrapper End -->
            </div>

        </div>

    </div>
</div>
<!-- Login | Register Section End -->




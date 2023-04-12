<!-- Breadcrumb Section Start -->
<div class="section">

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Register</h1>
                <ul>
                    <li>
                        <a href="<?= base_url('') ?>">Home </a>
                    </li>
                    <li class="active">Register</li>
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
            <!-- Register Wrapper Start -->
            <div class="register-wrapper">

                <!-- Login Title & Content Start -->
                <div class="section-content text-center mb-5">
                    <h2 class="title mb-2">Create Account</h2>
                    <p class="desc-content">Please Register using account detail bellow.</p>
                </div>
                <!-- Login Title & Content End -->

                <!-- Form Action Start -->
                <form action="<?= base_url('auth/register/register_aksi') ?>" method="post">

                    <!-- Input First Name Start -->
                    <div class="single-input-item mb-3">
                        <input type="text" placeholder="Nama Lengkap" name="nama_users" value="<?= set_value('nama_users') ?>">
                        <?= form_error('nama_users', '<small class="text-danger" style="color: red;">','</small>'); ?>
                    </div>
                    <!-- Input First Name End -->

                    <!-- Input Last Name Start -->
                    <div class="single-input-item mb-3">
                        <input type="number" placeholder="No. Telepon" name="no_telp_users" value="<?= set_value('no_telp_users') ?>">
                        <?= form_error('no_telp_users', '<small class="text-danger" style="color: red;">','</small>'); ?>
                    </div>
                    <!-- Input Last Name End -->

                    <!-- Input Email Or Username Start -->
                    <div class="single-input-item mb-3">
                        <input type="email" placeholder="Email" name="email_users" value="<?= set_value('email_users') ?>">
                        <?= form_error('email_users', '<small class="text-danger" style="color: red;">','</small>'); ?>
                    </div>
                    <!-- Input Email Or Username End -->

                    <!-- Input Password Start -->
                    <div class="single-input-item mb-3">
                        <input type="password" placeholder="Enter your Password" name="password_users" value="<?= set_value('password_users') ?>">
                    </div>
                    <!-- Input Password End -->

                    <!-- Register Button Start -->
                    <div class="single-input-item mb-3">
                        <button type="submit" class="btn btn btn-dark btn-hover-primary rounded-0">Register</button>
                    </div>
                    <!-- Register Button End -->

                    <!-- Lost Password & Creat New Account Start -->
                        <div class="lost-password">
                            <a href="<?= base_url('auth/login') ?>">Sudah punya akun?</a>
                        </div>
                        <!-- Lost Password & Creat New Account End -->

                </form>
                <!-- Form Action End -->

            </div>
            <!-- Register Wrapper End -->
        </div>

    </div>

</div>
</div>
<!-- Login | Register Section End -->


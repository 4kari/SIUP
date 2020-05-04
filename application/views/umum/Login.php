<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-login-image">akan diisi gambar</div>
            <div class="col-lg-6">
                <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Silahkan Login!</h1>
                </div>
                <form class="user" method="POST" action="<?= base_url('Umum/cek_log'); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password">
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Login">
                    <hr>
                </form>
                <form class="user">
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                    <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                    <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>
                </form>
                <hr>
                <div class="text-center">
                    <a class="small" href="<?= base_url('Umum/lupapass'); ?>">Lupa Password?</a>
                </div>
                <div class="text-center">
                    <a class="small" href="<?= base_url('Umum/tdaftar'); ?>">Buat Akun!</a>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>

    </div>

    </div>

</div>
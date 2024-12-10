<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url("landingasset")?>/css/style.css">
    <link rel="stylesheet" href="<?= base_url("landingasset")?>/css/aos.css">
    <style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #38A3A5;
        background: -webkit-linear-gradient(310deg, #38A3A5 0%, #3e942a 100%);
        background: -o-linear-gradient(310deg, #38A3A5 0%, #3e942a 100%);
        background: linear-gradient(140deg, #38A3A5 0%, #3e942a 100%);
    }

    .login-container {
        min-width: 50vh;
        padding: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .login-container h3 {
        margin-bottom: 20px;
    }
    </style>
</head>

<body>
    <?php if (session()->get('success')): ?>
    <script>
    alert("<?= session()->get('success') ?>");
    </script>
    <?php 
        session()->remove('success'); 
    endif; 
    ?>
    <div class="container rounded">
        <div class="row">
            <div class="col-12 col-lg-6  d-flex justify-content-center align-items-center" data-aos="fade-right">
                <img src="<?= base_url("landingasset")?>/images/logo.png" alt="Image" class="img-fluid rounded h-75">
            </div>
            <div class="col-12 col-lg-6 bg-white" style="border-radius:10px" data-aos="fade-left">
                <div class="p-5">
                    <?php if (session()->get('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->get('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php session()->remove('error'); endif; ?>
                    <h3 class=" text-center fw-bold text-dark">LOGIN</h3>
                    <form action="<?= site_url("login/login") ?>" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label ms-3">Username</label>
                            <input type="text" class="form-control rounded-pill border shadow" id="username"
                                name="username" placeholder="Enter your Username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label ms-3">Password</label>
                            <input type="password" class="form-control rounded-pill border shadow" id="password"
                                name="password" placeholder="Enter your password" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success py-2 rounded-pill"
                                style="background-color: #38A3A5; border: 2px solid #38A3A5;">login</button>
                        </div>
                        <div class=" mt-3">
                            <a href="<?= site_url("Home") ?>">Home</a>&nbsp;
                            <!-- |<a href="<?= site_url("Login/register") ?>">Daftar</a> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url("landingasset")?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url("landingasset")?>/js/aos.js"></script>
    <script src="<?= base_url("landingasset")?>/js/custom.js"></script>
</body>

</html>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>login</title>
</head>

<body>

    <style>
        input[type="username"] {
            border-bottom-left-radius: 0px;
            border-bottom-right-radius: 0px;
        }

        input[type="password"] {
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;

        }

        .ftco-section {
            padding: 7em 0;
        }

        .login-wrap {
            position: relative;
            background: #fff;
            border-radius: 10px;
            -webkit-box-shadow: 0px 10px 34px -15px rgb(0 0 0 / 24%);
            -moz-box-shadow: 0px 10px 34px -15px rgba(0, 0, 0, 0.24);
            box-shadow: 0px 10px 34px -15px rgb(0 0 0 / 24%);
        }
    </style>

    <section class="ftco-section">
        <div class="container m-auto">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="text-center">
                            <form style="max-width: 400px; margin:auto;" action="/admin/ceklogin" method="POST">
                                <img class="mt-4 mb-4" src="/assets/img/logo.png" height="72">
                                <h1 class="h3 mb-3 font-weight-normal">Silahkan Login</h1>
                                <?php if (session()->getFlashdata('gagallogin')) { ?>
                                    <div class="alert alert-danger mt-3" role="alert">
                                        <?= session()->getFlashdata('gagallogin') ?>
                                    </div>
                                <?php }
                                if (session()->getFlashdata('gagal')) { ?>
                                    <div class="alert alert-danger mt-3" role="alert">
                                        <?= session()->getFlashdata('gagal') ?>
                                    </div>
                                <?php }
                                if (session()->getFlashdata('daftar')) { ?>
                                    <div class="alert alert-success mt-3" role="alert">
                                        <?= session()->getFlashdata('daftar') ?>
                                    </div>
                                <?php }
                                if (session()->getFlashdata('logout')) { ?>
                                    <div class="alert alert-danger mt-3" role="alert">
                                        <?= session()->getFlashdata('logout') ?>
                                    </div>
                                <?php } ?>
                                <label for="username" class="sr-only"></label>
                                <input type="text" id="username" class="form-control" placeholder="username" name="username" required autofocus>
                                <label for="password" class="sr-only"></label>
                                <input type="password" id="password" placeholder="password" name="password" class="form-control">

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-success btn-block">Login</button>
                                    <a href="admin/register">
                                        <button type="button" class="btn btn-outline-success">Register</button>
                                    </a>
                                </div>
                                <div>
                                    <a href="/home" style="text-decoration: none; color: green;">
                                        kembali ke beranda
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
</body>

</html>
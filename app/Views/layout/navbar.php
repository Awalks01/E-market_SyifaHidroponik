<!--navbar-->
<section id="nav">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" style="font-weight: bold;" href="/">
                <img src="/assets/img/logo.png" width="40" height="40"></img>
                Syifa Hidroponik
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Produk
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="/home/product">Semua Produk</a></li>
                            <li>
                                <hr class="dropdown-divider" style="width: 100%;">
                            </li>
                            <li><a class="dropdown-item" href="/home/producttag/1">Produk Olahan</a></li>
                            <li><a class="dropdown-item" href="/home/producttag/7">Peralatan hidroponik</a></li>
                        </ul>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Tentang kami
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="/home/about">Tentang Syifa Hidroponik</a></li>
                            <li><a class="dropdown-item" href="/home/about#visi_misi">Visi & Misi</a></li>
                            <li><a class="dropdown-item" href="/home/about#sejarah">Sejarah</a></li>
                        </ul>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/home/blog">Berita</a>
                    </li> -->

                    <?php if (session()->get('username') == !null) {
                    ?>
                        <div class="btn-group">
                            <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg></button>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/home/profile">Profile</a></li>
                                <li><a class="dropdown-item" href="/cart/transaksi">Pesanan saya</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/admin/logout">Keluar</a></li>
                            </ul>
                        </div>
                    <?php
                    } else { ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/admin">Login</a>
                        </li>
                    <?php
                    } ?>

                </ul>
            </div>
        </div>
    </nav>
</section>
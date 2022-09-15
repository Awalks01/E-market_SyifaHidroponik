<!-- sidebar -->
<div class="sidebar col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <div class="profile py-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
            </svg>
            <span class="ms-1 d-none d-sm-inline"><?= session()->get('username'); ?></span>
        </div>
        <hr class="dropdown-divider" style="width: 100%;">
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item">
                <a href="/admin/home" class="nav-link align-middle px-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                        <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z" />
                    </svg>
                    <span class="ms-1 d-none d-sm-inline">Home</span>
                </a>
            </li>
            <?php if (session()->get('status') == 1) {
            ?>
                <li>
                    <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                            <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                        </svg>
                        <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Produk</span></a>
                    <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                        <li class="w-100">
                            <a href="/admin/tampilproduk" class="nav-link px-0"> <span class="d-none d-sm-inline">Data
                                    Produk</span></a>
                        </li>
                        <li>
                            <a href="/admin/tambahproduk" class="nav-link px-0"> <span class="d-none d-sm-inline">Tambah
                                    Produk</span></a>
                        </li>
                    </ul>
                </li>
            <?php } else {
                # code...
            } ?>

            <!-- <li>
                <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-file-post-fill" viewBox="0 0 16 16">
                        <path
                            d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM4.5 3h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zm0 2h7a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 1 .5-.5z" />
                    </svg>
                    <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Blog Post</span></a>
                <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="/admin/tampilpost" class="nav-link px-0"> <span class="d-none d-sm-inline">Data
                                Post</span></a>
                    </li>
                    <li>
                        <a href="/admin/tambahpost" class="nav-link px-0"> <span class="d-none d-sm-inline">Tambah
                                Post</span></a>
                    </li>
                </ul>
            </li> -->

            <li>
                <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-post-fill" viewBox="0 0 16 16">
                        <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM4.5 3h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zm0 2h7a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 1 .5-.5z" />
                    </svg>
                    <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Transaksi</span></a>
                <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="<?php if (session()->get('status') == 0) {
                                        echo '/admin/transaksiadmin';
                                    } elseif (session()->get('status') == 1) {
                                        echo '/admin/transaksi';
                                    } else {
                                        # code...
                                    }; ?>" class="nav-link px-0"> <span class="d-none d-sm-inline">Data
                                Transaksi</span></a>
                    </li>
                </ul>
            </li>
        </ul>

    </div>
</div>
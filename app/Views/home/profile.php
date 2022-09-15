<?= $this->extend('layout/hometemplate'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row flex-nowrap">
        <!-- content -->
        <div class="col py-3">
            <div class="title py-1">
                Profile
            </div>
            <div class="col-lg-12 mt-2">
                <?php if (session()->getFlashdata('pesan')) { ?>
                    <div class="alert alert-success alert-dismissible"><?= session()->getFlashdata('pesan'); ?></div>
                <?php } ?>
            </div>

            <div>
                <form action="/home/save" method="POST">
                    <?php foreach ($user as $u) {
                    ?>
                        <div class="form-floating ">
                            <input type="username" class="form-control" id="floatingInput" name="username" value="<?= $u['username']; ?>" readonly>
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating ">
                            <input type="password" class="form-control" id="floatingInput" name="password" value="<?= $u['password']; ?>">
                            <label for="floatingInput">Password</label>
                        </div>
                        <div class="form-floating ">
                            <input type="email" class="form-control" id="floatingInput" name="email" value="<?= $u['email']; ?>">
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating ">
                            <input type="nama" class="form-control" id="floatingInput" name="nama" value="<?= $u['nama']; ?>">
                            <label for="floatingInput">Nama Lengkap</label>
                        </div>
                        <div class="form-floating ">
                            <input type="phone" class="form-control" id="floatingInput" name="phone" value="<?= $u['no_hp']; ?>">
                            <label for="floatingInput">No. Handphone</label>
                        </div>
                        <div class="form-floating ">
                            <input type="text" class="form-control" id="floatingInput" name="alamat" value="<?= $u['alamat']; ?>">
                            <label for="floatingInput">Alamat Lengkap</label>
                        </div>
                        <div class="m-auto mt-3">
                            <button type="submit" class="btn btn-success">Ubah</button>
                        </div>
                    <?php
                    } ?>

                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endsection(); ?>
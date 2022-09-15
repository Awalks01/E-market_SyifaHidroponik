<?= $this->extend('layout/hometemplate'); ?>

<?= $this->section('content'); ?>
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "key: fa3a111c3a5b936f4cbbcbc859427b5b"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $provisi = json_decode($response, true);
}
?>


<section>
    <div class="container">
        <div class="title py-1">
            Keranjang Belanja
        </div>
        <div class="col-lg-12 mt-2">
            <?php if (session()->getFlashdata('pesan')) { ?>
                <div class="alert alert-success alert-dismissible"><?= session()->getFlashdata('pesan'); ?></div>
            <?php } ?>
        </div>
        <?= form_open('cart/update') ?>
        <div>
            <div class="row row-cols-1 row-cols-md-5 g-4 mb-4 ">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" width="100px">Qty</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">harga satuan</th>
                            <th scope="col">harga</th>
                            <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($belanja as $b) :
                        ?>
                            <tr>
                                <th scope="row"><input type="number" min="1" name="qty<?= $i++; ?>" class="form-control" value="<?= $b['qty']; ?>"></th>
                                <td><?= $b['name']; ?></td>
                                <td><?= number_to_currency($b['price'], 'Rp.'); ?></td>
                                <td><?= number_to_currency($b['subtotal'], 'Rp.'); ?></td>
                                <td>
                                    <a href="/cart/delete/<?= $b['rowid']; ?>" class="btn btn-outline-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach
                        ?>
                    </tbody>
                </table>
                <div class="col-6"></div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary float-end mx-1">Simpan Perubahan</button>
                </div>
            </div>

        </div>
        <?= form_close(); ?>
        <form action="/cart/detailorder" method="get">
            <div class="row">
                <div class="col-6">
                    Provinsi Tujuan
                    <select id="provinsi" name="provinsi" class="form-select" aria-label="Default select example" required>
                        <option value="">pilih provinsi</option>
                        <?php if ($provisi['rajaongkir']['status']['code'] = 200) {
                            foreach ($provisi['rajaongkir']['results'] as $pv) {
                        ?><option value="<?= $pv['province_id']; ?>"><?= $pv['province']; ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
                <div class="col-6">
                    Kota Tujuan
                    <select id="kota" name="kota" class="form-select" aria-label="Default select example" required>
                        <option value="">pilih provinsi terlebnih dahulu</option>
                    </select>

                </div>

            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-success float-end mx-1">Lanjut Pemesanan</button>
            </div>

        </form>
        <script>
            document.getElementById('provinsi').addEventListener('change', function() {
                fetch(`<?= base_url('cart/kota'); ?>/${this.value}`, {
                        method: 'GET',
                    }).then((response) => response.text())
                    .then((data) => {
                        console.log(data)
                        document.getElementById('kota').innerHTML = data
                    })
            })
        </script>
    </div>
</section>

<?= $this->endsection(); ?>
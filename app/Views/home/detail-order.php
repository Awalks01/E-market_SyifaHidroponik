<?= $this->extend('layout/hometemplate'); ?>

<?= $this->section('content'); ?>

<section>
    <div class="container">
        <div class="title py-1">
            Check Out
        </div>
        <div class="col-lg-12 mt-2">
            <?php if (session()->getFlashdata('pesan')) { ?>
                <div class="alert alert-success alert-dismissible"><?= session()->getFlashdata('pesan'); ?></div>
            <?php } ?>
        </div>
        <?= form_open('cart/save_transaksi') ?>
        <div>
            <div class="row row-cols-1 row-cols-md-5 g-4 ">
                <table class="table table-hover">
                    <thead>
                        <tr>

                            <th scope="col">Nama Barang</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Harga Satuan</th>
                            <th scope="col">Harga</th>
                            <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($belanja as $b) :
                        ?>
                            <tr>
                                <td><?= $b['name']; ?></td>
                                <th scope="row"><?= $b['qty']; ?></th>
                                <td><?= number_to_currency($b['price'], 'Rp.'); ?></td>
                                <td><?= number_to_currency($b['subtotal'], 'Rp.'); ?></td>

                            </tr>
                        <?php endforeach
                        ?>
                        <tr>
                            <td> </td>
                            <th scope="row"></th>
                            <th>Ongkos Kirim</th>
                            <td><?php
                                $ongkir = $ongkir['rajaongkir']['results']['0']['costs']['0']['cost']['0']['value'];
                                echo number_to_currency($ongkir, 'Rp.'); ?></td>
                            <input type="hidden" name="ongkir" value="<?= $ongkir; ?>">

                        </tr>
                        <tr>
                            <td> </td>
                            <th scope="row"></th>
                            <th>Total Harga</th>
                            <th><?php

                                $total = 0;
                                foreach ($belanja as $b) :
                                    $total += $b['subtotal'];;
                                endforeach;
                                $total += $ongkir;
                                echo number_to_currency($total, 'Rp.');  ?></th>
                            <input type="hidden" name="total" id="" value="<?= $total; ?>">
                        </tr>
                    </tbody>
                </table>
            </div>
            <div>
                <button type="submit" class="btn btn-success float-end mx-1">Pesan Sekarang</button>
                <a href="/cart/belanja" class="btn btn-danger float-end mx-1">Batal</a>
            </div>
        </div>
        <?= form_close(); ?>
    </div>
</section>

<?= $this->endsection(); ?>
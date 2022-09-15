<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $allowedFields = ['notransaksi',  'user', 'kodeproduk', 'qty', 'admin', 'ongkir', 'pembayaran', 'no_resi', 'tanggal', 'status', 'total'];
    protected $primaryKey = 'notransksi';

    public function getTransaksi($notransaksi = false)
    {
        if ($notransaksi == false) {
            return $this->findAll();
        }

        return $this->where(['notransaksi' => $notransaksi])->first();
    }



    public function getTransaksijoin($notransaksi = false)
    {
        if ($notransaksi == false) {
            return $this->db->table('transaksi')
                ->join('produk', 'produk.kodeproduk = transaksi.kodeproduk')
                ->get()->getResultArray();
        }

        return $this->where(['notransaksi' => $notransaksi])->first();
    }
}

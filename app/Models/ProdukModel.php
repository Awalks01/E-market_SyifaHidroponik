<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $allowedFields = ['namaproduk', 'gambarproduk', 'kodekatagori', 'deskripsiproduk'];
    protected $primaryKey = 'kodeproduk';

    public function getProduk($namaproduk = false)
    {
        if ($namaproduk == false) {
            return $this->db->table('produk')
                ->join('katagori', 'katagori.kodekatagori = produk.kodekatagori')
                ->get()->getResultArray();
        }

        return $this->where(['namaproduk' => $namaproduk])->first();
    }

    public function getProduktag($katagori = false)
    {
        return $this->db->table('produk')
            ->join('katagori', 'katagori.kodekatagori = produk.kodekatagori')
            ->where(['produk.kodekatagori' => $katagori])
            ->get()->getResultArray();
    }
}

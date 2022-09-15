<?php

namespace App\Models;

use CodeIgniter\Model;

class KatagoriModel extends Model
{
    protected $table = 'katagori';
    protected $allowedFields = ['kodekatagori', 'katagoti'];
    protected $primaryKey = 'kodeproduk';

    public function getKatagori($kodekatagori = false)
    {
        if ($kodekatagori == false) {
            return $this->findAll();
        }

        return $this->where(['kodekatagori' => $kodekatagori])->first();
    }
}

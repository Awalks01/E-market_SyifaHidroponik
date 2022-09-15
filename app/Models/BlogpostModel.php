<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogpostModel extends Model
{
    protected $table = 'blogpost';
    protected $allowedFields = ['judul', 'gambar', 'link', 'deskripsi'];

    public function getBlogpost($judul = false)
    {
        if ($judul == false) {
            return $this->findAll();
        }

        return $this->where(['judul' => $judul])->first();
    }

    public function getBlogpost3($judul = false)
    {
        return $this->findAll(3);
    }
}

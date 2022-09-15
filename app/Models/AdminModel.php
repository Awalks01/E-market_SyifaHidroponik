<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';

    protected $primaryKey = 'username';

    public function getAdmin($username = false)
    {
        if ($username == false) {
            return $this->findAll();
        }

        return $this->where(['username' => $username])->first();
    }

    public function ceklogin($username, $password)
    {

        return $this->table('admin')
            ->where(array('username' => $username, 'password' => $password))
            ->get()
            ->getRowArray();
    }
}

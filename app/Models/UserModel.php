<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['username', 'nama', 'password', 'email', 'no_hp', 'alamat'];
    protected $primaryKey = 'username';

    public function getuser($username = false)
    {
        if ($username == false) {
            return $this->findAll();
        }

        return $this->where(['username' => $username])->first();
    }

    public function ceklogin($username, $password)
    {

        return $this->table('user')
            ->where(array('username' => $username, 'password' => $password))
            ->get()
            ->getRowArray();
    }

    public function cekusername($username)
    {

        return $this->table('user')->where(array('username' => $username))->get()->getRowArray();
    }

    public function cekemail($email)
    {

        return $this->table('user')->where(array('email' => $email))->get()->getRowArray();
    }
}

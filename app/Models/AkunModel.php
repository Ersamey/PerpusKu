<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table = 'akun';

    public function getAkun($username = false)
    {
        if ($username == false) {
            return $this->findAll();
        }
        return $this->where(['username' => $username])->first();
    }

    public function cekLogin($username, $password)
    {
        $user = $this->where(['username' => $username])->first();
        if ($user) {
            if ($user['password'] == $password) {
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'users';

    public function getAll()
    {
        return $this->findAll();
    }

    public function getRole()
    {
        $builder = $this->db->table('auth_groups_users');
        $builder->select('auth_groups_users.user_id, auth_groups.name');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        return $builder->get()->getResultArray();
    }

    public function ubahRole($data)
    {
        $userId = $data['user_id'];
        $newRole = $data['role'];
        $result = $this->db->table('auth_groups_users')
            ->where('user_id', $userId)
            ->update(['group_id' => $newRole]);
        return $result;
    }
}

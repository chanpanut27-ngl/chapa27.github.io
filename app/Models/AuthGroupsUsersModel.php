<?php

namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;

class AuthGroupsUsersModel extends Model
{
    protected $table            = 'auth_groups_users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['group_id', 'user_id'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['setInsertBy'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['setUpdatedBy'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function setUpdatedBy(array $data)
    {
       $userId = user()->username;
       $myTime = new Time();
        if ($userId) {
            // Tambahkan user_id ke data yang akan di-update
            $data['data']['updated_at'] = $myTime->toDateTimeString();
        }
        return $data;
    }

    protected function setInsertBy(array $data)
    {
        $userId = user()->username;
        $myTime = new Time();

        if ($userId) {
            // Tambahkan user_id ke data yang akan di-update
            $data['data']['created_at'] = $myTime->toDateTimeString();
        }
        return $data;
    }

    public function get_data()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('auth_groups_users');
        $builder->select('email, username, name, description, user_id, group_id');
        $builder->join('auth_groups', 'auth_groups.id=auth_groups_users.group_id');
        $builder->join('users', 'users.id=auth_groups_users.user_id');
        $query = $builder->get()->getResultArray();
        return $query;
    }
}

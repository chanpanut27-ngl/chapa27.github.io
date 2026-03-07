<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthGroupsPermissionsModel extends Model
{
    protected $table            = 'auth_groups_permissions';
    protected $primaryKey       = 'id_groups_permissions';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['group_id', 'permission_id'];

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

     protected function setInsertBy(array $data)
    {
        $username = user()->username;
        if ($username) {
            $data['data']['created_by'] = $username;
        }
        return $data;
    }
 
    protected function setUpdatedBy(array $data)
    {
       $username = user()->username;
        if ($username) {
            $data['data']['updated_by'] = $username;
        }
        return $data;
    }

    public function get_data()
    {
        $builder = $this->db->table('auth_groups_permissions');
        $builder->select('id_groups_permissions, group_id, permission_id, auth_groups.name AS name_group, auth_permissions.name AS name_permissions');
        $builder->join('auth_groups', 'auth_groups.id=auth_groups_permissions.group_id');
        $builder->join('auth_permissions', 'auth_permissions.id=auth_groups_permissions.permission_id');
        $query = $builder->get()->getResultArray();
        return $query;
    }
}

<?php

namespace App\Controllers;

use App\Models\AuthGroupsModel;
use App\Models\AuthGroupsUsersModel;
use App\Models\UsersModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthGroupsUsersMaster extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $model;
    protected $modelAuthGroups;
    protected $modelUsers;
    protected $validation;

    public function __construct()
    {
        $this->cachePage(5);
        $this->title = 'Auth Groups Users';
        $this->model = new AuthGroupsUsersModel();
        $this->modelAuthGroups = new AuthGroupsModel();
        $this->modelUsers = new UsersModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
         $data = [
            'title' => 'Data ' . $this->title
        ];
        return view('Backend/Master/Auth-groups-users/index', $data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function list()
    {

        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->model->get_data()
            ];
            $msg = [
                'data' => view('Backend/Master/Auth-groups-users/_data', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }
    
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Tambah ' . $this->title,
                'groups' => $this->modelAuthGroups->findAll(),
                'users' => $this->modelUsers->findAll() 
            ];
            $msg = [
                'data' => view('Backend/Master/Auth-groups-users/_add', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        if ($this->request->isAJAX()) {
            $valid = $this->validate([
                'group_id' => [
                    'label' => 'Group',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'user_id' => [
                    'label' => 'Username',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'group_id' => $this->validation->getError('group_id'),
                        'user_id' => $this->validation->getError('user_id'),
                    ]
                ];
            } else {
                $simpandata = [
                    'group_id' => $this->request->getVar('group_id'),
                    'user_id' => $this->request->getVar('user_id')
                ];
                $this->model->save($simpandata);
                $msg = [
                    'sukses' => 'Data berhasil disimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        if ($this->request->isAJAX()) {
            $db = \Config\Database::connect();

            $user_id = $this->request->getVar('user_id');
            $group_id = $this->request->getVar('group_id');

            $builder = $db->table('auth_groups_users');
            $builder->where('group_id', $group_id)->where('user_id', $user_id);
            $builder->delete();

             $msg = [
                'sukses' => 'Data berhasil dihapus'
            ];
            echo json_encode($msg);
           
        } else {
            exit('Not Process');
        }
    }
}

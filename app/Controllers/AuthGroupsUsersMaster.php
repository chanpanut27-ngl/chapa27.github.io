<?php

namespace App\Controllers;

use App\Models\AuthGroupsModel;
use App\Models\AuthGroupsUsersModel;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;

class AuthGroupsUsersMaster extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $model;
    protected $m_auth_groups;
    protected $m_users;

    public function __construct()
    {
        $this->title = 'Auth Groups Users';
        $this->model = new AuthGroupsUsersModel();
        $this->m_auth_groups = new AuthGroupsModel();
        $this->m_users = new UsersModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data ' . $this->title
        ];
        return view('Backend/Master/Auth-groups-users/index', $data);
    }

    public function list()
    {

        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->model->get_data()
            ];
            $msg = [
                'data' => view('Backend/Master/Auth-groups-users/__data', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
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
                'groups' => $this->m_auth_groups->findAll(),
                'users' => $this->m_users->findAll() 
            ];
            $msg = [
                'data' => view('Backend/Master/Auth-groups-users/__add', $data)
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
                $save = [
                    'group_id' => $this->request->getVar('group_id'),
                    'user_id' => $this->request->getVar('user_id')
                ];
                $this->model->save($save);
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
    public function edit($id = null)
    {
        //
    }

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

            $user_id = $this->request->getVar('user_id');
            $group_id = $this->request->getVar('group_id');

            $builder = $this->db->table('auth_groups_users');
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

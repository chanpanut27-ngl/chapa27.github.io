<?php

namespace App\Controllers;

use App\Models\AuthGroupsModel;
use App\Models\AuthGroupsPermissionsModel;
use App\Models\AuthPermissionsModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthGroupsPermissionsMaster extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $model;
    protected $modelAuthGroups;
    protected $modelAuthPermissions;
    protected $validation;

    public function __construct()
    {
        
        $this->title = 'Auth Groups Permissions';
        $this->model = new AuthGroupsPermissionsModel();
        $this->modelAuthGroups = new AuthGroupsModel();
        $this->modelAuthPermissions = new AuthPermissionsModel();

        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
         $data = [
            'title' => 'Data ' . $this->title
        ];
        return view('Backend/Master/Auth-groups-permissions/index', $data);
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
                'data' => view('Backend/Master/Auth-groups-permissions/_data', $data)
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
                'permissions' => $this->modelAuthPermissions->findAll(),
            ];
            $msg = [
                'data' => view('Backend/Master/Auth-groups-permissions/_add', $data)
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
                'permission_id' => [
                    'label' => 'Permissions',
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
                        'permission_id' => $this->validation->getError('permission_id'),
                    ]
                ];
            } else {
                $simpandata = [
                    'group_id' => $this->request->getVar('group_id'),
                    'permission_id' => $this->request->getVar('permission_id')
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
        //
    }
}

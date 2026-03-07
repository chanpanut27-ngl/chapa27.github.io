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
                'groups_users' => $this->m_auth_groups->findAll(),
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

            $save = [
                'group_id' => $this->request->getVar('group_id'),
                'user_id' => $this->request->getVar('user_id')
            ];
            $this->model->save($save);
            $msg = [
                'sukses' => 'Data berhasil disimpan'
            ];
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
        if ($this->request->isAJAX()) {

            $data = [
                'title' => 'Edit ' . $this->title,
                'items' => $this->model->where('id_groups_users', $id)->first(),
                'groups_users' => $this->m_auth_groups->findAll(),
                'users' => $this->m_users->findAll() 
            ];
            $msg = [
                'sukses' => view('Backend/Master/Auth-groups-users/__edit', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
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
        if ($this->request->isAJAX()) {

            $save = [
                'id_groups_users' => $this->request->getVar('id'),
                'group_id' => $this->request->getVar('group_id'),
                'user_id' => $this->request->getVar('user_id')
            ];
            $this->model->save($save);
            $msg = [
                'sukses' => 'Data berhasil diubah'
            ];
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
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

            $this->model->delete($id);
            $msg = [
                'sukses' => 'Data berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }
}

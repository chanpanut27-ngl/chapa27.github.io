<?php

namespace App\Controllers;

use App\Models\JenisSampelModel;
use App\Models\LaboratoriumModel;
use App\Models\ParameterModel;
use App\Models\PeraturanModel;
use CodeIgniter\HTTP\ResponseInterface;

class JenisSampelMaster extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $model;
    protected $m_lab;
    protected $m_peraturan;
    protected $m_parameter;


    public function __construct()
    {
        $this->title = 'Jenis Sampel';
        $this->model = new JenisSampelModel();
        $this->m_lab = new LaboratoriumModel();
        $this->m_peraturan = new PeraturanModel();
        $this->m_parameter = new ParameterModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data ' . $this->title
        ];
        return view('Backend/Master/Jenis-sampel/index', $data);
    }

    public function list()
    {

        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->model->get_data_all()
            ];
            $msg = [
                'data' => view('Backend/Master/Jenis-sampel/__data', $data)
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
                'masterLab' => $this->m_lab->get_data(),
                'masterPeraturan' => $this->m_peraturan->get_data()
            ];
            $msg = [
                'data' => view('Backend/Master/Jenis-sampel/__add', $data)
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
                'id_peraturan' => [
                    'label' => 'Peraturan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jenis_sampel' => [
                    'label' => 'Jenis sampel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'pnbp' => [
                    'label' => 'PNBP',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'numeric' => '{field} harus berisi angka'
                    ]
                ],
                'id_lab' => [
                    'label' => 'Laboratorium',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'id_peraturan' => $this->validation->getError('id_peraturan'),
                        'jenis_sampel' => $this->validation->getError('jenis_sampel'),
                        'pnbp' => $this->validation->getError('pnbp'),
                        'id_lab' => $this->validation->getError('id_lab')
                    ]
                ];
            } else {
                $id_lab = $this->request->getVar('id_lab');
                $kode_sampel = $this->m_lab->find($id_lab);
                $save = [
                    'kode_sampel' => $kode_sampel['kode_lab'],
                    'id_peraturan' => $this->request->getVar('id_peraturan'),
                    'jenis_sampel' => $this->request->getVar('jenis_sampel'),
                    'pnbp' => $this->request->getVar('pnbp'),
                    'keterangan' => $this->request->getVar('keterangan'),
                    'id_lab' => $id_lab
                ];
                $this->model->insert($save);
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
        if ($this->request->isAJAX()) {

            $data = [
                'title' => 'Edit ' . $this->title,
                'items' => $this->model->find($id),
                'masterLab' => $this->m_lab->get_data(),
                'masterPeraturan' => $this->m_peraturan->get_data()
            ];
            $msg = [
                'sukses' => view('Backend/Master/Jenis-sampel/__edit', $data)
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
            $valid = $this->validate([
                'id_peraturan' => [
                    'label' => 'Peraturan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jenis_sampel' => [
                    'label' => 'Jenis sampel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'pnbp' => [
                    'label' => 'PNBP',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'numeric' => '{field} harus berisi angka'
                    ]
                ],
                'id_lab' => [
                    'label' => 'Laboratorium',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'id_peraturan' => $this->validation->getError(field: 'id_peraturan'),
                        'jenis_sampel' => $this->validation->getError('jenis_sampel'),
                        'pnbp' => $this->validation->getError('pnbp'),
                        'id_lab' => $this->validation->getError('id_lab')
                    ]
                ];
            } else {
                $id_lab = $this->request->getVar('id_lab');
                $kode_sampel = $this->m_lab->find($id_lab);
                $save = [
                    'id' => $this->request->getVar('id'),
                    'kode_sampel' => $kode_sampel['kode_lab'],
                    'id_peraturan' => $this->request->getVar('id_peraturan'),
                    'jenis_sampel' => $this->request->getVar('jenis_sampel'),
                    'pnbp' => $this->request->getVar('pnbp'),
                    'keterangan' => $this->request->getVar('keterangan'),
                    'id_lab' => $this->request->getVar('id_lab'),
                    'is_active' => $this->request->getVar('is_active')
                ];
                $this->model->save($save);
                $msg = [
                    'sukses' => 'Data berhasil diubah'
                ];
            }
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

    public function show_parameter($id = null)
    {
       
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Detail Parameter',
                'items' => $this->m_parameter->where('id_jenis_sampel', $id)->find(),
            ];
            $msg = [
                'sukses' => view('Backend/Master/Jenis-sampel/__parameter', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }  
    }


}

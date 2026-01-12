<?php

namespace App\Controllers;

use App\Models\JenisSampelModel;
use App\Models\LaboratoriumModel;
use App\Models\PeraturanModel;
use App\Models\PerParameterModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;

class PerParameterMaster extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $model;
    protected $validation;
    protected $modelLab;
    protected $modelSampel;


    public function __construct()
    {
        $this->cachePage(5);
        $this->title = 'Per Parameter Sampel';
        $this->model = new PerParameterModel();
        $this->modelLab = new LaboratoriumModel();
        $this->modelSampel = new JenisSampelModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
         $data = [
            'title' => 'Data ' . $this->title
        ];
        return view('Backend/Master/Parameter/index', $data);
    }

    public function list()
    {

        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->model->get_data()
            ];
            $msg = [
                'data' => view('Backend/Master/Parameter/_data', $data)
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
                'masterLab' => $this->modelLab->get_data()
            ];
            $msg = [
                'data' => view('Backend/Master/Parameter/_add', $data)
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
                'id_jenis_sampel' => [
                    'label' => 'Jenis sampel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
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
                        'id_lab' => $this->validation->getError('id_lab'),
                        'id_jenis_sampel' => $this->validation->getError('id_jenis_sampel')
                    ]
                ];
            } else {
                $parameter = $this->request->getVar('parameter');
                $count = count($parameter ?? []);
                for ($i=0; $i < $count; $i++) { 

                    $simpandata = [
                        'id_jenis_sampel' => $this->request->getVar('id_jenis_sampel'),
                        'parameter' => $parameter[$i],
                        'metode' => $this->request->getVar('metode')[$i],
                        'harga_per_titik' => $this->request->getVar('harga_per_titik')[$i]
                    ];
                    $this->model->insert($simpandata);
                    $msg = [
                        'sukses' => 'Data berhasil disimpan'
                    ];
                }
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
            ];
            $msg = [
                'sukses' => view('Backend/Master/Parameter/_edit', $data)
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
                'parameter' => [
                    'label' => 'Parameter',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'metode' => [
                    'label' => 'Metode',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'harga_per_titik' => [
                    'label' => 'Harga per titik',
                    'rules' => 'required|is_numeric',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_numeric' => '{field} harus angka'
                    ]
                ]
                
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'parameter' => $this->validation->getError('parameter'),
                        'metode' => $this->validation->getError('metode'),
                        'harga_per_titik' => $this->validation->getError('harga_per_titik')
                    ]
                ];
            } else {
                    $simpandata = [
                        'id' => $this->request->getVar('id'),
                        'parameter' => $this->request->getVar('parameter'),
                        'metode' => $this->request->getVar('metode'),
                        'harga_per_titik' => $this->request->getVar('harga_per_titik')
                    ];
                    $this->model->save($simpandata);
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

    public function list_sampel()
    {
        if ($this->request->isAJAX()) {
            $id_lab = $this->request->getVar('id_lab');
            $result = $this->modelSampel->where('id_lab', $id_lab)->get()->getResultArray();

            foreach ($result as $rows) {
                $data[] = '<option value="'.$rows['id'].'">'.$rows['jenis_sampel'].' '.$rows['keterangan'].'</option>';
            }
            $msg = ['data' => $data];
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }

    public function detail_sampel()
    {
        if ($this->request->isAJAX()) {
            $id_jenis_sampel = $this->request->getVar('id_jenis_sampel');
            $sampel = $this->modelSampel->find($id_jenis_sampel);
            $id_peraturan = $sampel['id_peraturan'];
            $peraturan = new PeraturanModel();
            $result = $peraturan->find($id_peraturan);
            $data = $result['peraturan'];
            $msg = ['data' => $data];
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }

}

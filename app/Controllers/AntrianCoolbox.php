<?php

namespace App\Controllers;

use App\Models\AntrianCoolboxModel;
use App\Models\CoolboxModel;
use CodeIgniter\HTTP\ResponseInterface;

class AntrianCoolbox extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $model;
    protected $m_coolbox;

    public function __construct()
    {
        $this->title = 'Antrian coolbox';
        $this->model = new AntrianCoolboxModel();
        $this->m_coolbox = new CoolboxModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data ' . $this->title
        ];
        return view('Backend/Modul/Antrian-coolbox/index', $data);
    }

    public function list()
    {

        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->model->get_data()
            ];
            $msg = [
                'data' => view('Backend/Modul/Antrian-coolbox/__data', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }

    public function generate_no_antrian() 
    {
        $tahun = '';
        // cari tahun data terakhir 
        $query = $this->model->orderBy('id', 'DESC')->get();
        
        foreach ($query->getResultArray() as $row) {
            $tahun = $row['created_at'];
        }
        $nextYear = date('Y', strtotime($this->today)) + 1;
        if ($tahun < $nextYear) {
            $count = $this->model->where('created_at', $tahun)->countAllResults();
            $nomorUrut = $count + 1;
        }else{
            $count = $this->model->where('created_at', $nextYear)->countAllResults();
            $nomorUrut = $count + 1;
        }
        $nomorAntrian = 'A'. sprintf('%04d', $nomorUrut);
        return $nomorAntrian;
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
                'masterCoolbox' => $this->m_coolbox->get_data()
            ];

            $msg = [
                'data' => view('Backend/Modul/Antrian-coolbox/__add', $data)
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
                'id_coolbox' => [
                    'label' => 'Kode coolbox',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'tgl_terima_coolbox' => [
                    'label' => 'Tanggal terima coolbox',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jam_terima_coolbox' => [
                    'label' => 'Jam terima coolbox',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            $id_coolbox = $this->request->getVar('id_coolbox');
            $tgl_terima_coolbox = $this->request->getVar('tgl_terima_coolbox');

            $antrian_coolbox = $this->model->cek_data($id_coolbox, $tgl_terima_coolbox);
            
            if (!$valid) {
                $msg = [
                    'error' => [
                        'id_coolbox' => $this->validation->getError('id_coolbox'),
                        'tgl_terima_coolbox' => $this->validation->getError('tgl_terima_coolbox'),
                        'jam_terima_coolbox' => $this->validation->getError('jam_terima_coolbox')
                    ]
                ];
            } else if ($antrian_coolbox) {
                $msg = [
                    'error' => 'Data gagal disimpan'
                ];
            } else {
                $simpandata = [
                    'no_antrian' => $this->generate_no_antrian(),
                    'id_coolbox' => $id_coolbox,
                    'tgl_terima_coolbox' => $this->request->getVar('tgl_terima_coolbox'),
                    'jam_terima_coolbox' => $this->request->getVar('jam_terima_coolbox')
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

    public function cetak_label($param) 
    {
        $query = $this->model->cetak_label($param);
        $kode_coolbox = '';
        foreach ($query as $key) {
            $kode_coolbox = $key['kode_coolbox'];
        }

        $data = [
            'title' => 'Label Coolbox',
            'kode_coolbox' => $kode_coolbox,
            'items' => $query
        ];
            
        return view('Backend/Modul/Antrian-coolbox/__cetak', $data);    
    }


}

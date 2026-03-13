<?php

namespace App\Controllers;

use App\Models\LaboratoriumModel;
use App\Models\ParameterModel;
use App\Models\Pelanggan\ProfilPelangganModel;
use App\Models\PermintaanPelangganModel;
use App\Models\PermintaanPemeriksaanModel;
use App\Models\PermintaanSampelModel;
use App\Models\StatusLayananModel;
use CodeIgniter\HTTP\ResponseInterface;

class Pemeriksaan extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $model;
    protected $m_profil;
    protected $m_permintaan;
    protected $m_lab;
    protected $m_permintaan_sampel;
    protected $status_layanan;
    

    public function __construct()
    {
        $this->title = 'Pemeriksaan';
        $this->model = new PermintaanPelangganModel();
        $this->m_profil = new ProfilPelangganModel();
        $this->m_lab = new LaboratoriumModel();
        $this->m_permintaan_sampel = new PermintaanSampelModel();
        $this->status_layanan = new StatusLayananModel();

    }

    function acepted_penawaran($params)  
    {
        $acepted_permintaan = $this->status_layanan->
        where('id_pelanggan', $params)->
        where('status', 'Penawaran di Terima')->first();
        return $acepted_permintaan;
    }

    public function index($id)
    {
        $items = $this->model->where('no_reg', $id)->first();

        $data = [
            'title' => $this->title,
            'profil' => $this->m_profil->get_data(),
            'items' => $items,
            'acepted_penawaran' => $this->acepted_penawaran($items['id'])
        ];
        return view('Backend/Modul/Pelayanan/Pemeriksaan/index', $data);
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

    public function list()
    {

        if ($this->request->isAJAX()) {
            $pemeriksaan = new PermintaanPemeriksaanModel();
            $id_pelanggan = $this->request->getVar('id_pelanggan');
             
            $data = [
                'items' => $pemeriksaan->get_data_list($id_pelanggan),
                'acepted_penawaran' => $this->acepted_penawaran($id_pelanggan)
            ];

            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Pemeriksaan/__data', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }

        
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
                'id_pelanggan' => $this->request->getVar('id_pelanggan'),
                'no_reg' => $this->request->getVar('no_reg'),
                'masterLab' => $this->m_lab->get_data()
            ];
            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Pemeriksaan/__add', $data)
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
                ],
                'jumlah_sampel' => [
                    'label' => 'Jumlah sampel',
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
                        'jumlah_sampel' => $this->validation->getError('jumlah_sampel'),
                        'id_jenis_sampel' => $this->validation->getError('id_jenis_sampel')
                    ]
                ];
            } else {
                $msg = '';
                $ket_peraturan = '';

                $this->db->transStart();
                $builder = $this->db->table('permintaan_pemeriksaan');
                $builder2 = $this->db->table('permintaan_sampel');
               
                $id_parameter = $this->request->getVar('id_parameter');
                $id_pelanggan = $this->request->getVar('id_pelanggan');
                $id_jenis_sampel = $this->request->getVar('id_jenis_sampel');
                $no_reg = $this->request->getVar('no_reg');

                $count = count($id_parameter ?? []);
                
                $pemeriksaan = new PermintaanPemeriksaanModel();
              
                
                for ($i=0; $i < $count; $i++) { 

                    $save_pemeriksaan = [
                        'id_pelanggan' => $id_pelanggan,
                        'no_reg' => $no_reg,
                        'id_lab' => $this->request->getVar('id_lab'),
                        'id_jenis_sampel' => $id_jenis_sampel,
                        'id_parameter' => $id_parameter[$i],
                    ];
                    
                    $_pemeriksaan = $pemeriksaan->
                    where('id_pelanggan', $id_pelanggan)->
                    where('id_jenis_sampel', $id_jenis_sampel)->
                    where('id_parameter', $id_parameter[$i])->countAllResults();

                    if ($_pemeriksaan > 0) {
                        $builder->where('id_pelanggan', $id_pelanggan)->
                        where('id_jenis_sampel', $id_jenis_sampel)->
                        where('id_parameter', $id_parameter[$i])->update($save_pemeriksaan);
                    } else {
                        $builder->insert($save_pemeriksaan);
                    }

                }

                $jlh_pp = $pemeriksaan->
                where('id_jenis_sampel', $id_jenis_sampel)->
                where('id_pelanggan', $id_pelanggan)->countAllResults();

                $_parameter = new ParameterModel();
                $jlh_p = $_parameter->
                where('id_jenis_sampel', $id_jenis_sampel)->countAllResults();
                

                if ($jlh_pp < $jlh_p) {
                    $ket_peraturan = "Tidak lengkap";
                } else{
                    $ket_peraturan = "Lengkap";
                }

                $save_permintaan_sampel = [
                    'id_pelanggan' => $id_pelanggan,
                    'no_reg' => $no_reg,
                    'id_jenis_sampel' => $this->request->getVar('id_jenis_sampel'),
                    'jumlah_sampel' => $this->request->getVar('jumlah_sampel'),
                    'ket_peraturan' => $ket_peraturan,
                ];

                $_permintaan_sampel = $this->m_permintaan_sampel->
                where('id_pelanggan', $id_pelanggan)->
                where('id_jenis_sampel', $id_jenis_sampel)->countAllResults();
                
                if ($_permintaan_sampel > 0) {
                    $builder2->where('id_pelanggan', $id_pelanggan)->
                    where('id_jenis_sampel', $id_jenis_sampel)->update($save_permintaan_sampel);
                } else {
                    $builder2->insert($save_permintaan_sampel);
                }

                $this->db->transComplete();

                if ($this->db->transStatus() === FALSE) {
                    $msg = [
                        'error' => 'Data gagal disimpan'
                    ];
                } else {
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
        
    }
}

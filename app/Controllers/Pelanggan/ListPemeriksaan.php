<?php

namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;
use App\Models\JenisSampelModel;
use App\Models\LaboratoriumModel;
use App\Models\ParameterModel;
use App\Models\Pelanggan\ProfilPelangganModel;
use App\Models\PermintaanPelangganModel;
use App\Models\PermintaanPemeriksaanModel;
use App\Models\PermintaanSampelModel;
use CodeIgniter\HTTP\ResponseInterface;

class ListPemeriksaan extends BaseController
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
    protected $m_jenis_sampel;

    public function __construct()
    {
        $this->title = 'Pemeriksaan';
        $this->model = new PermintaanPemeriksaanModel();
        $this->m_profil = new ProfilPelangganModel();
        $this->m_permintaan = new PermintaanPelangganModel();
        $this->m_lab = new LaboratoriumModel();
        $this->m_permintaan_sampel = new PermintaanSampelModel();
        $this->m_jenis_sampel = new JenisSampelModel();
    }

    public function index($id = null)
    {
        $profil = $this->m_profil->get_data();
        $permintaan = $this->m_permintaan->first($id);
        $data = [
            'title' => 'Data ' . $this->title,
            'profil' => $profil,
            'items' => $permintaan
        ];
        return view('Pelanggan/Pemeriksaan/List/index', $data);
    }

    public function list($id = null)
    {
        if ($this->request->isAJAX()) {
            $id_pelanggan = $this->request->getVar('id_pelanggan');
            $data = [
                'items' => $this->model->get_data_list($id_pelanggan)
            ];
            $msg = [
                'data' => view('Pelanggan/Pemeriksaan/List/__data', $data)
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
                'data' => view('Pelanggan/Pemeriksaan/List/__add', $data)
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

                $_parameter = new ParameterModel();
                $jlh_p = $_parameter->
                where('id_jenis_sampel', $id_jenis_sampel)->countAllResults();

                $_permintaan_periksa = new PermintaanPemeriksaanModel();
                $jlh_pp = $_permintaan_periksa->
                where('id_jenis_sampel', $id_jenis_sampel)->
                where('id_pelanggan', $id_pelanggan)->countAllResults();

                if ($jlh_pp < $jlh_p) {
                    $ket_peraturan = "Tidak lengkap";
                }else{
                    $ket_peraturan = "Lengkap";
                }

                $save_permintaan_sampel = [
                    'id_pelanggan' => $id_pelanggan,
                    'no_reg' => $no_reg,
                    'id_jenis_sampel' => $this->request->getVar('id_jenis_sampel'),
                    'jumlah_sampel' => $this->request->getVar('jumlah_sampel'),
                    'ket_peraturan' => $ket_peraturan,
                ];

                $cek_permintaan_sampel = $this->m_permintaan_sampel->
                where('id_pelanggan', $id_pelanggan)->
                where('id_jenis_sampel', $id_jenis_sampel)->countAllResults();
                
                if ($cek_permintaan_sampel > 0) {
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
        if ($this->request->isAJAX()) {
            $permintaan_pemeriksaan = $this->model->find($id);
            $id_jenis_sampel = $permintaan_pemeriksaan['id_jenis_sampel'];
            $id_pelanggan = $permintaan_pemeriksaan['id_pelanggan'];
            $jumlah = $this->model->
            where('id_jenis_sampel', $id_jenis_sampel)->
            where('id_pelanggan', $id_pelanggan)
            ->countAllResults();

            $this->model->delete($id);
            if ($jumlah == 1) {
                $this->m_permintaan_sampel->where('id_jenis_sampel', $id_jenis_sampel)->delete();
            }
            $this->m_permintaan_sampel->where('id_pelanggan', $id_pelanggan)->
            where('id_jenis_sampel', $id_jenis_sampel)->
            set('ket_peraturan', 'Tidak Lengkap')->update();

            $msg = [
                'sukses' => 'Data berhasil di hapus'
            ];
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }

}

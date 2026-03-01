<?php

namespace App\Controllers;

use App\Models\InstalasiModel;
use App\Models\MapPerintahUjiSampelModel;
use App\Models\PenanggungJawabPengantarModel;
use App\Models\PengantarLabModel;
use App\Models\PerintahUjiSampelModel;
use CodeIgniter\HTTP\ResponseInterface;

class PerintahUjiSampel extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $model;
    protected $modelPj;
    protected $modelInstalasi;
    protected $modelPengantarLhu;
    protected $modelMpu;

    public function __construct()
    {
       
        $this->title = 'Perintah Uji Sampel';
        $this->model = new PerintahUjiSampelModel();
        $this->modelPj = new PenanggungJawabPengantarModel();
        $this->modelInstalasi = new InstalasiModel();
        $this->modelPengantarLhu = new PengantarLabModel();
        $this->modelMpu = new MapPerintahUjiSampelModel();
    }

    public function index()
    {

        $data = [
            'title' => 'Data ' . $this->title
        ];
        return view('Backend/Modul/Pelayanan/Perintah-uji/index', $data);
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
    public function list()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->model->get_data()
            ];
            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Perintah-uji/__data', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }    
    }

    public function new()
    {
         if ($this->request->isAJAX()) {

            $_data = '';
            $kode_pengantar = $this->request->getVar('kode_pengantar');
            $id_instalasi = $this->request->getVar('id_instalasi');
            $id_kat_lab = $this->request->getVar('id_kat_lab');
            $instalasi = $this->modelInstalasi->find($id_instalasi);

            // Penanggung jawab sampel
            $penanggung_jawab = $this->modelPj->select('id_kat_lab, tgl_terima_sampel')
            ->where('kode_pengantar', $kode_pengantar)
            ->where('id_kat_lab', $id_kat_lab)->first();

            // id pengantar lhu
            $id_pengantar_lab = $this->modelPengantarLhu->select('id')
            ->where('kode_pengantar', $kode_pengantar)->first();

            
            if (isset($penanggung_jawab['id_kat_lab']) == 1) {
                $_data = $this->model->get_data_sampel_lingkungan($kode_pengantar);
            }else{
                $_data = $this->model->get_data_spesimen_penyakit($kode_pengantar);
            }
           
            $data = [
                'title' => 'Tambah ' . $this->title . ' ('.$kode_pengantar.')',
                'id_instalasi' => $id_instalasi,
                'instalasi' => $instalasi,
                'kode_pengantar' => $kode_pengantar,
                'id_pengantar_lab' => $id_pengantar_lab,
                'tgl_terima_sampel' => $penanggung_jawab,
                'items' => $_data
            ];

            
            if (isset($penanggung_jawab) == null) {
                $msg = [
                    'error' => 'Penanggung jawab di pengantar laboratorium belum diisi'
                ];
            } else {
                $msg = [
                    'data' => view('Backend/Modul/Pelayanan/Perintah-uji/__add', $data)
                ];
            }
            
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
        if ($this->request->isAJAX()) 
        {
             $db = \Config\Database::connect();

            $db->transStart();
            $builder1 = $this->db->table('perintah_uji_sampel');
            // Perintah uji sampel
            $tb_uji_sampel = [
                'id_pengantar_lab' => $this->request->getVar('id_pengantar_lab'),
                'id_instalasi' => $this->request->getVar('id_instalasi'),
                'kode_pengantar' => $this->request->getVar('kode_pengantar'),
                'sifat_pemeriksaan' => $this->request->getVar('sifat_pemeriksaan'),
                'tgl_kirim_sampel' => $this->request->getVar('tgl_kirim_sampel'),
                'tgl_terima_sampel_ke_kains_lab' => $this->request->getVar('tgl_terima_sampel_ke_kains_lab'),
                'tgl_selesai_sampel' => $this->request->getVar('tgl_selesai_sampel'),
                'tgl_terima_sampel_ke_analis_lab' => $this->request->getVar('tgl_terima_sampel_ke_analis_lab'),
                'tgl_terima_sampel' => $this->request->getVar('tgl_terima_sampel')
                ];
            $builder1->insert($tb_uji_sampel);

            // Maping perintah uji sampel
            $builder2 = $this->db->table('map_perintah_uji_sampel');

            $id_jenis_sampel = $this->request->getVar('id_jenis_sampel');
            $count = count($id_jenis_sampel ?? []);
            $id_map = $this->db->insertID();

                for ($i=0; $i < $count; $i++) { 
                    $map_data = [
                        'id_map' => $id_map,
                        'id_jenis_sampel' => $id_jenis_sampel[$i],
                        'metode_uji' => $this->request->getVar('metode_uji'),
                        'keterangan' => $this->request->getVar('keterangan'),
                        'parameter_uji' => $this->request->getVar('parameter_uji'),
                    ];
                    $builder2->insert($map_data);
                }

            $db->transComplete();
            $msg = '';
            if ($db->transStatus() != FALSE) {
                
                 $msg = [
                    'sukses' => 'Data berhasil disimpan'
                ];
            } else {
               $msg = [
                    'error' => 'Data Gagal disimpan'
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

            $_data = '';

            $kode_pengantar = $this->request->getVar('kode_pengantar');
            $id_instalasi = $this->request->getVar('id_instalasi');
            $id_kat_lab = $this->request->getVar('id_kat_lab');
            $instalasi = $this->modelInstalasi->find($id_instalasi);

             // Penanggung jawab sampel
            $penanggung_jawab = $this->modelPj->
            where('kode_pengantar', $kode_pengantar)->
            where('id_kat_lab', $id_kat_lab)->first();

            // id pengantar lab
            $id_pengantar_lab = $this->modelPengantarLhu->select('id')
            ->where('kode_pengantar', $kode_pengantar)->first();

            $cek_data = $this->model->where('kode_pengantar', $kode_pengantar)
            ->where('id_instalasi', $id_instalasi)->first();
            $id_perintah_uji = $cek_data['id'];

            if ($id_instalasi == 1) {
                $_data = $this->modelMpu->get_data_sampel_lingkungan_perintah_uji($id_perintah_uji);
            }else{
                $_data = $this->modelMpu->get_data_spesimen_penyakit_perintah_uji($id_perintah_uji);
            }

            $search = $this->model->where('kode_pengantar', $kode_pengantar)
            ->where('id_instalasi', $id_instalasi)->first();

            $data = [
                'title' => 'Edit ' . $this->title . ' ('.$kode_pengantar.')',
                'id_instalasi' => $id_instalasi,
                'instalasi' => $instalasi,
                'kode_pengantar' => $kode_pengantar,
                'id_pengantar_lab' => $id_pengantar_lab,
                'tgl_terima_sampel' => $penanggung_jawab,
                'items' => $_data,
                'search' => $search,
                'id_perintah_uji' => $id_perintah_uji
            ];

            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Perintah-uji/__edit', $data)
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
    public function update() 
    {
         if ($this->request->isAJAX()) {
            $this->db->transStart();
            // $builder1 = $this->db->table('perintah_uji_sampel');
            // Perintah uji sampel
            $tb_uji_sampel = [
                'id' => $this->request->getVar('id_perintah_uji'),
                'id_pengantar_lab' => $this->request->getVar('id_pengantar_lab'),
                'id_instalasi' => $this->request->getVar('id_instalasi'),
                'kode_pengantar' => $this->request->getVar('kode_pengantar'),
                'sifat_pemeriksaan' => $this->request->getVar('sifat_pemeriksaan'),
                'tgl_kirim_sampel' => date('Y-m-d', strtotime($this->request->getVar('tgl_kirim_sampel'))),
                'tgl_terima_sampel_ke_kains_lab' => date('Y-m-d', strtotime($this->request->getVar('tgl_terima_sampel_ke_kains_lab'))),
                'tgl_selesai_sampel' => date('Y-m-d', strtotime($this->request->getVar('tgl_selesai_sampel'))),
                'tgl_terima_sampel_ke_analis_lab' => date('Y-m-d', strtotime($this->request->getVar('tgl_terima_sampel_ke_analis_lab'))),
                'tgl_terima_sampel' => date('Y-m-d', strtotime($this->request->getVar('tgl_terima_sampel'))),
            ];
            $this->model->save($tb_uji_sampel);

            // Maping perintah uji sampel

            // $id_jenis_sampel = $this->request->getVar('id_jenis_sampel');
            $idx = $this->request->getVar('idx');
            $count = count($idx ?? []);

                for ($i=0; $i < $count; $i++) { 
                    $map_data = [
                        'id' => $idx[$i],
                        'metode_uji' => $this->request->getVar('metode_uji')[$i],
                        'keterangan' => $this->request->getVar('keterangan')[$i],
                        'parameter_uji' => $this->request->getVar('parameter_uji')[$i],
                    ];
                    
                    // $this->modelMpu->where('id', $id[$i]);
                    $this->modelMpu->save($map_data);
                }
                  

            $this->db->transComplete();

            if ($this->db->transStatus() == FALSE) {
                $msg = [
                    'error' => 'Data Gagal diubah'
                ];
            } else {
                $msg = [
                    'sukses' => 'Data berhasil diubah'
                ];
            }
            echo json_encode($msg);
         } else {
            exit('Not Process');
         }
    }

    public function update1($id = null)
    {
        if ($this->request->isAJAX()) {
           

           
        } else {
            exit('Not Process');
        }
    }

    public function update2($id = null)
    {
        if ($this->request->isAJAX()) {
            $valid = $this->validate([
                'tgl_kirim_sampel' => [
                    'label' => 'Tgl kirim sampel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'kepala_instalasi' => [
                    'label' => 'Kepala instalasi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'tgl_kirim_sampel' => [
                    'label' => 'Tanggal kirim sampel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'tgl_terima_sampel_lab' => [
                    'label' => 'Tanggal terima sampel lab',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'tgl_selesai_sampel' => [
                    'label' => 'Tanggal selesai sampel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                    

            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'tgl_kirim_sampel' => $this->validation->getError('tgl_kirim_sampel'),
                        'kepala_instalasi' => $this->validation->getError('kepala_instalasi'),
                        'tgl_kirim_sampel' => $this->validation->getError('tgl_kirim_sampel'),
                        'tgl_terima_sampel_lab' => $this->validation->getError('tgl_terima_sampel_lab'),
                        'tgl_selesai_sampel' => $this->validation->getError('tgl_selesai_sampel')
                    ]
                ];
            } else {

                $db = \Config\Database::connect();

                $db->transStart();
                $tgl_kirm_sampel = $this->request->getVar('tgl_kirim_sampel');
                $tgl_terima_sampel_lab = $this->request->getVar('tgl_terima_sampel_lab');
                $tgl_selesai_sampel = $this->request->getVar('tgl_selesai_sampel');
                $tgl_terima_sampel = $this->request->getVar('tgl_terima_sampel');
                $kepala_instalasi = $this->request->getVar('kepala_instalasi');
                $tgl_terima_sampel_analis_lab = $this->request->getVar('tgl_terima_sampel_analis_lab');

                if ($kepala_instalasi != '') {
                    $username = user()->username;
                }else{
                    $username = '';
                }
                $simpandata = [
                    'id' => $this->request->getVar('id_perintah_uji'),
                    'id_pengantar_lhu' => $this->request->getVar('id_pengantar_lhu'),
                    'id_instalasi' => $this->request->getVar('id_instalasi'),
                    'sifat_pemeriksaan' => $this->request->getVar('sifat_pemeriksaan'),
                    'tgl_kirim_sampel' => date('Y-m-d', strtotime($tgl_kirm_sampel)),
                    'kepala_instalasi' => $kepala_instalasi,
                    'tgl_terima_sampel_lab' => date('Y-m-d', strtotime($tgl_terima_sampel_lab)),
                    'tgl_selesai_sampel' => date('Y-m-d', strtotime($tgl_selesai_sampel)),
                    'tgl_terima_sampel_analis_lab' => date('Y-m-d', strtotime($tgl_terima_sampel_analis_lab)),
                    'tgl_terima_sampel' => date('Y-m-d', strtotime($tgl_terima_sampel)),
                    'verificator' => $username
                ];
                
                $this->model->save($simpandata);
                $parameter_uji = $this->request->getVar('parameter_uji');
                $countPu = count($parameter_uji ?? []);
                $newId = $db->insertID();
                for ($i=0; $i < $countPu; $i++) { 
                    $mapp_data = [
                        'id' => $this->request->getVar('id')[$i],
                        'metode_uji' => $this->request->getVar('metode_uji')[$i],
                        'keterangan' => $this->request->getVar('keterangan')[$i],
                        'id_jenis_sampel' => $this->request->getVar('id_jenis_sampel')[$i],
                        'parameter_uji' => $parameter_uji[$i],
                    ];
                    $this->modelMpu->save($mapp_data);
                }
                $db->transComplete();

                if ($db->transStatus() === FALSE) {
                    $msg = [
                        'error' => 'error'
                    ];
                } else {
                   $msg = [
                     'sukses' => 'Data berhasil diubah'
                   ];
                }
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
            $kode_pengantar = $this->request->getVar('kode_pengantar');
            $id_instalasi = $this->request->getVar('id_instalasi');

            $db = \Config\Database::connect();

            $db->transStart();
            $cek_data = $this->model->where('kode_pengantar', $kode_pengantar)
            ->where('id_instalasi', $id_instalasi)->first();
            $id_perintah_uji = $cek_data['id'];

            $this->model->delete($id_perintah_uji);

            $builder = $db->table('map_perintah_uji_sampel');
            $builder->where('id_map', $id_perintah_uji);
            $builder->delete();

            $db->transComplete();

            if ($db->transStatus() === FALSE) {
                $msg = [
                    'error' => 'error'
                ];
            } else {
                $msg = [
                    'sukses' => 'Data berhasil dihapus'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }

    public function cetak($param)
    {
       
            $_data = '';

            $param1 = explode("-", $param)[0];
            $param2 = explode("-", $param)[1];
            $param3 = explode("-", $param)[2];


            $kode_pengantar = strtolower($param1);
            $id_kat_lab = intval($param2);
            $id_instalasi = intval($param3);


            $instalasi = $this->modelInstalasi->find($id_instalasi);

            // Penanggung jawab sampel
            $penanggung_jawab = $this->modelPj->select('id_kat_lab, tgl_terima_sampel')
            ->where('kode_pengantar', $kode_pengantar)
            ->where('id_kat_lab', $id_kat_lab)->first();

            // id pengantar lhu
            $id_pengantar_lhu = $this->modelPengantarLhu->select('id')
            ->where('kode_pengantar', $kode_pengantar)->first();
           
            $cek_data = $this->model->where('kode_pengantar', $kode_pengantar)
            ->where('id_instalasi', $id_instalasi)->first();
            $id_perintah_uji = $cek_data['id'];

            if ($id_instalasi == 1) {
                $_data = $this->modelMpu->get_data_sampel_lingkungan_perintah_uji($id_perintah_uji);
            }else{
                $_data = $this->modelMpu->get_data_spesimen_penyakit_perintah_uji($id_perintah_uji);
            }

            $search = $this->model->where('kode_pengantar', $kode_pengantar)
            ->where('id_instalasi', $id_instalasi)->first();


            $data = [
                'title' => 'Surat ' . $this->title,
                'id_instalasi' => $id_instalasi,
                'instalasi' => $instalasi,
                'kode_pengantar' => $kode_pengantar,
                'id_pengantar_lhu' => $id_pengantar_lhu,
                'tgl_terima_sampel' => $penanggung_jawab,
                'items' => $_data,
                'search' => $search,
                'id_perintah_uji' => $id_perintah_uji,
                'nomor_form' => 'LB IV 7.4.1.1'
            ];
            

          return view('Backend/Modul/Pelayanan/Perintah-uji/__cetak', $data);

    }

}

<?php

namespace App\Controllers;

use App\Models\MhsModel;

class Mahasiswa extends BaseController
{

    protected $MhsModel;

    public function __construct()
    {

        $this->MhsModel = new MhsModel();
    }
    public function index()
    {

        $data = [
            'title' => 'Data Mahasiswa',
            'nameapp' => $this->nameapp,
            'data' => $this->MhsModel->paginate(5, ''),
            'pager' => $this->MhsModel->pager
        ];
        return view('mhs/v_mhs', $data);
    }

    public function detail($slug)
    {
        $mhs = $this->MhsModel->getMhs($slug);
        if (empty($mhs)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Mahasiswa Tidak Ditemukan');
        }
        $data = [
            'title' => 'Detail : ' . $mhs['nama_mhs'],
            'nameapp' => $this->nameapp,
            'data' => $mhs
        ];

        return view('mhs/d_mhs', $data);
    }

    public function tambah()
    {
        session();
        $data = [
            'title' => 'Data Mahasiswa',
            'nameapp' => $this->nameapp,
            'validation' => \Config\Services::validation()
        ];

        return view('mhs/c_mhs', $data);
    }

    public function simpan()
    {

        if (!$this->validate([
            'nim' => [
                'rules' => 'required|is_unique[tbl_mhs.nim]',
                'errors' => [
                    'required' => '{field} mahasiswa harus diisi',
                    'is_unique' => '{field} sudah terdaftar disistem'
                ]
            ],
            'nama_mhs' => [
                'rules' => 'required|is_unique[tbl_mhs.nama_mhs]',
                'errors' => [
                    'required' => '{field} mahasiswa wajib disi',
                    'is_unique' => 'Terdapat Mahasiswa Dengan Nama Yang Sama'
                ]
            ],
            'nip' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan masukan Nama Dosen pendamping'
                ]
            ],
            'photo_mhs' => [
                'rules' => 'uploaded[photo_mhs]|max_size[photo_mhs,1024]|is_image[photo_mhs]|mime_in[photo_mhs,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Silahkan Masukan Photo Mahasiswa',
                    'max_size' => 'Gambar Tidak Boleh Diatas 1024 Kb',
                    'is_image' => 'Pastikan kamu upload gambar',
                    'mine_in' => 'Format gambar hanya .jpg .jpeg dan .png'
                ]
            ]

        ])) {
            return redirect()->to('/mahasiswa/tambah')->withInput();
        }

        //Ambil Gambar
        $FileGambar = $this->request->getFile('photo_mhs');
        //Ubah Nama File
        $NamaGambar = $FileGambar->getRandomName();
        //Simpan Gambar di Folder Public
        $FileGambar->move('img/mhs', $NamaGambar);

        $this->MhsModel->insert([
            'nim' => $this->request->getVar('nim'),
            'nama_mhs' => $this->request->getVar('nama_mhs'),
            'slug_mhs' => url_title($this->request->getVar('nama_mhs'), '-', TRUE),
            'photo_mhs' => $NamaGambar,
            'nip' => $this->request->getVar('nip')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Disimpan');
        return redirect()->to('/mahasiswa');

        // dd($this->request->getVar());
    }

    public function hapus($nim)
    {
        $NamaFile = $this->MhsModel->find($nim);
        //Hapus files photo
        unlink('img/mhs/' . $NamaFile['photo_mhs']);
        $this->MhsModel->delete($nim);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/mahasiswa');
    }

    public function update($slug_mhs)
    {
        session();
        $mhs = $this->MhsModel->getMhs($slug_mhs);
        $data = [
            'title' => 'Update : ' . $mhs['nama_mhs'],
            'nameapp' => $this->nameapp,
            'data' => $mhs,
            'validation' => \Config\Services::validation()
        ];

        return view('mhs/u_mhs', $data);
    }

    public function prosesupdate($nim)
    {
        $datalama = $this->MhsModel->find($nim);

        //VALIDASI KETIKA NAMA MHS DI UBAH
        if ($datalama['nama_mhs'] == $this->request->getVar('nama_mhs')) {
            $rules = 'required';
        } else {
            $rules = 'required|is_unique[tbl_mhs.nama_mhs]';
        }


        if (!$this->validate([
            'nama_mhs' => [
                'rules' => $rules,
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'is_unique' => '{field} telah terdaftar'
                ]
            ],
            'photo_mhs' => [
                'rules' => 'max_size[photo_mhs,1024]|is_image[photo_mhs]|mime_in[photo_mhs,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Silahkan input file gambar',
                    'mime_in' => 'File yang didukung .jpg .jpeg dan .png'
                ]
            ],
            'nip' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Dosen wajib di isi'
                ]
            ]
        ])) {
            return redirect()->to('/mahasiswa/update/' . $datalama['slug_mhs'])->withInput();
        }
        //VALIDASI KETIKA GAMBAR BARU DI UPLOAD
        $FileGambar =  $this->request->getFile('photo_mhs');
        if (!$FileGambar->getName()) {
            $photo_mhs = $datalama['photo_mhs'];
        } else {
            unlink('img/mhs/' . $datalama['photo_mhs']);
            $FileGambar = $this->request->getFile('photo_mhs');
            $photo_mhs = $FileGambar->getRandomName();
            $FileGambar->move('img/mhs', $photo_mhs);
        }
        $slug_mhs = url_title($this->request->getvar('nama_mhs'), '-', TRUE);
        $this->MhsModel->update(['nim' => $nim], [
            'nama_mhs' => $this->request->getVar('nama_mhs'),
            'slug_mhs' => $slug_mhs,
            'photo_mhs' => $photo_mhs,
            'nip' => $this->request->getVar('nip')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Di Update');
        return redirect()->to('/mahasiswa');
    }
}

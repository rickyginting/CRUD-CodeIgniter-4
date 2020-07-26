<?php namespace App\Controllers;
use App\Models\DosenModel;
class Dosen extends BaseController{
    protected $DosenModel;

    public function __construct(){
        $this->DosenModel = new DosenModel();
    }

    public function index(){
        // $data = $this->DosenModel->getDosen();
        // dd($data);
        $data = [
            'title' => 'Data Dosen',
            'nameapp' =>$this->nameapp,
            'data' => $this->DosenModel->paginate(10,''),
            'pager' => $this->DosenModel->pager

        ];

        return view('dosen/v_dosen',$data);
    }

    public function detail($slug_dosen){
    $dosen = $this->DosenModel->getDosen($slug_dosen);

    if (empty($dosen)) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Maaf Halaman Tidak Ditemukan');
    }
    $data = [
        'title' => 'Data Dosen',
        'nameapp' =>$this->nameapp,
        'data' => $dosen
    ];

    return view('dosen/d_dosen',$data);
    }

    public function tambah(){
        session();
        $data = [
            'title' =>'Tambah Data Dosen',
            'nameapp'=>$this->nameapp,
            'validation' => \Config\Services::validation()
        ];

        return view('dosen/c_dosen',$data);
    }

    public function simpan(){
        if (!$this->validate([
            'nip'=>[
                'rules'=>'required|is_unique[tbl_dosen.nip]',
                'errors'=>[
                    'required'=>'{field} wajib diisi',
                    'is_unique'=>'Nip sudah terdafatar disistem'
                ]
                ],
            'nama_dosen'=>[
                'rules'=>'required|is_unique[tbl_dosen.nama_dosen]',
                'errors'=>[
                    'required'=>'{field} dosen wajib diisi',
                    'is_unique'=>'{field} dosen telah terdaftar'
                ]
                ],
            'photo_dosen'=>[
                'rules'=>'uploaded[photo_dosen]|max_size[photo_dosen,1024]|is_image[photo_dosen]|mime_in[photo_dosen,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'uploaded'=>'Silahkan input photo dosen',
                    'max_size'=>'Ukuran gambar terlalu besar',
                    'is_image'=>'Silahkan input file gambar',
                    'mime_in'=>'File yang didukung .jpg .jpeg dan .png'
                ]
            ]
        ])) {
            return redirect()->to('/dosen/tambah')->withInput();
        }
        //Ambil gambar
        $FileGambar = $this->request->getFile('photo_dosen');
        $NamaGambar = $FileGambar->getRandomName();
        $FileGambar->move('img/dosen',$NamaGambar);
        
        $slug_dosen = url_title($this->request->getVar('nama_dosen'),'-',TRUE);
        $data =[
            'nip'=>$this->request->getVar('nip'),
            'nama_dosen'=>$this->request->getVar('nama_dosen'),
            'slug_dosen' => $slug_dosen,
            'photo_dosen' => $NamaGambar
        ];
    
        $this->DosenModel->insert($data);
        session()->setFlashdata('pesan','Data Dosen Telah Berhasil Ditambahkan');
        return redirect()->to('/dosen');
    }

    public function hapus($nip){
        $dosen = $this->DosenModel->find($nip);
        $FileGambar = $dosen['photo_dosen'];
        unlink('img/dosen/'.$FileGambar);

        $this->DosenModel->delete($nip);
        session()->setFlashdata('pesan','Data Berhasil Dihapus');
        return redirect()->to('/dosen');
    }

    public function update($slug_dosen){
        session();
        $data =[
            'title' => "Update Data Dosen",
            'nameapp' => $this->nameapp,
            'data' => $this->DosenModel->getDosen($slug_dosen),
            'validation'=> \Config\Services::validation()
        ];

        return view('dosen/u_dosen',$data);
    }

    public function prosesupdate($nip){
        $datalama =  $this->DosenModel->find($nip);
        if ($datalama['nama_dosen'] == $this->request->getVar('nama_dosen')) {
            $rules = 'required';
        } else {
            $rules = 'required|is_unique[tbl_dosen.nama_dosen]';
        }
        

        if (!$this->validate([
            'nama_dosen'=>[
                'rules'=>$rules,
                'errors'=>[
                    'required'=>'{field} dosen wajib diisi',
                    'is_unique'=>'{field} dosen telah terdaftar'
                ]
                ],
            'photo_dosen'=>[
                'rules'=>'max_size[photo_dosen,1024]|is_image[photo_dosen]|mime_in[photo_dosen,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size'=>'Ukuran gambar terlalu besar',
                    'is_image'=>'Silahkan input file gambar',
                    'mime_in'=>'File yang didukung .jpg .jpeg dan .png'
                ]
            ]
        ])) {
            return redirect()->to('/dosen/update/'.$datalama['slug_dosen'])->withInput();
        }

        $slug_dosen = url_title($this->request->getVar('nama_dosen'),'-',TRUE);
        $dosen = $this->DosenModel->find($nip);    
        $file = $this->request->getFile('photo_dosen');
        
        if (!$file->getName()) {
           $photodosen =  $dosen['photo_dosen'];
        } else {
            // JIKA FILE BARU DI UPLOAD FILE LAMA DI HAPUS
            unlink('img/dosen/'.$dosen['photo_dosen']);

            //AMBIL FILE BARU
            $FileGambar = $this->request->getFile('photo_dosen');
            $photodosen = $FileGambar->getRandomName();
            $FileGambar->move('img/dosen',$photodosen);
        }

        $this->DosenModel->update(['nip'=> $dosen['nip']],[
            'nama_dosen'=>$this->request->getVar('nama_dosen'),
            'slug_dosen' => $slug_dosen,
            'photo_dosen' => $photodosen
        ]);

        session()->setFlashdata('pesan','Data berhasil di update');
        return redirect()->to('/dosen');
    }
}
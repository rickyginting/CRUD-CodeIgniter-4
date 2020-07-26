<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_data');
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index() {
        $data['cdatafiles'] = $this->M_data->cdatafiles();
        $data['cuser']      = $this->M_data->cuser();
        $this->load->view('dashboard/_part/head', $data);
        $this->load->view('dashboard/index');
        $this->load->view('dashboard/_part/footer');
    }

    public function passwordfiles() {
        $data['datafiles'] = $this->db->get('tbl_files')->result();
        $this->load->view('dashboard/_part/head', $data);
        $this->load->view('dashboard/passwordfiles');
        $this->load->view('dashboard/_part/footer');
    }

    public function addfiles() {
        $this->form_validation->set_rules('id_files', 'id_files', 'trim|required|is_unique[tbl_files.id_files]', ['is_unique' => 'Terjadi kesalahan dengan ID silahkan refres halaman ini']);
        $this->form_validation->set_rules('namafiles', 'namafiles', 'trim|required', ['required' => 'Isi Nama Files']);
        $this->form_validation->set_rules('kategori', 'kategori', 'trim|required', ['required' => 'Isi Kategori Files']);
        $this->form_validation->set_rules('link', 'link', 'trim|required', ['required' => 'Isi Link Download']);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('dashboard/_part/head');
            $this->load->view('dashboard/addfiles');
            $this->load->view('dashboard/_part/footer');
        } else {
            $data = [
                'id_files'  => $this->input->post('id_files'),
                'namafiles' => $this->input->post('namafiles'),
                'kategori'  => $this->input->post('kategori'),
                'demo'      => $this->input->post('demo'),
                'link'      => $this->input->post('link'),
                'role'      => $this->input->post('role'),
                'password'  => $this->input->post('password'),
            ];
            $this->db->insert('tbl_files', $data);
            $this->session->set_flashdata('pesan', ' <div class="alert alert-success" role="alert"><b>' . $data['namafiles'] . '</b> berhasil di input</div>');

            $api = 'https://api.telegram.org/bot1025133517:AAF1tm2q-Gqc_M0ohwIfvYDCF8RnWmdDt1k/sendMessage?parse_mode=MARKDOWN&chat_id=975816159&text=*Informasi%20files* %0ANama Files : ' . $data['namafiles'] . ' %0AKategori : ' . $data['kategori'] . ' %0AHak Download : ' . $data['role'] . ' %0APassword : `' . $data['password'] . '`';
            $ch  = curl_init($api);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $result = curl_exec($ch);
            curl_close($ch);
            var_dump($api);

            redirect('passwordfiles');
        }
    }

    public function datauser() {
        $data['datauser'] = $this->db->get('tbl_telegram')->result();
        $this->load->view('dashboard/_part/head', $data);
        $this->load->view('dashboard/datauser');
        $this->load->view('dashboard/_part/footer');
    }
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
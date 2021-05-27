<?php
// defined('BASEPATH') or exit('No direct script access allowed');

// class Welcome extends CI_Controller
// {

// 	public function __construct()
// 	{
// 		parent::__construct();

// 		$this->load->model('Registrasi_model');
// 		$this->load->library('form_validation');
// 	}

// 	public function index()
// 	{
// 		$data['title']		= 'Registrasi';

// 		$data['_kecamatan'] = $this->Registrasi_model->get_kec();

// 		$data['_status']	= $this->Registrasi_model->get_status();
// 		$data['_jenis']		= $this->Registrasi_model->get_jenis();

// 		$this->form_validation->set_rules('nama_op', 'Nama Objek Pajak', 'required|trim');
// 		$this->form_validation->set_rules('npwpd', 'Nama Objek Pajak', 'required|trim|is_unique[reg_registrasi.npwpd]');
// 		$this->form_validation->set_rules('nik', 'NIK', 'required|trim|is_unique[reg_registrasi.nik]');
// 		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
// 		$this->form_validation->set_rules('kecamatan', 'Pilih Kecamatan', 'required|trim');
// 		$this->form_validation->set_rules('kelurahan', 'Pilih Kelurahan', 'required|trim');
// 		$this->form_validation->set_rules('status', 'Pilih Status', 'required|trim');
// 		$this->form_validation->set_rules('jenis', 'Pilih Jenis', 'required|trim');

// 		if ($this->form_validation->run() == FALSE) {

// 			$this->load->view('welcome_message', $data);
// 		} else {

// 			if ($this->Registrasi_model->registrasi() > 0) {
// 				# success
// 				echo 'Data sudah berhasil di tambahkan, <a href="' . base_url('') . '">kembali</a>';
// 			} else { }
// 		}
// 	}

// 	public function kelurahan()
// 	{
// 		$id_kec = $this->input->post('id');

// 		$data 	= $this->Registrasi_model->get_kel($id_kec);
// 		$output = '<option value="">Pilih Kelurahan</option>';

// 		foreach ($data as $k) {
// 			$output .= '<option value="' . $k->kelurahan . '" id_kel="' . $k->id . '" ' . set_select('kelurahan', $k->kelurahan) . '>' . $k->kelurahan . '</option>';
// 		}

// 		$this->output->set_content_type('application/json')->set_output(json_encode($output, 200));
// 	}
// }

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Registrasi_model');
		$this->load->library('form_validation');
		$this->load->helper('form', 'url', 'file');

		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title']		= 'Registrasi';

		$data['_kecamatan'] = $this->Registrasi_model->get_kec();

		$data['_status']	= $this->Registrasi_model->get_status();
		$data['_jenis']		= $this->Registrasi_model->get_jenis();

		$this->form_validation->set_rules('nama_op', 'Nama Objek Pajak', 'required|trim');
		$this->form_validation->set_rules('npwpd', 'Nama Objek Pajak', 'required|trim|is_unique[reg_registrasi.npwpd]');
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim|is_unique[reg_registrasi.nik]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('kecamatan', 'Pilih Kecamatan', 'required|trim');
		$this->form_validation->set_rules('kelurahan', 'Pilih Kelurahan', 'required|trim');
		$this->form_validation->set_rules('status', 'Pilih Status', 'required|trim');
		$this->form_validation->set_rules('jenis', 'Pilih Jenis', 'required|trim');
		$this->form_validation->set_rules('file', '', 'callback_file_check');

		if ($this->form_validation->run() == FALSE) {

			$this->load->view('welcome_message', $data);
		} else {

			# nama image diganti
			$name_img_nik = $this->input->post('nik', true) . ' ' . substr(md5(date('d-m-Y H:i:s')), 1, 10);

			$config['upload_path']          = './images/foto/';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['detect_mime']          = true; //menghindari serangan injeksi kode
			$config['remove_spaces']        = true;
			$config['max_size']             = 4024000; //max size 4mb
			$config['file_name']			= $name_img_nik;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('file')) {

				# upload di insert ke db
				if ($this->Registrasi_model->registrasi()) {

					echo 'Data sudah berhasil di tambahkan, <a href="' . base_url('') . '">kembali</a>';
				} else {

					echo 'Data gagal ditambahkan, <a href="' . base_url('') . '">kembali</a>';
				}
			}
		}
	}

	public function kelurahan()
	{
		#select kelurahan
		$id_kec = $this->input->post('id');

		$data 	= $this->Registrasi_model->get_kel($id_kec);
		$output = '<option value="">Pilih Kelurahan</option>';

		foreach ($data as $k) {
			$output .= '<option value="' . $k->kelurahan . '" id_kel="' . $k->id . '" ' . set_select('kelurahan', $k->kelurahan) . '>' . $k->kelurahan . '</option>';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($output, 200));
	}

	public function file_check($str)
	{

		//$allowed_types = array('application/pdf', 'image/jpg', 'image/jpeg', 'image/png', 'image/gif','image/x-png');
		$allowed_types	= array('image/jpg', 'image/jpeg', 'image/png');
		$read_extension = get_mime_by_extension($_FILES['file']['name']);
		$max_size 		= $_FILES['file']['size'];
		$error_file 	= $_FILES['file']['error'];

		if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
			# required...
			if (in_array($read_extension, $allowed_types)) {
				# extension...
				if ($error_file === 0) {
					# error...
					if ($max_size < 4024000) {
						# < 4mb
						return true;
					} else {
						$this->form_validation->set_message('file_check', 'Size gambar maksimum 4mb.');
						return false;
					}
				} else {

					$this->form_validation->set_message('file_check', 'File Error, pastikan format dan size gambar sudah benar!');
					return false;
				}
			} else {
				$this->form_validation->set_message('file_check', 'Format gambar harus JPG,JPEG,PNG.');
				return false;
			}
		} else {
			$this->form_validation->set_message('file_check', 'Gambar belum di pilih?');
			return false;
		}
	}
}



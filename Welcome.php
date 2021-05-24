<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Registrasi_model');
		$this->load->library('form_validation');
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

		if ($this->form_validation->run() == FALSE) {

			$this->load->view('welcome_message', $data);
		} else {

			if ($this->Registrasi_model->registrasi() > 0) {
				# success
				echo 'Data sudah berhasil di tambahkan, <a href="' . base_url('') . '">kembali</a>';
			} else { }
		}
	}

	public function kelurahan()
	{
		$id_kec = $this->input->post('id');

		$data 	= $this->Registrasi_model->get_kel($id_kec);
		$output = '<option value="">Pilih Kelurahan</option>';

		foreach ($data as $k) {
			$output .= '<option value="' . $k->kelurahan . '" id_kel="' . $k->id . '" ' . set_select('kelurahan', $k->kelurahan) . '>' . $k->kelurahan . '</option>';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($output, 200));
	}
}

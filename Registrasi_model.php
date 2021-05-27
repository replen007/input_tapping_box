<?php

class Registrasi_model extends CI_Model
{

    public function get_kec()
    {
        return $this->db->get('reg_kecamatan')->result_array();
    }

    public function get_kel($id_kec)
    {
        return $this->db->get_where('reg_kelurahan', ['id_kecamatan' => $id_kec])->result();
    }

    public function get_status()
    {
        return $this->db->get_where('reg_status')->result_array();
    }

    public function get_jenis()
    {
        return $this->db->get_where('reg_jenis')->result_array();
    }

    public function registrasi()
    {
//         $data = [
//             'nama_op'       => filter_string($this->input->post('nama_op', true)),
//             'npwpd'         => filter_string($this->input->post('npwpd', true)),
//             'nik'           => filter_string($this->input->post('nik', true)),
//             'alamat'        => filter_string($this->input->post('alamat', true)),
//             'kecamatan'     => filter_string($this->input->post('kecamatan', true)),
//             'kelurahan'     => filter_string($this->input->post('kelurahan', true)),
//             'status'        => filter_string($this->input->post('status', true)),
//             'jenis'         => filter_string($this->input->post('jenis', true)),
//             'tgl_registrasi' => time()
//         ];

//         $this->db->insert('reg_registrasi', $data);
//         return $this->db->affected_rows();
        
                $nama_op     = $this->input->post('nama_op', true);
        $npwpd       = $this->input->post('npwpd', true);
        $nik         = $this->input->post('nik', true);
        $alamat      = $this->input->post('alamat', true);
        $kecamatan   = $this->input->post('kecamatan', true);
        $kelurahan   = $this->input->post('kelurahan', true);
        $status      = $this->input->post('status', true);
        $jenis       = $this->input->post('jenis', true);
        $tgl_insert  = time();

        $upload      = $this->upload->data('file_name');


        # file_name with url
        $location         = base_url() . 'images/foto/';
        $insert_image     = $location . $upload;

        # File_name
        // date_default_timezone_set('Asia/Jakarta');
        // $time_upload      = base_url() . 'images/foto/' . $nik . '-' . date('d-m-y/H:i', $tgl_insert) . 'enc';
        // $insert_image     = $time_upload . $upload;

        // date_default_timezone_set('Asia/Jakarta');
        // # di db nama image menjadi datetime-NIK-date;
        // $time_upload      = date('d-m-y H:i', $tgl_insert) . '-';
        // $insert_image     = $time_upload . $upload;


        $data = array(
            'nama_op'    => $nama_op,
            'npwpd'      => $npwpd,
            'nik'        => $nik,
            'alamat'     => $alamat,
            'kecamatan'  => $kecamatan,
            'kelurahan'  => $kelurahan,
            'status'     => $status,
            'jenis'      => $jenis,
            'tgl_registrasi' => $tgl_insert,
            'file'       => $insert_image
        );

        return $this->db->insert('reg_registrasi', $data);
    }

    public function show_registrasi()
    {
        //$this->db->select('nama_op as reg_registrasi, kecamatan as reg_kecamatan, kelurahan as reg_kelurahan');
    }
}

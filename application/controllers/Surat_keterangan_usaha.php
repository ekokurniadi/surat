<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Surat_keterangan_usaha extends MY_Controller {

    protected $access = array('Admin', 'Pimpinan','Finance');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Surat_keterangan_usaha_model');
        $this->load->library('form_validation');
        require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'surat_keterangan_usaha/index.dart?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'surat_keterangan_usaha/index.dart?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'surat_keterangan_usaha/index.dart';
            $config['first_url'] = base_url() . 'surat_keterangan_usaha/index.dart';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Surat_keterangan_usaha_model->total_rows($q);
        $surat_keterangan_usaha = $this->Surat_keterangan_usaha_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'surat_keterangan_usaha_data' => $surat_keterangan_usaha,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('surat_keterangan_usaha_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Surat_keterangan_usaha_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nomor_surat' => $row->nomor_surat,
		'tanggal_surat' => $row->tanggal_surat,
		'nama' => $row->nama,
		'nik' => $row->nik,
		'tempat' => $row->tempat,
		'tgl_lahir' => $row->tgl_lahir,
		'pekerjaan' => $row->pekerjaan,
		'kewarganegaraan' => $row->kewarganegaraan,
		'golongan_darah' => $row->golongan_darah,
		'status_perkawinan' => $row->status_perkawinan,
		'jenis_kelamin' => $row->jenis_kelamin,
		'usaha' => $row->usaha,
		'agama' => $row->agama,
		'rt' => $row->rt,
		'alamat_tempat_tinggal' => $row->alamat_tempat_tinggal,
		'rt_pengantar' => $row->rt_pengantar,
		'nomor_surat_pengantar' => $row->nomor_surat_pengantar,
		'tanggal_surat_pengantar' => $row->tanggal_surat_pengantar,
		'keperluan' => $row->keperluan,
	    );
            $this->load->view('header');
            $this->load->view('surat_keterangan_usaha_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat_keterangan_usaha'));
        }
    }

    public function kode(){
        $year = date('Y');
        $kode = "470/    /SLJ/";
        $newKode = $kode.$year;
        return $newKode;
    }

    public function cetak($id){
        $data=array(
            "details"=>$this->db->query("SELECT * FROM surat_keterangan_usaha where id='$id'")->row(),
        );
        $dompdf= new Dompdf();
        $html=$this->load->view('surat_keterangan_usaha_pdf',$data,true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4','potrait');
        $dompdf->render();
        $pdf = $dompdf->output();
        $dompdf->stream('Surat Keterangan Usaha.pdf',array("Attachment"=>FALSE));
}

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('surat_keterangan_usaha/create_action'),
	    'id' => set_value('id'),
	    'nomor_surat' => $this->kode(),
	    'tanggal_surat' => set_value('tanggal_surat'),
	    'nama' => set_value('nama'),
	    'nik' => set_value('nik'),
	    'tempat' => set_value('tempat'),
	    'tgl_lahir' => set_value('tgl_lahir'),
	    'pekerjaan' => set_value('pekerjaan'),
	    'kewarganegaraan' => set_value('kewarganegaraan'),
	    'golongan_darah' => set_value('golongan_darah'),
	    'status_perkawinan' => set_value('status_perkawinan'),
	    'agama' => set_value('agama'),
	    'rt' => set_value('rt'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'usaha' => set_value('usaha'),
	    'alamat_tempat_tinggal' => set_value('alamat_tempat_tinggal'),
	    'rt_pengantar' => set_value('rt_pengantar'),
	    'nomor_surat_pengantar' => set_value('nomor_surat_pengantar'),
	    'tanggal_surat_pengantar' => set_value('tanggal_surat_pengantar'),
	    'keperluan' => set_value('keperluan'),
	);

        $this->load->view('header');
        $this->load->view('surat_keterangan_usaha_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nomor_surat' => $this->input->post('nomor_surat',TRUE),
		'tanggal_surat' => $this->input->post('tanggal_surat',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'nik' => $this->input->post('nik',TRUE),
		'tempat' => $this->input->post('tempat',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
		'kewarganegaraan' => $this->input->post('kewarganegaraan',TRUE),
		'golongan_darah' => $this->input->post('golongan_darah',TRUE),
		'status_perkawinan' => $this->input->post('status_perkawinan',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'rt' => $this->input->post('rt',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'usaha' => $this->input->post('usaha',TRUE),
		'alamat_tempat_tinggal' => $this->input->post('alamat_tempat_tinggal',TRUE),
		'rt_pengantar' => $this->input->post('rt_pengantar',TRUE),
		'nomor_surat_pengantar' => $this->input->post('nomor_surat_pengantar',TRUE),
		'tanggal_surat_pengantar' => $this->input->post('tanggal_surat_pengantar',TRUE),
		'keperluan' => $this->input->post('keperluan',TRUE),
	    );

            $this->Surat_keterangan_usaha_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('surat_keterangan_usaha'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Surat_keterangan_usaha_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('surat_keterangan_usaha/update_action'),
		'id' => set_value('id', $row->id),
		'nomor_surat' => set_value('nomor_surat', $row->nomor_surat),
		'tanggal_surat' => set_value('tanggal_surat', $row->tanggal_surat),
		'nama' => set_value('nama', $row->nama),
		'nik' => set_value('nik', $row->nik),
		'tempat' => set_value('tempat', $row->tempat),
		'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
		'pekerjaan' => set_value('pekerjaan', $row->pekerjaan),
		'kewarganegaraan' => set_value('kewarganegaraan', $row->kewarganegaraan),
		'golongan_darah' => set_value('golongan_darah', $row->golongan_darah),
		'status_perkawinan' => set_value('status_perkawinan', $row->status_perkawinan),
		'agama' => set_value('agama', $row->agama),
		'rt' => set_value('rt', $row->rt),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'usaha' => set_value('usaha', $row->usaha),
		'alamat_tempat_tinggal' => set_value('alamat_tempat_tinggal', $row->alamat_tempat_tinggal),
		'rt_pengantar' => set_value('rt_pengantar', $row->rt_pengantar),
		'nomor_surat_pengantar' => set_value('nomor_surat_pengantar', $row->nomor_surat_pengantar),
		'tanggal_surat_pengantar' => set_value('tanggal_surat_pengantar', $row->tanggal_surat_pengantar),
		'keperluan' => set_value('keperluan', $row->keperluan),
	    );
            $this->load->view('header');
            $this->load->view('surat_keterangan_usaha_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat_keterangan_usaha'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nomor_surat' => $this->input->post('nomor_surat',TRUE),
		'tanggal_surat' => $this->input->post('tanggal_surat',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'nik' => $this->input->post('nik',TRUE),
		'tempat' => $this->input->post('tempat',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
		'kewarganegaraan' => $this->input->post('kewarganegaraan',TRUE),
		'golongan_darah' => $this->input->post('golongan_darah',TRUE),
		'status_perkawinan' => $this->input->post('status_perkawinan',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'rt' => $this->input->post('rt',TRUE),
        'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'usaha' => $this->input->post('usaha',TRUE),
		'alamat_tempat_tinggal' => $this->input->post('alamat_tempat_tinggal',TRUE),
		'rt_pengantar' => $this->input->post('rt_pengantar',TRUE),
		'nomor_surat_pengantar' => $this->input->post('nomor_surat_pengantar',TRUE),
		'tanggal_surat_pengantar' => $this->input->post('tanggal_surat_pengantar',TRUE),
		'keperluan' => $this->input->post('keperluan',TRUE),
	    );

            $this->Surat_keterangan_usaha_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('surat_keterangan_usaha'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Surat_keterangan_usaha_model->get_by_id($id);

        if ($row) {
            $this->Surat_keterangan_usaha_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('surat_keterangan_usaha'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat_keterangan_usaha'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nomor_surat', 'nomor surat', 'trim|required');
	$this->form_validation->set_rules('tanggal_surat', 'tanggal surat', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('tempat', 'tempat', 'trim|required');
	$this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
	$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
	$this->form_validation->set_rules('kewarganegaraan', 'kewarganegaraan', 'trim|required');
	$this->form_validation->set_rules('golongan_darah', 'golongan darah', 'trim|required');
	$this->form_validation->set_rules('status_perkawinan', 'status perkawinan', 'trim|required');
	$this->form_validation->set_rules('agama', 'agama', 'trim|required');
	$this->form_validation->set_rules('rt', 'rt', 'trim|required');
	$this->form_validation->set_rules('alamat_tempat_tinggal', 'alamat tempat tinggal', 'trim|required');
	$this->form_validation->set_rules('rt_pengantar', 'rt pengantar', 'trim|required');
	$this->form_validation->set_rules('nomor_surat_pengantar', 'nomor surat pengantar', 'trim|required');
	$this->form_validation->set_rules('tanggal_surat_pengantar', 'tanggal surat pengantar', 'trim|required');
	$this->form_validation->set_rules('keperluan', 'keperluan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Surat_keterangan_usaha.php */
/* Location: ./application/controllers/Surat_keterangan_usaha.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-19 16:09:13 */
/* http://harviacode.com */
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Surat_domisili extends MY_Controller {

    protected $access = array('Admin', 'Pimpinan','Finance');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Surat_domisili_model');
        $this->load->library('form_validation');
        require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'surat_domisili/index.dart?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'surat_domisili/index.dart?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'surat_domisili/index.dart';
            $config['first_url'] = base_url() . 'surat_domisili/index.dart';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Surat_domisili_model->total_rows($q);
        $surat_domisili = $this->Surat_domisili_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'surat_domisili_data' => $surat_domisili,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('surat_domisili_list', $data);
        $this->load->view('footer');
    }

    public function kode(){
        $year = date('Y');
        $kode = "470/  /SLJ/";
        $newKode = $kode.$year;
        return $newKode;
    }

    public function read($id) 
    {
        $row = $this->Surat_domisili_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nomor_surat' => $row->nomor_surat,
		'tanggal_surat' => $row->tanggal_surat,
		'nik' => $row->nik,
		'nama' => $row->nama,
		'tempat_lahir' => $row->tempat_lahir,
		'tanggal_lahir' => $row->tanggal_lahir,
		'jenis_kelamin' => $row->jenis_kelamin,
		'agama' => $row->agama,
		'kewarganegaraan' => $row->kewarganegaraan,
		'pekerjaan' => $row->pekerjaan,
		'alamat' => $row->alamat,
		'rt_pengantar' => $row->rt_pengantar,
		'nomor_surat_pengantar' => $row->nomor_surat_pengantar,
		'tanggal_surat_pengantar' => $row->tanggal_surat_pengantar,
		'keperluan' => $row->keperluan,
	    );
            $this->load->view('header');
            $this->load->view('surat_domisili_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat_domisili'));
        }
    }

    public function cetak($id){
            $data=array(
                "details"=>$this->db->query("SELECT * FROM surat_domisili where id='$id'")->row(),
            );
            $dompdf= new Dompdf();
            $html=$this->load->view('surat_domisili_pdf',$data,true);
            $dompdf->load_html($html);
            $dompdf->set_paper('A4','potrait');
            $dompdf->render();
            $pdf = $dompdf->output();
            $dompdf->stream('Surat Keterangan Domisili.pdf',array("Attachment"=>FALSE));
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('surat_domisili/create_action'),
	    'id' => set_value('id'),
	    'nomor_surat' => $this->kode(),
	    'tanggal_surat' => set_value('tanggal_surat'),
	    'nik' => set_value('nik'),
	    'nama' => set_value('nama'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'agama' => set_value('agama'),
	    'kewarganegaraan' => set_value('kewarganegaraan'),
	    'pekerjaan' => set_value('pekerjaan'),
	    'alamat' => set_value('alamat'),
	    'rt_pengantar' => set_value('rt_pengantar'),
	    'nomor_surat_pengantar' => set_value('nomor_surat_pengantar'),
	    'tanggal_surat_pengantar' => set_value('tanggal_surat_pengantar'),
	    'keperluan' => set_value('keperluan'),
	);

        $this->load->view('header');
        $this->load->view('surat_domisili_form', $data);
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
		'nik' => $this->input->post('nik',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'kewarganegaraan' => $this->input->post('kewarganegaraan',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'rt_pengantar' => $this->input->post('rt_pengantar',TRUE),
		'nomor_surat_pengantar' => $this->input->post('nomor_surat_pengantar',TRUE),
		'tanggal_surat_pengantar' => $this->input->post('tanggal_surat_pengantar',TRUE),
		'keperluan' => $this->input->post('keperluan',TRUE),
	    );

            $this->Surat_domisili_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('surat_domisili'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Surat_domisili_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('surat_domisili/update_action'),
		'id' => set_value('id', $row->id),
		'nomor_surat' => set_value('nomor_surat', $row->nomor_surat),
		'tanggal_surat' => set_value('tanggal_surat', $row->tanggal_surat),
		'nik' => set_value('nik', $row->nik),
		'nama' => set_value('nama', $row->nama),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'agama' => set_value('agama', $row->agama),
		'kewarganegaraan' => set_value('kewarganegaraan', $row->kewarganegaraan),
		'pekerjaan' => set_value('pekerjaan', $row->pekerjaan),
		'alamat' => set_value('alamat', $row->alamat),
		'rt_pengantar' => set_value('rt_pengantar', $row->rt_pengantar),
		'nomor_surat_pengantar' => set_value('nomor_surat_pengantar', $row->nomor_surat_pengantar),
		'tanggal_surat_pengantar' => set_value('tanggal_surat_pengantar', $row->tanggal_surat_pengantar),
		'keperluan' => set_value('keperluan', $row->keperluan),
	    );
            $this->load->view('header');
            $this->load->view('surat_domisili_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat_domisili'));
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
		'nik' => $this->input->post('nik',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'kewarganegaraan' => $this->input->post('kewarganegaraan',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'rt_pengantar' => $this->input->post('rt_pengantar',TRUE),
		'nomor_surat_pengantar' => $this->input->post('nomor_surat_pengantar',TRUE),
		'tanggal_surat_pengantar' => $this->input->post('tanggal_surat_pengantar',TRUE),
		'keperluan' => $this->input->post('keperluan',TRUE),
	    );

            $this->Surat_domisili_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('surat_domisili'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Surat_domisili_model->get_by_id($id);

        if ($row) {
            $this->Surat_domisili_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('surat_domisili'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat_domisili'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nomor_surat', 'nomor surat', 'trim|required');
	$this->form_validation->set_rules('tanggal_surat', 'tanggal surat', 'trim|required');
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('agama', 'agama', 'trim|required');
	$this->form_validation->set_rules('kewarganegaraan', 'kewarganegaraan', 'trim|required');
	$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('rt_pengantar', 'rt pengantar', 'trim|required');
	$this->form_validation->set_rules('nomor_surat_pengantar', 'nomor surat pengantar', 'trim|required');
	$this->form_validation->set_rules('tanggal_surat_pengantar', 'tanggal surat pengantar', 'trim|required');
	$this->form_validation->set_rules('keperluan', 'keperluan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Surat_domisili.php */
/* Location: ./application/controllers/Surat_domisili.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-19 16:08:47 */
/* http://harviacode.com */
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kota extends MY_Controller {

    // protected $access = array('Admin', 'Pimpinan','Finance');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kota_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kota/index.dart?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kota/index.dart?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kota/index.dart';
            $config['first_url'] = base_url() . 'kota/index.dart';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kota_model->total_rows($q);
        $kota = $this->Kota_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kota_data' => $kota,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('kota_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Kota_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kota' => $row->kota,
	    );
            $this->load->view('header');
            $this->load->view('kota_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kota'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kota/create_action'),
	    'id' => set_value('id'),
	    'kota' => set_value('kota'),
	);

        $this->load->view('header');
        $this->load->view('kota_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kota' => $this->input->post('kota',TRUE),
	    );

            $this->Kota_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kota'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kota_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kota/update_action'),
		'id' => set_value('id', $row->id),
		'kota' => set_value('kota', $row->kota),
	    );
            $this->load->view('header');
            $this->load->view('kota_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kota'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kota' => $this->input->post('kota',TRUE),
	    );

            $this->Kota_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kota'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kota_model->get_by_id($id);

        if ($row) {
            $this->Kota_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kota'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kota'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kota', 'kota', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-14 06:03:46 */
/* http://harviacode.com */
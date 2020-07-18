<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tufoksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_tufoksi');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tufoksi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tufoksi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tufoksi/index.html';
            $config['first_url'] = base_url() . 'tufoksi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_tufoksi->total_rows($q);
        $tufoksi = $this->M_tufoksi->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tufoksi_data' => $tufoksi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/header');
      $this->load->view('admin/navbar');  
      $this->load->view('admin/sidebar');
        $this->load->view('admin/content');
        $this->load->view('tufoksi/tufoksi_list', $data);
         $this->load->view('admin/footer');
    }

    public function read($id) 
    {
        $row = $this->M_tufoksi->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'jabatan' => $row->jabatan,
		'tugas_pokok' => $row->tugas_pokok,
	    );
              $this->load->view('admin/header');
      $this->load->view('admin/navbar');  
      $this->load->view('admin/sidebar');
        $this->load->view('admin/content');
         
            $this->load->view('tufoksi/tufoksi_read', $data);
             $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tufoksi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tufoksi/create_action'),
	    'id' => set_value('id'),
	    'jabatan' => set_value('jabatan'),
	    'tugas_pokok' => set_value('tugas_pokok'),
	);
          $this->load->view('admin/header');
      $this->load->view('admin/navbar');  
      $this->load->view('admin/sidebar');
        $this->load->view('admin/content');
        $this->load->view('tufoksi/tufoksi_form', $data);
         $this->load->view('admin/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'jabatan' => $this->input->post('jabatan',TRUE),
		'tugas_pokok' => $this->input->post('tugas_pokok',TRUE),
	    );

            $this->M_tufoksi->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tufoksi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_tufoksi->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tufoksi/update_action'),
		'id' => set_value('id', $row->id),
		'jabatan' => set_value('jabatan', $row->jabatan),
		'tugas_pokok' => set_value('tugas_pokok', $row->tugas_pokok),
	    );
             $this->load->view('admin/header');
      $this->load->view('admin/navbar');  
      $this->load->view('admin/sidebar');
        $this->load->view('admin/content');
        
            $this->load->view('tufoksi/tufoksi_form', $data);
             $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tufoksi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'jabatan' => $this->input->post('jabatan',TRUE),
		'tugas_pokok' => $this->input->post('tugas_pokok',TRUE),
	    );

            $this->M_tufoksi->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tufoksi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_tufoksi->get_by_id($id);

        if ($row) {
            $this->M_tufoksi->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tufoksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tufoksi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
	$this->form_validation->set_rules('tugas_pokok', 'tugas pokok', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tufoksi.php */
/* Location: ./application/controllers/Tufoksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-17 05:20:59 */
/* http://harviacode.com */
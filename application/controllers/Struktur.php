<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Struktur extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_struktur');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'struktur/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'struktur/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'struktur/index.html';
            $config['first_url'] = base_url() . 'struktur/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_struktur->total_rows($q);
        $struktur = $this->M_struktur->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'struktur_data' => $struktur,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $this->load->view('admin/header');
      $this->load->view('admin/navbar');  
      $this->load->view('admin/sidebar');
        $this->load->view('admin/content');
        $this->load->view('struktur/struktur_jabatan_list', $data);
         $this->load->view('admin/footer');
    }

    public function read($id) 
    {
        $row = $this->M_struktur->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama' => $row->nama,
		'nip' => $row->nip,
		'jabatan' => $row->jabatan,
	    );
             $this->load->view('admin/header');
      $this->load->view('admin/navbar');  
      $this->load->view('admin/sidebar');
        $this->load->view('admin/content');
            $this->load->view('struktur/struktur_jabatan_read', $data);
             $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('struktur'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('struktur/create_action'),
	    'id' => set_value('id'),
	    'nama' => set_value('nama'),
	    'nip' => set_value('nip'),
	    'jabatan' => set_value('jabatan'),
	);
         $this->load->view('admin/header');
      $this->load->view('admin/navbar');  
      $this->load->view('admin/sidebar');
        $this->load->view('admin/content');
        $this->load->view('struktur/struktur_jabatan_form', $data);
         $this->load->view('admin/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'nip' => $this->input->post('nip',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
	    );

            $this->M_struktur->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('struktur'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_struktur->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('struktur/update_action'),
		'id' => set_value('id', $row->id),
		'nama' => set_value('nama', $row->nama),
		'nip' => set_value('nip', $row->nip),
		'jabatan' => set_value('jabatan', $row->jabatan),
	    );
             $this->load->view('admin/header');
      $this->load->view('admin/navbar');  
      $this->load->view('admin/sidebar');
        $this->load->view('admin/content');
            $this->load->view('struktur/struktur_jabatan_form', $data);
             $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('struktur'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'nip' => $this->input->post('nip',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
	    );

            $this->M_struktur->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('struktur'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_struktur->get_by_id($id);

        if ($row) {
            $this->M_struktur->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('struktur'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('struktur'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('nip', 'nip', 'trim|required');
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Struktur.php */
/* Location: ./application/controllers/Struktur.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-16 07:19:09 */
/* http://harviacode.com */
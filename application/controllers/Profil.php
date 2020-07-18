<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_profil');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'profil/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'profil/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'profil/index.html';
            $config['first_url'] = base_url() . 'profil/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_profil->total_rows($q);
        $profil = $this->M_profil->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'profil_data' => $profil,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/header');
      $this->load->view('admin/navbar');  
      $this->load->view('admin/sidebar');
        $this->load->view('admin/content');
       
        $this->load->view('profil/profil_list', $data);
           $this->load->view('admin/footer');
    }

    public function read($id) 
    {
        $row = $this->M_profil->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'judul' => $row->judul,
		'keterangan' => $row->keterangan,
		'gambar' => $row->gambar,
	    );
             $this->load->view('admin/header');
      $this->load->view('admin/navbar');  
      $this->load->view('admin/sidebar');
        $this->load->view('admin/content');
            $this->load->view('profil/profil_read', $data);
             $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profil'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('profil/create_action'),
	    'id' => set_value('id'),
	    'judul' => set_value('judul'),
	    'keterangan' => set_value('keterangan'),
	    'gambar' => set_value('gambar'),
	);
         $this->load->view('admin/header');
      $this->load->view('admin/navbar');  
      $this->load->view('admin/sidebar');
        $this->load->view('admin/content');
        $this->load->view('profil/profil_form', $data);
         $this->load->view('admin/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'judul' => $this->input->post('judul',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'gambar' => $this->input->post('gambar',TRUE),
	    );

            $this->M_profil->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('profil'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_profil->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('profil/update_action'),
		'id' => set_value('id', $row->id),
		'judul' => set_value('judul', $row->judul),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'gambar' => set_value('gambar', $row->gambar),
	    );
             $this->load->view('admin/header');
      $this->load->view('admin/navbar');  
      $this->load->view('admin/sidebar');
        $this->load->view('admin/content');
            $this->load->view('profil/profil_form', $data);
               $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profil'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'judul' => $this->input->post('judul',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'gambar' => $this->input->post('gambar',TRUE),
	    );

            $this->M_profil->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('profil'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_profil->get_by_id($id);

        if ($row) {
            $this->M_profil->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('profil'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profil'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('gambar', 'gambar', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Profil.php */
/* Location: ./application/controllers/Profil.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-16 07:19:24 */
/* http://harviacode.com */
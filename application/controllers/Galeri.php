 <?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_galeri');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'galeri/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'galeri/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'galeri/index.html';
            $config['first_url'] = base_url() . 'galeri/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_galeri->total_rows($q);
        $galeri = $this->M_galeri->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'galeri_data' => $galeri,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $this->load->view('admin/header');
      $this->load->view('admin/navbar');  
      $this->load->view('admin/sidebar');
        $this->load->view('admin/content');
        $this->load->view('galeri/galeri_kegitan_list', $data);
         $this->load->view('admin/footer');
    }

    public function read($id) 
    {
        $row = $this->M_galeri->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'judul' => $row->judul,
		'isi' => $row->isi,
		'gambar' => $row->gambar,
	    );
             $this->load->view('admin/header');
      $this->load->view('admin/navbar');  
      $this->load->view('admin/sidebar');
        $this->load->view('admin/content');
            $this->load->view('galeri/galeri_kegitan_read', $data);
             $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('galeri'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('galeri/create_action'),
	    'id' => set_value('id'),
	    'judul' => set_value('judul'),
	    'isi' => set_value('isi'),
	    'gambar' => set_value('gambar'),
	);
         $this->load->view('admin/header');
      $this->load->view('admin/navbar');  
      $this->load->view('admin/sidebar');
        $this->load->view('admin/content');
        $this->load->view('galeri/galeri_kegitan_form', $data);
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
		'isi' => $this->input->post('isi',TRUE),
		'gambar' => $this->input->post('gambar',TRUE),
	    );

            $this->M_galeri->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('galeri'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_galeri->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('galeri/update_action'),
		'id' => set_value('id', $row->id),
		'judul' => set_value('judul', $row->judul),
		'isi' => set_value('isi', $row->isi),
		'gambar' => set_value('gambar', $row->gambar),
	    );
             $this->load->view('admin/header');
      $this->load->view('admin/navbar');  
      $this->load->view('admin/sidebar');
        $this->load->view('admin/content');
            $this->load->view('galeri/galeri_kegitan_form', $data);
             $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('galeri'));
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
		'isi' => $this->input->post('isi',TRUE),
		'gambar' => $this->input->post('gambar',TRUE),
	    );

            $this->M_galeri->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('galeri'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_galeri->get_by_id($id);

        if ($row) {
            $this->M_galeri->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('galeri'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('galeri'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('isi', 'isi', 'trim|required');
	$this->form_validation->set_rules('gambar', 'gambar', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Galeri.php */
/* Location: ./application/controllers/Galeri.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-16 05:27:59 */
/* http://harviacode.com */
    <?php

    class Dashboard extends CI_Controller{
    public function index(){
    $this->load->view('admin/header');
      $this->load->view('admin/navbar');  
      $this->load->view('admin/sidebar');
        $this->load->view('admin/content');
          $this->load->view('admin/footer');
    
    
    }
    }

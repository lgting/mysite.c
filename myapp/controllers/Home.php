<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
    public function __construct () {
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('backend_model');
    }

    public function index () { //默认显示方法
      $data = $this->backend_model->frontend( 'home1' );
        $this->load->view('/home/index',$data);//没有用模板引擎，更轻巧
	
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Code extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('control');
		$this->load->helper('url');
    }
	public function index()
	{
		$this->load->view('codeground');
	}
	public function save(){
		$ret = $this->control->save();
		if(!$ret){
			echo "CRITICAL ERROR";
		}
		else{
			redirect('/store/'.$ret);
		}
	}
	public function store($ret){
		$data['uid'] = $ret;
		$this->load->view('storedcode',$data);
	}
	public function grab($ret){
		$data = $this->control->getcode($ret);
		echo json_encode($data);
	}
}

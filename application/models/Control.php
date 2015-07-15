<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package     Intelli_Login
 * @subpackage  Police
 * @category    Control
 * @author      Sai Kiran Anagani   
 * @link        http://creativeyearts.com
 */
class Control extends CI_Model{
    public function __construct()
        {
                $this->load->database();
                $this->load->helper('url');
        }
	public function save(){
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 6; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
		        $id = $randomString;
		do{
			$query = $this->db->query("SELECT * FROM storage WHERE uid='".$id."'");
			if ($query->num_rows() > 0){
				$check = false;
			}
			else 
				$check = true;
		}while($check == false);
		
		$data = array(
        'hcode'=>$this->input->post('hcode'),
		'ccode'=>$this->input->post('ccode'),
		'jcode'=>$this->input->post('jcode'),
        'uid'=>$id,
        );
		$query = $this->db->insert('storage',$data);
        if($query==true){
			return $id;
		}
		else 
			show_404();
	}
	public function getcode($id){
		$query = $this->db->get_where('storage', array('uid'=>$id));
		return $query->row_array();
}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function run()
	{
		$st = $this->input->get('st', true);
        $et = $this->input->get('et', true);

        if($st.$et){
        	echo json_encode(
        			array('status' => TRUE,
	                'message' => 'some script access allowed'
	                ));
        }else{
        	echo json_encode(
        			array('status' => FALSE,
	                'message' => 'No direct script access allowed'
	                ));
        }
	}
}

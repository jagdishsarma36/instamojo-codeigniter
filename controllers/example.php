<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Example extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('instamojo');
		$this->load->helper('url');
	}


	public function index()
	{
		$pay = $this->instamojo->pay_request( 

						$amount = "200" , 
						$purpose = "TEST" , 
						$buyer_name = "rbbqq" , 
						$email = "rajeevbbqq@gmail.com" , 
						$phone = "89xxxx2017" ,
		     			$send_email = 'TRUE' , 
		     			$send_sms = 'TRUE' , 
		     			$repeated = 'FALSE'

		     		);

		$redirect_url = $pay['longurl']   ;


		redirect($redirect_url,'refresh') ;

	}

	public function get_all()
	{
		$result = $this->instamojo->all_payment_request();

		print_r($result);
	}


	public function pay_request()
	{
		
		$pay = $this->instamojo->pay_request( 

						$amount = "200" , 
						$purpose = "TEST" , 
						$buyer_name = "rbbqq" , 
						$email = "rajeevbbqq@gmail.com" , 
						$phone = "89xxxx2017" ,
		     			$send_email = 'TRUE' , 
		     			$send_sms = 'TRUE' , 
		     			$repeated = 'FALSE'

		     		);


		$payment_id = $pay['id'];  // <= Payment Id
							      // print_r($pay) ; <=  Prints all the data from the request

	}


	public function status()
	{
		$requestId  = '84c04c212ccb4a8ba8c87e35ec4a2511'  ; // $reqid generated using pay_request()
		$status     = $this->instamojo->status($requestId);

		print_r($status);
	}


	public function payment_status()
	{
		$requestId = '84c04c212ccb4a8ba8c87e35ec4a2511'  ;
		$status    = $this->instamojo->status($requestId);

		print_r($status) ;
	}


	public function show()
	{
		$data['request_id'] = '84c04c212ccb4a8ba8c87e35ec4a2511' ;
		$this->load->view('instamojo' ,$data);
	}

}

/* End of file example.php */
/* Location: ./application/controllers/example.php */
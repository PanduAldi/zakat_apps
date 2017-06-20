<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webhack extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$this->load->model("m_zakat");

		$data  = $this->m_zakat->get_all('muzaki')->result_array();

		$datajson =  json_encode($data);

		echo $datajson;

		$ex = json_decode($datajson, true);

		foreach ($ex as $key) 
		{
			echo $key['id_muzaki']." adalah ".$key['nama_muzaki']."<br>";
		}

	}

	public function a()
	{
		return "hello world";
	}

	public function valid_email()
	{
		$this->load->helper('captcha');
		$vals = array(
		    'word'	=> 'Random word',
		    'img_path'	=> './captcha/',
		    'img_url'	=> 'http://example.com/captcha/',
		    'font_path'	=> './path/to/fonts/texb.ttf',
		    'img_width'	=> '150',
		    'img_height' => 30,
		    'expiration' => 7200
		    );

		$cap = create_captcha($vals);
		echo $cap['image'];
	}

	public function send_email()
	{
		$mail = new PHPMailer;

		$email = $this->input->post('email');
		$sub = $this->input->post('subject');
		$txt = $this->input->post('mail'); 

		$mail->isSMTP();

		 	//$mail->SMTPDebug = 2;
		 
		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';
		 
		//Set the hostname of the mail server
		$mail->Host = 'smtp.gmail.com';
		// use
		// $mail->Host = gethostbyname('smtp.gmail.com');
		// if your network does not support SMTP over IPv6
		 
		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = 587;
		 
		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'tls';
		 
		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
		 
		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = "oktafebrian0110@gmail.com";
		 
		//Password to use for SMTP authentication
		$mail->Password = "Pratama652";
		 
		//Set who the message is to be sent from
		$mail->setFrom('pandu@example.com', 'Pandu');
		 
		//Set an alternative reply-to address
		$mail->addReplyTo('replyto@example.com', 'First Last');
		 
		//Set who the message is to be sent to
		$mail->addAddress($email);
		 
		//Set the subject line
		$mail->Subject = $sub;
		 
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		$mail->msgHTML($txt);
		 
		//Replace the plain text body with one created manually
		$mail->AltBody = 'This is a plain-text message body';

		//send the message, check for errors
		
		if ($mail->send()) {
			$this->session->set_flashdata('notif', 'Email Terkirim');
			redirect('webhack/form_email','refresh');
		}
		else
		{
			$this->session->set_flashdata('notif', 'Email gagal Terkirim');
			redirect('webhack/form_email','refresh');		
		}

	}

	public function form_email()
	{
		$faker = Faker\Factory::create();

		$this->load->view('form_email', array('nama' => $faker->name));
	}

	public function faker()
	{
		$faker = Faker\Factory::create('id_ID');

		return $faker;
	}


	public function cetak_faker()
	{
		$f = $this->faker();

		echo "Nama : ".$f->name."<br>";
		echo "Alamat ".$f->address."<br>";

		echo FCPATH;

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
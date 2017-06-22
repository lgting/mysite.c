<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/8
 * Time: 10:00
 **/
defined('BASEPATH') OR exit('No direct script access allowed');
class Backend_model extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	//加载视图数据的函数
	public function update_menu($data){

		$sql = "update LOW_PRIORITY menu set name='".$data['name']."' ,template_name='".$data['template_name']."' ,intro='".$data['intro']."',order_id=".$data['order_id']." where idmenu=".$data['menuid'];
		$update = $this->db->query($sql);
		echo $sql;
		return $update;
	}
	public function view_data($arg=null)
	{
		//菜单表根据order_id排序ascend descend
		$query = $this->db->query("select * from menu order by order_id asc");
		$query = $query->result();
		 $data = ['query'=>$query];
		 return $data;
	}
	public function insert_capcha( $data )
	{
		/*var_dump($data);*/
		/*$sql = "INSERT INTO captcha (captcha_time,word, filename) VALUES (".$this->db->escape($data[captcha_time]).", ".$this->db->escape($word).", ".$this->db->escape($filename).")";
echo $sql;
*/		
		$this->db->insert('captcha',$data);
	}
	public function validate()
	{
		/*try{

		}catch(Exception $e)
		{
			echo $e->getMessage();

		}*/
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Emial', 'required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]',
			array('required' => 'You must provide a %s.')
		);
		$this->form_validation->set_rules('captcha', 'Captcha', 'required');
		$this->form_validation->set_rules('captcha_url', 'Captcha_url', 'callback_captcha_name');//处理为验证码图片文件名  注意： 回调函数应该写在控制器里面,而且必须要public

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('hint/error');
		}else
		{
			$receive = $this->input->post();
			//首先检验验证码
			//通过文件名查询数据库，获得验证码信息
			//查询数据库前可以删除过期的captcha
			$sql = "select word from captcha where filename='".$receive['captcha_url']."'";
			$query = $this->db->query($sql);
			 $query = $query->row()->word;
			 if(strtolower($query) !== strtolower($receive['captcha']))
			 {
			 	$data =array('error_message' => '密码或验证码输入错误,其实是验证码错误');
				$this->load->view('errors/login_erro',$data);
				return "验证码错误";
			 }
			 //接下来是用户名密码的确认
			 //通过用户名查询密码
			 $sql = "select passw from admini_root where mailAddress='".$receive['email']."'";
			 $query = $this->db->query($sql);
			 $query = $query->row();
			 //如果用户不存在则退出
			 if($query == NULL)
			 {
			 	$data =array('error_message' => '用户名或密码
			 		输入错误，其实是不存在此用户');
				$this->load->view('errors/login_erro',$data);
				return "用户不存在";
			 }
			 //做hash比较
			 $passw = $query->passw;
			 //哈希生成的密码
			 if(password_verify($receive['password'],$passw))
			 {
			 	//生成session
			 	//session也应该hash加密一下 才安全
			 	$_SESSION['login'] = password_hash('fuckyou',PASSWORD_DEFAULT);
			 	//重定向到首页面
			 	//两种方式选择一种就可以
			 	/*$data =array('error_message' => '正在登陆中');
				$this->load->view('errors/login_erro',$data);*/
			 	echo true;//给ajax回应，登录成功
			 }else{
			 	$data =array('error_message' => '用户名或密码
			 		输入错误，其实m密码错误');
				$this->load->view('errors/login_erro',$data);
				return "用户不存在";
			 }


			 /*$query = $query->row()->passw;
			 echo $query;*/
			//之前写的代码；
			/*$input = $this->input->post();
			$email = $input['email'];
			$password = $input['password'];
			$captcha = $input['captcha'];
			$email = $this->input->post('email');
			$password = $this ->input->post('password');
			$capcha = $this -> input -> post('captcha');
			if($this->verify_captcha($captcha) && $this->resolve_user_login($email,$password))
			{
				//终于可以生成session数据了
				$this->session->set_userdata($this->sdata);
				return true;
			}
			return false;*/
		}
		//之后加重新填写表单的功能。
	}
	
/*
	//定义生成session的数组
	public $sdata = array
	(
		'email'     => '',
		'login'     =>  true,
	);
	public function __construct ()
	{
		parent::__construct ();
		$this->load->database();
	}
	
	}*/
/*	public function verify_captcha($captcha)
	{
		//都转化为小写验证
		if( strtolower($captcha) == strtolower($this->session->captcha))
		{
			return true;
		}
		return false;
	}*/
	//存入数据库的验证码验证
/*	public function captcha_validate($data)
	{
// First, delete old captchas
		$expiration = time() - 7200; // Two hour limit
		$this->db->where,l( 'captcha_time < ', $expiration )
		         ->delete( 'captcha' );

// Then see if a captcha exists:
		$sql   = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND filename = ? AND captcha_time > ?';
		$binds = array( $_POST['captcha'], $this->input->ip_address(), $expiration );
		$query = $this->db->query( $sql, $binds );
		$row   = $query->row();

		if ( $row->count == 0 ) {
			echo 'You must submit the word that appears in the image.';
		}
	}*/
	/*public function resolve_user_login($email,$password)
	{
		//通过账号查找密码，然后哈希比较
		$this->db->select('password');
		$this->db->from('admin');
		$this->db->where('email', $email);
		$hash = $this->db->get()->row('password');
		return $this->verify_password_hash($password, $hash);
	}*/
	/*private function verify_password_hash($password, $hash) {

		return password_verify($password, $hash);

	}
	*/

	//菜单表增加, 规定数据操作成功都要返回真
	public function add_menu($data){
		$sql = "insert into menu VALUES( null, '".$data['name']."','".$data['template_name']."','".$data['intro']."',".$data['order_id'].")";
		if($this->db->query($sql)){
		 	echo 1;
		 }
		//$data = json_decode($data);	

	}
	public function del_menu($id){
		$sql = "delete from menu where idmenu=$id";
		if($this->db->query($sql)){
		 	echo $sql;
		 }
	}

}
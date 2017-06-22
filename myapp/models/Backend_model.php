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
	
	//前台主页数据，显示每个分类最新的四条动态
	//构建一个动态数组，根据相应的页面加载相应的数据
	public function frontend( $arg=null )
	{
		
		
		
		
		
		
		
		if($arg == 'menu_category')
		{
			//要返回的数据有 菜单列表 还有  分类列表
			$data['menu'] = $this->query_menu()['query'];
			$data['category'] = $this->query_category()['category'];
			$data['menu_category'] = $this->query_menu_category();
			return $data;
		}else{
			return $this->query_menu();
		}
		return $data;
	}
	
	public function query_menu()
	{
		//菜单表根据order_id排序ascend descend
		$menu = $this->db->query("select * from menu order by order_id asc");
		$menu = $menu->result();
		//取出菜单的id，根据id查询分类id，根据分类id读取读每个分类下的内容，从而加载页面数据，
		$menu
		var_dump($menu);
		exit;
		 $data = ['menu'=>$menu];//添加下标是方便在模板中使用
		 return $data;
	}
	public function query_category()
	{
		$sql = "select * from category";
		$query = $this->db->query($sql);
		$query = $query->result();
		$data = ['category'=>$query];
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
    public function category()
    {
        $query = $this->db->query("select * from category");
        $query = $query->result();
        $data = ['query'=>$query];
        return $data;
    }
    public function category_add($data) {
    	$sql = 'INSERT INTO `category` (`idcategory`, `name`, `comment`) VALUES (NULL, \''.$data['categoryName'].'\', NULL)';
    	if( $this->db->query($sql))
    	{
    		echo "add success";
    	}else{
    		echo "added failure";
    	}
	}
	public function category_del($id)
	{
				//先要删除附加表中的数据，如果附加表中有数据次删除不了，附加表有menu_category  article_category
		$sql ="select id from menu_category  where category_id=".$id;
		if($this->db->query($sql)->num_rows() > 0){
			//执行删除菜单分类表中的条目
		}
			$sql ="select id from article_category  where article_category_id=$id";
		if($this->db->query($sql)->num_rows() > 0){
			//执行文章分类表中的条目
		}
		if($this->db->query($dql))
		
		
		$sql =  "DELETE FROM `category` WHERE  `idcategory` =$id";
		if( $this->db->query($sql))
    	{
    		echo "delete success";
    	}else{
    		echo "delete failure";
    	}
	}
	public function category_update($data)
	{
		$sql = "update category set name ='".$data['name']."' where idcategory = ".$data['categoryid'];
		if( $this->db->query($sql))
    	{
    		echo "update success";
    	}else{
    		echo "update failure";
    	}
	}
	public function menu_category_add($data){
		//为防止重复添加 首先到数据库查询有没有相同条目
		$sql = "select menu_id from menu_category where category_id =".$data['categoryid'];
		$query = $this->db->query($sql);
				$is_exist = false;
		while($row = $query->unbuffered_row())
		{
			if($row->menu_id == $data['menuid'])
			{
				$is_exist = true;		
			}
		}
		if(!$is_exist){
			$sql = 'INSERT INTO `menu_category` (`id`, `category_id`, `menu_id`) VALUES (NULL, \''.$data['categoryid'].'\', \''.$data['menuid'].'\')';
			if($this->db->query($sql))
			{
				echo "添加成功";
			}else{
				echo "添加失败";
			}
		}else{
			echo "可能存在相同条目添加失败";
		}
	}
	
	//菜单表增加, 规定数据操作成功都要返回真
	public function add_menu($data){
		$sql = "insert into menu VALUES( null, '".$data['name']."','".$data['template_name']."','".$data['intro']."',".$data['order_id'].")";
		if($this->db->query($sql)){
		 	echo 1;
		 }
		//$data = json_decode($data);	

	}
	public function del_menu($id){
		//首先要删除附加表menu_category表中的数据
		$sql = "delete from menu where idmenu=$id";
		if($this->db->query($sql)){
		 	echo $sql;
		 }else{
		 	echo "delete failure";
		 }
	}
	
	public function query_menu_category(){
		$sql = 'SELECT * FROM `menu_category`';
		$query = $this->db->query($sql);
		$query = $query->result_array();
		//格式化数据
		//定义一个二维数组
		if($query){
			foreach($query as $row){
			$data[$this->query_name('menu',$row['menu_id'])][] = $this->query_name('category',$row['category_id']);	
		}
		//把id换成中文名称
			return $data;
		}
		return '没有查询到什么';
	}
	//菜单id读菜单名字
	public function query_name(  $table, $id  ){
		$sql = "select name from ".$table." where id".$table."=".$id;
		$query = $this->db->query( $sql );
		return $query->row()->name;
	}
	//文章操作
	public function article_operate()
	{
		if($this->uri->segment(4,0) == "add")
		{
			$this->add_article();
		}	
	}
	public function add_article()
	{
		// 这里应该做一个表单验证
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('sketch','Sketch','required');
		$this->form_validation->set_rules('content1','Content','required');
		$this->form_validation->set_rules('category','Category','required');
	
		if ($this->form_validation->run() == FALSE)
		{
			
			$this->load->view('hint/add_article_error');
			//在这里考虑重新填写表单
			
		}else
		{
			//post接受指定的数据
			$data = $this->input->post();
			
			if (!empty($data)) {
				if (get_magic_quotes_gpc()) {
					foreach($data as $k=>$v)
					{
						$data_slashed[$k] = stringslashes($v);
					}
					$data = $data_slashed;
				}
			}
			$sql = "INSERT INTO `mysite`.`article` (`idarticle`, `title`, `sketch`, `content`,`article_category`, `c_time`, `views_num`) VALUES (NULL, '".$data['title']."', '".
					$data['sketch']."', '".$data['content1']."',' ".$data['category']."',CURRENT_TIMESTAMP, NULL);";
					if( $this->db->query($sql) )
					{
						//添加附加表菜单分类
						echo "文章成功增加";
					}
		}
	
	}

	public function query_article()
	{
		
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



}




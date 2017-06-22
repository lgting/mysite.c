<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Backend extends CI_Controller {
	public function __construct ()
	{
		//注意啦方法名和类名相同，方法构造函数
		parent::__construct();
		$this->load->library('session');
		$this->load->model('backend_model', '', TRUE);
		$this->load->helper("url");
	}
	public function index($arg = NULL)
	{
		//如果是请求获得验证码转到生成验证码方法
		/*if($arg == 'born_captcha'){
			$this->born_captcha();
			return ;
		}*/
		/*if($this->input->post('request') == 'switch')
		{
			echo 'fuck';//$this->switch_captcha();
			return ;
		}*/
		//如果路由后的第三个参数为，view说明是请求加载视图
		
		//单一入口这里面有很多要处理的
			//解析url ，把参数传到相应的函数
		if($this->uri->segment(2,0) === 'logout')
		{
			$this->logout();
		}
		if($this->uri->segment(2,0) === 'switch_captcha')
		{
			$this->switch_captcha();
			exit;
		}
		if($this->uri->segment(2,0) === 'judge_login')
		{
			$this->judge_login();
			return;
		}
		if($this->uri->segment(2,0) === 'captcha_name')
		{
			$this->captcha_name();
		}
        //operate category
        if($this->uri->segment(3,0) === 'category' && password_verify('fuckyou',$this->session->login))
        {
            $data = $this->input->post();
            $this->operate_category($data);
            return;   
        }
		
//operate menu category
	 	if($this->uri->segment(3,0) === 'menu_category' && password_verify('fuckyou',$this->session->login))
        {
            $data = $this->input->post();//思考变量的接收在什么时候合适    ，，，考虑内存的占用
            $this->menu_category($data);
            return;   
        }
//article operate
        if($this->uri->segment(3,0) === 'article'&&password_verify('fuckyou',$this->session->login))
        {
        	echo "article操作";
//调用model
                $this->backend_model->article_operate();
                return;
        }
        //视图处理
		if($this->uri->segment(3,0) === 'view'&&password_verify('fuckyou',$this->session->login))
		{
//数据的处理加载交给模型处理
			$query = $this->backend_model->view_data($this->uri->segment(4));

			//模板路径设置规则：index/view/filename   分别为入口方法|视图|模板文件名
			//处理视图发来的请求的请求
/*侧栏链接路由*/
			if($this->uri->segment(4,0) === 'category'){
                //读取要加载的数据
                $data = $this->backend_model->category();
				$this->load->view('backend/category',$data);
				return;
			}
/*表的增删该路由*/
			if($this->uri->segment(4,0) === 'add_menu')
			{
				//得到数据  约定用ajax的post方式传送
				$data = $this->input->post();
				$this->backend_model->add_menu($data);
				return;
			}
			if($this->uri->segment(4,0) === 'del_menu')
			{
				//得到数据  约定用ajax的post方式传送
				$data = $this->input->post('menuid');
				$this->backend_model->del_menu($data);
				return;
			}
			if($this->uri->segment(4,0) === 'update_menu'){
				$data = $this->input->post();
				$this->backend_model->update_menu($data);
				return;
			}
			$this->load->view('backend/'.$this->uri->segment(4, 0),$query);
			return;
		}
		if(password_verify('fuckyou',$this->session->login)) 
		{
			//请求加载相应的视图和数据
			//$data = $this->backend_model->view_load($this->uri->uri_to_assoc());
			//数据的处理加载交给模型处理
			//模板路径设置规则：index/view/filename   分别为入口方法|视图|模板文件名
			//$path = 'backend/'.$this->uri->rsegment(4, 0);
			
			$this->load->view('backend/index');
			return;
		}
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');			
        $this->to_login();
	}
	//登录界面
	private function to_login()
	{
		//生成验证码变量并装载
		$data['captcha'] = $this->born_captcha()['image'];
		$this->load->view('login/login',$data);
	}
		//处理登录请求的方法
	private function judge_login()
	{
		$this->backend_model->validate();
		//接收数据交给模型去验证
		/*有表单验证这段就不需要了
		foreach($post as $key=>$val)
		{
			$key = $val;
			if(!isset($val)){ exit; }//有一项没有输入就退出程序
		}*/
		//永远 不要想相信用户提交的数据，所以数据提交后还要做一次验证
			//做两次表单数据库表单验证，分别为capcha和admin表
			//首先判断验证码
			//格式化captcha_url
		//$captcha_url = explode('/',$captcha_url);
		//$captcha_name = end($captcha);
			//查看用户名书否存在，存在查询密码，并和用户输入的做对比
			//生成session全局变量，再次进入入口文件
			//如果没有数据传入，防止恶意攻击，退出程序，不做任何处理
	}
		//生产验证码函数
	private function born_captcha()
	{
		$this->load->helper('captcha');
		$vals = array(
			'word'      => '',
			'img_path'  => './common/captcha/',
			'img_url'   => '/common/captcha/',
			'font_path' => './common/fonts/waltographUI.ttf',
			'img_width' => '200',
			'img_height'    => 60,
			'expiration'    => 7200,
			'word_length'   => 2,
			'font_size' => 40,
			'img_id'    => 'captcha_img',
			'img_alt'   => '点击更换',//从这三个参数是自定义加上去的
			'img_class' => 'm',
			'img_title' => '点击切换',

			'pool'      => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

			// White background and border, black text and red grid
			'colors'    => array(
				'background' => array(255, 255, 255),
				'border' => array(255, 255, 255),
				'text' => array(0, 0, 0),
				'grid' => array(255, 40, 40)
			)
		);
		$cap = create_captcha($vals);
		//验证码信息存储到数据库，通过验证，验证码图片的文件名和信息内容来确定用户是否输入正确；
		//调用数据库模型 Backend_model 里的insert_chapcha();
		//格式化存储的信息

		$data = array(
			'idcaptcha'=>NULL,
			'captcha_time' => date('Y-m-d H:i:s',$cap['time']),//时间存储为int类型更为合适
			'word' => $cap['word'],
			'filename' => $cap['filename'],
		);
		/*后续完成验证码过期自动删除的功能*/
		//验证码也可以储存为哈希值
		$this->backend_model->insert_capcha($data);
		return  $cap;
	}

	private function switch_captcha()
	{
		if($this->input->post())
		{
			$response = $this->born_captcha();
			echo $response['filename'];
		}
	}

	private function logout ()
	{

		$this -> session -> unset_userdata('login');
		Header("Location:/index.php/backend");
	}
   
	//验证码方法
	public function captcha_name($str)
	{
		$str = explode('/',$str);
		$str = end($str);
		return $str;
	}

 //分类增删改查
	    private function operate_category($data){
	        if($this->uri->segment(4,0) == "add"){
	            //增加分类
	            $this->category_add($data);
	        }
	
	        if($this->uri->segment(4,0) == "update"){
	            $this->category_update($data);
	        }
	        if($this->uri->segment(4,0) == 'del'){
	            $this->category_del($data);
	        }
	    }
	    private function category_add($data){
	      
	        $this->backend_model->category_add($data);
	    }
	    private function category_update($data)
	    {
	        $this->backend_model->category_update($data);
	    }
	    private function category_del($data){
	    	$id = $data['categoryid'];
	    	$this->backend_model->category_del($id);
	    }
//菜单分类操作
		private function menu_category($data)
        {
        	if($this->uri->segment(4,0) == 'add')
        	{
        		$this->backend_model->menu_category_add($data);
        		return;
        	}
        	if($this->uri->segment(4,0) == 'del')
        	{
        		var_dump($data);
        		echo "删除菜单操作";
        		return;
        	}
        }   
}

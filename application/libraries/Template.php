<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
		var $template_data = array();
		
		function set($name, $value)
		{
			$this->template_data[$name] = $value;
		}
	
		function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
		{               
			$this->CI =& get_instance();
			$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));			
			return $this->CI->load->view($template, $this->template_data, $return);
		}

		function display($template, $data=null){
			$data['content']=$this->_ci->load->view($template,$data,true);
			$data['menu'] = $this->_ci->users_model->get_menu($this->_ci->access->get_level());
			$this->_ci->load->view('template',$data);
		}
        
        function display_inside($template, $data=null){
			$data['content']=$this->_ci->load->view($template['content'],$data,true);
            $data['inside']=$this->_ci->load->view($template['inside'],$data,true);
			$data['menu'] = $this->_ci->users_model->get_menu($this->_ci->access->get_level());
			$this->_ci->load->view('template',$data);
		}
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */
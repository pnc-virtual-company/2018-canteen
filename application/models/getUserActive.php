<?php 

defined('BASEPATH') or exit('bad request!');
/**
* 
*/
// In codeigniter or php if we create class it must be the same bewteen class and function.
// More in formation if you wnat to your controller you must followed that point : Localhost/projectnaem/index.php/controller_naem/file controller that you want to print it out
class getUserActive extends  CI_Model 
	{
	 
	function getActive(){
		$query = $this->db->get('tbl_users'); 
        return $query->result();
	}	
} 

 ?> 
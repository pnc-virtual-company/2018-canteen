<?php 
/**
     * select breakfast lunch and dinner from database
     * @author Chantha ROEURN <chantha.roeurn@student.passerellesnumeriques.org>
     */
	Class dishTypeModel extends CI_Model{
		public function getBreakfast(){
			 $query = $this->db->get_where('tbl_dishes', 'meal_time_id = 1');
       return $query->result();
		}
		public function getLunch(){
			 $query = $this->db->get_where('tbl_dishes', 'meal_time_id = 2');
       return $query->result();
		}
		public function getDinner(){
			 $query = $this->db->get_where('tbl_dishes', 'meal_time_id = 3');
       return $query->result();
		}
		public function orderBreakfast(){
			 $query = $this->db->get_where('tbl_order', 'meal_time = breakfast');
       return $query->result();
		}
	}
 ?>



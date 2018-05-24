<?php
/**
 * User join the dinner event to store  in the database.
 * @return int number of affected rows
 * @author sun MEAS <sun.meas@gmail.com>
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class JoinDinner_model extends CI_Model { 

	 // Select all dinner event id to the calendar
	 public function selectDinner($id){
     		$query = $this->db->get_where('tbl_dinner_events', array('id' => $id));
     		return $query->result();
	 }

	public function getUserJoinEvent($Dinner_ID){
	     $current_logged_in =  $this->session->userdata('id');

	     // Insert join user
	     $data_join = array(
	       'user_id' => $current_logged_in,
	       // 'dinner_event_id' => $Dinner_ID
	       'dinner_event_id' => '52'
	     );
	     $result = $this->db->insert('tbl_join_events', $data_join);
	 }

	 /*Function get all user join dinner*/
	 public function getListJoinDinner(){
	      $query = $this->db->query('SELECT 
	                 joinEvent.*, 
	                 dinnerEvent.title AS "Title",
	                 users.class_name AS "position",
	                 users.email AS "email",
	                 CONCAT(users.firstname , " " , users.lastname) AS "user_name"
	                 FROM tbl_join_events joinEvent
	                 INNER JOIN tbl_dinner_events dinnerEvent ON dinnerEvent.id = joinEvent.dinner_event_id
	                 INNER JOIN tbl_users users ON users.id = joinEvent.user_id');
	             return $query->result();
	 }      

	 public function getFileExcel($id = 0) {
	     $this->db->select('tbl_join_events.join_event_id, CONCAT(tbl_users.firstname, " ",tbl_users.lastname) AS "user_name", tbl_dinner_events.title AS "Title", tbl_users.class_name AS "position", tbl_users.email AS "email" ');
	     $this->db->join('tbl_dinner_events', 'tbl_dinner_events.id = tbl_join_events.dinner_event_id' );
	     $this->db->join('tbl_users', 'tbl_users.id = tbl_join_events.user_id');
	     if ($id === 0) {
	         $query = $this->db->get('tbl_join_events');
	         return $query->result_array();
	     }
	     $query = $this->db->get_where('tbl_join_events', array('tbl_join_events.join_event_id' => $id));
	     return $query->row_array();
	 }

}
 
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
	                 users.card_id AS "card_id",
	                 users.email AS "email",
	                 CONCAT(users.firstname , " " , users.lastname) AS "user_name"
	                 FROM tbl_join_events joinEvent
	                 INNER JOIN tbl_dinner_events dinnerEvent ON dinnerEvent.id = joinEvent.dinner_event_id
	                 INNER JOIN tbl_users users ON users.id = joinEvent.user_id');
	             return $query->result();
	 }      

}
 
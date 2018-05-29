<?php
/**
 * This model contains the business logic and manages the persistence of btl_staff_event
 */

if (!defined('BASEPATH')) { exit('No direct script access allowed'); }
/**
 * This model contains the business logic and manages the persistence of btl_staff_event
 * It is also used by the session controller for the authentication.
 */
class ParticipateModel extends CI_Model {

    /**
     * Default constructor
     */
    public function __construct() {

    }

    /**
     * Get the list of btl_staff_event or one user
     * @param int $id optional id of one user
     * @return array record of btl_staff_event
     * @author Sun MEAS <sun.meas@student.passerellesnumeriques.org>
     */

    /*Function get status of event lunch*/
    public function getStaffStatus(){
         $query = $this->db->query('SELECT * FROM tbl_staff_participation');
                return $query->result();
    }   

    /*Function get all particapate of event lunch*/
    public function getListParticipate(){
         $query = $this->db->query('SELECT 
                    staffParticpate.*, 
                    lunchEvent.title AS "Title",
                    users.class_name AS "ClassName",
                    users.email AS "Email",
                    CONCAT(users.firstname , " " , users.lastname) AS "Staff_name"
                    FROM tbl_staff_participation staffParticpate
                    INNER JOIN tbl_lunch_events lunchEvent ON lunchEvent.id = staffParticpate.lunch_event_id
                    INNER JOIN tbl_users users ON users.id = staffParticpate.user_id');
                return $query->result();
    }     


/*select the remind user email*/
  public function getLatestDescrition() {
                $this->db->select('*');
                $this->db->from('tbl_lunch_events');
                $this->db->order_by('id', 'DESC');
                $this->db->limit('1');  
                $query =  $this->db->get();
                return $query->result(); 
  }
  public function getParticipant() {
        $query = $this->db->get_where('tbl_staff_participation'); 
        $this->db->order_by('user_id', 'DESC');
        return $query->result();
    }

    // Insert reminded
    public function getReminded(){
         $data_reminded = array(
           'user_id' => '11',
           'lunch_event_id' => '46',
           'status' => '0',
           'reminded' => '1'
         );
         $query = $this->db->update('tbl_staff_participation', $data_reminded);
        return $query->result();
     }

}

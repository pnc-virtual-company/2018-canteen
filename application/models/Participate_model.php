<?php
/**
 * This model contains the business logic and manages the persistence of btl_staff_event
 */

if (!defined('BASEPATH')) { exit('No direct script access allowed'); }
/**
 * This model contains the business logic and manages the persistence of btl_staff_event
 * It is also used by the session controller for the authentication.
 */
class Participate_model extends CI_Model {

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

  public function getParticipant() {
        $this->db->order_by('user_id', 'DESC');
        $query = $this->db->get('tbl_staff_participation'); 
        return $query->result();
    }

    public function getReminded(){
         // $current_logged_in =  $this->session->userdata('id');

         // Insert reminded
         $data_reminded = array(
           'user_id' => '2',
           'lunch_event_id' => '63',
           'status' => '0',
           'reminded' => '1'
         );
         $result = $this->db->update('tbl_staff_participation', $data_reminded);
     }
}
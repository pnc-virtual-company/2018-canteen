<?php
/**
 * This model contains the business logic and manages the persistence of tbl_dishes and tbl_roles
 * @copyright  Copyright (c) 2018 Benjamin BALET
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/skeleton
 * @since      1.0.0
 */

if (!defined('BASEPATH')) { exit('No direct script access allowed'); }

/**
 * This model contains the business logic and manages the persistence of tbl_dishes and tbl_roles
 * It is also used by the session controller for the authentication.
 */
class Dishes_model extends CI_Model {

    /**
     * Default constructor
     */
    public function __construct() {

    }

    /**
     * Get the list of tbl_dishes or one user
     * @param int $id optional id of one user
     * @return array record of tbl_dishes
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function getDishes() {
        $query = $this->db->get('tbl_dishes'); 
        return $query->result();
    }

    public function getMealTime(){
        $query = $this->db->get('tbl_meal_time'); 
        return $query->result();
    }

    /**
     * Delete a user from the database
     * @param int $id identifier of the user
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function deleteDishes($id) {
        $this->db->delete('tbl_dishes', array('dish_id' => $id));
    }

    /**
     * Insert a new user into the database. Inserted data are coming from an HTML form
     * @return string deciphered password (so as to send it by e-mail in clear)
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function setDishes() {
        //Hash the clear password using bcrypt (8 iterations)
        $password = $this->input->post('password');
        $salt = '$2a$08$' . substr(strtr(base64_encode($this->getRandomBytes(16)), '+', '.'), 0, 22) . '$';
        $hash = crypt($password, $salt);

        //Role field is a binary mask
        $role = 0;
        foreach($this->input->post("role") as $role_bit){
            $role = $role | $role_bit;
        }

        $data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'login' => $this->input->post('login'),
            'email' => $this->input->post('email'),
            'password' => $hash,
            'role' => $role
        );
        $this->db->insert('tbl_dishes', $data);
        return $password;
    }

    /**
     * Update a given user in the database. Update data are coming from an HTML form
     * @return int number of affected rows
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function selectDish($id){
         $query = $this->db->get_where('tbl_dishes', array('dish_id' => $id));
         return $query->result();
         // var_dump($query);
    }
    
    public function updateDishes($id) 
    {         
        $this->upload->data()['file_name'];        
        $data_image = array('upload_data' => $this->upload->data()); 
      
        $data = array(
            'dish_name' => $this->input->post('dishName'),            
            'dish_image'      => $this->upload->data()['file_name'],         
            'description' => $this->input->post('description')        
        );        
        $this->db->where('dish_id', $this->uri->segment(4));                
        $this->db->update('tbl_dishes', $data);                
        return true;    
    }
    
    public function viewDetail($dishId){
        $result = $this->db->get_where('tbl_dishes', array('dish_id'=>$dishId));
        return  $result->result();
    }
/**
     * insert_dish in to database with image
     * @author Chantha ROEURN <chantha.roeurn@student.passerellesnumeriques.org>
     */
    public function insert_dish(){
        $data = array('upload_data' => $this->upload->data());
        // matching insert value from input and database fields
        $data =  array(
            'dish_name'   => $this->input->post('dishName'), 
            'dish_image'  => $this->upload->data()['file_name'],
            'description' => $this->input->post('dishDescription'),
            'meal_time_id' => $this->input->post('mealtime'),
            'dish_active' => 0,
        );
        // insert array value to database
        $this->db->insert("tbl_dishes", $data);
    }
}

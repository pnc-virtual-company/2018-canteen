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
        $this->db->order_by('dish_id', 'DESC');
        $query = $this->db->get('tbl_dishes'); 
        return $query->result();
        // return $order->result();
    }


    /**
     * Get the meal time of tbl_dishes 
     * @param int $id optional id of one user
     * @return array record of tbl_dishes
     * @author khai.hok <khai.hok@student.passerellesnumeriques.org>
     */
    public function getMealTime() {
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

    public function getMenu(){
        date_default_timezone_set("Asia/Phnom_Penh");
        $creating_date = date('Y-m-d');
       $this->db->select('*');
       $this->db->from('tbl_dishes');
        $this->db->where (array('dish_active' =>1));
        $this->db->where('menu_created_date=',$creating_date);
        $query = $this->db->get();
        return $query->result();
    }
public  function  selectOrder($food_id){
        date_default_timezone_set("Asia/Phnom_Penh");
        $creating_date = date('Y-m-d');
       $this->db->select('*');
       $this->db->from('tbl_dishes');
        $this->db->where (array('dish_active' =>1));
        $this->db->where (array('dish_id' =>$food_id));
        $this->db->where('menu_created_date=',$creating_date);
        $query = $this->db->get();
        return $query->result();
}
   public function createOrder($dish_id,$meal_time_id){
        // set currrent time zone in php to cambodia time +7
        date_default_timezone_set("Asia/Phnom_Penh");
        $created_date = date('Y-m-d');
        $current_logged_in =  $this->session->userdata('id');
        // Insert order
        $data_order = array(
            'quantity'=> $this->input->post('quantity'),
            'meal_time' => $meal_time_id,
            'date' => $created_date
        );
        $this->db->insert('tbl_order', $data_order);

        // Get the last id after inserted into tbl_order as above query
        $order_id = $this->db->insert_id(); // This is primary key from tbl_order but it will be foreign key for tbl_dish_user of column "order_id"

        // Insert dish user
        $data_dish = array(
          'user_id' => $current_logged_in,
          'dish_id' => $dish_id,
          'order_id' => $order_id
        );
        $result = $this->db->insert('tbl_dish_user', $data_dish);
    }

    public function preOrderList()
    {
      $this->db->select('orders.*,dishes.dish_name as dishName,sum(orders.quantity) as TotalQuantity,sum(orders.quantity)*1000 as TotalPayment');
      $this->db->from('tbl_order as orders');
      $this->db->join('tbl_dish_user as dishUsers', 'orders.order_id = dishUsers.order_id');
      $this->db->join('tbl_dishes dishes', 'dishes.dish_id = dishUsers.dish_id');
      $this->db->group_by('dishName'); 
      $query = $this->db->get();
      return $query->result();
    }

    public function userOrderList(){
      $this->db->select('users.card_id as userId,
                    CONCAT(users.firstname," ",users.lastname) AS userName,
                    users.class_name,
                    dishes.dish_name as dishName,
                    sum(orders.quantity) as totalQuanttiy,
                    sum(orders.quantity)*1000 as TotalPayment');
      $this->db->from('tbl_order as orders');
      $this->db->join('tbl_dish_user as dishUsers', 'orders.order_id = dishUsers.order_id') ;
      $this->db->join('tbl_dishes dishes', 'dishes.dish_id = dishUsers.dish_id');
      $this->db->join('tbl_users users', 'users.id = dishUsers.user_id');
      $this->db->group_by('userName'); 
      $query = $this->db->get();
      return $query->result();
    }
    public function storeInterest($userId){
        $query = $this->db->get_where('tbl_users',array('id' => $userId));
        if($query){

            $getData = array(
                'id' => $value['$userId'],
                 
            );
            $this->db->insert_batch('tbl_dish_user', $getData);
        }
        
    }
}

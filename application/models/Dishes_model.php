<?php
/**
 * This model contains the business logic and manages the persistence of tbl_dishes and tbl_roles
 * @copyright  Copyright (c) 2018 khai HOK
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/khaihok/2018-canteen
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
     * Get the list of dishes base on type
     * @param int $mealType for catch the type of the dish
     * @return array record of tbl_dishes
     * @author kimsoeng kao <kimsoeng.kao@gmail.com>
     */
    public function shortMealType($mealType){
        $query = $this->db->get_where('tbl_dishes', array('meal_time_id'=>$mealType));
        return $query->result();
    }


    /**
     * Get the list of tbl_dishes or one user
     * @param int $id optional id of one user
     * @return array record of tbl_dishes
     * @author chantha roeurn <chantha.roeurn@gmail.com>
     */
    public function getDishes() {
        $this->db->order_by('dish_id', 'DESC');
        $query = $this->db->get('tbl_dishes'); 
        return $query->result();
    }
   /**
     * This function is use to inseret interes data into tbl_rates..
     * @return array record of tbl_rates
     * @author Davy PEONG <davy.peong@student.passerellesnumerique.org>
     */
    public function getStoreInterest($user_id, $dish_id){
        $interesData = array( 
          'store_rate' => "1",
          'dish_id' => $dish_id,
          'user_id' => $user_id
        );
        $this->db->insert('tbl_rates', $interesData);

        // $this->db->select(count('user_id'));
        // $this->db->from('tbl_rates');
        // $this->db->where (array('dish_id' =>$dish_id));
        // $query = $this->db->get();
        // $result= $query->result();
      
        // $interestDish = array(
        //    'current_interest'   => $result
        // );
        // $this->db->where('dish_id', $dish_id);
        // $this->db->update('tbl_dishes ', $interestDish); 
    }
    /**
     * This function is use to delete data from tbl_rates..
     * @return array record of tbl_rates
     * @author Davy PEONG <davy.peong@student.passerellesnumerique.org>
     */
    public function getStoreUninterest($user_id){
        $this->db->where('user_id', $user_id);
        $this->db->delete(' tbl_rates');
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
     * Delete a dishes from the database
     * @param int $id identifier of the user
     * @author Davy Peong <davy.peong@student.passerellesnumreriqes.org>
     */
    public function deleteDishes($id) {
        $this->db->delete('tbl_dishes', array('dish_id' => $id));
    }

    /**
      * set_dish from database with image
     * @author Chantha ROEURN <chantha.roeurn@student.passerellesnumeriques.org>
     */
    
    public function setDishes() {
        //Hash the clear password using bcrypt (8 iterations)
        $password = $this->input->post('password');
        $salt = '$2a$08$' . substr(strtr(base64_encode($this->getRandomBytes(16)), '+', '.'), 0, 22) . '$';
        $hash = crypt($password, $salt);
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
      *  from database with image
     * @author Chantha ROEURN <chantha.roeurn@student.passerellesnumeriques.org>
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
            'dish_name'  => $this->input->post('dishName'),            
            'dish_image' => $this->upload->data()['file_name'],         
            'description' => $this->input->post('description'),        
            'meal_time_id' => $this->input->post('mealTime')        
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

    /**
     * Get the info from tbl_dishes where dishes match with breakfast 
     * @param int $id optional id of one dish.
     * @return array record of tbl_dishes
     * @author khai.hok <khai.hok@student.passerellesnumeriques.org>
     */
    public function getMenu(){
        date_default_timezone_set("Asia/Phnom_Penh");
        $creating_date = date('Y-m-d');
       $this->db->select('*');
       $this->db->from('tbl_dishes');
        $this->db->where (array('dish_active' =>1));
        $this->db->where('menu_created_date=',$creating_date);
        $this->db->where('meal_time_id=',1);
        $query = $this->db->get();
        return $query->result();
    }


    /**
     * Get the info from tbl_dishes where dishes match with Lunch. 
     * @param int $id optional id of one dish.
     * @return array record of tbl_dishes
     * @author khai.hok <khai.hok@student.passerellesnumeriques.org>
     */
    public function getMenu1(){
        date_default_timezone_set("Asia/Phnom_Penh");
        $creating_date = date('Y-m-d');
       $this->db->select('*');
       $this->db->from('tbl_dishes');
        $this->db->where (array('dish_active' =>1));
        $this->db->where('menu_created_date=',$creating_date);
        $this->db->where('meal_time_id=',2);
        $query = $this->db->get();
        return $query->result();
    }
    /**
     * Get the info from tbl_dishes where dishes match with dinner. 
     * @return array record of tbl_dishes
     * @author khai.hok <khai.hok@student.passerellesnumeriques.org>
     */
    public function getMenu2(){
        date_default_timezone_set("Asia/Phnom_Penh");
        $creating_date = date('Y-m-d');
       $this->db->select('*');
       $this->db->from('tbl_dishes');
        $this->db->where (array('dish_active' =>1));
        $this->db->where('menu_created_date=',$creating_date);
        $this->db->where('meal_time_id=',3);
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
    /**
    * Get all the food which are already ordered
    * @author kimsoeng kao <kimsoeng.kao@student.passerellesnumeriques.org>
    */
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

    /**
    * Get all the food which are already ordered for breakfast
    * @author kimsoeng kao <kimsoeng.kao@student.passerellesnumeriques.org>
    */
    public function preOrderMealType($mealType)
    {
      $this->db->select('orders.*,dishes.dish_name as dishName,sum(orders.quantity) as TotalQuantity,sum(orders.quantity)*1000 as TotalPayment');
      $this->db->from('tbl_order as orders');
      $this->db->join('tbl_dish_user as dishUsers', 'orders.order_id = dishUsers.order_id');
      $this->db->join('tbl_dishes dishes', 'dishes.dish_id = dishUsers.dish_id');
      $this->db->where('dishes.meal_time_id', $mealType);
      $this->db->group_by('dishName'); 
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

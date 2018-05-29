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
class DishesModel extends CI_Model {

    /**
     * Default constructor
     */
    public function __construct() {

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
    }
    /**
     * This function is use to select and update table
     * @return array record of tbl_rates
     * @author Davy PEONG <davy.peong@student.passerellesnumerique.org>
     */
        public function selectAndStoreInterest($dish_id){

        $query = $this->db->query("SELECT COUNT(user_id) AS countUser FROM tbl_rates WHERE dish_id = '".$dish_id."'");  
        $interestData =  $query->result();

        /* Update Interest */
        foreach ($interestData as $valueInterests) {
           $valueInterest= $valueInterests ->countUser;
        }

        $updateData = array(
            'current_interest' => $valueInterest
        );
        $this->db->where('dish_id', $dish_id);
        $this->db->update('tbl_dishes ', $updateData); 
        // 
        return $valueInterest;
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
     * Delete a dish from the database
     * @param int $id indified the dish
     * @author kimsoeng kao <kimsoeng.kao@gmail.com>
     */
    public function deleteDishes($id) {
        $this->db->delete('tbl_dishes', array('dish_id' => $id));
    }

    /**
     *select all the dishe data to update in html form
     * @return row of the dishes
     * @author kimsoeng kao <kimsoeng.kao@gmail.com>
     */

  public function selectDish($id){
     $query = $this->db->get_where('tbl_dishes', array('dish_id' => $id));
     return $query->result();
  }

    /**
     *update all the dish
     * @return true
     * @author kimsoeng kao <kimsoeng.kao@gmail.com>
    */
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

    public function getMenu($number){
        date_default_timezone_set("Asia/Phnom_Penh");
        $creating_date = date('Y-m-d');
       $this->db->select('*');
       $this->db->from('tbl_dishes');
        $this->db->where (array('dish_active' =>1));
        $this->db->where('menu_created_date=',$creating_date);
        $this->db->where('meal_time_id=', $number);
        $query = $this->db->get();
        return $query;
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
    * Get all the food which are already preordered
    * @author kimsoeng kao <kimsoeng.kao@student.passerellesnumeriques.org>
    */
    public function preOrderList($meal_time_id = null)
    {
      // set currrent time zone in php to cambodia time +7
        date_default_timezone_set("Asia/Phnom_Penh");
        $current_date = date('Y-m-d');
      $this->db->select('orders.*,dishes.dish_id as dish_id,dishes.dish_name as dishName,sum(orders.quantity) as TotalQuantity,sum(orders.quantity)*1000 as TotalPayment');
      $this->db->from('tbl_order as orders');
      $this->db->join('tbl_dish_user as dishUsers', 'dishUsers.order_id = orders.order_id');
      $this->db->join('tbl_dishes as dishes', 'dishes.dish_id = dishUsers.dish_id');
      $this->db->where('orders.date', $current_date);
      $this->db->group_by('dish_id'); 
      $query = $this->db->get();
      return $query->result();
    }

    /**
    * Get all the food which are already ordered for breakfast
    * @author kimsoeng kao <kimsoeng.kao@student.passerellesnumeriques.org>
    */
    public function preOrderMealType($mealType)
    {
      // set currrent time zone in php to cambodia time +7
        date_default_timezone_set("Asia/Phnom_Penh");
        $current_date = date('Y-m-d');
      $this->db->select('orders.*,dishes.dish_id as dish_id,dishes.dish_name as dishName,sum(orders.quantity) as TotalQuantity,sum(orders.quantity)*1000 as TotalPayment');
      $this->db->from('tbl_order as orders');
      $this->db->join('tbl_dish_user as dishUsers', 'orders.order_id = dishUsers.order_id');
      $this->db->join('tbl_dishes dishes', 'dishes.dish_id = dishUsers.dish_id');
      $this->db->where('orders.date', $current_date);
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
     // Check if user already order dish
  // Check if user already order dish   
    function checkIfUserOrderDish($dish_id, $user_id,$current_date, $meal_time)
    {           
      $this->db->select('*');        
      $this->db->from(' tbl_order');        
      $this->db->join('tbl_dish_user' , ' tbl_order.order_id = tbl_dish_user.order_id');
      // Check with meal time id   
      $this->db->join('tbl_dishes' , ' tbl_dishes.dish_id = tbl_dish_user.dish_id');   
      $this->db->where('meal_time', $meal_time);
      //
      $this->db->where('tbl_dish_user.dish_id', $dish_id);      
      $this->db->where('user_id', $user_id);        
      $this->db->where('tbl_order.date', $current_date);       
      $result = $this->db->get();        
      if($result->num_rows() > 0)        
      {          
        return true; // return true if user alreay order that dish  
      }else{          
        return false; // return false if user not yet order        
      }    
    }
    // Get user dish order to edit
    function selectDishEdit($dish_id, $user_id)
    {
       $this->db->where('tbl_dish_user.dish_id', $dish_id);
        $this->db->where('tbl_dish_user.user_id', $user_id);
        $this->db->join('tbl_dish_user', 'tbl_dishes.dish_id = tbl_dish_user.dish_id');
        $this->db->join('tbl_order', 'tbl_order.order_id = tbl_dish_user.order_id'); // join to get the quantity in tbl order
        $result = $this->db->get('tbl_dishes');      
        return $result->result();
    }
    
    // Update order info
    function updateOrderInfo($order_id)
    {
      $qty = $this->input->post('quantity'); // get qty from edit form popup

      return $this->db->where('order_id', $order_id)
      ->update('tbl_order', array('quantity'=> $qty));
    }

        /**
     * selectIsUserInterest is use to valedate if user had interest with food or not.
     * @return array record of tbl_rates
     * @author Davy PEONG <davy.peong@student.passerellesnumerique.org>
     */
    public function selectIsUserInterest($dish_id, $user_id){
        $this->db->select('*');
        $this->db->from('tbl_rates');
        $this->db->where('user_id', $user_id);
        $this->db->where('dish_id', $dish_id);
        $query = $this->db->get(); 
        if($query->num_rows() > 0){
        return true;
        }else{
        return false;
        }
    }
    public function getStoreUninterest($user_id , $dish_id){
        $this->db->where('user_id', $user_id);
        $this->db->where('dish_id', $dish_id);
        $this->db->delete('tbl_rates');
    }
}

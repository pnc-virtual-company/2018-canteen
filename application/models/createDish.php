<?php
/**
 * This model contains the business logic and manages the persistence of tbl_users and tbl_roles
 * @copyright  Copyright (c) 2018 Benjamin BALET
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/skeleton
 * @since      1.0.0
 */

if (!defined('BASEPATH')) { exit('No direct script access allowed'); }

/**
 * This model contains the business logic and manages the persistence of tbl_users and tbl_roles
 * It is also used by the session controller for the authentication.
 */
class createDish extends CI_Model {

    /**
     * Default constructor
     */
    public function __construct() {

    }

    /**
     * Get the list of tbl_users or one user
     * @param int $id optional id of one user
     * @return array record of tbl_users
     * @author khai hok <khai.hok.passerellesnumeriques.org>
     */
    public function getPostMenu($dishId, $meal_time, $mealDate, $menuDescription) {
       $newMenu = $this->db->query("SELECT COUNT(menu_id) FROM tbl_menu");
       var_dump($newMenu); exit();// hello i am here

       $this->db->query('UPDATE tbl_dishes SET meal_time_id="'.$meal_time.'", dish_date="'.$mealDate.'" WHERE dish_id IN('.$dishId.')');
    }

    
}

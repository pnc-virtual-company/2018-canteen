<?php
/**
 * This model contains of function of create menu.
 * @copyright  Copyright (c) 2018 HOK Khai
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/skeleton
 * @since      1.0.0
 */

if (!defined('BASEPATH')) { exit('No direct script access allowed'); }

/**
 * This model contains of function of create menu.
 */
class createDish extends CI_Model {
    /**
     * Default constructor
     */
    public function __construct() {

    }
    /**
     * Get the update of tbl_dishes of one or multiple dishes from create menu
     * @param int $id can lesect one or multiple dishes to update.
     * @return array record of tbl_dishes.
     * @author khai hok <khai.hok.passerellesnumeriques.org>
     */
    public function getPostMenu($dishId, $meal_time, $mealDate, $menuDescription) {
       $this->db->query('UPDATE tbl_dishes SET dish_active =1, meal_time_id="'.$meal_time.'", menu_created_date="'.$mealDate.'", menu_description ="'.$menuDescription.'" WHERE dish_id IN('.$dishId.')');
    }
}

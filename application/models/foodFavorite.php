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
class foodFavorite extends CI_Model {

    /**
     * Default constructor
     */
    public function __construct() {

    }

    /**
     * Get the list favorite food 
     * @return array record of tbl_dishes
     * @author khai hok <khai.hok@student.passerellesnumeriques.org>
     */
    public function dishesFavorite(){
        $query = $this->db->query('SELECT * FROM tbl_dishes');
         return $query->result();
    }
}

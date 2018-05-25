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
class Users_model extends CI_Model {

    /**
     * Default constructor
     */
    public function __construct() {

    }

    /**
     * Get list of user who already order the dishes
     * @return array record of tbl_users
     * @author kimsoeng kao <kimsoeng.kao@gmail.com>
     */
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

    public function addUsers(){
        //Hash the clear password using bcrypt (8 iterations)
        $password = $this->input->post('password');
        $data = array('upload_data' => $this->upload->data());
        $this->upload->data()['file_name'];
        $salt = '$2a$08$' . substr(strtr(base64_encode($this->getRandomBytes(16)), '+', '.'), 0, 22) . '$';
        $hash = crypt($password, $salt);
        $dataUser =  array(
            'firstname'  => $this->input->post('firstname'),
            'lastname'   => $this->input->post('lastname'),
            'login'      => $this->input->post('username'),
            'email'      => $this->input->post('email'),
            'class_name' => $this->input->post('class'),
            'card_id'    => $this->input->post('cardId'),
            'gender'     => $this->input->post('gender'),
            'image'      => $this->upload->data()['file_name'],
            'password'   => $hash,
            'role'       => '2',
            'active'     => '1'
        );
        // var_dump($dataUser);die();
        // insert array value to database
        $this->db->insert("tbl_users", $dataUser);
        return true;
    }

    /**
     * Get the list of tbl_users or one user
     * @param int $id optional id of one user
     * @return array record of tbl_users
     * @author kimsoeng kao <kimsoeng.kao@gmail.com>
     */

    /// get roles from tbl_role
     public function selectRole(){
    $query = $this->db->get('tbl_roles');
    return $query->result();
 }

    public function getUsers($id = 0) {
        $this->db->select('tbl_users.*');
        if ($id === 0) {
            $query = $this->db->get('tbl_users');
            return $query->result_array();
        }
        $query = $this->db->get_where('tbl_users', array('tbl_users.id' => $id));
        return $query->row_array();
    }

    /**
     * Get the list of tbl_users and their tbl_roles
     * @return array record of tbl_users
     * @author kimsoeng kao <kimsoeng.kao@gmail.com>
     */
    public function getUsersAndRoles() {
        $this->db->select('tbl_users.id, active, firstname, lastname, login, email');
        $this->db->select("GROUP_CONCAT(" . $this->db->dbprefix('tbl_roles') . ".name SEPARATOR ',') as tbl_roles_list", FALSE);
        $this->db->join('tbl_roles', 'tbl_roles.id = (' . $this->db->dbprefix('tbl_users') . '.role & ' . $this->db->dbprefix('tbl_roles') . '.id)');
        $this->db->group_by($this->db->dbprefix('tbl_users') . '.id, active, firstname, lastname, login, email');
        $query = $this->db->get('tbl_users');
        return $query->result_array();
    }

  /**
   * Get the list of tbl_roles or one role
   * 00000001 1  Admin
   * 00000010 2	User
   * 00000010 3 Staff
   * 00000100 8	HR Officier / Local HR Manager
   * 00001000 16	HR Manager
   * 00010000 32	General Manager
   * 00100000 34	Global Manager
   * @param int $id optional id of one role
   * @return array record of tbl_roles
   * @author kimsoeng kao <kimsoeng.kao@gmail.com>
   */
  public function getRoles($id = 0) {
      if ($id === 0) {
          $query = $this->db->get('tbl_roles');
          return $query->result_array();
      }
      $query = $this->db->get_where('tbl_roles', array('id' => $id));
      return $query->row_array();
  }

    /**
     * Get the name of a given user
     * @param int $id Identifier of employee
     * @return string firstname and lastname of the Users
     * @author kimsoeng kao <kimsoeng.kao@gmail.com>
     */
    public function getName($id) {
        $record = $this->getUsers($id);
        if (count($record) > 0) {
            return $record['firstname'] . ' ' . $record['lastname'];
        }
    }

    /**
     * Check if a login can be used before creating the user
     * @param string $login login identifier
     * @return bool TRUE if available, FALSE otherwise
     * @author kimsoeng kao <kimsoeng.kao@gmail.com>
     */
    public function isLoginAvailable($login) {
        $this->db->from('tbl_users');
        $this->db->where('login', $login);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Delete a user from the database
     * @param int $id identifier of the user
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function deleteUser($id) {
        $this->db->delete('tbl_users', array('id' => $id));
    }

    /**
     * Insert a new user into the database. Inserted data are coming from an HTML form
     * @return string deciphered password (so as to send it by e-mail in clear)
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function setUsers() {
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
        $this->db->insert('tbl_users', $data);
        return $password;
    }

    /**
     * Update a given user in the database. Update data are coming from an HTML form
     * @return int number of affected rows
     * @author kimsoeng kao <kimsoeng.kao@gmail.com>
     */
    public function getUsersUpdate($id)
      {
        $query = $this->db->get_where('tbl_users', array('id' => $id));
      return $query->result();
      }
    public function updateUsers($password) {
        $this->upload->data()['file_name'];
        $data_image = array('upload_data' => $this->upload->data());
        $data = array(
            'firstname'  => $this->input->post('firstname'),
            'lastname'   => $this->input->post('lastname'),
            'login'      => $this->input->post('username'),
            'email'      => $this->input->post('email'),
            'card_id'    => $this->input->post('cardId'),
            'class_name' => $this->input->post('class'),
            'gender'     => $this->input->post('gender'),
            'image'      => $this->upload->data()['file_name'],
            'password'   => $password,
            'role' =>$this->input->post('role')
        );
        // var_dump($data);die();
        $this->db->where('id', $this->uri->segment(4));
        $this->db->update('tbl_users', $data);
        return true;
    }

    /**
     * Generate a random password
     * @param int $length length of the generated password
     * @return string generated password
     * @author kimsoeng kao <kimsoeng.kao@gmail.com>
     */
    public function randomPassword($length) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password = substr( str_shuffle( $chars ), 0, $length );
        return $password;
    }

    /**
     * Load the profile of a user from the database to the session variables
     * @param array $row database record of a user
     */
    private function loadProfile($row) {
      /*
        000000010  1 Admin
        0000000100 2  User
        00000001000 4  Staff
        0000010000 8  HR Officier / Local HR Manager
        0000100000 16 HR Manager
        = 00001101 25 Can access to HR functions
       */
        $isAdmin = FALSE;
        if (((int) $row->role & 1)) {
            $isAdmin = TRUE;
        }
        $isUser = FALSE;
        if (((int) $row->role & 2)) {
            $isUser = TRUE;
        }
        $isStaff = FALSE;
        if (((int) $row->role & 4)) {
            $isStaff = TRUE;
        }
        $isSuperAdmin = FALSE;
        if (((int) $row->role & 8)) {
            $isSuperAdmin = TRUE;
        }

        $newdata = array(
            'login' => $row->login,
            'id'    => $row->id,
            'firstname' => $row->firstname,
            'lastname' => $row->lastname,
            'fullname' => $row->firstname . ' ' . $row->lastname,
            'isAdmin' => $isAdmin,
            'isUser' => $isUser,
            'isStaff' => $isStaff,
            'isSuperAdmin' => $isSuperAdmin,
            'loggedIn' => TRUE
        );
        $this->session->set_userdata($newdata);
    }

    /**
     * Check the provided credentials and load user's profile if they are correct
     * @param string $login user login
     * @param string $password password
     * @return bool TRUE if the user is succesfully authenticated, FALSE otherwise
     * @author kimsoeng kao <kimsoeng.kao@gmail.com>
     */
    public function checkCredentials($login, $password) {
        $this->db->from('tbl_users');
        $this->db->where('login', $login);
        $this->db->where('active = TRUE');
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            //No match found
            return FALSE;
        } else {
            $row = $query->row();
            $hash = crypt($password, $row->password);
            if ($hash == $row->password) {
                // Password does match stored password.
                $this->loadProfile($row);
                return TRUE;
            } else {
                // Password does not match stored password.
                return FALSE;
            }
        }
    }

    /**
     * Set a user as active (TRUE) or inactive (FALSE)
     * @param int $id User identifier
     * @param bool $active active (TRUE) or inactive (FALSE)
     * @return int number of affected rows
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function setActive($id, $active) {
        $this->db->set('active', $active);
        $this->db->where('id', $id);
        return $this->db->update('tbl_users');
    }

    /**
     * Check if a user is active (TRUE) or inactive (FALSE)
     * @param string $login login of a user
     * @return bool active (TRUE) or inactive (FALSE)
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function isActive($login) {
        $this->db->from('tbl_users');
        $this->db->where('login', $login);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->active;
        } else {
            return FALSE;
        }
    }

    /**
     * Try to return the user information from the login field
     * @param string $login Login
     * @return User data row or null if no user was found
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function getUserByLogin($login) {
        $this->db->from('tbl_users');
        $this->db->where('login', $login);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            //No match found
            return null;
        } else {
            return $query->row();
        }
    }

    /**
     * Generate some random bytes by using openssl, dev/urandom or random
     * @param int $count length of the random string
     * @return string a string of pseudo-random bytes (must be encoded)
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    protected function getRandomBytes($length) {
        if(function_exists('openssl_random_pseudo_bytes')) {
          $rnd = openssl_random_pseudo_bytes($length, $strong);
          if ($strong === TRUE)
            return $rnd;
        }
        $sha =''; $rnd ='';
        if (file_exists('/dev/urandom')) {
          $fp = fopen('/dev/urandom', 'rb');
          if ($fp) {
              if (function_exists('stream_set_read_buffer')) {
                  stream_set_read_buffer($fp, 0);
              }
              $sha = fread($fp, $length);
              fclose($fp);
          }
        }
        for ($i=0; $i<$length; $i++) {
          $sha  = hash('sha256',$sha.mt_rand());
          $char = mt_rand(0,62);
          $rnd .= chr(hexdec($sha[$char].$sha[$char+1]));
        }
        return $rnd;
    }

    public function getListUsers(){
        $query = $this->db->query("select  user.*, role.id as role, role.name as rolename from tbl_users as user inner join tbl_roles as role where user.role = role.id order by id DESC");
        return $query->result();
    }  

    public function deleteUsers($id) {
        $this->db->delete('tbl_users', array('id' => $id));
    }
    public function insertUser(){
        // get value from input name
        $password = $this->input->post('password');
        $data = array('upload_data' => $this->upload->data());
        $this->upload->data()['file_name'];
        $salt = '$2a$08$' . substr(strtr(base64_encode($this->getRandomBytes(16)), '+', '.'), 0, 22) . '$';
        $hash = crypt($password, $salt);
        $userRole = $this->input->post('userRole');
        $data =  array(
            'firstname'  => $this->input->post('firstname'),
            'lastname'   => $this->input->post('lastname'),
            'login'      => $this->input->post('loginname'),
            'email'      => $this->input->post('useremail'),
            'class_name' => $this->input->post('classname'),
            'card_id'    => $this->input->post('cardid'),
            'gender'     => $this->input->post('gender'),
            'image'      => $this->upload->data()['file_name'],
            'password'   => $hash,
            'role'       => $userRole,
            'active'     => '1'
        );
        // insert array value to database
        $this->db->insert("tbl_users", $data);
    }


    /**
     * Select a given user that join event in the database.
     * @return int number of affected rows
     * @author sun MEAS <sun.meas@gmail.com>
     */

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

    /**
     * short the staff confirm and not yet confirm
     * @return int $status is for short of confirm or not yet confirm
     * @author kimsoeng kao <kimsoeng.kao@gmail.com>
     */

    /*Function get all particapate of event lunch*/
    public function shortListParticipate($statusId){
         $query = $this->db->query('SELECT 
                    staffParticpate.*, 
                    lunchEvent.title AS "Title",
                    users.class_name AS "ClassName",
                    users.email AS "Email",
                    CONCAT(users.firstname , " " , users.lastname) AS "Staff_name"
                    FROM tbl_staff_participation staffParticpate
                    INNER JOIN tbl_lunch_events lunchEvent ON lunchEvent.id = staffParticpate.lunch_event_id
                    INNER JOIN tbl_users users ON users.id = staffParticpate.user_id
                    WHERE staffParticpate.status = "$statusId" ');
                return $query->result();
    }     

    /*Function get status of event lunch*/
    public function getStaffStatus(){
         $query = $this->db->query('SELECT * FROM tbl_staff_participation');
                return $query->result();
    }   

}

<?php
/**
 * CRUD that related to Calendar and sending email in the database.
 * @return int number of affected rows
 * @author sun MEAS <sun.meas@gmail.com>
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar_model extends CI_Model {


	/*Read the data from DB */
	Public function getLunchEvents()
	{
		$sql = "SELECT * FROM tbl_lunch_events WHERE tbl_lunch_events.start BETWEEN ? AND ? ORDER BY tbl_lunch_events.start ASC";
		return $this->db->query($sql, array($_GET['start'], $_GET['end']))->result();
	}

	/*Create new tbl_lunch_events */
	Public function addLunchEvent()
	{
		$sql = "INSERT INTO tbl_lunch_events (title,tbl_lunch_events.start,tbl_lunch_events.end,description, color) VALUES (?,?,?,?,?)";                    
		$this->db->query($sql, array($_POST['title'], $_POST['start'],$_POST['end'], $_POST['description'], $_POST['color']));               
		return ($this->db->affected_rows()!=1)?false:true;
	}

	/*Update  event */
	Public function updateLunchEvent()
	{
		$sql = "UPDATE tbl_lunch_events SET title = ?, description = ?, color = ? WHERE id = ?";
		$this->db->query($sql, array($_POST['title'],$_POST['description'], $_POST['color'], $_POST['id']));
		return ($this->db->affected_rows()!=1)?false:true;
	}


	/*Delete event */
	Public function deleteLunchEvent()
	{
		$sql = "DELETE FROM tbl_lunch_events WHERE id = ?";
		$this->db->query($sql, array($_GET['id']));
		return ($this->db->affected_rows()!=1)?false:true;
	}

	/*Update  event */
	Public function dragUpdateLunchEvent()
	{
		//$date=date('Y-m-d h:i:s',strtotime($_POST['date']));
		$sql = "UPDATE tbl_lunch_events SET  tbl_lunch_events.start = ? ,tbl_lunch_events.end = ?  WHERE id = ?";
		$this->db->query($sql, array($_POST['start'],$_POST['end'], $_POST['id']));
		return ($this->db->affected_rows()!=1)?false:true;
	}



	/*Read the data from DB */
	Public function getDinnerEvents($Dinner_ID)
	{
		$sql = "SELECT * FROM tbl_dinner_events WHERE tbl_dinner_events.start BETWEEN ? AND ? ORDER BY tbl_dinner_events.start ASC";
		return $this->db->query($sql, array($_GET['start'], $_GET['end']))->result();
	}

	/*Create new tbl_dinner_events */
	Public function addDinnerEvent()
	{
		$sql = "INSERT INTO tbl_dinner_events (title,tbl_dinner_events.start,tbl_dinner_events.end,description, color, dinner_events) VALUES (?,?,?,?,?,?)";                    
		$this->db->query($sql, array($_POST['title'], $_POST['start'],$_POST['end'], $_POST['description'], $_POST['color'],$_POST['event']));               
		return ($this->db->affected_rows()!=1)?false:true;
	}

	/*Update  event */
	Public function updateDinnerEvent()
	{
		$sql = "UPDATE tbl_dinner_events SET title = ?, description = ?, color = ?, dinner_events = ? WHERE id = ?";
		$this->db->query($sql, array($_POST['title'],$_POST['description'], $_POST['color'], $_POST['event'],$_POST['id']));
		return ($this->db->affected_rows()!=1)?false:true;
	}


	/*Delete event */
	Public function deleteDinnerEvent()
	{
		$sql = "DELETE FROM tbl_dinner_events WHERE id = ?";
		$this->db->query($sql, array($_GET['id']));
		return ($this->db->affected_rows()!=1)?false:true;
	}

	/*Update  event */
	Public function dragUpdateDinnnerEvent()
	{
		//$date=date('Y-m-d h:i:s',strtotime($_POST['date']));
		$sql = "UPDATE tbl_dinner_events SET  tbl_dinner_events.start = ? ,tbl_dinner_events.end = ?  WHERE id = ?";
		$this->db->query($sql, array($_POST['start'],$_POST['end'], $_POST['id']));
		return ($this->db->affected_rows()!=1)?false:true;
	}

	/*User click join event*/
	Public function userJoinEvent()
	{	
		$sql = "INSERT INTO tbl_join_events (firstname, lastname, login, email,tbl_join_events.start,tbl_join_events.end) VALUES (?,?,?,?,?,?)";
		$this->db->query($sql, array($_POST['firstname'], $_POST['lastname'],$_POST['login'], $_POST['email'], $_POST['start'],$_POST['end']));
		return ($this->db->affected_rows()!=1)?false:true;
	}

}

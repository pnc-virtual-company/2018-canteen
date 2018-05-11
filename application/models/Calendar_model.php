<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar_model extends CI_Model {


	/*Read the data from DB */
	Public function getEvents()
	{
		$sql = "SELECT * FROM tbl_events WHERE tbl_events.start BETWEEN ? AND ? ORDER BY tbl_events.start ASC";
		return $this->db->query($sql, array($_GET['start'], $_GET['end']))->result();
	}

	/*Create new tbl_events */
	Public function addEvent()
	{
		$sql = "INSERT INTO tbl_events (title,tbl_events.start,tbl_events.end,description, color, dinner_events) VALUES (?,?,?,?,?,?)";                    
		$this->db->query($sql, array($_POST['title'], $_POST['start'],$_POST['end'], $_POST['description'], $_POST['color'], $_POST['event']));               
		return ($this->db->affected_rows()!=1)?false:true;
	}

	/*Update  event */
	Public function updateEvent()
	{
		$sql = "UPDATE tbl_events SET title = ?, description = ?, color = ?, dinner_events= ? WHERE id = ?";
		$this->db->query($sql, array($_POST['title'],$_POST['description'], $_POST['color'], $_POST['event'], $_POST['id']));
		return ($this->db->affected_rows()!=1)?false:true;
	}


	/*Delete event */
	Public function deleteEvent()
	{
		$sql = "DELETE FROM tbl_events WHERE id = ?";
		$this->db->query($sql, array($_GET['id']));
		return ($this->db->affected_rows()!=1)?false:true;
	}

	/*Update  event */
	Public function dragUpdateEvent()
	{
		//$date=date('Y-m-d h:i:s',strtotime($_POST['date']));
		$sql = "UPDATE tbl_events SET  tbl_events.start = ? ,tbl_events.end = ?  WHERE id = ?";
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
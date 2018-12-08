<?php 

/**
* 
*/
class SetModel extends CI_Model
{
	
	
		public function SelectSetList($course_id=null,$set_id=null)
	 {
	 	$this->db->select('*');
	 	$this->db->from('sets');
	 	$this->db->join('course','sets.course_id = course.course_id','left');
	 	if ($set_id!=null) {
	 		$this->db->where('set_id',$set_id);
	 	}else{
	 			$this->db->where('sets.course_id',$course_id);
	 		 }
	 	
	 	$query = $this->db->get();
	 	return $query->result_array();
	 }

	 public function SaveSet($data)
	 {
	 	$this->db->insert('sets',$data);
	 	return true;
	 }

	 public function SetUpdate($data,$id)
	 {
	 	$this->db->where('set_id',$id);
	 	$this->db->update('sets',$data);
	 	return true;
	 }

	 public function DropSet($id)
	 {
	 	$this->db->where('set_id',$id);
	 	$this->db->delete('sets');
	 	return true;
	 }


	
}


 ?>
<?php 

/**
* 
*/
class QuestionModel extends CI_Model
{
	
	
	public function SelectQuestionList($set_id=null,$q_id=null)
	 {
	 	
	 	$this->db->select('*');
	 	$this->db->from('questions');
	 	$this->db->join('sets','questions.set_id = sets.set_id','left');
	 	if ($q_id!=null) {
	 		$this->db->where('question_id',$q_id);
	 	}else{
	 			$this->db->where('questions.set_id',$set_id);
	 		 }
	 	$query = $this->db->get();
	 	return $query->result_array();
	 }

	 public function SelectPreviousMarks($q_id)
	 {
	 	$this->db->select('*');
	 	$this->db->from('questions');
	 	$this->db->where('question_id',$q_id);
	 	$query = $this->db->get();
	 	return $query->result_array();
	 }
	 	
	 	

	 public function EditQuestion($data_new,$q_id)
	 {
	 	$data = $this->SelectPreviousMarks($q_id)[0];
	 	if($data['marks'] < $this->input->get_post('que_marks'))
		{
			$final = $this->input->get_post('que_marks') -$data['marks'];
			$this->db->query("UPDATE sets SET set_total_marks = set_total_marks + '".$final."' WHERE set_id='".$data['set_id']."'");
			
		}else
		{
			$final = $data['marks'] - $this->input->get_post('que_marks') ;
			$this->db->query("UPDATE sets SET set_total_marks = set_total_marks - '".$final."' WHERE set_id='".$data['set_id']."'");
		}
	 	
		$this->db->where('question_id',$q_id);
		$this->db->update('questions',$data_new);
		return true;	
	 }
        


		
		

	 	

		
	 	
	 	

	 public function SaveQuestion($data)
	{
		$this->db->insert("questions",$data);
		
		
		$this->db->query("UPDATE sets SET set_total_marks = set_total_marks + '".$this->input->get_post('que_marks')."' WHERE set_id='".$data['set_id']."'");
			return true;
		
	}

	public function DropQues($id)
	{
		$data = $this->SelectPreviousMarks($id)[0];
		$final = $data['marks'];
			$this->db->query("UPDATE sets SET set_total_marks = set_total_marks - '".$final."' WHERE set_id='".$data['set_id']."'");
		$this->db->where('question_id',$id);
		$this->db->delete('questions');
		return true;
	}

	public function QuestionDeatials($id)
	{
		$this->db->select('*');
		$this->db->from('questions');
		$this->db->where('question_id',$id);
		$result = $this->db->get();
		return $result->result_array();
	}
	
}


 ?>
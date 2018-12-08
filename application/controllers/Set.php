<?php 

/**
* 
*/
class Set extends CI_Controller
{
	
	public function SetList($id)
	{
		$data['course_val'] = $id;
		$this->load->view('includes/header');
		$this->load->view('includes/side');
		$this->load->model('SetModel');
		$data['set_list'] = $this->SetModel->SelectSetList($id,null);
		$this->load->view('SetView',$data);
		$this->load->view('includes/footer');
	}

	public function NewSet($course_id=null,$set_id=null)
	{

		$data['course_val']=$course_id;
		// die($q_id);
		$this->load->view('includes/header');
		$this->load->view('includes/side');
		$this->load->model('SetModel');
		if ($set_id!=null) 
		{
			
			$data['rows'] = $this->SetModel->SelectSetList(null,$set_id)[0];
		}
		//die(print_r($data));
		$this->load->view('SetFormView',$data);
		$this->load->view('includes/footer');
	}

	public function AddSet()
	{
			header('Access-Control-Allow-Origin:*');
			$this->load->library("form_validation");
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger" >','</div>');
			
			
			$this->form_validation->set_rules('name_set', 'Set Name', 'required');
			$this->form_validation->set_rules('passing_mark', 'Passing Markes', 'required');
			$this->form_validation->set_rules('set_duration', 'Duration', 'required');

			
			if($this->form_validation->run())
			{
				$data=array
				(
					'course_id' => $this->input->post('course_ids'),
					'set_name' => $this->input->post('name_set'),
					'set_passing_mark' => $this->input->post('passing_mark'),
					'set_duration' => $this->input->post('set_duration'),
					'set_total_marks' => 0
				);
			
				$this->load->model('SetModel');
				$result =$this->SetModel->SaveSet($data);
			
				if ($result == true) 
				{
					die ('<div class="alert alert-success" > Submit successfully</div>');
					

				} 
				else 
				{
					die ('<div class="alert alert-danger" > Please Resubmit</div>');
				}
			}
			else 
			{
				echo validation_errors();
			}
	}

public function UpdateSet($id)
	{
			header('Access-Control-Allow-Origin:*');
			$this->load->library("form_validation");
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger" >','</div>');
			
			
			$this->form_validation->set_rules('name_set', 'Set Name', 'required');
			$this->form_validation->set_rules('passing_mark', 'Passing Markes', 'required');
			$this->form_validation->set_rules('set_duration', 'Duration', 'required');

			
			if($this->form_validation->run())
			{
				$data=array
				(
					'course_id' => $this->input->post('course_ids'),
					'set_name' => $this->input->post('name_set'),
					'set_passing_mark' => $this->input->post('passing_mark'),
					'set_duration' => $this->input->post('set_duration')
					
				);
			
				$this->load->model('SetModel');
				$result =$this->SetModel->SetUpdate($data,$id);
			
				if ($result == true) 
				{
					die ('<div class="alert alert-success" > Update successfully</div>');
					

				} 
				else 
				{
					die ('<div class="alert alert-danger" > Please Resubmit</div>');
				}
			}
			else 
			{
				echo validation_errors();
			}
	}

	public function DeleteSet($id)
	{	
			header('Access-Control-Allow-Origin:*');
			$this->load->model('SetModel');
			$final = $this->SetModel->DropSet($id);
			if ($final== true) 
			{
				die('Delete successfully');
			}
			else
			{
				die('Error');
			}

	}

		

		
}




 ?>
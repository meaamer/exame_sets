<?php 

/**
* 
*/
class Question extends CI_Controller
{
	
	public function QuestionList($id)
	{
		$data['set_val']=$id;
		$this->load->view('includes/header');
		$this->load->view('includes/side');
		$this->load->model('QuestionModel');
		$data['question_list'] = $this->QuestionModel->SelectQuestionList($id,null);
		
		$this->load->view('QuestionView',$data);
		$this->load->view('includes/footer');
	}

	public function NewQuestion($set_id=null,$q_id=null)
	{

		$data['set_val']=$set_id;
		// die($q_id);
		$this->load->view('includes/header');
		$this->load->view('includes/side');
		$this->load->model('QuestionModel');
		if ($q_id!=null) 
		{
			
			$data['rows'] = $this->QuestionModel->SelectQuestionList(null,$q_id)[0];
		}
		// die(print_r($data));
		$this->load->view('QuestionFormView',$data);
		$this->load->view('includes/footer');
	}

		
		



	public function AddQuestion()
	{
		header('Access-Control-Allow-Origin:*');
			
			$this->load->library("form_validation");
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger" >','</div>');
			

			$this->form_validation->set_rules('new_question', 'Question', 'required');
			$this->form_validation->set_rules('option_a', 'Option A', 'required');
			$this->form_validation->set_rules('option_b', 'Option B', 'required');
			$this->form_validation->set_rules('option_c', 'Option C', 'required');
			$this->form_validation->set_rules('option_d', 'Option D', 'required');
			$this->form_validation->set_rules('ans_of_que', 'Answer', 'required');
			$this->form_validation->set_rules('que_marks', 'Markes', 'required');
			$this->form_validation->set_rules('que_language', 'Language', 'required');

			
			
			if($this->form_validation->run())
			{
				$data=array(
					'set_id' => $this->input->post('set_ids'),
					'question' => $this->input->post('new_question'),
					'a_obj' => $this->input->post('option_a'),
					'b_obj' => $this->input->post('option_b'),
					'c_obj' => $this->input->post('option_c'),
					'd_obj' => $this->input->post('option_d'),
					'answer' => $this->input->post('ans_of_que'),
					'marks' => $this->input->post('que_marks'),
					'language' => $this->input->post('que_language')
					
					);

				
				$this->load->model('QuestionModel');
				$result =$this->QuestionModel->SaveQuestion($data);
				
				
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

	public function UpdateQuestion($ques_id)
	{
		header('Access-Control-Allow-Origin:*');
			
			$this->load->library("form_validation");
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger" >','</div>');
			

			$this->form_validation->set_rules('new_question', 'Question', 'required');
			$this->form_validation->set_rules('option_a', 'Option A', 'required');
			$this->form_validation->set_rules('option_b', 'Option B', 'required');
			$this->form_validation->set_rules('option_c', 'Option C', 'required');
			$this->form_validation->set_rules('option_d', 'Option D', 'required');
			$this->form_validation->set_rules('ans_of_que', 'Answer', 'required');
			$this->form_validation->set_rules('que_marks', 'Markes', 'required');
			$this->form_validation->set_rules('que_language', 'Language', 'required');

			
			
			if($this->form_validation->run())
			{
				$data=array(
					'set_id' => $this->input->post('set_ids'),
					'question' => $this->input->post('new_question'),
					'a_obj' => $this->input->post('option_a'),
					'b_obj' => $this->input->post('option_b'),
					'c_obj' => $this->input->post('option_c'),
					'd_obj' => $this->input->post('option_d'),
					'answer' => $this->input->post('ans_of_que'),
					'marks' => $this->input->post('que_marks'),
					'language' => $this->input->post('que_language')
					
					);

				
				$this->load->model('QuestionModel');
				$result =$this->QuestionModel->EditQuestion($data,$ques_id);
				
				
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
	
		public function DeleteQues($id)
		{
			header('Access-Control-Allow-Origin:*');
			$this->load->model('QuestionModel');
			$final = $this->QuestionModel->DropQues($id);
			if ($final== true) 
			{
				die('Delete successfully');
			}
			else
			{
				die('Error');
			}

		}

		public function QuesFullView($id)
		{
			$this->load->model('QuestionModel');
			$data['ques'] = $this->QuestionModel->QuestionDeatials($id);
			//die(print_r($data));
			echo $this->load->view('QuestionDetailView',$data,true);
		}
	
		

		
}




 ?>
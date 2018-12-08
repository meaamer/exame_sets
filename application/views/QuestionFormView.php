
<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Add New Question </h3>
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" id="new_ques">
							<div class="form-group">
									<label  class="col-sm-2 control-label"></label>
									<div class="col-sm-8">
										<div id="alerts"></div>
									</div>
								</div>
							
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Question</label>
									<div class="col-sm-8">
										<textarea class="form-control1" name="new_question" 
										style="height:50px"><?php if(isset($rows)){echo $rows['question'];} ?></textarea>
									</div>
									
								</div>
								<div class="form-group">
									<label  class="col-sm-2 control-label">Option A</label>
									<div class="col-sm-8">
										<input type="text" name="option_a" 
										value="<?php if(isset($rows)){echo $rows['a_obj'];} ?>" class="form-control1"  placeholder="Option A">
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-2 control-label">Option B</label>
									<div class="col-sm-8">
										<input type="text" name="option_b" class="form-control1"  
										value="<?php if(isset($rows)){echo $rows['b_obj'];} ?>" placeholder="Option B">
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-2 control-label">Option C</label>
									<div class="col-sm-8">
										<input type="text" name="option_c" class="form-control1" 
										value="<?php if(isset($rows)){echo $rows['c_obj'];} ?>" placeholder="Option C">
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-2 control-label">Option D</label>
									<div class="col-sm-8">
										<input type="text" name="option_d" class="form-control1" 
										value="<?php if(isset($rows)){echo $rows['d_obj'];} ?>" placeholder="Option D">
									</div>
								</div>
								<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Right Answer</label>
									<div class="col-sm-8">
									<select  class="form-control" name="ans_of_que">
									<?php if(isset($rows)){?>
									<option value="<?php echo $rows['answer']; ?>" selected><?php echo strtoupper($rows['answer']);  ?></option>  <?php } ?>"

										<option value="a">A</option>
										<option value="b">B</option>
										<option value="c">C</option>
										<option value="d">D</option>

									</select>
									
									</div>
								</div>
								
								<div class="form-group">
									<label  class="col-sm-2 control-label">Marks</label>
									<div class="col-sm-8">
										<input type="number" name="que_marks" class="form-control1"
										value="<?php if(isset($rows)){echo $rows['marks'];} ?>"  placeholder="Marks" limit="1" max="100">
									</div>
								</div>
								
								<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Select Language</label>
									<div class="col-sm-8">
									<select  class="form-control" name="que_language">
									<?php if(isset($rows)){?>
									<option value="<?php echo $rows['language']; ?>" selected><?php echo $rows['language'];?></option>  <?php } ?>"
										<option value="english">English</option>
										<option value="hindi">Hindi</option>
										<option value="urdu">Urdu</option>
									</select>
									
									</div>
								</div>

										
									
									 <input type="hidden" name="set_ids" value="<?php if(isset($rows)) {echo $rows['set_id'];}else {echo $set_val;} ?>">

								<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label"></label>
									<div class="col-sm-8">
									

									<?php if (isset($rows)) { ?>
           							<button type="button" class="btn btn-danger" onclick="UpdateQues(<?=$rows['question_id']?>);">Update</button> 

          							<?php } else { ?>
         							<button type="button" class="btn btn-danger" onclick="AddQue();">Submit</button>
           

                      
         <?php  } ?>
									</div>
								</div>
								
								
								
								
								
								
							</form>
						</div>
					</div>
					
					
  
						
				</div>
			</div>
			</div>


<script>
	
	function AddQue()
  {

    var form =$("#new_ques");
    $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>Question/AddQuestion",
      data:form.serialize(),
      success: function(response){

        $("#alerts").html(response);
         form[0].reset();
      }
    });
  }

  function UpdateQues(id)
  {
  	
    var form =$("#new_ques");
    $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>Question/UpdateQuestion/"+id,
      data:form.serialize(),
      success: function(response){

        $("#alerts").html(response);
       // history.back();
      }
    });
  }
</script>

<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Add New Set </h3>
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" id="new_set">
							<div class="form-group">
									<label  class="col-sm-2 control-label"></label>
									<div class="col-sm-8">
										<div id="alerts"></div>
									</div>
								</div>
							
								
								<div class="form-group">
									<label  class="col-sm-2 control-label">Set Name</label>
									<div class="col-sm-8">
										<input type="text" name="name_set" 
										value="<?php if(isset($rows)){echo $rows['set_name'];} ?>" class="form-control1"  placeholder="Set Name">
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-2 control-label">Passing Marks</label>
									<div class="col-sm-8">
										<input type="number"  name="passing_mark" class="form-control1"  
										value="<?php if(isset($rows)){echo $rows['set_passing_mark'];} ?>" placeholder="Passing Marks">
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-2 control-label">Duration</label>
									<div class="col-sm-8">
										<input type="number" max="100" name="set_duration" class="form-control1" 
										value="<?php if(isset($rows)){echo $rows['set_duration'];} ?>" placeholder="Duration">
									</div>
								</div>
								
								
								
								
								
									<input type="hidden" name="course_ids" value="<?php if(isset($rows)) {echo $rows['course_id'];}else {echo $course_val;} ?>">

								<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label"></label>
									<div class="col-sm-8">
									

									<?php if (isset($rows)) { ?>
           							<button type="button" class="btn btn-danger" onclick="UpdateSets(<?=$rows['set_id']?>);">Update</button> 

          							<?php } else { ?>
         							<button type="button" class="btn btn-danger" onclick="AddNew();">Submit</button>
           

                      
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
	
	function AddNew()
  {

    var form =$("#new_set");
    $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>Set/AddSet",
      data:form.serialize(),
      success: function(response){

        $("#alerts").html(response);
         form[0].reset();
      }
    });
  }

  function UpdateSets(id)
  {
  	
    var form =$("#new_set");
    $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>Set/UpdateSet/"+id,
      data:form.serialize(),
      success: function(response){

        $("#alerts").html(response);
        history.back();
      }
    });
  }

  
</script>
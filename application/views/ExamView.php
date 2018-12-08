

<!-- Default theme -->

<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
	
			<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Set Table</h3>
					 <div class="xs tabls">
						
					   <button type="button" class="btn-success"  data-toggle="modal" data-target="#myModal"><?php if (isset($rows)) {echo "Update Set";
                         }else{echo "Add Set";} ?></button>
						
						<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">

							<div class="panel-body no-padding" style="display: block;">
								<table class="table table-striped">
									<thead>
										<tr class="warning">
											<th>#</th>
											<th>Course Name</th>
											<th>Set Name</th>
											<th>Total Marks</th>
											<th>Passing Marks</th>
											<th>Duration</th>
											<th>Actions</th>
											
										</tr>
									</thead>
									<tbody>
									
											
									
										<tr>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>11</td>
											<td>1</td>
											
										</tr>
										
									</tbody>
								</table>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <form id="send">
  			<div class="form-group has-success">
  			<label class="sr-only" for="inlineFormInput">State Name</label>
 				<input class="form-control form-control-lg" type="text" placeholder="State Name" name="send_state" value="<?php if(isset($rows)){echo $rows['state_name']; } ?>" required>
  			</div>

  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <?php if (isset($rows)) { ?>

           <button type="button" class="btn btn-default" onclick="UpdateState(<?=$rows['state_id']?>);">Update</button> 
           

          <?php } else { ?>
        	<button type="button" class="btn btn-primary" onclick="AddState()">Submit</button>
                      
         <?php  } ?>
        

         
                                

            

        <div id="alerts"></div>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->		

<script>
function AddState()
  {
    var form =$("#send");
    $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>State/InserState",
      data:form.serialize(),
      success: function(response){
        $("#alerts").html(response);
         form[0].reset();
      }
    });
  }


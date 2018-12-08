<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
	
			<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1"><?php foreach ($set_list as $value) {
						echo $value['course_name']; break;
					} ?></h3>
					 <div class="xs tabls">
						
					  
						
						<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">

							<div class="panel-body no-padding" style="display: block;">
								<table class="table table-striped">
									<thead>
										<tr class="warning">
											<th>#</th>
											<th>Set Name</th>
                      						<th>Set Total Marks</th>
											<th>Passing Marks</th>
											<th>Duration</th>
											<th>Actions &nbsp;&nbsp;&nbsp;
												<a class="btn btn-danger btn-xs" 
                                        			href="<?=base_url('Set/NewSet/').$course_val?>">Add New Sets</a></td>
											</th>
											
										</tr>
                      
											
									</thead>
									<tbody>
									<?php if (!empty($set_list)) {

											foreach ($set_list as $item){?>
											
									
										<tr id="reload<?php echo $item['set_id']; ?>">
											<td><?php echo $item['set_id']; ?></td>
											<td><?php echo $item['set_name']; ?></td>
											<td><?php echo $item['set_total_marks']; ?></td>
											<td><?php echo $item['set_passing_mark']; ?></td>
											<td><?php echo $item['set_duration']; ?></td>
                     
                      
												<td>
												<a href="<?=base_url('Set/NewSet/').'null'.'/'.$item['set_id'] ?>" class="btn btn-danger btn-xs">Update</a>
					
												<button type="button" class="btn btn-danger btn-xs" onclick="DropSet(<?php echo $item['set_id']; ?>);">Delete</button>
												<a class="btn btn-danger btn-xs" 
                                        			href="<?=base_url('Question/QuestionList/').$item['set_id']?>">Manage Question</a></td>
											</td>

											
										</tr>
										<?php } } ?>
									</tbody>
								</table>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		
<script>
	
	function  DropSet(id){
   
    alertify.confirm("Sure You Want To Delete This.",function(){
      $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>Set/DeleteSet/"+id,
      success: function(response){
       alertify.success(response);
        $('#reload'+id).remove();
      }
  });
   },
  function(){
    alertify.error('Cancel');
  })

}
</script>
<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
	
			<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1"><?php foreach ($question_list as $value) {
						echo $value['set_name']; break;
					} ?></h3>
					 <div class="xs tabls">
						
					  
						
						<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">

							<div class="panel-body no-padding" style="display: block;">
								<table class="table table-striped">
									<thead>
					<tr class="warning">
											<th>#</th>

											<th>Question</th>
                      						<th>Option A</th>
											<th>Option B</th>
											<th>Option C</th>
											<th>Option D</th>
											<th>Answer</th>
											
											<th>Action &nbsp;&nbsp;&nbsp;
											
						<a class="btn btn-danger btn-xs" 
                         href="<?=base_url('Question/NewQuestion/').$set_val?>">Add New Question</a>
                                        			
											</th>
											
											
										</tr>
                      
											
									</thead>
									<tbody>

									<?php if (!empty($question_list)) {

											foreach ($question_list as $item){?>
											
									
										<tr id="reload<?php echo $item['question_id']; ?>">
											<td><?php echo $item['question_id'];?></td>
											<td><?php echo substr($item['question'],0,25); ?>...</td>
											<td><?php echo $item['a_obj']; ?></td>
											<td><?php echo $item['b_obj']; ?></td>
											<td><?php echo $item['c_obj']; ?></td>
											<td><?php echo $item['d_obj']; ?></td>
											<td><?php echo $item['answer']; ?></td>

											
                     
                      
											<td>
											<button type="button" class="btn btn-danger btn-xs"
											data-toggle="modal" data-target="#ques_detail" onclick="FullView(<?=$item['question_id']?>)">View</button>
											
											<a href="<?=base_url('Question/NewQuestion/').'null'.'/'.$item['question_id'] ?>" class="btn btn-danger btn-xs">Update</a>


												<button type="button" class="btn btn-danger btn-xs"onclick="DropQuestion(<?php echo $item['question_id'];  ?>)">Delete</button>


												
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
		


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="ques_detail">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Question</h4>
      </div><br>
     <div id="printQuestionp"></div><br>
     <div class="modal-footer ">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>

    </div>
  </div>
</div>




<script>
	function  DropQuestion(id){
   
    alertify.confirm("Sure You Want To Delete This.",function(){
      $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>Question/DeleteQues/"+id,
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

function FullView(id){
    

  var BASE_URL = "<?php echo base_url();?>";
   $.post("<?php echo base_url()?>Question/QuesFullView/"+id,
    function(data){
    
   $("#printQuestionp").html(data);

   });
   
 }

</script>
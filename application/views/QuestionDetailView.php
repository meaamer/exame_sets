
<style type="text/css">
	.btns
	{
      padding: 6px 30px;
      border-radius: 0px; 
    
	}
    
  
    
</style>


   <div class="container">
        <?php if (!empty($ques)) { foreach ($ques as $item) {?>
  
            
              <div class="row">
                <div class="col-md-12 col-lg-12 ">
                  <p><?php echo substr($item['question'],0,120).'<br>';
                  		   echo substr($item['question'],120)
                   ?></p>
                </div>
               </div> <br>
               
                <div class="row" style="margin-left: 50px"> 
                   <div class="col-md-6">
                   <button type="button" class="btn btn-default btns">Option A : <?php echo $item['a_obj']; ?></button>
                   	
                   </div>
                    <div class="col-md-5">
                   <button type="button" class="btn btn-default btns">Option B : <?php echo $item['b_obj']; ?></button>
                   </div>
                  
                </div><br>
                <div class="row" style="margin-left: 50px"> 
                   <div class="col-md-6">
                   	<button type="button" class="btn btn-default btns">Option C : <?php echo $item['b_obj']; ?></button>
                   </div>
                    <div class="col-md-5">
                   <button type="button" class="btn btn-default btns">Option D : <?php echo $item['d_obj']; ?></button>
                   </div>
                  
                </div><br>
               
                

                <div class="row" style="margin-left: 50px">
                <div class="col-md-12 col-lg-12 ">
                  	<button type="button" class="btn btn-default btns">Answer : <?php echo $item['answer']; ?></button>
                   
                </div>

              </div><br>

              <div class="row" style="margin-left: 50px">
                <div class="col-md-12 col-lg-12 ">
                  	<button type="button" class="btn btn-default btns">Marks : <?php echo $item['marks']; ?></button>
                   
                </div>

              </div><br>
              <div class="row" style="margin-left: 50px">
                <div class="col-md-12 col-lg-12 ">
                  	
                  	<button type="button" class="btn btn-default btns">Language : <?php echo $item['language']; ?></button>
                   
                </div>

              </div><br>
              <?php } } ?>
           
                
            
         
       
      </div>
    
  



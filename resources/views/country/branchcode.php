 
 <?php
 
 if(!empty($all_branch)) {  ?>
 
  
 
 
 <div class="form-group">
                                        <label ><?php echo translate('branch_code'); ?></label>
                                      
										
										
				
				 <?php foreach ($all_branch as $row) {
                  ?>
					<input type="text" class="form-control" readonly="1" name="branch_code" id="branch_code" value="<?php echo $row['code']; ?>" 
					
             <?php   } ?>
                                            
                                            
				
                                      
                                    </div>
									<br>
									
								
									
									
									<?php }else {} ?>
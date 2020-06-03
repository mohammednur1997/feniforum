 
 <?php
 
 if(!empty($all_district)) {  ?>
 
  
   <div class="col-md-12">
 
 <div class="form-group">
                                        <label ><?php echo translate('district'); ?></label>
                                      
										
										<select class="form-control select" id="district" name="city"  required>
				
				
				 <?php foreach ($all_district as $row) {
                  ?>
					<option value="<?php echo $row['district_id']; ?>" ><?php echo $row['district_name']; ?></option>
					
             <?php   } ?>
                                            
                                            
				</select>
                                      
                                    </div>
								</div>
									
									
									
									<?php }else {} ?>
<?php
 error_reporting(0);
ini_set('display_errors','off');
?>
<script type="text/javascript">


function loadNid(){
   document.getElementById('nidchk').style.display = 'block';
   var nid = document.getElementById('nid').value;
   $("#nidchk").load("<?php echo base_url(); ?>public/load_nid.php?nid="+nid+"");
}

function hide(){
	   document.getElementById('nidchk').style.display = 'none';
}




function loadMobile(){
   document.getElementById('mobileshow').style.display = 'block';
   var mobile = document.getElementById('mobile').value;
   $("#mobileshow").load("<?php echo base_url(); ?>public/load_mobile.php?mobileno="+mobile+"");
}

function hide(){
	   document.getElementById('mobileshow').style.display = 'none';
}


function loadUsername(){
   document.getElementById('usershow').style.display = 'block';
   var username = document.getElementById('username').value;
   $("#usershow").load("<?php echo base_url(); ?>public/load_username.php?usernmae="+username+"");
}
function hide(){
	   document.getElementById('usershow').style.display = 'none';
}


function loadSponsor(){
   document.getElementById('sponsorshow').style.display = 'block';
   var refid = document.getElementById('refid').value;
   $("#sponsorshow").load("<?php echo base_url(); ?>public/load_sponsor.php?refid="+refid+"");
}
function hide(){
	   document.getElementById('sponsorshow').style.display = 'none';
}





function loadPlacement(){
   document.getElementById('placeshow').style.display = 'block';
   var place = document.getElementById('place').value;
   $("#placeshow").load("<?php echo base_url(); ?>public/load_place.php?placement="+place+"");
}
function hide(){
	   document.getElementById('placeshow').style.display = 'none';
}





</script>

<style>
input {
font-size:16px;
color:red;
	
}
</style>


		<script type="text/javascript" src="<?php echo base_url(); ?>admin/js/ajax_req.js"></script>



		<?php
									$left_current=$tcount[0];
									$right_current=$tcount[1];
									
									$left_total=$tcount[0];
									$right_total=$tcount[0];
									?>
									
<!-- - - - - - - - - - - - - - Page Wrapper - - - - - - - - - - - - - - - - -->

			

					

						<div class="container">

					<div class="row">

					

								<?php include('inc/user_menu.php'); ?>

						<div id="content" class="col-md-9 col-sm-8">
	<h2><?php echo translate('member_signup'); ?></h2>
       <div class="bordered_content box">
      <div class="padded_ex_bottom">
	  
	   
	  
	    <?php if($this->session->flashdata('regerror')) { ?>
					    <div class="alert alert-danger fade in">
                                                    <strong><?php echo $this->session->flashdata('regerror'); ?></strong> 
                                                </div>
												
												<?php } ?>
	  
	  <?php
												
												$user=$this->session->userdata('member_session');
												 $user->user_id;  
												
												$user_info=$this->mdb->getData('userbase',array('user_id'=>$user->user_id));
												
												?>
     
 <?php echo form_open_multipart('' , array('class' => ''));?>
	 <fieldset>
	 
	 		<div class="row">
			<div class="col-md-6">
			<div class="form-group">
                                                <label for="exampleInputEmail1"><?php echo translate('full_name'); ?>   <font color="#FF0000"> ** </font></label>
                                                <input type="text" class="form-control" name="fullname" id="fullname" value="<?=set_value('fullname')?>" placeholder="<?php echo translate('full_name'); ?> " required>
												 
                                            </div>
											
											 <div class="form-group">
                                                <label for="exampleInputEmail1"><?php echo translate('father_name'); ?> </label>
                                                <input type="text" class="form-control" name="fathername" id="fathername" value="<?=set_value('fathername')?>"  placeholder="<?php echo translate('father_name'); ?>   " >
                                            </div>
											
											
											 <div class="form-group">
                                                <label for="exampleInputEmail1"><?php echo translate('mother_name'); ?></label>
                                                <input type="text" class="form-control" name="mothername" id="mothername" value="<?=set_value('mothername')?>"  placeholder="<?php echo translate('mother_name'); ?>">
                                            </div>
											
											
											
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><?php echo translate('email_address'); ?>  <font color="#FF0000"> ** </font> </label>
                                                <input type="email" class="form-control" name="email" id="email" value="<?=set_value('email')?>" placeholder="<?php echo translate('email_address'); ?>" required onkeyup="loadMobile();">
                                            </div>
											
											   <div class="form-group">
                                                <label for="exampleInputEmail1"><?php echo translate('mobile'); ?> <font color="#FF0000"> ** </font> </label>
                                                <input type="text" class="form-control" onKeyPress="return isNumberKey(event)"  name="mobile" id="mobile" value="<?=set_value('mobile')?>" placeholder="<?php echo translate('mobile'); ?>" onmouseout="hide()" onkeyup="loadMobile();" onchange="loadMobile();" required>
												<div id="mobileshow" ></div>
                                            </div>
											
											
                                            <div class="form-group">
                                                <label for="exampleInputPassword1"><?php echo translate('nid'); ?>  <font color="#FF0000"> ** </font> </label>
                                                <input type="text" class="form-control" onKeyPress="return isNumberKey(event)" name="nid" id="nid" value="<?=set_value('nid')?>" placeholder=" <?php echo translate('nid'); ?>" onmouseout="hide()" onkeyup="loadNid();" onchange="loadNid();" required>
												<div id="nidchk" ></div>
                                            </div>


                                              <div class="form-group">
                                        <label><?php echo translate('country'); ?></label>
                                       
										<select class="form-control select2" name="country" id="select21" onChange="htmlData('<?php echo base_url(); ?>home/getState', 'cid='+select21.value)" required>
				
				 <option value="" >Choose Country</option>
				 <?php 

				 $all_country = $this->db->get('country')->result_array();

				 foreach ($all_country as $pcat) {
                 ?>
					<option value="<?php echo $pcat['country_id']; ?>" ><?php echo $pcat['country_name']; ?></option>
					
             <?php   } ?>
                                            
                                           
				</select>
                                       
                                    </div>
									
									<div id="txtResult">
									
			   							</div>


											
											<div class="form-group">
                                                <label for="exampleInputPassword1"><?php echo translate('address'); ?></label>
												<textarea name="address" class="form-control" id="address" cols="6" rows="4"></textarea>
                                             
                                            </div>
											</div>
											
									  
										
						


                           
							 <div class="col-md-6">
                            	<!-- Regular Signup -->
                              
                        			

                                    <div class="form-group">
                                                <label for="exampleInputPassword1"><?php echo translate('join_pin'); ?>  <font color="#FF0000"> ** </font> </label>

                                    <input type="text" name="jpin" id="jpin" class="form-control" required="required" value="<?=set_value('jpin')?>" placeholder="<?php echo translate('join_pin'); ?> "/>
                                    
                                    </div>


									  <div class="form-group">
                                                 <label for="exampleInputEmail1"><?php echo translate('sponsor_id'); ?>  <font color="#FF0000"> ** </font></label>
                                               
<input type="text" class="form-control" name="refid" id="refid" placeholder="<?php echo translate('sponsor_id'); ?> " value="<?php echo $this->mdb->getLoginId($selectid); ?>" onkeyup="loadSponsor();"  required>
						 <div id="sponsorshow" ></div>
                                              
                                            </div>
											
											 <div class="form-group">
                                                <label for="exampleInputEmail1"><?php echo translate('placement_id'); ?>   <font color="#FF0000"> ** </font> </label>
                                              
<input type="text" class="form-control" name="place" id="place" placeholder="<?php echo translate('placement_id'); ?> " value="<?php echo $this->mdb->getLoginId($selectid); ?>" onkeyup="loadPlacement();" required>
 <div id="placeshow" ></div>
                                                </div>
                                           
											
											
											 <div class="form-group">
                                                 <label for="exampleInputEmail1"><?php echo translate('position'); ?>  <font color="#FF0000"> ** </font></label>
                                            
                                                    <select class="form-control" name="position" id="position" required>
													
                                                        <option value="L" <?php if($position=="left_id") { echo "selected='selected'";} ?> >Left</option>
                                                        <option value="R" <?php if($position=="right_id") { echo "selected='selected'";} ?> >Right</option>
                                                      
                                                    </select>
												
													</div>
													
													 <div class="form-group">
                                                 <label for="exampleInputEmail1"><?php echo translate('account_type'); ?>  <font color="#FF0000"> ** </font></label>
                                               
                                                    <select class="form-control" name="acctype" id="acctype" required>
													 <?php foreach($packages as $row ) { ?>
													<option value="<?php echo $row->package_id ?>"><?php echo $row->package_name ?></option>
                                                       
                                                       <?php } ?>
                                                      
                                                    </select>
												
													</div>
													
													
													
											
											
											
                                           <div class="form-group">
                                                <label for="exampleInputPassword1"><?php echo translate('username'); ?>  <font color="#FF0000"> ** </font> </label>
                                                  <input type="text" class="form-control" name="username" id="username" onkeyup="loadUsername();" value="<?=set_value('username')?>" placeholder="<?php echo translate('username'); ?>" required>
                                               <div id="usershow" ></div>
                                            </div>
									 
                                    <div class="form-group">
                                                <label for="exampleInputPassword1"><?php echo translate('password'); ?>  <font color="#FF0000"> ** </font> </label>
                                    <input type="password" name="password" id="password" required pattern="\w{5,15}" class="form-control password-input margin-5" placeholder="<?php echo translate('password'); ?>"/>
									
									</div>


									  <div class="form-group">
                                        <label><?php echo translate('branch'); ?></label>
                                       
										<select class="form-control select2" name="branch" id="branch" onChange="RsData('<?php echo base_url(); ?>home/getBranchcode', 'bid='+branch.value)" required>
				
				 <option value="" >Choose Branch</option>
				 <?php 

				 $all_brn = $this->db->get('branch')->result_array();

				 foreach ($all_brn as $pcat) {
                 ?>
					<option value="<?php echo $pcat['branch_id']; ?>" ><?php echo $pcat['branch_name']; ?></option>
					
             <?php   } ?>
                                            
                                           
				</select>
                                       
                                    </div>
									
									<div id="RsData">
									
			   							</div>



                                    <div class="form-group">
                                                <label for="exampleInputPassword1"><?php echo translate('zip_code'); ?>  <font color="#FF0000"> ** </font> </label>

                                    <input type="text" name="zip_code" id="zip_code" class="form-control" required="required" value="<?=set_value('zip_code')?>" placeholder="<?php echo translate('zip_code'); ?> "/>
                                    
                                    </div>
									
									</div>
								</div>

          
														
                                       
</fieldset>
			
											

        <div class="bottom_buttons">
         <div class="row">
          <div class="col-xs-6"><a href="<?php echo base_url(); ?>home" class="btn btn-default"><?php echo translate('back'); ?></a></div>
          <div class="col-xs-6 text-right">
            <input type="submit" value="<?php echo translate('submit'); ?>" class="btn btn-primary" />
          </div>
         </div>
        </div>
      </form>
      
      </div>
      </div>

		
		
		
      </div>
    </div>
</div>


<script type="text/javascript">




// Load shipping addresses
$(document).ready(function() {
	$.ajax({
		url: 'website/shipping_address',
		dataType: 'html',
		cache: false,
		beforeSend: function() {
			$('#shipping-address .quickcheckout-content').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-5x"></i></div>');
		},
		success: function(html) {
			$('#shipping-address .quickcheckout-content').html(html);
		},
			});
});



//--></script>


<?php
	foreach($editadmin as $ge) : 
?>
					<div class="cr-bottom">
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">Edit Administrator - <?php echo $ge->admin_fullname; ?></div>
								<div class="bbxh-right">
									<div class="bbxhr-toogle"><a href="#" id="button-tootle1"><img src="<?php echo base_url(); ?>assets/images/toogle.png" /></a></div>
									<div class="bbxhr-close"><a href="#" id="button-close1"><img src="<?php echo base_url(); ?>assets/images/close.png" /></a></div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div> 
							
							<form method="post" action="<?php echo base_url(); ?>admin/editadmin_process" name="add-admin" id="add-admin" enctype="multipart/form-data" data-toggle="validator">
							<input type="hidden" name="getid" value="<?php echo $ge->id_admin_record; ?>" />
							<div class="bbox-cont" id="box-cont1">
								
								
								<div class="fieldspage">
									<div class="fieldpage-title">Fullname<font color="red">*</font></div>
									<div class="fieldpage-info">
										<input type="text" name="fullname" class="input-form" value="<?php echo $ge->admin_fullname; ?>" maxlength="150" required />
									</div>
									<div class="clear"></div>
								</div>
								<div class="fieldpage">
									<div class="fieldpage-title">Phone</div>
									<div class="fieldpage-info">
										<input type="text" name="phone" class="input-form" maxlength="30" value="<?php echo $ge->admin_phone; ?>"/>
									</div>
									<div class="clear"></div>
								</div>
								<div class="fieldspage">
									<div class="fieldpage-title">Address</div>
									<div class="fieldpage-info">
										<textarea name="address" rows="5" class="input-form"><?php echo html_entity_decode($ge->admin_address); ?></textarea>
									</div>
									<div class="clear"></div>
								</div>
								<div class="fieldpage">
									<div class="fieldpage-title">Position</div>
									<div class="fieldpage-info">
										<input type="text" name="position" class="input-form" maxlength="100" value="<?php echo $ge->admin_position; ?>"/>
									</div>
									<div class="clear"></div>
								</div>
								<div class="fieldpage">
									<div class="fieldpage-title">Email<font color="red">*</font></div>
									<div class="fieldpage-info">
										<input type="text" name="email" class="input-form" value="<?php echo $ge->admin_email; ?>" maxlength="150" required />
										
									</div>
									<div class="clear"></div>
								</div>
								<div class="fieldspage">
									<div class="fieldpage-title">Password</div>
									<div class="fieldpage-info">
										<input type="password" name="password" class="input-form" placeholder='isikan field ini jika ingin mengganti password'/>
										
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Permission</div>
									<div class="fieldpage-info">
										<select name="permission" class="input-select">
											<option value="<?php echo $ge->admin_permission; ?>" selected><?php echo $ge->admin_permission; ?></option>
											<option value="">-- Choose</option>
											<option value="Contributor">Contributor</option>
											<option value="Operation">Operation</option>
											<option value="Administrator">Administrator</option>
											<option value="Super Administrator">Super Administrator</option>
										</select>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Status<font color="red">*</font></div>
									<div class="fieldpage-info">
										<select name="status" class="input-select">	
											<option value="<?php echo $ge->admin_status; ?>" selected><?php echo $ge->admin_status; ?></option>
											<option value="">-- Choose</option>
											<option value="Publish">Publish</option>
											<option value="Unpublish">Unpublish</option>
										</select>
									</div>
									<div class="clear"></div>
								</div>
							</div>
							
							<div class="bbox-bottom" id="box-bottom1">
								<input type="submit" name="submit" value="Update" />
							</div>
							</form>
						</div>
						
					</div> <!-- End of cr-bottom -->
<?php endforeach; ?>
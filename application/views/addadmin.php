					<div class="cr-bottom">
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">Add Administrator</div>
								<div class="bbxh-right">
									<div class="bbxhr-toogle"><a href="#" id="button-tootle1"><img src="<?php echo base_url(); ?>assets/images/toogle.png" /></a></div>
									<div class="bbxhr-close"><a href="#" id="button-close1"><img src="<?php echo base_url(); ?>assets/images/close.png" /></a></div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div> 
							
							<form method="post" action="<?php echo base_url(); ?>admin/addadmin_process" name="add-admin" id="add-admin" enctype="multipart/form-data" data-toggle="validator">
							<div class="bbox-cont" id="box-cont1">
								
								<div class="fieldspage">
									<div class="fieldpage-title">Fullname<font color="red">*</font></div>
									<div class="fieldpage-info">
										<input type="text" name="fullname" class="input-form" maxlength="150" required />
									</div>
									<div class="clear"></div>
								</div>
								<div class="fieldpage">
									<div class="fieldpage-title">Phone</div>
									<div class="fieldpage-info">
										<input type="text" name="phone" class="input-form" maxlength="30"/>
									</div>
									<div class="clear"></div>
								</div>
								<div class="fieldspage">
									<div class="fieldpage-title">Address</div>
									<div class="fieldpage-info">
										<textarea name="address" rows="5" class="input-form"></textarea>
									</div>
									<div class="clear"></div>
								</div>
								<div class="fieldpage">
									<div class="fieldpage-title">Position</div>
									<div class="fieldpage-info">
										<input type="text" name="position" class="input-form" maxlength="100"/>
									</div>
									<div class="clear"></div>
								</div>
								<div class="fieldspage">
									<div class="fieldpage-title">Email<font color="red">*</font></div>
									<div class="fieldpage-info">
										<input type="text" name="email" class="input-form" maxlength="150" required/>
										
									</div>
									<div class="clear"></div>
								</div>
								<div class="fieldpage">
									<div class="fieldpage-title">Password<font color="red">*</font></div>
									<div class="fieldpage-info">
										<input type="password" name="password" class="input-form" maxlength="150" required/>
										
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Permission</div>
									<div class="fieldpage-info">
										<select name="permission" class="input-select">
											<option value="Contributor">Contributor</option>
											<option value="Operation">Operation</option>
											<option value="Administrator">Administrator</option>
											<option value="Super Administrator">Super Administrator</option>
										</select>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Status<font color="red">*</font></div>
									<div class="fieldpage-info">
										<select name="status" class="input-select">
											<option value="Publish" selected>Publish</option>
											<option value="Unpublish">Unpublish</option>
										</select>
									</div>
									<div class="clear"></div>
								</div>
							</div>
							
							<div class="bbox-bottom" id="box-bottom1">
								<input type="submit" name="submit" value="Save" />
							</div>
							</form>
						</div>
						
					</div> <!-- End of cr-bottom -->

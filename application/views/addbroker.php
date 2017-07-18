					<div class="cr-bottom">
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">Tambah Broker</div>
								<div class="bbxh-right">
									<div class="bbxhr-toogle"><a href="#" id="button-tootle1"><img src="<?php echo base_url(); ?>assets/images/toogle.png" /></a></div>
									<div class="bbxhr-close"><a href="#" id="button-close1"><img src="<?php echo base_url(); ?>assets/images/close.png" /></a></div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div> 
							<?php echo $this->session->flashdata('errornotif'); ?>
							<form method="post" action="<?php echo base_url(); ?>broker/addbroker_process" name="add-broker" id="add-broker" enctype="multipart/form-data" data-toggle="validator">
							<div class="bbox-cont" id="box-cont1">
								
								<div class="fieldspage">
									<div class="fieldpage-title">Title<font color="red">*</font></div>
									<div class="fieldpage-info">
										<input type="text" name="title" class="input-form" maxlength="100" required/>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Code<font color="red">*</font></div>
									<div class="fieldpage-info">
										<input type="text" name="code" class="input-form" maxlength="100" required/>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Fee 1<font color="red">*</font></div>
									<div class="fieldpage-info">
										<input type="text" name="fee1" class="input-form" maxlength="100" required/>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Fee 2<font color="red">*</font></div>
									<div class="fieldpage-info">
										<input type="text" name="fee2" class="input-form" maxlength="100" required/>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Header Broker</div>
									<div class="fieldpage-info">
										<input type="file" name="_userfile" class="input-form" />
										<font color="red"><i>Upload width size : 1400px. Allowed type : PNG | JPG. Max upload : 2MB</i></font>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Disclaimer</div>
									<div class="fieldpage-info">
										<textarea name="disclaimer" rows="5" class="input-form"></textarea>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Status<font color="red">*</font></div>
									<div class="fieldpage-info">
										<select name="status" class="input-select" required>
											<option value="Publish">Publish</option>
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

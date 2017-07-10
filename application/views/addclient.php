					<div class="cr-bottom">
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">Tambah Client</div>
								<div class="bbxh-right">
									<div class="bbxhr-toogle"><a href="#" id="button-tootle1"><img src="<?php echo base_url(); ?>assets/images/toogle.png" /></a></div>
									<div class="bbxhr-close"><a href="#" id="button-close1"><img src="<?php echo base_url(); ?>assets/images/close.png" /></a></div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div> 
							<?php echo $this->session->flashdata('errornotif'); ?>
							<form method="post" action="<?php echo base_url(); ?>client/addclient_process" name="add-client" id="add-client" enctype="multipart/form-data" data-toggle="validator">
							<div class="bbox-cont" id="box-cont1">
								
								<div class="fieldspage">
									<div class="fieldpage-title">Category<font color="red">*</font></div>
									<div class="fieldpage-info">
										<select name="category" class="input-select">
											<option value="">-- Pilih</option>
											<?php foreach($getcategory as $gcat) {
												echo '<option value="'.$gcat->id_category_record.'">'.$gcat->category_title.'</option>';
											} ?>
										</select>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Broker<font color="red">*</font></div>
									<div class="fieldpage-info">
										<select name="broker" class="input-select">
											<option value="">-- Pilih</option>
											<?php foreach($getbroker as $gbro) {
												echo '<option value="'.$gbro->id_broker_record.'">'.$gbro->broker_title.'</option>';
											} ?>
										</select>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Fullname<font color="red">*</font></div>
									<div class="fieldpage-info">
										<input type="text" name="title" class="input-form" maxlength="100" required/>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Address<font color="red">*</font></div>
									<div class="fieldpage-info">
										<textarea name="address" rows="5" class="input-form" required></textarea>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Phone<font color="red">*</font></div>
									<div class="fieldpage-info">
										<input type="text" name="phone" class="input-form" maxlength="100" required/>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Email<font color="red">*</font></div>
									<div class="fieldpage-info">
										<input type="email" name="email" class="input-form" maxlength="100" required/>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Rek. BUY<font color="red">*</font></div>
									<div class="fieldpage-info">
										<input type="text" name="rekrdi" class="input-form" maxlength="100" required/>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Rek. SELL<font color="red">*</font></div>
									<div class="fieldpage-info">
										<input type="text" name="rekspv" class="input-form" maxlength="100" required/>
									</div>
									<div class="clear"></div>
								</div>

								<div class="fieldspage">
									<div class="fieldpage-title">Fee BUY<font color="red">*</font></div>
									<div class="fieldpage-info">
										<input type="text" name="feebuy" class="input-form" maxlength="100" required/>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Fee SELL<font color="red">*</font></div>
									<div class="fieldpage-info">
										<input type="text" name="feesell" class="input-form" maxlength="100" required/>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Email Operation</div>
									<div class="fieldpage-info">
										<input type="text" name="emailoperation" class="input-form" maxlength="100" required/>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Sales Person</div>
									<div class="fieldpage-info">
										<input type="text" name="salesperson" class="input-form" maxlength="100" required/>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Notes</div>
									<div class="fieldpage-info">
										<textarea name="notes" rows="5" class="input-form"></textarea>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
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

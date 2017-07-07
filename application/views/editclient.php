<?php foreach($show_client as $sgal) : ?>
					<div class="cr-bottom">
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">Edit Client - <?php echo $sgal->client_title; ?></div>
								<div class="bbxh-right">
									<div class="bbxhr-toogle"><a href="#" id="button-tootle1"><img src="<?php echo base_url(); ?>assets/images/toogle.png" /></a></div>
									<div class="bbxhr-close"><a href="#" id="button-close1"><img src="<?php echo base_url(); ?>assets/images/close.png" /></a></div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div> 
							<?php echo $this->session->flashdata('errornotif'); ?>
							<form method="post" action="<?php echo base_url(); ?>client/editclient_process" name="add-client" id="add-client" enctype="multipart/form-data" data-toggle="validator">
							<div class="bbox-cont" id="box-cont1">
								
								<input type="hidden" name="getid" value="<?php echo $sgal->id_client_record; ?>" />
								
								<div class="fieldspage">
									<div class="fieldpage-title">Category</div>
									<div class="fieldpage-info">
										<select name="category" class="input-select">
											<option value="<?php echo $sgal->id_category_record; ?>"><?php echo $sgal->category_title; ?></option>
											<option value="">-- Pilih</option>
											<?php foreach($getcategory as $gcat) {
												echo '<option value="'.$gcat->id_category_record.'">'.$gcat->category_title.'</option>';
											} ?>
										</select>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Broker</div>
									<div class="fieldpage-info">
										<select name="broker" class="input-select">
											<option value="<?php echo $sgal->id_broker_record; ?>"><?php echo $sgal->broker_title; ?></option>
											<option value="">-- Pilih</option>
											<?php foreach($getbroker as $gbro) {
												echo '<option value="'.$gbro->id_broker_record.'">'.$gbro->broker_title.'</option>';
											} ?>
										</select>
									</div>
									<div class="clear"></div>
								</div>
								<div class="fieldspage">
									<div class="fieldpage-title">Fullname</div>
									<div class="fieldpage-info">
										<input type="text" name="title" class="input-form" value="<?php echo $sgal->client_title; ?>" maxlength="100" />
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Address</div>
									<div class="fieldpage-info">
										<textarea name="address" rows="5" class="input-form"><?php echo $sgal->client_address; ?></textarea>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Phone</div>
									<div class="fieldpage-info">
										<input type="text" name="phone" class="input-form" maxlength="100" value="<?php echo $sgal->client_phone; ?>" />
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Email</div>
									<div class="fieldpage-info">
										<input type="email" name="email" class="input-form" maxlength="100" value="<?php echo $sgal->client_email; ?>" />
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Rek. BUY</div>
									<div class="fieldpage-info">
										<input type="text" name="rekrdi" class="input-form" maxlength="100" value="<?php echo $sgal->client_rekrdi; ?>" />
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Rek. SELL</div>
									<div class="fieldpage-info">
										<input type="text" name="rekspv" class="input-form" maxlength="100" value="<?php echo $sgal->client_rekspv; ?>" />
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Fee BUY<font color="red">*</font></div>
									<div class="fieldpage-info">
										<input type="text" name="feebuy" class="input-form" maxlength="100" value="<?php echo $sgal->client_feebuy; ?>" />
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Fee SELL<font color="red">*</font></div>
									<div class="fieldpage-info">
										<input type="text" name="feesell" class="input-form" maxlength="100" value="<?php echo $sgal->client_feesell; ?>" />
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Notes</div>
									<div class="fieldpage-info">
										<textarea name="notes" rows="5" class="input-form"><?php echo $sgal->client_note; ?></textarea>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Status</div>
									<div class="fieldpage-info">
										<select name="status" class="input-select">
											<option value="<?php echo $sgal->client_status; ?>" selected><?php echo $sgal->client_status; ?></option>
											<option value="">-- Choose</option>
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
<?php endforeach; ?>
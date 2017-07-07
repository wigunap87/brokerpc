<div class="cr-bottom">
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">Selisih per Email Filter</div>
								<div class="bbxh-right">
									<div class="bbxhr-toogle"><a href="#" id="button-tootle1"><img src="<?php echo base_url(); ?>assets/images/toogle.png" /></a></div>
									<div class="bbxhr-close"><a href="#" id="button-close1"><img src="<?php echo base_url(); ?>assets/images/close.png" /></a></div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div> 
							<div class="bbox-cont" id="box-cont1">
								
								<div class="formsearch addorder" align=center>
									<?php echo $this->session->flashdata('errorselisih'); ?>
									<form method="post" action="<?php echo base_url(); ?>report/selisihprocess" name="add-order" id="add-order" enctype="multipart/form-data" data-toggle="validator">
										Client<font color="red">*</font>
										<select name="email" class="input-select" required>
											<option value="">-- Pilih</option>
											<?php
												foreach($getclient as $gc) :
													echo '<option value="'.$gc->id_client_record.'">'.$gc->client_email.'</option>';
												endforeach;
											?>
										</select>&nbsp;&nbsp;
										Start Date<font color="red">*</font>
										<input type="text" name="startdate" class="input-select" required/>&nbsp;&nbsp;
										End Date<font color="red">*</font>
										<input type="text" name="enddate" class="input-select" required/>
										<input type="submit" name="submit" value="Filter Email" />
									</form>
									
								</div>
								
							</div>
							
							<div class="bbox-bottom" id="box-bottom1">
								<div class="bb-pagination">&nbsp;</div>
								<div class="bb-button">
									&nbsp;
								</div>
								<div class="clear"></div>
							</div>
						</div>
						
					</div> <!-- End of cr-bottom -->

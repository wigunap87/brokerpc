<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/appdatepicker.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/angularjs-datetime-picker.css" />
<script src="<?php echo base_url(); ?>assets/js/angularjs-datetime-picker.js"></script>

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
								
								<div class="formsearch addorder" align=center ng-app="appDate" ng-init="
  date1='01-01-2015 00:00:00';
  date2='2017-01-01';
  date3='2015-01-01T00:00:00-0400';
  date4='2015-01-01';">
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
										<input ng-model="date2" datetime-picker date-format="yyyy-MM-dd" type="text" name="startdate" class="input-select" id="datepicker" required date-only />&nbsp;&nbsp;
										End Date<font color="red">*</font>
										<input ng-model="date4" datetime-picker date-format="yyyy-MM-dd" type="text" name="enddate" class="input-select" id="datepicker" required date-only />&nbsp;&nbsp;
										
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
					
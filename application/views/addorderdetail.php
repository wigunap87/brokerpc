<?php foreach($show_order as $so) : ?>
					<div class="cr-bottom">
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">Tambah Order Detail - <?php echo $so->client_title.' ( '.$so->client_email.' )'; ?></div>
								<div class="bbxh-right">
									<div class="bbxhr-toogle"><a href="#" id="button-tootle1"><img src="<?php echo base_url(); ?>assets/images/toogle.png" /></a></div>
									<div class="bbxhr-close"><a href="#" id="button-close1"><img src="<?php echo base_url(); ?>assets/images/close.png" /></a></div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div> 
							<?php echo $this->session->flashdata('errornotif'); ?>
							<form method="post" action="<?php echo base_url(); ?>order/addorderdetail_process" name="add-order" id="add-order" enctype="multipart/form-data" data-toggle="validator">
							<input type="hidden" name="orderid" value="<?php echo $so->id_order_record; ?>" class="input-form"/>
							<div class="bbox-cont" id="box-cont1">
								<div class="formsearch">
									<div class="order-detail">
										<h1 class="green">Buy</h1>
									</div>
									<div class="order-detail-list" ng-controller="AddfieldController">
										<fieldset data-ng-repeat="choice in pilihan">
										
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-3 col-sm-3 col-md-3">
													<div class="fieldsahampage-title">Saham<font color="red">*</font></div>
													<select name="saham[]" class="input-form" required>
														<option value="">-- Pilih</option>
														<?php foreach($showsaham as $ss) : 
															echo '<option value="'.$ss->id_saham_record.'">'.$ss->saham_code.'</option>';
														endforeach; ?>
													</select>
												</div>
												<div class="col-xs-3 col-sm-3 col-md-2">
													<div class="fieldsahampage-title">Price<font color="red">*</font></div>
													<input type="text" name="price[]" ng-model="choice.price" class="input-form"/>
												</div>
												<div class="col-xs-3 col-sm-3 col-md-2">
													<div class="fieldsahampage-title">Lot<font color="red">*</font></div>
													<input type="text" name="lot[]" ng-model="choice.lot" class="input-form" />
												</div>
												<div class="col-xs-3 col-sm-3 col-md-2">
													<div class="fieldsahampage-title">Lembar</div>
													<input type="text" name="lembar[]" class="input-form" value="{{ choice.lot * 100 }}" readonly />
												</div>
												<div class="col-xs-3 col-sm-3 col-md-2">
													<div class="fieldsahampage-title">Nominal</div>
													<input type="text" name="nominal[]" class="input-form" value="{{ choice.price * (choice.lot * 100) }}" readonly />
												</div>
												<div class="col-xs-3 col-sm-3 col-md-1">
													<button class="remove" ng-show="$last" ng-click="removeChoice()">-</button>
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
										
										</fieldset>
										<div class="odl-button">
											<button type="button" class="addfields" ng-click="addNewChoice()">Add fields</button>
										</div>
									</div>
								</div>
								
								<div class="formsearch">
									<div class="order-detail">
										<h1 class="red">Sell</h1>
									</div>
									
									<div class="order-detail-list" ng-controller="AddfieldController">
										<fieldset data-ng-repeat="choice in chosell">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-3 col-sm-3 col-md-3">
													<div class="fieldsahampage-title">Saham<font color="red">*</font></div>
													<select name="sahamsell[]" class="input-form" required>
														<option value="">-- Pilih</option>
														<?php foreach($showsaham as $ss) : 
															echo '<option value="'.$ss->id_saham_record.'">'.$ss->saham_code.'</option>';
														endforeach; ?>
													</select>
												</div>
												<div class="col-xs-3 col-sm-3 col-md-2">
													<div class="fieldsahampage-title">Price<font color="red">*</font></div>
													<input type="text" name="pricesell[]" ng-model="choice.pricesell" class="input-form"/>
												</div>
												<div class="col-xs-3 col-sm-3 col-md-2">
													<div class="fieldsahampage-title">Lot<font color="red">*</font></div>
													<input type="text" name="lotsell[]" ng-model="choice.lotsell" class="input-form" />
												</div>
												<div class="col-xs-3 col-sm-3 col-md-2">
													<div class="fieldsahampage-title">Lembar</div>
													<input type="text" name="lembarsell[]" class="input-form" value="{{ choice.lotsell * 100 }}" readonly />
												</div>
												<div class="col-xs-3 col-sm-3 col-md-2">
													<div class="fieldsahampage-title">Nominal</div>
													<input type="text" name="nominalsell[]" class="input-form" value="{{ choice.pricesell * (choice.lotsell * 100) }}" readonly />
												</div>
												<div class="col-xs-3 col-sm-3 col-md-1">
													<button class="remove" ng-show="$last" ng-click="removeSell()">-</button>
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
										
										</fieldset>
										<div class="odl-button">
											<button type="button" class="addfields" ng-click="addNewSell()">Add fields</button>
										</div>
									</div>
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
					<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/simple-autocomplete.css" />
					<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/simple-autocomplete.js"></script>
					<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/controller/AsahamController.js"></script>
					<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/controller/AddfieldController.js"></script>
<?php endforeach; ?>
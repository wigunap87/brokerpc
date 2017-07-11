<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>
<div class="cr-bottom">
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">List Order</div>
								<div class="bbxh-right">
									<div class="bbxhr-toogle"><a href="<?php echo base_url(); ?>order/addorder"><img src="<?php echo base_url(); ?>assets/images/add.png" /></a></div>
									<div class="bbxhr-toogle"><a href="#" id="button-tootle1"><img src="<?php echo base_url(); ?>assets/images/toogle.png" /></a></div>
									<div class="bbxhr-close"><a href="#" id="button-close1"><img src="<?php echo base_url(); ?>assets/images/close.png" /></a></div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div> 
							<div class="bbox-cont" id="box-cont1" ng-app="myApp">
								<div class="formsearch" align=right>
									<span class="glyphicon glyphicon-plus"></span> Add Detail Saham &nbsp;&nbsp; <span class="glyphicon glyphicon-file"></span> View Detail Order &nbsp;&nbsp; <span class="glyphicon glyphicon-remove"></span> Delete Order
									
								</div>
								<div class="formsearch addorder" >
									<h1>Add Order</h1>
									<form method="post" action="<?php echo base_url(); ?>order/addorder_process" name="add-order" id="add-order" enctype="multipart/form-data" data-toggle="validator">
										Client<font color="red">*</font>
										<select name="client" class="input-select" required>
											<option value="">-- Pilih</option>
											<?php
												foreach($getclient as $gc) :
													echo '<option value="'.$gc->id_client_record.'">'.$gc->client_email.'</option>';
												endforeach;
											?>
										</select>&nbsp;&nbsp;
										Status<font color="red">*</font>
										<select name="status" class="input-select" required>
											<option value="New Order">New Order</option>
										</select>
										<input type="submit" name="submit" value="Add Order" />
									</form>
									
								</div>
								<div ng-controller="customersCrtl">
									<div class="formsearch">
										<!--PageSize:
										<select ng-model="entryLimit" class="input-select">
											<option>10</option>
											<option>20</option>
											<option>50</option>
											<option>100</option>
										</select>-->
										Filter by :
										<input type="text" ng-model="search" ng-change="filter()" placeholder="Keyword" class="input-select" />
										<!--<h5>Filtered {{ filtered.length }} of {{ totalItems}} total customers</h5>-->	
									</div>
									<div ng-show="filteredItems > 0">
										<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
											<thead>
												<th>Email <a ng-click="sort_by('client_email');"><i class="glyphicon glyphicon-sort"></i></a></th>
												<th>Fullname</th>
												<th>Rek Net Buy</th>
												<th>Rek Net Sell</th>
												<th>Broker</th>
												<th>Create Date</th>
												<th>Status</th>
												<th class="lastTH">Actions</th>
											</thead>
											<tbody>
												<tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
													<td valign=top>
														{{data.client_email}}
													</td>
													<td valign=top>
														{{data.client_title}}
													</td>
													<td valign=top>
														{{data.client_rekrdi}}
													</td>
													<td valign=top>
														{{data.client_rekspv}}
													</td>
													<td valign=top>
														{{data.broker_title}} ({{data.broker_code}})
													</td>
													<td valign=top align=center>
														{{data.order_createdate}}
													</td>
													<td valign=top align=center>
														{{data.order_status}}
													</td>
													<td valign=top align=center class="lastTD">
														<a href="<?php echo base_url(); ?>order/adddetail/{{data.id_order_record}}"><span class="glyphicon glyphicon-plus"></span></a>
														<a href="<?php echo base_url(); ?>order/vieworder/{{data.id_order_record}}"><span class="glyphicon glyphicon-file"></span></a>
														<a href="<?php echo base_url(); ?>order/deleteorder/{{data.id_order_record}}" onClick="return confirm('Are you sure want to delete?');"><span class="glyphicon glyphicon-remove"></span></a>
														
													</td>
												</tr>
											</tbody>
										</table>
										
									</div>
									<div ng-show="filteredItems == 0">
										<h4>No customers found</h4>
									</div>
									
									<div ng-show="filteredItems > 0"> 
										<div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="totalItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
									</div>
								</div>
							</div>
							
							<div class="bbox-bottom" id="box-bottom1">
								<div class="bb-pagination">&nbsp;</div>
								<div class="bb-button">
									<a href="<?php echo base_url(); ?>order/addorder"><input type="button" name="show-all" value="Tambah order" /></a>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						
					</div> <!-- End of cr-bottom -->

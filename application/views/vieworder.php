<?php foreach($show_order as $getsingle) : ?>
					<style>
						.bbox-cont td {
							border-bottom: 0px;
							border-right: 0px;
						}
					</style>
					<div class="cr-bottom">
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">View Order Detail - <?php echo $getsingle->client_email; ?></div>
								<div class="bbxh-right">
									<div class="bbxhr-toogle"><a href="<?php echo base_url(); ?>order/showprint/<?php echo $getsingle->id_order_record; ?>" target="_blank">Print</a></div>
									<div class="bbxhr-toogle"><a href="<?php echo base_url(); ?>order/showpdf/<?php echo $getsingle->id_order_record; ?>" target="_blank">Show PDF</a></div>
									
									<div class="bbxhr-toogle"><a href="#" id="button-tootle1"><img src="<?php echo base_url();  ?>assets/images/toogle.png" /></a></div>
									<div class="bbxhr-close"><a href="#" id="button-close1"><img src="<?php echo base_url();  ?>assets/images/close.png" /></a></div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div> 
							<div class="bbox-cont" id="box-cont1">
								<table border=0 cellpadding=4 cellspacing=4 width=100%>									
									<tr style='background-color:#eeeeee; font-weight:bold;'>
										<td>Detail</td>									
									</tr>									
									<tr>										
										<td>											
											<div class="order-detail">												
												<h1 class="green">Buy</h1>												
												<table border=0 width="100%">													
													<tr>														
														<th class="green">No</th>														
														<th class="green">Code</th>														
														<th class="green">Name</th>														
														<th class="green">Price</th>														
														<th class="green">Lembar</th>														
														<th class="green">Lot</th>														
														<th class="green">Nominal</th>														
														<?php if($getsingle->order_status == 'New Order') { ?>
														<th class="green">Action</th>														
														<?php } ?>													
													</tr>													
													<?php 													
													$nob = 1;													
													$subtotalbuy = 0;													
													foreach($getorderbuy as $gob) : 														
													$subtotalbuy = $subtotalbuy + $gob->orderdet_count;													
													?>														
													<tr>															
														<td align=center valign=top><?php echo $nob; ?></td>															
														<td valign=top><?php echo $gob->saham_code; ?></td>															
														<td valign=top><?php echo $gob->saham_title; ?></td>															
														<td align=center valign=top><?php echo $gob->orderdet_price; ?></td>															
														<td align=center valign=top><?php echo $gob->orderdet_countlot; ?></td>															
														<td align=center valign=top><?php echo $gob->orderdet_lot; ?></td>															
														<td valign=top align=right>Rp. <?php echo number_format($gob->orderdet_count, 2, ',', '.'); ?></td>	
														<td align=center>																
															<a href="<?php echo base_url(); ?>order/edit_orderdet/<?php echo $gob->id_orderdet_record; ?>"><img src="<?php echo base_url(); ?>assets/images/pencil.png" alt="Edit" title="Edit" width="13px"/></a>
															<a href="<?php echo base_url(); ?>order/delete_orderdet/<?php echo $gob->id_orderdet_record; ?>" onClick="return confirm('Are you sure want to delete?');"><img src="<?php echo base_url(); ?>assets/images/cross.png" alt="Delete" title="Delete" width="13px"/></a>
														</td>														
													</tr>													
													<?php 													
													$nob++;													
													endforeach; ?>													
													<tr>														
														<td colspan="8"><hr/></td>													
													</tr>													
													<tr>														
														<td colspan="6" align="right"><strong>TOTAL</strong></td>														
														<td colspan="1" align="right"><strong>Rp. <?php echo number_format($subtotalbuy, 2, ',', '.'); ?></strong></td>														
														<td>&nbsp;</td>													
													</tr>													
													<tr>														
														<td colspan="6" align="right"><strong>FEE</strong></td>														
														<td colspan="1" align=right><strong>Rp. 
														<?php 															
															$feebuy = $getsingle->order_feebrokerbuy;															
															$feebuytotal = ($feebuy * $subtotalbuy) / 100;															
															echo number_format($feebuytotal, 2, ',', '.'); ?></strong>
														</td>														
														<td>&nbsp;</td>													
													</tr>													
													<tr>														
														<td colspan="6" align="right"><strong>GRAND TOTAL</strong></td>														
														<td colspan="1" align=right><strong>Rp. 
														<?php 															
															$grandbuy = $subtotalbuy + $feebuytotal;														
															echo number_format($grandbuy, 2, ',', '.'); ?></strong>
														</td>														
														<td>&nbsp;</td>													
													</tr>												
												</table>											
											</div>																					
											<div class="order-detail">												
												<h1 class="red">Sell</h1>												
												<table border=0 width="100%">													
													<tr>														
														<th class="red">No</th>														
														<th class="red">Code</th>														
														<th class="red">Name</th>														
														<th class="red">Price</th>														
														<th class="red">Lembar</th>														
														<th class="red">Lot</th>														
														<th class="red">Nominal</th>														
														<?php if($getsingle->order_status == 'New Order') { ?>														
														<th class="red">Action</th>														
														<?php } ?>													
													</tr>													
													<?php 													
													$nos = 1;													
													$subtotalsell = 0;													
													foreach($getordersell as $gos) : 														
													$subtotalsell = $subtotalsell + $gos->orderdet_count;													
													?>														
													<tr>															
														<td align=center valign=top><?php echo $nos; ?></td>															
														<td valign=top><?php echo $gos->saham_code; ?></td>															
														<td valign=top><?php echo $gos->saham_title; ?></td>															
														<td align=center valign=top><?php echo $gos->orderdet_price; ?></td>															
														<td align=center valign=top><?php echo $gos->orderdet_countlot; ?></td>															
														<td align=center valign=top><?php echo $gos->orderdet_lot; ?></td>															
														<td valign=top align=right>Rp. <?php echo number_format($gos->orderdet_count, 2, ',', '.'); ?></td>															
														<td align=center>																
														<a href="<?php echo base_url(); ?>order/edit_orderdet/<?php echo $gos->id_orderdet_record; ?>"><img src="<?php echo base_url(); ?>assets/images/pencil.png" alt="Edit" title="Edit" width="13px"/></a>
														<a href="<?php echo base_url(); ?>order/delete_orderdet/<?php echo $gos->id_orderdet_record; ?>" onClick="return confirm('Are you sure want to delete?');"><img src="<?php echo base_url(); ?>assets/images/cross.png" alt="Delete" title="Delete" width="13px"/></a>
														</td>														
													</tr>													
													<?php 													
													$nos++;													
													endforeach; ?>													
													<tr>														
														<td colspan="8"><hr/></td>													
													</tr>													
													<tr>														
														<td colspan="6" align="right"><strong>TOTAL</strong></td>														
														<td colspan="1" align=right><strong>Rp. <?php echo number_format($subtotalsell, 2, ',', '.'); ?></strong></td>														
													<td>&nbsp;</td>													
													</tr>													
													<tr>														
														<td colspan="6" align="right"><strong>FEE</strong></td>
														<td colspan="1" align=right><strong>Rp. 
														<?php 															
															$feesell = $getsingle->order_feebrokersell;															
															$feeselltotal = ($feesell * $subtotalsell) / 100;															
															echo number_format($feeselltotal, 2, ',', '.'); ?></strong>
														</td>														
														<td>&nbsp;</td>													
													</tr>													
													<tr>														
														<td colspan="6" align="right"><strong>GRAND TOTAL</strong></td>														
														<td colspan="1" align=right><strong>Rp. 
														<?php 															
															$grandsell = $subtotalsell - $feeselltotal;														
															echo number_format($grandsell, 2, ',', '.'); ?></strong>
														</td>														
														<td>&nbsp;</td>													
													</tr>												
												</table>											
											</div>										
										</td>									
									</tr>									
									<tr style='background-color:#eeeeee; font-weight:bold;'>										
										<td>ORDER ADDITIONAL INFO</td>									
									</tr>									
									<tr>										
										<td>											
											<table border=0 width=100% >												
												<tr>													
													<td width=150px>Email Pengiriman</td>													
													<td><?php echo $getsingle->client_email; ?></td>
												</tr>												
												<tr>													
													<td width=150px>TYPE</td>													
													<td>														
														<?php															
														if($grandbuy > $grandsell) {																
														echo '<font color="green"><strong>NETT BUY</strong></font>';															
														} else {																
														echo '<font color="red"><strong>NETT SELL</strong></font>';															
														}														
														?>													
													</td>												
												</tr>												
												<tr>													
													<td width=150px>Rekening</td>													
													<td>														
														<?php															
															if($grandbuy > $grandsell) {																
																echo '<font color="green"><strong>'.$getsingle->client_rekrdi.'</strong></font>';															
															} else {																
																echo '<font color="red"><strong>'.$getsingle->client_rekspv.'</strong></font>';															
															}														
														?>													
													</td>												
												</tr>											
											</table>										
										</td>									
									</tr>									
									<tr style='background-color:#eeeeee; font-weight:bold;'>										
										<td>SELISIH FEE</td>									
									</tr>									
									<tr>										
										<table border=0 width=100% >											
											<tr>												
												<th rowspan="2">Total Beli</th>												
												<th rowspan="2">Total Jual</th>												
												<th colspan="3">Fee General</th>												
												<th colspan="3">Fee Internal</th>												
												<th rowspan="2">Selisih</th>											
											</tr>											
											<tr>												
												<th>Beli <!--(<?php echo $getsingle->order_feebrokerbuy; ?>)--></th>												
												<th>Jual <!--(<?php echo $getsingle->order_feebrokersell; ?>)--></th>												
												<th>Total</th>												
												<th>Beli <!--(<?php echo $getsingle->order_feeclientbuy; ?>)--></th>												
												<th>Jual <!--(<?php echo $getsingle->order_feeclientsell; ?>)--></th>												
												<th>Total</th>											
											</tr>											
											<tr>												
												<td align=right><?php echo number_format($subtotalbuy, 2, ',', '.'); ?></td>												
												<td align=right><?php echo number_format($subtotalsell, 2, ',', '.'); ?></td>												
												<td align=right><?php echo number_format($feebuytotal, 2, ',', '.'); ?></td>												
												<td align=right><?php echo number_format($feeselltotal, 2, ',', '.'); ?></td>												
												<td align=right>													
													<?php 														
														$feegeneraltotal = $feebuytotal+ $feeselltotal;														
														echo number_format($feegeneraltotal, 2, ',', '.');													
													?>												
												</td>												
												<td align=right>													
													<?php														
														$feeinternalbuy = ($getsingle->client_feebuy * $subtotalbuy) / 100;														
														echo number_format($feeinternalbuy, 2, ',', '.');													
													?>												
												</td>												
												<td align=right>													
													<?php														
														$feeinternalsell = ($getsingle->client_feesell * $subtotalsell) / 100;														
														echo number_format($feeinternalsell, 2, ',', '.');													
													?>												
												</td>												
												<td align=right>													
													<?php 														
														$feeinternaltotal = $feeinternalbuy+ $feeinternalsell;														
														echo number_format($feeinternaltotal, 2, ',', '.');													
													?>												
												</td>												
												<td align=right>													
													<?php 														
														$selisih = $feegeneraltotal - $feeinternaltotal;														
														echo number_format($selisih, 2, ',', '.');													
													?>												
												</td>											
											</tr>										
										</table>										
									</tr>
									<!--<tr style='background-color:#eeeeee; font-weight:bold;'>
										<td>ORDER INFO</td>
									</tr>
									<tr>
										<td>
											<table border=0 width=100% >
												<tr>
													<td width=150px>Order Number</td>
													<td>SE-<?php echo date('Ymd', strtotime($getsingle->order_createdate)).'-'.$getsingle->id_order_record; ?></td>
												</tr>
												<tr>
													<td width=150px>Create Date</td>
													<td><?php echo date('d F Y H:i:s', strtotime($getsingle->order_createdate)); ?></td>
												</tr>
												<tr>
													<td width=150px>Process Date</td>
													<td><?php echo date('d F Y H:i:s', strtotime($getsingle->order_processdate)); ?></td>
												</tr>
												<tr>
													<td width=150px>Done Date</td>
													<td><?php echo date('d F Y H:i:s', strtotime($getsingle->order_donedate)); ?></td>
												</tr>
												<tr>
													<td width=150px valign=top>Status</td>
													<td><?php echo $getsingle->order_status; ?>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr style='background-color:#eeeeee; font-weight:bold;'>
										<td>Client</td>
									</tr>
									<tr>
										<td>
											<table border=0 width=100% >
												<tr>
													<td width=150px>Full Name</td>
													<td><?php echo $getsingle->client_title; ?></td>
												</tr>
												<tr>
													<td width=150px>Address</td>
													<td><?php echo  $getsingle->client_address; ?></td>
												</tr>
												<tr>
													<td width=150px>Phone</td>
													<td><?php echo  $getsingle->client_phone; ?></td>
												</tr>
												<tr>
													<td width=150px>Email</td>
													<td><?php echo  $getsingle->client_email; ?></td>
												</tr>
												<tr>
													<td width=150px>No. Rek (Buy)</td>
													<td><?php echo  $getsingle->client_rekrdi; ?></td>
												</tr>
												
												<tr>
													<td width=150px>No. Rek (Sell)</td>
													<td><?php echo  $getsingle->client_rekspv; ?></td>
												</tr>
												<tr>
													<td width=150px>Note</td>
													<td><?php echo  $getsingle->client_note; ?></td>
												</tr>
												<tr>
													<td width=150px>Category</td>
													<td><?php echo $getsingle->category_title; ?></td>
												</tr>
											</table>
										</td>
									</tr>
									
									<tr style='background-color:#eeeeee; font-weight:bold;'>
										<td>Broker</td>
									</tr>
									<tr>
										<td>
											<table border=0 width=100% >
												<tr>
													<td width=150px>Name</td>
													<td><?php echo  $getsingle->broker_title; ?></td>
												</tr>
												<tr>
													<td width=150px>Code</td>
													<td><?php echo  $getsingle->broker_code; ?></td>
												</tr>
												<tr>
													<td width=150px>Fee Net Buy</td>
													<td><?php echo  $getsingle->broker_fee1; ?></td>
												</tr>
												<tr>
													<td width=150px>Fee Net Sell</td>
													<td><?php echo  $getsingle->broker_fee2; ?></td>
												</tr>
											</table>
										</td>
									</tr>-->
									
									
								</table>
							</div>
							<div class="bbox-bottom" id="box-bottom1">
								<div class="bb-pagination">&nbsp;</div>
								<div class="bb-button">
									
									<a href="<?php echo base_url(); ?>order/showprint/<?php echo $getsingle->id_order_record; ?>" target="_blank"><button name="invoice" type="button">Print</button></a>
									<a href="<?php echo base_url(); ?>order/showpdf/<?php echo $getsingle->id_order_record; ?>" target="_blank"><button name="invoice" type="button">Show PDF</button></a>
									
								</div>
								<div class="clear"></div>
							</div>
						</div>
						
					</div> <!-- End of cr-bottom -->
<?php endforeach; ?>
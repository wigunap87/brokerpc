<?php foreach($show_order as $getsingle) : 
	
?>
					<style>
						.bbox-cont td {
							border-bottom: 0px;
							border-right: 0px;
						}
					</style>
					<div class="cr-bottom">
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">View Correction</div>
								<div class="bbxh-right">
									<div class="bbxhr-toogle"><a href="<?php echo base_url(); ?>order/showprint/<?php echo $getsingle->id_order_record; ?>" target="_blank">Print Correction</a></div>
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
														<th class="green">Lembar</th>
														<th class="green">Lot</th>
														<th class="green">Nominal</th>
														<th class="green">Information</th>
														<th class="green">Action</th>
													</tr>
													<?php 
													$nob = 1;
													$subtotal = 0;
													foreach($getorderbuy as $gob) : ?>
														<tr>
															<td align=center valign=top><?php echo $nob; ?></td>
															<td valign=top><?php echo $gob->saham_code; ?></td>
															<td valign=top><?php echo $gob->saham_title; ?></td>
															<td align=center valign=top><?php echo $gob->orderdet_countlot; ?></td>
															<td align=center valign=top><?php echo $gob->orderdet_lot; ?></td>
															<td valign=top>Rp. <?php echo number_format($gob->orderdet_count, 0, '.', '.'); ?></td>
															<td>
																1 Lot = 100<br/>
																<?php echo $gob->orderdet_createdate; ?>
															</td>
															<td align=center>
																<a href="<?php echo base_url(); ?>order/delete_orderdet/<?php echo $gob->id_orderdet_record; ?>" onClick="return confirm('Are you sure want to delete?');"><img src="<?php echo base_url(); ?>assets/images/cross.png" alt="Delete" title="Delete" width="13px"/></a>
															</td>
														</tr>
													<?php 
													$subtotal = $subtotal + $gob->orderdet_count;
													$nob++;
													endforeach; ?>
												</table>
											</div>
											
											<div class="order-detail">
												<h1 class="red">Sell</h1>
												<table border=0 width="100%">
													<tr>
														<th class="red">No</th>
														<th class="red">Code</th>
														<th class="red">Name</th>
														<th class="red">Lembar</th>
														<th class="red">Lot</th>
														<th class="red">Nominal</th>
														<th class="red">Information</th>
														<th class="red">Action</th>
													</tr>
													<?php 
													$nos = 1;
													$subtotalsell = 0;
													foreach($getordersell as $gos) : ?>
														<tr>
															<td align=center valign=top><?php echo $nos; ?></td>
															<td valign=top><?php echo $gos->saham_code; ?></td>
															<td valign=top><?php echo $gos->saham_title; ?></td>
															<td align=center valign=top><?php echo $gos->orderdet_countlot; ?></td>
															<td align=center valign=top><?php echo $gos->orderdet_lot; ?></td>
															<td valign=top>Rp. <?php echo number_format($gos->orderdet_count, 0, '.', '.'); ?></td>
															<td>
																1 Lot = 100<br/>
																<?php echo $gos->orderdet_createdate; ?>
															</td>
															<td align=center>
																<a href="<?php echo base_url(); ?>order/delete_orderdet/<?php echo $gos->id_orderdet_record; ?>" onClick="return confirm('Are you sure want to delete?');"><img src="<?php echo base_url(); ?>assets/images/cross.png" alt="Delete" title="Delete" width="13px"/></a>
															</td>
														</tr>
													<?php 
													$subtotalsell = $subtotalsell + $gos->orderdet_count;
													$nos++;
													endforeach; ?>
												</table>
											</div>
										</td>
									</tr>
									<tr style='background-color:#eeeeee; font-weight:bold;'>
										<td>Correction</td>
									</tr>
									<tr>
										<td>
											<div class="order-detail">
											<?php
											$rumusan = $subtotal - $subtotalsell;
											if(substr($rumusan, 0, 1) == '-') {
												echo '
													<h1 class="red">Net Sell</h1>
													Dikirim ke rekening '.$getsingle->client_rekspv.'<br/>';
											} else {
												echo '<h1 class="green">Net Buy</h2>
												Dikirim ke rekening '.$getsingle->client_rekrdi.'<br/>';
											}
											$grandtotal = substr($rumusan, 1)
											?>
											Sebesar Rp. <?php echo number_format($grandtotal, 0, '.', '.'); ?>
											</div>
										</td>
									</tr>
								</table>
							</div>
							
							<div class="bbox-bottom" id="box-bottom1">
								<div class="bb-pagination">&nbsp;</div>
								<div class="bb-button">
									<?php if($getsingle->order_status == 'New Order') { ?>
									<a href="<?php echo base_url(); ?>order/savestatus/<?php echo $getsingle->id_order_record; ?>"><button name="invoice" type="button">SAVE</button></a>
									<a href="<?php echo base_url(); ?>order/correction/<?php echo $getsingle->id_order_record; ?>"><button name="invoice" type="button">Correction</button></a>
									<a href="<?php echo base_url(); ?>order/vieworder/<?php echo $getsingle->id_order_record; ?>"><button name="invoice" type="button">Show Detail</button></a>
									<?php } else { ?>
									<a href="<?php echo base_url(); ?>order/showprint/<?php echo $getsingle->id_order_record; ?>" target="_blank"><button name="invoice" type="button">Print Correction</button></a>
									<a href="<?php echo base_url(); ?>order/showpdf/<?php echo $getsingle->id_order_record; ?>" target="_blank"><button name="invoice" type="button">Show PDF</button></a>
									<?php } ?>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						
					</div> <!-- End of cr-bottom -->
<?php endforeach; ?>
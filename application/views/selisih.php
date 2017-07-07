<style>
	.bbox-cont td {
		border-bottom: 0px;
		border-right: 0px;
	}
</style>
<div class="cr-bottom">
	<div class="crb-box" id="box-small1">
		<div class="bbox-head">
			<div class="bbxh-left">Selisih per Email - <?php echo $gemail; ?></div>
			<div class="bbxh-right">
				<!--<div class="bbxhr-toogle"><a href="<?php echo base_url(); ?>order/showprint/<?php echo $getsingle->id_order_record; ?>" target="_blank">Print Correction</a></div>
				<div class="bbxhr-toogle"><a href="<?php echo base_url(); ?>order/showpdf/<?php echo $getsingle->id_order_record; ?>" target="_blank">Show PDF</a></div>-->
									
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
					<table border=0 width=100% >											
						<tr>					
							<th rowspan="2">Date</th>
							<th rowspan="2">Total Beli</th>												
							<th rowspan="2">Total Jual</th>												
							<th colspan="3">Fee General</th>												
							<th colspan="3">Fee Internal</th>												
							<th rowspan="2">Selisih</th>											
						</tr>											
						<tr>												
							<th>Beli</th>												
							<th>Jual</th>												
							<th>Total</th>												
							<th>Beli</th>												
							<th>Jual</th>												
							<th>Total</th>											
						</tr>
						<?php 
						$no = 1;
						foreach($getorder as $getsingle) : 
							// Total Order Buy
							$getorderbuy = $this->Report_model->getdetail($getsingle->id_order_record, $type="Buy");
																		
							$subtotalbuy = 0;													
							foreach($getorderbuy as $gob) : 														
								$subtotalbuy = $subtotalbuy + $gob->orderdet_count;	
							endforeach;
							
							// Total Order Sell
							$getordersell = $this->Report_model->getdetail($getsingle->id_order_record, $type="Sell");
																		
							$subtotalsell = 0;													
							foreach($getordersell as $gos) : 														
								$subtotalsell = $subtotalsell + $gos->orderdet_count;	
							endforeach;
							
							// Fee buy Broker
							$feebuy = $getsingle->order_feebrokerbuy;															
							$feebuytotal = ($feebuy * $subtotalbuy) / 100;
							
							// Fee sell broker
							$feesell = $getsingle->order_feebrokersell;															
							$feeselltotal = ($feesell * $subtotalsell) / 100;
							
							
							// Nett Sell / Nett Buy
							if($subtotalbuy > $subtotalsell) {
								$bgcolor = '#e9fede'; 
							} else {
								$bgcolor = '#fedede';
							}
						?>
						<tr bgcolor="<?php echo $bgcolor; ?>">
							<td><?php echo $getsingle->order_createdate; ?></td>
							<td align=right><?php echo number_format($subtotalbuy, 2, ',', '.'); ?></td>												
							<td align=right><?php echo number_format($subtotalsell, 2, ',', '.'); ?></td>												
							<td align=right><?php echo number_format($feebuytotal, 2, ',', '.'); ?></td>												
							<td align=right><?php echo number_format($feeselltotal, 2, ',', '.'); ?></td>												
							<td align=right>													
								<?php 														
									$feegeneraltotal = $feebuytotal + $feeselltotal;														
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
									$feeinternaltotal = $feeinternalbuy + $feeinternalsell;														
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
						<?php endforeach; ?>
					</table>
				</tr>
			</table>
			
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
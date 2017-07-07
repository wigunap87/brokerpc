<style>
	.bbox-cont td {
		border-bottom: 0px;
		border-right: 0px;
	}
</style>
<div class="cr-bottom">
	<div class="crb-box" id="box-small1">
		<div class="bbox-head">
			<div class="bbxh-left">Selisih per Email - <?php echo $gemail.' From Date : '.$gstartdate.' to '.$genddate; ?></div>
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
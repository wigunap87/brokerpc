<html>
	<head>
		<title>Print Order</title>
		<style type="text/css">
			@page { margin: 20px; }
			body {
				font-family: "Verdana";
				padding:2px;
				font-size:12px;
			}
			#header { margin:0 0 10px 0;  -webkit-print-color-adjust: exact; }
			#content { margin:0; padding:0; }
			.content-top table { width:100%; font-size:11px; }
			.content-top table td { padding:0px; }
			
			.disclaimer { margin-top:10px; padding:10px; border:solid 1px #666666; }
			.clear { clear:both; }
			
			.showproduct table { width:100%; font-size:12px; }
			.showproduct table td { padding:2px; border:solid 1px #dedede; }
			.showproduct table th { background:#cccccc; border:solid 1px #dedede; padding-top:5px; padding-bottom:5px;}
			
			.ordersnote { margin:10px 0 0 0; }
		</style>
	</head>
	<body>
<?php foreach($show_order as $vp) :
		
?>
	<div id="header">
		<?php
			if($vp->broker_header != '') {
				if(file_exists("media/broker/".$vp->broker_header."")) {
					echo '<img src="./media/broker/'.$vp->broker_header.'" width="100%" />';
				}
			}
		?>
	</div>
	
	<div id="content">
		<div class="content-top">
			<table width="100%">
				<tr>
					<td valign=top>
						<div class="content-top-left">
							<table width="100%">
								<tr>
									<td valign=top width="125px">To</td>
									<td valign=top align=center width="10px">:</td>
									<td valign=top><?php echo $vp->client_title; ?></td>
								</tr>
								<tr>
									<td valign=top>Attention</td>
									<td valign=top align=center>:</td>
									<td valign=top><?php echo $vp->client_title; ?></td>
								</tr>
								<tr>
									<td valign=top>Address</td>
									<td valign=top align=center>:</td>
									<td valign=top><?php echo $vp->client_address; ?></td>
								</tr>
								<tr>
									<td valign=top>E-mail</td>
									<td valign=top align=center>:</td>
									<td valign=top><?php echo $vp->client_email; ?></td>
								</tr>
								<tr>
									<td valign=top>Phone</td>
									<td valign=top align=center>:</td>
									<td valign=top><?php echo $vp->client_phone; ?></td>
								</tr>
								<tr>
									<td valign=top>Fax</td>
									<td valign=top align=center>:</td>
									<td valign=top>-</td>
								</tr>
								<tr>
									<td valign=top>Saving Name</td>
									<td valign=top align=center>:</td>
									<td valign=top><?php echo $vp->client_title; ?></td>
								</tr>
								<tr>
									<td valign=top>Saving Bank Name</td>
									<td valign=top align=center>:</td>
									<td valign=top></td>
								</tr>
							</table>
						</div>
					</td>
					<td>
						<div class="content-top-right">
							<table width="100%">
								<tr>
									<td valign=top width="125px">Transaction Date</td>
									<td valign=top align=center width="10px">:</td>
									<td valign=top><?php echo date('D, F d, Y', strtotime($vp->order_createdate)); ?></td>
								</tr>
								<tr>
									<td valign=top>Currency</td>
									<td valign=top align=center>:</td>
									<td valign=top>IDR</td>
								</tr>
								<tr>
									<td valign=top>Client Code</td>
									<td valign=top align=center>:</td>
									<td valign=top></td>
								</tr>
								<tr>
									<td valign=top>SID</td>
									<td valign=top align=center>:</td>
									<td valign=top></td>
								</tr>
								<tr>
									<td valign=top>Minimum Fee</td>
									<td valign=top align=center>:</td>
									<td valign=top></td>
								</tr>
								<tr>
									<td valign=top>Office</td>
									<td valign=top align=center>:</td>
									<td valign=top></td>
								</tr>
								<tr>
									<td valign=top>Sales Person</td>
									<td valign=top align=center>:</td>
									<td valign=top><?php echo $vp->client_salesperson; ?></td>
								</tr>
								<tr>
									<td valign=top>Settlement</td>
									<td valign=top align=center>:</td>
									<td valign=top></td>
								</tr>
								<tr>
									<td valign=top>Category</td>
									<td valign=top align=center>:</td>
									<td valign=top></td>
								</tr>
							</table>
						</div>
					</td>
				</tr>
			</table>
		</div>
		
		<div class="showproduct">
			This is to confirm that we have BOUGHT and SOLD for your account : <br/>
			<table>
				<thead>
					<tr>
						<th>B/J</th>
						<th>Pasar</th>
						<th>Kode Efek</th>
						<th>Nama Perusahaan</th>
						<th>Harga</th>
						<th>Jumlah (?lot or..)</th>
						<th>Nilai Transaksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$subtotal = 0;
					foreach($getorderbuy as $gob) : ?>
					<tr>
						<td valign=top>
							<strong>
							<?php 
								if($gob->orderdet_type == 'Buy') {
									echo 'BELI'; 
								} else {
									echo 'JUAL';
								}
							?>
							</strong>
						</td>
						<td valign=top align=center>
							RG
						</td>
						<td valign=top align=center>
							<?php echo '<strong>'.$gob->saham_code.'</strong>'; ?>
						</td>
						<td valign=top align=left>
							<?php echo '<strong>'.$gob->saham_title.'</strong>'; ?>
						</td>
						<td valign=top align=right>
							<?php echo number_format($gob->orderdet_price, 2, '.', ','); ?>
						</td>
						<td valign=top align=right>
							<?php echo number_format($gob->orderdet_countlot, 2, '.', ','); ?>
						</td>
						<td valign=top align=right>
							<?php echo '('.number_format($gob->orderdet_count, 2, '.', ',').')'; ?>
						</td>
					</tr>
					<?php 
					$subtotal = $subtotal + $gob->orderdet_count;
					endforeach; ?>
					
					<?php 
					$subtotalsell = 0;
					foreach($getordersell as $gos) : ?>
					<tr>
						<td valign=top>
							<strong>
							<?php 
								if($gos->orderdet_type == 'Buy') {
									echo 'BELI'; 
								} else {
									echo 'JUAL';
								}
							?>
							</strong>
						</td>
						<td valign=top align=center>
							RG
						</td>
						<td valign=top align=center>
							<?php echo '<strong>'.$gos->saham_code.'</strong>'; ?>
						</td>
						<td valign=top align=left>
							<?php echo '<strong>'.$gos->saham_title.'</strong>'; ?>
						</td>
						<td valign=top align=right>
							<?php echo number_format($gos->orderdet_price, 2, '.', ','); ?>
						</td>
						<td valign=top align=right>
							<?php echo number_format($gos->orderdet_countlot, 2, '.', ','); ?>
						</td>
						<td valign=top align=right>
							<?php echo number_format($gos->orderdet_count, 2, '.', ','); ?>
						</td>
						
					</tr>
					<?php 
					$subtotalsell = $subtotalsell + $gos->orderdet_count;
					endforeach; ?>
					
					<?php
						// Rumusan 
						$rumusan = $subtotal - $subtotalsell;
						if($subtotal > $subtotalsell) {
							$grosstotal = $subtotal - $subtotalsell;
						} else {
							$grosstotal = $subtotalsell - $subtotal;
						}
						
						// Fee Buy 
						$feebuy = ceil(( $vp->broker_fee1 * $subtotal ) / 100);
						
						// Fee Sell 
						$feesell = ceil(( $vp->broker_fee2 * $subtotalsell ) / 100);
						
						// PPN
						$ppn = (10 * $grosstotal) / 100;
					?>
					<tr>
						<td colspan="7">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="6" align=right>Total Transaksi BELI</td>
						<td align=right><?php echo '('.number_format($subtotal, 2, '.', ',').')'; ?></td>
					</tr>
					<tr>
						<td colspan="6" align=right>Total Transaksi JUAL</td>
						<td align=right><?php echo number_format($subtotalsell, 2, '.', ','); ?></td>
						
					</tr>
					<tr>
						<td colspan="6" align=right>Total Nilai Transaksi</td>
						<td align=right style="border-bottom:solid 2px #000000;">
							<?php 
								if($subtotal > $subtotalsell) {
									echo '('.number_format($grosstotal, 2, '.', ',').')'; 
								} else {
									echo number_format($grosstotal, 2, '.', ','); 
								}
							?>
						</td>
						
					</tr>
					<tr>
						<td colspan="6" align=right>Komisi Perantara Perdagangan Efek</td>
						<td align=right>&nbsp;</td>
						
					</tr>
					<tr>
						<td colspan="6" align=right>LEVY</td>
						<td align=right>&nbsp;</td>
						
					</tr>
					<tr>
						<td colspan="6" align=right>Sub Total</td>
						<td align=right>&nbsp;</td>
					</tr>
					<tr>
						<td colspan="6" align=right>PPN 10%</td>
						<td align=right>&nbsp;</td>
					</tr>
					<tr>
						<td colspan="6" align=right>KPEI</td>
						<td align=right>&nbsp;</td>
					</tr>
					<tr>
						<td colspan="6" align=right>Pajak Penjualan (0.10%)</td>
						<td align=right style="border-bottom:solid 2px #000000;">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="6" align=right>Total Pembebanan</td>
						<td align=right>&nbsp;</td>
					</tr>
					<tr>
						<td colspan="6" align=right><strong>Nilai Transaksi Bersih</strong></td>
						<td align=right>&nbsp;</td>
					</tr>
					<tr>
						<td colspan="6" align=right>Tanggal Pembayaran</td>
						<td align=right><strong>&nbsp;</strong></td>
					</tr>
					
				</tbody>
			</table>
		</div>
		
		<div class="ordersnote">
			Nilai transaksi bersih harus dibayar / diterima paling lambat tanggal (sebelum jam 15.00 wib) pada rekening Dana nasabah.
		</div>
		<?php if($vp->broker_disclaimer != '') { ?>
		<div class="disclaimer">
			<strong>Disclaimer:</strong><br/>
			<?php echo $vp->broker_disclaimer; ?>
		</div>
		<?php } ?>
	</div>
	
<?php endforeach; ?>
	</body>
</html>	
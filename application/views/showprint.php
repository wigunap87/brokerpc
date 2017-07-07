<html>
	<head>
		<title>Print Order</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" />
		<style type="text/css">
			body {
				font-family: "Verdana";
			}
			#header { margin:0; padding:10px; background: rgba(239,239,239,1.0) !important; -webkit-print-color-adjust: exact; }
			.logo {
				padding:0px 0 0 0;
				font-size:13px;
				font-weight:bold;
			}
			.logo font {
				font-size:10px;
				font-weight:normal;
			}
			.text { padding:0px 0 0 0; text-align:center;}
			.text h1 {
				font-size:25px;
				margin:0;
				padding:0;
			}
			.addressinv { text-align:right; padding:0 0px 0 0; font-size:13px; line-height:12px;}
			#content {
				margin:0;
				padding:10px 20px 0px 20px;
				
			}
			#content h3 {
				font-size:12px;
				margin:0;
				padding:0;
				line-height:15px;
				font-weight:bold;
			}
			
			#content h1 {
				font-size:13px;
				margin:0;
				padding:0;
				line-height:14px;
				font-weight:normal;
			}
			#content table { font-size:10px; margin:0 0 5px 0;}
			#content table td { padding:5px; }
			
			.showproduct {
				padding:20px;
				background: rgba(248,248,248,1.0);
				margin:10px 0 0 0;
			}
			
			.ordersnote { font-size:14px; /*margin-top:50px;*/ margin-top:10px; margin-left:Auto; margin-right:Auto; width:450px;}
			.ordersnote h2 { /*background: rgba(245,245,245,1.0) !important;*/ -webkit-print-color-adjust: exact; padding:5px 0 5px 0; margin:0 0 5px 0; text-align:center; font-size:13px; font-weight:normal;}
			.ttd { /*background: rgba(245,245,245,1.0) !important;*/ height:35px; -webkit-print-color-adjust: exact;}
			.ordersnote p { margin:0; padding:0; }
			#footer {
				text-align:center;
				padding:5px 0 5px 0;
				margin:0 10px 0 10px;
				border-top:solid 1px #cccccc;
			}
			.approved {
				font-size:11px;
				text-align:right;
				padding:5px 0 5px 5px;
			}
			.address { font-size:12px; line-height:12px;}
			.internalnote {
				padding:5px;
				border:solid 1px #cccccc;
				font-size:10px;
			}			.cuthere {
				margin:3px 10px 3px 10px;
				border-bottom: dashed 1px #cccccc;
				text-align:right;
				padding:5px 0 5px 0;
				font-size:11px;
				color:#cccccc;
			}
			.c-title {
				text-align:center;
				font-size:18px;
				margin-top:10px;
			}
			h1.green { 
				margin: 0 0 10px 0;
				font-size: 15px;
				color: #009d12;
				text-transform: uppercase;
				font-weight: bold;
				padding: 0 0 5px 0; 
			}
			h1.red {
				margin: 0 0 10px 0;
				font-size: 15px;
				color: #9d0000;
				text-transform: uppercase;
				font-weight: bold;
				padding: 0 0 5px 0;
			}
			.green { 
				color: #009d12;
			}
			.red {
				color: #9d0000;
			}
		</style>
	</head>
	<body>
<?php foreach($show_order as $vp) :
		
?>
	<div id="header">
		<div class="container-fluid">
		<div class="row">
			<div class="col-xs-4 col-sm-4 col-md-4 logo">
				<img src="<?php echo base_url(); ?>assets/images/logo.png" />
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 text">
				<h1>PRINT ORDER</h1>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 addressinv">
				&nbsp;
			</div>			
			<div class="clearfix"></div>
		</div>
		</div>
	</div>
	
	<div id="content">
		<div class="container-fluid">
		<div class="row">
			<div class="col-xs-3 col-sm-3 col-md-3">
				<h3>Client</h3>
				<h1><?php echo $vp->client_title; ?></h1>
					
				<div class="address">
					<span><?php echo $vp->client_address; ?></span><br/>					
					P: <span><?php echo $vp->client_phone; ?> </span><br/>					
					E: <span><?php echo $vp->client_email; ?> </span><br/>
				</div>
			</div>
			<div class="col-xs-1 col-sm-1 col-md-1">&nbsp;</div>
			<div class="col-xs-3 col-sm-3 col-md-3">
				<h3>Broker</h3>
				<h1><?php echo  $vp->broker_code; ?></h1>
					
				<div class="address">
					<span><?php echo $vp->broker_title; ?></span>
				</div>
				
			</div>
			<div class="col-xs-1 col-sm-1 col-md-1">&nbsp;</div>
			<div class="col-xs-4 col-sm-4 col-md-4">
				<div class="address">
				Date : <?php echo date("d F Y", strtotime($vp->order_createdate)); ?><br/>
				#Order No. : <strong><font size="2">SE-<?php echo date("Ymd", strtotime($vp->order_createdate)).''.$vp->id_order_record; ?></font></strong><br/>
				
				</div>
			</div>			
			<div class="clearfix"></div>
		</div>
		</div>
		
		<div class="showproduct">
			<table class="table table-bordered" style="font-size:11px;">
				<thead>
					<tr>
						<th>Stocks</th>
						<th>Type</th>
						<th>Lot</th>
						<th>Shares</th>
						<th>Price</th>
						
					</tr>
				</thead>
				<tbody>
					<?php 
					$subtotal = 0;
					foreach($getorderbuy as $gob) : ?>
					<tr>
						<td valign=top>
							<?php echo '<strong>'.$gob->saham_code.'</strong><br/>'.$gob->saham_title; ?>
						</td>
						<td valign=top align=center>
							<h1 class="green">BUY</h1>
						</td>
						<td valign=top align=right>
							<?php echo $gob->orderdet_lot; ?>
						</td>
						<td valign=top align=right>
							<?php echo $gob->orderdet_countlot; ?>
						</td>
						<td valign=top align=right>
							<?php echo number_format($gob->orderdet_count, 0, '.', '.'); ?>
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
							<?php echo '<strong>'.$gos->saham_code.'</strong><br/>'.$gos->saham_title; ?>
						</td>
						<td valign=top align=center>
							<h1 class="red">SELL</h1>
						</td>
						<td valign=top align=right>
							<?php echo $gos->orderdet_lot; ?>
						</td>
						<td valign=top align=right>
							<?php echo $gos->orderdet_countlot; ?>
						</td>
						<td valign=top align=right>
							<?php echo number_format($gos->orderdet_count, 0, '.', '.'); ?>
						</td>
						
					</tr>
					<?php 
					$subtotalsell = $subtotalsell + $gos->orderdet_count;
					endforeach; ?>
					
					<?php
						// Rumusan 
						$rumusan = $subtotal - $subtotalsell;
						$grosstotal = $subtotal + $subtotalsell;
						
						// Fee Buy 
						$feebuy = ceil(( $vp->broker_fee1 * $subtotal ) / 100);
						
						// Fee Sell 
						$feesell = ceil(( $vp->broker_fee2 * $subtotalsell ) / 100);
						
						// PPN
						$ppn = (10 * $grosstotal) / 100;
					?>
					<tr>
						<td colspan="5"><?php echo number_format($subtotal, 0, '.', '.'); ?></td>
					</tr>
					<tr>
						<td colspan="4" align=right>Gross Total</td>
						<td align=right><?php echo number_format($grosstotal, 0, '.', '.'); ?></td>
					</tr>
					<tr>
						<td colspan="4" align=right>Fee-1</td>
						<td align=right><?php echo number_format($feebuy, 0, '.', '.'); ?></td>
					</tr>
					<tr>
						<td colspan="4" align=right>Fee-2</td>
						<td align=right><?php echo number_format($feesell, 0, '.', '.'); ?></td>
					</tr>
					<?php
					if(substr($rumusan, 0, 1) == '-') {
						echo '<tr>
							<td colspan="4" align=right>PPN</td>
							<td align=right>'.number_format($ppn, 0, '.', '.').'</td>
						</tr>';
						$grandtotal = $grosstotal + $feebuy + $feesell + $ppn;
						$classess = 'red';
					} else {
						$grandtotal = $grosstotal + $feebuy + $feesell;
						$classess = 'green';
					}
					?>
					<tr>
						<td colspan="4" align=right><strong>TOTAL COST</strong></td>
						<td align=right><div class="<?php echo $classess; ?>"><strong>IDR <?php echo number_format($grandtotal, 0, '.', '.'); ?></strong></div></td>
					</tr>
					<tr>
						<td colspan="5" align=center>
							<div class="<?php echo $classess; ?>">
							<strong><i>Terbilang : 
								<?php
									function Terbilang($x) {
										$abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
											if ($x < 12)
												return " " . $abil[$x];
											elseif ($x < 20)
												return Terbilang($x - 10) . " belas";
											elseif ($x < 100)
												return Terbilang($x / 10) . " puluh" . Terbilang($x % 10);
											elseif ($x < 200)
												return " seratus" . Terbilang($x - 100);
											elseif ($x < 1000)
												return Terbilang($x / 100) . " ratus" . Terbilang($x % 100);
											elseif ($x < 2000)
												return " seribu" . Terbilang($x - 1000);
											elseif ($x < 1000000)
												return Terbilang($x / 1000) . " ribu" . Terbilang($x % 1000);
											elseif ($x < 1000000000)
												return Terbilang($x / 1000000) . " juta" . Terbilang($x % 1000000);
									}
									
									echo ucwords(Terbilang($grandtotal)).' Rupiah';
								?>
							</i></strong>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<div class="ordersnote">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<h2>Testing</h2>
						<div class="ttd">&nbsp;</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<h2>Approve By</h2>
						<div class="ttd">&nbsp;</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="footer">
		Copyright &copy; 2017. Pratama Development
	</div>
<?php endforeach; ?>
	</body>
</html>	
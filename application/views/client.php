<div class="cr-bottom">
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">Client</div>
								<div class="bbxh-right">
									<div class="bbxhr-toogle"><a href="<?php echo base_url(); ?>client/addclient"><img src="<?php echo base_url(); ?>assets/images/add.png" /></a></div>
									<div class="bbxhr-toogle"><a href="#" id="button-tootle1"><img src="<?php echo base_url(); ?>assets/images/toogle.png" /></a></div>
									<div class="bbxhr-close"><a href="#" id="button-close1"><img src="<?php echo base_url(); ?>assets/images/close.png" /></a></div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div> 
							<div class="bbox-cont" id="box-cont1">
								
								<table cellpadding="0" cellspacing="0" >
									<tr>
										<th>No</th>
										<th>Title</th>
										<th>Address</th>
										<th>Phone</th>
										<th>Email</th>
										<th>Rek. Buy</th>
										<th>Rek. Sell</th>
										<th>Fee Buy</th>
										<th>Fee Sell</th>
										<th>Status</th>
										<th class="lastTH">Actions</th>
									</tr>
									<?php 
										foreach($showclient as $wv) :
											
									?>
									<?php if($no % 2 == 0) { ?>
										<tr style="background-color:#ffffff;">
									<?php } else { ?>
										<tr style="background-color:#fafafa;">
									<?php } ?>
										<td valign=top align=center><?php echo $no; ?></td>
										<td valign=top>
											<?php echo $wv->client_title; ?>
										</td>
										<td valign=top>
											<?php echo $wv->client_address; ?>
										</td>
										<td valign=top>
											<?php echo $wv->client_phone; ?>
										</td>
										<td valign=top>
											<?php echo $wv->client_email; ?>
										</td>
										<td valign=top>
											<?php echo $wv->client_rekrdi.'<br/>'.$wv->client_bankname1; ?>
										</td>
										<td valign=top>
											<?php echo $wv->client_rekspv.'<br/>'.$wv->client_bankname2; ?>
										</td>
										<td valign=top align=center>
											<?php echo $wv->client_feebuy; ?>
										</td>
										<td valign=top align=center>
											<?php echo $wv->client_feesell; ?>
										</td>
										<td valign=top align=center>
											<a href="<?php echo base_url(); ?>client/updateclient/<?php echo $wv->id_client_record; ?>">
												<?php echo $wv->client_status; ?>
											</a>
										</td>
										<td valign=top align=center class="lastTD">
											<a href="<?php echo base_url(); ?>client/editclient/<?php echo $wv->id_client_record; ?>"><img src="<?php echo base_url(); ?>assets/images/pencil.png" alt="Edit" title="Edit" width="13px"/></a>
											<a href="<?php echo base_url(); ?>client/deleteclient/<?php echo $wv->id_client_record; ?>" onClick="return confirm('Are you sure want to delete <?php echo $wv->client_title; ?>?');"><img src="<?php echo base_url(); ?>assets/images/cross.png" alt="Delete" title="Delete" width="13px"/></a>
										</td>
									</tr>
									<?php $no++; endforeach; ?>
									
								</table>
							</div>
							
							<div class="bbox-bottom" id="box-bottom1">
								<div class="bb-pagination">&nbsp;</div>
								<div class="bb-button">
									<a href="<?php echo base_url(); ?>client/addclient"><input type="button" name="show-all" value="Tambah Client" /></a>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						
					</div> <!-- End of cr-bottom -->

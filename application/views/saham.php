<div class="cr-bottom">
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">Saham</div>
								<div class="bbxh-right">
									<div class="bbxhr-toogle"><a href="<?php echo base_url(); ?>saham/addsaham"><img src="<?php echo base_url(); ?>assets/images/add.png" /></a></div>
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
										<th>Code</th>
										<th>Status</th>
										<th class="lastTH">Actions</th>
									</tr>
									<?php 
										foreach($showsaham as $wv) :
											
									?>
									<?php if($no % 2 == 0) { ?>
										<tr style="background-color:#ffffff;">
									<?php } else { ?>
										<tr style="background-color:#fafafa;">
									<?php } ?>
										<td valign=top align=center><?php echo $no; ?></td>
										<td valign=top>
											<?php echo $wv->saham_title; ?>
										</td>
										<td valign=top>
											<?php echo $wv->saham_code; ?>
										</td>
										<td valign=top align=center>
											<a href="<?php echo base_url(); ?>saham/updatesaham/<?php echo $wv->id_saham_record; ?>">
												<?php echo $wv->saham_status; ?>
											</a>
										</td>
										<td valign=top align=center class="lastTD">
											<a href="<?php echo base_url(); ?>saham/editsaham/<?php echo $wv->id_saham_record; ?>"><img src="<?php echo base_url(); ?>assets/images/pencil.png" alt="Edit" title="Edit" width="13px"/></a>
											<a href="<?php echo base_url(); ?>saham/deletesaham/<?php echo $wv->id_saham_record; ?>" onClick="return confirm('Are you sure want to delete <?php echo $wv->saham_title; ?>?');"><img src="<?php echo base_url(); ?>assets/images/cross.png" alt="Delete" title="Delete" width="13px"/></a>
										</td>
									</tr>
									<?php $no++; endforeach; ?>
									
								</table>
							</div>
							
							<div class="bbox-bottom" id="box-bottom1">
								<div class="bb-pagination">&nbsp;</div>
								<div class="bb-button">
									<a href="<?php echo base_url(); ?>saham/addsaham"><input type="button" name="show-all" value="Tambah Saham" /></a>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						
					</div> <!-- End of cr-bottom -->

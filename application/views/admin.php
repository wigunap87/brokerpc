<div class="cr-bottom">
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">Manage Administrator</div>
								<div class="bbxh-right">
									<div class="bbxhr-toogle"><a href="<?php echo base_url(); ?>admin/addadmin"><img src="<?php echo base_url(); ?>assets/images/add.png" /></a></div>
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
										<th>Fullname</th>
										<th>Phone</th>
										<th>Address</th>
										<th>Position</th>
										<th>Email</th>
										<th>Permission</th>
										<th>Active</th>
										<th class="lastTH">Actions</th>
									</tr>
									<?php 
										foreach($getadmin as $wv) :
											
									?>
									<?php if($no % 2 == 0) { ?>
										<tr style="background-color:#ffffff;">
									<?php } else { ?>
										<tr style="background-color:#fafafa;">
									<?php } ?>
										<td valign=top align=center><?php echo $no; ?></td>
										<td valign=top>
											<?php echo $wv->admin_fullname; ?>
										</td>
										<td valign=top>
											<?php echo $wv->admin_phone; ?>
										</td>
										<td valign=top>
											<?php echo $wv->admin_address; ?>
										</td>
										<td valign=top>
											<?php echo $wv->admin_position; ?>
										</td>
										<td valign=top>
											<?php echo $wv->admin_email; ?>
										</td>
										<td valign=top align=center>
											<?php echo $wv->admin_permission; ?>
										</td>
										<td valign=top align=center>
											<a href="<?php echo base_url(); ?>admin/update_admin/<?php echo $wv->id_admin_record; ?>">
												<?php echo $wv->admin_status; ?>
											</a>
										</td>
										<td valign=top align=center class="lastTD">
											<a href="<?php echo base_url(); ?>admin/editadmin/<?php echo $wv->id_admin_record; ?>"><img src="<?php echo base_url(); ?>assets/images/pencil.png" alt="Edit" title="Edit" width="13px"/></a>
											<a href="<?php echo base_url(); ?>admin/deleteadmin/<?php echo $wv->id_admin_record; ?>" onClick="return confirm('Are you sure want to delete <?php echo $wv->admin_fullname; ?>?');"><img src="<?php echo base_url(); ?>assets/images/cross.png" alt="Delete" title="Delete" width="13px"/></a>
										</td>
									</tr>
									<?php $no++; endforeach; ?>
									
								</table>
							</div>
							
							<div class="bbox-bottom" id="box-bottom1">
								<div class="bb-pagination"><?php echo $paginator; ?></div>
								<div class="bb-button">
									<a href="<?php echo base_url(); ?>admin/addadmin"><input type="button" name="show-all" value="Add Admin" /></a>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						
					</div> <!-- End of cr-bottom -->

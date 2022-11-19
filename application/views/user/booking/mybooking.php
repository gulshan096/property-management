<style>
thead tr th , tbody tr td{
	font-size: 12px !important;
}
.right_sec{
	border: 1px solid #C58F2B;
	
}
.card-header{
	background-color: #C58F2B !important;
	color:#fff !important;
}
</style>
<div class="container padding-bottom-3x my-5 shadow">
	<div class="row p-5">
		<?php $this->load->view($left_menu); ?>
		
		<div class="col-lg-9  right_sec">
			<div class="padding-top-2x mt-2 hidden-lg-up">
				<div class="container-fluid ">
					<h5 class="text-success card-header">MY BOOKINGS</h5>
					<div class=" mt-5">
						<div class="card">
							<div class="card-body">
								<div style='clear:both;'>
									
								</div>
								<div class="table-responsive">
									<table id="example" class="table table-border" style="width:100%">
										<thead>
											<tr>
												<th>Property name</th>
												<th>Room no.</th>
												<th>Bed no.</th>
												<th>Status</th>
												<th>Invoice</th>
												<th>created on</th>
												<th>Action</th>
												
											</tr>
										</thead>
										<tbody>
											
											<?php
											
										foreach($mybooking as $booking)
										 {
											?>
											<tr>
												<td><?php echo $booking['pro_name']; ?></td>
												<td><?php echo $booking['room_no']; ?></td>
												<td><?php echo $booking['bed_no']; ?></td>
												<td>
													<?php
													// 2 - in process, 3 booking confirm, 4 booking cancel
													switch($booking['status'])
													{
													
													case 0:
													?>
													<a class="badge badge-info" href="#" >process</a>
													<?php
													break;
													case 1:
													?>
													<a class="badge badge-success" href="#" >success</a>
													<?php
													break;
													case 3:
													?>
													<a class="badge badge-danger" href="#" >failed</a>
													<?php
													break;
													
													}
													?>
												</td>
												<td>
													<a href="<?php echo base_url('user/front/booking/invoice/').$booking['booking_id']; ?>">
														<i class="fa fa-file" aria-hidden="true"></i>
													</a>
													
												</td>
												<td><?php echo date('d-m-Y',strtotime($booking['created_at'])); ?></td>
												<td><a class="badge badge-danger" href="#" >Cancel</a></td>
											</tr>
											<?php
											}
											?>
											
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
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
					<div class="card-header row">
				   <div class="col-lg-8 col-12">
				     <h4 class="text-white ">LEAVE LIST</h4>
				   </div>
				    <div class="col-lg-4 col-12 text-center">
					   <a class="bg-dark px-5 py-1 rounded-pill" href="<?php echo base_url('user/front/myrequest/leave');?>" >ADD NEW </a>
				   </div>
				     
					
				  </div>
					<div class=" mt-5">
						<div class="card">
							<div class="card-body">
								<div style='clear:both;'>
									
								</div>
								<div class="table-responsive">
									<table id="example" class="table table-border" style="width:100%">
										<thead>
											<tr>
												<th>Property</th>
												<th>Room no.</th>
												<th>Bed no.</th>
												<th>From date</th>
												<th>To date</th>
												<th>CheckIn date</th>
												<th>CheckIn Time</th>
												<th>Description</th>
												<th>Status</th>
												<th>Created </th>
												
												
											</tr>
										</thead>
										<tbody>
											
											<?php
											
										foreach($leave_list as $leave)
										 {
											?>
											<tr>
												<td><?php echo $leave['pro_name']; ?></td>
												<td><?php echo $leave['room_no']; ?></td>
												<td><?php echo $leave['bed_no']; ?></td>
												<td><?php echo date('d-m-Y',strtotime($leave['from_date'])); ?></td>
												<td><?php echo date('d-m-Y',strtotime($leave['to_date'])); ?></td>
												<td><?php echo date('d-m-Y',strtotime($leave['checkin_date'])); ?></td>
												<td><?php echo date('h:m:a',strtotime($leave['checkin_time'])); ?></td>
												<td><?php echo $leave['description']; ?></td>
												<td>
													<?php
													// 2 - in process, 3 booking confirm, 4 booking cancel
													switch($leave['status'])
													{
													
													case 0:
													?>
													<a class="badge badge-info" href="#" >Pending</a>
													<?php
													break;
													case 1:
													?>
													<a class="badge badge-success" href="#">Aproved</a>
													<?php
													break;
													case 2:
													?>
													<a class="badge badge-danger" href="#" >reject</a>
													<?php
													break;
													
													}
													?>
												</td>
												
												<td><?php echo date('d-m-Y',strtotime($leave['created_at'])); ?></td>
												
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
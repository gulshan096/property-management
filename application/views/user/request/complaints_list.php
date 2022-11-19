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
				     <h4 class="text-white ">COMPLAINTS LIST</h4>
				   </div>
				    <div class="col-lg-4 col-12 text-center">
					   <a class="bg-dark px-5 py-1 rounded-pill" href="<?php echo base_url('user/front/myrequest/complaints');?>" >ADD NEW </a>
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
												<th>Category</th>
												<th>Description</th>
												<th>Status</th>
												<th>Created </th>
												
												
											</tr>
										</thead>
										<tbody>
											
											<?php
											
										foreach($complaints_list as $complaints)
										 {
											?>
											<tr>
												<td><?php echo $complaints['pro_name']; ?></td>
												<td><?php echo $complaints['room_no']; ?></td>
												<td><?php echo $complaints['category']; ?></td>
												<td><?php echo $complaints['description']; ?></td>
												<td>
													<?php
													// 2 - in process, 3 booking confirm, 4 booking cancel
													switch($complaints['status'])
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
												
												<td><?php echo date('d-m-Y',strtotime($complaints['created_at'])); ?></td>
												
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
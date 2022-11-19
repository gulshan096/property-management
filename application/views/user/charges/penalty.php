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
					<h5 class="text-success card-header" >My Penalty Charges List</h5>
					<div class=" mt-5">
						<div class="card">
							<div class="card-body">
								<div style='clear:both;'>
									
								</div>
								<div class="table-responsive">
									<table id="example" class="table table-border text-center" style="width:100%">
										<thead>
											<tr class="text-center">
									
											    <th>S.No</th>
											    <th>Property</th>
												<th>Room No</th>
												<th>Bed No</th>
												<th>Charges</th>
												<th>Extra charge </th>
												<th>Bill date</th>
												<th>Due date</th>
												
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
										<?php
											$i = 0;
											
											foreach($list_penalty as $sing)
											{
												$i++;
												 
												?>
												<tr>
													<td><?php  echo $i; ?></td>
													<td><?php echo $sing['pro_name']; ?></td>
													<td><?php echo $sing['room_no']; ?></td>
													<td><?php echo $sing['bed_no']; ?></td>
													<td><?php echo $sing['charge']; ?></td>
													<td><?php echo $sing['additional_charge']; ?></td>
													<td><?php echo $sing['bill_date']; ?></td>
													<td><?php echo $sing['due_date']; ?></td>
													
													<td>
													     <?php 
														switch($sing['status'])
														{
														
														case 1:
														?>
														<a class="badge badge-info" href="#" >Pay Now</a>
														<?php
														break;
														case 2:
														?>
														<a class="badge badge-success" href="#" >Paid</a>
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

<?php 
if(isset($abc))
{
?>	
<script>
$(document).ready(function(){
	
	
	swal("Your OTP!", "Your OTP is <?php echo "otp";  ?>", "success");
	
});
</script>	
<?php
}	

?>

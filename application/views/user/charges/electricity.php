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
					<h5 class="text-success card-header" >Electricity Charges List</h5>
					<div class=" mt-5">
						<div class="card">
							<div class="card-body">
								<div style='clear:both;'>
									
								</div>
								<div class="table-responsive">
									<table id="example" class="table table-border " style="width:100%">
										<thead>
											<tr class="text-center">
											    <th>S.No</th>
											    <th>Room</th>
												<th>Bed no</th>
											    <th>Amount</th>
											    <th>Bill Date</th>
											    <th>Due Date</th>
											    <th>Status</th>
											    <th>Added on</th>
											    
											</tr>
										</thead>
										<tbody>
										  <?php
											$i = 0;
											foreach($list_electricity as $sing)
											{
											  $i++;
												?>
												<tr>
												    <td><?php echo $i;  ?> </td>
													<td><?php echo $sing['room_no'];  ?></td>
													<td><?php echo $sing['bed_no'];  ?></td>
													<td><?php echo $sing['bill_amount'];  ?></td>
													<td><?php echo date('d/m/Y', strtotime($sing['bill_date'])); ?></td>
													<td><?php echo date('d/m/Y', strtotime($sing['due_date'])); ?></td>
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
												
											         <td><?php echo date('d/m/Y', strtotime($sing['added'])); ?></td>
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

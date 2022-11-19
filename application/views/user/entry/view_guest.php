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
					<h5 class="text-success card-header" >MY GUESTS LIST</h5>
					<div class=" mt-5">
						<div class="card">
							<div class="card-body">
								<div style='clear:both;'>
									
								</div>
								<div class="table-responsive">
									<table id="example" class="table table-border text-center" style="width:100%">
										<thead>
											<tr class="text-center">
											    <th>Property name</th>
												<th>Guest name</th>
												<th>Mobile</th>
												<th>Visiting Date</th>
												<th>Status</th>
												<th>OTP</th>
												<th>Share OTP</th>
											</tr>
										</thead>
										<tbody>
											
											<?php
											
										foreach($guest_list as $myguest)
										 {
											?>
											<tr>
											    <td><?php echo $myguest['pro_name']; ?></td>
												<td><?php echo $myguest['guest_name']; ?></td>
												<td><?php echo $myguest['guest_mobile']; ?></td>
												<td><?php echo date('d-m-Y',strtotime($myguest['visiting_date'])); ?></td>
												<td>
													<?php
													// 2 - in process, 3 booking confirm, 4 booking cancel
													switch($myguest['status'])
													{
													
													case 0:
													?>
													<a class="badge badge-info" href="#" >process</a>
													<?php
													break;
													case 1:
													?>
													<a class="badge badge-success" href="#" >created</a>
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
												<td><?php echo $myguest['otp']; ?></td>
												<td>
												    <a class="text-success" target="_blank" href="<?php echo 'https://api.whatsapp.com/send?phone='.$myguest['guest_mobile'].'&text='.$myguest['otp'].'<br>'. 'This is your Check in and Check out OTP'; ?>">
												       <i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i>
												    </a>
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

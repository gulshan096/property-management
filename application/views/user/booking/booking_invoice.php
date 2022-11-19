<style>
			::placeholder{
				opacity:.4 !important;
			}
			
			#unitD{
			display:none;
			}
			
			.dropdown_filter > .select2-container {
		width: 100% !important;
		}
		
		@media (max-width:360px){
		
		.booking_top .left_sec {
		width:100%;
		}
		.booking_top .left_sec h2{
		font-size:20px;
		
		}
		.booking_top .right_sec a{
		position:absolute;
		left:0;
		top:95%;
		}
		
		}
		.booking_top .right_sec a{
		position:absolute;
		right:0;
		
		}
</style>
<style>
		#invoice{
			padding: 0px;
		}
		.invoice {
			position: relative;
			background-color: #FFF;
			min-height: 680px;
			padding: 5px
		}
		.invoice header {
			padding: 10px 0;
			margin-bottom: 20px;
			border-bottom: 1px solid #3989c6
		}
		.invoice .company-details {
			text-align: right
		}
		.invoice .company-details .name {
			margin-top: 0;
			margin-bottom: 0;
			color: #d51e4b;
		}
		.invoice .contacts {
			margin-bottom: 20px
		}
		.invoice .invoice-to {
			text-align: left
		}
		.invoice .invoice-to .to {
			margin-top: 0;
			margin-bottom: 0
		}
		.invoice .invoice-details {
			text-align: right
		}
		.invoice .invoice-details .invoice-id {
			margin-top: 0;
						color: #3989c6;
			color: #e16383;
		}
		.invoice main {
			padding-bottom: 50px
		}
		.invoice main .thanks {
			margin-top: -115px;
			font-size: 2em;
			margin-bottom: 50px
		}
		.invoice main .notices {
			padding-left: 6px;
			border-left: 6px solid #3989c6
		}
		.invoice main .notices .notice {
			font-size: 1.2em
		}
		.invoice table {
			width: 100%;
			border-collapse: collapse;
			border-spacing: 0;
			margin-bottom: 20px
		}
		.invoice table td,.invoice table th {
			padding: 15px;
			background: #eee;
			border-bottom: 1px solid #fff
		}
		.invoice table th {
			white-space: nowrap;
			font-weight: 400;
			font-size: 16px
		}
		.invoice table td h3 {
			margin: 0;
			font-weight: 400;
			color: #3989c6;
			font-size: 1.2em
		}
		.invoice table .qty,.invoice table .total,.invoice table .unit {
			text-align: right;
			font-size: 1.2em
		}
		.invoice table .no {
			color: #fff;
			font-size: 1.6em;
			background: #3989c6
		}
		.invoice table .unit {
			background: #ddd
		}
		.invoice table .total {
			background: #3989c6;
			color: #fff
		}
		.invoice table tbody tr:last-child td {
			border: none
		}
		.invoice table tfoot td {
			background: 0 0;
			border-bottom: none;
			white-space: nowrap;
			text-align: right;
			padding: 10px 20px;
			font-size: 1.2em;
			border-top: 1px solid #aaa
		}
		.invoice table tfoot tr:first-child td {
			border-top: none
		}
		.invoice table tfoot tr:last-child td {
			color: #3989c6;
			font-size: 1.4em;
			border-top: 1px solid #3989c6
		}
		.invoice table tfoot tr td:first-child {
			border: none
		}
		.invoice footer {
			width: 100%;
			text-align: center;
			color: #777;
			border-top: 1px solid #aaa;
			padding: 8px 0
		}
		@media  print {
			.invoice {
				font-size: 11px!important;
				overflow: hidden!important
			}
			.invoice footer {
				position: absolute;
				bottom: 10px;
				page-break-after: always
			}
			.invoice>div:last-child {
				page-break-before: always
			}
		}
		.carttable { margin-top:10px; width:auto !important; }
		.carttable td { padding:3px !important; padding-right:10px !important; }
		
		
		@media  print {
			.hidden-print { display:none; }
		}
		
		</style>
<div class="main-content">
	
	<div class="page-content container">
		<div class="container-fluid">
			<div class="row container">
				<div class="d-flex booking_top">
					<div class="left_sec">
						<h2 class="mb-0">
						Property/Room  Invoice</h2>
						<ol class="breadcrumb p-0 m-0 ">
							<li class="breadcrumb-item">
								<a href="https://tutoratti.com/dashboard">Dashboard</a>
							</li>
							<li class="breadcrumb-item active">Booking list </li>
							<li class="breadcrumb-item active">Invoice</li>
						</ol>
					</div>
					<div class="">
						<a href="" class="btn btn-primary">Go back</a>
					</div>
				</div>
			</div>
			<div style="" class="toolbar hidden-print">
				<div class="text-center">
					<button onclick="window.print();" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
					<button onclick="CreatePDFfromHTML();" class="btn btn-success exportpdf"><i class="fa fa-file-pdf-o"></i> PDF</button>
					
				</div>
				<hr>
			</div>
			<div class="container bodycontainer">
				<div id="invoice">
					<div class="invoice overflow-auto">
						<div style="min-width: 600px">
							<header>
								<div class="row">
									<div class="col">
										<a target="_blank" href="https://www.parekhtube.in">
											<img src="" data-holder-rendered="true" style="max-width:250px;" />
										</a>
								    </div>
									<div class="col company-details">
										<h4 class="name">
										POPCORN Property Management LLP
										</h4>
										<div>Opp. Meghana Bidi, Near Deshbandhu school, Station road, Raipur (CG) - 492009</div>
										<div>+91-771-2888288</div>
										<div><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4e272028210e3e2f3c2b25263a3b2c2b602720">[email&#160;protected]</a></div>
									</div>
								</div>
							</header>
							<main>
								<div class="row contacts">
									<div class="col invoice-to">
										<div class="text-gray-light">For:</div>
										<h2 class="to"></h2>
										
										<div class="address"><span>Address:</span> Raipur 492001</div>
										<div class="email"><i class='fa fa-envelope'></i> <a href="#"><span class="__cf_email__" data-cfemail=""></span></a></div>
										<div class="mobile"> <i class='fa fa-phone'></i></div>
										<!--<div class="transport"><b>Transporter: </b>Check </div>-->
									</div>
									<div class="col invoice-details">
										<h4 class="invoice-id"></h4>
										<div class="date">Order Confirmation on:</div>
									</div>
								</div>
								<div class='table-responsive'>
									<input type="hidden" name="newbuilty" value="newbuilty" />
									<h3>
									Booked Property/Room
									</h3>
									<table class="table table-striped table-bordered view_order">
										<thead>
											<tr>
												<th>
													<b>Property Name</b>
												</th>
												<th>
													<b>Room No.</b>
												</th>
												<th>
													<b>Amount /month</b>
												</th>
												
												<th>
													<b>JOin Date</b>
												</th>
												<th>
													<b>Leave Date</b>
												</th>
												<th>
													<b>Total Months</b>
												</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
												</td>
												<td>
													
												</td>
												<td>
													
												</td>
												<td>
													
												</td>
												<td>
													
												</td>
												<td>
													
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<table border="0" cellspacing="0" cellpadding="0">
									<thead>
										<tr>
											<th class="text-left">Title</th>
											<th class="text-right">Rate</th>
											<th class="text-right">GST</th>
											<th class="text-right" colspan="2">Cash Discount</th>
											<!--<th class="text-right"></th>-->
											<th class="text-right">Total</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="text-left">
												<h3>
												<a></a>
												</h3>
												
											</td>
											<td class="unit">
												
											</td>
											<td class="unit">
											<br />(18%) </td>
											<td class="unit" colspan="2">
											<br />(5%) </td>
											<!--<td class="qty">-->
											<!--</td>-->
											<td class="total"> ₹ </td>
										</tr>
									</tbody>
									<tfoot>
									<tr>
										<td colspan="3"></td>
										<td colspan="2"></td>
										<td>
										<small style='display: block; font-size: 50%; text-transform: capitalize;'>two thousand four hundred and thirty five Rupees .six one Paise</small> </td>
									</tr>
									
									<tr>
										<td colspan="3"></td>
										<td colspan="2">GRAND TOTAL</td>
										<td>
										<small style='display: block; font-size: 50%; text-transform: capitalize;'>three thousand one hundred and thirty one Rupees .two Paise</small> </td>
									</tr>
									</tfoot>
								</table>
								<div class="thanks">Thank you!</div>
								
								<div class="notices">
									<div>Note:</div>
									<div class="notice">
										You can view our Term & Condition on <a target="_BLANK" href="">https://demo3.sjainventures.com/popcorn-stay</a>
									</div>
								</div>
							</main>
							<footer>
								Order Confirmation was created on a computer on 06 Jun, 2022 01:31 PM.
							</footer>
						</div>
						<div></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>
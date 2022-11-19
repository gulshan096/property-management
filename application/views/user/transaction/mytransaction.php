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
                
            </div>
            
            <div class="container-fluid ">
                <h5 class="text-success card-header">MY TRANSACTION</h5>
                <div class=" mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div style='clear:both;'>
                                
                            </div>
                            <div class="table-responsive">
                                <table id="example" class="table table-border" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Transaction id</th>
                                            <th>Order_id</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Invoice</th>
                                            <th>Transaction on</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                        foreach($transaction as $tran)
                                        {
                                        ?>
                                        <tr>
                                            <td><?php echo $tran['transaction_id'];?></td>
                                            <td><?php echo $tran['order_id'];?></td>
                                            <td><?php echo $tran['payment_amount']." "."Rs";?></td>
                                            
                                            <td>
                                                <?php
                                                // 2 - in process, 3 booking confirm, 4 booking cancel
                                                switch($tran['status'])
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
                                                <a href="<?php echo base_url('user/front/booking/invoice/').$tran['booking_id']; ?>">
                                                    <i class="fa fa-file" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                            
                                            
                                            <td><?php echo date('d-m-Y',strtotime($tran['created_at'])); ?></td>
                                            
                                            
                                            
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
<?php
echo $this->session->flashdata('email_sent');

?>


<form method="post" action="<?php echo base_url('administrator/Banner/sendMail'); ?>">
<input type="text" name="name" placeholder="name"><br><br>
<input type="email" name="email" placeholder="email"><br><br>
<input type="phone" name="phone" placeholder="phone"><br><br>
<input type="submit" value="submit"><br><br>

</form>
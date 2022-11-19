
		<div class="ps-home ps-home--1">
			
			<div class="ps-home__content">
				
				<div class="container">
					<section class="ps-section--featured">
						<h3 class="ps-section__title">Search Property
						
							

								<?php
								      
								        
								
								         $get = $this->input->get();
										 $movefrom = $get['movefrom'];
										 $city = $get['city'];
										 $area = $get['area'];
										 $for = $get['for'];
										  if(isset($get))
								            {
											 foreach($get_sp as $property_loc){}
									         //{
												 
											  										 
                                              if(!empty($city) && !empty($area))	
                         
											  {
												?>
                                                  <small><?php  echo  $property_loc['loccity'].",".$property_loc['locarea'].",".$for.",".$movefrom." <a onclick='open_adv_search();' href='javascript:void(0);'><i class='fa fa-edit'></i></a> " ; ?></small>
                                               <?php												
											  }	
                                               elseif(!empty($city))
											  {
												?>
                                                  <small><?php  echo  $property_loc['loccity'].",".$for.",".$movefrom." <a onclick='open_adv_search();' href='javascript:void(0);'><i class='fa fa-edit'></i></a> " ; ?></small>
                                               <?php												
											  }
                                               elseif(empty($property))
											  {
												?>
                                                  <small><?php  echo  "No record found."." <a onclick='open_adv_search();' href='javascript:void(0);'><i class='fa fa-edit'></i></a> " ; ?></small>
                                               <?php												
											  }											  
											 //}
											} 
										 
									
										
								?>
							
						
						</h3>
						<div class="ps-section__content">
							<div class="row m-0">
							  <?php 

                                 if(!empty($get_sp) && isset($get_sp))
								 {
									foreach($get_sp as $property)
									{
									  ?>
								<div class="col-12 col-md-4 p-0">
									<div class="ps-section__product">
										<div class="ps-product ps-product--standard">
											<div class="ps-product__thumbnail">
												<figure class="ps-product__image"><img width="147" height="230" src="<?php echo base_url(""); ?><?php echo $property['pro_img']  ?>" alt="" /></figure>
												
											</div>
											<div class="ps-product__content text-center">
											    <div class="ps-product__desc_icon">
													<span><i class="fa fa-television"></i>TV</span>
													<span><i class="fa fa-wifi"></i>WiFi</span>
													<span><i class="fa fa-trash"></i>Cleaning</span>
													<span><i class="fa fa-gamepad"></i>Gaming</span>
												</div>
												<h5 class="ps-product__title text-uppercase"><?php echo $property['pro_name']  ?> ( <?php echo $property['loccity'];  ?> )</h5>
												<div class="ps-product__desc">
													<p class="text-danger">Only


													<?php  
													echo $left_room;    
													
													
													
													?> 
													room left on this property.
													</p>
												</div>
												<div class="ps-product__meta">
													<span class="ps-product__price ">Deluxe Room</span>
												</div>
												<div class="ps-product__desc">
													<p>Beded: <span>1 , 2 , 3 , 4</span></p>
												</div>
												<a href="<?php echo site_url('user/front/details/').$property["property_id"]; ?>" class="ps-product__more ">See availability</a>
											</div>
										</div>
									</div>
								</div>
								
								<?php	
									} 									
									
								 }
								 else               
							     { 
							     foreach($property_list as $property)
								 {
									 
								?>
								<div class="col-12 col-md-4 p-0">
									<div class="ps-section__product">
										<div class="ps-product ps-product--standard">
											<div class="ps-product__thumbnail">
												<figure class="ps-product__image"><img width="147" height="230" src="<?php echo base_url(""); ?><?php echo $property['pro_img']  ?>" alt="" /></figure>
												<div class="ps-product__badge">
													<div class="ps-badge ps-badge--sale">Unisex</div>
												</div>
											</div>
											<div class="ps-product__content">
												<h5 class="ps-product__title"><?php echo $property['pro_name']  ?> <span><?php echo $property['loccity'];  ?> </span></h5>
												
												<div class="ps-product__desc">
													<p>Beded: <span>1 , 2 , 3 , 4</span></p>
												</div>
												<div class="ps-product__desc">
													<p class="text-danger">Only <?php  echo $property['pro_total_room']    ?> room left on this property.</p>
												</div>
												
												<div class="ps-product__desc_icon">
													<span><i class="fa fa-television"></i>TV</span>
													<span><i class="fa fa-wifi"></i>WiFi</span>
													<span><i class="fa fa-trash"></i>Cleaning</span>
													<span><i class="fa fa-gamepad"></i>Gaming</span>
												</div>
												
												<a href="<?php echo site_url('user/front/details/').$property["property_id"]; ?>" class="ps-product__more">See availability</a>
											</div>
										</div>
									</div>
								</div>
								
								<?php
									 
								 }
								
								}								
							  
							  ?>
								
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
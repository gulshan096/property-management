<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Front extends CI_Controller
		{
			
			public function index()
				{
					$seo	=	array(); 
						$seo['title']		=	"Popcorn Stay - Stay Like It's Your Own"; 
						$seo['description']	=	"Flats, House, Rooms, Hostels, PGs, Furnished/Unfurnished Apartments for Rent across major Cities in India."; 
						
						$data	=	array(); 
							$data['seo']	=	$seo;
							
						$this->load->view('front/include/header.php',$data);
							$this->load->view('front/home.php',$data);
						$this->load->view('front/include/footer.php',$data);
						
				}
				
				
			public function mobile()
				{
					$seo	=	array(); 
						$seo['title']		=	"Popcorn Stay - Stay Like It's Your Own"; 
						$seo['description']	=	"Flats, House, Rooms, Hostels, PGs, Furnished/Unfurnished Apartments for Rent across major Cities in India."; 
						
						$data	=	array(); 
							$data['seo']	=	$seo;
							
						$this->load->view('front/include/header.php',$data);
							$this->load->view('front/mobilehome.php',$data);
						$this->load->view('front/include/footer.php',$data);
						
				}
				
			public function search()
				{
					$seo	=	array(); 
						$seo['title']		=	"Search Hostels"; 
						$seo['description']	=	"Flats, House, Rooms, Hostels, PGs, Furnished/Unfurnished Apartments for Rent across major Cities in India."; 
						
						$data	=	array(); 
							$data['seo']	=	$seo;
							
						$this->load->view('front/include/header.php',$data);
							$this->load->view('front/search.php',$data);
						$this->load->view('front/include/footer.php',$data);
						
				}
				
			public function details()
				{
					$seo	=	array(); 
						$seo['title']		=	"Lisbon House"; 
						$seo['description']	=	"Flats, House, Rooms, Hostels, PGs, Furnished/Unfurnished Apartments for Rent across major Cities in India."; 
						
						$data	=	array(); 
							$data['seo']	=	$seo;
							
						$this->load->view('front/include/header.php',$data);
							$this->load->view('front/details.php',$data);
						$this->load->view('front/include/footer.php',$data);
						
				}
				
			public function about_us()
				{
					$seo	=	array(); 
					
					$seo['title']		=	"About Us";
					$seo['description']	=	"Flats, House, Rooms, Hostels, PGs, Furnished/Unfurnished Apartments for Rent across major Cities in India.";
					
					$data	=	array(); 
					$data['seo']	=	$seo;
						
					$this->load->view('front/include/header.php',$data);
					$this->load->view('front/pages/about_us.php',$data);
					$this->load->view('front/include/footer.php',$data);
				}
			
			public function contact_us()
				{
					$seo	=	array(); 
					
					$seo['title']		=	"Contact Us";
					$seo['description']	=	"Flats, House, Rooms, Hostels, PGs, Furnished/Unfurnished Apartments for Rent across major Cities in India.";
					
					$data	=	array(); 
					$data['seo']	=	$seo;
						
					$this->load->view('front/include/header.php',$data);
					$this->load->view('front/pages/contact_us.php',$data);
					$this->load->view('front/include/footer.php',$data);
				}
			
			public function gallery()
				{
					$seo	=	array(); 
					
					$seo['title']		=	"Gallery";
					$seo['description']	=	"Flats, House, Rooms, Hostels, PGs, Furnished/Unfurnished Apartments for Rent across major Cities in India.";
					
					$data	=	array(); 
					$data['seo']	=	$seo;
						
					$this->load->view('front/include/header.php',$data);
					$this->load->view('front/pages/gallery.php',$data);
					$this->load->view('front/include/footer.php',$data);
				}
			
			public function house_rules()
				{
					$seo	=	array(); 
					
					$seo['title']		=	"House Rules";
					$seo['description']	=	"Flats, House, Rooms, Hostels, PGs, Furnished/Unfurnished Apartments for Rent across major Cities in India.";
					
					$data	=	array(); 
					$data['seo']	=	$seo;
						
					$this->load->view('front/include/header.php',$data);
					$this->load->view('front/pages/house_rules.php',$data);
					$this->load->view('front/include/footer.php',$data);
				}
			
			public function term_and_conditions()
				{
					$seo	=	array(); 
					
					$seo['title']		=	"Terms and Conditions"; 
					$seo['description']	=	"Flats, House, Rooms, Hostels, PGs, Furnished/Unfurnished Apartments for Rent across major Cities in India."; 
					
					$data	=	array(); 
					$data['seo']	=	$seo;
						
					$this->load->view('front/include/header.php',$data);
					$this->load->view('front/pages/term_and_conditions.php',$data);
					$this->load->view('front/include/footer.php',$data);
				}
	
		}

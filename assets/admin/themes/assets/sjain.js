
		
	function updatestatus(selector) 
		{	
		
		
			//alert($b);
			var t = $(selector).attr('t');
			var i = $(selector).attr('i');
			var v = $(selector).attr('v');
			var s = $(selector).attr('s');
				if(s==1)
					{
						s=0;
						$(selector).removeClass('btn-success');
						$(selector).addClass('btn-danger');
						$(selector).html('Inactive');
						$(selector).attr('s',s);
					} else {
						s=1;
						$(selector).addClass('btn-success');
						$(selector).removeClass('btn-danger');
						$(selector).html('Active');
						$(selector).attr('s',s);
					}
						$.ajax({
							type: "POST",
							async: true,
							url: baserelativepath+'administrator/updatestatus',
							data: {
								t:t,
								i:i,
								s:s,
								v:v
							},
							success: function(tempdata) 
								{
									$(".dologinres").html(tempdata); 
								}
						});
						return false;
		}
		
		
		
		
	function dologin()	
		{
			$(".dologinres").html("<center><img src='"+baserelativepath+"loader.gif' style='max-width:32px;margin:3px auto;' /></center>");
				
			var data = $(".dologinfrm").serializeArray();
			$.ajax({
				type: "POST",
				async: true,
				url: baserelativepath+'Authentication/dologin',
				data: data,
				success: function(tempdata) 
					{
						$(".dologinres").html(tempdata); 
					}
			});
			return false;
		}
		
		
		
		
		
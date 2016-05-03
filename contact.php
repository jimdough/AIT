<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en" >
	<!--<![endif]-->

	<head>
	  <title>AIT - Truck Driving School</title>
	  <?php include("inc/head.inc"); ?>
	  <META NAME="DESCRIPTION" CONTENT="Insert the description here.">
	</head>
	
	<body>
		<!-- Start: Wrapper -->
		<div class="wrapper">
			<!-- Start: Header -->
			<header id="header">
				<div class="row">
					<?php include("inc/nav.inc"); ?>
				</div>
			</header>
			<!-- End: Header -->

			<div class="row">
				<section class="editable small-12 large-8 column">
					<!-- starts: Google Maps --> 
					<div class="gmapfixed_block">
						<div id="googlemaps-container-top"></div>
						<div id="googlemaps" class="google-map google-map-full"></div>
						<div id="googlemaps-container-bottom"></div>
					</div> 
					<!-- end: Google Maps -->
				</section>
				<aside class="small-12 large-4 column">
					<div class="widget">
						<h4>Office Address</h4>
					 	<address> 
							<ul class="list-unstyled">
				                <li> <i class="icon-home"></i>Red & White Business, Inc. 775 Red building Ave, Suite B20 
									San Francisco, CA 94227 </li>
				                <li> <i class="icon-envelope-alt"></i><a href="mailto:youremail@example.com">youremail@example.com </a></li>
				                <li> <i class="icon-phone-sign"></i>1(222) 5x86 x97x </li> 
				            </ul>
						</address>
					</div>
					<div class="widget">
						<h4>Contact us</h4>
					  
							<form class="contactform">
				                <div class="item item-pair">
				                  <label for="FullName">Full Name
				                    <input type="text" name="FullName" id="FullName" class="cat_textbox" maxlength="255">
				                  </label>
				                  <label for="EmailAddress">Email Address
				                    <input type="text" name="EmailAddress" id="EmailAddress" class="cat_textbox" maxlength="255">
				                  </label>
				                </div>
				                <div class="item">
				                  <label for="Website">Website
				                    <input type="text" name="Website" id="Website" class="cat_textbox" maxlength="255">
				                  </label>
				                </div>
				                <div class="item">
				                  <label>Comments</label>
				                  <textarea cols="10" rows="4" class="cat_listbox"></textarea>
				                </div>
				                <div class="item">
				                  <input class="button small" type="submit" value="Submit" id="catwebformbutton">
				                </div>
				              </form> 
					</div>
					
				</aside>
			</div>
			 
			<?php include("inc/footer.inc"); ?>

		</div>
		<!-- End: Wrapper -->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script>
			window.jQuery || document.write('<script src="js/vendor/jquery.js"><\/script>')
		</script>
		<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
		<script src="js/vendor/jquery.gmap.min.js"></script>
		<script type="text/javascript">
			/* for Google map */

			$(window).load(function() {
				LoadGmaps();
			});

			/* Add Your Company Name latitude and  longitude here.
			 * for latitude and longitude please check http://itouchmap.com/latlong.html
			 *  */
			var latitude = "41.253032";
			var longitude = "-72.520752";
			var details = "Company Name - Brooklyn, NY, United States";

			function LoadGmaps() {
				var myLatlng = new google.maps.LatLng(latitude, longitude);
				var myOptions = {
					zoom : 8,
					scrollwheel : true,
					center : myLatlng,
					navigationControl : true,
					mapTypeId : google.maps.MapTypeId.ROADMAP
				}

				var map = new google.maps.Map(document.getElementById("googlemaps"), myOptions);
				var marker = new google.maps.Marker({
					position : myLatlng,
					map : map,
					icon : 'img/map_icon.png'
				});
				var infowindow = new google.maps.InfoWindow({
					content : details
				});
				google.maps.event.addListener(marker, "click", function() {
					infowindow.open(map, marker);

				});

			}

		</script>
<?php include("inc/footer-scripts.inc"); ?>
	</body>
</html>

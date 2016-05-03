<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->

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
		 		 <!-- Start: Services -->
		 	 	 <section class="editable small-12 large-8 column">
		 	 	 		<div id="services">
						<div class="title"><h3>Get a Brochure</h3></div>
						
						<p>Please fill out the form with your name and address and we will mail you a brochure. You can also download a copy of the brochure in PDF format once you fill out the form.</p> 
	
<form data-abide action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" id="brochureForm" method="POST">

<!-- Hidden Fields-->
<!-- Organization ID-->
<input type=hidden name="oid" value="00Dj0000000KHK4">
<!-- Parent Campaign ID-->
<input name="00Nj00000095OEC" type="hidden" value="701m0000000A3BCAA0" />  
<!-- Record ID-->
<input id="recordType" name="recordType" type="hidden" value="012j0000000mE55" />
<!--Return URL-->  		 
<input type="hidden" name="retURL" value="http://">
<!-- END Hidden Fields-->


<div class="row">
<div class="first_name column small-12 large-6">
	<label for="first_name">First Name
		<input name="first_name" required minlength="2" maxlength="80" type="text" id="first_name">
	</label>
</div>

<div class="last_name column small-12 large-6">
<label for="last_name">Last Name
<input  id="last_name" required minlength="2" maxlength="80" name="last_name" size="20" type="text" /></label>
</div>

</div>
<div class="row">

<div class="email column small-12 large-6">
<label for="email">Email
<input  id="email" required name="email" size="20" type="text" /></label>
</div>

<div class="phone column small-12 large-6">
<label for="phone">Phone
<input  id="phone"  name="phone" size="20" type="text" /></label>
</div>

</div>
<div class="row">

<div class="street column small-12 large-6">
<label for="street">Address
<input  id="street" maxlength="100" name="city" size="20" type="text" /></label>
</div>

<div class="city column small-12 large-6">
<label for="city">City
<input  id="city" maxlength="40" name="city" size="20" type="text" /></label>
</div>

</div>
<div class="row">
	
<div class="state column small-12 large-6">
<label for="state">State/Province
<input  id="state" maxlength="20" name="state" size="20" type="text" /></label>
</div>

<div class="zip column small-12 large-6">
<label for="zip">Zip
<input id="zip" required minlength="5" maxlength="20" name="zip" size="20" type="text" /></label>
</div>

</div>
<div class="row">
<div class="column small-12">
<input class="submit button success" type="submit" value="Submit">
</div>
</div>

</form>
						
		 	 	 </section>
		 	 	 <aside class="small-12 large-4 column ">
			 	 	 
			 	  <?php include("inc/right-locations.inc"); ?>
			 	  <?php include("inc/right-quicklinks.inc"); ?>
			 	 
		 	 	 </aside>
		  </div>	
	 	

 		 <?php include("inc/footer.inc"); ?>
 	</div>
	<!-- End: Wrapper -->

    <?php include("inc/footer-scripts.inc"); ?>
</body>
</html>

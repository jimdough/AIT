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
		 

		 <!-- Start:  Login Form-->
		<section class="row"  id="signup">
					 <div class="small-12 large-4 large-offset-2 column">
					 	<h3 class="aligncenter title">New Member Registration</h3> 
		 		  		<form action="/signin" method="post" class="form-stacked">
				            <fieldset>
				            <div class="clearfix">
				              <div class="input">
				                <input id="isignup_username" tabindex="5" name="username" type="text" placeholder="Username"  required=""  />
				             </div>
				            </div>
				             <div class="clearfix">
				              <div class="input">
				                <input id="isignup_email" tabindex="5" name="email" type="email" placeholder="email"  required=""  />
				             </div>
				            </div>
				            <div class="clearfix">
				              <div class="input">
				                <input id="isignup_password" tabindex="7" name="password" type="password" placeholder="Password"  required="" />
				              </div>
				            </div>
				            <div class="clearfix">
				              <div class="input">
				                <input id="isignup_conf_password" tabindex="7" name="confirmpassword" type="password" placeholder="Confirm Password"  required="" />
				              </div>
				            </div>
				            <div class="clearfix">
				              <div class="input">
				                <ul class="inputs-list list-unstyled">
				                  <li>
				                    <label>
				                    <input id="ch" tabindex="8" type="checkbox" name="remember" value="1" checked="checked" required="" />
				                    <span>I agree to something I will never read</span></label>
				                  </li>
				                </ul>
				              </div>
				            </div>
				            <div class="clearfix form-link">
				               <p class="reset">Recover your <a tabindex="4" href="forgot-password.html" title="Recover your username or password">username or password</a></p> 
				                 <p class="reset"> <a  href="login.html" title="Login"> Already have an account?  <strong>Sign In</strong></a></p> 
				              </div>      
				          <div class="actions">
				              <input tabindex="9" class="button" type="submit" value="Sign Up"> 
				            </div>
				            </fieldset>
          			</form> 
		 		  </div>
		 		  <div class="small-12 large-4 column left">
		 		  		<h3>Registrer Now !!!</h3>
		 		  		<p> Lorem ipsum dolor sit amet, conafs
	                        sectetur adipisicing elit, sed dofrt
	                        Eiusmod tempor.Dolor sit amet, conafs
	                        sectetur adipisicing elit.</p>
	                        
	                        <p> Morem ipsum dolor sit amet, conafs
	                        sectetur adipisicing elit, sed dofrt
	                        Eiusmod tempor.</p>
	                       
	                     <ul class="list-unstyled link-list">
	                     	<li><i class="icon-ok icon-blue icon-2x"></i> Lorem ipsum dolor sit amet</li> 
	                     	<li><i class="icon-ok icon-blue icon-2x"></i> Lorem ipsum dolor sit amet</li>
	                     	<li><i class="icon-ok icon-blue icon-2x"></i> Lorem ipsum dolor sit amet</li>
	                     	<li><i class="icon-ok icon-blue icon-2x"></i> Lorem ipsum dolor sit amet</li>
	                     	<li><i class="icon-ok icon-blue icon-2x"></i> Lorem ipsum dolor sit amet</li>  
	                     </ul>
	                      <br />
	                      <p> Morem ipsum dolor sit amet, conafs
	                        sectetur adipisicing elit, sed dofrt
	                        Eiusmod tempor.</p>
		 		  </div>
		</section>
		<!-- End: Login Form --> 
 		 
 		  
 	<?php include("inc/footer.inc"); ?>
 	
 	</div>
	<!-- End: Wrapper -->

  <?php include("inc/footer-scripts.inc"); ?>
</body>
</html>

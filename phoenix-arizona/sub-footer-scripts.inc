<!-- Bing Tag -->
<script>(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"4017018"};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");</script><noscript><img src="//bat.bing.com/action/0?ti=4017018&Ver=2" height="0" width="0" style="display:none; visibility: hidden;" /></noscript>
<!-- END Bing Tag -->
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script>
			window.jQuery || document.write('<script src="/js/vendor/jquery.js"><\/script>')
		</script>
  <script src="/js/foundation.min.js"></script>
  <script src="/dist/jquery.validate.js"></script>
  <script src="/dist/additional-methods.js"></script>
    <script src="/js/custom.js"></script>
    <script>
    $(document).foundation();
  </script>
  

	<script>
	$().ready(function() {

		// validate signup form on keyup and submit
		$("#signupForm").validate({
			rules: {
				first_name: "required",
				last_name: "required",
				email: {
					required: true,
					email: true
				},
				phone: {
					required: true,
					phoneUS: true
				},
				zip: {
					minlength: 5,
					required:true
				},
				agree: "required"
			},
			messages: {
				first_name: "Please enter your First Name",
				last_name: "Please enter your Last Name",
				email: "Please enter a valid Email Address",
				phone: "Please enter a valid Phone Number",
				zip: "Please enter a valid Zip Code",
			}
		});


	});
	</script>
	
	
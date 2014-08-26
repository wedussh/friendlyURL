<?php
	template_header('Test');
	
	echo '
		<h2>TEST</h2>
		<p>
			You have accessed /pages/test.php. Notice that unlike the default page the "Test" is prefixed to the TITLE. <a href="',URL_ROOT,'">Click here to return to the home / default page.</a>
		</p><p>
			The contents of the $ACTION array are currently:
		</p>
		<pre>',print_r($ACTION),'</pre>';
		
	template_footer();
?>
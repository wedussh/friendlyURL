<?php
	template_header();
	
	echo '

		<h2>Welcome</h2>
		<p>
			This is a sample home page demonstrating using mod_rewrite to create "friendly" URL\'s. To start out you\'ll want to <a href="http://www.cutcodedown.com/tutorials/friendlyURL/friendlyURL.rar">download the complete demo codebase</a> and read through the <a href="http://www.cutcodedown.com/tutorials/friendlyURL/splainLucy">Documentation / Explanation page</a>. There is also an <a href="http://www.cutcodedown.com/tutorials/friendlyURL/viewableSource">online browsable copy of the source code</a>, and please try out the following links to see the various ways the index.php parses <code>$_SERVER[\'REQUEST_URI\']</code>.
		</p>
		<ul>
			<li>
				<a href="',URL_ROOT,'test">
					<samp>/test</samp>
				</a>
				- returns a single element $ACTION array
			</li><li>
				<a href="',URL_ROOT,'test/best/west">
					<samp>/test/best/west</samp>
				</a>
				- returns each of the paths separated into the $ACTION array
			</li><li>
				<a href="',URL_ROOT,'garbage/idiot/dumbass">
					<samp>/garbage/idiot/dumbass</samp>
				</a>
				- should 404, we have no "garbage" handler.
			</li><li>
				<a href="',URL_ROOT,'pages">
					<samp>/pages</samp>
				</a>
				- the pages directory exists, but access is blocked preventing direct access! That basically means free security for your code!
			</li><li>
				<a href="',URL_ROOT,'pages/default.php">
					<samp>/pages/default.php</samp>
				</a>
				- this file actually exists, but access is blocked by our mod_rewrite and index.php! This one is fun as this is the php page you\'re looking at RIGHT NOW!
			</li>
		</ul>
		<p>
			A copy of the source as viewable .phps files is provided in the <a href="http://www.cutcodedown.com/tutorials/friendlyURL/viewableSource">viewable source directory</a>, and be sure to have a look at the <a href="http://www.cutcodedown.com/tutorials/friendlyURL/splainLucy">code explanation and documentation</a>.
		<p>
			The contents of the $ACTION array are currently:
		</p>
		<pre>',print_r($ACTION),'</pre>';
		
	template_footer();
?>
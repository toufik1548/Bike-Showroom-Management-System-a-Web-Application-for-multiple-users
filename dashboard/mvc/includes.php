<div id="layoutSidenav_content">
    <main>
    	<div class="container-fluid px-4">
		<?php
		if(isset($slug) && $slug!="")
			{include($slug.".php");}
		else{include("welcome.php");}
		?>
		</div>
    </main>
		<?php include("footer_right.php"); ?>
</div>
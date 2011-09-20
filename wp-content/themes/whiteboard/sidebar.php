<?php if (is_page(array(247,249,365,347,309,331,288,300,338,373,356,7,251,89,94,14,785))) { ?>
	

	
<?php  } else { ?>

<div id="sidebar">

	<?php if (in_category(4)) { ?>
		
		<?php if ( ! dynamic_sidebar( 'Poetry Sidebar' )) : ?>
			
		<?php endif; ?>
		
	<?php } ?>
	
	<?php if (in_category(19)) { ?>
		
		<?php if ( ! dynamic_sidebar( 'Play Sidebar' )) : ?>
			
		<?php endif; ?>
		
	<?php } ?>
	
	<?php if (is_page(7)) { ?>
		
		<?php if ( ! dynamic_sidebar( 'About Me Sidebar' )) : ?>
			<img src="/home.jpg" />
		<?php endif; ?>
		
	<?php } ?>
	
	<?php if (is_page(89)) { ?>
		
		<?php if ( ! dynamic_sidebar( 'Theater Bio Sidebar' )) : ?>
			Theater Bio
		<?php endif; ?>
		
	<?php } ?>
	
	<?php if (is_page(251)) { ?>
		
		<?php if ( ! dynamic_sidebar( 'Theater Current Projects Sidebar' )) : ?>
			Theater Current Projects
		<?php endif; ?>
		
	<?php } ?>
	
	<?php if (is_page(94)) { ?>
		
		<?php if ( ! dynamic_sidebar( 'Writing Current Projects Bio Sidebar' )) : ?>
			Writing Current Projects
		<?php endif; ?>
		
	<?php } ?>
	
	<?php if (is_page(14)) { ?>
		
		<?php if ( ! dynamic_sidebar( 'ETC Sidebar' )) : ?>
			ETC
		<?php endif; ?>
		
	<?php } ?>

	<?php if ( ! dynamic_sidebar( 'Sidebar' )) : ?>
		


	<?php endif; ?>
	
	</div><!--sidebar-->

<?php } ?>	
	
	

	

<?php get_header(); ?>

	<?php if (is_page(array(247,249,365,347,309,331,288,300,338,373,356,7,251,89,94,14,785))) { ?>



		<div id="content" style="width:100%;">

	
	<?php  } else { ?>
	
		<div id="content">
			
	<?php } ?>
	
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
			<article>
				
				<?php if (is_page(array(7,14))) { ?>
					
				
					
					<?php  } else { ?>
				
				
				<h1><?php the_title(); ?></h1>
				
			<!--		<div id="page-meta">
						<h3><em>By</em> <span class="cap"><?php the_author_posts_link() ?></span>&nbsp;&nbsp;|&nbsp;&nbsp;<em>Posted:</em> <span class="cap"><?php the_time('F j, Y'); ?> at <?php the_time() ?></span> </h3>
					</div> #pageMeta  -->
					
				<?php } ?>
			
				<div id="page-content">
					<?php the_content(); ?>
					<div class="pagination">
						<?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
					</div><!--.pagination-->
				</div><!--#pageContent -->
			</article>

			
		</div><!--#post-# .post-->
		
		<?php if (is_page(array(247,249,365,347,309,331,288,300,338,373,356,785))) { ?>

		    
		    	<?php  } else { ?>

		<?php comments_template( '', true ); ?>
		
		<?php } ?>

	<?php endwhile; ?>
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>

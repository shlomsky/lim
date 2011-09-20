<?php

// Load Child Theme scripts
// http://www.cssnewbie.com/example/equal-heights/
function childtheme_scripts() { ?>
    <script type="text/javascript">
    jQuery.noConflict();
    function equalHeight(group) {
        tallest = 0;
        group.each(function() {
            thisHeight = jQuery(this).height();
            if(thisHeight > tallest) {
                tallest = thisHeight;
            }
        });
        group.height(tallest);
    }    
    jQuery(document).ready(function() {
        equalHeight(jQuery(".main-aside"));
    });
    </script>

<?php }
add_action('wp_head','childtheme_scripts');


// Adds a home link to your menu
// http://codex.wordpress.org/Template_Tags/wp_page_menu
function childtheme_menu_args($args) {
    $args = array(
        'show_home' => 'poetry',
        'sort_column' => 'menu_order',
        'menu_class' => 'menu',
        'echo' => true
    );
    return $args;
}
add_filter('wp_page_menu_args','childtheme_menu_args');



// Add a widgetized aside just below the header
function childtheme_leaderasides() { ?>

    <?php if ( is_sidebar_active('1st-leader-aside') || is_sidebar_active('2nd-leader-aside') || is_sidebar_active('3rd-leader-aside') ) { // one of the leader asides has a widget ?>
    <div id="leader">
        <div id="leader-container">
        
            <?php if ( function_exists('dynamic_sidebar') && is_sidebar_active('1st-leader-aside') ) { // there are active widgets for this aside
                echo '<div id="first-leader" class="aside sub-aside">'. "\n" . '<ul class="xoxo">' . "\n";
                dynamic_sidebar('1st-leader-aside');
                echo '</ul>' . "\n" . '</div><!-- #first-leader .aside -->'. "\n";
            } ?>                
        
            <?php if ( function_exists('dynamic_sidebar') && is_sidebar_active('2nd-leader-aside') ) { // there are active widgets for this aside
                echo '<div id="second-leader" class="aside sub-aside">'. "\n" . '<ul class="xoxo">' . "\n";
                dynamic_sidebar('2nd-leader-aside');
                echo '</ul>' . "\n" . '</div><!-- #second-leader .aside -->'. "\n";
            } ?>       
       
            <?php if ( function_exists('dynamic_sidebar') && is_sidebar_active('3rd-leader-aside') ) { // there are active widgets for this aside
                echo '<div id="third-leader" class="aside sub-aside">'. "\n" . '<ul class="xoxo">' . "\n";
                dynamic_sidebar('3rd-leader-aside');
                echo '</ul>' . "\n" . '</div><!-- #third-leader .aside -->'. "\n";
            } ?>        
            
        </div><!-- #leader-container -->    
    </div><!-- #leader -->
    <?php } ?>

<?php }
add_action('thematic_belowheader','childtheme_leaderasides',6);


// Add a widgetized aside above the main asides with the start of a wrapper: #sidebar
function childtheme_sidebarstart() { ?>
<div id="sidebar">
  <div id="crown" class="aside crown-aside">
  	<ul class="xoxo">
  <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('crown-aside') ) : // begin sidebar crown widgets ?>
  
      <li id="thematic-power-blog-subscribe" class="widgetcontainer widget_thematic_power_blog_subscribe">
      	<h3 class="widget-title"><?php _e('Subscribe', 'thematic'); ?></h3>
      	<ul>
          	<li><a href="<?php bloginfo('rss2_url') ?>" title="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?> <?php _e('Site RSS feed', 'thematic'); ?>" rel="alternate nofollow" type="application/rss+xml"><?php _e('Site RSS Feed', 'thematic') ?></a></li>
        	</ul>
      </li>

  <?php endif; // end sidebar crown widgets  ?>
  		</ul>
  	</div><!-- #crown .aside -->
<?php }
add_action('thematic_abovemainasides','childtheme_sidebarstart');


// Close div#sidebar
function childtheme_sidebarend() { ?>
</div><!-- #sidebar -->
<?php }
add_action('thematic_belowmainasides','childtheme_sidebarend');


// Add breadcrumbs above the footer if Yoast Breadcrumbs are installed
// http://yoast.com/wordpress/breadcrumbs/
function childtheme_breadcrumbs() {
    if ( function_exists('yoast_breadcrumb') ) { ?>
        <div id="breadcrumb-nav">      
            <div id="breadcrumb-nav-container">      
                
                	<?php yoast_breadcrumb('<p id="breadcrumbs">','</p>'); ?>
                
            </div><!-- #breadcrumb-nav-container -->
        </div><!-- #breadcrumb-nav-container -->    
    <?php }    
}
add_action('thematic_abovefooter','childtheme_breadcrumbs',5);


// Add Thematic Power Blog Subscribe Widget
function thematic_power_blog_subscribe() { ?>
    <li id="thematic-power-blog-subscribe" class="widgetcontainer widget_thematic_power_blog_subscribe">
    	<h3 class="widget-title"><?php _e('Subscribe', 'thematic'); ?></h3>
    	<ul>
        	<li><a href="<?php bloginfo('rss2_url') ?>" title="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?> <?php _e('Site RSS feed', 'thematic'); ?>" rel="alternate nofollow" type="application/rss+xml"><?php _e('Site RSS Feed', 'thematic') ?></a></li>
      	</ul>
    </li>
<?php }


// Register new widgetized areaa and the new widgets
function childtheme_widgets_init() {
    
    // Register new widgetized areaa
    register_sidebar(array(
        'name' => 'Crown Aside',
        'id' => 'crown-aside',
        'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
        'after_widget' => "</li>",
        'before_title' => "<h3 class=\"widgettitle\">",
        'after_title' => "</h3>\n",
    ));  
    
    register_sidebar(array(
       	'name' => '1st leader Aside',
       	'id' => '1st-leader-aside',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));  

    register_sidebar(array(
       	'name' => '2nd leader Aside',
       	'id' => '2nd-leader-aside',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));  
   
    register_sidebar(array(
       	'name' => '3rd leader Aside',
       	'id' => '3rd-leader-aside',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));  
      
    
    // Register the new widgets
    register_sidebar_widget('Thematic Power Blog Subscribe', 'thematic_power_blog_subscribe');
    
}
add_action( 'init', 'childtheme_widgets_init' );  

if (!is_admin())
  add_filter('widget_text', 'do_shortcode', SHORTCODE_PRIORITY);

?>
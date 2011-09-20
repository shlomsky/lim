
    </div><!-- #main -->
    
    <?php
    
    // action hook for placing content above the footer
    thematic_abovefooter();
    
    ?>    

	<div id="footer">
    
        <?php
        
        // action hook creating the footer 
        thematic_footer();
        
        ?>
        
	</div><!-- #footer -->
	
    <?php
    
    // actio hook for placing content below the footer
    thematic_belowfooter();
    
    ?>  

</div><!-- #wrapper .hfeed -->

<?php 

// calling WordPress' footer action hook
wp_footer();

// action hook for placing content before closing the BODY tag
thematic_after(); 

?>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-15814484-1");
pageTracker._trackPageview();
} catch(err) {}</script>

</body>
</html>
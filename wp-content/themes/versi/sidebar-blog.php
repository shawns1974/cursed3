<div id="sidebar" class="span4">
<div class="sidebar-content">
    <?php 
	global $rnr_sidebar_name;
	
	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Blog Sidebar') );
	?>

</div>
</div>
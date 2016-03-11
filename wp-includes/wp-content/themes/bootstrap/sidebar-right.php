<?php
/**
 * Sidebar
 *
 * Content for our sidebar, provides prompt for logged in users to create widgets
 *
 * @package WordPress
 * @subpackage Bootstrap
 * @since Bootstrap a.0.1
 */
?>

<!-- Sidebar -->
<section class="col-md-3 col-sm-3 col-xs-12 panel-group sidebar">
	<div class="panel panel-default">
		<div class="panel-body">
			<?php dynamic_sidebar('Sidebar Right'); ?>
		</div>
	</div>
</section>
<!-- End Sidebar -->
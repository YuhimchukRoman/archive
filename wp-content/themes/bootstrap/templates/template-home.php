<?php
/*
 * Template Name: Home Page
 */
get_header(); ?>
<div class="main-banner">
<?php 
if(get_field('main_banner_img')):

$image = get_field('main_banner_img');

if( !empty($image) ): 

	// vars
	$url = $image['url'];
	$title = $image['title'];
	$alt = $image['alt'];
	$caption = $image['caption'];

	// thumbnail
	$size = 'main_banner';
	$thumb = $image['sizes'][ $size ];
	$width = $image['sizes'][ $size . '-width' ];
	$height = $image['sizes'][ $size . '-height' ];

	if( $caption ): ?>

		<div class="wp-caption">

	<?php endif; ?>

			<img class="main-banner-img" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
	<?php if( $caption ): ?>

			<p class="wp-caption-text"><?php echo $caption; ?></p>

		</div>

	<?php endif; ?>

<?php endif; ?>
<?php endif; ?>
	<div class="main-banner-bigbubble">
	<?php if( get_field( "main_banner_quote" ) ): ?>
		<img src="<?php echo get_template_directory_uri();?>/images/bigbubble.png" alt="">
		    <p><?php the_field( "main_banner_quote" ); ?></p>
	<?php endif;?>
</div>
</div>
<section class="apl-about" id="section1">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6">
				<div class="apl-about-text">
				<?php if(get_field('about_heading')):?>
				<h3><?php the_field('about_heading');?></h3>
				<?php endif;?>
				<?php if(get_field('about_main_text')):
				the_field('about_main_text');
					endif;
				?>
				<?php
				if(get_field('about_secondary_text')):
				 the_field('about_secondary_text');
				endif;?>
				<div class="apl-grdnt"></div>
				</div>
				<div class="apl-about-btn" id="about-btn">
					<img src="<?php echo get_template_directory_uri();?>/images/arrow.png" alt="">
					<?php if(get_field('about_button_text')) :
						the_field('about_button_text');
					endif;?>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 apl-about-img">
			<?php if(get_field('about_illustration')):?>
				<img src="<?php the_field('about_illustration');?>" alt=''>
			<?php endif;?>
			</div>
		</div>
		<div class="row apl-about-hidden">
			<div class="col-md-6 col-sm-6">
			<?php if(get_field('hidden_heading_1')):?>
				<h4><?php the_field('hidden_heading_1');?></h4>
				<?php endif;?>
				<?php if(get_field('hidden_text_1')) : 
				the_field('hidden_text_1');
				endif;?>
			</div>
			<div class="col-md-6 col-sm-6">
			<?php if(get_field('hidden_heading_2')) :?>
				<h4><?php the_field('hidden_heading_2');?></h4>
			<?php endif;?>
				<?php  if(get_field('hidden_text_2')) :
				the_field('hidden_text_2');
				endif;?>
			</div>
		</div>
		</div>
	</section>	
</div>
<section class="apl-year" id="section2">
	<div class="container">
	<?php if(get_field('year_heading')) :?>
		<h3><?php  the_field('year_heading');?></h3>
	<?php endif;?>
		<div class="row">
		<?php
		if (have_rows('year_content')):
			?>
		<?php
			while (have_rows('year_content')):
				the_row();
			?>
			<div class="col-md-3 col-sm-6">
				<div class="apl-year-img">
					<?php 
					if(get_sub_field('year_illustration')):
					$image = get_sub_field('year_illustration');
					if( !empty($image) ): 
						// vars
						$url = $image['url'];
						// thumbnail
						$size = 'year_img';
						$thumb = $image['sizes'][ $size ];
						$width = $image['sizes'][ $size . '-width' ];
						$height = $image['sizes'][ $size . '-height' ];?>
							<img src="<?php echo $thumb; ?>" alt="" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
					<?php endif; ?>
					<?php endif; ?>
				</div>
				<?php if(get_sub_field('year_subheading')) :?>
				<h4><?php the_sub_field('year_subheading')?></h4>
			<?php endif;?>
				<?php if(get_sub_field('year_text')):
				the_sub_field('year_text');
				endif;?>
			</div>
			<?php
			endwhile;
		endif;
	 ?>
		</div>
	</div>
</section>
<section class="apl-ceo" id="section3">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6" id="ceo-left">
			<?php if(get_field('ceo_heading')) :?>
				<h3><?php the_field('ceo_heading');?></h3>
			<?php endif;?>
				<?php if(get_field('ceo_subheading')) :
				the_field('ceo_subheading');
				endif;
				?>
				<div class="apl-ceo-text">
					<?php if(get_field('ceo_main_text')) :
					the_field('ceo_main_text');
					endif;?>
					<div class="apl-grdnt"></div>	
				</div>
				<div class="apl-about-btn" id="ceo-btn"><img src="<?php echo get_template_directory_uri();?>/images/arrow.png" alt="">
					<?php if(get_field('ceo_button_text')) :
						the_field('ceo_button_text');
					endif;?>
				</div>
				<div class="apl-ceo-hidden">
				<?php
					if (have_rows('ceo_hidden_text')):
						?>
					<?php
						while (have_rows('ceo_hidden_text')):
							the_row();
						if(get_sub_field('hidden_text_heading')) :
						?>
							<h4><?php the_sub_field('hidden_text_heading');?></h4>
						<?php endif;?>
							<?php if(get_sub_field('hidden_text')) :
							 the_sub_field('hidden_text');
							 endif;?>
						<?php
						endwhile;
					endif;
				 ?>
				 </div>
			</div>
			<div class="col-md-6 col-sm-6" id="ceo-right">
				<div class="apl-ceo-photo">
					<div class="apl-ceo-bubble">
						<img src="<?php echo get_template_directory_uri();?>/images/medbubble.png" alt="">
						<?php if(get_field('ceo_quote')) :
						 the_field('ceo_quote');
						 endif;
						 ?>
					</div>
					<img src="<?php the_field('ceo_photo');?>" alt="">
					<?php if(get_field('ceo_name')) :?>
					<h5><?php the_field('ceo_name')?><h5>
					<?php endif;?>
					<?php if(get_field('ceo_post')) :?>
					<h6><?php the_field('ceo_post')?><h6>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="apl-quality" id="section4">
	<div class="container">
	<div class="apl-quality-text">
		<?php if(get_field('quality_heading')) :?>
		<h3><?php the_field('quality_heading')?></h3>
		<?php endif;?>
		<?php if(get_field('quality_text')) :
		the_field('quality_text');
		endif;?>
		<?php if(get_field('quality_subheading')) :?>
		<p><?php the_field('quality_subheading');?></p>
		<?php endif;?>
	</div>
	<div class="apl-quality-dots" style="background: url(<?php echo get_template_directory_uri();?>/images/dot_back.png) repeat-x;"></div>
		<div class="row">
			<?php
					if (have_rows('quality_content_types')):
						?>
					<?php
						while (have_rows('quality_content_types')):
							the_row();
						?>
						<div class="col-md-3 col-sm-3 col-xs-6">
							<?php if(get_sub_field('content_image')) :?>
							<img src="<?php the_sub_field('content_image')?>" alt=''>
							<?php endif;?>
							<?php if(get_sub_field('content_heading')) :?>
							<h4><?php the_sub_field('content_heading');?></h4>
							<?php endif;?>
						</div>
						<?php
						endwhile;
					endif;
				 ?>
		</div>
		<div class="apl-quality-hidden-text">
			<?php
					if (have_rows('quality_content_types')):
						?>
					<?php
						while (have_rows('quality_content_types')):
							the_row();
						?>
						<div class="apl-quality-hidden-element">
							<?php if(get_sub_field('content_heading')) :?>
							<h4><?php the_sub_field('content_heading')?></h4>
							<?php endif;?>
							<?php if(get_sub_field('content_text')) :
							the_sub_field('content_text');
							endif;?>
						</div>
						<?php
						endwhile;
					endif;
				 ?>
		</div>
	</div>
</section>
<section class="apl-strategy" id="section5">
	<div class="container">
	<div class="apl-strategy-text">
		<?php if(get_field('strategy_heading')) :?>
		<h3><?php the_field('strategy_heading');?></h3>
		<?php endif;?>
		<?php if(get_field('strategy_text')) :?>
		<p><?php the_field('strategy_text');?></p>
		<?php endif;?>
		<?php if(get_field('strategy_subheading')) :?>
		<h4><?php the_field('strategy_subheading');?></h4>
		<?php endif;?>
	</div>
	<div class="apl-strategy-content clearfix">
	<div class="apl-strategy-dots" style="background: url(<?php echo get_template_directory_uri();?>/images/dot_back.png) repeat-x;"></div>
		<?php
			if (have_rows('button_heading')):?>
					<?php $i=1;
						while (have_rows('button_heading')):
							the_row();
						?>
						<?php if(get_sub_field('heading')) :?>
						<div class="apl-strategy-circles">
							<div class="apl-strategy-btn" id="btn<?php echo $i?>"><?php echo $i?></div>
							<h5><?php the_sub_field('heading')?></h5>
							<?php endif;?>
						</div>
				<?php
				$i++;
				endwhile;
			endif;
		 ?>
	</div>
		 <?php
			if (have_rows('strategy_hidden_text')):?>
					<?php 
					$i=1;
						while (have_rows('strategy_hidden_text')):
							the_row();
						?>
						<div class="row" id="hidden<?php echo $i;?>">
							<div class="col-md-4">
							<?php if(get_sub_field('heading1')) :?>
							<h4><?php the_sub_field('heading1')?></h4>
							<?php endif;?>
							<?php if(get_sub_field('text1')) :?>
							<p><?php the_sub_field('text1')?></p>
							<?php endif;?>
							</div>
							<div class="col-md-4">
							<?php if(get_sub_field('heading2')) :?>
							<h4><?php the_sub_field('heading2')?></h4>
							<?php endif;?>
							<?php if(get_sub_field('text2')) :?>
							<p><?php the_sub_field('text2')?></p>
							<?php endif;?>
							</div>
							<div class="col-md-4">
							<?php if(get_sub_field('heading3')) :?>
							<h4><?php the_sub_field('heading3')?></h4>
							<?php endif;?>
							<?php if(get_sub_field('text3')) :?>
							<p><?php the_sub_field('text3')?></p>
							<?php endif;?>
							</div>
						</div>
				<?php
				$i++;
				endwhile;
			endif;
		 ?>
	</div>
</section>
<section class="apl-healthcare" id="section6">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6">
			<div class="apl-healthcare-content">
			<?php if(get_field('health_care_mark')) :?>
			<p><?php the_field('health_care_mark')?><span><?php
			if(get_field('Healthcare_direction')) :
			 the_field('Healthcare_direction');
			endif;?></span></p>
			<?php endif;?>
				<?php if(get_field('healthcare_heading')) :?>
				<h3><?php the_field('healthcare_heading')?></h3>
				<?php endif;?>
				<?php if(get_field('healthcare_text')) :
				the_field('healthcare_text');
				endif;?>
				<div class="row">
				<?php
					if (have_rows('healthcare_numbers')):
						?>
					<?php
						$i=1;
						while (have_rows('healthcare_numbers')):
							the_row();
						?>
						<div class="col-md-6">
							<img src="<?php the_sub_field('icon')?>" alt=''>
							<div class="apl-healthcare-counter">
								<?php if(get_sub_field('counter')) :?>
								<span id="health<?php echo $i;?>"><?php the_sub_field('counter')?></span>
								<?php endif;
								if(get_sub_field('subheading')) :?>
								<p><?php the_sub_field('subheading')?></p>
								<?php endif;?>
							</div>
						</div>
						<?php
						$i++;
						endwhile;
					endif;
				 ?>
				 </div>
				 </div>
			</div>
			<div class="col-md-6 col-sm-6 apl-healthcare-bigphoto">
				<img src="<?php the_field('healthcare_photo')?>" alt=''>
			</div>
		</div>
	</div>
</section>
<section class="apl-life" id="section7">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6 apl-life-bigphoto">
				<img src="<?php the_field('life_photo')?>" alt=''>
			</div>
			<div class="col-md-6 col-sm-6">
				<div class="apl-life-content">
				<?php if(get_field('life_mark')) :?>
				<p><?php the_field('life_mark')?><span><?php if(get_field('life_direction')) :
				the_field('life_direction');
				endif;?></span>
				</p>
				<?php endif;
				if(get_field('life_heading')) :?>
				<h3><?php the_field('life_heading')?></h3>
				<?php endif;?>
				<?php if(get_field('life_text')) :
				the_field('life_text');

				endif;?>
				<div class="row">
				<?php
					if (have_rows('life_numbers')):
						?>
					<?php
						while (have_rows('life_numbers')):
							the_row();
						?>
						<div class="col-md-6">
							<img src="<?php the_sub_field('icon')?>" alt=''>
							<div class="apl-life-counter">
								<?php if(get_sub_field('counter')) :?>
								<span><?php the_sub_field('counter')?></span>
								<?php endif;
								if(get_sub_field('subheading')) :?>
								<p><?php the_sub_field('subheading');?></p>
								<?php endif;?>
							</div>
						</div>
						<?php
						endwhile;
					endif;
				 ?>
				 </div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="apl-charts" id="section8">
	<div class="container">
		<h3>
			<?php if(get_field('charts_header')) :
			the_field('charts_header');
			endif;?>
		</h3>
		<?php if(get_field('charts_button_text_1')) :?>
		<div class="apl-charts-button active" id='fin-btn'>
			<?php the_field('charts_button_text_1');?>
		</div>
		<?php endif;?>
		<?php if(get_field('charts_button_text_2')) :?>
		<div class="apl-charts-button" id='nonfin-btn'>
			<?php the_field('charts_button_text_2');?>
		</div>

		<?php endif;?>
		<div class='row financial_chart'>
			<?php
					if (have_rows('financial_charts')):
						?>
					<?php
						while (have_rows('financial_charts')):
							the_row();
						?>
						<div class="col-md-4">
							<?php if(get_sub_field('chart_heading')) :?>
								<h4><?php the_sub_field('chart_heading')?></h4>
								<?php endif;?>
							<?php

						if (have_rows('chart_data')):
							while (have_rows('chart_data')): the_row();
								$labels[] = get_sub_field('year');
								$datas[] = get_sub_field('amount');
							endwhile;
							$rand = rand();
							?>
								<canvas id="myChart_<?php echo $rand?>" width="250" height="187"></canvas>
								<script type="text/javascript">
									$( document ).ready(function() {
									   var data = {
									    labels: <?php echo js_array($labels)?>,
									    datasets: [
									        {
									            label: "Years",
									            fillColor: "#eeeeed",
									            strokeColor: "#eeeeed",
									            highlightFill: "#3576bb",
									            highlightStroke: "#3576bb",
									            data: <?php echo js_array($datas)?>,
									        }
									    ]
									};
									var ctx = document.getElementById("myChart_<?php echo $rand?>").getContext("2d");
									var myBarChart = new Chart(ctx).Bar(data);
									});
								</script>
							<?php

							unset($labels);
							unset($datas);
					    endif;?>
					    </div>
						<?php endwhile;
					endif;
				 ?>
		</div>
		<div class='row nonfinancial_chart hidden_chart'>
			<?php
					if (have_rows('nonfinancial_charts')):
						?>
					<?php
						while (have_rows('nonfinancial_charts')):
							the_row();
						?>
						<div class="col-md-4">
							<?php if(get_sub_field('chart_heading')) :?>
								<h4><?php the_sub_field('chart_heading')?></h4>
								<?php endif;?>
							<?php

						if (have_rows('chart_data')):
							while (have_rows('chart_data')): the_row();
								$labels[] = get_sub_field('year');
								$datas[] = get_sub_field('amount');
							endwhile;
							$rand = rand();
							?>
								<canvas id="myChart_<?php echo $rand?>" width="250" height="187"></canvas>
								<script type="text/javascript">
									$( document ).ready(function() {
									   var data = {
									    labels: <?php echo js_array($labels)?>,
									    datasets: [
									        {
									            label: "Years",
									             scaleGridLineColor: "transparent",
									             scaleShowGridLines: false,
									             scaleShowHorizontalLines: false,
									             scaleShowVerticalLines: false,
									             barShowStroke: false,
									            fillColor: "#eeeeed",
									            strokeColor: "#eeeeed",
									            highlightFill: "#3576bb",
									            highlightStroke: "#3576bb",
									            data: <?php echo js_array($datas)?>,
									        }
									    ]
									};
									var ctx = document.getElementById("myChart_<?php echo $rand?>").getContext("2d");
									var myBarChart = new Chart(ctx).Bar(data);
									});
								</script>
							<?php

							unset($labels);
							unset($datas);
					    endif;?>
					    </div>
						<?php endwhile;
					endif;
				 ?>
		</div>
	</div>
</section>
<section class="apl-downloads">
	<div class="container">
		<?php if(get_field('download_heading')) :?>
		<h3><?php the_field('download_heading');?></h3>

	<?php endif;?>

		<div class="row">
			<?php if (have_rows('files')):
						?>
					<?php
						while (have_rows('files')):
							the_row();
						?>
						<div class="col-md-4 col-sm-4">
						<?php if(get_sub_field('file_preview')) :?>
							<?php if(get_sub_field('file')) :?>
							<?php $file = get_sub_field('file');
							$filesize = filesize( get_attached_file( $file['id'] ) );
							$filesize1 = size_format($filesize, 2);
							?>
							<a href="<?php echo $file['url'];?>"><div class="apl-downloads-img" style="background: url(<?php the_sub_field('file_preview')?>) no-repeat top center; background-size: cover;">
							</div></a>
						<?php endif;?>
						<?php endif;?>
							<div class="apl-downloads-text">
							<?php if(get_sub_field('file')) :?>
							<?php $file = get_sub_field('file');
							$filesize = filesize( get_attached_file( $file['id'] ) );
							$filesize1 = size_format($filesize, 2);
							?>
							<a href="<?php echo $file['url'];?>"><?php echo $file['title'];?></a>
							<span><?php echo $file['mime_type'];?></span> <span><?php echo $filesize1;?></span>
							<?php endif;?>
							</div>
							<div class="clearfix"></div>
						</div>
						<?php
						endwhile;
					endif;
				 ?>
		</div>
	</div>
</section>
<?php 
 get_footer(); ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri().'/assets/css/customize.css' ?>">

<?php
	/**
	 * @var $facebook_url 
	 * @var $youtube_url
	 * @var $instragram_url
	 * @var $twitter_url
	 */
	?>

<div class="team_block">

	<div class="overlay">
    	<div class="text">Hello World</div>
  	</div>
	<div class="sow-headline-container <?php if( $instance['fittext'] ) ?>">
		<?php
		foreach( $order as $item ) {
			switch( $item ) {
				case 'headline' :
					if( !empty( $headline ) ) {
						echo "<$headline_tag class='sow-headline'>";

						if( !empty( $headline_destination_url ) ): ?>
							<a href="<?php echo sow_esc_url( $headline_destination_url ) ?>" <?php echo $headline_new_window ? 'target="_blank" rel="noopener noreferrer"' : '' ?>>
						<?php
						endif;

						echo wp_kses_post( $headline );
						if( !empty( $headline_destination_url ) ) echo '</a>';
						echo "</$headline_tag>";
					}
				break;

				case 'divider' :
					if( $has_divider ) {
						?>
					<div class="decoration">
						<div class="decoration-inside"></div>
					</div>
					<?php
				}
				break;
					
				case 'sub_headline' :
					if( !empty( $sub_headline ) ) {
						echo "<$sub_headline_tag class='sow-sub-headline'>";

						if( !empty( $sub_headline_destination_url ) ): ?>
							<a href="<?php echo sow_esc_url( $sub_headline_destination_url ) ?>" <?php echo $sub_headline_new_window ? 'target="_blank" rel="noopener noreferrer"' : '' ?>>
						<?php
						endif;

						echo wp_kses_post( $sub_headline );
						if( !empty( $sub_headline_destination_url ) ) echo '</a>';
						echo "</$sub_headline_tag>";
					}
				break;
			}
		}
		?>
	</div>

	<?php
	$last_row = floor( ( count($instance['features']) - 1 ) / $instance['per_row'] );
	?>
	<div class="sow-features-list <?php if( $instance['responsive'] ) echo 'sow-features-responsive'; ?>">

		<?php if( isset( $instance['features'] ) ) : ?>
			<?php foreach( $instance['features'] as $i => $feature ) : ?>

				<div class="sow-features-feature sow-icon-container-position-<?php echo esc_attr( $feature['container_position'] ) ?> <?php if(  floor( $i / $instance['per_row'] ) == $last_row ) echo 'sow-features-feature-last-row' ?>" style="width: <?php echo round( 100 / $instance['per_row'], 3 ) ?>%">
					<?php
						$attachment = siteorigin_widgets_get_attachment_image_src(
							$feature['icon_image'],
							$size,
							! empty( $feature['icon_image_fallback'] ) ? $feature['icon_image_fallback'] : false
						); 
					?>
					<div class="team_card">
						<div class="overlay">
							<?php if(!empty($feature['vision'])) : ?>
							<div class="team_text"><?php echo  '"'.$feature['vision'].'"';  ?></div>
							<?php endif; ?>
							<?php if(!empty($feature['facebook_icon'])) : ?>

								<div class="team_icon_facebook">
									<?php $icon_styles = array(); ?>
									
									<?php if ( ! empty( $facebook_url ) ) : ?><a href="<?php echo sow_esc_url($facebook_url ) ?>" <?php foreach( $link_attributes as $att => $val ) if ( ! empty( $val ) ) : echo $att.'="' . esc_attr( $val ) . '" '; endif; ?>><?php endif; ?>
										<?php echo siteorigin_widget_get_icon($feature['facebook_icon'], $icon_styles); ?>
									
									<?php if ( ! empty( $facebook_url ) ) : ?></a><?php endif; ?>

								</div>

							<?php endif; ?>
							<?php if(!empty($feature['youtube_icon'])) : ?>

								<div class="team_icon_youtube">
									<?php $icon_styles = array(); ?>
									
									<?php if ( ! empty( $youtube_url ) ) : ?><a href="<?php echo sow_esc_url($youtube_url ) ?>" <?php foreach( $link_attributes as $att => $val ) if ( ! empty( $val ) ) : echo $att.'="' . esc_attr( $val ) . '" '; endif; ?>><?php endif; ?>
										<?php echo siteorigin_widget_get_icon($feature['youtube_icon'], $icon_styles); ?>
									
									<?php if ( ! empty( $youtube_url ) ) : ?></a><?php endif; ?>

								</div>

							<?php endif; ?>
							<?php if(!empty($feature['instragram_icon'])) : ?>
								<div class="team_icon_instragram">
									<?php if ( ! empty( $instragram_url ) ) : ?><a href="<?php echo sow_esc_url($instragram_url ) ?>" <?php foreach( $link_attributes as $att => $val ) if ( ! empty( $val ) ) : echo $att.'="' . esc_attr( $val ) . '" '; endif; ?>><?php endif; ?>
										<?php echo siteorigin_widget_get_icon($feature['instragram_icon'], $icon_styles); ?>
									
									<?php if ( ! empty( $instragram_url ) ) : ?></a><?php endif; ?>
								</div>
							<?php endif; ?>
							<?php if(!empty($feature['twitter_icon'])) : ?>
								<div class="team_icon_twitter">
									<?php if ( ! empty( $twitter_url ) ) : ?><a href="<?php echo sow_esc_url($twitter_url ) ?>" <?php foreach( $link_attributes as $att => $val ) if ( ! empty( $val ) ) : echo $att.'="' . esc_attr( $val ) . '" '; endif; ?>><?php endif; ?>
										<?php echo siteorigin_widget_get_icon($feature['twitter_icon'], $icon_styles); ?>
									
									<?php if ( ! empty( $twitter_url ) ) : ?></a><?php endif; ?>
								</div>
							<?php endif; ?>

						</div>
						<div class="image">
							<img src="<?php echo sow_esc_url($attachment[0]); ?>" alt="img">
						</div>

						<div class="title_name">
							<?php if(!empty($feature['title']) && !empty($feature['subtitle'])) : ?>

								<div class="title">
									<?php echo  $feature['title'];  ?>
								</div>
								<div class="subtitle">
									<?php echo  '[' .$feature['subtitle'].']';  ?>
								</div>

							<?php endif; ?>
						</div>

						
					</div>
					
				</div>

			<?php endforeach; ?>
		<?php endif; ?>

	</div>


	

</div>


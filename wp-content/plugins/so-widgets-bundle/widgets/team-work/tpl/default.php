
<link rel="stylesheet" href="<?php echo 'http://localhost/wordpress/wp-content/plugins/so-widgets-bundle/widgets/team-work/styles/default.less' ?>">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<?php
	/**
	 * @var $facebook_url 
	 * @var $youtube_url
	 * @var $instragram_url
	 * @var $twitter_url
	 */
?>
<?php
	$last_row = floor( ( count($instance['features']) - 1 ) / $instance['per_row'] );
	$width = round( 100 / $instance['per_row'], 3 );
	// echo $width;
?>

<section class="volunteer">
	<div class="our_volunteer">
		<div class="container">
			<div class="row">
				<?php if( isset( $instance['features'] ) ) : ?>
					<?php foreach( $instance['features'] as $i => $feature ) : ?>
						<?php
							$attachment = siteorigin_widgets_get_attachment_image_src(
								$feature['icon_image'],
								$size,
								! empty( $feature['icon_image_fallback'] ) ? $feature['icon_image_fallback'] : false
							); 
						?>
						<div class="col col-lg-auto" style="width: <?php echo round( 100 / $instance['per_row'], 3 ) ?>%">
							<!-- <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 pb-4"> -->
							<div class="c-display">
								<div class="volunteer_description">
									<div class="content">
										<div class="card-images">
											<?php if(!empty($attachment[0])):  ?>
											<img src="<?php echo sow_esc_url($attachment[0]); ?>" alt="img">
											<?php endif; ?>
										</div>
										<div class="hidden_on_overlay">
											<div class="title">

												<?php if(!empty($feature['title']) && !empty($feature['subtitle'])) : ?>

												<h6 class="text-center"><?php echo  $feature['title'];  ?></h6>
											</div>
											<div class="position">
												<span>
													<center><?php echo  $feature['subtitle'];  ?></center>
												</span>
											</div>
											<?php endif; ?>
										</div>
										<div class="overlay">
											<div class="content-details">
												<div class="title">
													<h6>hello</h6>
												</div>
												<div class="position">
													<span>lorem</span>
												</div>
												<div class="paragraph">
													<p>
														<?php if(!empty($feature['vision'])):  ?>
														<?php echo  '"'.$feature['vision'].'"';  ?>
														<?php endif; ?>
													</p>
												</div>
												<div class="social-media1 volunteer">
													<ul>
														<li>
															<a href="https://www.facebook.com/"><i
																	class="fab fa-facebook-f"></i></a>
														</li>
														<li>
															<a href="https://twitter.com/"><i
																	class="fab fa-twitter"></i></a>
														</li>
														<li>
															<a href="https://www.instagram.com/"><i
																	class="fab fa-instagram"></i></a>
														</li>
														<li>
															<a href="https://www.youtube.com"><i class="fab fa-youtube"></i></a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

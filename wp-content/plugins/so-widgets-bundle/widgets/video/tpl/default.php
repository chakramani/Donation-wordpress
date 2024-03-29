<?php
/**
 * @var $instance
 * @var $args
 * @var $player_id
 * @var $autoplay
 * @var $related_videos
 * @var $skin_class
 * @var $is_skinnable_video_host
 * @var $sources
 * @var $src
 * @var $video_type
 */

if ( ! empty( $instance['title'] ) ) {
	echo $args['before_title'] . $instance['title'] . $args['after_title'];
}

$video_args = array(
	'id'      => $player_id,
	'class'   => 'sow-video-widget',
	'preload' => 'auto',
	'style'   => 'width:100%;height:100%;',
);
if ( $autoplay ) {
	$video_args['autoplay'] = 1;
	// In most brwosers, Videos need to be muted to autoplay.
	if ( apply_filters( 'sow_video_autoplay_mute_self_hosted', true ) ) {
		$video_args['muted'] = true;
	}
}
if ( ! empty( $poster ) ) {
	$video_args['poster'] = esc_url( $poster );
}
if ( $skin_class != 'default' ) {
	$video_args['class'] = 'mejs-' . $skin_class;
}

$so_video = new SiteOrigin_Video();

do_action( 'siteorigin_widgets_sow-video_before_video', $instance );
?>
<!-- <?php var_dump($sources); ?> -->
<div class="sow-video-wrapper">
	<?php if ( $is_skinnable_video_host ) : ?>
	<video
		<?php foreach ( $video_args as $k => $v ) : ?>
		<?php echo $k . '="' . $v . '" '; ?>
		<?php endforeach; ?>
	>
		<?php foreach ( $sources as $source ) : ?>
		<source type="<?php echo esc_attr( $source['video_type'] ) ?>" src="<?php echo esc_url( $source['src'] ) ?>"/>
		<?php endforeach; ?>
	</video>
	<?php else : ?>
	<?php echo $so_video->get_video_oembed( $src, $autoplay, $related_videos ); ?>
	<?php endif; ?>
</div>
<?php do_action( 'siteorigin_widgets_sow-video_after_video', $instance ); ?>

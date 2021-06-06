
<div class="container">
    <?php foreach( $instance['progressbar'] as $i => $progress ) : ?>
        <p class="bar"><?php echo $progress['text']; ?><span class="float-right"><?php echo $progress['percentage'].'%'; ?> </span></p>
        <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $progress['percentage'].'%'; ?>" aria-valuenow="60"
            aria-valuemin="0" aria-valuemax="100"></div>
        </div>
	<?php endforeach; ?>
</div>

<div class="jumbotron jumbo d-none d-sm-block">
  <div class="container">
    <div class="row">
      <div class="col-6">
        <h6 class="pt-2 text-capitalize text-secondary"><?php echo $instance['textbutton']['text'];  ?></h6>
      </div>
      <div class="col-6">
        <div class="donate_button float-right">
			<a href="<?php echo sow_esc_url( $instance['textbutton']['bt_text']);  ?>">
				<button class="button">
					Donate Now
					<span class="oval"><i class="fas fa-arrow-right"></i></span>
				</button>
		  	</a>
        </div>
      </div>
    </div>
  </div>
</div>

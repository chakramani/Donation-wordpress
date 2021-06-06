<?php $i=1; ?>
<?php $a='a'; ?>
<?php foreach($head as $item): ?>
	<section class="bar-collapse">
		<div class="skills">
			<div class="container">
				<div id="accordion" class="accordion">
					<div class="card">
						<div class="card-header" id="<?php echo $a.$i.$i ?>">
							<h5 class="mb-0 text-light">
								<button class="btn btn-link" data-toggle="collapse" data-target="<?php echo '#'.$a.$i ?>"
									aria-expanded="false" aria-controls="<?php echo $a.$i ?>">
									<i class="fal fa-caret-circle-down"></i>
									<?php echo  $item['text']; ?>
								</button>
							</h5>
						</div>
						<div id="<?php echo $a.$i ?>" class="collapse show" aria-labelledby="<?php echo $a.$i.$i ?>" data-parent="#accordion">
							<div class="card-body">
							<?php echo  $item['content']; ?>
							</div>
						</div>
						<?php $i=$i+1;?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endforeach; ?>
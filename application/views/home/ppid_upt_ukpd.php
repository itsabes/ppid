<style>
	.item {
		background: #0073b7;
		color: #fff;
		border-radius: 10px;
		padding: 15px;
		text-align: center;
		margin-bottom: 20px;
	}

	.item h4 {
		font-size: 14px;
		line-height: 1.5;
	}
</style>

<div class="container">
	<section class='content'>
		<div class='col-xs-12'>
			<div class='row'>
				<div class="box box-solid">
					<div class="box-header with-border">
						<h3 class="box-title"><?= $title ?></h3>
					</div>
					<div class="box-body">
						<?php foreach ($website_ppid as $website_ppid) { ?>
							<div class="col-md-2">
								<a href="<?= $website_ppid->WebPpid ?>" target="_blank">
									<div class="item">
										<h4>RSUD <br> <?= str_replace('RSUD ', '', $website_ppid->NamaUk) ?></h4>
									</div>
								</a>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
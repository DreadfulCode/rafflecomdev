	<div class="discount">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
					
							        <?php if (is_front_page()): ?>
 									<div class="dis-area paddingTop40 paddingBottom20">
										<ul class="list-unstyled list-inline prices">
										<?php $quantity_rate = get_field('quantity_rate', 263) ?>
										<?php if( $quantity_rate ) : ?> 

												<?php foreach($quantity_rate as $q_r): ?>
													<?php if ($q_r['quantity'] == 100 || $q_r['quantity'] == 500 || $q_r['quantity'] == 1000 || $q_r['quantity'] == 2000 || $q_r['quantity'] == 3000): ?>
												   <li>
													<a href="/ticket-pricing-colors?quantity=<?php echo $q_r['quantity'] ?>" title=""><p><?php echo $q_r['quantity'] ?> <span class="s1">only</span> <br>
													<?php $ex = explode('.', $q_r['rate']);  ?>
													<span class="dol"><?php echo ot_get_option('currency') ?></span><span class="price"><?php echo $ex[0]; ?></span><span class="smal"><?php echo $ex[1]; ?></span></p></a>
												   </li>	
													<?php endif ?>
												<?php endforeach; wp_reset_postdata(); ?> 

							   
										<?php endif; ?>


										</ul>
									</div>
									<?php endif; ?>
						
					</div>
					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
						<div class="quntites paddingTop20">
							<a href="/ticket-pricing-colors" title="">CLICK HERE</a>
							<p>For more Quantites or to start your order</p>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="ordering">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="order-area text-center">
							<h1>
								<?php echo ot_get_option('follow_me') ?>
							</h1>
						</div>
					</div>
				</div>
			</div>
		</div>

			<div class="custom">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<div class="printed marginTop50 paddingTop10 paddingBottom20">
							<?php echo ot_get_option('ticket_content') ?>
						</div>
					</div>

					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<div class="img-area marginTop20">
							
							<img class="img-responsive" src="<?php echo ot_get_option('ticket_image') ?>" alt="">
							<img class="img-bar" src="<?php echo ot_get_option('ticket_cartoon') ?>" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>

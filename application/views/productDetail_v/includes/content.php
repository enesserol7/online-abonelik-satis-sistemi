<!-- Single Candidate Start -->
<section class="single-candidate-page section_70">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-lg-6">
				<div class="single-candidate-box">
					<div class="single-candidate-img">
						<?php
						$image = get_product_cover_image($page->id);
						$image = ($image) ? base_url("panel/uploads/product_v/200x170/$image") : base_url("assets/images/portfolio-1.jpg");
						?>
						<img src="<?php echo $image; ?>" title="<?php echo $page->title; ?>" alt="<?php echo $page->title; ?>" />
					</div>
					<div class="single-candidate-box-right">
						<h4><?php echo $page->title; ?></h4>
					</div>
				</div>
			</div>
         <!--<div class="col-md-3 col-lg-6">
            <div class="single-candidate-action">
               <a href="#" class="candidate-contact"><i class="fa fa-star"></i>Bookmarks</a>
            </div>
        </div>-->
    </div>
</div>
</section>
<!-- Single Candidate End -->


<!-- Single Candidate Bottom Start -->
<section class="single-candidate-bottom-area section_70">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-lg-9">
				<div class="single-candidate-bottom-left">
					<div class="single-candidate-widget">
						<h3><?php echo $page->title; ?></h3>
						<?php echo $page->description; ?>
					</div>
					<br><hr><br>

					<div class="single-candidate-widget">
						<h3>Diğer Kampanyalar</h3>
						<?php foreach ($other_products as $other_product) { ?>
							<?php
							$image = get_product_cover_image($other_product->id);
							$image = ($image) ? base_url("panel/uploads/product_v/200x170/$image") : base_url("assets/images/portfolio-1.jpg");
							?>
							<div class="sidebar-list-single">
								<div class="top-company-list">
									<div class="company-list-logo">
										<a href="<?php echo base_url("kampanyalar/");echo $other_product->category_url; ?>/<?php echo $other_product->url; ?>">
											<?php
											$image = get_product_cover_image($other_product->id);
											$image = ($image) ? base_url("panel/uploads/product_v/200x170/$image") : base_url("assets/images/portfolio-1.jpg");
											?>
											<img src="<?php echo $image; ?>" title="<?php echo $other_product->title; ?>" alt="<?php echo $other_product->title; ?>">
										</a>
									</div>
									<div class="company-list-details text-center">
										<h3><a href="<?php echo base_url("kampanyalar/");echo $other_product->category_url; ?>/<?php echo $other_product->url; ?>"><?php echo $other_product->title; ?></a></h3>
										<div class="col-md-12">
											<table class="table table-condensed  text-center">
												<thead class="col-md-6 col-md-offset-1">
													<tr>
														<?php if ($other_product->hiz) { ?>
															<th><b>HIZ </b></th>
														<?php } ?>
														<?php if ($other_product->AKN) { ?>
															<th><b>AKN </b></th>
														<?php } ?>
														<?php if ($other_product->altyapi) { ?>
															<th><b>ALT YAPI</b></th>
														<?php } ?>
														<?php if ($other_product->dakika) { ?>
															<th><b>DAKİKA </b></th>
														<?php } ?>
														<?php if ($other_product->SMS) { ?>
															<th><b>SMS </b></th>
														<?php } ?>
														<?php if ($other_product->internet) { ?>
															<th><b>İNTERNET</b></th>
														<?php } ?>
														<th><b>FİYAT</b></th>
													</tr>
												</thead>
												<tbody class="col-md-6 col-md-offset-1">
													<tr>
														<?php if ($other_product->hiz) { ?>
															<td><?php echo $other_product->hiz; ?></td>
														<?php } ?>
														<?php if ($other_product->AKN) { ?>
															<td><?php echo $other_product->AKN; ?></td>
														<?php } ?>
														<?php if ($other_product->altyapi) { ?>
															<td><?php echo $other_product->altyapi; ?></td>
														<?php } ?>
														<?php if ($other_product->dakika) { ?>
															<td><?php echo $other_product->dakika; ?></td>
														<?php } ?>
														<?php if ($other_product->SMS) { ?>
															<td> <?php echo $other_product->SMS; ?></td>
														<?php } ?>
														<?php if ($other_product->internet) { ?>
															<td><?php echo $other_product->internet; ?></td>
														<?php } ?>
														<td><?php echo $other_product->price; ?>&#x20BA;<?php if ($other_product->price_2) { ?>  |  <?php echo $other_product->price_2; ?>&#x20BA;<?php } ?></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="company-list-btn">
										<a href="<?php echo base_url("kampanyalar/");echo $other_product->category_url; ?>/<?php echo $other_product->url; ?>" class="jobguru-btn">İncele</a>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-lg-3">
				<div class="single-candidate-bottom-right">
  <!--<div class="single-candidate-widget-2">
   <a href="#" class="jobguru-btn-2">
    <i class="fa fa-paper-plane-o"></i>
    Apply Now
  </a>
</div>-->
<div class="single-candidate-widget-2">
	<h3>Kampanya Bilgileri</h3>
	<ul class="job-overview">
		<?php if ($page->AKN) { ?>
			<li>
				<p><b>AKK : <?php echo $page->AKN; ?></b></p>
			</li>
		<?php } ?>
		<?php if ($page->altyapi) { ?>
			<li>
				<p><b>Alt Yapı : <?php echo $page->altyapi; ?></b></p>
			</li>
		<?php } ?>
		<?php if ($page->hiz) { ?>
			<li>
				<p><b>Hız : <?php echo $page->hiz; ?></b></p>
			</li>
		<?php } ?>
		<?php if ($page->dakika) { ?>
			<li>
				<p><b>Dakika : <?php echo $page->dakika; ?></b></p>
			</li>
		<?php } ?>
		<?php if ($page->SMS) { ?>
			<li>
				<p><b>SMS : <?php echo $page->SMS; ?></b></p>
			</li>
		<?php } ?>
		<?php if ($page->internet) { ?>
			<li>
				<p><b>İnternet : <?php echo $page->internet; ?></b></p>
			</li>
		<?php } ?>
		<?php if ($page->taahhut) { ?>
			<li>
				<p><b>Taahhüt : <?php echo $page->taahhut; ?></b></p>
			</li>
		<?php } ?>
		<li>
			<p> <b>Fiyat : <?php echo $page->price; ?>&#x20BA;<?php if ($page->price_2) { ?>  |  <?php echo $page->price_2; ?>&#x20BA;<?php } ?></b></p>

		</li>
	</ul>
</div>
<div class="single-candidate-widget-2">
	<?php echo $this->session->flashdata("alert"); ?>
	<h3>Hemen Başvur</h3>
	<form action="<?php echo base_url("basvur"); ?>" method="post">
		<p>
			<input type="text" name="name" placeholder="İsim & Soyisim">
		</p>
		<p>
			<input type="email" name="email" placeholder="E-Posta Adresi">
		</p>
		<p>
			<input type="tel" name="phone" placeholder="Telefon">
		</p>
		<p>
			<select name="il" id="il" class="form-control">
				<option value="">Sehir Seçin...</option>
			</select>  
		</p>
		<p>
			<select name="ilce" id="ilce" class="form-control" disabled="disabled">
				<option value="">İlçe Seçin...</option>
			</select>
		</p>
		<p>
			<textarea placeholder="Adresiniz" name="address"></textarea>
		</p>
		<p>
			<input type="hidden" name="brand" value="<?php echo $page->brand_url; ?>">
			<input type="hidden" name="product_id" value="<?php echo $page->id; ?>">
			<input type="hidden" name="product_title" value="<?php echo $page->title; ?>">
			<input type="hidden" name="product_price" value="<?php echo $page->price; ?>">
			<input type="hidden" name="AKN" value="<?php echo $page->AKN; ?>">
			<input type="hidden" name="altyapi" value="<?php echo $page->altyapi; ?>">
			<input type="hidden" name="hiz" value="<?php echo $page->hiz; ?>">
			<input type="hidden" name="dakika" value="<?php echo $page->dakika; ?>">
			<input type="hidden" name="SMS" value="<?php echo $page->SMS; ?>">
			<input type="hidden" name="internet" value="<?php echo $page->internet; ?>">
			<button type="submit">Başvur</button>
		</p>                   
	</form>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Single Candidate Bottom End -->

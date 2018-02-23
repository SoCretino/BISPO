<!DOCTYPE html>
<html lang="es-AR" itemscope="itemscope" itemtype="http://schema.org/WebPage">
	<head prefix="og: http://ogp.me/ns#">
		<?php include('meta-css.php'); ?>
	</head>
	<body>
		<?php include('header.php'); ?>
		<main class="main" role="main">
			<div class="slider-wrapper">
				<div class="slider-desktop">
					<div class="slide-desktop">
						<div class="slide-content content-1">
							<h1>Bater&iacute;as</h1>
							<h2 class="slider-subtitle">Alquiler de bater&iacute;as, tambores, platillos</h2>
						</div>
						<div class="slide-image">
							<img data-interchange="[img/slider1-mobile.jpg, small], [img/slider1.jpg, medium], [img/slider1.jpg, large]">
						</div>
					</div>
					<div class="slide-desktop">
						<div class="slide-content content-2">
							<h1>Guitarras</h1>
							<h2 class="slider-subtitle">Alquiler de guitarras, cables</h2>
						</div>
						<div class="slide-image">
							<img data-interchange="[img/slider2-mobile.jpg, small], [img/slider2.jpg, medium], [img/slider2.jpg, large]">
						</div>
					</div>
					<div class="slide-desktop">
						<div class="slide-content content-3">
							<h1>Bajos</h1>
							<h2 class="slider-subtitle">Alquiler de bajos</h2>
						</div>
						<div class="slide-image">
							<img data-interchange="[img/slider3-mobile.jpg, small], [img/slider3.jpg, medium], [img/slider3.jpg, large]">
						</div>
					</div>
					<div class="slide-desktop">
						<div class="slide-content content-3">
							<h1>Amplificadores</h1>
							<h2 class="slider-subtitle">Alquiler de equipos valvulares</h2>
						</div>
						<div class="slide-image">
							<img data-interchange="[img/slider4-mobile.jpg, small], [img/slider4.jpg, medium], [img/slider4.jpg, large]">
						</div>
					</div>
					<div class="slide-desktop">
						<div class="slide-content content-5">
							<h1>Sonido</h1>
							<h2 class="slider-subtitle">Alquiler de consolas y micr&oacute;fonos</h2>
						</div>
						<div class="slide-image">
							<img data-interchange="[img/slider5-mobile.jpg, small], [img/slider5.jpg, medium], [img/slider5.jpg, large]">
						</div>
					</div>
				</div>
			</div>
			<section class="backline-wrapper row align-center text-center">
				<?php 
					include 'mysql_connection.php'; 
					$query = "SELECT * FROM category";
					$result = $mysqli->query($query);
					$i = 1;
					while ($rows = $result->fetch_array(MYSQLI_ASSOC)):
						$category_id[$i] = $rows['id'];
						$category_name[$i] = $rows['name'];
						$category_description[$i] = $rows['description'];
						$category_image_path[$i] = $rows['image_path'];
						$i++;
					endwhile;
					$max_category = $i;
					for ($i=1; $i<$max_category; $i++) {
						$query = "SELECT MIN(price) as minprice FROM item WHERE category_id = $i";
						$result = $mysqli->query($query);
						while ($rows = $result->fetch_array(MYSQLI_ASSOC)):
							echo 
								'<div class="small-12 medium-4 columns">
									<a href="categoria.php?category_id=' . $category_id[$i] . '">
										<div class="backline-item">
											<img src="' . $category_image_path[$i] . '">
											<div class="backline-content">
												<span class="backline-content-category">' . $category_name[$i] . '</span>
											</div>
										</div>
									</a>
								</div>';
						endwhile;
					}
					$result->free();
					$mysqli->close();
				?>
			</section>
			<section class="our-brands text-center">
				<img src="img/brands.png" alt="Nuestras Marcas">
			</section>
			<section class="our-brands-mobile show-for-small-only text-center">
				<div class="slider-mobile">
					<div class="slide-mobile">
						<img src="img/brands/fender.png" width="269" height="100">
					</div>
					<div class="slide-mobile">
						<img src="img/brands/marshall.png" width="268" height="100">
					</div>
					<div class="slide-mobile">
						<img src="img/brands/pearl.png" width="240" height="100">
					</div>
					<div class="slide-mobile">
						<img src="img/brands/shure.png" width="322" height="100">
					</div>
					<div class="slide-mobile">
						<img src="img/brands/ampeg.png" width="81" height="100">
					</div>
					<div class="slide-mobile">
						<img src="img/brands/jbl.png" width="180" height="100">
					</div>
				</div>
			</section>
		</main>
		<?php include('footer.php'); ?>
		<?php include('scripts.php'); ?>
		<script src="js/flickity.pkgd.min.js"></script>
		<script>
		$(document).ready(function() {
			var isDraggable = false;
			if ( $(window).width() <= 630){
				isDraggable = true;
			}
			$('.slider-desktop').flickity({
				imagesLoaded: true,
				draggable: isDraggable,
				autoPlay: 5000,
				wrapAround: true,
				pageDots: false,
				pauseAutoPlayOnHover: false
			});
			$('.slider-mobile').flickity({
				imagesLoaded: true,
				draggable: true,
				autoPlay: 2500,
				wrapAround: true,
				pageDots: false,
				pauseAutoPlayOnHover: false
			});
			
		});
		</script>
	</body>
</html>
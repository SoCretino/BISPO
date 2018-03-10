<!DOCTYPE html>
<html lang="es-AR" itemscope="itemscope" itemtype="http://schema.org/WebPage">
	<head prefix="og: http://ogp.me/ns#">
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-63059865-3"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', 'UA-63059865-3');
		</script>
		<?php
			include 'mysql_connection.php'; 
			$get_item_id = $_GET['item_id'];
			$query = "SELECT * FROM item WHERE id = $get_item_id";
			$result = $mysqli->query($query);
			while ($rows = $result->fetch_array(MYSQLI_ASSOC)):
				$name = $rows['name'];
				$price = $rows['price'];
				$description = $rows['description'];
			endwhile;
			$result->free();
			$mysqli->close();
		?>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="description" content="<?php echo $description ?>">
		<meta itemprop="description" content="<?php echo $description ?>">
		<meta itemprop="name" content="BISPO">
		<meta itemprop="image" content="http://bispo.info/img/logo_social.png">
		<meta property="og:type" content="website">
		<meta property="og:description" content="$<?php echo $price ?> por jornada">
		<meta property="og:title" content="Alquilar <?php echo $name ?> - BISPO Backline">
		<meta property="og:site_name" content="BISPO">
		<meta property="og:locale" content="es_LA">
		<meta property="og:url" content="http://bispo.info/item.php?item_id=<?php echo $_GET['item_id']?>">
		<meta property="og:image" content="http://bispo.info/img/item/<?php echo $_GET['item_id']?>.jpg">
		<title><?php echo $name ?> | BISPO</title>
		<link rel="canonical" itemprop="url" href="http://bispo.info/"/>
		<link rel="stylesheet" href="css/normalize.min.css" type="text/css"/>
		<link rel="stylesheet" href="css/foundation.min.css" type="text/css"/>
		<link rel="stylesheet" href="css/flickity.min.css" type="text/css"/>
		<link rel="stylesheet" href="css/hamburgers.min.css" type="text/css">
		<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css"/>
		<link href="https://fonts.googleapis.com/css?family=Roboto|Montserrat" rel="stylesheet"> 
		<link rel="stylesheet" href="css/style.css" type="text/css"/>
		<!--[if IE]>
			<script type="text/javascript">
				window.location = "ie.html";
			</script>
		<![endif]-->
		<script type="application/ld+json">
			{
				"@context": "http://schema.org",
				"@type": "Service",
				"serviceType": "Alquiler de Backline y Sonido",
				"provider": {
					"@type": "LocalBusiness",
					"url": "http://bispo.info/",
					"name": "BISPO",
					"logo": "http://bispo.info/img/logo_social.png",
					"image": "http://bispo.info/img/slider5.jpg",
					"email": ["bispoargentina@gmail.com"],
					"telephone": "+541121149417",
					"openingHours": "Mo,Tu,We,Th,Fr,Sa,Su 15:00-23:00",
					"sameAs": [
						"https://www.facebook.com/Bispo-Argentina-1626848107358742/",
						"https://www.instagram.com/bispoargentina/",
						"https://www.youtube.com/channel/UCXQ2pEPIbK-7Edz5Op5W8cg"
					]
				},
				"areaServed": {
					"@type": "Country",
					"name": "Argentina"
				}
			}
		</script>
	</head>
	<body>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.10";
			fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
		<?php include('header.php'); ?>
		<main class="main justabit" role="main">
			<?php 
				$get_item_id = $_GET['item_id'];
				include 'mysql_connection.php'; 
				$query = "SELECT * FROM item WHERE id = $get_item_id";
				$result = $mysqli->query($query);
				while ($rows = $result->fetch_array(MYSQLI_ASSOC)):
					echo
						'<div class="row item">
							<div class="item-border-right medium-6 small-12 align-center columns">
								<img src="' . $rows['image'] . '">
							</div>
							<div class="item-content medium-6 small-12 columns">
								<h3 class="item-name">' . $rows['name'] . '</h3>
								<h4>$ ' . $rows['price'] . '<span class="jornadita">, por jornada</span></h4>
								<p class="item-description">' . nl2br($rows['description']) . '</p>
								<div class="item-social-share fb-share-button" data-href="http://bispo.info/item.php?item_id=' . $get_item_id . '" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fbispo.info%2Fitem.php%3Fitem_id%3D' . $get_item_id .'&amp;src=sdkpreparse">Compartir</a>
								</div>
							</div>
						</div>'
					;
				endwhile;
				$result->free();
				$mysqli->close();
			?>
		</main>
		<?php include('footer.php'); ?>
		<?php include('scripts.php'); ?>
	</body>
</html>
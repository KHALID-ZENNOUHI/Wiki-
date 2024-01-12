<!DOCTYPE HTML>
<html>
	<head>
		<title>Wiki™</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

		<link rel="stylesheet" href="assets/assetsClient/css/main.css" />
		<script src="sweetalert2.all.min.js"></script>
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
                            <?php include(__DIR__ . '/../partials/partialsClient/header.php'); ?>

							<!-- Banner -->
								<section id="banner">
									<div class="content">
										<?php if (!isset($_SESSION['id'])) {?>
										<header>
											<h1>Hi, Welcome in <br />
											Wiki™</h1>
											<p>Unlock the power of your expertise!</p>
										</header>
										<p>Share your insights and contribute an article to our website's Wiki™ – a platform where your knowledge can make a lasting impact.</p>
										<ul class="actions">
											<li><a href="register" class="button big">SignUp</a></li>
										</ul>
										<?php }else{?>
										<header>
										<h1>Hi, <?= $_SESSION['name'] ?><br />
										Author</h1>
										<p>Unlock the power of your expertise!</p>
										</header>
										<p>Share your insights and contribute an article to our website's wiki – a platform where your knowledge can make a lasting impact.</p>
										<ul class="actions">
											<li><a href="viewWikiadd" class="button big">Add New Wikis</a></li>
										</ul>	
										<?php }?>
									</div>
									<span class="image object">
										<img src="assets/assetsClient/images/2000px-Wikipedia-logo-v2-en-S-ezgif.com-webp-to-jpg-converter.jpg" alt="" />
									</span>
								</section>

							<!-- Section -->
								<!-- <section>
									<header class="major">
										<h2>Erat lacinia</h2>
									</header>
									<div class="features">
										<article>
											<span class="icon fa-diamond"></span>
											<div class="content">
												<h3>Portitor ullamcorper</h3>
												<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											</div>
										</article>
										<article>
											<span class="icon fa-paper-plane"></span>
											<div class="content">
												<h3>Sapien veroeros</h3>
												<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											</div>
										</article>
										<article>
											<span class="icon fa-rocket"></span>
											<div class="content">
												<h3>Quam lorem ipsum</h3>
												<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											</div>
										</article>
										<article>
											<span class="icon fa-signal"></span>
											<div class="content">
												<h3>Sed magna finibus</h3>
												<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											</div>
										</article>
									</div>
								</section> -->

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Articles</h2>
									</header>
									<div class="posts">
										<?php 
										if (isset($wikis)) {
											foreach ($wikis as $wiki) {?>
											<article>
											<a href="#" class="image"><img src="assets/assetsClient/images/<?= $wiki->image_path?>" idth="416" height="256" alt="" /></a>
											<h3><?= $wiki->title?></h3>
											<p><?= $wiki->description?></p>
											<ul class="actions">
												<li><a href="/wikicontent?id=<?= $wiki->id?>" class="button">More</a></li>
											</ul>
										</article>
										<?php }}else{?>
										<?php }?>
									</div>
								</section>

						</div>
					</div>

				<!-- Sidebar -->
				<?php include(__DIR__ . '/../partials/partialsClient/sidebar.php'); ?>

			</div>

		<!-- Scripts -->
			<script src="assets/assetsClient/js/jquery.min.js"></script>
			<script src="assets/assetsClient/js/skel.min.js"></script>
			<script src="assets/assetsClient/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/assetsClient/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/assetsClient/js/main.js"></script>

	</body>
</html>
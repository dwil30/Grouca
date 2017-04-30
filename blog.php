
		<?php require_once('include/header.php'); ?>

		<body class="blog">

			<?php require_once('include/navigation_bar_blog.php'); ?>

			<div class="blog">

				<div class="main">

					<!-- Header -->
					<h2 class="underline">
						<span>What&#039;s new</span>
						<span></span>
					</h2>
					<!-- /Header -->

					<!-- Layout 66x33 -->
					<div class="layout-p-66x33 clear-fix">

						<!-- Left column -->
						<div class="column-left">

							<!-- Posts list -->
							<ul class="post-list post-list-2">

								<!-- Post #1 -->
								<li class="clear-fix">

									<!-- Date -->
									<div class="post-list-date">
										<div class="post-date-box">
											<h3>25</h3>
											<span>Aug</span>
										</div>
									</div>
									<!-- /Date -->

									<!-- Image + comments count -->
									<div class="post-list-image">
										<!-- Comments count -->
										<div class="post-comment-count-box">
											<h3>3</h3>
											<span>Replies</span>
										</div>
										<!-- /Comments count -->
										<!-- Image -->
										<div class="image image-overlay-url image-fancybox-url">
											<a href="post.php" class="preloader-image">
												<img src="_sample/blog/image_01.jpg" alt=""/>
											</a>
										</div>
										<!-- /Image -->
									</div>
									<!-- /Image + comments count -->

									<!-- Content -->
									<div class="post-list-content">
										<div>
											<!-- Header -->
											<h4><a href="post.php">Insurers paying too much commission to win pensions business</a></h4>
											<!-- /Header -->
											<!-- Excerpt -->
											<p>
												Integer vitae tristique metus, nec sagittis massa. Proin ultrices augue site velit, ut porttitor dui blandit et. 
												Sed lobortis pretium vol felis, a interdum urna metus eget purus. Pellentesque augueli neque, condimentum 
												a elit eu, egestas condimentum [...]
											</p>
											<!-- /Excerpt -->
											<!-- Categories + author -->
											<div class="post-info-bar">
												<div class="post-info-bar-category">
													<a href="#">News</a>,
													<a href="#">Poster</a>,
													<a href="#">Design</a>
												</div>
												<div class="post-info-bar-author"><a href="#">Dawid</a></div>
											</div>
											<!-- /Categories + author -->
										</div>
									</div>
									<!-- /Content -->

								</li>
								<!-- /Post #1 -->

								<!-- Post #2 -->
								<li class="clear-fix">

									<div class="post-list-date">
										<div class="post-date-box">
											<h3>03</h3>
											<span>Jun</span>
										</div>
									</div>

									<div class="post-list-image">
										<div class="post-comment-count-box">
											<h3>5</h3>
											<span>Replies</span>
										</div>
										<div class="image image-overlay-url image-fancybox-url">
											<a href="post.php" class="preloader-image">
												<img src="_sample/blog/image_02.jpg" alt=""/>
											</a>
										</div>
									</div>

									<div class="post-list-content">
										<div>
											<h4><a href="post.php">Backing for advice centres that could save people up to $15 billions a year</a></h4>
											<p>
												In lacinia turpis a scelerisque pharetra. Mauris rhoncus orciss purus, ac auctor arcu lobortis vel. 
												Etiam quis blandit neque id rutrum justo eleifen suspendisse tincidunt feugiat sodales. Donecel tempus libero eros, 
												non consectetur erat tempor quis [...]
											</p>
											<div class="post-info-bar">
												<div class="post-info-bar-category">
													<a href="#">Photography</a>,
													<a href="#">Design</a>,
													<a href="#">News</a>
												</div>
												<div class="post-info-bar-author"><a href="#">Adam</a></div>
											</div>
										</div>
									</div>

								</li>
								<!-- /Post #2 -->

								<!-- Post #3 -->
								<li class="clear-fix">

									<div class="post-list-date">
										<div class="post-date-box">
											<h3>11</h3>
											<span>Apr</span>
										</div>
									</div>

									<div class="post-list-image">
										<div class="post-comment-count-box">
											<h3>23</h3>
											<span>Replies</span>
										</div>
										<div class="image image-overlay-url image-fancybox-url">
											<a href="post.php" class="preloader-image">
												<img src="_sample/blog/image_03.jpg" alt=""/>
											</a>
										</div>
									</div>

									<div class="post-list-content">
										<div>
											<h4><a href="post.php">Atrium grabs the biggest share of new personal finance market to date</a></h4>
											<p>
												Nunc facilisis rutrum odio ut malesuada. Donec pulvinar velit feugiat ale justo, quis ornare ante. 
												Etiam at porttitor libero. Fusce mattis purus lore ipsum et placerat nunc egestas vitae. 
												Praesent ac quam ut urna mattis at aliquam ac tincidunt lorem [...]
											</p>
											<div class="post-info-bar">
												<div class="post-info-bar-category">
													<a href="#">Music</a>,
													<a href="#">Coding</a>,
													<a href="#">General</a>
												</div>
												<div class="post-info-bar-author"><a href="#">Mark</a></div>
											</div>
										</div>
									</div>

								</li>
								<!-- /Post #3 -->

							</ul>
							<!-- /Posts list -->
							
							<!-- Pagination -->
							<ul class="blog-pagination clear-fix">
								<li><a href="#">1</a></li>
								<li><a href="#" class="selected">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
							</ul>
							<!-- /Pagination -->

						</div>
						<!-- Left column -->

						<!-- Right column -->
						<div class="column-right">
							<?php require_once('include/sidebar.php'); ?>
						</div>
						<!-- /Right column -->

					</div>
					<!-- /Layout 66x33 -->

				</div>

			</div>

			<?php require_once('include/twitter_user_timeline.php'); ?>
			<?php require_once('include/footer_blog.php'); ?>
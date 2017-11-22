<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
	<body <?php body_class(); ?>>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'oleincorp' ); ?></a>
			<header id="masthead" class="site-header">
				<div class="container site-header__inner">
					<h1 class="site-name">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<span class="screen-reader-text"><?php bloginfo( 'name' ); ?></span>
							<img class="site-logo" src="<?php echo get_template_directory_uri(); ?>/images/oleindesign-mark.svg" alt="Olein Design Mark">
						</a>
					</h1>
				</div>
			</header>
			<div id="primary" class="site-content">
				<main id="content" class="container site-content__inner">
				<?php
					if ( have_posts() ) :
						if ( is_home() && ! is_front_page() ) :
				?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
				<?php
						endif;
						while ( have_posts() ) : the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-body' ); ?>>
					<header class="entry-header">
						<?php
						if ( is_singular() ) :
							the_title( '<h1 class="entry-title">', '</h1>' );
						else :
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						endif;
						?>
						<ul class="meta">
							<li class="published-date">
								<span class="screen-reader-text">投稿日</span>
								<?php the_time( 'Y/m/d'); ?></li>
							<?php if ( get_the_modified_date( 'Y/m/d' ) != get_the_time( 'Y/m/d' ) ) : ?>
							<li class="modified-date">
								<span class="screen-reader-text">更新日</span>
								<?php the_modified_date( 'Y/m/d' ); ?>
							</li>
							<?php endif; ?>
							<li class="cat">
								<span class="screen-reader-text">カテゴリー</span>
								<?php the_category( ', ' ); ?>
							</li>
							<?php if ( get_the_tags() ): ?>
							<li class="tag">
								<?php the_tags( '<span class="screen-reader-text">タグ</span>', ', ' ); ?>
							</li>
							<?php endif; ?>
						</ul>
					</header>
					<figure class="entry-thumbnail">
						<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail();
						} else { ?>
							<img src="https://placehold.jp/800x600.png" alt="">
						<?php } ?>
					</figure>
				</article>
				<?php
						endwhile;
						the_posts_navigation();
					else :
				?>
				<p>投稿がありません</p>
				<?php endif; ?>
				</main>
			</div>
			<footer id="colophone" class="site-footer">

			</footer>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>

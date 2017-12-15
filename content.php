<?php
/**
* @package themefisher
*/
?>
<!-- Blog Page -->
	
	<div class="col-md-6">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>">
					<?php echo  the_post_thumbnail( array(500, 300) );  ?>

				</a>
			</div>
			<div class="post-content">
				<header class="entry-header">
				<h1 class="post-title"><a href="<?php the_permalink(); ?> "><?php echo the_title(); ?></a></h1>
				<?php if ( 'post' == get_post_type() ) : ?>
				<?php endif; ?>
			</header><!-- .entry-header -->
			<div class="entry-meta post-meta">
                <ul>
					 <li>
                         <i class="tf-ion-android-person"></i>
						 <?php  the_author(); ?>
					</li>
					<li>
                        <i class="tf-ion-ios-calendar"></i> 	<time class="time" itemprop="datePublished"><i class="ion-ios-clock-outline"></i><?php echo get_the_time("M d, Y"); ?></time>
					</li>
					<li>
                        <i class="tf-ion-ios-pricetags"></i>  <?php echo the_category(","); ?>
                    </li>

				</ul>
			</div>
			<div class="entry-content post-content">
				<p><?php echo substr(get_the_excerpt(), 0,250); ?></p>
				<a class="btn btn-main-sm m-t-20" href="<?php the_permalink(); ?>">Read More</a>
			</div>	
			</div>
			
		</article><!-- #post-## -->
		
	</div>


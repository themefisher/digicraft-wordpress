<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package furioustheme
 */

get_header(); ?>


	<!-- Content Wrapper -->
	<div class="page-404-wrapper">
		<div class="container">

			<!-- Number -->
			<div class="number"></div>
			<!-- end Number -->

			<div class="clearfix"></div>

			<!-- Child -->
			<div class="child">
				<div class="mouth"></div>
				<div class="hand"></div>
			</div>
			<!-- end Child -->

			<!-- Info -->
			<div class="info">
				<h2>Ooh boy! Looks like <br />someone's is troubles...</h2>
				<p>The page you are looking for was moved, removed, renamed or <br />might never existed.</p>
				<a href="<?php bloginfo( 'url' );?>" class="btn btn-home">Go Home</a>
			</div>
			<!-- end Info -->

		</div>
		<!-- end container -->
	</div>
	<!-- end Content Wrapper -->

<?php
get_footer();

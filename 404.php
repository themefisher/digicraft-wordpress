<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package digicraft
 */

get_header(); ?>

	<div class="page-404-wrapper">
		<div class="container">
			<div class="col-md-12">
				<div class="block">
					<h1>404</h1>
					<p>The page you are looking for was moved, removed, renamed or <br />might never existed.</p>
					<a href="<?php bloginfo( 'url' );?>" class="btn btn-main">Go Home</a>
				</div>
				
			</div>
		</div>
	</div>

<?php
get_footer();

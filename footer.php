<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package themefisher
 */

?>



</section>
    <!--End Wrapper-->
<?php if (get_theme_mod('footer_copyright_text')): ?>
	<footer id="footer" class="bg-one">
	    <div class="footer-bottom">
	    	<?php echo get_theme_mod('footer_copyright_text'); ?>
	    </div>
	</footer> <!-- end footer -->
	
<?php endif ?>

<?php wp_footer(); ?>
</body>
</html>
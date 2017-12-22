<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package digicraft
 */

?>



</section>


<!-- <footer class="footer top-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Name of Widgetized Area") ) : ?>
                <?php endif;?>
                
            </div>
        </div>
    </div>
</footer>


 -->


    <!--End Wrapper-->
<?php if (get_theme_mod('footer_copyright_text')): ?>
	<footer class="footer-bottom">
	    <div class="footer-bottom">
	    	<p><?php echo get_theme_mod('footer_copyright_text'); ?></p>
	    </div>
	</footer> <!-- end footer -->
	
<?php endif ?>

<?php wp_footer(); ?>
</body>
</html>
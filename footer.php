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

 <footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-5">
                <div class="block">
                    <h4>About Us</h4>
                    <p>
                        We create free and premium html5 templates. We thrive on bringing you the best of the best in each of our beautifully crafted resources. Share the love around, enjoy it at will, and be sure to give us your feedback to make themefisher your favorite place to hang out. 
                        © Copyright 2016 Themefisher.

                    </p>
                </div>
            </div>
            <div class="col-md-3 col-xs-3" >
                <h4>Company</h4>
                <?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_id' => 'footer-menu','menu_class'=>' footer-menu' ) ); ?>
                <!--  -->
            </div>
            <div class="col-md-3 col-xs-4">
                <h4>Follow Us</h4>
                <ul class="social-media-icons">
                    <li>
                        <a class="fb" href="https://www.facebook.com/themefisher"><i class="tf-ion-social-facebook"></i> Facebook</a>
                    </li>
                    <li>
                        <a class="twitter" href="https://twitter.com/themefisher"><i class="tf-ion-social-twitter"></i> Twitter</a>
                    </li>
                    <li>
                        <a class="pinterest" href="https://www.pinterest.com/themefisher/"><i class="tf-ion-social-pinterest-outline"></i> Pinterest</a>
                    </li>
                    <li>
                        <a class="dribbble" href="https://www.dribbble.com/themefisher/"><i class="tf-ion-social-dribbble-outline"></i> Dribbble</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>


    
</div><!-- #page -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48954233-1', 'auto');
  ga('send', 'pageview');

</script>

<!-- Hotjar Tracking Code for themefisher.com -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:101827,hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
</script>




<?php wp_footer(); ?>




  <script type="text/javascript">
    jQuery( document ).ready(function() {
      jQuery(window).scroll(function() {    
      var scroll = jQuery(window).scrollTop();
       //console.log(scroll);
      if (scroll >= 300) {
          jQuery(".overly-product-header").addClass("fixed");
      } else {
          //console.log('a');
          jQuery(".overly-product-header").removeClass("fixed");
      }
      });
      // Smooth Scroll Code Start
        smoothScroll.init();

      // Blog Post Sticky Menu
        jQuery(window).scroll(function() {    
        var scroll = jQuery(window).scrollTop();
         //console.log(scroll);
        if (scroll >= 800) {
            jQuery(".post-sticky-menu").addClass("fixed");
        } else {
            jQuery(".post-sticky-menu").removeClass("fixed");
        }
        });



    });
    </script>





</body>
</html>
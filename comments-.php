<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package digicraft
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-1">
                <div id="comments-section">
                    <div id="disqus_thread"></div>
                    <script type="text/javascript">
                    /* * * CONFIGURATION VARIABLES * * */
                        var disqus_shortname = 'themefisher';

                        /* * * DON'T EDIT BELOW THIS LINE * * */
                        (function() {
                        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
                </div>
            </div>
        </div>
    </div>
</section>
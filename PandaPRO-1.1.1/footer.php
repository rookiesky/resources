<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package Panda PRO
 */
$panda_option = get_option('panda_option');
$footer_bottom = $panda_option['footer_bottom'];
$footer_text = $footer_bottom['footer_text'];
$miitbeian = $footer_bottom['miitbeian'];
$miitbeian_button = $footer_bottom['miitbeian_button'];
$gabeian_button = $footer_bottom['gabeian_button'];
$gabeian = $footer_bottom['gabeian'];
$gabeian_link = $footer_bottom['gabeian_link'];
?>

<footer class="footer bg-dark py-3 py-lg-4">
    <div class="container">
        <div class="d-lg-flex flex-md-fill align-items-lg-center">
            <div class="d-lg-flex flex-lg-column mr-lg-4">
                <?php if ( function_exists( 'wp_nav_menu' ) && has_nav_menu('footer-menu') ) {?>
                    <div class="footer-menu">
                        <ul>
                            <?php  wp_nav_menu( array(  'container'=> false , 'theme_location' => 'footer-menu' , 'items_wrap' => '%3$s','depth'=>1) ); ?>
                        </ul>
                    </div>
                <?php } ?>
                <div class="footer-copyright text-xs">
        			<?php
                        if ($gabeian_button) : $footer_text .= ' <a href="'.$gabeian_link.'" target="_blank" rel="nofollow"><i class="icon icon-beian"></i>'.$gabeian.'</a> '; endif;
                        if ($miitbeian_button) : $footer_text .= ' <a href="http://beian.miit.gov.cn/" target="_blank" rel="nofollow">'.$miitbeian.'</a>'; endif;
                        echo 'Copyright © '.pandapro_get_footer_year().' <a href="'.get_bloginfo('url').'" title="'.get_bloginfo('name').'" rel="home">'.get_bloginfo('name').'</a>. Designed by <a href="https://www.nicetheme.cn" title="nicetheme奈思主题-资深的原创WordPress主题开发团队" target="_blank">nicetheme</a>. '.$footer_text;
                    ?>
        		</div>
            </div>
            <div class="flex-lg-fill"></div>
            <div class="mt-3 mt-lg-0 mx-n1 flex-shrink-0">
                <?php get_template_part('template-parts/social-connect') ?>
            </div>
        </div>
        <?php if ((is_home() || $panda_option['links_global']) && $panda_option['links'] === '1'): ?>
        <div class="footer-links border-top border-secondary pt-3 mt-3 text-xs">
            <?php $links_cat = get_term($panda_option['links_cat'], 'link_category'); ?>
            <span><?php echo is_wp_error($links_cat) ? __('Partners: ', 'pandapro') : $links_cat->name.': ' ?></span>
            <?php
                $bookmarks = get_bookmarks(array(
                    'orderby' => 'rating',
                    'category' => $panda_option['links_cat']
                ));
            ?>
            <?php foreach($bookmarks as $bookmark): ?>
                <a href="<?php echo $bookmark->link_url ?>" target="<?php echo $bookmark->link_target ?>"><?php echo $bookmark->link_name ?></a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</footer>
<a href="javascript:void(0)" id="scroll_to_top" class="btn btn-primary btn-icon scroll-to-top"><span><i class="text-lg iconfont icon-arrow-up-fill"></i></span></a>
<div class="mobile-overlay"></div>
<?php wp_footer(); ?>
</body>
</html>
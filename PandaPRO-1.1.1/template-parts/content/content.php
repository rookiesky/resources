<?php 
    $panda_option = get_option('panda_option');
    $mod_mode = $panda_option['mod_mode'] ?? false;
    $category = get_the_category(); 
?>
<main class="py-3 py-md-5">
    <div class="container">
        <?php pandapro_breadcrumbs() ?>
        <div class="row">
            <div class="col-lg-8">
                <div class="post card">
                    <div class="card-body">
                        <div class="post-header border-bottom border-light mb-4 pb-3 pb-md-4">
                            <div class="">
                                <a href="<?php echo get_category_link($category[0]->term_id ); ?>" target="_blank" class="d-inline-block"><span class="d-block badge badge-primary">#<?php echo $category[0]->cat_name; ?>#</span></a>
                            </div>
                            <h1 class="h3 mb-3"><?php the_title() ?><?php edit_post_link(__('Edit', 'pandapro'), '<small class="mx-2">[', ']</small>'); ?></h1>
                            <?php get_template_part('template-parts/post-meta') ?>
                            <div class="border-theme bg-primary"></div>
                        </div>
                        <?php get_template_part('template-parts/ad/single-ad'); ?>
                        <div class="post-content">
                            <?php get_template_part('template-parts/post-content-control'); ?>
                        </div>
                        <?php get_template_part('template-parts/post-share-section') ?>
                    </div>
                </div>
                <?php the_tags( '<div class="post-tags block d-flex text-sm p-4"><i class="text-xl text-primary iconfont icon-price-tag--line mr-3"></i><div class="flex-fill"><span class="d-inline-block text-muted mr-2"># ', '</span><span class="d-inline-block text-muted mr-2"># ', '</span></div></div>' ); ?>
               
                <?php get_template_part('template-parts/ad/single-footer-ad'); ?>
                <?php get_template_part('template-parts/related-posts') ?>
                <?php
                    if ( (comments_open() || get_comments_number()) ) :
                        if (($mod_mode && is_user_logged_in()) || !$mod_mode) {
                            comments_template();
                        }
                    endif;
                ?>
            </div>
            <?php get_sidebar() ?>
        </div>
    </div>
</main>
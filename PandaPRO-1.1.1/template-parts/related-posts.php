<?php $panda_option = get_option('panda_option') ?>
<?php if ($panda_option['related_posts']): ?>
<?php

    $post_tags = get_the_tags() ? get_the_tags() : array();
    $exclude_id = get_the_ID();
    $cats = get_the_category();

    $args = array(
        'type'                => 'post',
        'tax_query' => array(
            'relation' => 'OR',
            array(
                'taxonomy' => 'post_tag',
                'field' => 'id',
                'terms' => array_column($post_tags, 'term_id'),
            ),
            array(
            'taxonomy' => 'category',
                'field' => 'id',
                'terms' => array_column($cats, 'term_id'),
                'include_children' => false 
            )
        ),
        'post__not_in'        => array(get_the_ID()),
        'posts_per_page'      => $panda_option['related_posts_number'],
        'ignore_sticky_posts' => 1,
    );

    $recentPosts = new WP_Query($args);
?>
    <?php if ($recentPosts->have_posts()): ?>
    <section class="list-related">
        <div class="my-3"><i class="text-xl text-primary iconfont icon-refresh-line mr-2"></i><span class="text-sm align-middle"><?php _e('Related Posts', 'pandapro') ?></span></div>
        <div class="content-related card">
            <div class="card-body">
                <div class="list list-dots my-n2">
                    <?php while ($recentPosts->have_posts()) : ?>
                        <?php $recentPosts->the_post(); ?>
                        <div class="list-item py-2">
                            <a href="<?php the_permalink() ?>" target="_blank" class="list-title h-2x">
                                <?php the_title() ?>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>
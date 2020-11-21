<?php $panda_option = get_option('panda_option'); ?>
<?php $slides = $panda_option['index_featured_slides']; ?>
<?php if ( is_array($slides) && count($slides) > 0 ) : ?>
    <div class="list-banner list-rounded banner-style-3 banner-has-nav pt-3 pt-md-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="owl-carousel owl-theme">
                        <?php foreach($slides as $slide): ?>
                            <div class="card item list-item list-overlay-content m-0">
                                <div class="media media-2x1">
                                    <a class="media-content" target="_blank" href="<?php echo $slide['link']['url'] ?>" style="background-image: url(<?php echo timthumb($slide['image'], array('w' => 800, 'h' => 400)) ?>)"><div class="overlay-grad"></div></a>
                                </div>
                                <?php if ($slide['link']['title']): ?>
                                <div class="list-content text-center text-lg-left p-2 p-md-3">
                                    <div class="list-body">
                                        <a href="<?php echo $slide['link']['url'] ?>" target="_blank" class="h4 text-white h-2x m-0"><?php echo $slide['link']['title'] ?></a>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php
                    $right = $panda_option['index_slides_style3_right'];
                    $type = $right['type'] ?? 'post';
                ?>
                <?php if ($type === 'post'): ?>
                    <?php global $post; $post = get_post($right['post'])  ?>
                    <?php if ($post): ?>
                        <?php
                            $category = get_the_category($right['post']);
                        ?>
                        <div class="col-lg-4 d-none d-lg-flex">
                            <div class="list-item block list-overlay-content list-overlay-top d-md-flex flex-md-fill mb-0">
                                <div class="media d-md-flex flex-md-fill">
                                    <a class="media-content" href="<?php the_permalink() ?>" target="_blank" style="background-image: url(<?php pandapro_the_thumbnail($post) ?>);"><div class="overlay-grad-top"></div></a>
                                </div>
                                <div class="list-content">
                                    <div class="list-body ">
                                        <a href="<?php echo get_category_link($category[0]->term_id ); ?>" target="_blank" class="list-title text-sm text-muted"><?php echo $category[0]->name; ?></a>
                                    </div>
                                    <div class="list-footer text-xl mt-1">
                                        <?php the_title() ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php wp_reset_postdata() ?>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($type === 'category' || $type === 'special'): ?>
                    <?php $term = get_term($right[$type], $type) ?>
                    <?php if (!is_wp_error($term)): ?>
                        <div class="col-lg-4 d-none d-lg-flex">
                            <div class="list-item block list-overlay-content list-overlay-top d-md-flex flex-md-fill mb-0">
                                <div class="media d-md-flex flex-md-fill">
                                    <a class="media-content" href="<?php echo get_term_link($term, $type) ?>" target="_blank" style="background-image: url(<?php pandapro_the_category_cover($term->term_id) ?>);"><div class="overlay-grad-top"></div></a>
                                </div>
                                <a href="<?php echo get_term_link($term, $type) ?>" target="_blank" class="list-content">
                                    <div class="list-body ">
                                        <div class="list-title text-sm text-muted"><?php echo $term->name ?></div>
                                    </div>
                                    <div class="list-footer text-xl text-white mt-1">
                                        <?php echo $term->description ?>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
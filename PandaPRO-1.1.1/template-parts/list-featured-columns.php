<?php
    $panda_option = get_option('panda_option');
?>
<?php if ($panda_option['index_featured_columns_switch'] ?? false): ?>
<div class="list-featured list-scroll-x mb-3 mb-md-4">
    <div class="row row-sm list-grouped my-n2">
        <?php foreach(($panda_option['index_featured_columns'] ?? array()) as $column): ?>
        <?php 
            $type = $column['type'] ?? 'category';
            $term = get_term($column[$type], $type);
        ?>
            <?php if (!is_wp_error($term)): ?>
                <?php $cover = get_term_meta($term->term_id, 'cover', true) ?>
                <div class="col-6 col-md-4 d-flex py-2">
                    <div class="list-item block m-0">
                        <div class="media media-21x9">
                            <a class="media-content" href="<?php echo get_term_link($term) ?>" target="_blank" style="background-image: url(<?php echo timthumb($cover) ?>);"></a>
                        </div>
                        <div class="list-content p-1 p-md-2">
                            <div class="list-body text-center">
                                <a href="<?php echo get_term_link($term) ?>" target="_blank" class="list-title"><?php echo $term->name ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach ?>
    </div>
</div>
<?php endif; ?>
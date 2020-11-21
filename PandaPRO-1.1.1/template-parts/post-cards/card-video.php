<?php global $post ?>
<div class="list-item block card-plain ">
    <div class="media media-3x2 col-4 col-md-4">
        <a class="media-content" href="<?php the_permalink() ?>" target="_blank" title="<?php the_title() ?>" style="background-image:url('<?php pandapro_the_thumbnail() ?>')"></a>
        <div class="media-action ">
            <button class="btn btn-icon btn-rounded btn-md">
                <i class="text-xl iconfont icon-play-fill"></i>
            </button>
        </div>
    </div>
    <div class="list-content">
        <div class="list-body">
            <a href="<?php the_permalink() ?>" title="<?php the_title() ?>" target="_blank" class="list-title text-lg h-2x"><?php pandapro_the_sticky_tag(); pandapro_the_featured_tag(); ?><?php the_title() ?></a>
            <div class="list-desc d-none d-md-block text-sm text-secondary my-3">
                <div class="h-2x "><?php pandapro_print_excerpt(80) ?></div>
            </div>
        </div>
        <div class="list-footer">
			<?php get_template_part("template-parts/post-cards/card-meta"); ?>            
        </div>
    </div>
</div>
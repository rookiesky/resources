<?php $template_params = isset($template_params) ? $template_params : array() ?>
<?php if ($template_params['ajax_loading']): ?>
    <div class="ajax-loading">
        <div class="d-flex justify-content-center">
            <div class="spinner-border spinner-border-sm text-primary text-center" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    <div class="list-ajax-load">
        <button
            type="button" 
            class="dposts-ajax-load btn btn-outline-light btn-block text-sm"
            data-page="<?php echo $template_params['page'] ?>"
            data-query="<?php echo $template_params['query']; ?>"
            data-action="ajax_load_posts"
            data-paged="2"
            data-append="<?php echo $template_params['append'] ?>"
        ><?php _e('Load more...', 'pandapro') ?></button>
    </div>
<?php else: ?>
    <?php
        the_posts_pagination( array(
            'prev_text'          =>'<span class="btn btn-light btn-icon btn-rounded btn-sm"><span><i class="text-md iconfont icon-arrow-left-s-line"></i></span></span>',
            'next_text'          =>'<span class="btn btn-light btn-icon btn-rounded btn-sm"><span><i class="text-md iconfont icon-arrow-right-s-line"></i></span></span>',
            'screen_reader_text' => 'Posts Navigation',
            'mid_size' => 1,
        ) );
    ?>
<?php endif; ?>
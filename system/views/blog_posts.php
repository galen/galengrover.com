<?php foreach( $posts as $post ): ?>

<div class="post">
    <h1><a href="<?php echo $registry->app->urlFor( 'post', array( 'post_id' => $post->id, 'post_slug' => $post->getSlug() ) ) ?>"><?php echo e( $post->title ) ?></a></h1>
    <p class="post-timestamp"><?php echo e( date( 'M jS, Y @ g:i a', strtotime( $post->timestamp ) ) ) ?></p>
    <div class="post-exerpt"><?php echo $registry->markdown_parser->transformMarkdown( e( $post->getExcerpt() ) ) ?></div>
    <div class="post-meta">
        <p><a href="<?php echo $registry->app->urlFor( 'post', array( 'post_id' => $post->id, 'post_slug' => $post->getSlug() ) ) ?>">Read More</a></p>
    </div>
</div>

<?php endforeach; ?>

<?php if( $pagination->total_pages > 1 ): ?>
<ul class="pagination">
<?php if( $pagination->first_page_link ): ?><li class="first-page-warp"><a href="<?php echo $registry->app->urlFor( $route_name, array( $route_name => isset( $$route_name ) ? $$route_name : null, 'page' => 1 ) ) ?>">1...</a></li><?php endif; ?>
<?php if( $pagination->previous_page ): ?><li class="prev-page"><a href="<?php echo $registry->app->urlFor( $route_name, array( $route_name => isset( $$route_name ) ? $$route_name : null, 'page' => $pagination->previous_page ) ) ?>">&larr;</a></li><?php endif; ?>
<?php foreach( $pagination->pages as $page ): ?>
<?php if( $page == $pagination->current_page ): ?><li class="current-page"><?php echo e( $page ) ?></li><?php else: ?><li><a href="<?php echo $registry->app->urlFor( $route_name, array( $route_name => isset( $$route_name ) ? $$route_name : null, 'page' => $page ) ) ?>"><?php echo e( $page ) ?></a></li><?php endif; ?>

<?php endforeach; ?>
<?php if( $pagination->next_page ): ?><li class="next-page"><a href="<?php echo $registry->app->urlFor( $route_name, array( $route_name => isset( $$route_name ) ? $$route_name : null, 'page' => $pagination->next_page ) ) ?>">&rarr;</a></li><?php endif; ?>
<?php if( $pagination->last_page_link ): ?><li class="last-page-warp"><a href="<?php echo $registry->app->urlFor( $route_name, array( $route_name => isset( $$route_name ) ? $$route_name : null, 'page' => $pagination->total_pages ) ) ?>">...<?php echo e( $pagination->total_pages ) ?></a></li><?php endif; ?>
</ul>
<?php endif; ?>
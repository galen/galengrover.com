</div>

<?php if( !isset( $database_error ) ): ?>

<div id="sidebar">

<?php if( $route_name != 'home' ): ?>
<h2>Recent Posts</h2>
<ul class="recent-posts">
    <?php foreach( $registry->recent_posts as $recent_post ): ?>
    <li><a href="<?php echo $registry->app->urlFor( 'post', array( 'post_id' => $recent_post->id, 'post_slug' => $recent_post->getSlug() ) ) ?>"><?php echo e( $recent_post->title ) ?></a></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

<h2>Categories</h2>
<ul class="categories">
    <?php foreach( $registry->categories as $category ): ?>
    <li><a href="<?php echo $registry->app->urlFor( 'category', array( 'category' => $category->value ) ) ?>"><?php echo e( $category->value ) ?></a></li>
    <?php endforeach; ?>
</ul>

<h2>Tags</h2>
<ul class="tags">
    <?php foreach( $registry->tags as $tag ): ?>
    <li><a href="<?php echo $registry->app->urlFor( 'tag', array( 'tag' => $tag->value ) ) ?>"><?php echo e( $tag->value ) ?></a></li>
    <?php endforeach; ?>
</ul>

</div>

<?php endif; ?>

</div>

</body>
</html>
</div>

<?php if( !isset( $database_error ) ): ?>

<div id="sidebar">

<?php if( $route_name != 'home' ): ?>
<h2>Recent Posts</h2>
<ul class="recent-posts">
    <?php foreach( $registry->recent_posts as $recent_post ): ?>
    <li><a href="<?php echo $registry->app->urlFor( 'post', array( 'post_id' => $recent_post->id, 'post_slug' => slug( $recent_post->title ) ) ) ?>"><?php echo e( $recent_post->title ) ?></a></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

<h2>Categories</h2>
<ul class="categories">
    <?php foreach( $registry->categories as $category_ ): ?>
    <li<?php if( $route_name == 'category' && $category == slug( $category_->value ) ): ?> class="active"<?php endif; ?>><a href="<?php echo $registry->app->urlFor( 'category', array( 'category' => slug( $category_->value ) ) ) ?>"><?php echo e( $category_->value ) ?></a></li>
    <?php endforeach; ?>
</ul>

<h2>Tags</h2>
<ul class="tags">
    <?php foreach( $registry->tags as $tag_ ): ?>
    <li<?php if( $route_name == 'tag' && $tag == $tag_->value ): ?> class="active"<?php endif; ?>><a href="<?php echo $registry->app->urlFor( 'tag', array( 'tag' => $tag_->value ) ) ?>"><?php echo e( $tag_->value ) ?></a></li>
    <?php endforeach; ?>
</ul>

</div>

<?php endif; ?>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="/public/js/blog.js"></script>

</div>

</body>
</html>
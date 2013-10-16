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

<?php if( $registry->categories ): ?>
<h2>Categories</h2>
<ul class="categories">
    <?php foreach( $registry->categories as $category_ ): ?>
    <li<?php if( $route_name == 'category' && $category == slug( $category_ ) ): ?> class="active"<?php endif; ?>><a href="<?php echo $registry->app->urlFor( 'category', array( 'category' => slug( $category_ ) ) ) ?>"><?php echo e( $category_ ) ?></a></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

<?php if( $registry->tags ): ?>
<h2>Tags</h2>
<ul class="tags">
    <?php foreach( $registry->tags as $tag_ ): ?>
    <li<?php if( $route_name == 'tag' && $tag == $tag_ ): ?> class="active"<?php endif; ?>><a href="<?php echo $registry->app->urlFor( 'tag', array( 'tag' => $tag_ ) ) ?>"><?php echo e( $tag_ ) ?></a></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

</div>

<?php endif; ?>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="/public/js/blog.js"></script>

</div>

</body>
</html>
<?php require( 'blog_header.php' ) ?>

<?php if( !isset( $error ) ): ?>
<h1 class="post-list-header">Posts in category "<?php echo e( $category ) ?>" (<?php echo e( $posts->getTotalPosts() ) ?>)</h1>
<?php require( 'blog_posts.php' ); ?>
<?php endif; ?>

<?php require( 'blog_footer.php' ) ?>
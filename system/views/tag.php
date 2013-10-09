<?php require( 'header.php' ) ?>

<?php if( !isset( $error ) ): ?>
<h1 class="post-list-header">Posts tagged "<?php echo e( $tag ) ?>" (<?php echo e( $posts->getTotalPosts() ) ?>)</h1>
<?php require( 'posts.php' ); ?>
<?php endif; ?>

<?php require( 'footer.php' ) ?>
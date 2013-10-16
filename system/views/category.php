<?php require( 'header.php' ) ?>

<?php if( !isset( $error ) ): ?>
<h1 class="post-list-header"><?php echo e( $posts->getTotalPosts() ) ?> Posts in category "<?php echo e( unslug( $category ) ) ?>"</h1>
<?php require( 'posts.php' ); ?>
<?php endif; ?>

<?php require( 'footer.php' ) ?>
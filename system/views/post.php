<?php require( 'header.php' ) ?>

<div class="post">
    <h1><a href="<?php echo $registry->app->urlFor( 'post', array( 'post_id' => $post->id, 'post_slug' => slug( $post->title ) ) ) ?>"><?php echo e( $post->title ) ?></a></h1>
    <p class="post-timestamp"><?php echo e( date( 'M jS, Y @ g:i a', strtotime( $post->timestamp ) ) ) ?></p>
    <?php echo $registry->markdown_parser->transformMarkdown( $post->text ); ?>
    <?php if( isset( $post_attributes['category'] ) || isset( $post_attributes['tag'] ) ): ?>
    <div class="post-attributes">
    <?php if( isset( $post_attributes['category'] ) ): ?>
        <p class="attribute-list">Categories:
        <?php echo linked_list( $registry->app, 'category', 'category', $post_attributes['category'] ) ?>
        </p>
    <?php endif; ?>
    <?php if( isset( $post_attributes['tag'] ) ): ?>
        <p class="attribute-list">Tags:
        <?php echo linked_list( $registry->app, 'tag', 'tag', $post_attributes['tag'] ) ?>
        </p>
    <?php endif; ?>
    </div>
    <?php endif; ?>
</div>

<?php if( $previous_post || $next_post ): ?>
<div class="post-list-header post-nav">
<?php if( $previous_post ): ?><p class="previous-post"><a href="<?php echo $registry->app->urlFor( 'post', array( 'post_id' => $previous_post->id, 'post_slug' => slug( $previous_post->title ) ) ) ?>">&laquo; <?php echo e( $previous_post->title ) ?></a></p><?php endif; ?>
<?php if( $next_post ): ?><p class="next-post"><a href="<?php echo $registry->app->urlFor( 'post', array( 'post_id' => $next_post->id, 'post_slug' => slug( $next_post->title ) ) ) ?>"><?php echo e( $next_post->title ) ?> &raquo;</a></p><?php endif; ?>
</div>
<?php endif; ?>

<?php if( count( $comments ) ): ?>
<h2 id="comments" class="post-list-header">Comments (<?php echo count( $comments ) ?>)</h2>
<?php endif; ?>

<?php foreach( $comments as $comment ): ?>
<div id="comment-<?php echo e( $comment->id ) ?>" class="comment comment-<?php echo e( $comment->id ) ?>">
    <p class="comment-name"><?php if( $comment->email ): ?><a href="mailto:<?php echo e( $comment->email ) ?>"><?php endif; ?><?php echo e( $comment->name ) ?><?php if( $comment->email ): ?></a><?php endif; ?> <span class="comment-timestamp"><?php echo e( date( 'M jS, Y @ g:i a', strtotime( $comment->timestamp ) ) ) ?></span></p>
    <?php echo $registry->markdown_parser->transformMarkdown( e( $comment->text ) ) ?>
</div>
<?php endforeach; ?>

<h2 id="comment-form" class="post-list-header" >Add Comment</h2>
<div class="add-comment">
    <form action="#comment-form" method="post">
        <fieldset>
            <div>
                <label for="#comments">Name</label>
                <input type="text" name="comment[name]" id="comment-name" class="text-input" value="<?php if( isset( $_POST['comment'] ) ): ?><?php echo e( $_POST['comment']['name'] ) ?><?php endif; ?>">
            </div>
            <div>
                <label for="#comments">Email</label>
                <input type="text" name="comment[email]" id="comment-email" class="text-input" value="<?php if( isset( $_POST['comment'] ) ): ?><?php echo e( $_POST['comment']['email'] ) ?><?php endif; ?>">
            </div>
            <div>
                <label for="#comment-text">Comment</label>
                <textarea name="comment[text]" id="comment-text" class="text-input"><?php if( isset( $_POST['comment'] ) ): ?><?php echo e( $_POST['comment']['text'] ) ?><?php endif; ?></textarea>
            </div>
            <div id="comment-submit">
                <input type="hidden" name="comment[post_id]" value="<?php echo e( $post->id ) ?>">
                <?php if( isset( $comment_error ) ): ?><p class="comment-error"><?php echo e( $comment_error ) ?></p><?php endif; ?>
                <input type="submit" name="comment_submit" value="Add Comment">
            </div>
        </fieldset>
    </form>
</div>

<?php require( 'footer.php' ) ?>
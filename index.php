<?php

ini_set( 'display_errors', 'On' );
error_reporting( E_ALL );

require( 'system/vendor/autoload.php' );
require( 'system/config.php' );
require( 'system/functions.php' );

// Blog stuff
$datastore = new \Phlog\Datastore\SqliteDatastore( __DIR__ . '/blog.sqlite' );
$blog = new \Phlog\Phlog( $datastore );
$blog->setPostsPerPage( POSTS_PER_PAGE );

// Slim app
$app = new \Slim\Slim;

// Registry to pass to the routes
$registry = new StdClass;
$registry->post_conditions = array( 'active' => 1 );
$registry->categories = $blog->getPostAttributeValues( 'category', $registry->post_conditions );
$registry->tags = $blog->getPostAttributeValues( 'tag', $registry->post_conditions );
$registry->recent_posts = $blog->getPosts( 1, array( 'active' => 1 ) );
$registry->blog = $blog;
$registry->app = $app;
$registry->markdown_parser = new \dflydev\markdown\MarkdownParser();

// Home page
$app->get('/(:page/)', function ( $page = 1 ) use ( $registry ) {

    $route_name = 'home';
    $posts = $registry->blog->getPosts( $page, $registry->post_conditions );
    $pagination = get_pagination( $page, $posts->getTotalPosts(), POSTS_PER_PAGE, PAGINATION_VIEWPORT );
    require( 'system/views/home.php' );

})->name( 'home' );

// Post page
$app->map('/blog/:post_id/:post_slug/', function ( $post_id, $post_slug ) use ( $registry ) {

    $route_name = 'post';
    if ( isset( $_POST['comment'] ) ) {
        $validator = new \Validator\Validator;
        $validator->addRule( new \Validator\Rule\MinLength( 2 ), 'name', 'Your name must be atleast 2 characters', 'Please enter your name' );
        if ( !empty( $_POST['comment']['email'] ) ){
            $validator->addRule( new \Validator\Rule\Email, 'email', 'Please enter a valid email address' );
        }
        $validator->addRule( new \Validator\Rule\MinLength( 2 ), 'text', 'Your comment must be atleast 2 characters', 'Please add a comment' );
        $validator->addRule( new \Validator\Rule\NotEmpty, 'not_spam', 'Please verify that you are not spam' );
        if ( !$validator->validate( $_POST['comment'] ) ) {
            $comment_error = $validator->getFirstError();
        }
        else {
            try {
                unset( $_POST['comment']['not_spam'] );
                $result = $registry->blog->addComment( new \Phlog\Entity\Comment( $_POST['comment'] ) );
                unset( $_POST );
            }
            catch( \Exception $e ) {
                echo $e->getMessage();
                $comment_error = 'Unexpected Error';
            }
        }
    }

    try {
        $post = $registry->blog->getPost( $post_id, $registry->post_conditions );
        $post_attributes = $registry->blog->organizePostAttributes(
            $registry->blog->getPostAttributes( $post_id ),
            'attribute',
            'value'
        );
        $next_post = $registry->blog->getNextPost( $post_id, $registry->post_conditions );
        $previous_post = $registry->blog->getPreviousPost( $post_id, $registry->post_conditions );
        $comments = $registry->blog->getPostComments( $post_id );
        $page_title = $post->title;

        require( 'system/views/post.php' );
    }
    catch( \Phlog\Exception\InvalidPostException $e ) {
        $registry->app->response->setStatus( 404 );
        $error = 'Invalid Post';
        require( 'system/views/header.php' );
        require( 'system/views/footer.php' );
    }

})->name( 'post' )->via( 'GET', 'POST' );

// Tag page
$app->get('/tag/:tag/(:page/)', function ( $tag, $page = 1 ) use ( $registry ) {

    $route_name = 'tag';
    $posts = $registry->blog->getPostsWithAttributeAndValue( 'tag', $tag, $page, $registry->post_conditions );
    $pagination = get_pagination( $page, $posts->getTotalPosts(), POSTS_PER_PAGE, PAGINATION_VIEWPORT );
    $page_title = "Tag: $tag";
    require( 'system/views/tag.php' );

})->name( 'tag' );

// Category page
$app->get('/category/:category/(:page/)', function ( $category, $page = 1 ) use ( $registry ) {
    
    $route_name = 'category';
    $posts = $registry->blog->getPostsWithAttributeAndValue( 'category', unslug( $category ), $page, $registry->post_conditions );
    $pagination = get_pagination( $page, $posts->getTotalPosts(), POSTS_PER_PAGE, PAGINATION_VIEWPORT );
    $page_title = "Category: $category";
    require( 'system/views/category.php' );

})->name( 'category' );

$app->run();
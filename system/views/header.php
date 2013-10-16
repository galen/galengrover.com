<!doctype html>
<html>
<head>
<title><?php if( isset( $page_title ) ): ?><?php echo e( $page_title ) ?> - <?php endif; ?>CT Web Development by Galen Grover</title>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet" type="text/css">
<link href="/public/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="header-wrapper">
    <div id="header">
        <a href="/"><img src="/public/images/logo.png"></a>
    </div>
</div>

<div id="content-wrapper">

<div id="content"<?php if( isset( $database_error ) ): ?> class="full-width"<?php endif; ?>>

<?php if( isset( $error ) ): ?><h2 class="page-error post-list-header"><?php echo e( $error ) ?></h2><?php endif; ?>
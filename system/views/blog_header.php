<!doctype html>
<html>
<head>
<title><?php if( isset( $page_title ) ): ?><?php echo e( $page_title ) ?> - <?php endif; ?>BlogSimple</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<style type="text/css">
html { overflow-y: scroll;}
html, body, fieldset, form { margin:0;padding:0; }
body { font-family: "Open Sans",arial,verdana,sans-serif; background:#f5f5f5 }
#header-wrapper { background:#fff; }
#header { width: 960px; margin: 0 auto; padding: 20px 0; background:#fff;text-align:center; }
#header img { width:100px; height:100px; }
#content-wrapper { width:960px; margin: 0 auto;padding: 50px 20px;overflow:auto;  }
#content {  width: 620px; float:left; }
.full-width { width:100% !important; }
.post { margin: 0 auto; background: #fff; padding: 20px 30px 20px 30px; margin-bottom: 20px }
.post-meta { margin:0;padding:0 }
.post-timestamp { color: #bbb; padding:0;margin:0; } 
h1, h2 { margin:0; font-weight:normal;color: #32893d; }
a {color: #32893d; text-decoration:none}
a:hover { color: #e01313 }

.pagination { list-style:none; margin:0;text-align:center; font-size: 0px; letter-spacing: 0px; word-spacing: 0px;}
.pagination li { display:inline-block; width: 50px; height: 50px; background:#fff; line-height:50px;margin-right:2px;font-size:14px;  }
.pagination a { display:block;width:100%;height:100%; }
.pagination a:hover { background: #fafafa; }
.pagination .current-page { cursor:default; }
.post-list-header { background: #fff; color: #d87c19; padding: 20px 30px; margin-bottom: 20px; }

.post-attributes {background: #fafafa; border: 1px solid #f6f6f6; padding: 5px; margin-top: 10px;}
.post-attributes p {margin:0;padding:0;color: #ccc;}
.post-attributes a { color:#d87c19 ; }
.post-attributes a:hover { text-decoration:underline; }
.tag-list a{ margin: 0 2px 0 0; }

#sidebar {background:#fff; float:left; margin-left: 20px; width:260px;padding: 20px 30px 20px 30px;}
#sidebar h2 { color: #d87c19; margin-bottom: 10px; }
#sidebar ul { list-style:none;margin:0 0 20px 1em;padding:0;list-style-position:outside;list-style-type:circle; }

fieldset { border:0; }
.comment { background:#fff; padding: 10px 30px; margin-bottom:20px; }
.comment-name { border-bottom: 1px solid #bbb; font-weight:bold; padding-bottom: 5px; }
.comment-timestamp { font-weight: normal; color: #999; font-size: 10px; float:right; }
.add-comment { background:#fff; padding: 20px 30px 20px 30px; }
.comment-error { color:#aa0000;font-weight:bold; }

.post-nav{ overflow:auto; }
.post-nav p { width:50%; float:left; padding:0;margin:0; }
.post-nav .next-post { text-align:right;float:right;}

.page-error { text-align:center; }

pre { overflow-x:auto; background:#f6f6f6;padding: 5px;border:1px solid #eee; line-height: 1.4em;}

form div { padding: 10px 0; }
form label { display:block; margin-bottom: 5px; }
.text-input { padding: 6px; border: 1px solid #aaa; width: 50%; font: 14px helvetica, verdana, sans-serif;}

</style>
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
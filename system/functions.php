<?php

function e( $str ) {
    return htmlspecialchars( $str );
}

function get_pagination( $current_page, $total_items, $items_per_page, $pagination_viewport ) {

    $total_pages = ceil( $total_items / $items_per_page );
    $start_page = max( $current_page - $pagination_viewport, 1 );
    $end_page = min( $start_page + ( $pagination_viewport * 2 ), $total_pages );
    $start_page = max( $end_page - ( $pagination_viewport * 2 ), 1 );
    $pages = range( $start_page, $end_page );
     
    $first_page_link = $last_page_link = false;
    if ( !in_array( 1, $pages ) ) {
        $first_page_link = true;
    }
    if ( !in_array( $total_pages, $pages ) ) {
        $last_page_link = true;
    }
     
    $previous_page = $current_page == 1 ? null : $current_page - 1;
    $next_page = $current_page == $total_pages ? null : $current_page + 1;
    return (object) array(
        'current_page' => $current_page,
        'pages' => $pages,
        'previous_page' => $previous_page,
        'next_page' => $next_page,
        'total_pages' => $total_pages,
        'first_page_link' => $first_page_link,
        'last_page_link' => $last_page_link
    );

}

function slug( $string, $space = '-' ) {
    return preg_replace( sprintf( '~-$~', $space ) , '', preg_replace( '~[^a-z0-9]+~i', $space, strtolower( $string ) ) );
}

function unslug( $string, $space = '-' ) {
    return str_replace( '-', ' ', $string );
}
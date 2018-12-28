<?php namespace WPP;
/**
* WP Performance Optimizer - Url helper
*
* @author Ante Laca <ante.laca@gmail.com>
* @package WPP
*/

class Url
{
    /**
    * Get absolute url file path
    * 
    * @since 1.0.0
    * @param string $file
    *
    * @return string
    */
    public static function path( $file ) {  
        return str_replace( [ realpath( ABSPATH ), DIRECTORY_SEPARATOR ], [ site_url(), '/' ], $file );
    }

    
    /**
    * Get current url
    * 
    * @since 1.0.0
    * @return string
    */
    public static function current() {
        return ( is_ssl() ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 
    }

        
    /**
    * Get clean file path
    * 
    * @since 1.0.0
    * @param string $path
    *
    * @return string
    */
    public static function getClean( $path )
    {
        return str_replace( [ trailingslashit( site_url() ), '../' ], '', strtok( $path, '?#' ) );
    }

}
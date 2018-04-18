<?php

/**
 * Bookstore Router
 * 
 * @author    Lukasz Formela
 * @link      lukaszformela.com
 * @copyright (c) 2018. Lukasz Formela. All Rights Reserved.
 * @license   Lesser General Public License <http://www.gnu.org/copyleft/lesser.html>
 * @since     0.0.1
 */

namespace Bookstore\Routes;

use Bookstore\Configs\Config,
    Bookstore\Controllers;
    

class Router {

    // Static methods can be called without instantianting the class
    public static function run( $aParams ) {

        /**
         *  Our Controllers namespace
         */
        $sNamespace = '\\Bookstore\Controllers';

        /**
         * Home controller
         */
        $sHomeController = $sNamespace . '\\Home';

        /**
         * 404 controller
         */
        $sNotFoundController = $sNamespace . '\\NotFound';

        /**
         * Controller name
         * @see /index.php
         */
        $sController = ucfirst( $aParams['controller'] );

        /**
         * Controller class
         */
        $sControllerClass = '';

        /**
         * New controller (instantiated to use method inside it)
         */
        $oNewController;

        /**
         * An array of directory structure
         */
        $aDirStructure =  self::dirToArray( CTRL_PATH );

        /**
         * Find namespace for given controller
         */
        $sFoundNamespace = self::findNamespace( $sController . '.php', $aDirStructure, 'Bookstore' );

        // If method parameter is present and exists as a file name, proceed
        if ( !empty( $sController ) && in_array( $sController . '.php', $aDirStructure ) ) {
            $sControllerClass = $sNamespace . '\\' . $sFoundNamespace . '\\' . $sController;
            $oNewController = new $sControllerClass;
            call_user_func( array($oNewController, 'getBy' . $sController), $aParams['query'] );
        } elseif ( empty( $sController ) ) {
            call_user_func( array( new $sHomeController, 'goHome' ) );
        } else {
            call_user_func( array(new $sNotFoundController, 'getView') );
        }

    }

    /**
     * Convert complete directory structure to array
     * (may need separate file/class)
     * @return array
     */
    protected static function dirToArray( $dir ) {

        // Current directory structure
        $aDirSturcture = scandir( $dir . '\\' );

        // Temporary directory holder, needed to pull file names
        // from subdirectories
        $aTempDir = array();

        // Temporary namespace holder
        // Since our subdirectories match namespace names, we will convert
        // the subdirectories names to namespaces and assign them to file names
        // in final final directory structure.
        $aTempNam = array();

        // Final dir structure
        $aFinDir = array();
        
        foreach ( $aDirSturcture as $key => $val ) {

            // If array value is different than '.' or '..', proceed
            if ( !in_array( $val, array('.','..') ) ) {

                // If array value is a directory, proceed
                if ( is_dir( $dir . '\\' . $val ) ) {

                    // Add directory name to the array
                    $aFinDir[] = $val;

                    // Start the procedure over for current directory
                    $aTempDir[$val] = self::dirToArray( $dir . '\\' . $val );

                } else {

                    // If temporary array holder is not empty, proceed
                    if ( !empty( $aTempDir ) ) {
                        
                        // NOTE:
                        // This may not be really elegant way to pull value from
                        // the array and needs to be reworked, I know.
                        foreach ( $aTempDir as $subkey => $subval ) {
                            foreach ( $subval as $subsubkey => $subsubval ) {
                                //$aFinDir[] = $aTempNam[0] . '\\' . $subsubval;
                                $aFinDir[] = $subsubval;
                            }                           
                        }

                        // Let's empty array
                        $aTempDir = [];
                    }

                    // Assign file name to array
                    $aFinDir[] = $val;
                }
            }
        }
        
        return $aFinDir;
    }


    /**
     * Find a namespace by iterating through array of filenames backwards.
     * A namespace will be the closest directory name, so make sure that
     * both namespaces and directory names match.
     * (may need separate file/class)
     * @return integer $index
     */
    protected static function findNamespace( $filename, $array, $default = '' ) {

        // If first parameter is a string and second an array, proceed
        if ( is_string( $filename ) && is_array( $array ) ) {

            // Index of a given string in an array
            $index = array_search( $filename, $array );

            // While string contains a dot, proceed
            while ( preg_match('/\.(?!s)/', $array[$index] ) && $index >= 0 ) {
                $index--;
            } 

            // If no directory name was found, use default namespace
            // (most likely the directory containing all the files above, make sure to provide it
            // as an argument while calling this function).
            if ( $index < 0) {
                $namespace = $default;
            } else {
                $namespace = $array[$index];
            }
            
        } else {
            NotFound::getView();
        }

        return $namespace;
    }

}
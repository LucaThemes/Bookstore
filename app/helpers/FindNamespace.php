<?php

/**
 * Bookstore FindNamespace helper
 * 
 * Find a namespace basing on directory name
 * (namespaces and directory names must match)
 * 
 * @author    Lukasz Formela
 * @link      lukaszformela.com
 * @copyright (c) 2018. Lukasz Formela. All Rights Reserved.
 * @license   Lesser General Public License <http://www.gnu.org/copyleft/lesser.html>
 * @since     0.0.4
 */

 namespace Bookstore\Helpers;

 class FindNamespace {

    /**
     * Name of the file
     */
    private $sFilename;

    /**
     * Directory structure
     */
    private $aDirStructure;

    /**
     * Namespace
     */
    private $sNamespace;

    /**
     * Default namespace
     */
    private $sDefault;

    /**
     * Index of a given string in an array
     */
    private $iIndex;


    public static function find( $sFilename, $aDirStructure, $sDefault = '' ) {

        // If first parameter is a string and second an array, proceed
        if ( is_string( $sFilename ) && is_array( $aDirStructure ) ) {

            // 
            $iIndex = array_search( $sFilename, $aDirStructure );

            // While string contains a dot, proceed
            while ( preg_match('/\.(?!s)/', $aDirStructure[$iIndex] ) && $iIndex >= 0 ) {
                $iIndex--;
            } 

            // If no directory name was found, use default namespace
            // (most likely the directory containing all the files above, make sure to provide it
            // as an argument while calling this function).
            if ( $iIndex < 0) {
                $sNamespace = $sDefault;
            } else {
                $sNamespace = $aDirStructure[$iIndex];
            }
            
        } else {
            NotFound::getView();
        }

        return $sNamespace;
    }

 }

   
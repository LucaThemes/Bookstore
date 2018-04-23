<?php

/**
 * Bookstore DirToArray helper
 * 
 * Converts directory structure to array
 * 
 * @author    Lukasz Formela
 * @link      lukaszformela.com
 * @copyright (c) 2018. Lukasz Formela. All Rights Reserved.
 * @license   Lesser General Public License <http://www.gnu.org/copyleft/lesser.html>
 * @since     0.0.4
 */

namespace Bookstore\Helpers;
    
class DirToArray {

    /**
     * Current directory structure
     */
    private $aDirSturcture;

    /**
     * Temporary directory holder, needed to pull file names
     * from subdirectories
     */
    private $aTempDir;

    /**
     * Temporary namespace holder
     * Since our subdirectories match namespace names, we will convert
     * the subdirectories names to namespaces and assign them to file names
     * in final final directory structure.
     */
    private $aTempNam;

    /**
     * Final dir structure
     */
    private $aFinDir;


    public static function convert( $dir ) {

        $aDirSturcture = scandir( $dir . '\\' );
        $aTempDir = array();
        $aTempNam = array();
        $aFinDir = array();
        
        foreach ( $aDirSturcture as $key => $val ) {
    
            // If array value is different than '.' or '..', proceed
            if ( !in_array( $val, array('.','..') ) ) {
    
                // If array value is a directory, proceed
                if ( is_dir( $dir . '\\' . $val ) ) {
    
                    // Add directory name to the array
                    $aFinDir[] = $val;
    
                    // Start the procedure over for current directory
                    $aTempDir[$val] = self::convert( $dir . '\\' . $val );
    
                } else {
    
                    // If temporary array holder is not empty, proceed
                    if ( !empty( $aTempDir ) ) {
                        
                        // NOTE:
                        // This may not be really elegant way to pull value from
                        // the array and needs to be reworked, I know.
                        foreach ( $aTempDir as $subkey => $subval ) {
                            foreach ( $subval as $subsubkey => $subsubval ) {
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

}

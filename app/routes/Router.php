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

use Bookstore\Helpers\DirToArray,
    Bookstore\Helpers\FindNamespace;
require_once '/../configs/Config.php';

class Router {

    // Static methods can be called without instantianting the class
    public static function get( $aParamsPassed, $sNamespace = 'Controllers' ) {

        /**
         *  Our Controllers namespace
         */
        $sNamespace = '\\Bookstore\\' . $sNamespace;

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
        $sController = ucfirst( $aParamsPassed['controller'] );

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
        $aDirStructure = DirToArray::convert( \Bookstore\Configs\Config::CTRL_PATH );

        /**
         * Find namespace for given controller
         */
        $sFoundNamespace = FindNamespace::find( $sController . '.php', $aDirStructure, 'Bookstore' );

        // If method parameter is present and exists as a file name, proceed
        if ( !empty( $sController ) && in_array( $sController . '.php', $aDirStructure ) ) {
            $sControllerClass = $sNamespace . '\\' . $sFoundNamespace . '\\' . $sController;
            $oNewController = new $sControllerClass;
            call_user_func( array($oNewController, 'getBy' . $sController), $aParamsPassed['query'] );
        } elseif ( empty( $sController ) ) {
            call_user_func( array( new $sHomeController, 'goHome' ) );
        } else {
            call_user_func( array(new $sNotFoundController, 'getView') );
        }

    }

}
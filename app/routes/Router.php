<?php

namespace Bookstore\Routes;

use Bookstore\Configs\Config;

class Router {

    // Static methods can be called without instantianting the class
    public static function run( $aParams ) {
        
        // Our Controllers namespace
        $sNamespace = 'Bookstore\Controllers\\';

        // Default controller
        $sDefaultController = $sNamespace . 'NotFound';

        // Path to controllers directory
        $sControllersPath = str_replace('\\', '/', ROOT_PATH) . 'app/controllers/';

        // One of parameters passed to run() method in index.php
        $sController = $aParams['controller'];

        // If method parameter exists as a file name, proceed
        if ( is_file($sControllersPath . $sController . '.php') ) {
            $sController = $sNamespace . $sController;
            $oNewController = new $sController;
            echo '<div class="alert alert-info" role="alert">';
            echo '[Router.php] FILE FOUND <br />';
            echo '</div>';

            // Let's check whether newly instantiated class has a method named after parameter
            // and if the method is public
            if ( (new \ReflectionClass($oNewController))->hasMethod($aParams['action']) && (new \ReflectionMethod($oNewController, $aParams['action']))->isPublic() ) {
                call_user_func( array($oNewController, $aParams['action']) );
            } else {
                call_user_func( array($oNewController, 'notFound') );
            }
        } else {
            call_user_func( array(new $sDefaultController, 'getView') );
            echo '<div class="alert alert-info" role="alert">';
            echo '[Router.php] FILE NOT FOUND <br />';
            echo '</div>';
        }

    }

}
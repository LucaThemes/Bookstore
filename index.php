<?php

/**
 * Our HTML index file
 * 
 * @author    Lukasz Formela
 * @link      lukaszformela.com
 * @copyright (c) 2018. Lukasz Formela. All Rights Reserved.
 * @license   Lesser General Public License <http://www.gnu.org/copyleft/lesser.html>
 * @since     0.0.1
 */

use Bookstore\Routes\Router;

require 'vendor/autoload.php';

define( 'ROOT_PATH', __DIR__ );
define( 'APP_PATH', ROOT_PATH . '\app' );
define( 'CTRL_PATH', APP_PATH . '\controllers' );
define( 'MDL_PATH', APP_PATH . '/models' );
define( 'VWS_PATH', APP_PATH . '/views' );

?>

<!DOCTYPE HTML>
<html>

    <?php require "app/views/inc/header.php"; ?>

    <body>
        <?php require 'app/views/inc/nav.php'; ?>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <?php require 'app/views/inc/sidebar.php'; ?>
                    </div>
                    <div class="col-md-8">
                    <?php 

                        $params = explode('/', $_SERVER['REQUEST_URI']);
                        $aParams = [
                            'controller' => ( !empty($params[2]) ? $params[2] : '' ),
                            'query'      => ( !empty($params[3]) ? $params[3] : 'all' ),
                        ];
                        Router::run($aParams);
                    ?>
                    </div>
                </div>
            </div>

        </div> <!-- .content -->
    </body>

    <?php require "app/views/inc/footer.php"; ?>

</html>
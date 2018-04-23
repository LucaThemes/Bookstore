<?php

/**
 * Our index file
 * 
 * @author    Lukasz Formela
 * @link      lukaszformela.com
 * @copyright (c) 2018. Lukasz Formela. All Rights Reserved.
 * @license   Lesser General Public License <http://www.gnu.org/copyleft/lesser.html>
 * @since     0.0.1
 */

use Bookstore\Routes\Router,
    Bookstore\Helpers\UrlParameters;

require 'vendor/autoload.php';

define( 'ROOT_PATH', dirname(__FILE__) );

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
                        <?php Router::get( UrlParameters::getParams() ); ?>
                    </div>
                </div>
            </div>

        </div> <!-- .content -->
    </body>

    <?php require "app/views/inc/footer.php"; ?>

</html>
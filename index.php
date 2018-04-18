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
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/bookstore">Bookstore v.1</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        Choose filters:
                        <div class="sidebar-filter">
                            <div class="sidebar-filter__heading">
                                > CATEGORY
                            </div>
                            <div class="sidebar-filter__filters">
                                <ul>
                                    <li><a href="/bookstore">All books</a></li>
                                    <li><a href="/bookstore/category/drama">Drama</a></li>
                                    <li><a href="/bookstore/category/comedy">Comedy</a></li>
                                    <li><a href="<?php $_SERVER['REQUEST_URI']; ?>">Third option</a>
                                        <ul>
                                            <li>SUB CATEGORY 1</li>
                                            <li>SUB CATEGORY 2</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-filter">
                            <div class="sidebar-filter__heading">
                                > PRICE
                            </div>
                            <div class="sidebar-filter__filters">
                                <ul>
                                    <li><a href="<?php $_SERVER['REQUEST_URI']; ?>">0-20</a></li>
                                    <li><a href="<?php $_SERVER['REQUEST_URI']; ?>">20-30</a></li>
                                    <li><a href="<?php $_SERVER['REQUEST_URI']; ?>">30+</a>
                                        <ul>
                                            <li>SUB AUTHOR 1</li>
                                            <li>SUB AUTHOR 2</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                    <?php 

                        $params = explode('/', $_SERVER['REQUEST_URI']);
                        $aParams = [
                            'controller' => ( !empty($params[2]) ? $params[2] : 'category' ),
                            'query'      => ( !empty($params[3]) ? $params[3] : '' ),
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
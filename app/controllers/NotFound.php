<?php

/**
 * Books NotFound Controller
 * 
 * @author    Lukasz Formela
 * @link      lukaszformela.com
 * @copyright (c) 2018. Lukasz Formela. All Rights Reserved.
 * @license   Lesser General Public License <http://www.gnu.org/copyleft/lesser.html>
 * @since     0.0.1
 */

namespace Bookstore\Controllers;

class NotFound {

    public function getView() {
        echo '<div class="alert alert-info" role="alert">';
        echo '[NotFound.php] FILE NOT FOUND <br />';
        echo '</div>';
        // require '/../views/404.php';
    }

}
<?php

/**
 * Bookstore Home Controller
 * 
 * @author    Lukasz Formela
 * @link      lukaszformela.com
 * @copyright (c) 2018. Lukasz Formela. All Rights Reserved.
 * @license   Lesser General Public License <http://www.gnu.org/copyleft/lesser.html>
 * @since     0.0.3
 */

namespace Bookstore\Controllers;

class Home {

    public function goHome() {
        require '/../views/HomeView.php';
    }

}
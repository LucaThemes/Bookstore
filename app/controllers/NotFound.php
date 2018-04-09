<?php

namespace Bookstore\Controllers;

class NotFound {

    public function getView() {
        echo '<div class="alert alert-info" role="alert">';
        echo '[NotFound.php] FILE NOT FOUND <br />';
        echo '</div>';
        // require '/../views/404.php';
    }

}
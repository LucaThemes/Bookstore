<?php

namespace Bookstore\Utils;

class Dumper {

    public function __construct($arg) {
        $this->arg = $arg;
        return '[' . basename(__FILE__, '.php') . '] - ' . var_export($arg) . '<br />';
    }

}
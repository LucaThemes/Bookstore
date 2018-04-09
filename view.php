<?php

namespace Bookstore;
use Bookstore\Model;

class View
{
    private $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function output() {
        return '<a href="index.php?action=clicked">' . $this->model->string . '</a>';
    }
}
<?php

namespace Bookstore;
use Bookstore\Model;

class Controller
{
    private $model;

    public function __construct(Model $model){
        $this->model = $model;
    }

    public function clicked() {
        $this->model->string = 'Text updated!';
    }

}
<?php

namespace Bookstore\Controllers;
use Bookstore\Models\BooksModel,
    Bookstore\Configs\ConfigDefaults;

// use Bookstore\Views\BooksView;
// use Bookstore\Database\Db;



class BooksController {

    protected $oModel;
    protected $aResult;

    public function __construct() {
        $this->oModel = new BooksModel;
    }

    public function getAllBooks() {
        $this->aResult = $this->oModel->getBooksList('SELECT * FROM books');
        require '/../views/BooksView.php';
    }

    public function getBooksByGenre($query) {
        $this->aResult = $this->oModel->getBooksList('SELECT * FROM books WHERE book_genre = ' . $this->query);
    }

    public function getView() {
        // require $this->defaults->ROOT_PATH . "/views/view.php";
        require '/../views/BooksView.php';
    }

    public function notFound() {
        echo '[BooksController.php] NOTHING FOUND.<br />';
    }

}
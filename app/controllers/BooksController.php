<?php

namespace Bookstore\Controllers;
use Bookstore\Models\BooksModel,
    Bookstore\Configs\ConfigDefaults;

// use Bookstore\Views\BooksView;
// use Bookstore\Database\Db;



class BooksController {

    protected $oModel;
    protected $aResult;
    protected $aQuery;
    public $aCategories;

    public function __construct() {
        $this->oModel = new BooksModel;
        $this->aCategories = $this->oModel->runQuery('SELECT DISTINCT book_genre FROM books');
    }

    public function getAllBooks() {
        $this->aResult = $this->oModel->runQuery('SELECT * FROM books');
        require '/../views/BooksView.php';
    }
    
    public function getSomeBooks() {
        $this->aResult = $this->oModel->runQuery('SELECT * FROM books WHERE book_genre = "drama"');
        require '/../views/BooksView.php';
    }

    public function getBooks( $sAction = '' ) {
        $this->query = '';
        ( !empty($this->sAction) ) ? $this->query .= 'WHERE category = ' : $this->query = '';
        $this->aResult = $this->oModel->runQuery('SELECT * FROM books' . $this->query);
    }

    public function getBooksByGenre($query) {
        $this->aResult = $this->oModel->runQuery('SELECT * FROM books WHERE book_genre = ' . $this->query);
    }

    public function getView() {
        // require $this->defaults->ROOT_PATH . "/views/view.php";
        require '/../views/BooksView.php';
    }

    public function notFound() {
        echo '[BooksController.php] NOTHING FOUND.<br />';
    }

}
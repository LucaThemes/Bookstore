<?php

/**
 * Books Category Controller
 * 
 * @author    Lukasz Formela
 * @link      lukaszformela.com
 * @copyright (c) 2018. Lukasz Formela. All Rights Reserved.
 * @license   Lesser General Public License <http://www.gnu.org/copyleft/lesser.html>
 * @since     0.0.2
 */

namespace Bookstore\Controllers\Books;
use Bookstore\Models\BooksModel,
    Bookstore\Configs\ConfigDefaults;

class Category {

    /**
     * $aCategories @array List of available categories
     */
    protected $aCategories;

    /**
     * $sQuery @string part of query specific for given controller
     */
    protected $sQuery;

    /**
     * $sQueryParam @string a parameter provided to router
     */
    protected $sQueryParam;

    /**
     * $oModel @object Model
     */
    protected $oModel;

    
    protected $aResult;


    public function __construct() {

        /**
         * We need to instantiate model class
         */
        $this->oModel = new BooksModel;

        /**
         * Let's create a list of all available book categories
         */
        $this->sQuery = 'SELECT * FROM books';

    }

    public function getByCategory( $sQueryParam = '' ) {

        $sQuery = $this->sQuery;

        if ( !empty( $sQueryParam ) ) {
            $sQuery .= ' WHERE book_genre = "' . $sQueryParam . '"';
        }
        
        $this->aResult = $this->oModel->runQuery($sQuery);

        require '/../../views/BooksView.php';

    }

}
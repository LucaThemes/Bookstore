<?php

/**
 * Books Model
 * 
 * @author    Lukasz Formela
 * @link      lukaszformela.com
 * @copyright (c) 2018. Lukasz Formela. All Rights Reserver.
 * @license   Lesser General Public License <http://www.gnu.org/copyleft/lesser.html>
 * @since     0.0.1
 */

namespace Bookstore\Models;
// use PDO;
use Bookstore\Database\Db;

class BooksModel extends Db {

    /**
     * @param  string $query   An SQL query to be executed in Db.php
     * @return array  $results Data from database
     */

    public $query;

    public function getBooksList($query) {

        $this->query = $query;

        $results = Db::queryExecute($query);

        return $results;
    }

}
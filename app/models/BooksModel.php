<?php

/**
 * Books Model
 * 
 * @author    Lukasz Formela
 * @link      lukaszformela.com
 * @copyright (c) 2018. Lukasz Formela. All Rights Reserved.
 * @license   Lesser General Public License <http://www.gnu.org/copyleft/lesser.html>
 * @since     0.0.1
 */

namespace Bookstore\Models;

use Bookstore\Database\Db;

class BooksModel extends Db {

    /**
     * SQL query
     */
    private $sQuery;

    /**
     * SQL results
     */
    private $aResults;

    /**
     * @param  string $query   An SQL query to be executed in Db.php
     * @return array  $results Data from database
     */
    public function runQuery($sQuery) {

        $this->sQuery = $sQuery;

        $aResults = Db::queryExecute($sQuery);

        return $aResults;
    }

}
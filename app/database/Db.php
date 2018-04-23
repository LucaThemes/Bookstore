<?php

/**
 * Bookstore Database Connection
 * 
 * @author    Lukasz Formela
 * @link      lukaszformela.com
 * @copyright (c) 2018. Lukasz Formela. All Rights Reserved.
 * @license   Lesser General Public License <http://www.gnu.org/copyleft/lesser.html>
 * @since     0.0.1
 */

namespace Bookstore\Database;
use PDO;

class Db {

    public function connect() {
        $host     = \Bookstore\Configs\Config::DB_HOST;
        $dbname   = \Bookstore\Configs\Config::DB_NAME;
        $user     = \Bookstore\Configs\Config::DB_USER;
        $password = \Bookstore\Configs\Config::DB_PASSWORD;
        try {
            $connection = new PDO( 'mysql:host=' . $host . ';dbname=' . $dbname, $user, $password );
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch ( PDOException $e ) {
            echo '[Db.php] Connection failed: ' . $e->getMessage();
        }
        return $connection;
    }

    function queryExecute($query, $args = '') {

        $this->query = $query;

        // Let's make a connection to the database first
        $connection = $this->connect();

        // Prepare a statement
        // ( prepare() used instead of query() for future app improvements)
        $stmt = $connection->prepare($this->query);

        // Try to return the data from database if connection succeeded
        try {
            $stmt->execute();
            return $stmt->fetchAll();
        } catch ( PDOException $e ) {
            echo '[Db.php] Query execute failed: ' . $e->getMessage();
        }

    }

}
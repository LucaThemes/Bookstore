<?php

namespace Bookstore\Database;
use PDO;

class Db {

    // We'll make a separate config file later on
    // const $db = 'bookstore';
    
    const HOST = '127.0.0.1';
    const DBNAME = 'bookstore';
    const USER = 'root';
    const PASSWORD = '';

    public function connect() {
        $host = self::HOST;
        $dbname = self::DBNAME;
        $user = self::USER;
        $password = self::PASSWORD;
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
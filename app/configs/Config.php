<?php

namespace Bookstore\Configs;

class Config {

    /**
     * Root path has been defined in index.php
     */

    /**
     * Project name
     */
    const PROJ_NAME = 'Bookstore';

    /**
     * App directory path
     */
    const APP_PATH = ROOT_PATH . '/app';

    /**
     * Controllers directory path
     */
    const CTRL_PATH = self::APP_PATH . '/controllers';

    /**
     * Models directory path
     */
    const MDL_PATH = self::APP_PATH . '/models';

    /**
     * Views directory path
     */
    const VWS_PATH = self::APP_PATH . '/views';

    /**
     * Database type
     */
    const DB_TYPE = 'mysql';

    /**
     * Database host
     */
    const DB_HOST = 'localhost';

    /**
     * Database name
     */
    const DB_NAME = 'bookstore';

    /**
     * Database user
     */
    const DB_USER = 'root';

    /**
     * Database password
     */
    const DB_PASSWORD = '';

    /**
     * Database charset
     */
    const DB_CHARSET = 'utf-8';

}
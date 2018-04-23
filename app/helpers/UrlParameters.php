<?php

/**
 * Bookstore URL operations helper
 * 
 * @author    Lukasz Formela
 * @link      lukaszformela.com
 * @copyright (c) 2018. Lukasz Formela. All Rights Reserved.
 * @license   Lesser General Public License <http://www.gnu.org/copyleft/lesser.html>
 * @since     0.0.4
 */

 namespace Bookstore\Helpers;

 class UrlParameters {

    /**
     * Parameters passed to method
     */
    private $aParamsPassed;

    /**
     * Array of possible parameters
     */
    private $aParamsPossible;

    /**
     * Number of url parameters
     */
    private $aParamsSize;

    /**
     * Check for parameters passed in website URL for controller and
     * controllers's method (query)
     * 
     * NOTE: currently it works for address having 2 parts: localhost/bookstore.
     * TODO: read and return additional parameters
     */
    public static function getParams() {

        /**
         * I may change it to simply make a call to the database to retrieve
         * column names in the future.
         */
        $aParamsPossible = array(
            'author',
            'format',
            'min_price',
            'max_price',
            'rating',
        );

        $aParamsPassed = explode('/', $_SERVER['REQUEST_URI']);

        $aParamsSize = count( $aParamsPassed );

        $aParamsArray = array(
            'controller' => ( !empty($aParamsPassed[2]) ? $aParamsPassed[2] : '' ),
            'query'      => ( !empty($aParamsPassed[3]) ? $aParamsPassed[3] : 'all' ),
        );

        return $aParamsArray;

    }

 }
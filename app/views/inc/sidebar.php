<?php

/**
 * Our HTML Sidebar
 * 
 * @author    Lukasz Formela
 * @link      lukaszformela.com
 * @copyright (c) 2018. Lukasz Formela. All Rights Reserved.
 * @license   Lesser General Public License <http://www.gnu.org/copyleft/lesser.html>
 * @since     0.0.3
 */

?>

Choose filters:
<div class="sidebar-filter">
    <div class="sidebar-filter__heading">
        > CATEGORY
    </div>
    <div class="sidebar-filter__filters">
        <ul>
            <li><a href="/bookstore/category/all">All books</a></li>
            <li><a href="/bookstore/category/drama">Drama</a></li>
            <li><a href="/bookstore/category/comedy">Comedy</a></li>
            <li><a href="<?php $_SERVER['REQUEST_URI']; ?>">Third option</a>
                <ul>
                    <li>SUB CATEGORY 1</li>
                    <li>SUB CATEGORY 2</li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="sidebar-filter">
    <div class="sidebar-filter__heading">
        > PRICE
    </div>
    <div class="sidebar-filter__filters">
        <ul>
            <li><a href="<?php $_SERVER['REQUEST_URI']; ?>">0-20</a></li>
            <li><a href="<?php $_SERVER['REQUEST_URI']; ?>">20-30</a></li>
            <li><a href="<?php $_SERVER['REQUEST_URI']; ?>">30+</a>
                <ul>
                    <li>SUB AUTHOR 1</li>
                    <li>SUB AUTHOR 2</li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<?php

/**
 * Our Sidebar
 * 
 * @author    Lukasz Formela
 * @link      lukaszformela.com
 * @copyright (c) 2018. Lukasz Formela. All Rights Reserved.
 * @license   Lesser General Public License <http://www.gnu.org/copyleft/lesser.html>
 * @since     0.0.3
 */

?>

<div class="sidebar-filter">
    <div class="sidebar-filter__heading">
        > CATEGORY
    </div>
    <div class="sidebar-filter__filters">
        <ul>
            <li><a href="/bookstore/category/all">All books</a></li>
            <li><a href="/bookstore/category/drama">Drama</a></li>
            <li><a href="/bookstore/category/comedy">Comedy</a></li>
        </ul>
    </div>
</div>
<div class="sidebar-filter">
    <div class="sidebar-filter__heading">
        > PRICE (TO BE ADDED)
    </div>
    <div class="sidebar-filter__filters">
        <ul>
            <li><a href="<?php $_SERVER['REQUEST_URI']; ?>">0-20</a></li>
            <li><a href="<?php $_SERVER['REQUEST_URI']; ?>">20-30</a></li>
            <li><a href="<?php $_SERVER['REQUEST_URI']; ?>">30+</a></li>
        </ul>
    </div>
</div>
<div class="sidebar-filter">
    <div class="sidebar-filter__heading">
        > RATING (TO BE ADDED)
    </div>
    <div class="sidebar-filter__filters">
        <ul>
            <li><a href="<?php $_SERVER['REQUEST_URI']; ?>">0-1</a></li>
            <li><a href="<?php $_SERVER['REQUEST_URI']; ?>">2-3</a></li>
            <li><a href="<?php $_SERVER['REQUEST_URI']; ?>">4-5</a></li>
        </ul>
    </div>
</div>
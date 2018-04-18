<?php $aResult = $this->aResult; ?>

<div class="view-test">
    <?php if (!empty($aResult)) { ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">GENRE</th>
                    <th scope="col">AUTHOR</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">AMOUNT</th>
                    <th scope="col">ISBN</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ( $aResult as $result ) {
                    echo '<tr>';
                    echo '<th scope="row">' . $result['book_id'] . '</th>';
                    echo '<td>' . $result['book_title'] . '</td>';
                    echo '<td>' . $result['book_genre'] . '</td>';
                    echo '<td>' . $result['book_author_fname'] . ' ' . $result['book_author_sname'] . '</td>';
                    echo '<td>' . $result['book_price'] . '</td>';
                    echo '<td>' . $result['book_amount'] . '</td>';
                    echo '<td>' . $result['book_isbn'] . '</td>';
                    echo '</tr>';
                } ?> 
            </tbody>
        </table>        
    <?php } else { ?>
        <p><div class="alert alert-info" role="alert">NOTHING FOUND, TRY ANOTHER SEARCH.</div><br /></p>
    <?php } ?>
</div>
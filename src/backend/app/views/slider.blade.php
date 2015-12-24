<?php $presenter = new Blog\Pagination\BlogPresenter($paginator); ?>

@if ($paginator->getLastPage() > 1)

    <?php
    // TODO: вернуть назад BootstrapPresenter

    /* How many pages need to be shown before and after the current page */
    $showBeforeAndAfter = 3;

    /* Current Page */
    $currentPage = $paginator->getCurrentPage();
    $lastPage = $paginator->getLastPage();

    /* Check if the pages before and after the current really exist */
    $start = $currentPage - $showBeforeAndAfter;

    /*
        Check if first page in pagination goes below 1, and substract that from
        $showBeforeAndAfter var so the pagination won't start with page 0 or below
    */
    if ($start < 1) {
        $diff = $start - 1;
        $start = $currentPage - ($showBeforeAndAfter + $diff);
    }

    $end = $currentPage + $showBeforeAndAfter;

    if ($end > $lastPage) {
        $diff = $end - $lastPage;
        $end = $end - $diff;
    }
    ?>

    <div class="units-row">
        <div class="unit-40">
            <ul class="pagination">
                {{ $presenter->getPrevious() }}
                {{ $presenter->getPageRange($start, $end) }}
                {{ $presenter->getNext() }}
            </ul>
        </div>
    </div>

@endif
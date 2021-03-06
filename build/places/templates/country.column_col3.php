<?php if (count($this->regions) > 0) { ?>
    <div class="col-12">
        <h2><?php echo $words->get('region_overview_title'); ?></h2>
    </div>

    <?php
    define('MINROWS', 5); // minimum number of rows to be used before next column
    echo '<div class="d-flex flex-column px-3 pb-3">';
    $listcnt = 0;
    $memberCount = 0;
    foreach ($this->regions as $code => $region) {
        // counting total members for possible login-to-see-more message
        $memberCount += $region['number'];

        $listcnt++;

        if ($listcnt > MINROWS) {
            echo '</div><div class="d-flex flex-column px-3 pb-3">';
            $listcnt = 1;
        }

        echo '<div><a href="places/' . htmlspecialchars($this->countryName) . '/' . $this->countryCode . '/'
            . htmlspecialchars($region['name']) . '/' . $code . '"> ' . htmlspecialchars($region['name']) . '</a><span class="ml-1 badge badge-secondary">' . $region['number'] . '</span></div>';

    }
    echo '</div></div>';
}

include_once 'memberlist.php';
?>

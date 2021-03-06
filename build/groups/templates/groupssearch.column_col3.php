<div class="col-12">

    <div class="row mt-2">

        <div class="col-12 col-md-6">
            <h3><?= $words->get('GroupsSearchHeading'); ?></h3>
            <form action="groups/search" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" name="GroupsSearchInput" value="" id="GroupsSearchInput"/>
                    <span class="input-group-btn">
                            <button class="btn btn-primary"
                                    type="submit"><?= $words->getSilent('GroupsSearchSubmit'); ?></button>
                        <?= $words->flushBuffer() ?>
                        </span>
                </div>
            </form>
        </div>
        <div class="col-12 col-md-6">
            <h3><?= $words->get('GroupsCreateHeading'); ?></h3>
            <a class="btn btn-primary" role="button" href="groups/new"><?= $words->get('GroupsCreateNew'); ?></a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12"><h3><?= $words->get('GroupsSearchResult'); ?></h3></div>

        <?php
        $search_result = $this->search_result;

        $this->pager->render();

        if ($search_result) :
        $act_order = (($this->result_order == "actdesc") ? 'actasc' : 'actdesc');
        $name_order = (($this->result_order == "nameasc") ? 'namedesc' : 'nameasc');
        $member_order = (($this->result_order == "membersdesc") ? 'membersasc' : 'membersdesc');
        $created_order = (($this->result_order == "createdasc") ? 'createddesc' : 'createdasc');
        $category_order = (($this->result_order == "categoryasc") ? 'categorydesc' : 'categoryasc');
        ?>
        <div class="col-12 mb-2"><span class="font-weight-bold"><?php echo $words->get('GroupsSearchOrdered'); ?>:</span> <span
                    class="p-2"><?php echo $words->get('GroupsSearchOrdered' . $this->result_order) ?></span>
            <span class="font-weight-bold ml-3"><?= $words->get('GroupsSearchOrder'); ?></span>
            <a class="btn btn-sm btn-primary mx-1"
               href="groups/search?GroupsSearchInput=<?= $this->search_terms; ?>&order=<?= $act_order; ?>&<?= $this->pager->getActivePageMarker(); ?>"><?= $words->get('GroupsOrderBy' . $act_order); ?></a>
            <a class="btn btn-sm btn-primary mx-1"
               href="groups/search?GroupsSearchInput=<?= $this->search_terms; ?>&order=<?= $name_order; ?>&<?= $this->pager->getActivePageMarker(); ?>"><?= $words->get('GroupsOrderBy' . $name_order); ?></a>
            <a class="btn btn-sm btn-primary mx-1"
               href="groups/search?GroupsSearchInput=<?= $this->search_terms; ?>&order=<?= $member_order; ?>&<?= $this->pager->getActivePageMarker(); ?>"><?= $words->get('GroupsOrderBy' . $member_order); ?></a>
            <a class="btn btn-sm btn-primary mx-1"
               href="groups/search?GroupsSearchInput=<?= $this->search_terms; ?>&order=<?= $created_order; ?>&<?= $this->pager->getActivePageMarker(); ?>"><?= $words->get('GroupsOrderDate' . $created_order); ?></a>
        </div>

        <?
        // Categories link disabled until we have categories
        //            |
        //            <a class="grey" href="groups/search?GroupsSearchInput={$this->search_terms}&amp;Order={$category_order}&Page={$this->result_page}">Category</a>

        echo <<<HTML
<div class="col-12">
<div class="row px-2">
HTML;
        foreach ($search_result as $group_data) :

            ?>
            <div class="col-12 col-md-6 col-lg-4 p-2">
                <div class="float-left h-100 mr-2" style="width: 80px;">
                    <!-- group image -->
                    <a href="groups/<?= $group_data->getPKValue() ?>">
                        <img class="groupimg framed" alt="<?= htmlspecialchars($group_data->Name, ENT_QUOTES) ?>"
                             src="<?= ((strlen($group_data->Picture) > 0) ? "groups/thumbimg/{$group_data->getPKValue()}" : 'images/icons/group.png') ?>">
                    </a>
                </div>
                <div>
                    <!-- group name -->
                    <h4>
                        <a href="groups/<?= $group_data->getPKValue() ?>"><?= htmlspecialchars($group_data->Name, ENT_QUOTES) ?></a>
                    </h4>
                    <!-- group details -->
                    <ul class="groupul mt-1">
                        <li><i class="fa fa-group"
                               title="Number of group members"></i> <?= $group_data->getMemberCount(); ?></li>
                        <li><?= $words->get('GroupsDateCreation'); ?>
                            : <?= date('d F Y', ServerToLocalDateTime(strtotime($group_data->created), $this->getSession())); ?></li>
                        <?php if ($group_data !== 0) { ?>
                            <li><?php
                                if ($group_data->latestPost) {
                                    $interval = date_diff(date_create(date('d F Y')), date_create(date('d F Y', ServerToLocalDateTime($group_data->latestPost, $this->getSession()))));
                                    echo $words->get('GroupsLastPost') . ": " . $interval->format('%a') . " " . $words->get('days_ago');

                                } else {
                                    echo $words->get('GroupsNoPostYet');
                                }

                                ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

            <?php
        endforeach;
        ?>
    </div>
</div><!-- end row -->
<?php
$this->pager->render();
?>
<?php else :
    echo <<<HTML
            <p class="note">
            {$words->get('GroupSearchNoResults')}
            </p>
HTML;
endif;
?>
</div>
</div> <!-- groups -->

<?php $style='';
if ($this->passedAway) {
    $style = 'style="border: .25em solid black; padding: .5em;"';
} ?>

<div id="profile" class="row mt-3" <?=$style?>>
    <div class="col-12 col-lg-6">
      <? require 'profile.subcolumn_left.php' ?>
    </div>
    <div class="col-12 col-lg-6">
        <? require 'profile.subcolumn_right.php' ?>
    </div>
</div>

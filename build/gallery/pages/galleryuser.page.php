<?php


//------------------------------------------------------------------------------------
/**
 * page showing latest images and albums of a user
 * 
 *
 */

class GalleryUserPage extends GalleryBasePage
{

    protected function getSubmenuActiveItem()
    {
        return 'overview';
    }

    protected function getSubmenuItems()
    {
        $member = $this->member;
        $words = $this->getWords();
        $ww = $this->ww;
        $wwsilent = $this->wwsilent;

        $ViewForumPosts=$words->get("ViewForumPosts",$member->forums_posts_count()) ;
        $tt = array();
            $tt[]= array('overview', 'gallery/show/user/'.$member->Username.'/sets'.$this->page.'', $ww->GalleryTitleSets);
            $tt[]= array('images', 'gallery/show/user/'.$member->Username.'/images'.$this->page.'', $ww->GalleryTitleLatest);
        if ($this->myself) {
            $tt[]= array("manage", 'gallery/manage', $ww->GalleryManage, 'manage');
            $tt[]= array("upload", 'gallery/upload', $ww->GalleryUpload, 'upload');
            echo $words->flushBuffer();
        }
        return($tt) ;
        
    }
    
    protected function submenu() {
        $active_menu_item = $this->getSubmenuActiveItem();
        echo '<div class="list-group mt-1" role="group">';
        foreach ($this->getSubmenuItems() as $index => $item) {
            $name = $item[0];
            $url = $item[1];
            $label = $item[2];
            if ($name === $active_menu_item) {
                $attributes = ' active';
            } else {
                $attributes = '';
            }
            ?>
            <a class="list-group-item<?= $attributes; ?>" href="<?= $url; ?>"><?= $label; ?></a>
            <?php
        }
        echo '</div>';
    }

    protected function gallerynav() {
        $active_menu_item = $this->getSubmenuActiveItem();
        echo '<div class="btn-group" role="group">';
        foreach ($this->getSubmenuItems() as $index => $item) {
            $name = $item[0];
            $url = $item[1];
            $label = $item[2];
            if ($name === $active_menu_item) {
                $attributes = ' active';
            } else {
                $attributes = '';
            }
            ?>
            <a class="btn btn-light<?= $attributes; ?>" href="<?= $url; ?>"><?= $label; ?></a>
            <?php
        }
        echo '</div>';
    }


/*    protected function breadcrumbs() {
        $words = $this->words;
        return '<h1><a href="gallery">'.$words->get('Gallery').'</a> &raquo; <a href="gallery/show/user/'.$this->member->Username.'">'.ucfirst($this->member->Username).'</a></h1>';
    }
/*

/*    protected function teaserHeadline() {
        $words = $this->words;
        return '<h3 class="userpage">'.MOD_layoutbits::PIC_50_50($this->member->Username,'',$style='float_left').' <a href="members/'.$this->member->Username.'">'.$this->member->Username.'</a></h3>';
    }
*/
    
    protected function teaser() {

        $member = $this->member;
        $picture_url = 'members/avatar/'.$member->Username.'/100';
        ?>

        <div class="row">
            <div class="col-2">
                <div class="w-100"><a href="members/<?=$member->Username?>"><img src="<?=$picture_url?>" alt="Picture of <?=$member->Username?>" class="framed" height="100%" width="100%"/></a></div>
                <a class="btn btn-primary btn-sm btn-block" href="members/<?=$member->Username ?>">Profile</a>
            </div>
            <div class="col-10">
                <?= $this->gallerynav() ?>
                <? if ($this->myself){
                    echo $this->subNav();
                }
                 ?>
            </div>
        </div>
        <?
    }

    public function leftSidebar()
    {
        /*
        $words = $this->words;
        $galleries = $this->galleries;
        $cnt_pictures = $this->cnt_pictures;
        $username = ($member = $this->loggedInMember) ? $member->Username : '';
        $loggedInMember = $this->loggedInMember;
        require SCRIPT_BASE . 'build/gallery/templates/userinfo.php';
        */
    }

    public function subNav()
    {
        $words = $this->words;
        $galleries = $this->galleries;
        $cnt_pictures = $this->cnt_pictures;
        $username = ($member = $this->loggedInMember) ? $member->Username : '';
        $loggedInMember = $this->loggedInMember;
        // require SCRIPT_BASE . 'build/gallery/templates/userinfo.php';
    }

    protected function column_col3() {
        $statement = $this->statement;
        $words = new MOD_words();
        $username = $this->member->Username;
        $galleries = $this->galleries;
        $itemsPerPage = 12;
        require SCRIPT_BASE . 'build/gallery/templates/galleries_overview.php';
    }
} ?>



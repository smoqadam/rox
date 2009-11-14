<?php


//------------------------------------------------------------------------------------
/**
 * page showing latest images and albums of a user
 * 
 *
 */

class GalleryUserGalleriesPage extends GalleryUserPage
{
    protected function init()
    {
        $this->page_title = $this->words->getBuffered("Photosets");
    }

    protected function getSubmenuActiveItem()
    {
        return 'overview';
    }

    protected function teaserHeadline() {
        return '<a href="gallery">'.$this->getWords()->getBuffered('Gallery') . '</a> &gt; '. $this->words->getBuffered("Photosets");
    }
    
    public function leftSidebar()
    {
        $galleries = $this->galleries;
        $cnt_pictures = $this->cnt_pictures;
        $username = $this->username;
        require SCRIPT_BASE . 'build/gallery/templates/userinfo.php';
    }

    protected function column_col3() {
        $statement = $this->statement;
        $galleries = $this->galleries;
        $words = new MOD_words();
        ?>
        <h2><?php echo $words->getFormatted('Photosets'); ?></h2>
        <?php
        require SCRIPT_BASE . 'build/gallery/templates/galleries_overview.php';
    }

}
<?php
        echo '<form method="POST" action="">'.$callback_tag;
        echo <<<HTML
        <!-- Subtemplate: 2 rows at 66/33 percent -->
        <div class="row">
           <div class="col-12 col-lg-4">
           
HTML;
        if ($this->myself) {
        echo <<<HTML
        <script>
            function askDelete() {
                returny = confirm('{$words->getBuffered("confirmdeleteimages")}');
                $('deleteonly').value = 1;
                if (returny) return true;
                else return false;
            }
        </script>
        <p class="bw-row">
            <input type="checkbox" name="selectAllRadio" class="checker" onclick="common.selectAll(this);">
            &nbsp;&nbsp;{$words->get('SelectAll')}            
        </p>
       
        <p class="bw-row">
HTML;
        if (isset($galleries) && $galleries) { 
        echo <<<HTML
        <label class="sr-only">
            {$words->get('GalleryAddToPhotoset')}
        </label><br />
            <input type="radio" name="new" id="oldGallery" value="0" class="mr-1">
            <input name="removeOnly" type="hidden" value="0">
            <select name="gallery" size="1" onchange="$('oldGallery').checked = true;">
                <option value="">- {$words->get('GalleryAddToPhotoset')} -</option>
HTML;
        foreach ($galleries as $d) {
            echo '<option value="'.$d->id.'">'.$d->title.'</option>';
        }
        echo <<<HTML
            </select>
        <br />
HTML;
        }
        echo <<<HTML
        <label class="sr-only">
        {$words->get('GalleryCreateNewPhotoset')}
        </label><br />
        <input type="radio" name="new" id="newGallery" value="1" class="mr-1">
        <input name="g-user" type="hidden" value="{$member->get_userid()}">
        <input name="g-title" id="g-title" maxlength="30" placeholder="{$words->get('GalleryCreateNewPhotoset')}" onclick="$('newGallery').checked = true;  $('deleteonly').value = 0;">
        <br>
        <input type="submit" class="btn btn-primary" name="button" value="{$words->getBuffered('Move images')}" id="button" onclick="$('deleteonly').value = 0; return submitStuff();"/>
        </p>
        <div class="w-100">
            <input name="deleteOnly" id="deleteonly" type="hidden" value="0">
            <input type="submit" class="btn btn-primary" name="button" value="{$words->getBuffered('Delete images')}" class="button" onclick="return askDelete()" style="cursor:pointer"/>
        </div>

        </form>
HTML;
        }
        echo <<<HTML
            </div>
            
            <div class="col-12 col-lg-8">
HTML;
require SCRIPT_BASE . 'build/gallery/templates/overview.php';
echo <<<HTML
          </div>
        </div>
HTML;
?>
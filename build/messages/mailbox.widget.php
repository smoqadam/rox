<?php


class MailboxWidget extends ItemlistWithPagination
{
    public function render() {
        parent::render(); 
    }
    
    // pagination
    
    protected function hrefPage($i_page) {
        return 'messages/inbox/'.$i_page.$_SERVER['QUERY_STRING'] ;
    }
    
    
    //-----------------------------------------------------------------
    // getting the items
    
    protected function getAllItems()
    {
        return $this->getMessages();
    }
    
    
    //-----------------------------------------------------------------
    // table layout
    
    /**
     * Columns for messages table.
     * The $key of a column is used as a suffix for method tableCell_$key
     *
     * @return array table columns, as $name => Column title
     */
    protected function getTableColumns()
    {
		// We don't mark the link of the current sortorder yet, but we could:
		// $sort_current = isset($_GET['sort']) ? $_GET['sort'] : 'date';
		// This would lgo in the a-tag: '.(($sort_current == 'date') ? 'class="sort_selected"' : '').'
		$request_str = implode('/',PRequest::get()->request);
		$dir_str = (isset($_GET['dir']) && $_GET['dir'] != 'ASC') ? 'ASC' : 'DESC';
		$words = new MOD_words();
        return array(
            'select' => '',
            'from' => '<a href="'.$request_str.'?sort=sender&dir='.$dir_str.'">'.$words->getSilent('From').'</a> / <a href="'.$request_str.'?sort=date&dir='.(isset($_GET['dir']) ? $dir_str : 'ASC').'">'.$words->getSilent('Date').'</a>'.$words->flushBuffer(),
            'message' => 'Text',
            // 'status' => 'Status'
            //'date' => 'Date',
        );
    }
    
    /**
     * Table cell in column 'select', for the given $message
     *
     * @param unknown_type $message
     */
    protected function tableCell_select($message)
    {
        ?>
        <input type="checkbox" name="message-mark[]" class="msganchor" id="<?=$message->id?>" value="<?=$message->id?>" />
        <?php
    }
    
    protected function tableCell_from($message)
    {
        $direction_in = ($message->IdReceiver == $_SESSION['IdMember']);
        $contact_username = $direction_in ? $message->senderUsername : $message->receiverUsername;
        $date_sent = $message->DateSent;
        $date_created = $message->created;
        $layoutbits = new MOD_layoutbits();
        $date_string = date("M d, Y - H:i",strtotime($date_created));
        ?>
        <table><tr>
        <td>
        <?=MOD_layoutbits::PIC_30_30($message->senderUsername,'')?>
        </td>
        <td>
        <a style="color: #333;" href="members/<?=$contact_username ?>"><strong><?=$contact_username ?></strong></a>
        <br />
        <span class="small"><?=$layoutbits->ago(strtotime($date_created)) ?></span>
        </td>
        </tr></table>
        <?php
    }
    
    protected function tableCell_message($message)
    {
        $TheMessage=str_replace(array("\n","<br />"),array(" "," "),$message->Message) ;
        $read = (int)$message->WhenFirstRead;
        ?>
        <span>
        <a class="text" <?=($read) ? '' : 'class="unread"'?> href="messages/<?=$message->id ?>"><?=(strlen($TheMessage) >= 150) ? substr($TheMessage,0,150).' ...' : $TheMessage ?></a>
        </span>
        <?php
    }
    
    protected function tableCell_status($message)
    {
        $direction_in = ($message->IdReceiver == $_SESSION['IdMember']);
        $contact_username = $direction_in ? $message->senderUsername : $message->receiverUsername;
        $contact_id = $direction_in ? $message->IdSender : $message->IdReceiver;
        ?>
        <a href="messages/compose/<?=$contact_username ?>"><img src="images/icons/icons1616/icon_contactmember.png" alt="new message" title="new message"></a>
        <a href="messages/with/<?=$contact_username ?>"><img src="images/icons/comments.png" alt="conversation with <?=$contact_username ?>" title="conversation with <?=$contact_username ?>"></a>
        <?php
    }
    
}


?>

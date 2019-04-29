<div class="message-list-container">
    <div class="message-list" id="message-list">
        <div class="content_inbox">
            <?php if(!empty($message_list)) echo $message_list; ?>
        </div>
        <div class="content_sent hide">
            <?php if(!empty($message_list)) echo $message_list; ?>
        </div>
        <div class="content_draft hide">
            <?php if(!empty($message_list)) echo $message_list; ?>
        </div>
    </div>
</div>


Plugin for atk4 which can help to show service messages after page reload

In api (Frontend.php)
    
    $this->add('x_sm\Controller_ServMessages'); 
    
    
Shema:

    $this->api->x_sm->addMessage( -message_key- , -message_type(success|error)- , -message_text-);
    
Adding an error message

    $this->api->x_sm->addMessage('message_key','error','This is error message.');
    
Adding a success message

    $this->api->x_sm->addMessage('message_key','success','This is success message.');
    
You can add multiple messages by changing a message key. And you can also rewrite message by adding new message with same key
Messages will appear after page reload.

x_service_messages
==================

Plugin for atk4 which can help to show service messages after page reload




        $this->api->memorize('message',$this->api->_('Saved'));
        $this->owner->js()->univ()->location(
            $this->api->url('articles/edit',array('article_id'=>$this->m->id))
        )->execute();
        
        
        
    function showMessage() {
        if ($this->api->recall('message')) {
            $this->api->forget('message');
            $this->js(true)->univ()->successMessage($this->api->_('Saved'));
        }
    }

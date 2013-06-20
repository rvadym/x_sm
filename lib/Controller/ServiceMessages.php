<?php
/**
 * Created by JetBrains PhpStorm.
 * User: vadym
 * Date: 6/13/13
 * Time: 9:00 PM
 * To change this template use File | Settings | File Templates.
 */
namespace x_sm;
class Controller_ServiceMessages extends \Controller {
    public $session_var_name = 'atk4_service_messages';
    function init() {
        parent::init();
		// add add-on locations to pathfinder
		$this->loc = $this->api->locate('addons',__NAMESPACE__,'location');
		$addon_location = $this->api->locate('addons',__NAMESPACE__);
		$this->api->pathfinder->addLocation($addon_location,array(
            'php'=>'lib',
            //'template'=>'templates',
            //'css'=>'templates/css',
		))->setParent($this->loc);

        $this->api->x_sm = $this;

        $this->showMessages();
    }
    function addMessage($key, $type, $value) {
        $messages_arr = $this->recallMessages();
        $messages_arr[$key] = array('type'=>$type,'text'=>$value);
        $this->memorizeMessages($messages_arr);
    }
    function showMessages() {
        $messages_arr = $this->recallMessages();
        if (!is_array($messages_arr)) return false;
        foreach ($messages_arr as $message) {
            switch ($message['type']) {
                case 'success':
                    $this->api->js(true)->univ()->successMessage($message['text']);
                    break;
                case 'error':
                    $this->api->js(true)->univ()->errorMessage($message['text']);
                    break;
                default:
                    throw $this->exception('There is no such a system message type!');
            }
        }
        $this->forgetMessages();
    }

    ///  PRIVATE
    private function memorizeMessages($arr) {
        $this->memorize($this->session_var_name,$arr);
    }
    private function recallMessages() {
        return $this->recall($this->session_var_name);
    }
    private function forgetMessages() {
        return $this->forget($this->session_var_name);
    }
}

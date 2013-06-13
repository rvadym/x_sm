<?php
/**
 * Created by JetBrains PhpStorm.
 * User: vadym
 * Date: 6/13/13
 * Time: 9:00 PM
 * To change this template use File | Settings | File Templates.
 */
namespace x_sm;
class Controller_ServMessages extends \Controller {
    public $session_var_name = 'user_panel_lang';
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

        $this->showMwssages();
    }
    function addMessage($key, $value) {
        $messages_arr = $this->recallMessages();
        $messages_arr[$key] = $value;
        $this->memorizeMessages($messages_arr);
    }
    function showMwssages() {

    }

    ///  PRIVATE
    private function memorizeMessages($arr) {
        $this->memorize($this->var_name,$arr);
    }
    private function recallMessages() {
        return $this->recall($this->var_name);
    }
}
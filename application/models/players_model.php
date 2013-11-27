<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Players_model extends CI_Model {

    public function __construct(){

    }

    public function get_by_name($name){

        $player = file_get_contents('http://cheeseburgervacation.com/mcapi/player/'.$name.'/playerdata.json');
        return json_decode($player);

    }
    
    public function getInventory($name){
        $items = file_get_contents(base_url().'asset/json/items.json');
        // See http://stackoverflow.com/a/12884807 for explanation
        $json = preg_replace('/,\s*([\]}])/m', '$1', utf8_encode($items));
        return json_decode($json);
    }

}

/* End of file player_model.php */
/* Location: ./application/models/player_model.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Players_model extends CI_Model {

    public function __construct(){

    }

    public function get_by_name($name){

        $player = file_get_contents('http://cheeseburgervacation.com/mcapi/player/'.$name.'/playerdata.json');
        return json_decode($player);

    }

}

/* End of file player_model.php */
/* Location: ./application/models/player_model.php */
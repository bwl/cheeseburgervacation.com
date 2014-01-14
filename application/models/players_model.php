<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Players_model extends CI_Model {

    public function __construct(){
        
    }

    public function get_by_name($name){

        $player = file_get_contents('http://cheeseburgervacation.com/mcapi/player/'.$name.'/playerdata.json');
        return json_decode($player);

    }
    
    public function getActualInventory($name) {
        
    }
    
    public function getArmor($inventory) {
        $armor = array();
        foreach ($inventory as $item) {
            
            if ($item->Slot == 100) {
                $armor['boots'] = array(7 => "fish");
            }
            if ($item->Slot  == 101) {
                $armor['leggings'] = $item;
            }
            if ($item->Slot  == 102) {
                $armor['chestplate'] = $item;
            }
            if ($item->Slot  == 103) {
                $armor['helmet'] = $item;
            }
        }
        return $armor;
    }

}

/* End of file player_model.php */
/* Location: ./application/models/player_model.php */
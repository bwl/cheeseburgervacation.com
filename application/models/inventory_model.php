<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventory_model extends CI_Model {

    public function __construct(){
        
    }
    
    public function getItems(){
        $items = file_get_contents(base_url().'asset/json/items.json');
        // See http://stackoverflow.com/a/12884807 for explanation
        $json = preg_replace('/,\s*([\]}])/m', '$1', utf8_encode($items));
        return json_decode($json, true);
    }
    
    public function getSlot($slot, $type, $player, $items) {
        $slotHtml = "";
        $name = "";
        
        if ($type == "inventory") {
            $inventory = $player->Inventory;
            $slotItem = $inventory[$slot];
            echo $slotItem;
            
        } else if ($type == "armor") {
            
        } else if ($type == "enderchest") {
        
        }
        
        return $slotHtml;
    }

}

/* End of file inventory_model.php */
/* Location: ./application/models/inventory_model.php */
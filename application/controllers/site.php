<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('html');
        $this->data['page_id'] = 'homePage';
        $this->data = array();
    }

	public function index()
	{
        $this->data['content'] = $this->load->view('pages/home', $this->data, True);
        $this->data['page_id'] = 'homePage';
		$this->load->view('template', $this->data);
	}

    public function gallery()
    {
        $this->data['content'] = $this->load->view('pages/gallery', $this->data, True);
        $this->data['page_id'] = 'galleryPage';
        $this->load->view('template', $this->data);
    }

    public function maps()
    {
        $this->data['content'] = $this->load->view('pages/maps', $this->data, True);
        $this->data['page_id'] = 'mapsPage';
        $this->load->view('template', $this->data);
    }

    public function player($player_name)
    {
        $this->data['player_name'] = $player_name;
        $this->data['content'] = $this->load->view('pages/player', $this->data, True);
        $this->load->view('template', $this->data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
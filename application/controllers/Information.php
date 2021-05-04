<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends CI_Controller {

	public function viewinfo()
	{
		$this->load->model('Information_model');
		$data["prevention"]= $this->Information_model->findInformation("prevention");
		$data["symptome"] = $this->Information_model->findInformation("symptome");
		$data["traitement"] = $this->Information_model->findInformation("traitement");
		$data["title"] = "information covid-19";
		$data["base_url"] = $this->config->item('base_url');
		$data["metacontent"] = "Information : La Covid-19 aussi appelé maladie du coronavirus est une maladie... prevention ...  symptome ...  traitement vaccin grippe... ";
		$this->load->view('nav.php', $data);
		$this->load->view('information.php');
	}
	public function index()
	{
		header('Location:'.$this->config->item('base_url'). 'information-covid-19.html');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Situation extends CI_Controller {

	public function viewmondiale()
	{
		$this->load->model('Actualite_model');
		$data["actu"] = $this->Actualite_model->findlast(1);
		$this->load->model('Statistique_model');
		$data["stat"] = $this->Statistique_model->findStatistiques(1);
		$data["laststat"] = $this->Statistique_model->findlast(1);
		$data["title"] = "Situation covid-19 Mondiale";
		$data["lieu"] = "monde";
		$data["base_url"] = $this->config->item('base_url');
		$data["metacontent"] = "Situation covid-19 Mondiale Statistique cas : nouveau cas... guerri... deces... en traitement... Actualite du jour";
		$this->load->view('nav.php', $data);
		$this->load->view('situation.php');
	}
	public function viewmadagascar()
	{
		$this->load->model('Actualite_model');
		$data["actu"] = $this->Actualite_model->findlast(2);
		$this->load->model('Statistique_model');
		$data["stat"] = $this->Statistique_model->findStatistiques(2);
		$data["laststat"] = $this->Statistique_model->findlast(2);
		$data["title"] = "Situation covid-19 Madagascar";
		$data["lieu"] = "madagascar";
		$data["base_url"] = $this->config->item('base_url');
		$data["metacontent"] = "Situation covid-19 Madagascar Statistique cas : nouveau cas... guerri... deces... en traitement... Actualite du jour";
		$this->load->view('nav.php', $data);
		$this->load->view('situation.php');
	}
	public function index()
	{
		header('Location:'.$this->config->item('base_url').'information-covid-19.html');
	}
}

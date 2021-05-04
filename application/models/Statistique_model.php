<?php
    class Statistique_model extends CI_Model{
        public $idstatistique;
        public $nouveaucas;
        public $gueris;
        public $deces;
        public $lieu; // 1=autre que madagascar 2=madagascar
        //+ en traitement

        public function __construct($nouveaucas=0, $gueris=0, $deces=0, $lieu=1){ // default autre que madagascar
            parent::__construct();
            if ($nouveaucas < 0){
                $nouveaucas = 0;
            }
            if ($gueris < 0) {
                $gueris = 0;
            }
            if ($deces < 0) {
                $deces = 0;
            } 
            $this->nouveaucas=$nouveaucas;
            $this->gueris=$gueris;
            $this->deces=$deces;
            if ($lieu!=1 && $lieu != 2) { //eviter modification via inspecter(navigateur)
                $lieu=1;
            }
            $this->lieu=$lieu;
        }

        public function insert($statistique){
            $sql= "INSERT INTO t_statistique (nouveaucas,gueris,deces,lieu) VALUES(%d,%d,%d,%d)";
            $sql=sprintf($sql,$statistique->nouveaucas,$statistique->gueris,$statistique->deces,$statistique->lieu);
            try {
                $this->db->query($sql);
                return "succes";
            } catch (\Throwable $th) {
                return "error";
            }
        }

        public function findStatistiques($lieu){
            $sql= "SELECT SUM(nouveaucas) as nouveaucas , SUM(gueris) as gueris , SUM(deces) as deces FROM t_statistique";
            if ($lieu != 1 && $lieu != 2) { //eviter modification via inspecter(navigateur)
                $lieu = 1;
            }
            if ($lieu != 1) {// madagascar only
                $sql = "SELECT SUM(nouveaucas) as nouveaucas , SUM(gueris) as gueris , SUM(deces) as deces FROM t_statistique WHERE lieu=%d";
                $sql = sprintf($sql, $lieu);
            }
            $statistique = new Statistique_model(0, 0, 0, 0, $lieu);
            if($result=$this->db->query($sql)){
                if(count($result->result_array())>0){
                    foreach($result->result_array() as $row){
                        $statistique=new Statistique_model($row["nouveaucas"],$row["gueris"],$row["deces"],$lieu);
                        break;
                    }
                }
            }
            return $statistique;
        }

        public function findlast($lieu){
            $sql= "SELECT * FROM t_statistique ORDER BY id DESC";
            if ($lieu != 1 && $lieu != 2) { //eviter modification via inspecter(navigateur)
                $lieu = 1;
            }
            if ($lieu != 1) { // madagascar only
                $sql = "SELECT * FROM t_statistique WHERE lieu=%d ORDER BY id DESC";
                $sql = sprintf($sql, $lieu);
            }
            $statistique = new Statistique_model(0, 0, 0, 0, $lieu);
            if ($result = $this->db->query($sql)) {
                if (count($result->result_array()) > 0) {
                    foreach ($result->result_array() as $row) {
                        $statistique = new Statistique_model($row["nouveaucas"], $row["gueris"], $row["deces"], $lieu);
                        break;
                    }
                }
            }
            return $statistique;
        }

        public function resetAll()
        {
            $sql = "DELETE FROM t_statistique WHERE id > 0";
            try {
                $this->db->query($sql);
                return "succes";
            } catch (\Throwable $th) {
                return "error";
            }
        }
    }
?>
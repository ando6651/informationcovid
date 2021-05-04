<?php
    class Actualite_model extends CI_Model{
        public $idactualite;
        public $titre;
        public $evenement;
        public $dateevent;
        public $lieu; // 1=autre que madagascar 2=madagascar

        public function __construct($titre="", $evenement="", $dateevent="", $lieu=1){ // default autre que madagascar
            parent::__construct();
            $this->titre= str_replace('\'', ' ', $titre);
            $this->evenement= str_replace('\'', ' ', $evenement);
            $this->dateevent= str_replace('\'', ' ', $dateevent);
            if ($lieu!=1 && $lieu != 2) { //eviter modification via inspecter(navigateur)
                $lieu=1;
            }
            $this->lieu=$lieu;
        }

        public function insert($actualite){
            $sql= "INSERT INTO t_actualite (titre,evenement,dateevent,lieu) VALUES('%s','%s',STR_TO_DATE('%s', '%%Y-%%m-%%d'),%d)";
            $sql=sprintf($sql,$actualite->titre,$actualite->evenement,$actualite->dateevent,$actualite->lieu);
            try {
                $this->db->query($sql);
                return "succes";
            } catch (\Throwable $th) {
                return "error";
            }
        }
        public function findactualites($lieu){
            $sql= "SELECT * FROM t_actualite";
            if ($lieu != 1 && $lieu != 2) { //eviter modification via inspecter(navigateur)
                $lieu = 1;
            }
            if ($lieu != 1) {// madagascar only
                $sql = "SELECT * FROM t_actualite WHERE lieu=%d";
                $sql = sprintf($sql, $lieu);
            }
            $actualites=array();
            if($result=$this->db->query($sql)){
                if(count($result->result_array())>0){
                    foreach($result->result_array() as $row){
                        $actualite=new Actualite_model($row["titre"],$row["evenement"],$row["dateevent"], $lieu);
                        $actualite->idactualite=$row["id"];
                        $actualites[]=$actualite;
                    }
                }
            }
            return $actualites;
        }

        public function findlast($lieu){ // les plus recent
            $sql = "SELECT * FROM t_actualite ORDER BY dateevent DESC";
            if ($lieu != 1 && $lieu != 2
            ) { //eviter modification via inspecter(navigateur)
                $lieu = 1;
            }
            if ($lieu != 1
            ) { // madagascar only
                $sql = "SELECT * FROM t_actualite WHERE lieu=%d ORDER BY dateevent DESC";
                $sql = sprintf($sql, $lieu);
            }
            $actualites = array();
            if ($result = $this->db->query($sql)) {
                if (count($result->result_array()) > 0) {
                    $count=0;
                    foreach ($result->result_array() as $row) {
                        if ($count==8) {
                            break;
                        }
                        $actualite = new Actualite_model($row["titre"], $row["evenement"], $row["dateevent"], $lieu);
                        $actualite->idactualite = $row["id"];
                        $actualites[] = $actualite;
                        $count++;
                    }
                }
            }
            return $actualites;
        }

        public function delete($id)
        {
            $sql = "DELETE FROM t_actualite WHERE id = %d";
            $sql = sprintf($sql, $id);
            try {
                $this->db->query($sql);
                return "succes";
            } catch (\Throwable $th) {
                return "error";
            }
        }
    }

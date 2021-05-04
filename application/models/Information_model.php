<?php
    class Information_model extends CI_Model{
        public $idinformation;
        public $categorie;
        public $descri;

        public function __construct($categorie="",$descri=""){
            parent::__construct();
            $this->categorie= str_replace('\'', ' ', $categorie);
            $this->descri= str_replace('\'', ' ', $descri);
        }

        public function insert($information){
            $sql= "INSERT INTO t_information (categorie,descri) VALUES('%s','%s')";
            $sql=sprintf($sql,$information->categorie,$information->descri); 
            try {
                $this->db->query($sql);
                return "succes";
            } catch (\Throwable $th) {
                return "error";
            } 
        }
        public function delete($idinformation)
        {
            $sql = "DELETE FROM t_information WHERE id = %d ";
            $sql = sprintf($sql, $idinformation);
            try {
                $this->db->query($sql);
                return "succes";
            } catch (\Throwable $th) {
                return "error";
            }
        }
    public function findAllInformation()
    {
        $sql = "SELECT * FROM t_information";
        $informations = array();
        if ($result = $this->db->query($sql)) {
            if (count($result->result_array()) > 0) {
                foreach ($result->result_array() as $row) {
                    $information = new Information_model($row["categorie"], $row["descri"]);
                    $information->idinformation = $row["id"];
                    $informations[] = $information;
                }
            }
        }
        return $informations;
    }
        public function findInformation($categorie){
            $sql= "SELECT * FROM t_information WHERE categorie='%s' ";
            $sql=sprintf($sql, $categorie);
            $informations=array();
            if($result=$this->db->query($sql)){
                if(count($result->result_array())>0){
                    foreach($result->result_array() as $row){
                        $information=new Information_model($row["categorie"],$row["descri"]);
                        $information->idinformation=$row["id"];
                        $informations[]=$information;
                    }
                }
            }
            return $informations;
        }
    }
?>
<?php
require_once ("PersonnageManager.php");

    class Personnage{
        private static $compteur = 0;
        private $id;
        private $nom;
        private $atk;
        private $pv;
        private $currentPV;
        private $img;
        const MINLIFE = 0;

        public static function getCompteur()
        {
        echo self::$compteur;
        }

        public function hydrate(array $donnees) {
            foreach ($donnees as $key => $value) 
            {
                $method = 'set'.ucfirst($key);
                if (method_exists($this, $method)) 
                {
                $this->$method($value);
                }
            }
        }

        public function __construct(array $donnees){
            $this -> hydrate($donnees);
            self::$compteur++;
        }
        
        
        public function reinitPVMAX(){
            if ( $this->currentPV > $this->pv) {
                $this->currentPV = $this->pv;
                echo "<div class=\"fight_status_container\"><div class=\"fight_status\"> $this->nom : PV max atteint </div></div>";
            } 
        }

        public function reinitPVMIN(){
            if ( $this->currentPV < self::MINLIFE) {
                $this->currentPV = self::MINLIFE;
                echo "<div class=\"fight_status_container\"><div class=\"fight_status\"> $this->nom : PV minimum atteint </div></div>";
            }
        }
        
        public function setId(int $id){
            $this->id=$id;
        }

        public function setNom(string $nom){
            $this->nom=$nom;
        }

        public function setImg($img){
            $this->img=$img;
        }

        public function setPV(int $pv){
            $this->pv=$pv;
        }

        public function setCurrentPV(int $currentPV){
            $this->currentPV=$currentPV;
        }

        public function setAtk(int $atk){
            $this->atk=$atk;
        }

        public function getId(){
            return $this->id;
        }

        public function getNom(){
            return $this->nom;
        }

        public function getImg(){
            return $this->img;
        }

        public function getPV(){
            return $this->pv;
        }

        public function getCurrentPV(){
            return $this->currentPV;
        }

        public function getAtk(){
            return $this->atk;
        }

        public function regenerer(){
            if ( $this->currentPV > self::MINLIFE) {
               $this->currentPV += 50;
               echo "<div class=\"fight_status_container\"><div class=\"fight_status_action\"> $this->nom se soigne de 50 PV</div></div>";
            } else {
                echo "<div class=\"fight_status_container\"><div class=\"fight_status_death\">$this->nom est mort, il ne peut plus se soigner...<br>Réanimez le!</div></div>";
            }
        }

        public function attaque(Personnage $perso){
            if ( $this->currentPV > self::MINLIFE) {
            $perso->currentPV -= $this->atk;
            echo "<div class=\"fight_status_container\"><div class=\"fight_status_action\"> $this->nom attaque $perso->nom</div></div>";
            } else {
                echo "<div class=\"fight_status_container\"><div class=\"fight_status_death\">$this->nom est mort, il ne peut plus attaquer...<br>Réanimez le!</div></div>";
            }
        }

        public function is_alive(){
            if ($this->currentPV == 0) {
                echo "<div class=\"fight_status_container\"><div class=\"fight_status_death\">$this->nom est mort</div></div>";   
            }
        }
    }
?>
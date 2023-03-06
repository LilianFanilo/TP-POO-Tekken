<?php

class PersonnageManager {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getList() {
        $personnages = [];
        $query = $this->db->query('SELECT * FROM personnages ORDER BY nom');
        while ($donnees = $query->fetch(PDO::FETCH_ASSOC)) {
            $personnages[] = new Personnage($donnees);
        }
        return $personnages;
    }

    public function getOne($id) {
        $query = $this->db->prepare('SELECT * FROM personnages WHERE id = :id');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();

        $data = $query->fetch(PDO::FETCH_ASSOC);

        if ($data !== false) {
            return new Personnage($data);
        } else {
            return null;
        }
    }

    public function deletePersonnage($id) {
        $query = $this->db->prepare('DELETE FROM personnages WHERE id = :id');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }

    public function insertPerso($name, $img, $atk, $pv,) {
        $query = $this->db->prepare('INSERT INTO personnages (nom, img, atk, pv, currentPV) VALUES (:name, :img, :atk, :pv, :currentPV)');
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':img', $img, PDO::PARAM_LOB);
        $query->bindValue(':atk', $atk, PDO::PARAM_INT);
        $query->bindValue(':pv', $pv, PDO::PARAM_INT);
        $query->bindValue(':currentPV', $pv, PDO::PARAM_INT);
        $query->execute();
    }

    public function resetPersonnage(Personnage $perso){
        $query = $this->db->prepare('UPDATE personnages SET nom = :name, img = :img, atk = :atk, pv = :pv, currentPV = :currentPV WHERE id = :id');
        $query->bindValue(':id', $perso->getId(), PDO::PARAM_INT);
        $query->bindValue(':name', $perso->getNom(), PDO::PARAM_STR);
        $query->bindValue(':img', $perso->getImg(), PDO::PARAM_LOB);
        $query->bindValue(':atk', $perso->getAtk(), PDO::PARAM_INT);
        $query->bindValue(':pv', $perso->getPV(), PDO::PARAM_INT);
        $query->bindValue(':currentPV', $perso->getPV(), PDO::PARAM_INT);
        $query->execute();
        }

    public function updatePersonnage(Personnage $perso){
        $query = $this->db->prepare('UPDATE personnages SET nom = :name, img = :img, atk = :atk, pv = :pv, currentPV = :currentPV WHERE id = :id');
        $query->bindValue(':id', $perso->getId(), PDO::PARAM_INT);
        $query->bindValue(':name', $perso->getNom(), PDO::PARAM_STR);
        $query->bindValue(':img', $perso->getImg(), PDO::PARAM_LOB);
        $query->bindValue(':atk', $perso->getAtk(), PDO::PARAM_INT);
        $query->bindValue(':pv', $perso->getPV(), PDO::PARAM_INT);
        $query->bindValue(':currentPV', $perso->getCurrentPV(), PDO::PARAM_INT);
        $query->execute();
        }

        public function ModifPersonnage($id, $name, $atk, $pv){
            $query = $this->db->prepare('SELECT nom, atk, pv FROM personnages WHERE id = :id');
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $nom = empty($name) ? $result['nom'] : $name;
            $attaque = empty($atk) ? $result['atk'] : $atk;
            $points_de_vie = empty($pv) ? $result['pv'] : $pv;
            $query = $this->db->prepare('UPDATE personnages SET nom = :name, atk = :atk, pv = :pv, currentPV = :pv WHERE id = :id');
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->bindValue(':name', $nom, PDO::PARAM_STR);
            $query->bindValue(':atk', $attaque, PDO::PARAM_INT);
            $query->bindValue(':pv', $points_de_vie, PDO::PARAM_INT);
            $query->execute();
        }
        
}
?>
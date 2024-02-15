<?php
include("connexion.php");

class Produit
{
    public $idprod;
    public $designation_prod;
    public $quantite_stock;
    public $prix_unitaire;
    public $idfam;

    function __construct($id, $des, $q, $p, $idf)
    {
        $this->idprod = $id;
        $this->designation_prod = $des;
        $this->quantite_stock = $q;
        $this->prix_unitaire = $p;
        $this->idfam = $idf;
    }

    function ajouter()
    {
        $cnx = Connexion::getInstance()->getConnexion();
        if ($cnx) {
            $sql = "INSERT INTO produit (designation_prod, quantite_stock, prix_unitaire, idfam) VALUES(?, ?, ?, ?)";
            $stmt = $cnx->prepare($sql);
            $stmt->execute([$this->designation_prod, $this->quantite_stock, $this->prix_unitaire, $this->idfam]);
            if ($stmt->rowCount() != 1) {
                return "Insertion impossible";
            } else {
                return true;
            }
        } else {
            return "Connexion impossible";
        }
    }

    function supprimer()
    {
        $cnx = Connexion::getInstance()->getConnexion();
        if ($cnx) {
            $sql = "DELETE FROM produit WHERE idprod=?";
            $stmt = $cnx->prepare($sql);
            $stmt->execute([$this->idprod]);
            if ($stmt->rowCount() != 1) {
                return "Suppression impossible";
            } else {
                return true;
            }
        } else {
            return "Connexion impossible";
        }
    }

    function modifier()
    {
        $cnx = Connexion::getInstance()->getConnexion();
        if ($cnx) {
            $sql = "UPDATE produit SET designation_prod=?, quantite_stock=?, prix_unitaire=?, idfam=? WHERE idprod=?";
            $stmt = $cnx->prepare($sql);
            $stmt->execute([$this->designation_prod, $this->quantite_stock, $this->prix_unitaire, $this->idfam, $this->idprod]);
            if ($stmt->rowCount() != 1) {
                return "Modification impossible";
            } else {
                return true;
            }
        } else {
            return "Connexion impossible";
        }
    }

    static function lecture($id)
    {
        $res = null;
        $cnx = Connexion::getInstance()->getConnexion();
        if ($cnx) {
            $sql = "SELECT * FROM produit WHERE idprod=?";
            $stmt = $cnx->prepare($sql);
            $stmt->execute([$id]);
            $prod = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($prod) {
                $res = new Produit($prod["idprod"], $prod["designation_prod"], $prod["quantite_stock"], $prod["prix_unitaire"], $prod["idfam"]);
            }
        }
        return $res;
    }

    static function lister()
    {
        $tab = null;
        $cnx = Connexion::getInstance()->getConnexion();
        if ($cnx) {
            $sql = "SELECT * FROM produit ORDER BY designation_prod";
            $stmt = $cnx->query($sql);
            $tab = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $tab;
    }
}
?>

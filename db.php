<?php

class database{
    private $host;
    private $username;
    private $password;
    private $database;
    private $dbh;

    public function __construct() {
        $this->host = 'localhost:3308';
        $this->username = 'root';
        $this->password = '';
        $this->database = 'pdo_toets';

        $dsn = "mysql:host=$this->host;dbname=$this->database";
        $this->dbh = new PDO($dsn, $this->username, $this->password);
    }

    public function addTelefoon(string $merk, string $model, int $opslag, int $prijs) {
	    $sql = 'INSERT INTO telefoons (merk, model, opslag_in_gb, prijs) VALUES (:merk, :model, :opslag_in_gb, :prijs)';
	    $stmt = $this->dbh->prepare($sql);
	    $stmt->execute([
            'merk' => $merk,
            'model' => $model,
            'opslag_in_gb' => $opslag,
            'prijs' => $prijs
        ]);
    }

    public function selectAllTelefoons() {
        $stmt = $this->dbh->query('SELECT * from telefoons');
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public function editTelefoon(string $merk, string $model, string $opslag_in_gb, int $prijs,  int $telefoonID) {
        $sql = 'update telefoons SET merk=:merk, model =:model, opslag_in_gb =:opslag_in_gb, prijs =:prijs WHERE telefoonID=:telefoonID';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([
            'merk' => $merk,
            'model' => $model,
            'opslag_in_gb' => $opslag_in_gb,
            'prijs' => $prijs,
            'telefoonID' => $telefoonID
        ]);
    }

    public function deleteTelefoon(int $telefoonID) {
        $sql = 'DELETE FROM telefoons WHERE telefoonID =:telefoonID';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(['telefoonID' => $telefoonID]);
    }
}








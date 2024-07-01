<?php
class Database {
    private $host;
    private $db;
    private $username;
    private $password;
    private $charset;

    function __construct()
    {
        $this->host = constant('DB_HOST');
        $this->db = constant('DB_DATABASE');
        $this->username = constant('DB_USERNAME');
        $this->password = constant('DB_PASSWORD');
        $this->charset = constant('DB_CHARSET');
    }

    public function connect() {
        try {
            $connection = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset;";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $pdo = new PDO($connection, $this->username, $this->password, $options);
            return $pdo;
        } catch(PDOException $e) {
            print_r('DB Error connection ' . $e->getMessage());
        }
    }
}


?>
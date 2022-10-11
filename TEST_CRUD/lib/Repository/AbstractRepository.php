<?php

abstract class AbstractRepository {
    
    private const DATABASE_NAME = "mysql:host=db.3wa.io;dbname=tommydumora_test_crud";
    private const DATABASE_USERNAME = "tommydumora";
    private const DATABASE_PASSEWORD = "0bc6cbdf55461f0b5e91e3c7619bb673";

    private function connect() {

        return new PDO(self::DATABASE_NAME, self::DATABASE_USERNAME, self::DATABASE_PASSEWORD);
        
    }

    protected function executeQuery(string $query, string $class, array $params = []): mixed
    {
        $result = null;
        // Connection BDD en PDO
        $conn = $this->connect();
        $stm = $conn->prepare($query);
        foreach ($params as $key => $param) $stm->bindValue($key, $param);
        if ($stm->execute()) {
            // récupérer les lignes de la BDD sous forme d'object
            strlen($class) && $stm->setFetchMode(PDO::FETCH_CLASS, $class);
            if ($stm->rowCount() === 1) $result = $stm->fetch();
            if ($stm->rowCount() > 1) $result = $stm->fetchAll();
        }
        
        $conn = null;
        return $result;
    }
}
<?php

require_once '../lib/Repository.php';


class FrageRepository extends repository{

      protected $tableName = 'benutzer';



      public function create($text, $moralfrage, $freigegeben, $erstellt_von)
        {

            $query = "INSERT INTO $this->tableName (benutzername, passwort, istAdmin) VALUES (?, ?, ?)";

            $statement = ConnectionHandler::getConnection()->prepare($query);
            $statement->bind_param('ssb', $benutzername, $passwort, $istAdmin);

            if (!$statement->execute()) {
                throw new Exception($statement->error);
            }

            return $statement->insert_id;
        }

}



?>

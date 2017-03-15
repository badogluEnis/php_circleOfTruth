<?php

require_once '../lib/Repository.php';


class AntwortRepository extends repository{

      protected $tableName = 'benutzer';



      public function create($antwort, $is_korrekt, $frage_id)
        {

            $password = sha1($password);

            $query = "INSERT INTO $this->tableName (antwort, is_korrekt, frage_id) VALUES (?, ?, ?)";

            $statement = ConnectionHandler::getConnection()->prepare($query);
            $statement->bind_param('sii', $antwort, $is_korrekt, $frage_id);

            if (!$statement->execute()) {
                throw new Exception($statement->error);
            }

            return $statement->insert_id;
        }

}



?>

<?php

require_once '../lib/Repository.php';


class FrageRepository extends repository{

      protected $tableName = 'frage';




      public function create($text, $moralfrage, $freigegeben, $erstellt_von, $antw1, $antw2)
        {

            $query = "INSERT INTO $this->tableName (text, moralfrage, freigegeben, erstellt_von) VALUES (?, ?, ?, ?)";

            $statement = ConnectionHandler::getConnection()->prepare($query);
            $statement->bind_param('siii', $text, $moralfrage, $freigegeben, $erstellt_von);

            if (!$statement->execute()) {
              throw new Exception($statement->error);
            }
            $frageId = $statement->insert_id;



            $query2 = "INSERT INTO antwort (antwort, is_korrekt, frage_id) VALUES (?, ?, ?)";

            $true = 1;
            $statement2 = ConnectionHandler::getConnection()->prepare($query2);
            $statement2->bind_param('sii', $antw1, $true, $frageId);

            if (!$statement2->execute()) {
                throw new Exception($statement2->error);
            }



            $query3 = "INSERT INTO antwort (antwort, is_korrekt, frage_id) VALUES (?, ?, ?)";

            $false = false;
            $statement3 = ConnectionHandler::getConnection()->prepare($query3);
            $statement3->bind_param('sii', $antw2, $false, $frageId);

            if (!$statement3->execute()) {
                throw new Exception($statement3->error);
            }
            $statement3->close();
        }

}




?>

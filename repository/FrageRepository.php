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



            $query2 = "INSERT INTO antwort (antwort, is_korrekt, frage_id) VALUES (?, ?, ?)";

            $statement2 = ConnectionHandler::getConnection()->prepare($query2);
            $statement2->bind_param('sii', $antw1, true, $frage_id);

            if (!$statement->execute()) {
                throw new Exception($statement->error);



            $query3 = "INSERT INTO antwort (antwort, is_korrekt, frage_id) VALUES (?, ?, ?)";

            $statement3 = ConnectionHandler::getConnection()->prepare($query3);
            $statement3->bind_param('sii', $antw2, false, $frage_id);

            if (!$statement->execute()) {
                throw new Exception($statement->error);


            }

            return $statement->insert_id;
        }

}
}



?>

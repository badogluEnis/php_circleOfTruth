<?php

require_once '../lib/Repository.php';


class FrageRepository extends repository{

      protected $tableName = 'frage';



      public function create($text, $moralfrage, $freigegeben, $erstellt_von)
        {

            $query = "INSERT INTO $this->tableName (text, moralfrage, freigegeben, erstellt_von) VALUES (?, ?, ?, ?)";

            $statement = ConnectionHandler::getConnection()->prepare($query);
            $statement->bind_param('siii', $text, $moralfrage, $freigegeben, $erstellt_von);

            if (!$statement->execute()) {
                throw new Exception($statement->error);
            }

            return $statement->insert_id;
        }

}



?>

<?php

require_once '../lib/Repository.php';


class FrageRepository extends repository{

      protected $tableName = 'geantwortet';



      public function create($person_id, $antwort_id, $zeit)
        {

            $query = "INSERT INTO $this->tableName (person_id, antwort_id, zeit) VALUES (?, ?, ?)";

            $statement = ConnectionHandler::getConnection()->prepare($query);
            $statement->bind_param('iis', $person_id, $antwort_id, $zeit);

            if (!$statement->execute()) {
                throw new Exception($statement->error);
            }

            return $statement->insert_id;
        }

}



?>


<?php

require_once '../lib/Repository.php';


class FrageRepository extends repository{

      protected $tableName = 'benutzer';



      public function create($benutzername, $passwort, $ist_admin)
        {

            $password = sha1($password);

            $query = "INSERT INTO $this->tableName (benutzername, antwort_id, zeit) VALUES (?, ?, ?)";

            $statement = ConnectionHandler::getConnection()->prepare($query);
            $statement->bind_param('ssi', $benutzername, $passwort, $ist_admin);

            if (!$statement->execute()) {
                throw new Exception($statement->error);
            }

            return $statement->insert_id;
        }

}



?>

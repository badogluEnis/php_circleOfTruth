<?php

require_once '../lib/Repository.php';


class BenutzerRepository extends repository{

      protected $tableName = 'benutzer';



      public function create($benutzername, $password, $ist_admin)
        {
            $password = sha1($password);

            $query = "INSERT INTO $this->tableName (benutzername, passwort, ist_admin) VALUES (?, ?, ?)";

            $statement = ConnectionHandler::getConnection()->prepare($query);
            $statement->bind_param('ssi', $benutzername, $password, $ist_admin);

            if (!$statement->execute()) {
                throw new Exception($statement->error);
            }

            return $statement->insert_id;
        }


    public function isValidLogin($benutzername, $password) {

        $password = sha1($password);

        $query = "SELECT benutzername, passwort FROM $this->tableName WHERE benutzername =? AND passwort =?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ss', $benutzername, $password);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        $result = $statement->get_result();

        if (!$result) {
          throw new Exception($statement->error);
        } else {
          return true;
        }


      }


      public function ist_admin($benutzername, $password, $ist_admin) {

      }

}



?>

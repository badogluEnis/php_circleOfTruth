<?php

require_once '../lib/Repository.php';
require_once '../lib/ConnectionHandler.php';


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


    public function getBenutzerByUsernameAndPassword($benutzername, $password)
    {
        $password = sha1($password);

        $query = "SELECT * FROM $this->tableName WHERE benutzername = ? AND passwort = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ss', $benutzername, $password);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        $result = $statement->get_result();

        if (!$result) {
          throw new Exception($statement->error);
        }

        $benutzer = null;
        if ($result->num_rows === 1) {
          $benutzer = $result->fetch_object();
        }

        $result->close();

        return $benutzer;
      }

}

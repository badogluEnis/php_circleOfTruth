<?php

require_once '../lib/Repository.php';
require_once '../lib/ConnectionHandler.php';


class BenutzerRepository extends repository{

      protected $tableName = 'benutzer';


      public function create($benutzername, $password) {

        $password = sha1($password);

          $query = "SELECT benutzername, passwort, ist_admin id FROM $this->tableName WHERE benutzername =? AND passwort =?";

          $statement = ConnectionHandler::getConnection()->prepare($query);
          $statement->bind_param('ss', $benutzername, $password);

          if (!$statement->execute()) {
              throw new Exception($statement->error);
          }

          $result = $statement->get_result();

          if (!$result) {
            throw new Exception($statement->error);
          }

          if ($result->num_rows == 1) {
            $row = $result->fetch_object();
            $_SESSION ['admin'] = $row->ist_admin;
            $_SESSION ['id'] = $row->id;

            if ($_SESSION ['admin']) {
              return true;
            }
              return false;
          }

      }

}



?>

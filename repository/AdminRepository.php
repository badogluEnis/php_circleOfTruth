<?php

require_once '../lib/Repository.php';
require_once '../lib/ConnectionHandler.php';


class BenutzerRepository extends repository{

      protected $tableName = 'frage';


      public function getFrage() {

        $password = sha1($password);

          $query = "SELECT text, moralfrage, Freigegeben, antwort, is_korrekt FROM $this->tableName f JOIN antwort a ON a.frage_id = f.id WHERE freigegeben = 0";

          $statement = ConnectionHandler::getConnection()->prepare($query);

          if (!$statement->execute()) {
              throw new Exception($statement->error);
          }

          $result = $statement->get_result();

          if (!$result) {
            throw new Exception($statement->error);
          }


          $row = $result->fetch_object();
          $_SESSION ['admin'] = $row->ist_admin;
          $_SESSION ['id'] = $row->id;

          if ($_SESSION ['admin']) {
            return true;
          }
            return false;
      }

}



?>

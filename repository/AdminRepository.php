<?php

require_once '../lib/Repository.php';
require_once '../lib/ConnectionHandler.php';


class AdminRepository extends repository{

    protected $tableName = 'frage';


    public function getFrage() {

        $query = "SELECT text, moralfrage, Freigegeben, antwort, is_korrekt FROM $this->tableName f JOIN antwort a ON a.frage_id = f.id WHERE freigegeben = 0";

        $statement = ConnectionHandler::getConnection()->prepare($query);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        $result = $statement->get_result();

        if (!$result) {
          throw new Exception($statement->error);
        }

        $rows[] = array();
        while($row = $result->fetch_object()) {
          $rows[] = $row;
      }

        return $rows;

        }
    }




?>

<?php

require_once '../lib/Repository.php';
require_once '../lib/ConnectionHandler.php';


class AdminRepository extends repository{

    protected $tableName = 'frage';


    public function getFragen() {

        $query = "SELECT text, moralfrage, Freigegeben FROM $this->tableName WHERE freigegeben = 0";

        $statement = ConnectionHandler::getConnection()->prepare($query);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        $result = $statement->get_result();

        if (!$result) {
            throw new Exception($statement->error);
        }

        $rows = array();
        while($row = $result->fetch_object()) {
            $rows[] = $row;
        }

        return $rows;
    }




    public function getAntworten() {

              $query = "SELECT * FROM antwort WHERE frage_id in (SELECT id FROM frage WHERE freigegeben = 0)";

              $statement = ConnectionHandler::getConnection()->prepare($query);

              if (!$statement->execute()) {
                  throw new Exception($statement->error);
              }

              $result = $statement->get_result();

              if (!$result) {
                  throw new Exception($statement->error);
              }

              $rows = array();
              while($row = $result->fetch_object()) {
                  $rows[] = $row;
              }

              return $rows;
    }
}

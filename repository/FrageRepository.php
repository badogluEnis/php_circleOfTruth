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
            $frageId = $statement->insert_id;

            $statement->close();

            $query2 = "INSERT INTO antwort (antwort, is_korrekt, frage_id) VALUES (?, ?, ?)";

            $true = 1;
            $statement2 = ConnectionHandler::getConnection()->prepare($query2);
            $statement2->bind_param('sii', $antw1, $true, $frageId);

            if (!$statement2->execute()) {
                throw new Exception($statement2->error);
            }

            $statement2->close();

            $query3 = "INSERT INTO antwort (antwort, is_korrekt, frage_id) VALUES (?, ?, ?)";

            $false = false;
            $statement3 = ConnectionHandler::getConnection()->prepare($query3);
            $statement3->bind_param('sii', $antw2, $false, $frageId);

            if (!$statement3->execute()) {
                throw new Exception($statement3->error);
            }
            $statement3->close();
        }


        public function getFragen() {
       $query = "SELECT * FROM frage WHERE freigegeben = 1";

       $statement = ConnectionHandler::getConnection()->prepare($query);

       if (!$statement->execute()) {
              throw new  Exeption($statement->error);
       }

       $result = $statement->get_result();

       if (!$result) {
              throw new Exception($statement->error);
       }

       $fragen = array();
       while($frage = $result->fetch_object()) {
              $fragen[] = $frage;
       }

       $result->close();

       return $fragen;
      }

      public function getAntworten() {

       $query = "SELECT * FROM antwort WHERE frage_id in (SELECT id FROM frage WHERE freigegeben = 1)";

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



        public function acceptById($frageid) {

          $query = "UPDATE TABLE $this->tableName SET freigegeben = 1 WHERE id = ?";

          $statement = ConnectionHandler::getConnection()->prepare($query);
          $statement->bind_param('i', $frageid);

          if (!$statement->execute()) {
              throw new Exception($statement->error);
          }

          $statement->close();
        }


        public function denieById($frageid) {


          $query = "DELETE FROM $this->tableName WHERE id = ?";

          $statement = ConnectionHandler::getConnection()->prepare($query);
          $statement->bind_param('i', $frageid);

          if (!$statement->execute()) {
              throw new Exception($statement->error);
          }

          $statement->close();

        }




}

<?php

require_once '../lib/Repository.php';
require_once '../lib/ConnectionHandler.php';


class GeantwortetRepository extends repository{

    protected $tableName = 'geantwortet';



    public function getAntworten() {

      $query = "SELECT g.id, person_id, antwort_id, zeit, a.antwort, a.is_korrekt, f.id, f.moralfrage, f.text FROM $this->tableName g JOIN antwort a on g.antwort_id = a.id JOIN frage f on f.id = a.frage_id WHERE person_id = ? ORDER BY zeit DESC LIMIT 10";

      $statement = ConnectionHandler::getConnection ()->prepare($query);
      $statement->bind_param ('i', $_SESSION['user']['id']);


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


    public function getKorrekteAntworten() {
      $query = "SELECT antwort from frage f join antwort a on f.id = a.frage_id where is_korrekt = 1";

      $statement = ConnectionHandler::getConnection ()->prepare($query);


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


    public function insert($person_id, $antwort_id)
    {

      date_default_timezone_set('Europe/Zurich');
      $zeit = date('Y-m-d H:i:s');



      $query = "INSERT INTO $this->tableName (person_id, antwort_id, zeit) VALUES (?, ?, ?)";

      $statement = ConnectionHandler::getConnection ()->prepare ($query);
      $statement->bind_param ( 'iis', $person_id, $antwort_id, $zeit);

      if (! $statement->execute ()) {
        throw new Exception ( $statement->error );
      }
      $frageId = $statement->insert_id;

      $statement->close ();
    }
}

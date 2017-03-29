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

    public function getStatistikByUserAntw1() {

      $query = "SELECT count(antwort), antwort from geantwortet g join antwort a on a.id = g.antwort_id where antwort_id = (frage_id * 2 - 1);";

      $statement = ConnectionHandler::getConnection ()->prepare($query);
      $statement->bind_param ( 'i', $person_id );

      if (!$statement->execute()) {
          throw new Exception($statement->error);
      }

      $result = $statement->get_result();

      if (!$result) {
          throw new Exception($statement->error);
      }

      $row = $result->fetch_object();

      return $row;
    }

    public function getStatistikByUserAntw2() {

      $query = "SELECT count(antwort), antwort from geantwortet g join antwort a on a.id = g.antwort_id where antwort_id = (frage_id * 2);";

      $statement = ConnectionHandler::getConnection ()->prepare($query);
      $statement->bind_param ( 'i', $person_id );

      if (!$statement->execute()) {
          throw new Exception($statement->error);
      }

      $result = $statement->get_result();

      if (!$result) {
          throw new Exception($statement->error);
      }

      $row = $result->fetch_object();

      return $row;
    }


    public function getStatistikByFrage() {

      $query = "SELECT f.id AS frage_id, a.id AS antwort_id, a.antwort AS antwort, count(g.antwort_id) AS count from frage AS f JOIN antwort AS a ON f.id=a.frage_id LEFT JOIN geantwortet AS g ON a.id=g.antwort_id GROUP BY g.antwort_id";

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




}

<?php

require_once '../lib/Repository.php';
require_once '../lib/ConnectionHandler.php';


class GeantwortetRepository extends repository{

    protected $tableName = 'geantwortet';



    public function getAntworten() {

      $query = "SELECT * FROM $this->tableName g  JOIN antwort a on g.antwort_id = a.id WHERE person_id = (select benutzername FROM benutzer where id = ?) ORDER BY zeit DESC";

      $statement = ConnectionHandler::getConnection ()->prepare( $query );
      $statement->bind_param ('i', $SESSION['id']);

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

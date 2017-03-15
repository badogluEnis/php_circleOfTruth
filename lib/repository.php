<?php

class repository {

  protected $tableName = null;


  public function readById($id)
  {

      $query = "SELECT * FROM {$this->tableName} WHERE id=?";


      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('i', $id);

      $statement->execute();

  }

  public function readAll($max = 100)
    {
        $query = "SELECT * FROM {$this->tableName} LIMIT 0, $max";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }

        return $rows;
    }


  public function deleteById($id)
    {
        $query = "DELETE FROM {$this->tableName} WHERE id=?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $id);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }


}


?>

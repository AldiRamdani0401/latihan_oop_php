<?php

require_once 'Database.php';

class Schema extends Database {
  protected static $table;

  public function __construct($table) {
    return self::setTable($table);
  }

  public static function setTable(String $table) {
    self::$table = $table;
  }

  // Create New Table
  public static function createTable(String $tableName, Array $columns) : bool {

    $query = "CREATE TABLE $tableName (";
    $primaryKey = null;

    foreach ($columns as $columnName => $columnDefinition) {
        $query .= "$columnName $columnDefinition, ";
        if (strpos($columnDefinition, 'PRIMARY KEY') !== false) {
            $primaryKey = $columnName;
        }
    }
    date_default_timezone_set('Asia/Jakarta');
    $query .= "created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP";
    $query = rtrim($query, ", ");
    $query .= ")";
    $result = mysqli_query(parent::getConnection(), $query);

    if (!$result) {
        die("Error creating table: " . mysqli_error(parent::getConnection()));
    }

    parent::closeConnection();
    return $result;
  }

  // Rename Selected Table
  public static function renameTable($newTableName) : bool {
    $query = "ALTER TABLE " . self::$table . " RENAME TO $newTableName";
    echo $query;
    $result = mysqli_query(parent::getConnection(), $query);

    parent::closeConnection();
    return $result;
  }

  // Drop Selected Table
  public static function dropTable() : bool {
    $query = "DROP TABLE " . self::$table;
    $result = mysqli_query(parent::getConnection(), $query);
    return $result;
    parent::closeConnection();
  }

  // Truncate Table
  public static function clearTable() : bool {
    $query = "TRUNCATE " . self::$table;
    $result = mysqli_query(parent::getConnection(), $query);
    return $result;
  }

  // Add Column To Selected Table
  public static function addColumnTable (String $columnName, String $type, Int $length) : bool {
    $query = "ALTER TABLE " . self::$table . " ADD $columnName $type($length)";
    $result = mysqli_query(parent::getConnection(), $query);
    parent::closeConnection();

    return $result;
  }

  // Rename Column from Selected Table
  public static function renameColumnTable (String $column, String $newColumn, $columnDefinition) : bool {
    $query = "ALTER TABLE " . self::$table . " CHANGE COLUMN $column $newColumn $columnDefinition";
    $result = mysqli_query(parent::getConnection(), $query);
    parent::closeConnection();

    return $result;
  }

  // Change Type Data Column from Selected Table
  public static function changeColumnDataType($column, $dataType) : bool {
    $query = "ALTER TABLE " . self::$table . " MODIFY $column $dataType ";
    $result = mysqli_query(parent::getConnection(), $query);
    parent::closeConnection();

    return $result;
  }

  // Drop Column from Selected Table
  public static function dropColumnTable (String $columnName) : bool {
    $query = "ALTER TABLE " . self::$table . " DROP $columnName";
    $result = mysqli_query(parent::getConnection(), $query);
    parent::closeConnection();

    return $result;
  }
}
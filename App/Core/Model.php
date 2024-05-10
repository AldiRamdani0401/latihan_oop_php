<?php

require 'Schema.php';

class Model extends Schema {

  // Insert One Record
  // public static function insert(Array $datas) {
  //   $columns = implode(',', array_keys($datas));
  //   $values = "'" . implode("','", array_values($datas)) . "'";
  //   // Check Existing Record
  //   $checkQuery = "SELECT * FROM " . self::$table . " WHERE " ;
  //   $columnAndValueArray = array_map(function($column) use ($datas) {
  //     return "$column = " .  "'" . $datas[$column] . "'";
  //   }, array_keys($datas));
  //   $checkQuery .= implode (' AND ', $columnAndValueArray);
  //   $checkResult = mysqli_query(parent::getConnection(), $checkQuery);
  //   if (mysqli_num_rows($checkResult) > 0) {
  //     echo 'Data sudah ada!';
  //   } else {
  //     // Create New Record
  //     $query = "INSERT INTO " . self::$table . " ($columns) VALUES ($values)";
  //     $result = mysqli_query(parent::getConnection(), $query);

  //     if ($result) {
  //       echo 'New Data Created..';
  //     } else {
  //       die ('Create Data Failed!');
  //     }
  //   }

  //   parent::closeConnection();
  // }

  public static function insert(Array $datas) {
    $columns = implode(',', array_keys($datas));
    $values = "'" . implode("','", array_values($datas)) . "'";
      // Create New Record
      $query = "INSERT INTO " . self::$table . " ($columns) VALUES ($values)";
      $result = mysqli_query(parent::getConnection(), $query);
      if ($result) {
        echo 'New Data Created..';
      } else {
        die ('Create Data Failed!');
      }
      parent::closeConnection();
      return $result;
  }

  // Insert Many Record
  public static function insertMany(Array $datas) : bool {
    $keys = array_keys($datas[0]);
    $columnString = implode(', ', $keys);

    $convertedValue = array_map(function($data) {
        $valueToString = array_map(function($value) {
            return "'" . $value . "'";
        }, array_values($data));
        return '(' . implode(', ', $valueToString) . ')';
    }, $datas);

      $mergedValue = implode(', ', $convertedValue);
      $query = "INSERT INTO " . self::$table . " ($columnString) VALUES $mergedValue";

      $result = mysqli_query(parent::getConnection(), $query);

      if ($result) {
          echo " Many records created successfully : " . self::$table;
        } else {
          echo "Create Data Failed!: " . mysqli_error(parent::getConnection());
        }

        parent::closeConnection();
        return $result;
  }

  // Get All Data
  public static function all() : Array {
    $query = "SELECT * FROM " . self::$table;
    $result = mysqli_query(parent::getConnection(), $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
      var_dump($rows);
    }
    return $rows;
    parent::closeConnection();
  }

  // Filter Data By Column And Limit
  public static function filterAndLimit(String $column, $param, Int $limit = 0): array {
    $query = "SELECT * FROM " . self::$table . " WHERE $column LIKE '%$param%'";
    if ($limit > 0) {
        $query .= " LIMIT $limit";
    }
    $result = mysqli_query(parent::getConnection(), $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    parent::closeConnection();
    return $rows;
}

  // Filter Data By Latest Data
  public static function filterLatest(Int $limit = 0) : Array {
    if (is_integer($limit)) {
      if ($limit == 0) {
        $query = "SELECT * FROM " . self::$table . " ORDER BY created_at DESC";
        echo $query;
        } else {
        $query = "SELECT * FROM " . self::$table . " ORDER BY created_at DESC LIMIT $limit";
        }
        $result = mysqli_query(parent::getConnection(), $query);
        while ($row = mysqli_fetch_assoc($result)) {
          return $rows[] = $row;
        }
    } else {
      throw new Exception("Arguments must be Integer");
    }
    parent::closeConnection();
  }

  // Filter Data By Oldest Data
  public static function filterOldest($limit = 0) : Array {
    if (is_integer($limit)) {
      if ($limit == 0) {
        $query = "SELECT * FROM " . self::$table . " ORDER BY created_at ASC ";
      } else {
        $query = "SELECT * FROM " . self::$table . " ORDER BY created_at ASC LIMIT $limit ";
      }
      $result = mysqli_query(parent::getConnection(), $query);
      $rows = [];
      if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
          return $rows = $row;
        }
      }
    } else {
      throw new Exception("Arguments must be Integer");
    }
    parent::closeConnection();
  }

  // Find Data
  public static function find(String $column, $data) : Array {
    $query = "SELECT * FROM " . self::$table . " WHERE $column = '$data'";
    $result = mysqli_query(parent::getConnection(), $query);
    $rows = [];
    if (!$result || mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        parent::closeConnection();
        return $rows = $row;
      }
    } else {
      echo 'Data tidak ditemukan';
      return $rows;
    }
  }

  // Update Data
  public static function update(String $columnName, String $param, Array $newData) : bool {
    $query = "UPDATE " . self::$table . " SET ";
    $columns = array_keys($newData);
    $values = array_values($newData);
    $concatColumnAndValues = [];
    foreach ($columns as $key => $column) {
      $concatColumnAndValues[] = $column . " = " . "'" . $values[$key] . "'";
      $formated = implode(', ', $concatColumnAndValues);
      $formated .= ", updated_at = NOW()";
    }

    $query = rtrim($query, ',');
    $query .= $formated . " WHERE $columnName = '$param' ";

    $result = mysqli_query(parent::getConnection(), $query);

    parent::closeConnection();
    return $result;
  }

  // Delete Record
  public function delete(Int $id) : bool {
    $query = "DELETE FROM " . self::$table . " WHERE id = $id";
    $result = mysqli_query(parent::getConnection(), $query);

    parent::closeConnection();
    return $result;
  }
}
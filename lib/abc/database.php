<?php

/**
  * @author  Roderic Linguri <rod@linguri.com>
  * @package PaQuRe
  * REQUIRED PROPERTIES IN EXTENDING CLASSES
  * protected static $dbs (database singleton)
  * protected $pdo (pdo object)
  */

abstract class LTDatabase
{

    /**
     * Execute SQL without a result set
     * @param  array
     * @return int
     */
    public function executeSQL()
    {
        $args = func_get_args();
        $stmt = $this->pdo->prepare(array_shift($args));
        $stmt->execute($args);
        return $stmt->rowCount();
    } // ./executeSQL()

    /**
     * Query for a single record
     * @param  array
     * @return assoc
     */
    public function fetchRecord()
    {
        $args = func_get_args();
        $stmt = $this->pdo->prepare(array_shift($args));
        $stmt->execute($args);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } // ./fetchRecord()

    /**
     * Query for multiple records
     * @param  array (sql plus parameters)
     * @return array of assoc
     */
    public function fetchRecords()
    {
        $args = func_get_args();
        $stmt = $this->pdo->prepare(array_shift($args));
        $stmt->execute($args);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } // ./fetchRecords()

} // ./LTDatabase

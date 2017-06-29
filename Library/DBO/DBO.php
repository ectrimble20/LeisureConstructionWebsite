<?php

namespace Leisure\Library\DBO;

use Leisure\Library\Common\Settings;
use Leisure\Library\Exception\ServerErrorException;
use Leisure\Library\Log\Log;

class DBO {

    /**
     * @var \PDO
     */
    private $pdo;

    /**
     * @var DBO
     */
    private static $instance;

    /**
     * @return DBO
     */
    public static function Get()
    {
        if( ! self::$instance instanceof DBO )
        {
            self::$instance = new DBO();
        }
        return self::$instance;
    }

    /**
     * DBO constructor.
     * @throws ServerErrorException
     */
    public function __construct()
    {
        try {
            $dsn = "mysql:host=". Settings::DATABASE_HOST .";dbname=". Settings::DATABASE_NAME .";port=". Settings::DATABASE_PORT;
            $this->pdo = new \PDO($dsn, Settings::DATABASE_USER, Settings::DATABASE_PASS);
            $this->pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            $this->pdo->setAttribute(\PDO::ATTR_CASE, \PDO::CASE_NATURAL);
            $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(\PDOException $e)
        {
            Log::Get()->logException($e);
            throw new ServerErrorException("Server Error Occurred");
        }
    }

    /**
     * @param string $sql
     * @param array $params
     * @return \PDOStatement
     * @throws ServerErrorException
     */
    private function PrepareAndExecute($sql, $params)
    {
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($params);
            return $statement;
        } catch(\PDOException $e){
            Log::Get()->logException($e);
            throw new ServerErrorException("Server Error Occurred");
        }
    }

    /**
     * @param $sql
     * @return bool
     * @throws ServerErrorException
     */
    public function ExecuteAndClose($sql)
    {
        $statement = $this->PrepareAndExecute($sql, array());
        $statement->closeCursor();
        return true;
    }

    /**
     * @param $sql
     * @param $params
     * @return array
     * @throws ServerErrorException
     */
    public function Select($sql, $params)
    {
        $results = array();
        $statement = $this->PrepareAndExecute($sql, $params);
        while($row = $statement->fetch(\PDO::FETCH_ASSOC))
        {
            $results[] = $row;
        }
        $statement->closeCursor();
        return $results;
    }

    /**
     * @param $sql
     * @param $params
     * @return string
     * @throws ServerErrorException
     */
    public function Insert($sql, $params)
    {
        $statement = $this->PrepareAndExecute($sql, $params);
        $id = $this->pdo->lastInsertId();
        $statement->closeCursor();
        return $id;
    }

    /**
     * @param $sql
     * @param $params
     * @return int
     * @throws ServerErrorException
     */
    public function Update($sql, $params)
    {
        $statement = $this->PrepareAndExecute($sql, $params);
        $rowCount = $statement->rowCount();
        $statement->closeCursor();
        return $rowCount;
    }

    /**
     * @param string $sql
     * @param array $params
     * @return array
     */
    public function SelectSingleRow($sql, $params)
    {
        $statement = $this->PrepareAndExecute($sql, $params);
        $row = $statement->fetch(\PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $row;
    }

    /**
     * @param $sql
     * @param $params
     * @return string|null
     * @throws ServerErrorException
     */
    public function SelectSingleField($sql, $params)
    {
        $statement = $this->PrepareAndExecute($sql, $params);
        $row = $statement->fetch(\PDO::FETCH_NUM);
        $statement->closeCursor();
        //in case we get an empty result back
        if( ! isset($row[0])){
            return null;
        }
        return $row[0];
    }

    /**
     *
     */
    public function StartTransaction()
    {
        if( ! $this->pdo->inTransaction())
        {
            $this->pdo->beginTransaction();
        }
    }

    /**
     *
     */
    public function CommitTransaction()
    {
        if( $this->pdo->inTransaction())
        {
            $this->pdo->commit();
        }
    }

    /**
     *
     */
    public function RollbackTransaction()
    {
        if( $this->pdo->inTransaction())
        {
            $this->pdo->rollBack();
        }
    }

}
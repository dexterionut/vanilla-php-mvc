<?php

namespace App\Core\Database;


use App\Core\Contracts\IQueryBuilder;
use \PDO;

class QueryBuilder implements IQueryBuilder
{
    /**
     * @var PDO
     */
    protected $db;

    /**
     * @var array
     */
    private $selectArray;

    /**
     * @var string
     */
    private $from;
    /**
     * @var array
     */
    private $joinArray;
    /**
     * @var array
     */
    private $whereArray;
    /**
     * @var array
     */
    private $groupByArray;
    /**
     * @var array
     */
    private $havingArray;
    /**
     * @var array
     */
    private $orderByArray;

    public function __construct(PDO $db)
    {
        $this->db = $db;

        $this->selectArray = ['*'];
        $this->from = '';
        $this->joinArray = [];
        $this->whereArray = ['1'];
        $this->groupByArray = [];
        $this->havingArray = [];
        $this->orderByArray = [];

    }

    public function selectAll(string $table, string $fetchClass = null)
    {
        $query = $this->db->prepare("SELECT * FROM {$table};");
        $query->execute();

        if ($fetchClass) {
            return $query->fetchAll(PDO::FETCH_CLASS, $fetchClass);
        }
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function insert(string $table, array $parameters)
    {
        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
        $query = $this->db->prepare($sql);
        $query->execute($parameters);
    }
}
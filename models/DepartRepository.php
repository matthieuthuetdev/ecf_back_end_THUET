<?php
class DepartRepository
{
    private PDO $connection;
    public function __construct()
    {
        $this->connection = Database::getInstance();
    }
    public function searchAll()
    {
        $request = "SELECT * FROM departements";
        $rq = $this->connection->prepare($request);
        $rq->execute();
        $result = $rq->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
}

<?php

class Shipment
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM shipments");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM shipments WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
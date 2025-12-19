<?php
namespace Dao;

class Table
{
    protected static function obtenerRegistros(string $sqlstr, array $params = [])
    {
        $pdo = Dao::getPDO();
        $stmt = $pdo->prepare($sqlstr);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    protected static function obtenerUnRegistro(string $sqlstr, array $params = [])
    {
        $pdo = Dao::getPDO();
        $stmt = $pdo->prepare($sqlstr);
        $stmt->execute($params);
        return $stmt->fetch();
    }

    protected static function executeNonQuery(string $sqlstr, array $params = [])
    {
        $pdo = Dao::getPDO();
        $stmt = $pdo->prepare($sqlstr);
        $stmt->execute($params);
        return $stmt->rowCount();
    }
}
<?php
namespace Dao\Cursos;

use Dao\Table;

class Cursos extends Table
{
    public static function getCursos(
        string $partialName = "",
        string $estado = "",
        string $orderBy = "",
        bool $orderDescending = false,
        int $page = 0,
        int $itemsPerPage = 10
    ) {
        $sqlstr = "SELECT c.curso_id, c.nombre, c.descripcion, c.creditos, c.estado FROM cursos c";
        $sqlstrCount = "SELECT COUNT(*) as count FROM cursos c";
        
        $conditions = [];
        $params = [];
        
        if ($partialName != "") {
            $conditions[] = "c.nombre LIKE :partialName";
            $params["partialName"] = "%" . $partialName . "%";
        }
        
        if ($estado != "") {
            $conditions[] = "c.estado = :estado";
            $params["estado"] = $estado;
        }
        
        if (count($conditions) > 0) {
            $sqlstr .= " WHERE " . implode(" AND ", $conditions);
            $sqlstrCount .= " WHERE " . implode(" AND ", $conditions);
        }
        
        if (!in_array($orderBy, ["curso_id", "nombre", "creditos", ""])) {
            $orderBy = "";
        }
        
        if ($orderBy != "") {
            $sqlstr .= " ORDER BY " . $orderBy;
            if ($orderDescending) {
                $sqlstr .= " DESC";
            }
        }
        
        $numeroDeRegistros = self::obtenerUnRegistro($sqlstrCount, $params)["count"];
        $pagesCount = $numeroDeRegistros > 0 ? ceil($numeroDeRegistros / $itemsPerPage) : 1;
        
        if ($page > $pagesCount - 1) {
            $page = $pagesCount - 1;
        }
        if ($page < 0) {
            $page = 0;
        }
        
        $sqlstr .= " LIMIT " . ($page * $itemsPerPage) . ", " . $itemsPerPage;
        
        $registros = self::obtenerRegistros($sqlstr, $params);
        
        return [
            "cursos" => $registros,
            "total" => $numeroDeRegistros,
            "page" => $page,
            "itemsPerPage" => $itemsPerPage
        ];
    }

    public static function getCursoById(int $curso_id)
    {
        $sqlstr = "SELECT * FROM cursos WHERE curso_id = :curso_id";
        return self::obtenerUnRegistro($sqlstr, ["curso_id" => $curso_id]);
    }

    public static function insertCurso(string $nombre, string $descripcion, int $creditos, string $estado)
    {
        $sqlstr = "INSERT INTO cursos (nombre, descripcion, creditos, estado) VALUES (:nombre, :descripcion, :creditos, :estado)";
        return self::executeNonQuery($sqlstr, [
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "creditos" => $creditos,
            "estado" => $estado
        ]);
    }

    public static function updateCurso(int $curso_id, string $nombre, string $descripcion, int $creditos, string $estado)
    {
        $sqlstr = "UPDATE cursos SET nombre = :nombre, descripcion = :descripcion, creditos = :creditos, estado = :estado WHERE curso_id = :curso_id";
        return self::executeNonQuery($sqlstr, [
            "curso_id" => $curso_id,
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "creditos" => $creditos,
            "estado" => $estado
        ]);
    }

    public static function deleteCurso(int $curso_id)
    {
        $sqlstr = "DELETE FROM cursos WHERE curso_id = :curso_id";
        return self::executeNonQuery($sqlstr, ["curso_id" => $curso_id]);
    }
}
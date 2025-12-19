<?php
namespace Controllers\Cursos;

use Controllers\PublicController;
use Dao\Cursos\Cursos as DaoCursos;

class Curso extends PublicController
{
    private $mode = "DSP";
    private $curso_id = 0;
    private $nombre = "";
    private $descripcion = "";
    private $creditos = 0;
    private $estado = "Activo";
    private $errors = [];
    private $viewData = [];

    public function run(): void
    {
        $this->mode = isset($_GET["mode"]) ? $_GET["mode"] : "DSP";
        $this->curso_id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;
        
        if ($this->mode !== "INS" && $this->curso_id <= 0) {
            header("Location: index.php?page=Cursos_Cursos");
            exit();
        }
        
        if ($this->mode !== "INS") {
            $this->loadCurso();
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handlePost();
        }
        
        $this->prepareView();
        $this->render();
    }
    
    private function loadCurso()
    {
        $curso = DaoCursos::getCursoById($this->curso_id);
        if ($curso) {
            $this->nombre = $curso["nombre"];
            $this->descripcion = $curso["descripcion"];
            $this->creditos = $curso["creditos"];
            $this->estado = $curso["estado"];
        }
    }
    
    private function handlePost()
    {
        $this->nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
        $this->descripcion = isset($_POST["descripcion"]) ? trim($_POST["descripcion"]) : "";
        $this->creditos = isset($_POST["creditos"]) ? intval($_POST["creditos"]) : 0;
        $this->estado = isset($_POST["estado"]) ? $_POST["estado"] : "Activo";
        
        if (!$this->validate()) {
            return;
        }
        
        switch ($this->mode) {
            case "INS":
                if (DaoCursos::insertCurso($this->nombre, $this->descripcion, $this->creditos, $this->estado)) {
                    header("Location: index.php?page=Cursos_Cursos");
                    exit();
                }
                break;
            case "UPD":
                if (DaoCursos::updateCurso($this->curso_id, $this->nombre, $this->descripcion, $this->creditos, $this->estado)) {
                    header("Location: index.php?page=Cursos_Cursos");
                    exit();
                }
                break;
            case "DEL":
                if (DaoCursos::deleteCurso($this->curso_id)) {
                    header("Location: index.php?page=Cursos_Cursos");
                    exit();
                }
                break;
        }
    }
    
    private function validate()
    {
        if (empty($this->nombre)) {
            $this->errors["nombre"] = "El nombre es requerido";
        }
        if ($this->creditos <= 0) {
            $this->errors["creditos"] = "Los créditos deben ser mayores a 0";
        }
        return count($this->errors) === 0;
    }
    
    private function prepareView()
    {
        $this->viewData["mode"] = $this->mode;
        $this->viewData["curso_id"] = $this->curso_id;
        $this->viewData["nombre"] = $this->nombre;
        $this->viewData["descripcion"] = $this->descripcion;
        $this->viewData["creditos"] = $this->creditos;
        $this->viewData["estado"] = $this->estado;
        $this->viewData["errors"] = $this->errors;
        $this->viewData["readonly"] = ($this->mode === "DSP" || $this->mode === "DEL") ? "readonly" : "";
    }
    
    private function render(): void
    {
        extract($this->viewData);
        include "src/Views/templates/Cursos/curso.view.php";
    }
}
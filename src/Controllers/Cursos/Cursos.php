<?php
namespace Controllers\Cursos;

use Controllers\PublicController;
use Dao\Cursos\Cursos as DaoCursos;

class Cursos extends PublicController
{
    private $partialName = "";
    private $estado = "";
    private $orderBy = "";
    private $orderDescending = false;
    private $pageNumber = 1;
    private $itemsPerPage = 10;
    private $viewData = [];

    public function run(): void
    {
        $this->getParams();
        
        $tmpCursos = DaoCursos::getCursos(
            $this->partialName,
            $this->estado,
            $this->orderBy,
            $this->orderDescending,
            $this->pageNumber - 1,
            $this->itemsPerPage
        );
        
        $this->viewData["cursos"] = $tmpCursos["cursos"];
        $this->viewData["total"] = $tmpCursos["total"];
        $this->viewData["partialName"] = $this->partialName;
        $this->viewData["estado"] = $this->estado;
        
        // Renderizar vista
        $this->render();
    }
    
    private function getParams(): void
    {
        $this->partialName = isset($_GET["partialName"]) ? $_GET["partialName"] : "";
        $this->estado = isset($_GET["estado"]) ? $_GET["estado"] : "";
        $this->orderBy = isset($_GET["orderBy"]) ? $_GET["orderBy"] : "";
        $this->orderDescending = isset($_GET["orderDescending"]) ? boolval($_GET["orderDescending"]) : false;
        $this->pageNumber = isset($_GET["pageNum"]) ? intval($_GET["pageNum"]) : 1;
    }
    
    private function render(): void
    {
        // Cargar vista
        extract($this->viewData);
        include "src/Views/templates/Cursos/cursos.view.php";
    }
}
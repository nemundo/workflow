<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Document;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class DocumentTable extends BootstrapModelTable {
/**
* @var DocumentModel
*/
public $model;

protected function loadCom() {
$this->model = new DocumentModel();
}
}
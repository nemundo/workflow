<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TemplateFile;
class TemplateFilePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var TemplateFileModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new TemplateFileModel();
}
}
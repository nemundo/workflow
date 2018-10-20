<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\FileContentTemplate;
class FileContentTemplatePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var FileContentTemplateModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new FileContentTemplateModel();
}
}
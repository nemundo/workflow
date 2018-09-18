<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TemplateFile;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class TemplateFileTable extends BootstrapModelTable {
/**
* @var TemplateFileModel
*/
public $model;

protected function loadCom() {
$this->model = new TemplateFileModel();
}
}
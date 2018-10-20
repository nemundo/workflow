<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\FileContentTemplate;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class FileContentTemplateTable extends BootstrapModelTable {
/**
* @var FileContentTemplateModel
*/
public $model;

protected function loadCom() {
$this->model = new FileContentTemplateModel();
}
}
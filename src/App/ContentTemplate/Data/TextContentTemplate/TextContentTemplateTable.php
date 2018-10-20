<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TextContentTemplate;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class TextContentTemplateTable extends BootstrapModelTable {
/**
* @var TextContentTemplateModel
*/
public $model;

protected function loadCom() {
$this->model = new TextContentTemplateModel();
}
}
<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\LargeTextContentTemplate;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class LargeTextContentTemplateTable extends BootstrapModelTable {
/**
* @var LargeTextContentTemplateModel
*/
public $model;

protected function loadCom() {
$this->model = new LargeTextContentTemplateModel();
}
}
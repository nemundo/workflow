<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentText;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class ContentTextTable extends BootstrapModelTable {
/**
* @var ContentTextModel
*/
public $model;

protected function loadCom() {
$this->model = new ContentTextModel();
}
}
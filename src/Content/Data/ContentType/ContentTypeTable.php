<?php
namespace Nemundo\Workflow\Content\Data\ContentType;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class ContentTypeTable extends BootstrapModelTable {
/**
* @var ContentTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new ContentTypeModel();
}
}
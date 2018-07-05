<?php
namespace Nemundo\App\Content\Data\ContentType;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class ContentTypeTable extends BootstrapModelTable {
/**
* @var ContentTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new ContentTypeModel();
}
}
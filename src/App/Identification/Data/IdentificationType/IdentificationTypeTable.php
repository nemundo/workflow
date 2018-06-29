<?php
namespace Nemundo\Workflow\App\Identification\Data\IdentificationType;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class IdentificationTypeTable extends BootstrapModelTable {
/**
* @var IdentificationTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new IdentificationTypeModel();
}
}
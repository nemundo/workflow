<?php
namespace Nemundo\Workflow\App\Identification\Data\IdentificationType;
use Nemundo\Model\View\ModelView;
class IdentificationTypeView extends ModelView {
/**
* @var IdentificationTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new IdentificationTypeModel();
}
}
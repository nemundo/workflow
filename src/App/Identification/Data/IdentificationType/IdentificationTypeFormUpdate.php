<?php
namespace Nemundo\Workflow\App\Identification\Data\IdentificationType;
use Nemundo\Model\Form\ModelFormUpdate;
class IdentificationTypeFormUpdate extends ModelFormUpdate {
/**
* @var IdentificationTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new IdentificationTypeModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}
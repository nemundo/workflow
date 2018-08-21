<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey1;
use Nemundo\Model\Form\ModelFormUpdate;
class Survey1FormUpdate extends ModelFormUpdate {
/**
* @var Survey1Model
*/
public $model;

protected function loadCom() {
$this->model = new Survey1Model();
}
}
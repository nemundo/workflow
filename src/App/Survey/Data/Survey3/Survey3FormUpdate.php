<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey3;
use Nemundo\Model\Form\ModelFormUpdate;
class Survey3FormUpdate extends ModelFormUpdate {
/**
* @var Survey3Model
*/
public $model;

protected function loadCom() {
$this->model = new Survey3Model();
}
}
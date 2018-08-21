<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey2;
use Nemundo\Model\Form\ModelFormUpdate;
class Survey2FormUpdate extends ModelFormUpdate {
/**
* @var Survey2Model
*/
public $model;

protected function loadCom() {
$this->model = new Survey2Model();
}
}
<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey2;
use Nemundo\Model\View\ModelView;
class Survey2View extends ModelView {
/**
* @var Survey2Model
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new Survey2Model();
}
}
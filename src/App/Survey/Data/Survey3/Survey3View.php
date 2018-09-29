<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey3;
use Nemundo\Model\View\ModelView;
class Survey3View extends ModelView {
/**
* @var Survey3Model
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new Survey3Model();
}
}
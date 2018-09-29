<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey1;
use Nemundo\Model\View\ModelView;
class Survey1View extends ModelView {
/**
* @var Survey1Model
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new Survey1Model();
}
}
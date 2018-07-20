<?php
namespace Nemundo\Workflow\App\Workflow\Data\StatusChange;
use Nemundo\Model\View\ModelView;
class StatusChangeView extends ModelView {
/**
* @var StatusChangeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new StatusChangeModel();
}
}
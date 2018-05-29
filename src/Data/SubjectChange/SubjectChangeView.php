<?php
namespace Nemundo\Workflow\Data\SubjectChange;
use Nemundo\Model\View\ModelView;
class SubjectChangeView extends ModelView {
/**
* @var SubjectChangeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new SubjectChangeModel();
}
}
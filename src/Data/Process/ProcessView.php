<?php
namespace Nemundo\Workflow\Data\Process;
use Nemundo\Model\View\ModelView;
class ProcessView extends ModelView {
/**
* @var ProcessModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new ProcessModel();
}
}
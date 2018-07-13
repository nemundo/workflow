<?php
namespace Nemundo\Workflow\App\Survey\Data\UmfrageStart;
use Nemundo\Model\View\ModelView;
class UmfrageStartView extends ModelView {
/**
* @var UmfrageStartModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new UmfrageStartModel();
}
}
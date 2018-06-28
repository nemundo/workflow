<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamType;
use Nemundo\Model\View\ModelView;
class StreamTypeView extends ModelView {
/**
* @var StreamTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new StreamTypeModel();
}
}
<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroup;
use Nemundo\Model\View\ModelView;
class StreamGroupView extends ModelView {
/**
* @var StreamGroupModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new StreamGroupModel();
}
}
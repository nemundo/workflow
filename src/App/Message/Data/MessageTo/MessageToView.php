<?php
namespace Nemundo\Workflow\App\Message\Data\MessageTo;
use Nemundo\Model\View\ModelView;
class MessageToView extends ModelView {
/**
* @var MessageToModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new MessageToModel();
}
}
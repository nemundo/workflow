<?php
namespace Nemundo\Workflow\App\Message\Data\MessageType;
use Nemundo\Model\View\ModelView;
class MessageTypeView extends ModelView {
/**
* @var MessageTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new MessageTypeModel();
}
}
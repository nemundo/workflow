<?php
namespace Nemundo\Workflow\App\Message\Data\Message;
use Nemundo\Model\View\ModelView;
class MessageView extends ModelView {
/**
* @var MessageModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new MessageModel();
}
}
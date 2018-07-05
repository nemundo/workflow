<?php
namespace Nemundo\Workflow\App\Message\Data\MessageItem;
use Nemundo\Model\View\ModelView;
class MessageItemView extends ModelView {
/**
* @var MessageItemModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new MessageItemModel();
}
}
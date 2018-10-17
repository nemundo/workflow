<?php
namespace Nemundo\Workflow\App\Inbox\Data\Inbox;
use Nemundo\Model\View\ModelView;
class InboxView extends ModelView {
/**
* @var InboxModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new InboxModel();
}
}
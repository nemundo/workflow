<?php
namespace Nemundo\Workflow\App\Message\Data\MessageText;
use Nemundo\Model\View\ModelView;
class MessageTextView extends ModelView {
/**
* @var MessageTextModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new MessageTextModel();
}
}
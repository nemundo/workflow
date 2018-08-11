<?php
namespace Nemundo\Workflow\App\Message\Data\MessageDocument;
use Nemundo\Model\View\ModelView;
class MessageDocumentView extends ModelView {
/**
* @var MessageDocumentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new MessageDocumentModel();
}
}
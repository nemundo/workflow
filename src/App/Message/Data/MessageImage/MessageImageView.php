<?php
namespace Nemundo\Workflow\App\Message\Data\MessageImage;
use Nemundo\Model\View\ModelView;
class MessageImageView extends ModelView {
/**
* @var MessageImageModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new MessageImageModel();
}
}
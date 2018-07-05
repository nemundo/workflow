<?php
namespace Nemundo\Workflow\App\Message\Data\MessageImage;
class MessageImagePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var MessageImageModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new MessageImageModel();
}
}
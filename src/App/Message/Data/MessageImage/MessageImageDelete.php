<?php
namespace Nemundo\Workflow\App\Message\Data\MessageImage;
class MessageImageDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var MessageImageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MessageImageModel();
}
}
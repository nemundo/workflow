<?php
namespace Nemundo\Workflow\App\Message\Data\MessageImage;
class MessageImageValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var MessageImageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MessageImageModel();
}
}
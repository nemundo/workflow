<?php
namespace Nemundo\Workflow\App\Message\Data\MessageDocument;
class MessageDocumentValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var MessageDocumentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MessageDocumentModel();
}
}
<?php
namespace Nemundo\Workflow\App\Message\Data\MessageDocument;
class MessageDocument extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var MessageDocumentModel
*/
protected $model;

/**
* @var \Nemundo\Model\Data\Property\File\FileDataProperty
*/
public $document;

public function __construct() {
parent::__construct();
$this->model = new MessageDocumentModel();
$this->document = new \Nemundo\Model\Data\Property\File\FileDataProperty($this->model->document, $this->typeValueList);
}
public function save() {
$id = parent::save();
return $id;
}
}
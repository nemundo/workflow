<?php
namespace Nemundo\Workflow\App\Stream\Data\Stream;
class Stream extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var StreamModel
*/
protected $model;

/**
* @var string
*/
public $contentTypeId;

/**
* @var string
*/
public $dataId;

public function __construct() {
parent::__construct();
$this->model = new StreamModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$id = parent::save();
return $id;
}
}
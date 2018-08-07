<?php
namespace Nemundo\Workflow\Content\Data\ContentType;
use Nemundo\Model\Data\AbstractModelUpdate;
class ContentTypeUpdate extends AbstractModelUpdate {
/**
* @var ContentTypeModel
*/
public $model;

/**
* @var string
*/
public $contentType;

/**
* @var string
*/
public $contentTypeClass;

public function __construct() {
parent::__construct();
$this->model = new ContentTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->contentType, $this->contentType);
$this->typeValueList->setModelValue($this->model->contentTypeClass, $this->contentTypeClass);
parent::update();
}
}
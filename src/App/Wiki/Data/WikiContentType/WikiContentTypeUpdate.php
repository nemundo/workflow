<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContentType;
use Nemundo\Model\Data\AbstractModelUpdate;
class WikiContentTypeUpdate extends AbstractModelUpdate {
/**
* @var WikiContentTypeModel
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
$this->model = new WikiContentTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->contentType, $this->contentType);
$this->typeValueList->setModelValue($this->model->contentTypeClass, $this->contentTypeClass);
parent::update();
}
}
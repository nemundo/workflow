<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContentType;
class WikiContentType extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var WikiContentTypeModel
*/
protected $model;

/**
* @var string
*/
public $id;

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
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->contentType, $this->contentType);
$this->typeValueList->setModelValue($this->model->contentTypeClass, $this->contentTypeClass);
$id = parent::save();
return $id;
}
}
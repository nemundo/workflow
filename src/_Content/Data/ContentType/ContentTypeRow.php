<?php
namespace Nemundo\App\Content\Data\ContentType;
class ContentTypeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->contentType = $this->getModelValue($model->contentType);
$this->contentTypeClass = $this->getModelValue($model->contentTypeClass);
}
/**
* @return \Nemundo\App\Content\Type\AbstractContentType
*/
public function getContentTypeClassObject() {
$object = (new \Nemundo\Core\System\ObjectBuilder)->getObject($this->contentTypeClass);
return $object;
}
}
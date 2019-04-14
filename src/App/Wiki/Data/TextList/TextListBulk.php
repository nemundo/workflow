<?php
namespace Nemundo\Workflow\App\Wiki\Data\TextList;
class TextListBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var TextListModel
*/
protected $model;

/**
* @var string
*/
public $dataId;

/**
* @var string
*/
public $text;

public function __construct() {
parent::__construct();
$this->model = new TextListModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$this->typeValueList->setModelValue($this->model->text, $this->text);
$id = parent::save();
return $id;
}
}
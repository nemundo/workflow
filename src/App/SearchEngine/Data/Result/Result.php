<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Result;
class Result extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ResultModel
*/
protected $model;

/**
* @var string
*/
public $title;

/**
* @var string
*/
public $text;

/**
* @var string
*/
public $dataId;

public function __construct() {
parent::__construct();
$this->model = new ResultModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->title, $this->title);
$this->typeValueList->setModelValue($this->model->text, $this->text);
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$id = parent::save();
return $id;
}
}
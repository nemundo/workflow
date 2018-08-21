<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Result;
use Nemundo\Model\Data\AbstractModelUpdate;
class ResultUpdate extends AbstractModelUpdate {
/**
* @var ResultModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->title, $this->title);
$this->typeValueList->setModelValue($this->model->text, $this->text);
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
parent::update();
}
}
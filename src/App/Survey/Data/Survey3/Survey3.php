<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey3;
class Survey3 extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var Survey3Model
*/
protected $model;

/**
* @var string
*/
public $dataId;

/**
* @var string
*/
public $artikel;

/**
* @var string
*/
public $artikelnr;

public function __construct() {
parent::__construct();
$this->model = new Survey3Model();
}
public function save() {
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$this->typeValueList->setModelValue($this->model->artikel, $this->artikel);
$this->typeValueList->setModelValue($this->model->artikelnr, $this->artikelnr);
$id = parent::save();
return $id;
}
}
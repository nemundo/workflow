<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey3;
use Nemundo\Model\Data\AbstractModelUpdate;
class Survey3Update extends AbstractModelUpdate {
/**
* @var Survey3Model
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$this->typeValueList->setModelValue($this->model->artikel, $this->artikel);
$this->typeValueList->setModelValue($this->model->artikelnr, $this->artikelnr);
parent::update();
}
}
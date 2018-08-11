<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\LargeText;
use Nemundo\Model\Data\AbstractModelUpdate;
class LargeTextUpdate extends AbstractModelUpdate {
/**
* @var LargeTextModel
*/
public $model;

/**
* @var string
*/
public $text;

public function __construct() {
parent::__construct();
$this->model = new LargeTextModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->text, $this->text);
parent::update();
}
}
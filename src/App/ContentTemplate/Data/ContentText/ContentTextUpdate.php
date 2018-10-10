<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentText;
use Nemundo\Model\Data\AbstractModelUpdate;
class ContentTextUpdate extends AbstractModelUpdate {
/**
* @var ContentTextModel
*/
public $model;

/**
* @var string
*/
public $text;

public function __construct() {
parent::__construct();
$this->model = new ContentTextModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->text, $this->text);
parent::update();
}
}
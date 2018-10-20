<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\LargeTextContentTemplate;
use Nemundo\Model\Data\AbstractModelUpdate;
class LargeTextContentTemplateUpdate extends AbstractModelUpdate {
/**
* @var LargeTextContentTemplateModel
*/
public $model;

/**
* @var string
*/
public $text;

public function __construct() {
parent::__construct();
$this->model = new LargeTextContentTemplateModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->text, $this->text);
parent::update();
}
}
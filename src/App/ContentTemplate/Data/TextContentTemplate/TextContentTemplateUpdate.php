<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TextContentTemplate;
use Nemundo\Model\Data\AbstractModelUpdate;
class TextContentTemplateUpdate extends AbstractModelUpdate {
/**
* @var TextContentTemplateModel
*/
public $model;

/**
* @var string
*/
public $text;

public function __construct() {
parent::__construct();
$this->model = new TextContentTemplateModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->text, $this->text);
parent::update();
}
}
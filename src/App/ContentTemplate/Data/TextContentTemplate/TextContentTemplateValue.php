<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TextContentTemplate;
class TextContentTemplateValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var TextContentTemplateModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextContentTemplateModel();
}
}
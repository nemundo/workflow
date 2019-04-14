<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TextContentTemplate;
class TextContentTemplateBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var TextContentTemplateModel
*/
protected $model;

/**
* @var string
*/
public $text;

public function __construct() {
parent::__construct();
$this->model = new TextContentTemplateModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->text, $this->text);
$id = parent::save();
return $id;
}
}
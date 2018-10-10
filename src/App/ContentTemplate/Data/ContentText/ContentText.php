<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentText;
class ContentText extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ContentTextModel
*/
protected $model;

/**
* @var string
*/
public $text;

public function __construct() {
parent::__construct();
$this->model = new ContentTextModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->text, $this->text);
$id = parent::save();
return $id;
}
}
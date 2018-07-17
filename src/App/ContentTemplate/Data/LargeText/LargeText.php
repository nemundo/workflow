<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\LargeText;
class LargeText extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var LargeTextModel
*/
protected $model;

/**
* @var string
*/
public $text;

public function __construct() {
parent::__construct();
$this->model = new LargeTextModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->text, $this->text);
$id = parent::save();
return $id;
}
}
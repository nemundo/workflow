<?php
namespace Nemundo\Workflow\App\Wiki\Data\TitleChange;
use Nemundo\Model\Data\AbstractModelUpdate;
class TitleChangeUpdate extends AbstractModelUpdate {
/**
* @var TitleChangeModel
*/
public $model;

/**
* @var string
*/
public $title;

public function __construct() {
parent::__construct();
$this->model = new TitleChangeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->title, $this->title);
parent::update();
}
}
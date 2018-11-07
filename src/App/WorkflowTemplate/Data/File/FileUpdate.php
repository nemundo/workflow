<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\File;
use Nemundo\Model\Data\AbstractModelUpdate;
class FileUpdate extends AbstractModelUpdate {
/**
* @var FileModel
*/
public $model;

/**
* @var \Nemundo\Model\Data\Property\File\RedirectFilenameDataProperty
*/
public $file;

/**
* @var bool
*/
public $delete;

public function __construct() {
parent::__construct();
$this->model = new FileModel();
$this->file = new \Nemundo\Model\Data\Property\File\RedirectFilenameDataProperty($this->model->file, $this->typeValueList);
}
public function update() {
$this->typeValueList->setModelValue($this->model->delete, $this->delete);
parent::update();
}
}
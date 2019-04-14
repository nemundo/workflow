<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\File;
class FileBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var FileModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->delete, $this->delete);
$id = parent::save();
return $id;
}
}
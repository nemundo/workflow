<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TemplateFile;
class TemplateFile extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var TemplateFileModel
*/
protected $model;

/**
* @var \Nemundo\Model\Data\Property\File\RedirectFilenameDataProperty
*/
public $file;

public function __construct() {
parent::__construct();
$this->model = new TemplateFileModel();
$this->file = new \Nemundo\Model\Data\Property\File\RedirectFilenameDataProperty($this->model->file, $this->typeValueList);
}
public function save() {
$id = parent::save();
return $id;
}
}
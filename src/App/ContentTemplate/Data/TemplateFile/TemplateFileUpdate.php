<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TemplateFile;
use Nemundo\Model\Data\AbstractModelUpdate;
class TemplateFileUpdate extends AbstractModelUpdate {
/**
* @var TemplateFileModel
*/
public $model;

/**
* @var \Nemundo\Model\Data\Property\File\RedirectFilenameDataProperty
*/
public $file;

public function __construct() {
parent::__construct();
$this->model = new TemplateFileModel();
$this->file = new \Nemundo\Model\Data\Property\File\RedirectFilenameDataProperty($this->model->file, $this->typeValueList);
}
public function update() {
parent::update();
}
}
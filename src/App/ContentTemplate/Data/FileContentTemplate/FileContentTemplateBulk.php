<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\FileContentTemplate;
class FileContentTemplateBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var FileContentTemplateModel
*/
protected $model;

/**
* @var \Nemundo\Model\Data\Property\File\RedirectFilenameDataProperty
*/
public $file;

public function __construct() {
parent::__construct();
$this->model = new FileContentTemplateModel();
$this->file = new \Nemundo\Model\Data\Property\File\RedirectFilenameDataProperty($this->model->file, $this->typeValueList);
}
public function save() {
$id = parent::save();
return $id;
}
}
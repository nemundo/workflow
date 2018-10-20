<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\FileContentTemplate;
class FileContentTemplateValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var FileContentTemplateModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileContentTemplateModel();
}
}
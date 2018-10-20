<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\FileContentTemplate;
class FileContentTemplateDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var FileContentTemplateModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileContentTemplateModel();
}
}
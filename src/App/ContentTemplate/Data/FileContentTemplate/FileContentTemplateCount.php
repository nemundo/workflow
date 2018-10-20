<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\FileContentTemplate;
class FileContentTemplateCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var FileContentTemplateModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileContentTemplateModel();
}
}
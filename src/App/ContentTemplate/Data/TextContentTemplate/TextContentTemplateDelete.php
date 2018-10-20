<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TextContentTemplate;
class TextContentTemplateDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var TextContentTemplateModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextContentTemplateModel();
}
}
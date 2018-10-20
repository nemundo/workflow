<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\LargeTextContentTemplate;
class LargeTextContentTemplateCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var LargeTextContentTemplateModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LargeTextContentTemplateModel();
}
}
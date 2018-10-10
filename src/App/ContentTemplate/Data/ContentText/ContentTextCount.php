<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentText;
class ContentTextCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ContentTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentTextModel();
}
}
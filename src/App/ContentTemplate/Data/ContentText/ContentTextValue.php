<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentText;
class ContentTextValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ContentTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentTextModel();
}
}
<?php
namespace Nemundo\Workflow\App\Wiki\Data\TextList;
class TextListValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var TextListModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextListModel();
}
}
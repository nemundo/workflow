<?php
namespace Nemundo\Workflow\App\Wiki\Data\TextList;
class TextListCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var TextListModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextListModel();
}
}
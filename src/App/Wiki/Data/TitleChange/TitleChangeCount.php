<?php
namespace Nemundo\Workflow\App\Wiki\Data\TitleChange;
class TitleChangeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var TitleChangeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TitleChangeModel();
}
}
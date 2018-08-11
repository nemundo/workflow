<?php
namespace Nemundo\Workflow\App\Wiki\Data\TitleChange;
class TitleChangeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var TitleChangeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TitleChangeModel();
}
}
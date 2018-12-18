<?php
namespace Nemundo\Workflow\App\Wiki\Data\TitleChange;
use Nemundo\Model\Id\AbstractModelIdValue;
class TitleChangeId extends AbstractModelIdValue {
/**
* @var TitleChangeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TitleChangeModel();
}
}
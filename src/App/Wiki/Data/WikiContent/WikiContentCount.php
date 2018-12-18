<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContent;
class WikiContentCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var WikiContentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WikiContentModel();
}
}
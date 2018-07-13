<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContentType;
class WikiContentTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var WikiContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WikiContentTypeModel();
}
}
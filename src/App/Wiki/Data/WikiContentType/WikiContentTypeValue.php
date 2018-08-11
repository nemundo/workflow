<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContentType;
class WikiContentTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var WikiContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WikiContentTypeModel();
}
}
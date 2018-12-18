<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiPage;
class WikiPageValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var WikiPageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WikiPageModel();
}
}
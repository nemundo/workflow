<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContent;
class WikiContentDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var WikiContentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WikiContentModel();
}
}
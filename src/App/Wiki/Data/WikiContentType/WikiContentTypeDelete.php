<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContentType;
class WikiContentTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var WikiContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WikiContentTypeModel();
}
}
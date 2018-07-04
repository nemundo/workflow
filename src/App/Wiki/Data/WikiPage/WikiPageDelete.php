<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiPage;
class WikiPageDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var WikiPageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WikiPageModel();
}
}
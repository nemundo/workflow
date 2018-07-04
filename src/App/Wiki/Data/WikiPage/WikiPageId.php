<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiPage;
use Nemundo\Model\Id\AbstractModelIdValue;
class WikiPageId extends AbstractModelIdValue {
/**
* @var WikiPageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WikiPageModel();
}
}
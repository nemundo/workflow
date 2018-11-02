<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContent;
use Nemundo\Model\Id\AbstractModelIdValue;
class WikiContentId extends AbstractModelIdValue {
/**
* @var WikiContentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WikiContentModel();
}
}
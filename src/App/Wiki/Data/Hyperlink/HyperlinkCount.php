<?php
namespace Nemundo\Workflow\App\Wiki\Data\Hyperlink;
class HyperlinkCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var HyperlinkModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new HyperlinkModel();
}
}
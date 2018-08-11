<?php
namespace Nemundo\Workflow\App\Wiki\Data\Hyperlink;
use Nemundo\Model\Id\AbstractModelIdValue;
class HyperlinkId extends AbstractModelIdValue {
/**
* @var HyperlinkModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new HyperlinkModel();
}
}
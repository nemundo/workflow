<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiPage;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class WikiPageTable extends BootstrapModelTable {
/**
* @var WikiPageModel
*/
public $model;

protected function loadCom() {
$this->model = new WikiPageModel();
}
}
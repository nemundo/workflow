<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiPage;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class WikiPageTable extends BootstrapModelTable {
/**
* @var WikiPageModel
*/
public $model;

protected function loadCom() {
$this->model = new WikiPageModel();
}
}
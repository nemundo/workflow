<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiPage;
use Nemundo\Model\View\ModelView;
class WikiPageView extends ModelView {
/**
* @var WikiPageModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WikiPageModel();
}
}
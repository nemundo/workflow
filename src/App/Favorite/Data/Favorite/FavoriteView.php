<?php
namespace Nemundo\Workflow\App\Favorite\Data\Favorite;
use Nemundo\Model\View\ModelView;
class FavoriteView extends ModelView {
/**
* @var FavoriteModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new FavoriteModel();
}
}
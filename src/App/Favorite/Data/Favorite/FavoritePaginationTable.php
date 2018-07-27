<?php
namespace Nemundo\Workflow\App\Favorite\Data\Favorite;
class FavoritePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var FavoriteModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new FavoriteModel();
}
}
<?php
namespace Nemundo\Workflow\App\Favorite\Data\Favorite;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class FavoriteTable extends BootstrapModelTable {
/**
* @var FavoriteModel
*/
public $model;

protected function loadCom() {
$this->model = new FavoriteModel();
}
}
<?php
namespace Nemundo\Workflow\App\Favorite\Data\Favorite;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractFavoriteAction extends AbstractModelAction {
/**
* @return FavoriteRow
*/
protected function getRow() {
$reader = new FavoriteReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}
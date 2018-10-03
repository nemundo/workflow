<?php

namespace Nemundo\Workflow\App\Stream\Reader;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Workflow\App\Stream\Data\Stream\StreamPaginationReader;


class StreamContentTypeReader extends AbstractDataSource
{

    /**
     * @var int
     */
    public $limit = 30;

    /**
     * @var StreamPaginationReader
     */
    private $streamReader;

    /**
     * @return AbstractContentType[]
     */
    public function getData()
    {
        return parent::getData();
    }


    protected function loadData()
    {

        $this->streamReader = new StreamPaginationReader();
        $this->streamReader->addOrder($this->streamReader->model->id, SortOrder::DESCENDING);

        foreach ($this->streamReader->getData() as $streamRow) {

            $className = $streamRow->contentType->contentTypeClass;

            /** @var AbstractContentType $contentType */
            $contentType = new $className($streamRow->dataId);

            $this->addItem($contentType);

        }

    }


    public function getPaginationReader() {
        return $this->streamReader;
    }

}
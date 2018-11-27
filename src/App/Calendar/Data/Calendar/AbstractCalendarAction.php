<?php

namespace Nemundo\Workflow\App\Calendar\Data\Calendar;

use Nemundo\Model\Action\AbstractModelAction;

abstract class AbstractCalendarAction extends AbstractModelAction
{
    /**
     * @return CalendarRow
     */
    protected function getRow()
    {
        $reader = new CalendarReader();
        $reader->connection = $this->connection;
        $row = $reader->getRowById($this->id);
        return $row;
    }
}
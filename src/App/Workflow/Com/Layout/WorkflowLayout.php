<?php

namespace Nemundo\Workflow\App\Workflow\Com\Layout;


use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Package\Bootstrap\Layout\BootstrapColumn;
use Nemundo\Package\Bootstrap\Layout\BootstrapRow;


// BootstrapTitleColumn3Layout

class WorkflowLayout extends AbstractHtmlContainer
{

    /**
     * @var BootstrapColumn
     */
    public $header;

    /**
     * @var BootstrapColumn
     */
    public $col1;

    /**
     * @var BootstrapColumn
     */
    public $col2;

    /**
     * @var BootstrapColumn
     */
    public $col3;


    protected function loadContainer()
    {
        parent::loadContainer();

        $row = new BootstrapRow($this);
        $this->header = new BootstrapColumn($row);

        $row = new BootstrapRow($this);

        $this->col1 = new BootstrapColumn($row);
        $this->col1->columnWidth = 4;

        $this->col2 = new BootstrapColumn($row);
        $this->col2->columnWidth = 4;

        $this->col3 = new BootstrapColumn($row);
        $this->col3->columnWidth = 4;


    }

}
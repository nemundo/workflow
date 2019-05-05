<?php

namespace Nemundo\Workflow\App\Workflow\Com\Table;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Workflow\App\Workflow\Content\Process\AbstractWorkflowProcess;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;


class WorkflowHistoryTable extends AbstractHtmlContainer
{

    /**
     * @var AbstractWorkflowProcess
     */
    public $process;


    public function getContent()
    {

        $title = new AdminSubtitle($this);
        $title->content = 'History';

        $table = new AdminTable($this);

        $header = new TableHeader($table);

        $header->addText('Betreff');
        $header->addText('Mitarbeiter');
        $header->addText('Datum/Zeit');


        foreach ($this->process->getChild() as $child) {

            if ($child->showLog) {

                $row = new TableRow($table);

                $row->addText($child->getSubject());
                $row->addText($child->userCreated->displayName);
                $row->addText($child->dateTimeCreated->getShortDateTimeLeadingZeroFormat());

            }

        }

        return parent::getContent();

    }

}
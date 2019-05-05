<?php

namespace Nemundo\Workflow\App\Workflow\Com\Table;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Workflow\App\Workflow\Content\Process\AbstractWorkflowProcess;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;


class WorkflowLogTable extends AbstractHtmlContainer
{


    // include itself and child of child


    /**
     * @var AbstractWorkflowProcess
     */
    public $process;

    /**
     * @var bool
     */
    public $showDraftColumn = true;

    /**
     * @var bool
     */
    public $showTypeColumn = true;

    /**
     * @var bool
     */
    public $showDataIdColumn = false;


    public function getContent()
    {

        $title = new AdminSubtitle($this);
        $title->content = 'Log';

        $table = new AdminTable($this);

        $header = new TableHeader($table);

        if ($this->showTypeColumn) {
        $header->addText('Type');
        }

        if ($this->showDraftColumn) {
            $header->addText('Entwurf');
        }
        $header->addText('Betreff');
        $header->addText('Mitarbeiter');
        $header->addText('Datum/Zeit');

        if ($this->showDataIdColumn) {
            $header->addText('Data Id');
        }

        foreach ($this->process->getChild() as $child) {

            $row = new TableRow($table);

            if ($this->showTypeColumn) {
                $row->addText($child->contentLabel);
            }

            if ($this->showDraftColumn) {
                $row->addYesNo($child->isDraft());
            }

            $row->addText($child->getSubject());
            $row->addText($child->userCreated->displayName);
            $row->addText($child->dateTimeCreated->getShortDateTimeLeadingZeroFormat());

            if ($this->showDataIdColumn) {
                $row->addText($child->dataId);
            }

        }

        return parent::getContent();

    }

}
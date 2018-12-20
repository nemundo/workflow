<?php

namespace Nemundo\Workflow\App\Workflow\Com\Menu;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Hyperlink\ContentHyperlink;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Package\Bootstrap\Color\BootstrapFontColor;
use Nemundo\Package\FontAwesome\Icon\ArrowRightIcon;
use Nemundo\Package\FontAwesome\Icon\CheckIcon;
use Nemundo\Web\Site\Site;
use Nemundo\Workflow\App\Workflow\Content\Process\AbstractWorkflowProcess;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;

class WorkflowStatusTable extends AbstractHtmlContainerList
{

    /**
     * @var AbstractWorkflowProcess
     */
    public $process;

    /**
     * @var AdminTable
     */
    private $table;

    protected function loadCom()
    {
        $this->table = new AdminTable($this);
    }


    public function addLogWorkflowStatus(AbstractWorkflowStatus $workflowStatus)
    {

        $row = new TableRow($this->table);

        new CheckIcon($row);

        //$row->addText($workflowStatus->getSubject());
        //$row->addText($workflowStatus->contentLabel);

        $link = new ContentHyperlink($row);
        $link->content = $workflowStatus->contentLabel;
        $link->href = '#log-' . $workflowStatus->logId;
        $link->addCssClass(BootstrapFontColor::DARK);

        $row->addText($workflowStatus->userCreated->displayName);
        $row->addText($workflowStatus->dateTimeCreated->getShortDateLeadingZeroFormat());

    }


    public function addActiveWorkflowStatus(AbstractWorkflowStatus $workflowStatus, $active)
    {

        $row = new TableRow($this->table);

        if ($active) {
            new ArrowRightIcon($row);
            $row->addBoldText($workflowStatus->contentLabel);
            //$row->addBoldText($workflowStatus->getSubject());
        } else {

            $row->addEmpty();

            $hyperlink = new SiteHyperlink($row);
            $hyperlink->site = new Site();
            $hyperlink->site->title = $workflowStatus->contentLabel;
            $hyperlink->site->addParameter(new ContentTypeParameter($workflowStatus->contentId));

        }

        $row->addEmpty();
        $row->addEmpty();

    }


    public function addMenu()
    {


        if ($this->process->dataId !== null) {

            if ($this->process->getCurrentStatus()->hasMenuSite()) {

                $row = new TableRow($this->table);
                $row->addEmpty();

                $list = new UnorderedList($row);
                $list->addCssClass('no-bullet');


                foreach ($this->process->getCurrentStatus()->getMenuSite() as $site) {

                    if ($site->isActiveWorkflowStatus()) {
                        $list->addText((new ArrowRightIcon())->getHtmlString() . ' ' . $site->title);
                    } else {


                        //$btn = new AdminButton($list);
                        //$btn->site = $site;
                        //$btn->content = $site->title;


                        if ($site->workflowStatus->checkUserVisibility()) {

                            //$btn->disabled = true;

                            $hyperlink = new SiteHyperlink($list);
                            $hyperlink->site = $site;


                        } else {

                            $list->addText($site->title);

                            // $hyperlink = new Hyperlink();
                            //   $hy

                            //$hyperlink->addCssClass('btn disabled');
                            //$hyperlink->addCssClass('disabled');
                            //$hyperlink->
                        }

                    }

                }


                $row->addEmpty();
                $row->addEmpty();

            }
        }


    }


    public function addNextWorkflowStatus(AbstractWorkflowStatus $workflowStatus)
    {

        if ($workflowStatus->showMenu) {

            $row = new TableRow($this->table);

            $row->addEmpty();
            //$row->addText($workflowStatus->contentLabel);
            $row->addText($workflowStatus->getSubject());
            $row->addEmpty();
            $row->addEmpty();

        }

    }

}
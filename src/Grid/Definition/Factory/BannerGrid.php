<?php
namespace Superbanner\Grid\Definition\Factory;

use PrestaShop\PrestaShop\Core\Grid\Action\Row\AbstractRowAction;
use PrestaShop\PrestaShop\Core\Grid\Definition\Factory\AbstractGridDefinitionFactory;
use PrestaShop\PrestaShop\Core\Grid\Column\ColumnCollection;
use PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn;
use PrestaShop\PrestaShop\Core\Grid\Column\Type\Common\ActionColumn;
use PrestaShop\PrestaShop\Core\Grid\Column\Type\Common\ImageColumn;
use PrestaShop\PrestaShop\Core\Grid\Action\Row\RowActionCollection;
use PrestaShop\PrestaShop\Core\Grid\Action\Row\Type\LinkRowAction;
use PrestaShop\PrestaShop\Core\Grid\Action\Row\Type\SubmitRowAction;

class BannerGrid extends AbstractGridDefinitionFactory
{
    protected function getId()
    {
        return 'super_banner';
    }

    protected function getName()
    {
        return $this->trans('Banner', [], 'Superbanner.Admin.Banner');
    }

    protected function getColumns()
    {
        return (new ColumnCollection())
            ->add((new DataColumn('id_banner'))
                ->setName($this->trans('ID', [], 'Admin.Global'))
                ->setOptions([
                    'field' => 'id_superbanner',
                ])
            )
            ->add((new DataColumn('date_begin'))
                ->setName($this->trans('Begin date', [], 'Superbanner.Admin.Banner'))
                ->setOptions([
                    'field' => 'date_begin',
                ])
            )
            ->add((new DataColumn('date_end'))
                ->setName($this->trans('End date', [], 'Superbanner.Admin.Banner'))
                ->setOptions([
                    'field' => 'date_end',
                ])
            )
            ->add((new ImageColumn('banner'))
                ->setName($this->trans('Banner', [], 'Superbanner.Admin.Banner'))
                ->setOptions([
                    'src_field' => 'banner',
                ])
            )
            ->add((new ActionColumn('actions'))
                ->setOptions([
                    'actions' => (new RowActionCollection())
                        ->add((new LinkRowAction('edit'))
                            ->setIcon('edit')
                            ->setOptions([
                                'route' => 'admin_superbanner_edit',
                                'route_param_name' => 'id_superbanner',
                                'route_param_field' => 'id_superbanner',
                            ])
                        )
                        ->add((new LinkRowAction('delete'))
                            ->setName($this->trans('Delete', [], 'Admin.Actions'))
                            ->setIcon('delete')
                            ->setOptions([
                                'route' => 'admin_superbanner_delete',
                                'route_param_name' => 'id_superbanner',
                                'route_param_field' => 'id_superbanner',
                            ])
                        )
                ])
            )
            ;
    }
}
<?php
namespace Superbanner\Grid\Definition\Factory;

use PrestaShop\PrestaShop\Core\Grid\Definition\Factory\AbstractGridDefinitionFactory;
use PrestaShop\PrestaShop\Core\Grid\Column\ColumnCollection;
use PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn;

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
                    'field' => 'id_product',
                ])
            )
            ->add((new DataColumn('date_begin'))
                ->setName($this->trans('Begin date', [], 'Superbanner.Admin.Banner'))
                ->setOptions([
                    'field' => 'reference',
                ])
            )
            ->add((new DataColumn('date_end'))
                ->setName($this->trans('End date', [], 'Superbanner.Admin.Banner'))
                ->setOptions([
                    'field' => 'name',
                ])
            )
            ;
    }
}
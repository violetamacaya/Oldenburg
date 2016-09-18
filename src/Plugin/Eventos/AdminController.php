<?php

namespace Plugin\Eventos;

class AdminController extends \Ip\GridController
{
    protected function config(){

        return array(
            'title' => 'Eventos',
            'table' => 'eventos',
            'deleteWarning' => '¿Estás seguro?',
            'sortField' => 'row_number',
            'createPosition' => 'top',
            'pageSize' => 100,
            'fields' => array(

                array(
                    'label' => 'Título',
                    'field' => 'title',
                ),
                array(
                    'label' => 'Imagen',
                    'field' => 'image',
                    'type' => 'RepositoryFile',
                    'showInList' => true,
                    'preview' => function($fieldValue, $dbRecord){
                        if($dbRecord['image'] != '')
                            return '<img style="width: 50px;" src="/file/repository/' . $dbRecord['image'] . '"/>';
                        else
                            return '';
                    }
                ),
                array(
                    'label' => 'Descripción',
                    'field' => 'description',
                ),
                array(
                    'label' => 'Fecha',
                    'field' => 'date',
                )
            )
        );
    }
}
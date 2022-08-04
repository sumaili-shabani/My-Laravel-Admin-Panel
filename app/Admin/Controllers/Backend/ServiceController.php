<?php

namespace App\Admin\Controllers\Backend;

use App\Models\Backend\Service;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ServiceController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Service';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Service());
       
        $grid->column('titre', __('Titre'));
        // $grid->column('description', __('Description'));

        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
       
        $grid->filter(function($filter){
           $filter->disableIdFilter();
           $filter->like('titre', __('Titre'));
          
        });



        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Service::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('titre', __('Titre'));
        $show->field('description', __('Description'));
        
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Service());
        $form->text('titre', __('Titre'))->required();
        $form->textarea('description', __('Description'));

        return $form;
    }
}

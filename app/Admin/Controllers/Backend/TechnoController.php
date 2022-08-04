<?php

namespace App\Admin\Controllers\Backend;

use App\Models\Backend\Techno;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TechnoController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Techno';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Techno());

        $grid->column('titre', __('Nom de la tech'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        
        $grid->filter(function($filter){
           $filter->disableIdFilter();
           $filter->like('titre', __('Nom de la tech'));
          
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
        $show = new Show(Techno::findOrFail($id));
        $show->field('id', __('Id'));
        $show->field('titre', __('Titre'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Techno());
        $form->text('titre', __('Le titre de la tech'));

        return $form;
    }
}

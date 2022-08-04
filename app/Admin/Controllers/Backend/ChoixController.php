<?php

namespace App\Admin\Controllers\Backend;

use App\Models\Backend\Choix;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ChoixController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Choix';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Choix());
        $grid->column('image', __('Image'))->image('','50', '50')->display(function($val){
            if(empty($val)){
                return "No Thumbnal";
            }
            return $val;
        });
        $grid->column('titre', __('Titre Titre de la raison'));
        $grid->column('description', __('Description Titre de la raison'));
        $grid->column('created_at', __('Created at'));
        
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
        $show = new Show(Choix::findOrFail($id));
        $show->field('id', __('Id'));
        $show->field('titre', __('Titre Titre de la raison'));
        $show->field('description', __('Description Titre de la raison'));
        $show->field('image', __('Image'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Choix());

        $form->text('titre', __('Titre de la raison'));
        $form->textarea('description', __('Description de la raison'));
        $form->image('image', __('Photo'))->move('/choix/')->uniqueName();


        return $form;
    }
}

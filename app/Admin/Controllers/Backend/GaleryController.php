<?php

namespace App\Admin\Controllers\Backend;

use App\Models\Backend\Galery;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class GaleryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Galery';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Galery());
        $grid->column('image', __('Photo'))->image('','50', '50')->display(function($val){
            if(empty($val)){
                return "No Thumbnal";
            }
            return $val;
        });
       
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
       
        $grid->filter(function($filter){
           $filter->disableIdFilter();
           
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
        $show = new Show(Galery::findOrFail($id));
        $show->field('id', __('Id'));
        $show->field('image', __('Photo'));


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Galery());
        $form->image('image', __('Photo'))->move('/galery/')->uniqueName()->required();

       


        return $form;
    }
}

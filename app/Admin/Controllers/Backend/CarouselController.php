<?php

namespace App\Admin\Controllers\Backend;

use App\Models\Backend\Carousel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CarouselController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Carousel';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Carousel());

        $grid->column('image', __('Image'))->image('','50', '50')->display(function($val){
            if(empty($val)){
                return "No Thumbnal";
            }
            return $val;
        });
        $grid->column('titre', __('Titre'));
        $grid->column('description', __('Description'));
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
        $show = new Show(Carousel::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('titre', __('Titre'));
        $show->field('description', __('Description'));
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
        $form = new Form(new Carousel());

        $form->text('titre', __('Titre'));
        $form->textarea('description', __('Description'));
        $form->image('image', __('Photo du carousel'))->move('/carousel/')->uniqueName();

        return $form;
    }
}

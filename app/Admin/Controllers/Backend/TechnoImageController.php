<?php

namespace App\Admin\Controllers\Backend;

use App\Models\Backend\TechnoImage;
use App\Models\Backend\Techno;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TechnoImageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'TechnoImage';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new TechnoImage());
        $grid->column('image', __('Logo du langage'))->image('','50', '50')->display(function($val){
            if(empty($val)){
                return "No Thumbnal";
            }
            return $val;
        });
        $grid->column('techno.titre', __('Technologie'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
       
        $grid->filter(function($filter){
           $filter->disableIdFilter();
           $filter->like('techno.titre', __('Technologie'));
          
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
        $show = new Show(TechnoImage::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('techno_id', __('Technologie'));
        $show->field('image', __('Photo du membre'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new TechnoImage());
        $form->select('techno_id', "Technologie")->options(Techno::all()->pluck('titre', 'id'))->required();
        $form->image('image', __('Image de la technologie'))->move('/techno/')->uniqueName()->required();

        return $form;
    }
}

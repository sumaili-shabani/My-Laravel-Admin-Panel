<?php

namespace App\Admin\Controllers\Backend;

use App\Models\Backend\Partenaire;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PartenaireController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Partenaire';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Partenaire());

        $grid->column('image', __('Logo du partenaire'))->image('','50', '50')->display(function($val){
            if(empty($val)){
                return "No Thumbnal";
            }
            return $val;
        });
        $grid->column('url', __('Lien ou url du site'));
       
        $grid->filter(function($filter){
           $filter->disableIdFilter();
           $filter->like('url', __('url du site'));
          
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
        $show = new Show(Partenaire::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('url', __('Url du site'));
        $show->field('image', __('Logo du partenaire'));


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Partenaire());

        $form->text('url', __('Url du site'));
        $form->image('image', __('Logo du partenaire'))->move('/partenaire/')->uniqueName();


        return $form;
    }
}

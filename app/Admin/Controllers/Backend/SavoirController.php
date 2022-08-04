<?php

namespace App\Admin\Controllers\Backend;

use App\Models\Backend\Savoir;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SavoirController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Savoir plus sur nous!';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Savoir());
        $grid->column('about', __('A propos'))->display(function($val){
            return substr("A propos", 0, 40).'...'; 
        });

        $grid->column('travail', __('Ce que nous faisons'))->display(function($val){
           return substr("Ce que nous faisons", 0, 40).'...';
        });
        $grid->column('don', __('Nous faire un don'))->display(function($val){
           return substr("Nous faire un don", 0, 40).'...';
        });
        $grid->column('partenariat', __('Faire un partenariat'))->display(function($val){
           return substr("Faire un partenariat", 0, 40).'...';
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
        $show = new Show(Savoir::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('about', __('A propos'));
        $show->field('travail', __('Ce que nous faisons'));
        $show->field('don', __('Don'));
        $show->field('partenariat', __('Partenariat'));

        
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Savoir());

        $form->UEditor('about','A propos')->placeholder("A propos");
        $form->UEditor('travail','Ce que nous faisons')->placeholder("Ce que nous faisons");
        $form->UEditor('don','Nous faire un don')->placeholder("Nous faire un don");
        $form->UEditor('partenariat','Faire un partenariat')->placeholder("Faire un partenariat");

        return $form;
    }
}

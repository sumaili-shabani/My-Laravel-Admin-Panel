<?php

namespace App\Admin\Controllers\Backend;

use App\Models\Backend\Membre;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MembreController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Membre';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Membre());

        $grid->column('image', __('Image'))->image('','50', '50')->display(function($val){
            if(empty($val)){
                return "No Thumbnal";
            }
            return $val;
        });
        $grid->column('nom', __('Nom'));
        $grid->column('email', __('Adresse mail'));
        $grid->column('telephone', __('N° de Téléphone'));
        $grid->column('fonction', __('Fonction'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->filter(function($filter){
           $filter->disableIdFilter();
           $filter->like('nom', __('Nom complet'));
          
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
        $show = new Show(Membre::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('nom', __('Nom complet'));
        $show->field('email', __('Email du membre'));
        $show->field('telephone', __('N° de téléphone principal'));
        $show->field('fonction', __('Fonction'));
        $show->field('facebook', __('Lien vers facebook'));
        $show->field('twitter', __('Lien vers twitter'));
        $show->field('linkedin', __('Lien vers linkedin'));
        $show->field('biographie', __('Biographie'));
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
        $form = new Form(new Membre());
        $form->text('nom', __('Nom complet'));
        $form->text('email', __('Email du membre'));
        $form->text('telephone', __('N° de téléphone principal'));
        $form->text('fonction', __('Fonction'));
        $form->text('facebook', __('Lien vers facebook'));
        $form->text('twitter', __('Lien vers twitter'));
        $form->text('linkedin', __('Lien vers linkedin'));
        $form->textarea('biographie', __('Biographie'))->placeholder("Parler un peu de vous!");
        $form->image('image', __('Photo du membre'))->move('/membre/')->uniqueName();


        return $form;
    }
}

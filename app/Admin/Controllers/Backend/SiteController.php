<?php

namespace App\Admin\Controllers\Backend;

use App\Models\Backend\Site;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SiteController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Site';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Site());

        $grid->column('image', __('Logo'))->image('','50', '50')->display(function($val){
            if(empty($val)){
                return "No Thumbnal";
            }
            return $val;
        });
        $grid->column('nom', __('Nom'));
        $grid->column('email', __('Email'));
        $grid->column('telephone1', __('Telephone1'));
        $grid->column('telephone2', __('Telephone2'));
        $grid->column('adresse', __('Adresse'));
       
        $grid->column('mission', __('Mission'))->display(function($val){
           return substr($val, 0, 40).'...'; 
        });

        $grid->column('objectif', __('Objectif'))->display(function($val){
           return substr($val, 0, 40).'...'; 
        });
        $grid->column('description', __('Description'))->display(function($val){
           return substr($val, 0, 40).'...'; 
        });
        
        $grid->column('tug', __('Tug'));
        $grid->column('created_at', __('Created at'));
        
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
        $show = new Show(Site::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('nom', __('Nom'));
        $show->field('email', __('Email'));
        $show->field('telephone1', __('Telephone1'));
        $show->field('telephone2', __('Telephone2'));
        $show->field('adresse', __('Adresse'));
        $show->field('facebook', __('Facebook'));
        $show->field('twitter', __('Twitter'));
        $show->field('linkedin', __('Linkedin'));
        $show->field('whatsapp', __('Whatsapp'));
        $show->field('image', __('Image'));
        $show->field('mission', __('Mission'));
        $show->field('objectif', __('Objectif'));
        $show->field('description', __('Description'));
        $show->field('tug', __('Tug'));
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
        $form = new Form(new Site());

        $form->text('nom', __('Nom'));
        $form->email('email', __('Email'));
        $form->text('telephone1', __('Telephone1'))->icon('fa-phone');
        $form->text('telephone2', __('Telephone2'))->icon('fa-phone');
        $form->text('adresse', __('Adresse'))->icon('fa-map');
        $form->text('facebook', __('Facebook'))->icon('fa-globe');
        $form->text('twitter', __('Twitter'))->icon('fa-globe');
        $form->text('linkedin', __('Linkedin'))->icon('fa-globe');
        $form->text('whatsapp', __('Whatsapp'))->icon('fa-globe');
        $form->textarea('mission', __('Mission'))->placeholder("Mission du site");
        $form->textarea('objectif', __('Objectif'))->placeholder("Objectif du site");
        $form->textarea('description', __('Description'))->placeholder("Description du site");
        $form->tags('tug', __('Tug'))->placeholder("Tapper les tugs");
        $form->image('image', __('Logo'))->move('/site/')->uniqueName();

        return $form;
    }
}

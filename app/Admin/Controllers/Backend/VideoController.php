<?php

namespace App\Admin\Controllers\Backend;

use App\Models\Backend\Video;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class VideoController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Video';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Video());

       
        $grid->column('titre', __('Titre de la vidéo'))->display(function($val){
           return substr($val, 0, 40).'...'; 
        });

        $grid->column('url', __('Url youtube de la vidéo'))->display(function($val){
          return "<a href='$val' target='_blank'>$val</a>";
        });

        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
       
        $grid->filter(function($filter){
           $filter->disableIdFilter();
           $filter->like('titre', __('Titre de la vidéo'));
          
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
        $show = new Show(Video::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('titre', __('Titre de la vidéo'));
        $show->field('url', __('Url de la vidéo'));

        $show->field('description', __('Description de la vidéo'));
       

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Video());

        $form->text('titre', __('Titre de la vidéo'))->required();
        $form->text('url', __('Url de la vidéo'))->placeholder("https://www.youtube.com/embed/Z8GIHb4rj78")->required();
        $form->UEditor('description','Description de la vidéo');

        return $form;
    }
}

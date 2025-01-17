<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoomRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class RoomCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class RoomCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Room::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/room');
        CRUD::setEntityNameStrings('room', 'rooms');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column([
            'label' => 'Class',
            'name' => 'class_id',
            'type' => 'text'
        ]);
        CRUD::column([
            'label' => 'Teacher',
            'name' => 'teacher.name',
            'type' => 'text'
        ]);
        CRUD::column([
            'label' => 'Subject',
            'name' => 'subject.code',
            'type' => 'text'
        ]);
    }

    protected function setupShowOperation()
    {
        CRUD::column([
            'label' => 'Class',
            'name' => 'class_id',
            'type' => 'text'
        ]);
        CRUD::column([
            'label' => 'Teacher',
            'name' => 'teacher.name',
            'type' => 'text'
        ]);
        CRUD::column([
            'label' => 'Subject',
            'name' => 'subject.code',
            'type' => 'text'
        ]);
        CRUD::column([
            'label' => 'Created',
            'name' => 'created_at',
            'type' => 'date',
            'format' => 'D MMM YYYY, HH:mm'
        ]);
        CRUD::column([
            'label' => 'Updated',
            'name' => 'updated_at',
            'type' => 'date',
            'format' => 'D MMM YYYY, HH:mm'
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(RoomRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field([  // Select
            'label'     => "Teacher",
            'type'      => 'select',
            'name'      => 'teacher_id', // the db column for the foreign key
            'entity'    => 'Teacher',
            'model'     => "App\Models\Teacher", // related model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::field([  // Select
            'label'     => "Subject",
            'type'      => 'select',
            'name'      => 'subject_id', // the db column for the foreign key
            'entity'    => 'Subject',
            'model'     => "App\Models\Subject", // related model
            'attribute' => 'code', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}

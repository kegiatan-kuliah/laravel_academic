<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GradeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class GradeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class GradeCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Grade::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/grade');
        CRUD::setEntityNameStrings('grade', 'grades');
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
            'label' => 'Grade',
            'name' => 'grade',
            'type' => 'number'
        ]);
        CRUD::column([
            'label' => 'Student',
            'name' => 'student.name',
            'type' => 'text'
        ]);
        CRUD::column([
            'label' => 'Room',
            'name' => 'room.class_id',
            'type' => 'text'
        ]);
    }

    protected function setupShowOperation()
    {
        CRUD::column([
            'label' => 'Grade',
            'name' => 'grade',
            'type' => 'number'
        ]);
        CRUD::column([
            'label' => 'Student',
            'name' => 'student.name',
            'type' => 'text'
        ]);
        CRUD::column([
            'label' => 'Room',
            'name' => 'room.class_id',
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
        CRUD::setValidation(GradeRequest::class);
        CRUD::setFromDb(); // set fields from db columns.
        CRUD::field([
            'label' => 'Grade',
            'name' => 'grade',
            'type' => 'number'
        ]);
        CRUD::field([  // Select
            'label'     => "Student",
            'type'      => 'select',
            'name'      => 'student_id', // the db column for the foreign key
            'entity'    => 'Student',
            'model'     => "App\Models\Student", // related model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::field([  // Select
            'label'     => "Room",
            'type'      => 'select',
            'name'      => 'room_id', // the db column for the foreign key
            'entity'    => 'Room',
            'model'     => "App\Models\Room", // related model
            'attribute' => 'class_id', // foreign key attribute that is shown to user
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

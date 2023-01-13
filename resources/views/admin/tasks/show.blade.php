@extends('admin.layouts.template-forms')
@section('title', 'Tasks')
@section('content')

<div class="container">

       
      
      
              <div class="container-fluid px-4">
             
<div class="card mb-4">
    <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.id') }}
                        </th>
                        <td>
                            {{ $task->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.title') }}
                        </th>
                        <td>
                            {{ $task->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.display_name') }}
                        </th>
                        <td>
                            {{ $task->display_name }}
                        </td>
                    </tr>
                        <th>
                            {{ trans('cruds.task.fields.description') }}
                        </th>
                        <td>
                            {{ $task->description }}
                        </td>
                    </tr>

                            <th>
                            {{ trans('cruds.task.fields.created_at') }}
                        </th>
                        <td>
                            {{ $task->created_at }}
                        </td>
                    </tr>

                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-info" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div> 
        </div>
              </div>
      
    </div>
    </div>


@endsection

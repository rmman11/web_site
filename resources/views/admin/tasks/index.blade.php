@extends('admin.layouts.template-forms')
@section('title', 'Tasks')
@section('content')


<div class="card" style="width: 1200px;">
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
      <a class="btn btn-success" href="{{ route('tasks.create') }}">
          New Task
      </a>
    </div>
</div>


   
<div class="card mb-4">
    <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Task</th>
                                            <th>Date Time</th>
                                            <th>Name</th>
                                            <th class="no-sort" name="prop_ref_no">Action</th>
                                        </tr>
                                    </thead>

                                
                                        <tr>

      @foreach ($tasks as $task)

        <td><div>{{ $task->name }}</div></td>
        <td><div>{{ $task->created_at }}</div></td>
        <td><div>{{ $task->display_name }}</div></td>
  <td>

  <a class="btn btn-xs btn-info" href="{{ route('tasks.edit', $task->id) }}">
    <i class='fas fa-edit' style='font-size:24px'></i>
          </a>
          <a class="btn btn-xs btn-info" href="{{ route('tasks.show', $task->id) }}">View</a>


          <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button class="btn" value="{{ trans('global.delete') }}">
              <i class="fa fa-trash"></i>
            </button>
          </form>
        </td>
        </tr>
                
      @endforeach
    </tbody>
  </table>
</div>
</div>

    </div>
</div>


@endsection

@extends('admin.layouts.template-forms')
@section('title', 'Categorie')
@section('content')

<div class="card" style="width: 1200px;">
  <div class="card-body">
  <a href="{{ route('categories.create') }}" class="btn btn-success">
      {{ trans('global.create') }} {{ trans('cruds.categ.title_singular') }}
    </a>


    <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th>Nr</th>
          <th>Name</th>
          <th>Date Time</th>
          <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
          @if (count($categories) > 0)
          @foreach ($categories as  $key => $category)
          <td>{{ ++$key }}</td>
          <td><div>{{ $category->title }}</div></td>
          <td><div>{{ $category->created_at }}</div></td>

          <td>

           

            <a class="btn btn-xs btn-info" href="{{ route('categories.edit', $category->id) }}">
              <i class='fas fa-edit' style='font-size:24px'></i>
            </a>


            <a class="btn btn-xs btn-primary" href="{{ route('categories.show', $category->id) }}">
            <i class="fa fa-eye" aria-hidden="true"></i>
            </a>

            {!! Form::open(array(
              'style' => 'display: inline-block;',
              'method' => 'DELETE',
              'onsubmit' => "return confirm('".trans("global.delete")."');",
              'route' => ['categories.destroy', $category->id])) !!}
          <button class="btn" title="delete"><i class="fa fa-trash"></i></button>
              {!! Form::close() !!}

            </td>

          </tr>
          @endforeach
          @else
          <tr>
            <td colspan="6">@lang('quickadmin.qa_no_entries_in_table')</td>
          </tr>
          @endif
        </tbody>

      </table>
      </div>
</div>

  </div>
</div>

@endsection
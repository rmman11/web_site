@extends('admin.layouts.template-forms')
@section('title', 'Create Categorie')
@section('content')


<div class="card" style="width: 1200px;">

<div class="card-body">
                  <h3>@lang('cruds.categ.title')</h3>
               
 {!! Form::open(['method' => 'POST', 'route' => ['categories.store']]) !!}

      <div class="form-group  col-md-4">
                      <select class="form-control" name="parent_id">
                        <option value="">Select Parent Category</option>

                        @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group  col-md-4">
                      <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Category Name" required>
                    </div>

                    <div class="form-group  col-md-4">
                      <button type="submit" class="btn btn-primary">Create</button>
                    </div>
              
    {!! Form::close() !!}
            </div>


    </div>


      <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

        <script type="text/javascript">
          $('.edit-category').on('click', function() {
            var id = $(this).data('id');
            var title = $(this).data('title');
            var url = "{{ url('category') }}/" + id;

            $('#editCategoryModal form').attr('action', url);
            $('#editCategoryModal form input[name="title"]').val(title);
          });
        </script>
@endsection
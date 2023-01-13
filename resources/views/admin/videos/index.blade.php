@extends('admin.layouts.template-forms')
@section('title', 'Video')
@section('content')
<div class="container">
    <div class="row">

    <div class="col-sm-3 col-md-6 col-lg-4 bg-primary text-white">

<form method="POST" action="{{ route('upload') }}" enctype="multipart/form-data" >
{{ csrf_field() }}

 <div class="form-group row">
<label>Title</label>
<input type="text" name="title" placeholder="Enter Title">
</div>
 <div class="form-group row">

<label>Choose Video</label>
<input type="file"  name="video">



<button type="submit" >Uploaded Video</button>

</form>
</div>

    </div>
    <div class="col-sm-9 col-md-6 col-lg-8 bg-dark text-white">
      


<div class="table-responsive">
<table id="example" class="display" style="width:100%">
        <thead>
          <tr>
          <th>Nr</th>
          <th>Title</th>
            <th>Video</th>
          <th>Date Time</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          
          @if (count($videos) > 0)
          @foreach ($videos as  $key => $video)
          <tr>
          <td>{{ ++$key }}</td>
          <td>{{ $video->title }}</td>
           <td>

  <video width="320" height="240" controls>
  <source src="{{ asset('/'.$video->video) }}" type="video/mp4">
  <source src="{{ asset('/'.$video->video) }}" type="video/ogg">
  Your browser does not support the video tag.
</video>





           </td>
          <td>{{ $video->created_at }}</td>


<td>
   {!! Form::open(array(
              'style' => 'display: inline-block;',
              'method' => 'DELETE',
              'onsubmit' => "return confirm('Are you sure  to delete this?');",
              'route' => ['videos.destroy', $video->id])) !!}
          <button class="btn" title="delete"><i class="fa fa-trash" style="color: red"></i></button>
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


      <script>
    $(document).ready(function () {
    $('#example').DataTable({
        order: [[3, 'desc']],
    });
});

      </script>
      @endsection

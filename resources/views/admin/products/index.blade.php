@extends('admin.layouts.template-forms')
@section('title', 'Products List')
@section('content')

<div class="card" style="width: 1200px;">
  <div class="card-body">
      <a href="{{ route('products.create') }}" class="btn btn-success">New product</a>
    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif


    <div class="card-body" style="width:1200px">
                          <table id="datatablesSimple">
                              <thead>
                                  <tr>
                                    <th>Nr</th>
                                      <th>Name</th>
                                      <th>Categorie</th>
                                      <th>Slug</th>
                                      <th>Description</th>
                                      <th>Price</th>
                                      <th>Image</th>
                                      <th class="no-sort" name="prop_ref_no">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                              @foreach ($products as $key => $product)
          <tr>
            <td style="width:10px">{{ ++$key }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->slug }}</td>
            <td>{{ substr($product->description,0,30) }}</td>
            <td>{{ $product->price }}</td>
            <td ><div>
              <img src="{{ asset('/images/products/' . $product->image) }}" alt="product" class="img-responsive"
              width="100" height="100"> </div></td>
              <td>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button class="btn" title="delete"><i class="fa fa-trash"></i></button>

                </form>



                <a   href="{{ route('products.edit',$product->id) }}" title="edit">
                  <i class="fa fa-edit" style="font-size:26px"></i></a>

                  <a   href="{{ route('products.show',$product->id) }}" title="details">
                    <i class="fa fa-eye" style="font-size:26px; color:red"></i></a>



                  </td>
                </tr>

                @endforeach
              </tbody>
            </table>

</div>
</div>
      @endsection



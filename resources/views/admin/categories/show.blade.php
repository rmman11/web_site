@extends('admin.layouts.template-forms')
@section('title', 'View Categorie')
@section('content')

<div class="card" style="width: 1200px;">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.product.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.categ.fields.id') }}
                        </th>
                        <td>
                            {{ $categories->id }}
                        </td>
                    </tr>

                    <th>
                {{ trans('cruds.categ.title') }}
                      
                    </th>
                    <td>
                        {{ $categories->title }}
                    </td>


                    <tr>
                        <th>
           SubCategorie
                        </th>
                        <td>
                            
                          @foreach ($categories->children as $child)
                                <div class="d-flex justify-content-between">
                                  {{ $child->title }}
                                  </div>
                                </div>
                           
                            @endforeach
                          

                        </td>
                    </tr>

                    </tr>

                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection
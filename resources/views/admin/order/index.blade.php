@extends('admin.layouts.template-forms')
@section('title', 'List Order')
@section('content')


<div class="card">
    <div class="card-header">
           <a class="btn btn-success" href="{{ route('order.create') }}">
           Add Order
            </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Order">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.order.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.customer_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.customer_email') }}
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.products') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $key => $order)
                        <tr data-entry-id="{{ $order->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $order->id ?? '' }}
                            </td>
                            <td>
                                {{ $order->customer_name ?? '' }}
                            </td>
                            <td>
                                {{ $order->customer_email ?? '' }}
                            </td>
                            <td>
                                <ul>
                                @foreach($order->products as $key => $item)
                                    <li>{{ $item->name }} ({{ $item->pivot->quantity }} x ${{ $item->price }})</li>
                                @endforeach
                                </ul>
                            </td>
                            <td>
                            
                                    <a class="btn btn-xs btn-primary" href="{{ route('order.show', $order->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                          

                                
                                    <a class="btn btn-xs btn-info" href="{{ route('order.edit', $order->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                               

                     
                                    <form action="{{ route('order.destroy', $order->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                             

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('order_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('order.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });
      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')
        return
      }
      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan
  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Order:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})
</script>
@endsection

 
                @foreach($items as $item)
                    <tr>
                        <td class="col-md-1">{{ $item->sku }}</td>
                        <td class="col-md-1">{{ $item->name }}</td>
                        <td class="col-md-1">{{ $item->type }}</td>
                        <td class="col-md-1">{{ $item->hsn }}</td>
                        <td class="col-md-1">{{ $item->details }}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false">
                                    <i class="fa fa-ellipsis-h"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="{{ url('items/items/' . $item->id . '/edit') }}">{{ trans('general.edit') }}</a></li>
                                    @permission('delete-items-items')
                                    <li>{!! Form::deleteLink($item, 'items/items') !!}</li>
                                    @endpermission
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
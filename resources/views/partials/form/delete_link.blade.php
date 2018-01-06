@php
$page = explode('/', $url)[1];
$text = $text ? $text : $page;
@endphp

{!! Form::open([
    'id' => str_singular($page) . '-' . $item->$id,
    'method' => 'DELETE',
    'url' => [$url, $item->$id],
    'style' => 'display:inline'
]) !!}
{!! Form::button(trans('general.delete'), array(
    'type'    => 'button',
    'class'   => 'delete-link',
    'title'   => trans('general.delete'),
    'onclick' => 'confirmDelete(
        "' . '#' . str_singular($page) . '-' . $item->$id . '",
        "' . 'Delete' . '",
        "' . trans('general.delete_confirm',['name' => '<strong>' . $item->$value . '</strong>',
        'type' => strtolower(trans_choice('general.' . $text, 1))]) . '", "' . trans('general.cancel') . '", "' . trans('general.delete') . '")'
)) !!}
{!! Form::close() !!}



@section('scripts')
    <script type="text/javascript">
        function confirmDelete(form_id, title, message, button_cancel, button_delete) {
            $('#confirm-modal').remove();

            var html  = '';

            html += '<div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">';
            html += '  <div class="modal-dialog">';
            html += '      <div class="modal-content">';
            html += '          <div class="modal-header">';
            html += '              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
            html += '              <h4 class="modal-title" id="confirmModalLabel">' + title + '</h4>';
            html += '          </div>';
            html += '          <div class="modal-body">';
            html += '              <p>' + message + '</p>';
            html += '              <p></p>';
            html += '          </div>';
            html += '          <div class="modal-footer">';
            html += '              <button type="button" class="btn btn-default" data-dismiss="modal">' + button_cancel + '</button>';
            html += '              <button type="button" class="btn btn-danger" onclick="$(\'' + form_id + '\').submit();">' + button_delete + '</button>';
            html += '          </div>';
            html += '      </div>';
            html += '  </div>';
            html += '</div>';

            $('body').append(html);

            $('#confirm-modal').modal('show');
        }
    </script>
@endsection

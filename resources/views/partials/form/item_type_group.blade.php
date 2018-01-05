<div class="form-group {{ $col }} {{ isset($attributes['required']) ? 'required' : '' }} {{ $errors->has($name) ? 'has-error' : '' }}">
    {!! Form::label($name, $text, ['class' => 'control-label']) !!}
    <div class="input-group">
        <div class="btn-group radio-inline" data-toggle="buttons">
            <label id="{{ $name }}_0" class="btn btn-default">
                {!! Form::radio($name, 'Goods') !!}
                <span class="radiotext">{{ trans('general.goods') }}</span>
            </label>
            <label id="{{ $name }}_1" class="btn btn-default">
                {!! Form::radio($name, 'Services') !!}
                <span class="radiotext">{{ trans('general.service') }}</span>
            </label>
        </div>
    </div>
    {!! $errors->first($name, '<p class="help-block">:message</p>') !!}
</div>

@stack($name . '_input_start')

    <div
        class="form-group {{ $col }}{{ isset($attributes['required']) ? ' required' : '' }}{{ isset($attributes['readonly']) ? ' readonly' : '' }}{{ isset($attributes['disabled']) ? ' disabled' : '' }}"
        :class="[{'has-error': errors.{{ $name }}}]">
        @if (!empty($text))
            {!! Form::label($name, $text, ['class' => 'form-control-label'])!!}
        @endif

        <div class="custom-file">
            <dropzone-file-upload 
                @if (!empty($attributes['options']))
                options={{ json_encode($attributes['options']) }}
                @endif
                @if (!empty($attributes['multiple']))
                multiple
                @endif
                v-model="{{ !empty($attributes['v-model']) ? $attributes['v-model'] : (!empty($attributes['data-field']) ? 'form.' . $attributes['data-field'] . '.'. $name : 'form.' . $name) }}"
            ></dropzone-file-upload>
        </div>

        <div class="invalid-feedback d-block"
            v-if="{{ isset($attributes['v-error']) ? $attributes['v-error'] : 'form.errors.has("' . $name . '")' }}"
            v-html="{{ isset($attributes['v-error-message']) ? $attributes['v-error-message'] : 'form.errors.get("' . $name . '")' }}">
        </div>
    </div>

@stack($name . '_input_end')

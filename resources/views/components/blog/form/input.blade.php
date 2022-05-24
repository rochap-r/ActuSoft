@props(['type'=>'text','name','placeholder','required'=>'true','value'])
<input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" $value {{ $required=='true' ? 'required' : '' }} class="form-control" placeholder="{{ $placeholder }}">
@error($name)
<small class="text-danger">{{ $message }}</small>
@enderror

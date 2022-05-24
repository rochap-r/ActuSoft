    @props(['name','placeholder'=>'','value'])
    <textarea required rows="6"  id="{{ $name }}" name="{{ $name }}" class="form-control">
       {{ $value }}
    </textarea>
    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror

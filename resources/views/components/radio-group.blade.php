@props(['name', 'options','value', 'showAllOption' => true])
<div>
    @if ($showAllOption)
        <label for="{{ $name }}_all" class="mb-1 flex items-center" >
            <input type="radio" name="{{ $name }}" value="" @checked(!request($name)) id="{{$name}}_all" />       
            <span class="ml-2" >All</span>
        </label>
    @endif
    @foreach ($options as $option)
        <label for="{{ $name }}_{{ $option }}" class="mb-1 flex items-center" >
            <input type="radio" name="{{ $name }}" value="{{ $option }}" id="{{ $name }}_{{$option}}" 
             @checked($option === ($value ?? request($name)) ) />
            <span class="ml-2" >{{Str::ucfirst($option)}}</span>
        </label>
    @endforeach
    @error($name)
        <div class="mt-1 text-xs text-red-500">
            {{ $message }}
        </div>
    @enderror  
</div>
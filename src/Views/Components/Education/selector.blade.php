<select id="{{$id}}" name="{{$name}}" class="{{ $class }}" size="{{ $size }}">
    @foreach($items as $key=>$title)
    <option @if($key == $value) selected="selected" @endif value="{{$key}}">{{$title}}</option>
    @endforeach
</select>

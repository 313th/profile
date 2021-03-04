<select id="{{$id}}" name="{{$name}}" class="{{ $class }}" size="{{ $size }}">
    @foreach($items as $key=>$title)
    <option @if($key == $value) selected="selected" @endif value="{{$key}}">{{$title}}</option>
    @endforeach
</select>
@php
    Theme::asset()->serve('toggleDescription');
    Theme::asset()->writeScript('charity-selector', '
        $(document).ready(function() {
            toggleDescription("'.$id.'","'.$descriptionId.'",'.\sahifedp\Profile\Models\UserSocialInformation::USER_SOCIAL_CHARITY_NO.');
        });
        $("#'.$id.'").change(function (e) {
            toggleDescription("'.$id.'","'.$descriptionId.'",'.\sahifedp\Profile\Models\UserSocialInformation::USER_SOCIAL_CHARITY_NO.');
        });
    ','toggleDescription');
@endphp

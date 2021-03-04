<select id="{{$id}}" name="{{$name}}" class="{{ $class }}" size="{{ $size }}">
    @foreach($items as $key=>$item)
    <option @if($key == $value) selected="selected" @endif value="{{$key}}">{{$key}}</option>
    @endforeach
</select>
@php
Theme::asset()->writeScript('religion-selector', '
    function loadBranch(){
        var religions = JSON.parse(\''.json_encode(\sahifedp\Profile\Models\UserLegalInformation::USER_LEGAL_RELIGIONS).'\');
        var branchOptions = religions[$("#'.$id.'").find(":selected").val()];
        $("#'.$branchId.'").empty();
        for(var i = 0; i < branchOptions.length; i++) {
            $("#'.$branchId.'").append(new Option(branchOptions[i],branchOptions[i]));
        }
        $("#'.$branchId.'").val("'.$branchValue.'");
        $("#'.$branchId.'").selectpicker("refresh");
    }
    $( document ).ready(function() {
        loadBranch();
    });
    $("#'.$id.'").change(function (e) {
        loadBranch();
    });
','jquery');
@endphp

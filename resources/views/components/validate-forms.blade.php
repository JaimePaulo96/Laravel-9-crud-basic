
@if ($errors->any())

<ul class="errors">
    @foreach($errors->all() as $error)
        <li class="errors">{{$error}}</li>
    @endforeach
</ul>   

@endif
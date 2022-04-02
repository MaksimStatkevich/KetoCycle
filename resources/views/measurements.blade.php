@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        @foreach($errors->all() as $error)
            {{ $error }}<br/>
        @endforeach
    </div>
@endif

<form method="post" action="{{route('measurements.store')}}">
    @csrf

    <input type="hidden" name="sex" value="1">
    <input type="hidden" name="system_of_units" value="0">

    <input type="text" name="age">
    <input type="text" name="height">
    <input type="text" name="weight">
    <input type="text" name="email">
    <input type="submit" value="Отправить">
</form>

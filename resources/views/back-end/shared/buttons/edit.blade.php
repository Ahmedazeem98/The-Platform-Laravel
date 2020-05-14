<form action="{{route($routeName.'.edit',['id' => $row])}}" method="POST" style ='float: center; padding: 0px;'>
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="GET">
    <button type="submit"class="btn btn-primary">Edit</button>
</form>

<form action="{{route($routeName.'.destroy',['id' => $row])}}" method="POST" style="float: right">
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="DELETE">
    <button type="submit" class="btn  btn-danger">Delete</button>
</form>
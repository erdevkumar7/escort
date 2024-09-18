<form action="{{route('contributor.logout')}}" method="POST">
    @csrf
    @method('POST')
    <h1>Home</h1>
    <button type="submit">Logout</button>
</form>
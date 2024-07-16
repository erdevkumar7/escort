<h1>User Dashboard</h1>
<form action="{{route('user_logout')}}" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger">Log Out</button>
</form>
<h1>Agency Detail</h1>
<h4>{{$agency->name}}</h4>

  {{-- logout form --}}
  <div>
    <form id="escort-logout-form" action="{{ route('agency.logout') }}" method="POST"
        >
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>
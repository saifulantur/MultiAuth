@if(Auth::check())
    <ul class="list-group">
        <li class="list-group-item">
            <a href="{{route('guest')}}">Home</a>
        </li>
        <li class="list-group-item">
            <a href="{{route('list.ad')}}">Your Ad</a>
        </li>
        <li class="list-group-item">
            <a href="{{route('add.pdf')}}">Add Pdf</a>
        </li>
    </ul>
@endif

<div>
    <h1>This is Header Component</h1>
    <h3>{{$name}}</h3>
    <ul>
        @foreach($fruits as $fruit)
            <li>{{$fruit}}</li>
        @endforeach
    </ul>
    <h3>{{$fruits[4]}}</h3>
</div>
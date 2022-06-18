@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-3">
            <form method="get" action="{{route('superhero.index')}}">
                <select name="powerstat" class="form-control" id="powerstat">
                    <option value="">Sort</option>
                    <option value="Intelligence,asc">Intelligence↑</option>
                    <option value="Intelligence,desc">Intelligence↓</option>
                    <option value="Strength,asc">Strength↑</option>
                    <option value="Strength,desc">Strength↓</option>
                    <option value="Speed,asc">Speed↑</option>
                    <option value="Speed,desc">Speed↓</option>
                    <option value="Durability,asc">Durability↑</option>
                    <option value="Durability,desc">Durability↓</option>
                    <option value="Power,asc">Power↑</option>
                    <option value="Power,desc">Power↓</option>
                    <option value="Combat,asc">Combat↑</option>
                    <option value="Combat,desc">Combat↓</option>
                </select>
                <input type="submit" value="Sort" class="btn-light">
            </form>
        </div>
        <div class="row">
            @foreach($superheroes as $superhero)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"><h3>{{ $superhero->name }}</h3></div>

                        <div class="card-body">
                            <div class="d-flex flex-nowrap">
                            <div class="col p-2 m-0">
                                <img class="img" src="{{$superhero->image_sm_url}}">
                            </div>
                            <div class="col p-2 m-0">
                            <p>{{ucfirst($powerstat)}}: {{$superhero->$powerstat}}</p>
                            <p>{{strtoupper($superhero->alignment->name)}}</p>
                            </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-primary float-end" href="{{route('superhero.show', $superhero->id)}}">
                                Read more
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

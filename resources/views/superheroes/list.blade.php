@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-row">
            <div class="p-2">
                <form method="get" action="{{route('superhero.index')}}">
                    <select name="sort" class="form-control" id="sort">
                        <option value="">Sort</option>
                        <option value="intelligence.asc">Intelligence↑</option>
                        <option value="intelligence.desc">Intelligence↓</option>
                        <option value="strength.asc">Strength↑</option>
                        <option value="strength.desc">Strength↓</option>
                        <option value="speed.asc">Speed↑</option>
                        <option value="speed.desc">Speed↓</option>
                        <option value="durability.asc">Durability↑</option>
                        <option value="durability.desc">Durability↓</option>
                        <option value="power.asc">Power↑</option>
                        <option value="power.desc">Power↓</option>
                        <option value="combat.asc">Combat↑</option>
                        <option value="combat.desc">Combat↓</option>
                    </select>
            </div>
            <div class="p-2">
                <input type="submit" value="Sort" class="btn btn-primary">
            </div>
                </form>
            <div class="ml-auto p-2">
            <a href="{{route('superhero.create')}}" class="btn btn-primary">Create new</a>
            </div>
        </div>
        <div class="row">
            @foreach($superheroes as $superhero)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"><h3>{{$superhero->name}}</h3></div>

                        <div class="card-body">
                            <div class="d-flex flex-nowrap">
                                <div class="col p-2 m-0">
                                    <img class="img" src="{{asset($superhero->image->sm_img_url)}}">
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
        {{$pagination}}
    </div>

@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-3">
            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
        </div>
        <div class="row justify-content-evenly">
        <div class="col-6">
            <img src="{{asset($superhero->image->lg_img_url)}}">
        </div>
        <div class="col-6">
            <h2 class="text-center">{{$superhero->name}}</h2>
            <table class="table">
                <tr>
                    <td>Intelligence</td>
                    <td>{{$superhero->intelligence}}</td>
                </tr>
                <tr>
                    <td>Strength</td>
                    <td>{{$superhero->strength}}</td>
                </tr>
                <tr>
                    <td>Speed</td>
                    <td>{{$superhero->speed}}</td>
                </tr>
                <tr>
                    <td>Durability</td>
                    <td>{{$superhero->durability}}</td>
                </tr>
                <tr>
                    <td>Power</td>
                    <td>{{$superhero->power}}</td>
                </tr>
                <tr>
                    <td>Combat</td>
                    <td>{{$superhero->combat}}</td>
                </tr>
            </table>
            <p>Aliases: {{$superhero->aliases}}</p>
            <p>Weight: {{$superhero->weight}} kg.</p>
            <p>Height: {{$height}}</p>
            <p>Alignment: {{ucfirst($superhero->alignment->name)}}</p>
            @if ($superhero->user_created == 1)
                <form method="post" action="{{ route('superhero.destroy', $superhero->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endif
        </div>
        </div>

    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <form method="post" action="{{route('superhero.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="name"
                           class="col-md-4 col-form-label text-md-end">Name</label>
                    <div class="col-md-6">
                        <input id="name" name="name" type="text" class="form-control">
                    </div>
                </div>
                    <div class="row mb-3">
                        <label for="intelligence"
                               class="col-md-4 col-form-label text-md-end">Intelligence</label>
                        <div class="col-md-6">
                            <input id="intelligence" name="intelligence" type="number" min="1" max="110" step="1" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="strength"
                               class="col-md-4 col-form-label text-md-end">Strength</label>
                        <div class="col-md-6">
                            <input id="strength" name="strength" type="number" min="1" max="110" step="1" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="speed"
                               class="col-md-4 col-form-label text-md-end">Speed</label>
                        <div class="col-md-6">
                            <input id="speed" name="speed" type="number" min="1" max="110" step="1" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="durability"
                               class="col-md-4 col-form-label text-md-end">Durability</label>
                        <div class="col-md-6">
                            <input id="durability" name="durability" type="number" min="1" max="110" step="1" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="power"
                               class="col-md-4 col-form-label text-md-end">Power</label>
                        <div class="col-md-6">
                            <input id="power" name="power" type="number" min="1" max="110" step="1" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="combat"
                               class="col-md-4 col-form-label text-md-end">Combat</label>
                        <div class="col-md-6">
                            <input id="combat" name="combat" type="number" min="1" max="110" step="1" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="image"
                               class="col-md-4 col-form-label text-md-end">Image</label>
                        <div class="col-md-6">
                            <input id="image" name="image" type="file" accept="image/png" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alignment"
                               class="col-md-4 col-form-label text-md-end">Alignment</label>
                        <div class="col-md-6">
                            <select id="aligment" name="alignment" class="form-control">
                                <option>Alignment</option>
                                @foreach($alignments as $alignment)
                                    <option value="{{$alignment->id}}">{{ucfirst($alignment->name)}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="height"
                               class="col-md-4 col-form-label text-md-end">Height</label>
                        <div class="col-md-6">
                            <input id="height" name="height" type="number" step="1" class="form-control" placeholder="in cm">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="weight"
                               class="col-md-4 col-form-label text-md-end">Weight</label>
                        <div class="col-md-6">
                            <input id="weight" name="weight" type="number" step="1" class="form-control" placeholder="in kg">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="aliases"
                               class="col-md-4 col-form-label text-md-end">Aliases</label>
                        <div class="col-md-6">
                            <input id="aliases" name="aliases" type="text" class="form-control">
                        </div>
                        <div class="col-md-6 offset-md-4">
                            <input id="submit" type="submit" class="btn btn-primary" value="Submit">
                        </div>
                </div>
            </form>
        </div>
    </div>
@endsection

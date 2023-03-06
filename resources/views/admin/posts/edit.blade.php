@extends('layouts.admin')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between my-2">
            <div>
                <h1>modifica {{$post->title}}</h1>

            </div>
            <div>
                    <a href="{{route('admin.posts.index')}}" class="btn btn-primary my-2">torna all'elenco</a>
                </div>
        </div>
        <div class="col-12">
            
            <form action="{{ route('admin.posts.update', $post->slug)}} " method="POST">
                @csrf
                @method('PUT')
                <div class="form-group my-3">
                    <label class="control-label">
                        Titolo
                    </label>
                    <input type="text" class="form-control" placeholder="inserisci titolo progetto" id="title" name="title" value="{{old('title') ?? $post->title}}">
                    
                </div>

                <div class="form-group my-3">
                    <label class="control-label">
                        Linguaggio
                    </label>
                    <input type="text" class="form-control" placeholder="inserisci linguaggio di  programmazione" id="language" name="language" value="{{old('language') ?? $post->language}}">
                </div>

                <div class="form-group my-3">
                    <label class="control-label">
                        Categoria
                    </label>
                    <select name="type_id" id="type_id">
                        @foreach($types as $type)
                        <option value="{{$type->id}}" {{ $type->id == old('type_id', $post->type_id) ? 'selected' : ''}}>{{$type->name}}</option>
                        @endforeach
                    </select>
                
                </div>
                

                <div class="form-group my-3">
                    <label class="control-label">
                        Descrizione
                    </label>
                    <textarea type="text" class="form-control" placeholder="inserisci descrizione del progetto" id="description" name="description" value="{{old('description') ?? $post->description}}"></textarea>
                </div>

                <div class="form-group my-3">
                  <button type="submit" class="btn btn-success">SALVA</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

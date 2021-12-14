@extends('master')
@section('title')
    Product
@endsection
@section('section')
    <form method="POST" action="{{isset($ind) ? route('update_product', $ind) : route('add_product')}}" class="d-flex flex-column text-center align-items-center" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <strong>{{ $error }}</strong>
                @endforeach
            </div>
        @endif
    <div class="mb-3">
        <label for="i1" class="form-label">Name</label>
        <input type="text" value="{{isset($db) ? $db->name : ''}}" name="name" class="form-control" id="i1">
    </div>
    <div class="mb-3">
        <label for="i2" class="form-label">Description</label>
        <textarea class="form-control" name="description" id="i2" rows="3">{{isset($db) ? $db->description : ''}}</textarea>
    </div>
    <div class="mb-3">
        <label for="i3" class="form-label">Img</label>
        <input type="file" name="img" class="form-control" id="i3" accept=".png, .jpg, .jpeg">
    </div>
    <div class="mb-3">
        <label for="i4" class="form-label">Cost</label>
        <input type="number" value="{{isset($db) ? $db->cost : ''}}" name="cost" id="id4" class="form-control">
    </div>
    <div class="mb-3">
        <label for="i5" class="form-label">Category</label>
        <select required id="i5" name="idcategory" class="form-select px-5" aria-label="Default select example">
            <option value="" selected disabled hidden>Open this select menu</option>
            @isset($cat)
                @foreach($cat as $c)
                <option value="{{$c->id}}">{{$c->name}}</option>
                @endforeach
            @endisset
        </select>
    </div>

        <button class="btn btn-primary" type="submit">Send</button>
    </form>
@endsection

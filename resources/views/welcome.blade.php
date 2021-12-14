@extends('master')
@section('title')
    Main
@endsection
@section('section')

    @if(!isset($db2)&&isset($db1))
    <h1 class="text-center">Choose category</h1>
    <div class="d-flex flex-wrap justify-content-center text-dark ">
    @foreach($db1 as $cat)
            <div class="d-flex flex-column w-25 my-5 align-items-center" role="button" onClick="window.location.href='{{$cat->id}}'">
            @if (file_exists(public_path('/storage/'.$cat->img)))
                <img class="w-50 h-50" src="{{ asset('/storage/'.$cat->img) }}">
            @endif
    <p class="text-dark fs-3 text-center">Name: {{$cat->name}}</p>
    <p class="text-dark fs-3 text-center">Description: {{$cat->description}}</p>
                @auth
            <div class="d-flex">
                <a class="text-dark mx-3" href="{{route('updatecategory',$cat->id)}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-hammer" viewBox="0 0 16 16">
                        <path d="M9.972 2.508a.5.5 0 0 0-.16-.556l-.178-.129a5.009 5.009 0 0 0-2.076-.783C6.215.862 4.504 1.229 2.84 3.133H1.786a.5.5 0 0 0-.354.147L.146 4.567a.5.5 0 0 0 0 .706l2.571 2.579a.5.5 0 0 0 .708 0l1.286-1.29a.5.5 0 0 0 .146-.353V5.57l8.387 8.873A.5.5 0 0 0 14 14.5l1.5-1.5a.5.5 0 0 0 .017-.689l-9.129-8.63c.747-.456 1.772-.839 3.112-.839a.5.5 0 0 0 .472-.334z"/>
                    </svg>
                </a>
    <a class="text-dark mx-3" href="{{route('delcat',$cat->id)}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
        </svg>
    </a>
            </div>
                @endauth
            </div>
    @endforeach
    </div>
    @endif

    @isset($db2)

        <h1 class="text-center">Products</h1>
        <div class="d-flex flex-wrap justify-content-center text-dark ">
            @foreach($db2 as $cat)
                <div class="d-flex flex-column w-25 my-5 align-items-center" role="button" onClick="window.location.href='{{route('products',$cat->id)}}'">
                    @if (file_exists(public_path('/storage/'.$cat->img)))
                        <img class="w-50 h-50" src="{{ asset('/storage/'.$cat->img) }}">
                    @else
                        <div class="w-50 h-50 bg-warning"></div>
                    @endif
                    <p class="text-dark fs-3">{{$cat->name}}</p>
                    <p class="text-dark fs-3">{{$cat->description}}</p>
                    <p class="text-dark fs-3">{{$cat->cost}}</p>
                        @auth
                        <div class="d-flex">
                    <a class="text-dark mx-3" href="{{route('updateproduct',$cat->id)}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-hammer" viewBox="0 0 16 16">
                            <path d="M9.972 2.508a.5.5 0 0 0-.16-.556l-.178-.129a5.009 5.009 0 0 0-2.076-.783C6.215.862 4.504 1.229 2.84 3.133H1.786a.5.5 0 0 0-.354.147L.146 4.567a.5.5 0 0 0 0 .706l2.571 2.579a.5.5 0 0 0 .708 0l1.286-1.29a.5.5 0 0 0 .146-.353V5.57l8.387 8.873A.5.5 0 0 0 14 14.5l1.5-1.5a.5.5 0 0 0 .017-.689l-9.129-8.63c.747-.456 1.772-.839 3.112-.839a.5.5 0 0 0 .472-.334z"/>
                        </svg>
                    </a>
                    <a class="text-dark mx-3" href="{{route('delprod',$cat->id)}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </a>
                        </div>
                        @endauth
                </div>
            @endforeach
        </div>

    @endisset
    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </div>
@endsection



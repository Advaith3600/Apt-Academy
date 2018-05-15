@extends('layouts.app')

@section('content')
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
            <li data-target="#carousel" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100 h-carousel" src="https://images.pexels.com/photos/459225/pexels-photo-459225.jpeg?auto=compress&cs=tinysrgb&h=350" alt="Apt Academy Image 1">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 h-carousel" src="https://dummyimage.com/1280x720/000/fff.png&text=Apt+Academy" alt="Apt Academy Image 2">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 h-carousel" src="https://dummyimage.com/1280x720/000/fff.png&text=Apt+Academy" alt="Apt Academy Image 3">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 h-carousel" src="https://dummyimage.com/1280x720/000/fff.png&text=Apt+Academy" alt="Apt Academy Image 4">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-round">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-round">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </span>
            <span class="sr-only">Next</span>
        </a>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
@endsection

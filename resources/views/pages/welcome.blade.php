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
                <img class="d-block w-100 h-carousel" src="https://picsum.photos/1280/720?random=0" alt="Apt Academy Image 1">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 h-carousel" src="https://picsum.photos/1280/720?random=1" alt="Apt Academy Image 2">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 h-carousel" src="https://picsum.photos/1280/720?random=2" alt="Apt Academy Image 3">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 h-carousel" src="https://picsum.photos/1280/720?random=3" alt="Apt Academy Image 4">
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

    <div class="bg-white number-font">
        <div class="container py-4 col-sm-9 col-md-8 col-lg-6">
            <div class="d-flex justify-content-between">
                <div class="w-160 text-center shadow-sm p-3 border">
                    <h2 class="text-primary">
                        {{ \App\Faculty::count() }}
                    </h2>
                    <h5 class="text-dim">Faculties</h5>
                </div>

                <div class="w-160 text-center shadow-sm p-3 border">
                    <h2 class="text-success">
                        {{ \App\Student::count() }}
                    </h2>
                    <h5 class="text-dim">Students</h5>
                </div>

                <div class="w-160 text-center shadow-sm p-3 border">
                    <h2 class="text-danger">
                        {{ \App\Standard::count() }}
                    </h2>
                    <h5 class="text-dim">Clases</h5>
                </div>
            </div>    
        </div>
    </div>

    <div class="bg-white">
        <div class="container">
            <div class="card">
                <div class="card-body d-sm-flex p-0">
                    <div class="col-sm-4 my-3">
                        <img src="https://dummyimage.com/600x400/000/fff&text=Principal" alt="Apt Academy Principal" class="w-100">
                    </div>

                    <div class="col-sm-8 my-3">
                        <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere cupiditate, molestias id saepe, ipsa, ullam labore modi at atque, deleniti vel rem totam est architecto asperiores aliquam molestiae libero minima.</div>
                        <div>Dolor, impedit voluptatibus ab nobis officia maxime sed quasi, a, veniam, ducimus perferendis amet cumque expedita rem. Dolores amet quam totam! Ipsam maiores accusantium, inventore hic harum qui sed iure.</div>
                        <div>Dolore rerum ex adipisci repellendus, nesciunt accusantium magni fuga eligendi laborum quisquam hic, perspiciatis dolores architecto minima doloribus odio maiores provident excepturi, optio aliquam velit! Alias beatae, repellat accusantium quod.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
@endsection

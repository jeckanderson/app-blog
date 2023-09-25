@extends('layouts.main')

@section('container')
    <div class="row mb-4">
        <div class="col-lg-8">
            <div class="header bg-light p-1 border-start border-4 border-danger">
                <h6>All News About Python</h6>
            </div>
            @foreach ($posts as $post)
            <div class="body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mt-3">
                            {{-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3sEhtE1CmaGUBTdqmZXaQUtQFBsDVmmcCAA&usqp=CAU" class="card-img-top" alt="..."> --}}
                            <img src="{{ asset('storage/' . $post->images) }}" alt="img" width="20%" class="img-fluid card-img-top">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#" class="btn btn-sm btn-danger mt-3">Python</a>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-3" style="font-size: 14px"><i class="bi bi-calendar2-minus"></i> {{ $post->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                        <div class="body mt-3">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ substr($post->body, 0, 300) }} ....</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
       
        </div>

        <div class="col-lg-4">
            <div class="header bg-light p-1 border-start border-4 border-danger">
                <h6 clas="ml-2">Most Popular News</h6>
            </div>

            <div class="cards">
                <div class="card mt-3" style="width: 18rem;">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3sEhtE1CmaGUBTdqmZXaQUtQFBsDVmmcCAA&usqp=CAU" class="card-img-top" alt="...">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-sm btn-danger mt-3">PHP</a>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-4" style="font-size: 14px"><i class="bi bi-calendar2-minus"></i> <?= date('d F, Y'); ?></div>
                    </div>
                </div>

                <div class="body mt-3">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>

            <div class="recent-now py-5">
                <div class="header bg-light p-1 border-start border-4 border-danger mt-3">
                    <h6 clas="ml-2">Recent Now</h6>
                </div>
    
                <div class="cards">
                    <div class="card mt-3" style="width: 18rem;">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3sEhtE1CmaGUBTdqmZXaQUtQFBsDVmmcCAA&usqp=CAU" class="card-img-top" alt="...">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-sm btn-danger mt-3">PHP</a>
                        </div>
                        <div class="col-md-6">
                            <div class="mt-4" style="font-size: 14px"><i class="bi bi-calendar2-minus"></i> <?= date('d F, Y'); ?></div>
                        </div>
                    </div>
    
                    <div class="body mt-3">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
@endsection
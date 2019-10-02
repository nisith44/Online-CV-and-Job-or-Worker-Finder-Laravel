@extends('layouts.navbar')

@section('title', 'Find People By skills')

@section('content')

<div class="container" style="min-height:800px;">
    <div class="row">
        <div class="col-md-3 ">

            <div class="card bg-light mb-3" style="">
                <div class="card-header">Search Tips</div>
                <div class="card-body">
                    <!-- <h5 class="card-title">Light card title</h5> -->
                    <p class="card-text">This search result depended by Added skills of the people.And only showing people who added there personal info</p>
                </div>
            </div>

        </div>

        <div class="col-md-9 row order-xs-first">

            @foreach($users as $user)

            <a href="/users/{{$user->name}}" style="text-decoration:none" class="hidden-xs-down">
                <div class="card border-dark mb-3 d-none d-sm-block" style="max-width: 15rem;margin-left:7px;">
                    <div class="card-header">{{$user->full_name}}</div>
                    <div class="card-body text-dark">
                        <img src="{{asset('storage/propics/'.$user->propic)}}" width="150" height="150"
                            style="object-fit: cover;" class="card-img-top " alt="...">
                        <h5 style="font-size: 16px;" class="card-title">{{$user->title}}</h5>
                        <p style="font-size: 13px;" class="card-text"><i class="fas fa-map-marker-alt"></i>
                            <?php echo substr($user->address,0,30); ?> <br>
                            <i class="fas fa-info-circle"></i> <?php echo substr($user->description,0,98); ?>
                        </p>
                    </div>
                </div>
            </a>
            @endforeach


            @foreach($users as $user)
            <a href="/users/{{$user->name}}" style="text-decoration:none" class="hidden-xs-down">
                <div class="card border-dark mb-3 d-block d-sm-none" style="margin-left:14px;">
                    <div class="card-header">{{$user->full_name}}</div>
                    <div class="card-body text-dark">
                        <img src="{{asset('storage/propics/'.$user->propic)}}" width="150" height="150"
                            style="object-fit: cover;" class="card-img-top " alt="...">
                        <h5 class="card-title">{{$user->title}}</h5>
                        <p class="card-text"><i class="fas fa-map-marker-alt"></i>
                            <?php echo substr($user->address,0,25); ?> <br>
                            <i class="fas fa-info-circle"></i> <?php echo substr($user->description,0,100); ?>
                        </p>
                    </div>
                </div>
            </a>
            @endforeach


         





        </div>
    </div>
</div>

@endsection
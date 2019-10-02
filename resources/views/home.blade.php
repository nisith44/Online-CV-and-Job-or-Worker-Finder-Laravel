@extends('layouts.navbar')

@section('title', $userdata->full_name)

@section('content')

<div class="container">
    <div class="row">
        <!-- side bar -->
        <div class="col-md-3">
            <a href="/edit-profile" class="btn btn-primary btn-lg btn-block">UPDATE PROFILE</a href="/edit-profile">
            <br>
            <div class="card border-dark">
                <img src="{{asset('storage/propics/'.$userdata->propic)}}" class="card-img-top " alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$userdata->full_name}}</h5>
                    <p class="card-text"><b>Contact Information</b>
                        <br> <i class="fas fa-phone-alt"></i> {{$userdata->tel}}
                        <br> <i class="fas fa-envelope"></i> {{$userdata->email}}
                        <br> <i class="fas fa-map-marker-alt"></i> {{$userdata->address}} </p>
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    <!-- AddToAny BEGIN -->
                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                        <a class="a2a_button_facebook"></a>
                        <a class="a2a_button_whatsapp"></a>
                        <a class="a2a_button_twitter"></a>
                        <a class="a2a_button_email"></a> 
                        <a style="margin-top:10px;" class="a2a_button_google_gmail"></a>
                        <a style="margin-top:10px;" class="a2a_button_sms"></a>
                    </div>
                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                    <!-- AddToAny END -->
                </div>
            </div>
            <br>
            <div class="card text-white bg-dark mb-3" style="">
                <div class="card-header">
                    <h5 class="card-title">MY SKILLS</h5>
                </div>
                <div class="card-body">

                    @foreach($skills as $skill)
                    <p class="card-text"><i class="fas fa-check"></i> {{$skill->skill}} </p>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- side bar end -->



        <div class="col-md-9">



            @if($userdata->id==Auth::id())

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{$userdata->pageviews}}</strong> People Seen your CV profile
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif


            <div class="card border-dark">
                <h5 class="card-header"><i class="far fa-user-circle"></i> Personal Information</h5>
                <div class="card-body">
                    @foreach($personalinfos as $personalinfo)
                    <h5 class="card-title"><i class="fas fa-chevron-circle-right fa-lg text-primary"></i>
                        {{$personalinfo->title}}</h5>
                    <p class="card-text"><?php echo $personalinfo->description ?></p>
                    @endforeach

                </div>
            </div><br>

            <div class="card border-dark">
                <h5 class="card-header"><i class="fas fa-graduation-cap"></i> Educational Information</h5>
                <div class="card-body">
                    @foreach($eduinfos as $eduinfo)
                    <h5 class="card-title"><i class="fas fa-chevron-circle-right fa-lg text-primary"></i>
                        {{$eduinfo->title}}</h5>
                    <p class="card-text"><?php echo $eduinfo->description ?></p>
                    @endforeach
                </div>
            </div><br>

            <div class="card border-dark">
                <h5 class="card-header"><i class="fas fa-user-tie"></i> Professional qualifications</h5>
                <div class="card-body">
                    @foreach($proinfos as $proinfo)
                    <h5 class="card-title"><i class="fas fa-chevron-circle-right fa-lg text-primary"></i>
                        {{$proinfo->title}}</h5>
                    <p class="card-text"><?php echo $proinfo->description ?></p>
                    @endforeach
                </div>
            </div><br>


            <div class="card border-dark">
                <h5 class="card-header"><i class="fas fa-briefcase"></i> Working Experience</h5>
                <div class="card-body">
                    @foreach($works as $work)
                    <h5 class="card-title"><i class="fas fa-chevron-circle-right fa-lg text-primary"></i>
                        {{$work->title}}</h5>
                    <p class="card-text"><?php echo $work->description ?></p>
                    @endforeach
                </div>
            </div><br>


            <div class="card border-dark">
                <h5 class="card-header"><i class="fas fa-rocket"></i> Already Did Projects</h5>
                <div class="card-body">
                    @foreach($projects as $project)
                    <h5 class="card-title"><i class="fas fa-chevron-circle-right fa-lg text-primary"></i>
                        {{$project->title}}</h5>
                    <p class="card-text"><?php echo $project->description ?></p>
                    Download : <a target="_blank" href="{{$project->url}}">{{$project->url}}</a> <br><br>
                    @endforeach
                </div>
            </div><br>


        </div>
    </div>
</div>

@endsection
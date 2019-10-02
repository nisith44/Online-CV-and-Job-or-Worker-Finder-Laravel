@extends('layouts.navbar')

@section('title', 'Edit CV Profile')

@section('content')

<form action="/update" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="container">
        <div class="row">
            <!-- side bar -->
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary btn-lg btn-block">SAVE CHANGES</button> <br>
                <div class="card border-dark">

                    <img src="{{asset('storage/propics/'.$userdata->propic)}}" class="card-img-top" alt="...">

                    <div class="card-body">
                        <label class="custom-file-upload">
                            <input type="file" name="img" id="">
                            Upload Profile Photo
                        </label>

                        <style>
                        input[type="file"] {
                            display: none;
                        }

                        .custom-file-upload {
                            border: 1px solid #ccc;
                            display: inline-block;
                            padding: 6px 12px;
                            cursor: pointer;
                            width:100%;
                        }
                        </style>

                        <input type="text" name="fullname" value="{{$userdata->full_name}}" class="form-control"
                            placeholder="Full Name">
                        <p class="card-text"><b>Contact Information</b>
                            <input type="text" name="tel" value="{{$userdata->tel}}"
                                class="form-control form-control-sm" placeholder="Phone No">
                            <input type="text" name="email" value="{{$userdata->email}}"
                                class="form-control form-control-sm" placeholder="Email" readonly>
                            <input type="text" name="address" value="{{$userdata->address}}"
                                class="form-control form-control-sm" placeholder="Address"> <br>
                            <button  type="submit" class="btn btn-primary btn-block">SAVE CHANGES</button>
                    </div>
                </div>
                <br>

                <div class="card text-white bg-dark mb-3" style="">
                    <div class="card-header">
                        <h5 class="card-title">MY SKILLS</h5>
                    </div>
                    <div class="card-body">

                        @foreach($skills as $skill)
                        <p class="card-text"><a href="/delskill/{{$skill->id}}" data-toggle="tooltip"
                                data-placement="top" title="Delete Skill"
                                onclick="return confirm('Are you sure Do you Want to Delete This Skill?');"
                                class="text-danger" style="padding:2px 2px 2px 2px;"> <i
                                    class="fas fa-times-circle fa-lg"></i> </a> {{$skill->skill}} </p>

                        @endforeach
                    </div>
                    <div class="text-center">
                        <button type="button" style="width:80%;" class="btn btn-primary centered" data-toggle="modal"
                            data-target="#exampleModal">Add New Skill</button>
                        <br><br>
                    </div>
                </div>
            </div>


            <!-- side bar end -->



            <div class="col-md-9">
                <div class="card border-dark">
                    <h5 class="card-header"><i class="far fa-user-circle"></i> Personal Information</h5>
                    <div class="card-body">
                        @foreach($personalinfos as $personalinfo)
                        <h5 class="card-title">
                            <a data-toggle="tooltip" data-placement="top" title="Delete Personal Info"
                                onclick="return confirm('Are you sure Do you Want to Delete This?');"
                                href="/delpersonalinfo/{{$personalinfo->id}}" class="text-danger"> <i
                                    class="fas fa-times-circle fa-lg"></i> </a>
                            <a href="" class="text-success" data-pid="{{$personalinfo->id}}"
                                data-title="{{$personalinfo->title}}" data-description="{{$personalinfo->description}}"
                                data-toggle="modal" data-target="#editpinfo"><i
                                    class="fas fa-check-circle fa-lg"></i></a>
                            {{$personalinfo->title}}</h5>

                        <p class="card-text"><?php echo $personalinfo->description ?></p>
                        @endforeach

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addpinfo">
                            Add New Personal Info
                        </button>
                    </div>
                </div><br>

                <div class="card border-dark">
                    <h5 class="card-header"><i class="fas fa-graduation-cap"></i> Educational Information</h5>
                    <div class="card-body">
                        @foreach($eduinfos as $eduinfo)
                        <h5 class="card-title"><a data-toggle="tooltip" data-placement="top"
                                title="Delete Educational Info"
                                onclick="return confirm('Are you sure Do you Want to Delete This?');"
                                href="/deleduinfo/{{$eduinfo->id}}" class="text-danger"> <i
                                    class="fas fa-times-circle fa-lg"></i> </a>
                            <a href="" class="text-success" data-pid="{{$eduinfo->id}}" data-title="{{$eduinfo->title}}"
                                data-description="{{$eduinfo->description}}" data-toggle="modal"
                                data-target="#editeduinfo"><i class="fas fa-check-circle fa-lg"></i></a>
                            {{$eduinfo->title}}</h5>
                        <p class="card-text"><?php echo $eduinfo->description ?></p>
                        @endforeach

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addeduinfo">
                            Add New Educational Info
                        </button>
                    </div>
                </div><br>

                <div class="card border-dark">
                    <h5 class="card-header"><i class="fas fa-user-tie"></i> Professional qualifications</h5>
                    <div class="card-body">
                        @foreach($proinfos as $proinfo)
                        <h5 class="card-title"><a data-toggle="tooltip" data-placement="top"
                                title="Delete Professional Info"
                                onclick="return confirm('Are you sure Do you Want to Delete This?');"
                                href="/delproinfo/{{$proinfo->id}}" class="text-danger"> <i
                                    class="fas fa-times-circle fa-lg"></i> </a>
                            <a href="" class="text-success" data-pid="{{$proinfo->id}}" data-title="{{$proinfo->title}}"
                                data-description="{{$proinfo->description}}" data-toggle="modal"
                                data-target="#editproinfo"><i class="fas fa-check-circle fa-lg"></i></a>
                            {{$proinfo->title}}</h5>
                        <p class="card-text"><?php echo $proinfo->description ?></p>
                        @endforeach

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addproinfo">
                            Add New Professional Info
                        </button>
                    </div>
                </div><br>



                <div class="card border-dark">
                    <h5 class="card-header"><i class="fas fa-briefcase"></i> Working Experience</h5>
                    <div class="card-body">
                        @foreach($works as $work)
                        <h5 class="card-title"><a data-toggle="tooltip" data-placement="top"
                                title="Delete Professional Info"
                                onclick="return confirm('Are you sure Do you Want to Delete This?');"
                                href="/delwork/{{$work->id}}" class="text-danger"> <i
                                    class="fas fa-times-circle fa-lg"></i> </a>
                            <a href="" class="text-success" data-pid="{{$work->id}}" data-title="{{$work->title}}"
                                data-description="{{$work->description}}" data-toggle="modal" data-target="#editwork"><i
                                    class="fas fa-check-circle fa-lg"></i></a>
                            {{$work->title}}</h5>
                        <p class="card-text"><?php echo $work->description ?></p>
                        @endforeach

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addwork">
                            Add New Working Experience Info
                        </button>
                    </div>
                </div><br>



                <div class="card border-dark">
                    <h5 class="card-header"><i class="fas fa-rocket"></i> Already Did Projects</h5>
                    <div class="card-body">
                        @foreach($projects as $project)
                        <h5 class="card-title"><a data-toggle="tooltip" data-placement="top"
                                title="Delete Educational Info"
                                onclick="return confirm('Are you sure Do you Want to Delete This?');"
                                href="delproject/{{$project->id}}" class="text-danger"> <i
                                    class="fas fa-times-circle fa-lg"></i> </a>
                            <a href="" class="text-success" data-pid="{{$project->id}}" data-url="{{$project->url}}"
                                data-title="{{$project->title}}" data-description="{{$project->description}}"
                                data-toggle="modal" data-target="#editproject"><i
                                    class="fas fa-check-circle fa-lg"></i></a>
                            {{$project->title}}</h5>
                        <p class="card-text"><?php echo $project->description ?></p>
                        Download : <a target="_blank" href="{{$project->url}}"><?php echo $project->url ?></a> <br><br>
                        @endforeach

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addproject">
                            Add New Project Info
                        </button>
                    </div>
                </div><br>


            </div>
        </div>
    </div>

</form>

<!-- add skill modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <form action="/addskill" method="post">
        {{csrf_field()}}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Skill</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" name="skill" id="" placeholder="Enter Your New Skill">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- add skill modal end -->

<!-- add pinfo modal -->
<div class="modal fade" id="addpinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <form action="/addpinfo" method="post">
        {{csrf_field()}}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New personal info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" name="title" id="" placeholder="Enter Your Title"><br>

                    <textarea class="form-control" name="description" id="" placeholder="Enter Your description"
                        rows="10"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- add pinfo modal end -->


<!-- add edu info modal -->
<div class="modal fade" id="addeduinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <form action="/addeduinfo" method="post">
        {{csrf_field()}}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Educational Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" name="title" id="" placeholder="Enter Your Title"><br>
                    <textarea class="form-control" name="description" id="" placeholder="Enter Your description"
                        rows="10"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- add edu info modal end -->


<!-- add work info modal -->
<div class="modal fade" id="addwork" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="/addwork" method="post">
        {{csrf_field()}}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Working Experience Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" name="title" id="" placeholder="Enter Your Title"><br>
                    <textarea class="form-control" name="description" id="" placeholder="Enter Your description"
                        rows="10"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- add work info modal end -->


<!-- add project info modal -->
<div class="modal fade" id="addproject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <form action="/addproject" method="post">
        {{csrf_field()}}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Educational Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" name="title" id="" placeholder="Enter Your Title"><br>
                    <textarea class="form-control" name="description" id="" placeholder="Enter Your description"
                        rows="10"></textarea> <br>
                    <input type="text" class="form-control" name="url" id="" placeholder="Enter Your URL">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- add project info modal end -->


<!-- add pro info modal -->
<div class="modal fade" id="addproinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <form action="/addproinfo" method="post">
        {{csrf_field()}}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Professional Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" name="title" id="" placeholder="Enter Your Title"><br>
                    <textarea class="form-control" name="description" id="" placeholder="Enter Your description"
                        rows="10"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- add pro info modal end -->


<!-- edit pinfo modal -->
<div class="modal fade" id="editpinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <form action="/editpinfo" method="post">

        {{csrf_field()}}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit personal info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" name="id" id="id" hidden>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Your Title"><br>
                    <textarea class="form-control" name="description" id="description"
                        placeholder="Enter Your description" rows="10"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- edit pinfo modal end -->


<!-- edit edu info modal -->
<div class="modal fade" id="editeduinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <form action="/editeduinfo" method="post">

        {{csrf_field()}}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Educational info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" name="id" id="id" hidden>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Your Title"><br>
                    <textarea class="form-control" name="description" id="description"
                        placeholder="Enter Your description" rows="10"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- edit edu info modal end -->


<!-- edit work info modal -->
<div class="modal fade" id="editwork" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <form action="/editwork" method="post">

        {{csrf_field()}}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Working Experience info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" name="id" id="id" hidden>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Your Title"><br>
                    <textarea class="form-control" name="description" id="description"
                        placeholder="Enter Your description" rows="10"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- edit work info modal end -->


<!-- edit project info modal -->
<div class="modal fade" id="editproject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <form action="/editproject" method="post">

        {{csrf_field()}}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Educational info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" name="id" id="id" hidden>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Your Title"><br>
                    <textarea class="form-control" name="description" id="description"
                        placeholder="Enter Your description" rows="10"></textarea><br>
                    <input type="text" class="form-control" name="url" id="url" placeholder="Enter Your URL">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- edit project info modal end -->


<!-- edit pro info modal -->
<div class="modal fade" id="editproinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <form action="/editproinfo" method="post">

        {{csrf_field()}}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Professional info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" name="id" id="id" hidden>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Your Title"><br>
                    <textarea class="form-control" name="description" id="description"
                        placeholder="Enter Your description" rows="10"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- edit pro info modal end -->


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

<!-- edit personal info auto populate -->
<script>
$('#editpinfo').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget)
    var title = button.data('title')
    var description = button.data('description')
    description = description.replace(/(<|&lt;)br\s*\/*(>|&gt;)/g, " ");
    var id = button.data('pid')

    var modal = $(this)

    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #title').val(title)
    modal.find('.modal-body #description').val(description)
})
</script>
<!-- edit personal info auto populate end -->

<!-- edit educational info auto populate -->
<script>
$('#editeduinfo').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget)
    var title = button.data('title')
    var description = button.data('description')
    description = description.replace(/(<|&lt;)br\s*\/*(>|&gt;)/g, " ");
    var id = button.data('pid')

    var modal = $(this)

    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #title').val(title)
    modal.find('.modal-body #description').val(description)
})
</script>
<!-- edit educational info auto populate end -->


<!-- edit work info auto populate -->
<script>
$('#editwork').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget)
    var title = button.data('title')
    var description = button.data('description')
    description = description.replace(/(<|&lt;)br\s*\/*(>|&gt;)/g, " ");
    var id = button.data('pid')

    var modal = $(this)

    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #title').val(title)
    modal.find('.modal-body #description').val(description)
})
</script>
<!-- edit work info auto populate end -->


<!-- edit Professional info auto populate -->
<script>
$('#editproinfo').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget)
    var title = button.data('title')
    var description = button.data('description')
    description = description.replace(/(<|&lt;)br\s*\/*(>|&gt;)/g, " ");
    var id = button.data('pid')

    var modal = $(this)

    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #title').val(title)
    modal.find('.modal-body #description').val(description)
})
</script>
<!-- edit Professional info auto populate end -->


<!-- edit project info auto populate -->
<script>
$('#editproject').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget)
    var title = button.data('title')
    var description = button.data('description')
    description = description.replace(/(<|&lt;)br\s*\/*(>|&gt;)/g, " ");
    var id = button.data('pid')
    var url = button.data('url')

    var modal = $(this)

    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #title').val(title)
    modal.find('.modal-body #description').val(description)
    modal.find('.modal-body #url').val(url)
})
</script>
<!-- edit project info auto populate end -->


<script>
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})
</script>

@endsection
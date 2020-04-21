@extends('front.layouts.app')
@section('content')
    <div class="trailer ">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default" id="trailer">
                    <div class="panel-heading" >Trailer Movies</div>
                    <div class="panel-body">
                        <div class="row">
                            @foreach($movies as $movie)
                                <div class="col-sm-3 col-md-3">
                                    <div class="thumbnail">
                                        <a href=""><img src="{{url(\Storage::url($movie->poster))}}" alt="..."></a>
                                        <div class="caption">
                                            <h4><a href="#">{{$movie->title}}</a> </h4>
                                            <p>{{$movie->storyline}}</p>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="btn btn-dark">Show all Trailer</button>
                    </div>
                </div>
                <div class="panel panel-default" id="trailer1">
                    <div class="panel-heading" >Trailer Series</div>
                    <div class="panel-body">
                        <div class="row">
                            @foreach($series as $serie)
                                <div class="col-sm-3 col-md-3">
                                    <div class="thumbnail">
                                        <a href=""><img src="{{url(\Storage::url($serie->poster))}}" alt="..."></a>
                                        <div class="caption">
                                            <h4><a href="#">{{$serie->title}}</a> </h4>
                                            <p>{{$serie->storyline}}</p>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="btn btn-dark">Show all Trailer</button>
                    </div>
                </div>
                <div class="panel panel-default" id="trailer2">
                    <div class="panel-heading" >New </div>
                    <div class="panel-body">
                        <div class="row">
                            @foreach($new_titles as $new)
                            <div class="col-sm-12 col-md-12">
                                <div class="thumbnail">
                                    <video src="{{url(\Storage::url($new->poster))}}" controls style="width: 900px"></video>
                                    <div class="caption">
                                        <h4><a href="#">{{$new->title}}</a> </h4>
                                        <p>{{$new->storyline}}</p>

                                    </div>
                                </div>
                            </div>
                                @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-3">
                <div class="panel panel-default" id="sidebare">
                    <div class="panel-heading" >News</div>
                    <div class="panel-body">
                        <h4><i class="fa fa-calendar-o" aria-hidden="true"></i> Opening This Week</h4>
                        <ul class="list-group">
                            <li class="list-group-item"><a href="#">Cras justo odio</a></li>
                            <li class="list-group-item"><a href="#">Dapibus ac facilisis in</a></li>
                            <li class="list-group-item"><a href="#">Morbi leo risus</a></li>
                            <li class="list-group-item"><a href="#">Porta ac consectetur ac</a></li>
                            <li class="list-group-item"><a href="#">Porta ac consectetur ac</a></li>
                            <li class="list-group-item"><a href="#">Porta ac consectetur ac</a></li>
                            <li class="list-group-item"><a href="#">Porta ac consectetur ac</a></li>
                            <li class="list-group-item"><a href="#">Vestibulum at eros</a></li>
                        </ul>

                        <h4><i class="fa fa-video-camera" aria-hidden="true"></i> Now Playing (Box Office)</h4>
                        <ul class="list-group">
                            <li class="list-group-item"><a href="#">Cras justo odio</a></li>
                            <li class="list-group-item"><a href="#">Dapibus ac facilisis in</a></li>
                            <li class="list-group-item"><a href="#">Morbi leo risus</a></li>
                            <li class="list-group-item"><a href="#">Porta ac consectetur ac</a></li>
                            <li class="list-group-item"><a href="#">Porta ac consectetur ac</a></li>
                            <li class="list-group-item"><a href="Porta ac consectetur ac"></a></li>
                            <li class="list-group-item"><a href="#">Porta ac consectetur ac</a></li>
                            <li class="list-group-item"><a href="#">Vestibulum at eros</a></li>
                        </ul>

                        <h4><i class="fa fa-camera-retro" aria-hidden="true"></i> Coming Soon</h4>
                        <ul class="list-group">
                            <li class="list-group-item"><a href="#">Cras justo odio</a></li>
                            <li class="list-group-item"><a href="#">Dapibus ac facilisis in</a></li>
                            <li class="list-group-item"><a href="#">Morbi leo risus</a></li>
                            <li class="list-group-item"><a href="#">Porta ac consectetur ac</a></li>
                            <li class="list-group-item"><a href="#">Porta ac consectetur ac</a></li>
                            <li class="list-group-item"><a href="#">Porta ac consectetur ac</a></li>
                            <li class="list-group-item"><a href="#">Porta ac consectetur ac</a></li>
                            <li class="list-group-item"><a href="#">Vestibulum at eros</a></li>
                        </ul>
                        <hr>
                        <h4><i class="fa fa-camera-retro" aria-hidden="true"></i> Our Favorite Trailers of the Week</h4>
                        <ul class="list-group">
                            <li class="list-group-item"><img src="{{url('/front')}}/images/1170x658.png" id="best_week" alt=""></li>

                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endsection

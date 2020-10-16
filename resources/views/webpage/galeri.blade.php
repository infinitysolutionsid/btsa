@extends('home.index')
@section('activegaleri','active')
@section('content')
<section class="content">
    <div class="content-wrap">
        <div class="container clearfix">
            @foreach ($album as $album)
            <div class="divider"><i class="icon-circle"></i></div>
            <div class="col-lg-12 text-center">
                <h3>{{$album->nama_album}}</h3>
                <p></p>
                <div class="masonry-thumbs grid-container grid-6" data-big="3" data-lightbox="gallery">
                    @foreach ($album->photo as $item)
                    <a class="grid-item" href="{!!asset('media/album/'.$item->filename)!!}"
                        data-lightbox="gallery-item"><img src="{!!asset('media/album/'.$item->filename)!!}"
                            alt="BTSA Logistics Album Documentation"></a>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

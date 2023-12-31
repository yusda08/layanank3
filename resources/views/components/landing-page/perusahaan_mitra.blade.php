<div class="title">
    <h2>Daftar Perusahaan Mitra </h2>
</div>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home">
        <ul class="framworks-list">
            @foreach($partners as $partner)
                <li class="fadeInUp">
                    <div>
                        @if($partner['logo_file'])
                            <img style="width : 60px; height : 60px" src="{{asset('/storage/'. $partner['logo_file'])}}"
                                 alt="">
                        @else
                            <img style="width : 60px; height : 60px" src="{{asset('assets/images/favicon.png')}}"
                                 alt="">
                        @endif
                    </div>
                    <h6>{{$partner['company_name']}}</h6>
                </li>
            @endforeach
        </ul>
    </div>
</div>

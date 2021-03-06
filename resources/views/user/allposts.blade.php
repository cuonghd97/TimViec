@extends('user.navbar')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-typeahead/2.10.6/jquery.typeahead.css" />
@section('pgContent')
<div id="pgContent" class="clearfix">
    <div class="rvn-menu-bar hidden-xs">
        <form class="frmSearch" action="{{ route('usersearch') }}" method="POST">
            {{ csrf_field() }}
            <div class="container">
                <div class="rvn-menu-cate">
                    <select id='home_category' name='search_loca' class='chosen-select form-control'>
                        <option value='Toàn quốc...'>Toàn quốc...</option>
                        @foreach ($sprovinces as $item)
                        <option value="{{ $item->province_name }}">{{ $item->province_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="rvn-menu-cate">
                    <select id='home_category' name='search_kat' class='chosen-select form-control'>
                        <option value='Chọn...'>Chọn...</option>
                        @foreach ($swork as $item)
                        <option value="{{ $item->work_type }}">{{ $item->work_type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="rvn-menu-search">
                    <div class="input-group">
                        <form id="form-country_v1" name="form-country_v1">
                            <div class="typeahead__container">
                                <div class="typeahead__field">
                                    <div class="typeahead__query">
                                        <input class="form-control js-typeahead-country_v1" name="searchdata" id="searchdata"
                                            type="search" id="kw" placeholder="Tìm kiếm..." autocomplete="off">
                                    </div>
                                    {{-- <span class="typeahead__button input-group-btn">
                                        <button type="submit" class="btn btn-default" style="width:55px; height: 34px;">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span> --}}
                                </div>
                            </div>
                        </form>
                        <!--<input type="search" name="kw" id="kw searchbar" class="form-control typeahead search-input"
                            placeholder="Nhập thông tin cần tìm...">-->
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">Tìm kiếm!</button>
                        </span>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="clearfix"></div>
    <div class="container pgBody">
        <div class="rvn-home-category ">
            <div class="rows">
                <div class="col-md-12">
                    <div class="cate-title " style="float:left" id="home-title"><a href="#"><i class="fa fa-rss fa-fw"></i></a>
                        Chuyên mục đăng tin <span class="hidden-xs" id="home-city-name"></span></div>
                    <div class="autoSearch pull-right visible-xs">
                        <form action="/tim-kiem" class="search-form frmSearch">
                            <div class="form-group has-feedback" id="autoSearch">
                                <label for="search" class="sr-only">Search</label>
                                <input type="text" class="form-control typeahead" name="kw" data-provide="typeahead" id="search"
                                    placeholder="Tìm kiếm">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                            <input type="hidden" name="search_place" value="">
                        </form>
                    </div>
                    <div class="clearfix"></div>
                    <div class="cate-icons rows " id="cateicons">
                        @foreach ($swork as $item)
                        <div class='cate-group main-cate-icon' style="height: auto;">
                            <a href='{{ route('bywork', ['work' => $item->work_type]) }}'>
                                <div>
                                    <img src="{{ asset($item->image) }}" style="border-radius: 25px; width: 150px; height: 150px;">
                                </div>
                                <div class='cate-name'>{{ $item->work_type }}</div>
                            </a>
                        </div>
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>
        </div>
        <div class="clearfix"></div>
        <div class="latest-items clearfix"><i class="fa fa-eye fa-fw red"></i> Bài có lượt xem nhiều nhất</div>
        <div id="LISTITEMS">
            @foreach ($mostview as $item)
            <div class="listItem" style="float: left;">
                <a href="{{ action('postController@viewpost', $item->post_id) }}" class="reload">
                    <div class="rounded-bo clearfix">
                        <div class="rvn-item-image text-center">
                            <img src="{{ asset($item->image) }}" width="90" style="height: 55px;">
                        </div>
                        <div class="rvn-item-content">
                            <div class="rvn-item-date">
                                <i class="fa fa-paragraph fa-fw"></i>
                                {{$item->title}}</div>
                            <div class="rvn-item-date">
                                <i class="fa fa-compass fa-fw"></i> {{ $item->province }}
                            </div>
                            <div class="rvn-item-date">
                                <i class="fa fa-clock-o fa-fw"></i> {{ $item->created_at }}
                            </div>
                            <div class="rvn-item-date ">
                                <i class="fa fa-eye fa-fw"></i> {{ $item->views }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="cate-subs">
        </div>
        <div class="rows">
            <div class="rvn-items col-md-12">
                <form method="post" name="frmLocationsFilter" id="frmLocationsFilter">

                    <input type="hidden" name="scatid" value="0" />
                </form>

                <div class="clearfix"><a id="LcAnchor" name=""></a></div>
                <div class="clearfix">
                    <p>&nbsp;</p>
                </div>
                <div class="latest-items clearfix">
                    <i class="fa fa-stack-overflow fa-fw"></i> Tin tìm việc mới</div>
                <div id="LISTITEMS">
                        @foreach ($posts as $item)
                    <div class="listItem" style="float: left;">
                        <a href="{{ action('postController@userviewpost', $item->post_id) }}" class="reload">
                            <div class="rounded-bo clearfix">
                                <div class="rvn-item-image text-center">
                                    <img src="{{ asset($item->image) }}" class="rounded-bo" width="90" style="height: 55px;">
                                </div>
                                <div class="rvn-item-content">
                                    <div class="rvn-item-title">{{$item->title}}</div>
                                    <div class="rvn-item-date">
                                        <i class="fa fa-compass"></i> {{ $item->province }}
                                    </div>
                                    <div class="rvn-item-date">
                                        <i class="fa fa-clock-o fa-fw"></i> {{ $item->created_at }}
                                    </div>
                                    <div class="rvn-item-date ">
                                        <i class="fa fa-eye fa-fw"></i> {{ $item->views }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="clearfix"></div>
                {!! $posts->links() !!}
                </form>

            </div>
            <div class="rows hidden-xs">
                {{-- <div class="postad-category clearfix">ĐĂNG TIN NHANH THEO CHUYÊN MỤC</div>
                <div id="postad-icons" class="clearfix">
                    @foreach ($swork as $item)
                    <a href='{{ route('postbywork', ['work' => $item->work_type]) }}'>
                        <div class='cate-group w20-md-w50-xs'>
                            <div>
                                <img src="{{ asset($item->image) }}" class="img-thumbnail" style="width: 200px; height: 200px; border-radius: 25px;">
                            </div>
                            <div class='cate-name'>{{ $item->work_type }}</div>
                        </div>
                    </a>
                    @endforeach
                    <div class="clearfix"></div>
                </div> --}}
            </div>
            <div class="rows hidden-xs">
                <div class="postad-category clearfix">XEM TIN THEO DANH MỤC</div>
                <div class="full-category clearfix">
                     @foreach ($swork as $item)
                    <div class="category-list">
                        <div class="cate-name">
                            <a href='{{ route('byworkuser', ['work' => $item->work_type]) }}'>
                                {{ $item->work_type }} ({{ $item->count }} bài đăng)
                            </a>
                        </div>
                        <ul class="category-ul">
                            @php
                                $wt = $item->work_type
                            @endphp
                            @foreach ($workdetail as $item)
                            @if ( $wt == $item->work_id )
                            <li>
                                <a href='{{ route('byworkuser', ['work' => $item->work_more]) }}'>{{$item->work_more}} ({{ $item->count }}   bài đăng)</a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="send-resp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="form-inline">Thông báo!</div>
                </div>
                <div class="modal-body" id="modalTextResp">
                </div>
                <div class="modal-footer">
                    <a class="btn btn-danger btn-ok" data-dismiss="modal">Ok</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-typeahead/2.10.6/jquery.typeahead.js"></script>
<script>
    var list = []
    var m = $;
    $.ajax({
        url: '/search/title',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $.each(data, function (key, entry) {
                list.push(entry.title)
            })

            m.typeahead({
                input: '.js-typeahead-country_v1',
                order: "desc",
                source: {
                    data: list
                },
                callback: {
                    onInit: function (node) {
                        console.log('Typeahead Initiated on ' + node.selector);
                    }
                }
            });

        }
    })
</script>
@endsection

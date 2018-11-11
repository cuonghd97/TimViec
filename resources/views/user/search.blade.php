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
                <div class="col-md-9">
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
                            <div class='cate-group main-cate-icon' style="margin-top: 40px;">
                                <a href='{{ route('bywork', ['work' => $item->work_type]) }}'>
                                    <div>
                                        <img src="{{ asset($item->image) }}" style="border-radius: 25px; width: 100px; height: 100px;">
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
        <div class="rows hidden" id="home_cate_paging2">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li id="view_cate">Loading...</li>
                    <li id="view_subcate" class="active">Tất cả mục phụ</li>
                </ol>
            </div>
        </div>
        <div class="cate-subs">
        </div>
        <div class="rows">
            <div class="rvn-items col-md-12">
                <form method="post" name="frmLocationsFilter" id="frmLocationsFilter">
                    <div id="locFilterDiv" class="visible-xs"><select id='locFilter' name='locFilter' class='chosen-select form-control'>
                            <option value='0'>Toàn quốc</option>
                            <option value='11'>Hồ Chí Minh</option>'<option value='1'>Hà Nội</option>'<option value='4'>Đà
                                Nẵng</option>'<option value='53'>Hải Phòng</option>'<option value='250'>Bình Dương</option>'<option
                                value='210'>Cần Thơ</option>'<option value='14'>Khánh Hòa</option>'<option value='195'>An
                                Giang</option>'<option value='233'>Bình Phước</option>'<option value='9'>Bình Thuận</option>'<option
                                value='238'>Bình Định</option>'<option value='228'>Bạc Liêu</option>'<option value='268'>Bắc
                                Giang</option>'<option value='269'>Bắc Kạn</option>'<option value='260'>Bắc Ninh</option>'<option
                                value='254'>Bến Tre</option>'<option value='523'>Cao Bằng</option>'<option value='192'>Cà
                                Mau</option>'<option value='181'>Đắk Lắk</option>'<option value='784'>Đắk Nông</option>'<option
                                value='216'>Đồng Nai</option>'<option value='71'>Đồng Tháp</option>'<option value='792'>Điện
                                Biên</option>'<option value='72'>Gia Lai</option>'<option value='77'>Hà Giang</option>'<option
                                value='109'>Hà Nam</option>'<option value='98'>Hà Tĩnh</option>'<option value='92'>Hải
                                Dương</option>'<option value='540'>Hậu Giang</option>'<option value='130'>Hoà Bình</option>'<option
                                value='2'>Huế</option>'<option value='141'>Hưng Yên</option>'<option value='154'>Kiên
                                Giang</option>'<option value='689'>Kon Tum</option>'<option value='175'>Lai Châu</option>'<option
                                value='162'>Lào Cai</option>'<option value='285'>Lâm Đồng</option>'<option value='59'>Lạng
                                Sơn</option>'<option value='294'>Long An</option>'<option value='380'>Nam Định</option>'<option
                                value='511'>Nghệ An</option>'<option value='520'>Ninh Bình</option>'<option value='392'>Ninh
                                Thuận</option>'<option value='396'>Phú Thọ</option>'<option value='6'>Phú Yên</option>'<option
                                value='416'>Quảng Bình</option>'<option value='424'>Quảng Nam</option>'<option value='438'>Quảng
                                Ngãi</option>'<option value='451'>Quảng
                                Ninh</option>'<option value='465'>Quảng Trị</option>'<option value='514'>Sóc Trăng</option>'<option
                                value='501'>Sơn
                                La</option>'<option value='495'>Tây Ninh</option>'<option value='348'>Thanh Hoá</option>'<option
                                value='485'>Thái Bình</option>'<option value='474'>Thái Nguyên</option>'<option value='341'>Tiền
                                Giang</option>'<option value='332'>Trà
                                Vinh</option>'<option value='314'>Tuyên
                                Quang</option>'<option value='277'>Vũng Tàu</option>'<option value='321'>Vĩnh Long</option>'<option
                                value='186'>Vĩnh Phúc</option>'<option value='323'>Yên Bái</option>'<option value='903'>Các
                                tỉnh khác</option>'
                        </select></div>
                    <input type="hidden" name="scatid" value="0" />
                </form>

                <div class="clearfix"><a id="LcAnchor" name=""></a></div>
                <div class="clearfix">
                    <p>&nbsp;</p>
                </div>
                <div class="latest-items clearfix"><i class="fa fa-stack-overflow fa-fw"></i> Tin tìm việc mới</div>
                <div id="LISTITEMS">
                        @foreach ($posts as $item)
                    <div class="listItem" style="float: left;">
                        <a href="{{ action('postController@userviewpost', $item->id) }}" class="reload">
                            <div class="rounded-bo clearfix">
                                <div class="rvn-item-image text-center">
                                    <img src="{{ asset($item->image) }}" class="rounded-bo" width="90" style="height: 90px;">
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
                <div class="postad-category clearfix">ĐĂNG TIN NHANH THEO CHUYÊN MỤC</div>
                <div id="postad-icons" class="clearfix">
                    @foreach ($swork as $item)
                    <a href='/dang-tin-11-Nha-cua-Dat-dai'>
                        <div class='cate-group w20-md-w50-xs'>
                            <div>
                                <img src="{{ asset($item->image) }}" class="img-thumbnail" style="width: 200px; height: 200px; border-radius: 25px;">
                            </div>
                            <div class='cate-name'>{{ $item->work_type }}</div>
                        </div>
                    </a>
                    @endforeach
                    <div class="clearfix"></div>
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
<footer class="footer">
    <div class="container">
        <div class="rows ftr-4cols hidden-xs clearfix">
            <div class="col-md-3 col-sm-4">
                <div class="ftr-title">Thông tin liên hệ</div>

            </div>
            <div class="col-md-3 col-sm-4">
                <div class="ftr-title">Thông tin về trang web</div>
            </div>
            <div class="col-md-3 col-sm-4">
                <div class="ftr-title">Hướng dẫn</div>
            </div>
            <div class="col-md-3 hidden-sm">
                <div class="ftr-title">Liên kết ưu tiên</div>
            </div>
        </div>
        <div class="rows hidden-xs clearfix">
            <div class="col-md-3 col-sm-4">

                <div class="ftr-content">
                    Địa chỉ: Nguyên Xá, Minh Khai, Bắc Từ Liêm, Hà Nội<br>ĐT: 0343944610<br>Email: <a href="mailto:duccuongdc97@gmail.com"
                        class="" classname="" target="_blank" name="">duccuongdc97@gmail.com</a>
                    <div class="fb-icon"><a target="_blank" href="https://www.facebook.com/duccuongdc97">
                            <i class="fa fa-facebook-official fa-2x"></i>
                        </a>
                    </div>
                </div>

            </div>
            <div class="col-md-3 col-sm-4">
                <div class="ftr-content">
                    <div><a href="/faq25/Quy-che-hoat-dong.html"><i class="fa fa-caret-right fa-fw"></i> Quy chế hoạt
                            động</a></div>
                    <div><a href="/faq23/Chinh-sach-bao-mat-thong-tin.html"><i class="fa fa-caret-right fa-fw"></i>
                            Chính sách bảo mật thông tin</a></div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4">
                <div class="ftr-content">
                    <div><a href="/faq27/Huong-dan-dang-ky-thanh-vien.html"><i class="fa fa-caret-right fa-fw"></i>
                            Hướng dẫn đăng ký thành viên</a></div>
                    <div><a href="/faq28/Huong-dan-dang-tin.html"><i class="fa fa-caret-right fa-fw"></i> Hướng dẫn
                            đăng tin</a></div>

                </div>
            </div>
        </div>
        <div class="ftr">
            <div class="ftrCopyright">
                <div class="CopyrightText">Bài tập lớn môn phát triển phần mềm hướng dịch vụ Trường Đại Học Công Nghiệp
                    Hà Nội</div>
            </div>
        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-typeahead/2.10.6/jquery.typeahead.js"></script>
<script>
    var list = []
    var m = $;
    $.ajax({
        url: 'search/title',
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
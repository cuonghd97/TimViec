@extends('user.navbar')
@section('pgContent')
<div id="pgContent" class="clearfix">
    <div class="rvn-menu-bar hidden-xs">
        <form id="frmSearchBar" class="frmSearch" action="/tim-kiem" method="get">
            <div class="container">
                <div class="rvn-menu-city" id="loca_select">
                    <select id='search_place' name='search_place' class='chosen-select form-control'>
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
                            Ngãi</option>'<option value='451'>Quảng Ninh</option>'<option value='465'>Quảng Trị</option>'<option
                            value='514'>Sóc Trăng</option>'<option value='501'>Sơn La</option>'<option value='495'>Tây
                            Ninh</option>'<option value='348'>Thanh Hoá</option>'<option value='485'>Thái Bình</option>'<option
                            value='474'>Thái Nguyên</option>'<option value='341'>Tiền Giang</option>'<option value='332'>Trà
                            Vinh</option>'<option value='314'>Tuyên Quang</option>'<option value='277'>Vũng Tàu</option>'<option
                            value='321'>Vĩnh Long</option>'<option value='186'>Vĩnh Phúc</option>'<option value='323'>Yên
                            Bái</option>'<option value='903'>Các tỉnh khác</option>'
                    </select>
                </div>
                <div class="rvn-menu-cate">
                    <select id='home_category' name='search_kat' class='chosen-select form-control'>
                        <option value='0' add-data-content="<i class='fa fa-list fa-fw' aria-hidden='true'></i> ">Tất
                            cả danh mục</option>
                        <option value='11' add-data-content="<i class='fa fa-home fa-fw' aria-hidden='true'></i> ">Nhà
                            cửa - Đất đai</option>
                        <option value='75' add-data-content="<i class='fa fa-users fa-fw' aria-hidden='true'></i> ">Việc
                            làm - Tuyển sinh</option>
                        <option value='73' add-data-content="<i class='fa fa-cogs fa-fw' aria-hidden='true'></i> ">Cơ
                            khí - Máy móc</option>
                        <option value='2' add-data-content="<i class='fa fa-television fa-fw' aria-hidden='true'></i> ">Điện
                            máy - Điện tử</option>
                        <option value='77' add-data-content="<i class='fa fa-shopping-bag fa-fw' aria-hidden='true'></i> ">Thời
                            trang - Làm đẹp</option>
                        <option value='78' add-data-content="<i class='fa fa-smile-o fa-fw' aria-hidden='true'></i> ">Đời
                            sống - Xã hội</option>
                        <option value='76' add-data-content="<i class='fa fa-car fa-fw' aria-hidden='true'></i> ">Ô
                            tô - Xe máy</option>
                        <option value='10' add-data-content="<i class='fa fa-laptop fa-fw' aria-hidden='true'></i> ">Máy
                            tính - Linh kiện</option>
                        <option value='9' add-data-content="<i class='fa fa-whatsapp fa-fw' aria-hidden='true'></i> ">Dịch
                            vụ</option>
                        <option value='74' add-data-content="<i class='fa fa-balance-scale fa-fw' aria-hidden='true'></i> ">Kinh
                            doanh</option>
                        <option value='82' add-data-content="<i class='fa fa-tags fa-fw' aria-hidden='true'></i> ">Hàng
                            hóa - Vật liệu</option>
                        <option value='98' add-data-content="<i class='fa fa-globe fa-fw' aria-hidden='true'></i> ">Công
                            nghệ thông tin</option>
                        <option value='3' add-data-content="<i class='fa fa-mobile fa-fw' aria-hidden='true'></i> ">Điện
                            thoại - Phụ kiện</option>
                        <option value='84' add-data-content="<i class='fa fa-paint-brush fa-fw' aria-hidden='true'></i> ">Mỹ
                            thuật - Thiết kế</option>
                        <option value='1' add-data-content="<i class='fa fa-cutlery fa-fw' aria-hidden='true'></i> ">Ẩm
                            thực - Thực phẩm</option>
                    </select>
                </div>
                <div class="rvn-menu-search">
                    <div class="input-group">
                        <input type="text" name="kw" id="kw" class="form-control typeahead" autocomplete="off"
                            data-provide="typeahead" placeholder="Nhập thông tin cần tìm...">
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
                    <div class="cate-title " style="float:left" id="home-title"><a href="/kenh-rss"><i class="fa fa-rss fa-fw"></i></a>
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
                        <div class='cate-group main-cate-icon'><a href='/C-11-Nha-cua-Dat-dai' class='reload'>
                                <div class='fa fa-home fa-3x' aria-hidden='true'></div>
                                <div class='cate-name'>Nhà cửa - Đất đai</div>
                            </a></div>
                        <div class='cate-group main-cate-icon'><a href='/C-75-Viec-lam-Tuyen-sinh' class='reload'>
                                <div class='fa fa-users fa-3x' aria-hidden='true'></div>
                                <div class='cate-name'>Việc làm - Tuyển sinh</div>
                            </a></div>
                        <div class='cate-group main-cate-icon'><a href='/C-73-Co-khi-May-moc' class='reload'>
                                <div class='fa fa-cogs fa-3x' aria-hidden='true'></div>
                                <div class='cate-name'>Cơ khí - Máy móc</div>
                            </a></div>
                        <div class='cate-group main-cate-icon'><a href='/C-2-Dien-may-Dien-tu' class='reload'>
                                <div class='fa fa-television fa-3x' aria-hidden='true'></div>
                                <div class='cate-name'>Điện máy - Điện tử</div>
                            </a></div>
                        <div class='cate-group main-cate-icon'><a href='/C-77-Thoi-trang-Lam-dep' class='reload'>
                                <div class='fa fa-shopping-bag fa-3x' aria-hidden='true'></div>
                                <div class='cate-name'>Thời trang - Làm đẹp</div>
                            </a></div>
                        
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-3 hidden-sm hidden-xs ">
                    <div class="loca-title">Khu vực</div>
                    <div class="loca-list" id="loca_list">
                        <div>
                            <ul class='home-location-content clearfix'>
                                <li><a href='/L11-Ho-Chi-Minh' class='reload'>Hồ Chí Minh</a></li>
                                <li><a href='/L1-Ha-Noi' class='reload'>Hà Nội</a></li>
                                <li><a href='/L4-Da-Nang' class='reload'>Đà Nẵng</a></li>
                                <li><a href='/L53-Hai-Phong' class='reload'>Hải Phòng</a></li>
                                <li><a href='/L250-Binh-Duong' class='reload'>Bình Dương</a></li>
                                <li><a href='/L210-Can-Tho' class='reload'>Cần Thơ</a></li>
                                <li><a href='/L14-Khanh-Hoa' class='reload'>Khánh Hòa</a></li>
                                <li><a href='/L195-An-Giang' class='reload'>An Giang</a></li>
                            </ul>
                        </div>
                        <div>
                            <ul class='sub-location-content clearfix'>
                                <li><a href='/L233-Binh-Phuoc' class='reload'>Bình Phước</a></li>
                                <li><a href='/L9-Binh-Thuan' class='reload'>Bình Thuận</a></li>
                                <li><a href='/L238-Binh-Dinh' class='reload'>Bình Định</a></li>
                                <li><a href='/L228-Bac-Lieu' class='reload'>Bạc Liêu</a></li>
                                <li><a href='/L268-Bac-Giang' class='reload'>Bắc Giang</a></li>
                                <li><a href='/L269-Bac-Kan' class='reload'>Bắc Kạn</a></li>
                                <li><a href='/L260-Bac-Ninh' class='reload'>Bắc Ninh</a></li>
                                <li><a href='/L254-Ben-Tre' class='reload'>Bến Tre</a></li>
                                <li><a href='/L523-Cao-Bang' class='reload'>Cao Bằng</a></li>
                                <li><a href='/L192-Ca-Mau' class='reload'>Cà Mau</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="btn-group dropdown pull-right"> <button type="button" class="btn btn-primary btn-sm"
                            data-toggle="dropdown">Các tỉnh thành khác</button> <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                            data-toggle="dropdown" aria-expanded="false"> <span class="caret"></span> <span class="sr-only">Toggle
                                Dropdown</span> </button>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            <li>
                                <ul class='up-list-locations clearfix'>
                                    <li><a href='/L11-Ho-Chi-Minh' class='reload'>Hồ Chí Minh</a></li>
                                    <li><a href='/L1-Ha-Noi' class='reload'>Hà Nội</a></li>
                                    <li><a href='/L4-Da-Nang' class='reload'>Đà Nẵng</a></li>
                                    <li><a href='/L53-Hai-Phong' class='reload'>Hải Phòng</a></li>
                                    <li><a href='/L250-Binh-Duong' class='reload'>Bình Dương</a></li>
                                    <li><a href='/L210-Can-Tho' class='reload'>Cần Thơ</a></li>
                                    <li><a href='/L14-Khanh-Hoa' class='reload'>Khánh Hòa</a></li>
                                    <li><a href='/L195-An-Giang' class='reload'>An Giang</a></li>
                                    <li><a href='/L233-Binh-Phuoc' class='reload'>Bình Phước</a></li>
                                    <li><a href='/L9-Binh-Thuan' class='reload'>Bình Thuận</a></li>
                                    <li><a href='/L238-Binh-Dinh' class='reload'>Bình Định</a></li>
                                    <li><a href='/L228-Bac-Lieu' class='reload'>Bạc Liêu</a></li>
                                    <li><a href='/L268-Bac-Giang' class='reload'>Bắc Giang</a></li>
                                    <li><a href='/L269-Bac-Kan' class='reload'>Bắc Kạn</a></li>
                                    <li><a href='/L260-Bac-Ninh' class='reload'>Bắc Ninh</a></li>
                                    <li><a href='/L254-Ben-Tre' class='reload'>Bến Tre</a></li>
                                    <li><a href='/L523-Cao-Bang' class='reload'>Cao Bằng</a></li>
                                    <li><a href='/L192-Ca-Mau' class='reload'>Cà Mau</a></li>
                                    <li><a href='/L181-Dak-Lak' class='reload'>Đắk Lắk</a></li>
                                    <li><a href='/L784-Dak-Nong' class='reload'>Đắk Nông</a></li>
                                    <li><a href='/L216-Dong-Nai' class='reload'>Đồng Nai</a></li>
                                    <li><a href='/L71-Dong-Thap' class='reload'>Đồng Tháp</a></li>
                                    <li><a href='/L792-Dien-Bien' class='reload'>Điện Biên</a></li>
                                    <li><a href='/L72-Gia-Lai' class='reload'>Gia Lai</a></li>
                                    <li><a href='/L77-Ha-Giang' class='reload'>Hà Giang</a></li>
                                    <li><a href='/L109-Ha-Nam' class='reload'>Hà Nam</a></li>
                                    <li><a href='/L98-Ha-Tinh' class='reload'>Hà Tĩnh</a></li>
                                    <li><a href='/L92-Hai-Duong' class='reload'>Hải Dương</a></li>
                                    <li><a href='/L540-Hau-Giang' class='reload'>Hậu Giang</a></li>
                                    <li><a href='/L130-Hoa-Binh' class='reload'>Hoà Bình</a></li>
                                    <li><a href='/L2-Hue' class='reload'>Huế</a></li>
                                    <li><a href='/L141-Hung-Yen' class='reload'>Hưng Yên</a></li>
                                    <li><a href='/L154-Kien-Giang' class='reload'>Kiên Giang</a></li>
                                    <li><a href='/L689-Kon-Tum' class='reload'>Kon Tum</a></li>
                                    <li><a href='/L175-Lai-Chau' class='reload'>Lai Châu</a></li>
                                    <li><a href='/L162-Lao-Cai' class='reload'>Lào Cai</a></li>
                                    <li><a href='/L285-Lam-Dong' class='reload'>Lâm Đồng</a></li>
                                    <li><a href='/L59-Lang-Son' class='reload'>Lạng Sơn</a></li>
                                    <li><a href='/L294-Long-An' class='reload'>Long An</a></li>
                                    <li><a href='/L380-Nam-Dinh' class='reload'>Nam Định</a></li>
                                    <li><a href='/L511-Nghe-An' class='reload'>Nghệ An</a></li>
                                    <li><a href='/L520-Ninh-Binh' class='reload'>Ninh Bình</a></li>
                                    <li><a href='/L392-Ninh-Thuan' class='reload'>Ninh Thuận</a></li>
                                    <li><a href='/L396-Phu-Tho' class='reload'>Phú Thọ</a></li>
                                    <li><a href='/L6-Phu-Yen' class='reload'>Phú Yên</a></li>
                                    <li><a href='/L416-Quang-Binh' class='reload'>Quảng Bình</a></li>
                                    <li><a href='/L424-Quang-Nam' class='reload'>Quảng Nam</a></li>
                                    <li><a href='/L438-Quang-Ngai' class='reload'>Quảng Ngãi</a></li>
                                    <li><a href='/L451-Quang-Ninh' class='reload'>Quảng Ninh</a></li>
                                    <li><a href='/L465-Quang-Tri' class='reload'>Quảng Trị</a></li>
                                    <li><a href='/L514-Soc-Trang' class='reload'>Sóc Trăng</a></li>
                                    <li><a href='/L501-Son-La' class='reload'>Sơn La</a></li>
                                    <li><a href='/L495-Tay-Ninh' class='reload'>Tây Ninh</a></li>
                                    <li><a href='/L348-Thanh-Hoa' class='reload'>Thanh Hoá</a></li>
                                    <li><a href='/L485-Thai-Binh' class='reload'>Thái Bình</a></li>
                                    <li><a href='/L474-Thai-Nguyen' class='reload'>Thái Nguyên</a></li>
                                    <li><a href='/L341-Tien-Giang' class='reload'>Tiền Giang</a></li>
                                    <li><a href='/L332-Tra-Vinh' class='reload'>Trà Vinh</a></li>
                                    <li><a href='/L314-Tuyen-Quang' class='reload'>Tuyên Quang</a></li>
                                    <li><a href='/L277-Vung-Tau' class='reload'>Vũng Tàu</a></li>
                                    <li><a href='/L321-Vinh-Long' class='reload'>Vĩnh Long</a></li>
                                    <li><a href='/L186-Vinh-Phuc' class='reload'>Vĩnh Phúc</a></li>
                                    <li><a href='/L323-Yen-Bai' class='reload'>Yên Bái</a></li>
                                    <li><a href='/L903-Cac-tinh-khac' class='reload'>Các tỉnh khác</a></li>
                                </ul>
                            </li>
                        </ul>
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
                    <div class="listItem clearfix">
                        <a href="{{ action('postController@viewpost', $item->id) }}" class="reload">
                            <div class="rounded-bo clearfix">
                                <div class="rvn-item-image text-center" id="itm_img6973827">
                                    <img src="{{ asset($item->image) }}" class="rounded-bo" width="90"></div>
                                <div class="rvn-item-content">
                                    <div class="rvn-item-no"><span class="badge">B</span></div>
                                    <div class="rvn-item-title">{{$item->title}}</div>
                                    <div class="rvn-item-loca" id="itm_loc6973827"></div>
                                    <div class="rvn-item-date"><i class="fa fa-clock-o fa-fw"></i>{{ $item->created_at }}<span
                                            class="rvn-item-views"><i class="fa fa-eye fa-fw"></i> {{ $item->views }}</span></div>
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
                    <a href='/dang-tin-11-Nha-cua-Dat-dai'>
                        <div class='cate-group w20-md-w50-xs'>
                            <div class='fa fa-home fa-2x' aria-hidden='true'></div>
                            <div class='cate-name'>Nhà cửa - Đất đai</div>
                        </div>
                    </a><a href='/dang-tin-75-Viec-lam-Tuyen-sinh'>
                        <div class='cate-group w20-md-w50-xs'>
                            <div class='fa fa-users fa-2x' aria-hidden='true'></div>
                            <div class='cate-name'>Việc làm - Tuyển sinh</div>
                        </div>
                    </a><a href='/dang-tin-73-Co-khi-May-moc'>
                        <div class='cate-group w20-md-w50-xs'>
                            <div class='fa fa-cogs fa-2x' aria-hidden='true'></div>
                            <div class='cate-name'>Cơ khí - Máy móc</div>
                        </div>
                    </a><a href='/dang-tin-2-Dien-may-Dien-tu'>
                        <div class='cate-group w20-md-w50-xs'>
                            <div class='fa fa-television fa-2x' aria-hidden='true'></div>
                            <div class='cate-name'>Điện máy - Điện tử</div>
                        </div>
                    </a><a href='/dang-tin-77-Thoi-trang-Lam-dep'>
                        <div class='cate-group w20-md-w50-xs'>
                            <div class='fa fa-shopping-bag fa-2x' aria-hidden='true'></div>
                            <div class='cate-name'>Thời trang - Làm đẹp</div>
                        </div>
                    
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

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

@endsection
@extends('user.navbar')
<script src="https://697f684f1.vws.vegacdn.vn/rvn/init.js?v2018.10.15.7" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="{{ secure_asset('css/index.css') }}">
<link href="https://697f684f1.vws.vegacdn.vn/rvn/xem-tin.css?v2018.10.21.1" rel="stylesheet">
<style>
    .read-more-state {
            display: none;
        }

        .read-more-target {
            display: none;
            opacity: 0;
            max-height: 0;
            font-size: 0;
            transition: .25s ease;
        }

        .read-more-state:checked ~ .read-more-wrap .read-more-target {
            opacity: 1;
            font-size: inherit;
            max-height: 999em;
            display: inline;
        }

        .read-more-state ~ .read-more-trigger:after {
            content: 'Xem toàn bộ';
        }

        .read-more-state:checked ~ .read-more-trigger:after {
            content: 'Rút gọn';
        }
        .read-more-state:checked ~ .read-more-wrap .more-content {
            display: none;
        }
        .read-more-trigger {
            cursor: pointer;
            display: inline-block;
            padding: 0 .5em;
            line-height: 2;
            border: 1px solid #ddd;
            border-radius: .25em;
        }
    </style>
@section('pgContent')
<div id="pgContent" class="clearfix">

    <div class="clearfix"></div>


    <div id="pgDetail" class="container pgBody">
        <div class="detail-body rows">
            <div class="col-md-12">
                <div id="prloading">Loading...</div>
                <a id="LcAnchor" name=""></a>
                <ol class="breadcrumb">
                    <!--<li id="view_cate"><a href="/C-11-Nha-cua-Dat-dai">Nhà cửa - Đất đai</a></li>
                    <li id="view_subcate" class="active"><a href="/C-11-83-Nha-cua-Dat-dai-Mua-dat,-ban-dat">Mua đất,
                            bán đất</a></li>-->
                </ol>
            </div>
            <div class="rows">
                <div class="col-md-9">

                    <div class="page-header">
                        <h1 class="site-title">{{$post->title}}</h1>
                        <div class="sub-title">
                            <div><i class="fa fa-clock-o"></i> {{$post->created_at}}</div>
                            <div><i class="fa fa-eye"></i> {{$post->views}}</div>
                            <div><i class="fa fa-tag"></i> Mã tin {{$post->post_id}}</div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="page-content">
                        <blockquote>
                            <!--<div class="detail-img clearfix">
                                <div class="detail-img-border hidden-xs">
                                    <a href="https://raovat.sgp1.digitaloceanspaces.com/2018/10/21/6974417_87de3c8cc98e3dfe4f539923c8242bfc.jpg"
                                        data-gallery="lg6974417" data-type="image" data-toggle="lightbox" data-title=""
                                        title=""><img src="https://raovat.sgp1.digitaloceanspaces.com/2018/10/21/thumblg/6974417_87de3c8cc98e3dfe4f539923c8242bfc.jpg"
                                            class="img-thumbnail img-rounded" alt=""></a>
                                    <div class="highslide-caption"></div>
                                </div>
                                <div class="detail-img-border visible-xs">
                                    <a href="https://raovat.sgp1.digitaloceanspaces.com/2018/10/21/6974417_87de3c8cc98e3dfe4f539923c8242bfc.jpg"
                                        data-gallery="sm6974417" data-type="image" data-toggle="lightbox" data-title=""
                                        title=""><img src="/images/bin/thumbnail/2018/10/21/6974417_87de3c8cc98e3dfe4f539923c8242bfc.jpg"
                                            class="img-thumbnail img-rounded" alt=""></a>
                                    <div class="highslide-caption"></div>
                                </div>
                                <div class="detail-img-border hidden-xs">
                                    <a href="https://raovat.sgp1.digitaloceanspaces.com/2018/10/21/6974417_937512c4c51f9c7aaa544b187f4cfad9.jpg"
                                        data-gallery="lg6974417" data-type="image" data-toggle="lightbox" data-title=""
                                        title=""><img src="https://raovat.sgp1.digitaloceanspaces.com/2018/10/21/thumblg/6974417_937512c4c51f9c7aaa544b187f4cfad9.jpg"
                                            class="img-thumbnail img-rounded" alt=""></a>
                                    <div class="highslide-caption"></div>
                                </div>
                                <div class="detail-img-border visible-xs">
                                    <a href="https://raovat.sgp1.digitaloceanspaces.com/2018/10/21/6974417_937512c4c51f9c7aaa544b187f4cfad9.jpg"
                                        data-gallery="sm6974417" data-type="image" data-toggle="lightbox" data-title=""
                                        title=""><img src="/images/bin/thumbnail/2018/10/21/6974417_937512c4c51f9c7aaa544b187f4cfad9.jpg"
                                            class="img-thumbnail img-rounded" alt=""></a>
                                    <div class="highslide-caption"></div>
                                </div>
                            </div>-->
                            <p class="read-more-wrap">
                                {{ $post->content }}
                            </p>
                            <label for="post-1" class="btn btn-info margin5-top read-more-trigger" style="display: none;"><i
                                    class="fa fa-eye fa-fw"></i> </label>

                            <div class="clearfix"></div>
                            <footer class="postBy">Đăng bởi <b>{{ $name }}</b>
                            </footer>
                            <div class="clearfix"></div>
                        </blockquote>
                    </div>


                    <div class="site-details">
                        <div class="site-price">
                            <div class="rows clearfix">
                                <div class="col-xs-5 col-md-3">
                                    <i class="fa fa-tag fa-fw"></i><span class="dt">Lương</span>
                                </div>
                                <div class="col-xs-7 col-md-9 price-tag">
                                    {{ $post->salary }}
                                </div>

                            </div>
                        </div>

                        <div class="site-user-phone">
                            <div class="rows clearfix">
                                <div class="col-xs-5 col-md-3">
                                    <i class="fa fa-phone fa-fw"></i><span class="dt">Điện thoại</span>
                                </div>
                                <div class="col-xs-7 col-md-9 price-tag">
                                    0965001792
                                </div>

                            </div>
                        </div>
                        <!--<div class="site-user-address">
                            <div class="rows clearfix">
                                <div class="col-xs-5 col-md-3">
                                    <i class="fa fa-location-arrow fa-fw"></i><span class="dt">Địa chỉ</span>
                                </div>
                                <div class="col-xs-7 col-md-9 price-tag">
                                    <div></div>
                                    <div>Quận Đống Đa</div>
                                    <div>Hà Nội</div>
                                </div>

                            </div>
                        </div>-->
                        
                        <div class="site-user-info">
                            <div class="rows clearfix">
                                <div class="col-xs-5 col-md-3">
                                    <i class="fa fa-user fa-fw"></i><span class="dt">Địa chỉ</span>
                                </div>
                                <div class="col-xs-7 col-md-9 price-tag">
                                    {{ $post->address }}
                                </div>
                            </div>
                        </div>
                        <div class="site-user-info">
                            <div class="rows clearfix">
                                <div class="col-xs-5 col-md-3">
                                    <i class="fa fa-phone-square"></i><span class="dt"> Số điện thoại: </span>
                                </div>
                                <div class="col-xs-7 col-md-9 price-tag">
                                    {{ $post->phone }}
                                </div>
                            </div>
                            </div>
                        <div class="clearfix"></div>
                    </div>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="/bootstrap/dist/js/jquery.min.js"><\/script>')
</script>
<script src="https://697f684f1.vws.vegacdn.vn/rvn/index.js?v2018.10.15.7"></script>
<script src="https://697f684f1.vws.vegacdn.vn/rvn/xem-tin.js?v2018.10.21.1" type="text/javascript"></script>
@endsection
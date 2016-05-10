@extends('main')
@section('title')
Trang chủ
@endsection

@section('content')
<div id="home-sec" class="container">
        <div class="row row-pad clr-white">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                
                <img src="{{Asset('assets/img/shipper.png')}}" class="img-responsive main-img" data-scroll-reveal="enter from the left after 0.1s" />
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                <h1 data-scroll-reveal="enter from the right after 0.1s">Vận chuyển chưa bao giờ dễ dàng đến thế </h1>
                <p data-scroll-reveal="enter from the bottom after 0.2s">
                    Bạn đang cần chuyển đồ gấp? Bạn cần một dịch vụ vận chuyển uy tín? SNS là sự lựa chọn hoàn hảo cho bạn! Chỉ chưa đầy 5' là bạn đã có thể liên hệ vận chuyển.
                </p>
                <a href="{{Asset('/orders')}}"><button type="button" class="btn btn-lg btn-warning btn-block" data-scroll-reveal="enter from the bottom after 0.3s">ĐẶT ĐƠN NGAY</button></a>
                <h1 data-scroll-reveal="enter from the bottom after 0.4s">Tại sao bạn nên chọn chúng tôi?</h1>
                <br />
                <div id="specifications" class="carousel slide" style="min-height: 270px;" data-ride="carousel" data-scroll-reveal="enter from the bottom after 0.6s">



                    <div class="carousel-inner">
                        <div class="item active">
                            <ul class="media-list">

                                <li class="media">
                                    <a class="pull-left" href="#">
                                        <i class="fa fa-bolt icon-round"></i>
                                    </a>
                                    <div class="media-body">
                                        Đặt đơn nhanh chóng, thuận tiện
            
                                    </div>
                                </li>

                                <li class="media">
                                    <a class="pull-left" href="#">
                                        <i class="fa fa-code icon-round"></i>
                                    </a>
                                    <div class="media-body">
                                        Uy tín, đảm bảo
            
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="item a">
                            <ul class="media-list">

                                <li class="media">
                                    <a class="pull-left" href="#">
                                        <i class="fa fa-gavel icon-round"></i>
                                    </a>
                                    <div class="media-body">
                                        Hỗ trợ tích cực
            
                                    </div>
                                </li>

                                <li class="media">
                                    <a class="pull-left" href="#">
                                        <i class="fa fa-history icon-round"></i>
                                    </a>
                                    <div class="media-body">
                                        Chúng tôi đẹp trai
            
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="item ">
                            <ul class="media-list">
                                <li class="media">
                                    <a class="pull-left" href="#">
                                        <i class="fa fa-info icon-round"></i>
                                    </a>
                                    <div class="media-body">
                                        Rất đẹp trai
            
                                    </div>
                                </li>
                                <li class="media">
                                    <a class="pull-left" href="#">
                                        <i class="fa fa-recycle icon-round"></i>
                                    </a>
                                    <div class="media-body">
                                        Vô cùng đẹp trai
            
                                    </div>
                                </li>


                            </ul>
                        </div>
                    </div>
                    <ol class="carousel-indicators">
                        <li data-target="#specifications" data-slide-to="0" class="active"></li>
                        <li data-target="#specifications" data-slide-to="1" class=""></li>
                        <li data-target="#specifications" data-slide-to="2" class=""></li>
                    </ol>
                </div>

            </div>
        </div>

</div>
@endsection
@section('contact')
<div id="contact-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <h1 data-scroll-reveal="enter from the bottom after 0.1s">Contact Us</h1>
                    <p data-scroll-reveal="enter from the bottom after 0.2s">
                        Bạn có vấn đề với việc vận chuyển? Hoặc bạn muốn trở thành đối tác của chúng tôi. Hãy liên hệ ngay!
                    </p>
                    <form data-scroll-reveal="enter from the bottom after 0.3s">
                        <div class="form-group">
                            <input type="text" class="form-control" required="required" placeholder="Tên bạn/công ty" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" required="required" placeholder="Email của bạn" />
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" required="required" class="form-control" style="min-height: 50px;" placeholder="Nội dung"></textarea>
                        </div>
                        <div class="form-group">
                            <a href="#" class="btn btn-default ">GỬI</a>
                        </div>

                    </form>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4   col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-12">

                    <h1 data-scroll-reveal="enter from the bottom after 0.1s">Our Location</h1>
                    <div data-scroll-reveal="enter from the bottom after 0.3s">
                        <h4>144 Xuân Thủy, Cầu Giấy</h4>
                        <h4>Hà Nội</h4>
                        <h4><strong>Điện thoại:</strong>  0966099795 </h4>
                        <h4><strong>Email: </strong>abcdef@sns.com</h4>
                        <hr />
                        Rất vui khi được làm việc với bạn!
                        
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- /CONTACT SECTIO END  -->
@endsection
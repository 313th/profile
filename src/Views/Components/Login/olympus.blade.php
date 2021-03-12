<div class="d-flex justify-content-center col-12">
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <div class="ui-block">
            <div class="ui-block-title">
                <h4 class="title align-center">ورود به سامانه</h4>
            </div>
            <div class="ui-block-content">
                <form action="{{ route('login') }}" method="post" class="content">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"> نام کاربری</label>
                                <input name="username" class="form-control" placeholder="" type="text" required autofocus>
                            </div>
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"> رمز عبور</label>
                                <input class="form-control" placeholder="" type="password" name="password" required autocomplete="current-password">
                            </div>

                            <div class="remember">

                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox">
                                        مرا به خاطر بسپار
                                    </label>
                                </div>
{{--                                <a href="#" class="forgot">فراموش کردن رمز عبور</a>--}}
                            </div>

                            <button type="submit" class="btn btn-lg btn-primary full-width">ورود</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <p class="title align-center"><a href="{{ route('/') }}" target="_blank">{{ env('APP_NAME') }}</a></p>
    </div>
</div>

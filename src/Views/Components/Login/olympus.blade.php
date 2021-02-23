<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
    <div class="registration-login-form">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#home-1" role="tab">
                    <svg class="olymp-login-icon">
                        <use xlink:href="icons/icons.svg#olymp-login-icon"></use>
                    </svg>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#profile-1" role="tab">
                    <svg class="olymp-register-icon">
                        <use xlink:href="icons/icons.svg#olymp-register-icon"></use>
                    </svg>
                </a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane" id="home-12" role="tabpanel" data-mh="log-tab">
                <div class="title h6">ثبت‌نام در اولمپوس</div>
                <form class="content">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">نام</label>
                                <input class="form-control" placeholder="" type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">نام خانوادگی</label>
                                <input class="form-control" placeholder="" type="text">
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"> ایمیل</label>
                                <input class="form-control" placeholder="" type="email">
                            </div>
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"> رمز عبور</label>
                                <input class="form-control" placeholder="" type="password">
                            </div>

                            <div class="form-group date-time-picker label-floating">
                                <label class="control-label"> تاریخ تولد</label>
                                <input type="text" id="date2" name="test" data-ha-datetimepicker="#date2" data-ha-dp-forcesettime="true" data-ha-dp-issolar="true" data-ha-dp-resultinsolar="true" data-ha-dp-disabledWeekDays="2,3,7" data-ha-dp-resultformat="{day}/{month}/{year}" value="1/6/1395" />
                                <span class="input-group-addon">
                                                <svg class="olymp-calendar-icon">
                                                    <use xlink:href="icons/icons.svg#olymp-calendar-icon"></use>
                                                </svg>
                                            </span>
                            </div>

                            <div class="form-group label-floating is-select">
                                <label class="control-label"> جنسیت</label>
                                <select class="selectpicker form-control" size="auto">
                                    <option value="MA">مرد</option>
                                    <option value="FE">زن</option>
                                </select>
                            </div>

                            <div class="remember">
                                <div class="checkbox">
                                    <label>
                                        <input name="optionsCheckboxes" type="checkbox">
                                        من تمامی <a href="#">مقررات و شرایط </a> را خوانده‌ام و قبول دارم
                                    </label>
                                </div>
                            </div>

                            <a href="#" class="btn btn-purple btn-lg full-width">اتمام ثبت‌نام</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="tab-pane active" id="profile-12" role="tabpanel" data-mh="log-tab">
                <div class="title h6">ورود به اکانت</div>
                <form action="{{ route('login') }}" method="post" class="content">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"> ایمیل</label>
                                <input name="email" class="form-control" placeholder="" type="email" required autofocus>
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
                                <a href="#" class="forgot">فراموش کردن رمز عبور</a>
                            </div>

                            <a href="#" class="btn btn-lg btn-primary full-width">ورود</a>

                            <div class="or"></div>

                            <a href="#" class="btn btn-lg bg-facebook full-width btn-icon-left"><i class="fa fa-facebook"
                                                                                                   aria-hidden="true"></i>ورود با فیسبوک</a>

                            <a href="#" class="btn btn-lg bg-twitter full-width btn-icon-left"><i class="fa fa-twitter"
                                                                                                  aria-hidden="true"></i>ورود با توییتر</a>


                            <p>هنوز اکانت ندارید؟ <a href="#"> حالا ثبت‌نام کنید </a> زمان کمی می‌برد و کار
                                بسیار ساده‌ای است</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="title h4">{{$message}}</div>
<form action="{{ route('register') }}" method="post" class="content">
    @csrf
    <div class="row">
        <div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="form-group label-floating is-empty">
                <label class="control-label">نام</label>
                <input name="name" class="form-control" placeholder="" type="text">
            </div>
        </div>
        <div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="form-group label-floating is-empty">
                <label class="control-label">نام خانوادگی</label>
                <input name="family" class="form-control" placeholder="" type="text">
            </div>
        </div>
        <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="form-group label-floating is-empty">
                <label class="control-label">کدملی ده رقمی</label>
                <input name="username" class="form-control" type="text">
            </div>
            <div class="form-group date-time-picker label-floating">
                <label class="control-label">تاریخ تولد</label>
                @widget('datepicker',['name'=>"birth_date",'class'=>"form-control datepicker",'id'=>"birth-date", 'value'=>time()])
                <span class="input-group-addon">
                    <svg class="olymp-calendar-icon">
                        <use xlink:href="@asset('svg-icons/sprites/icons.svg#olymp-calendar-icon')"></use>
                    </svg>
                </span>
            </div>
            <button type="submit" class="btn btn-purple btn-lg full-width">شروع!</button>
        </div>
    </div>
</form>

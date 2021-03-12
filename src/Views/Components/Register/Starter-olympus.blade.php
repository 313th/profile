<div class="title h4">{{$message}}</div>
<form action="{{ route('register') }}" method="post" class="content">
    @csrf
    <div class="row">
        <div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="form-group label-floating is-empty @error('name') has-error @enderror">
                <label class="control-label">نام</label>
                <input name="name" class="form-control" placeholder="" type="text" value="{{ old('name') }}">
            </div>
            @error('name')
            <div class="alert alert-danger">
                <ul>
                    <li>
                        {{ $message }}
                    </li>
                </ul>
            </div>
            @enderror
        </div>
        <div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="form-group label-floating is-empty @error('family') has-error @enderror">
                <label class="control-label">نام خانوادگی</label>
                <input name="family" class="form-control" placeholder="" type="text" value="{{ old('family') }}">
            </div>
            @error('family')
            <div class="alert alert-danger">
                <ul>
                    <li>
                        {{ $message }}
                    </li>
                </ul>
            </div>
            @enderror
        </div>
        <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="form-group label-floating is-empty @error('username') has-error @enderror">
                <label class="control-label">کدملی ده رقمی </label>
                <input name="username" class="form-control" type="text" value="{{ old('username') }}">
            </div>
            @error('username')
            <div class="alert alert-danger">
                    @foreach ($errors->get('username') as $message)
                    <p>
                        {{ $message }}
                    </p>
                    @endforeach
            </div>
            @enderror
            <div class="form-group date-time-picker label-floating is-focused @error('birth_date') has-error @enderror">
                <label class="control-label">تاریخ تولد</label>
                @widget('datepicker',[
                'name'=>'birth_date',
                'class'=>"form-control datepicker",
                'id'=>"birth-date",
                'minDate'=>$minDate,
                'maxDate'=>$maxDate])
                <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </span>
                @error('birth_date')
                <div class="alert alert-danger">
                    @foreach ($errors->get('birth_date') as $message)
                        <p>
                            {{ $message }}
                        </p>
                    @endforeach
                </div>
                @enderror
                @error('birth_date_show')
                <div class="alert alert-danger">
                    @foreach ($errors->get('birth_date_show') as $message)
                        <p>
                            {{ $message }}
                        </p>
                    @endforeach
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-purple btn-lg full-width">شروع!</button>
        </div>
    </div>
</form>

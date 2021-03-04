<div class="author-page author vcard inline-items more">
    <div class="author-thumb">
        <img alt="author" src="@asset('img/author-page.jpg')" class="avatar">
        <span class="icon-status online"></span>
        <div class="more-dropdown more-with-triangle">
            <div class="mCustomScrollbar" data-mcs-theme="dark">
                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">حساب کاربری</h6>
                </div>
                <ul class="account-settings">
                    <li>
                        <a href="29-YourAccount-AccountSettings.html">
                            <svg class="olymp-menu-icon">
                                <use xlink:href="@asset('svg-icons/sprites/icons.svg#olymp-menu-icon')"></use>
                            </svg>
                            <span>تنظیمات پروفایل</span>
                        </a>
                    </li>
                    <li>
                        <a href="36-FavPage-SettingsAndCreatePopup.html">
                            <svg class="olymp-star-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="FAV PAGE">
                                <use xlink:href="@asset('svg-icons/sprites/icons.svg#olymp-star-icon')"></use>
                            </svg>

                            <span>ایجاد صفحه علاقه مندی ها</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <svg class="olymp-logout-icon">
                                <use xlink:href="@asset('svg-icons/sprites/icons.svg#olymp-logout-icon')"></use>
                            </svg>

                            <span>خروج</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <a href="02-ProfilePage.html" class="author-name fn">
        <div class="author-title">
            {{ \Illuminate\Support\Facades\Auth::user()->display_name }}<svg class="olymp-dropdown-arrow-icon">
                <use xlink:href="@asset('svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon')"></use>
            </svg>
        </div>
        <span class="author-subtitle">در حال ثبت‌نام</span>
    </a>
</div>

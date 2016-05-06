<ul class="nav nav-pills nav-stacked">
    <li role="presentation"><a href="/">На главную</a></li>
    <li role="presentation"><a href="{*{URL::login()}*}">Авторизация</a></li>
    <li role="presentation"><a href="{*{URL::logout()}*}">Выйти</a></li>
    <li role="presentation"><a href="">Регистрация</a></li>
    <li role="presentation"><a href="{URL::admin()}">Админка</a></li>
    {*{if isset($admin_button) && Arr::get($admin_button, 'admin_button')}
        <li role="presentation">
            <button type="button" class="btn btn-warning">
                <a href="*}{*{URL::admin()}*}{*">
                    Админка
                </a>
            </button>
        </li>

    {/if}*}
</ul>
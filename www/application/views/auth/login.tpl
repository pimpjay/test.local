{extends 'layout.tpl'}

{block 'content'}
    <form method="post" class="form-horizontal">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Электронная почта</label>
            <div class="col-sm-10">
                <input name="email" type="email" class="form-control" id="inputEmail3" placeholder="Почта">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
            <div class="col-sm-10">
                <input name="password" type="password" class="form-control" id="inputPassword3" placeholder="Пароль">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Запомнить меня
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Войти</button>
            </div>
        </div>
    </form>
{/block}
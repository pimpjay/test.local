<form method="post">
    <div class="text-justify">
        <p>Комментарии</p>
    </div>
    <div class="form-group {if Arr::get($errors, 'user')} has-error{/if}">
        <label for="user">
            Автор
        </label>
        {if Arr::get($errors, 'user')}
            <p><mark>{Arr::get($errors, 'user')}</mark></p>
        {/if}
        <input type="text" name="user" class="form-control" id="user" value="{$new_comment->user}" placeholder="">
    </div>
    <div class="form-group{if Arr::get($errors, 'message')} has-error{/if}">
        <label for="message">
            Сообщение
        </label>
        {if Arr::get($errors, 'user')}
            <p><mark>{Arr::get($errors, 'message')}</mark></p>
        {/if}
        <textarea  name="message"
                   class="form-control"
                   rows="4" id="message"
                   placeholder="">{$new_comment->message}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>
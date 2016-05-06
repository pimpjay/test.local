<form method="post">
    <div class="form-group{if Arr::get($errors, 'title')} has-error{/if}">
        <label for="title">Заголовок</label>
        {if Arr::get($errors, 'title')}
            <p><mark>{Arr::get($errors, 'title')}</mark></p>
        {/if}
        <input type="text" name="title" class="form-control" id="title" value="{$post->title}" placeholder="">
    </div>
    <div class="form-group{if Arr::get($errors, 'author')} has-error{/if}">
        <label for="author">Автор</label>
        {if Arr::get($errors, 'title')}
            <p><mark>{Arr::get($errors, 'author')}</mark></p>
        {/if}
        <input type="text" name="author" class="form-control" id="author" value="{$post->author}" placeholder="">
    </div>
    <div class="form-group{if Arr::get($errors, 'content_full')} has-error{/if}">
        <label for="content_full">Сообщение</label>
        {if Arr::get($errors, 'content_full')}
            <p><mark>{Arr::get($errors, 'content_full')}</mark></p>
        {/if}
        <textarea  name="content_full"
                   class="form-control"
                   rows="10" id="content_full"
                   placeholder="">{$post->content_full}</textarea>
    </div>
    <input type="hidden" name="date" value="{$smarty.now|date_format:"%Y-%m-%d %H:%M:%S"}">
    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>
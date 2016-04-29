<form method="post">
    <div class="form-group">
        <label for="title">Заголовок</label>
        <p><mark>{$title_error}</mark></p>
        <input type="text" name="title" class="form-control" id="title" value="{$post->title}" placeholder="">
    </div>
    <div class="form-group">
        <label for="author">Автор</label>
        <p><mark>{$author_error}</mark></p>
        <input type="text" name="author" class="form-control" id="author" value="{$post->author}" placeholder="">
    </div>
    <div class="form-group">
        <label for="content_full">Сообщение</label>
        <p><mark>{$content_error}</mark></p>
        <textarea  name="content_full" class="form-control" rows="10" id="content_full" placeholder="">{$post->content_full}</textarea>
    </div>
    <input type="hidden" name="date" value="{$smarty.now|date_format:"%Y-%m-%d %H:%M:%S"}">
    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>
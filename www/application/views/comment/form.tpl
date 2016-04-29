<form method="post">
    <div class="text-justify">
        <p>Комментарии</p>
    </div>
    <div class="form-group">
        <label for="user">Автор</label>
        <p><mark>{$user_error}</mark></p>
        <input type="text" name="user" class="form-control" id="user" value="" placeholder="">
    </div>
    <div class="form-group">
        <label for="message">Сообщение</label>
        <p><mark>{$message_error}</mark></p>
        <textarea  name="message" class="form-control" rows="4" id="message" placeholder=""></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>
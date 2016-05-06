{extends 'layout.tpl'}

{block 'content'}
    <div class="row">
        <div class="col-md-12">
            <h2>
                {$post->title}
            </h2>
            <p>
                {$post->content_full}
            </p>
            <p>
                {$post->author}
            </p>
            <p>
                {Date::fuzzy_span(strtotime($post->date))}
            </p>
            <p>
                Просмотров: {$post->views}
            </p>
            <a href="{URL::admin_post_update($post)}" class="btn btn-sm btn-info">
            Редактировать
            </a>
            <a href="{URL::admin_post_delete($post)}" class="btn btn-sm btn-danger">
            Удалить
            </a>
        </div>
        <div class="col-md-4 col-md-offset-4">
            {foreach $comments as $comment}
                <div>
                    <p>
                       Пользователь: {$comment->user}
                    </p>
                    <p>
                        Сообщение: {$comment->message}
                    </p>
                    <a href="{URL::admin_comment_delete($comment)}" class="btn btn-xs btn-danger">
                        Удалить
                    </a>
                </div>
            {/foreach}
        </div>
        <div class="col-md-4">
            {include 'comment/form.tpl'}
        </div>
    </div>
{/block}

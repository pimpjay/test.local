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
        </div>
        <div class="col-md-4 col-md-offset-4">
            {foreach $comments as $comment}
                <div>
                    <p>
                        Пользователь: <b>{$comment->user}</b>
                    </p>
                    <p>
                        Сообщение: <b>{$comment->message}</b>
                    </p>
                    <hr>
                </div>
            {/foreach}
        </div>
        <div class="col-md-4">
            {include 'comment/form.tpl'}
        </div>
    </div>
{/block}

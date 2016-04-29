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
                {$post->date}
            </p>
            <a href="/post/update/{$post->id}" class="btn btn-sm btn-info">
                Редактировать
            </a>
            <a href="/post/delete/{$post->id}" class="btn btn-sm btn-danger">
            Удалить
            </a>
        </div>
        <div class="col-md-4 col-md-offset-4">
            {foreach $comments as $comment}
                <div>
                    <p>
                        {$comment->user}
                    </p>
                    <p>
                        {$comment->message}
                    </p>
                    <a href="/comment/delete/{$comment->id}" class="btn btn-xs btn-danger">
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

{extends 'layout.tpl'}

{block 'content'}
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary" href="/post/create">Добавить пост</a>
            {foreach $posts as $post}
                <div>
                    <h2>
                        <a href="{URL::post($post)}">{$post->title}</a>
                    </h2>
                    <p>
                        {$post->content_full}
                    </p>
                    <p>
                        {$post->author}
                    </p>
                    <a href="/post/update/{$post->id}" class="btn btn-xs btn-info">
                        Редактировать
                    </a>
                    <a href="/post/delete/{$post->id}" class="btn btn-xs btn-danger">
                        Удалить
                    </a>
                </div>
            {/foreach}
        </div>
    </div>
{/block}
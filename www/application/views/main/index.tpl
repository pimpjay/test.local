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
                    <p class="col-md-4 col-md-offset-8">
                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true">
                            Просмотров: {$post->views}
                        </span>
                    </p>
                    <p class="col-md-4 col-md-offset-8">
                        <span class="glyphicon glyphicon-comment" aria-hidden="true">
                            Комментариев: {$post->comments->find_all()->count()}            {*изучить!*}
                        </span>
                    </p>
                </div>
            {/foreach}
        </div>
    </div>
{/block}
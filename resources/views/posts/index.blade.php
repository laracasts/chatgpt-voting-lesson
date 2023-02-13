@extends('layout')

<main class="space-y-6">
    @foreach ($posts as $post)
        <article class="overflow-hidden shadow sm:rounded-md">
            <div class="space-y-6 bg-white px-4 py-5 sm:p-6 prose">
                <h2>
                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </h2>

                <div>
                    {{ $post->body }}
                </div>
            </div>

            <footer class="text-gray-500 px-4 py-2">
                {{ $post->votes_count }} vote{{ $post->votes_count !== 1 ? 's' : '' }}
            </footer>
        </article>
    @endforeach
</main>

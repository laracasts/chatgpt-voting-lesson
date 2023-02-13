@extends('layout')

<main class="space-y-6">
    <article class="overflow-hidden shadow sm:rounded-md">
        <div class="space-y-6 bg-white px-4 py-5 sm:p-6 prose">
            <h2>
                {{ $post->title }}
            </h2>

            <div>
                {{ $post->body }}
            </div>

            <footer>
                <form action="{{ route('votes.store', ['postId' => $post->id]) }}" method="POST">
                    @csrf

                    <div class="flex">
                        <button type="submit" name="vote" value="up"
                                class="{{ $post->userVote === 'up' ? 'text-blue-500' : 'text-gray-500'  }} flex items-center px-3 py-2 text-sm font-medium border border-gray-300 rounded-l-md hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg class="w-5 h-5 mr-2 -ml-1 text-gray-400" fill="none" stroke-linecap="round"
                                 stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M5 15l7-7 7 7"/>
                            </svg>
                            Upvote ({{ $post->upvotes_count }})
                        </button>

                        <button type="submit" name="vote" value="down"
                                class="{{ $post->userVote === 'down' ? 'text-blue-500' : 'text-gray-500'  }} -ml-px flex items-center px-3 py-2 text-sm font-medium border border-gray-300 rounded-r-md hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg class="w-5 h-5 mr-2 -ml-1 text-gray-400" fill="none" stroke-linecap="round"
                                 stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M19 9l-7 7-7-7"/>
                            </svg>
                            Downvote ({{ $post->downvotes_count }})
                        </button>
                    </div>
                </form>

                <p>
                    <a href="/posts">back</a>
                </p>
            </footer>
        </div>
    </article>
</main>

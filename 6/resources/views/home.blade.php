@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center tracking-wider">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <p class="font-bold tracking-wider">投稿</p>
                </div>
                <div class="card-body">
                    <form action="{{ action('Admin\NewsController@tweet') }}" method="post"
                        enctype="multipart/form-data">

                        @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                            <p class="text-red-600 font-bold mb-2">{{ $e }}</p>
                            @endforeach
                        </ul>
                        @endif
                        <div class="form-group row">
                            <div class="w-full px-3 mx-auto">
                                <input type="text" class="form-control" placeholder="いまどうしてる？" name="body"
                                    value="{{ old('body') }}">
                            </div>
                        </div>
                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                        {{ csrf_field() }}
                        <input type="submit" class="btn bg-blue-500 text-white font-bold tracking-wider" value="つぶやく">
                    </form>
                </div>
            </div>

            <div class="card mt-10 tracking-wider">
                <div class="card-header">
                    <p class="font-bold">みんなのつぶやき</p>
                </div>
                @foreach($posts as $post)
                <div class="flex flex-col border-box mx-4 border-b border-gray-200">
                    @foreach($users as $user)
                    @if ($user->id == $post->user_id)
                    <div class="flex flex-row justify-between w-full py-3">
                        <div class="font-bold traking-wide">{{ $user->name }}</div>
                        @endif
                        @endforeach
                        <div class="font-bold">{{ $post->created_at->format('Y/m/d H:i') }}</div>
                    </div>
                    <div class="flex justify-between flex-row">
                        <div class="w-2/3 pt-2 pb-4">{{ $post->body }}</div>
                        @if ($post->user_id == Auth::user()->id)
                        <div class="my-auto">
                            <a class="text-red-600 cursor-pointer font-bold mr-4"
                                href="{{ action('Admin\NewsController@delete', ['id' => $post->id]) }}">消去</a>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
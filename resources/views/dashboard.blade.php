<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('profile.index') }}" method="get" class="flex items-baseline">
                        <input type="text" name="word"
                            class="mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            value="{{ $_SESSION['word'] }}">
                        <button type="submit" name="search"
                            class="bg-indigo-500 hover:bg-indigo-300 text-white font-bold py-2 px-4 mx-2 rounded">検索</button>
                    </form>

                    @foreach ($profiles as $profile)
                        <div class="flex mt-10 px-10 border border-gray-200 shadow">
                            <div class="flex-none w-64">
                                <img src="{{ asset('storage/' . $profile->image) }}"
                                    class="object-contain object-center w-64 h-64 relative top-3">
                            </div>
                            <div class="m-10">
                                <div class="font-bold text-lg">{{ $profile->name }}</div>
                                <div class="mt-3">{!! nl2br(e($profile->summary)) !!}</div>
                            </div>
                        </div>

                        @if (Auth::user()->id === 1)
                            <div class="m-3 mb-5 flex justify-start">
                                <a href="{{ route('profile.edit', ['id' => $profile->id]) }}"
                                    class="bg-indigo-500 hover:bg-indigo-300 text-white font-bold py-2 px-4 mx-2 rounded">編集</a>
                                <form action="{{ route('profile.destroy', ['id' => $profile->id]) }}" method="post">
                                    @csrf
                                    <button type="submit" onclick="return deleteCheck()"
                                        class="bg-indigo-500 hover:bg-indigo-300 text-white font-bold py-2 px-4 mx-2 rounded">削除</button>
                                </form>
                            </div>
                        @endif

                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteCheck() {
            if (window.confirm('本当に削除しますか？')) {
                return true;
            }
            return false;
        }
    </script>

</x-app-layout>

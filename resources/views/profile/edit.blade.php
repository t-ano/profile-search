<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            更新
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                
                    <form method="POST" action="{{ route('profile.update', ['id' => $profile->id]) }}" enctype="multipart/form-data">
                        @csrf
                                
                        <div>
                            <label>名前</label>
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $profile->name }}" required
                                autofocus />
                        </div>

                        <div class="mt-4">
                            <label>プロフィール</label>
                            <textarea class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="summary" cols="30" rows="7">{{ $profile->summary }}</textarea>
                        </div>

                        <div class="mt-4">
                            <label>画像</label>
                            <img src="{{ asset('storage/' . $profile->image)}}" class="object-contain object-center w-64 h-64">
                            <div class="flex">
                                <label
                                    class="w-32 bg-indigo-500 hover:bg-indigo-300 text-white font-bold py-2 px-4 rounded">
                                    <span class="mt-2 text-base leading-normal">ファイル選択</span>
                                    <input type='file' class="hidden" name="image" id="image" accept="image/*" />
                                </label>
                                <label id="fileName" class="m-2"></label>
                            </div>
                        </div>
                
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-indigo-500 hover:bg-indigo-300 text-white font-bold py-2 px-4 rounded">
                                登録
                            </button>
                        </div>
                        
                        <input type="hidden" name="current_image" value="{{ $profile->image }}">

                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('image').addEventListener('change', function () {
            const elem = document.getElementById('fileName');
            if (elem.innerHTML) {
                elem.removeChild(elem.childNodes.item(0));
            }
            const fileName = document.createTextNode(this.files[0].name);
            elem.appendChild(fileName);
        });
    </script>

</x-app-layout>
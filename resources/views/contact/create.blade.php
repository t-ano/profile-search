<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            お問い合わせ
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                
                    <form method="POST" action="{{ route('contact.store') }}" enctype="multipart/form-data">
                        @csrf
                                
                        <div class="mt-4">
                            <label>内容</label>
                            <textarea class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="content" cols="30" rows="7"></textarea>
                        </div>

                        <button type="submit" class="bg-indigo-500 hover:bg-indigo-300 text-white font-bold py-2 px-4 my-5 rounded">
                            送信
                        </button>                    
                    </form>

                    @if (isset($done))
                        <div>送信が完了しました。</div>
                        <a href=""></a>
                    @endif

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
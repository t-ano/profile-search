<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            問合せ一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-10/12 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead class="justify-between">
                                <tr class="bg-gray-800 whitespace-nowrap">
                                    <th class="px-5 py-2">
                                        <span class="text-gray-300">ユーザー名</span>
                                    </th>
                                    <th class="px-5 py-2">
                                        <span class="text-gray-300">メールアドレス</span>
                                    </th>
                                    <th class="px-5 py-2">
                                        <span class="text-gray-300">内容</span>
                                    </th>
                                    <th class="px-5 py-2">
                                        <span class="text-gray-300">送信日時</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="border">
                                @foreach ($contacts as $contact)
                                    <tr class="justify-between border-b">
                                        <td class="px-5 py-2">{{ $contact['name'] }}</td>
                                        <td class="px-5 py-2">{{ $contact['email'] }}</td>
                                        <td class="px-5 py-2">{{ $contact['content'] }}</td>
                                        <td class="px-5 py-2">{{ $contact['send_datetime'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
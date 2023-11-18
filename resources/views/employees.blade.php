<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{--<x-welcome />--}}
                <button type="submit" class="btn btn-primary">Create new employee</button>

                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Create new employee
                    </button>

                    <table>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--@foreach ($users as $user)--}}
                            <tr>
                                <td>{{-- $user->id --}}</td>
                                <td>{{-- $user->name --}}</td>
                                <td>{{-- $user->email --}}</td>
                            </tr>
                        {{--@endforeach--}}
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <form method="post" enctype="multipart/form-data"
                      action="{{ isset($company) ? route('companies.update', $company->id) : route('companies.store') }}">
                    @csrf

                    {{--<input type="text" name="id" value="{{ isset($company) ? $company->id : old('id') }}">--}}

                    <div class="mb-4">
                        @error('name')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                        <input type="text" name="name" id="name" class="border rounded w-full py-2 px-3" required
                               value="{{ isset($company) ? $company->name : old('name') }}">
                    </div>

                    <div class="mb-4">
                        @error('email')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                        <input type="email" name="email" id="email" class="border rounded w-full py-2 px-3" required
                               value="{{ isset($company) ? $company->email : old('email') }}">
                    </div>

                    @if(isset($company) && $company->logo)
                        <div class="mb-4">
                            <img src="{{ asset('logo/' . $company->logo) }}" alt="Company Logo" class="mb-2 max-w-full max-h-32">
                            <a href="{{ route('companies.delete_logo', ['id' => $company->id]) }}" type="button" class="inline-flex items-center mt-2 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Remove Logo
                            </a>
                        </div>
                    @else
                        <div class="mb-4">
                            @error('logo')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="logo" class="block text-gray-700 text-sm font-bold mb-2">Logo:</label>
                            <input type="file" name="logo" id="logo" class="border rounded w-full py-2 px-3"
                                   value="{{ isset($company) ? $company->logo : old('logo') }}">
                        </div>
                    @endif

                    <div class="mb-4">
                        <label for="website" class="block text-gray-700 text-sm font-bold mb-2">Website:</label>
                        <input type="url" name="website" id="website" class="border rounded w-full py-2 px-3"
                               value="{{ isset($company) ? $company->website : old('website') }}">
                    </div>

                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        @if(request()->routeIs('companies.create')) Create Company @endif
                        @if(request()->routeIs('companies.edit')) Save Company @endif
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

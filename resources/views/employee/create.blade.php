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
                      action="{{ isset($employee) ? route('employees.update', $employee->id) : route('employees.store') }}">
                    @csrf

                    {{--<input type="text" name="id" value="{{ isset($company) ? $company->id : old('id') }}">--}}

                    <div class="mb-4">
                        @error('first_name')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2">First Name:</label>
                        <input type="text" name="first_name" id="first_name" class="border rounded w-full py-2 px-3" required
                               value="{{ isset($employee) ? $employee->first_name : old('first_name') }}">
                    </div>

                    <div class="mb-4">
                        @error('last_name')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2">Last Name:</label>
                        <input type="text" name="last_name" id="last_name" class="border rounded w-full py-2 px-3" required
                               value="{{ isset($employee) ? $employee->last_name : old('last_name') }}">
                    </div>

                    <div class="mb-4">
                        <label for="company">Company:</label><br>
                        <select id="company" name="company" class="border rounded w-full py-2 px-3">
                            <option disabled selected>- select company -</option>
                            @foreach($companies as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        @error('email')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                        <input type="text" name="email" id="email" class="border rounded w-full py-2 px-3"
                               value="{{ isset($employee) ? $employee->email : old('email') }}">
                    </div>

                    <div class="mb-4">
                        @error('telephone')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <label for="telephone" class="block text-gray-700 text-sm font-bold mb-2">Telephone:</label>
                        <input type="text" name="telephone" id="telephone" class="border rounded w-full py-2 px-3"
                               value="{{ isset($employee) ? $employee->telephone : old('telephone') }}">
                    </div>

                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        @if(request()->routeIs('employees.create')) Create Employee @endif
                        @if(request()->routeIs('employees.edit')) Save Employee @endif
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

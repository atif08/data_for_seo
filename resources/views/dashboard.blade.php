<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
{{--                @dd($searches)--}}
            </div>
            <table id="example" class="table table-striped table-bordered bg-white overflow-hidden shadow-sm sm:rounded-lg" style="width:100%">
                <thead>
                <tr>
                    <th>Keyword</th>
                    <th>Device</th>
                    <th>Location</th>
                </tr>
                </thead>
                <tbody>
                @foreach($searches as $search)
                <tr>
                    <td><a href="{{route('searches.detail',$search->id)}}"> {{$search->keyword}}</a></td>
                    <td>{{$search->device}}</td>
                    <td>{{$search->location_code}}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Keyword</th>
                    <th>Device</th>
                    <th>Location</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</x-app-layout>

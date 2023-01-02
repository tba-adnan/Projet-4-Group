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
                    @can("isAdmin")

                    {{ __("  You have Admin Access") }}
                    @endcan
                    @can("isApprenant")

                    {{ __("You have Student Access") }}
                    @endcan
                    @can("isFormateur")

                    {{ __("You have Formateur Access") }}
                    @endcan                </div>
            </div>
        </div>
    </div>
</x-app-layout>

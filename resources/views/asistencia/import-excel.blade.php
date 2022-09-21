<x-app-layout>
    <div class="py-12">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="flex content-center bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <x-jet-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="p-4 w-full max-w-sm bg-white rounded-lg border border-gray-200 shadow-md sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                    
                    <form class="space-y-6" method="POST"  role="form"  action="{{ route('asistencia.saveimport') }}" enctype="multipart/form-data">
                        @csrf
                        <h5 class="text-xl font-medium text-gray-900 dark:text-white">Subir Archivos</h5>
                        <div>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white'" id="import" name="import" type="file">
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Importar</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
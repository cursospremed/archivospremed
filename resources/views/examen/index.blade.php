<x-app-layout>
    {{--<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Asistencias') }}
        </h2>
    </x-slot>--}}
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                
                
                <button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                    <a href="{{ route('examen.import') }}">Importar</a>
                </button>
                {{--<button type="button" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                    <a href="{{ route('curso.index') }}">Exportar</a>
                </button>--}}




                <!--Tabla Cursos-->
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-2 text-center">
                                    Nombre
                                </th>
                                {{--<th scope="col" class="px-4 py-2 text-center">
                                    Accion
                                </th>--}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($examenes as $examen)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="py-4 px-6 text-center">
                                        {{$examen->nombre}}
                                    </td>
                                    {{--<td class="py-4 px-6 text-center">
                                        <a href="{{ route('curso.index') }}" class=" font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                                    </td>--}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    <br>
                    {{$examenes->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

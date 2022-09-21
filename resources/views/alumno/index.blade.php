<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                
                
                <button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                    <a href="{{ route('alumno.import') }}">Importar</a>
                </button>

                <!--Tabla Cursos-->
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-2 text-center">
                                    Matricula
                                </th>
                                <th scope="col" class="px-4 py-2 text-center">
                                    Nombre
                                </th>
                                <th scope="col" class="px-4 py-2 text-center">
                                    Wp_user_id
                                </th>
                                <th scope="col" class="px-4 py-2 text-center">
                                    Accion
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alumnos as $alumno)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="py-4 px-6 text-center">
                                        {{$alumno->ID}}
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        {{$alumno->nombre}}
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        {{$alumno->wp_user_id}}
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <a href="{{ route('alumno.edit',$alumno->ID) }}" class=" font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    <br>
                    {{$alumnos->links()}}
                </div>
        </div>
    </div>
</x-app-layout>

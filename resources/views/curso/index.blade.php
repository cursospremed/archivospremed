<x-app-layout>
    <div class="py-12">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                
                <button class="inline-flex rounded-md border px-4 py-2 mb-4 bg-gray-400 text-base leading-6 font-medium text-white shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                    <a href="{{ route('curso.create') }}">Crear Curso</a> 
                </button>

                <!--Tabla Cursos-->
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-2 text-center">
                                    ID
                                </th>
                                <th scope="col" class="px-4 py-2 text-center">
                                    Nombre
                                </th>
                                {{--<th scope="col" class="px-4 py-2 text-center">
                                    Accion
                                </th>--}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cursos as $curso)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="py-4 px-6 text-center">
                                        {{$curso->ID}}
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        {{$curso->nombre}}
                                    </td>
                                    
                                    {{--<td class="py-4 px-6 text-center">    
                                        <a href="{{ route('curso.edit',$curso->ID) }}" class=" font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                                    </td>--}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

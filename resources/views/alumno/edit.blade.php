<x-app-layout>
    <div class="py-12">
        <div class="max-w-md my-auto mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <x-jet-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="p-4 w-full max-w-sm bg-white rounded-lg border border-gray-200 shadow-md sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                        
                        <form method="POST" class="space-y-6" action="{{ route('alumno.update',$alumno->ID) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            <div class="form-group">
                                <strong class="text-gray-900 dark:text-white">Matricula:</strong>
                                <h3 class="text-sm font-medium text-gray-900 dark:text-white">{{ $alumno->ID }}</h3>
                            </div>
                            <div class="form-group">
                                <strong class="text-gray-900 dark:text-white">Nombre:</strong>
                                <h3 class="text-sm font-medium text-gray-900 dark:text-white">{{ $alumno->nombre }}</h3>
                            </div>
                            <h5 class="text-xl font-medium text-gray-900 dark:text-white">Selecciona los cursos</h5>
                        
                            @foreach ($cursos as $curso)
                                <div class="flex items-center mr-4">
                                    {{Form::checkbox('cursos[]', $curso->ID)}}
                                    <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$curso->nombre}}</label>
                                </div>
                            @endforeach                                
                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
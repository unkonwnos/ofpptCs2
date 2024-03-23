@extends('layouts.master')

@section('content')
    

<x-main heading="Filiers" content="Filier" :publiee="$publieeFiliers" :trashed="$trashedFiliers" toRoute="filiers" :allPubliee="$allPubliee" :allTrashed='$allTrashed' :categorie="$categorie" :anneeFormation="$anneeFormation">

<x-slot name='thead'>
    <thead class="text-center border-b-2 border-solid border-gray-300">
        <tr>
            <th class="py-2">#</th>
            <th class="py-2">Nom</th>
            <th class="py-2">max Stg</th>
            <th class="py-2">Inscreption</th>
            <th class="py-2">Secteur</th>
            <th class="py-2">Annee F</th>
            <th class="py-2">Piece J</th>
            <th class="py-2">Visibility</th>
            <th class="py-2">Action</th>
        </tr>
    </thead>
</x-slot>

<x-slot name='tbody'>
<tbody class="text-center">
    @isset($publieeFiliers)
        
    @foreach ($publieeFiliers as $filier)
    <tr>
        <td class="py-2">{{$filier->id}}</td>
        <td class="py-2">{{$filier->titre}}</td>
        <td class="py-2">{{$filier->max_stagiaires}}</td>
        @if($filier->active === 1)
        <td class="py-2"> <span class='p-1 bg-green-700 text-white rounded-md'>active </span></td>
        @else
        <td class="py-2"><span class='p-1 bg-red-500 text-white rounded-md'>  not active</span></td>
        @endif
        <td class="py-2">{{$filier->Secteur->name}}</td>
        <td class="py-2">{{$filier->AnneeFormations->nom}}</td>
        <td class="py-2">{{count($filier->pieceJointes)}}</td>
          <td class="py-2 ">
           <form action="{{ route('filiers.cacher', $filier->id) }}" method="POST" class="mb-0">
                @csrf
                @method('POST')       
                @if($filier->visibility==='1')
                    <button class=" bg-green-700 rounded-lg px-1 text-white font-bold ">
                            <i class="fa-solid text-xl fa-check "></i>  
                            <span>public </span>
                    </button>
                @else
                    <button class="bg-red-600 rounded-lg p-1 text-white font-bold ">
                            <i class="fa-solid fa-x "></i>  
                            <span>prive </span>
                    </button>
                @endif
            </form>
        </td>
        <td class="py-2 flex items-center justify-center">
            <a href="{{ route('filiers.show', $filier->id)}}" class="mr-2">
                <i class="fa-solid fa-eye"></i>
            </a>
            <a href="{{ route('filiers.edit', $filier->id)}}" class="mr-2">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <form action="{{ route('filiers.destroy', $filier->id) }}" method="POST" class="mb-0">
                @csrf
                @method('DELETE')
            </form>
            <div class="mb-0" id={{$filier->id}}>
                <button class="delete">
                    <i class="fa-solid fa-trash"></i>    
                </button>
            </div>
        </td>
    </tr>    
    @endforeach
    @endisset
</tbody>
</x-slot>
</x-main>

@endsection
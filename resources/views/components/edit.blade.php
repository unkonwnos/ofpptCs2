<div class="p-8">
    <div class="flex items-center gap-2 text-gray-500">
        <i class="fa-solid fa-arrow-left text-sm"></i>
        <a href="{{ route($toRoute.'.index') }}" class="">Retour</a>
    </div>
    <h2 class="text-3xl my-10">Edit {{$content}}</h2>
    <form action="{{ route($toRoute.'.update', $item->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="grid grid-cols-[3fr_1fr] gap-6">
        <div>
            <div class="mb-4">
                <label for="titre">Titre</label>
                <input type="text" name="titre" id="titre" class="block border-[1px] border-solid border-gray-500 rounded w-full mt-4 py-1 px-2 outline-none" value="{{$item->titre}}">
           @error('titre')<div class="text-red-600">{{$message}}</div>@enderror
        </div>            
            <div class="mb-4">
                <label for="description">Description</label>
                <textarea rows="8" name="description" id="description" class="block border-[1px] border-solid border-gray-500 rounded w-full mt-4 py-1 px-2 outline-none">{{$item->details}}</textarea>
                @error('description')<div class="text-red-600">{{$message}}</div>@enderror
            </div>
            <div>
                <div id='container_imgs' class=' flex flex-wrap justify-between flex-one'>    
                    @foreach($item->pieceJointes as $i=> $pj)
                          <div  class="rounded-md border relative border-black bg-gray-50 shadow-md w-full">
                                <label for="upload{{$i}}" class="flex flex-col items-center gap-2 cursor-pointer">
                                    <img  class='w-[100px] h-[100px]' src="{{ asset('/images/'.$content.'/'.$pj->URL)  }}" alt="">
                                    <span class="text-gray-600 font-medium">{{$pj->URL}}</span>
                                </label>
                                <input id='upload{{$i}}' type="hidden" name='oldImages[]' value="{{$pj->id}}" class="hidden upload" />
                            <i class="fa-solid  fa-delete-left text-red-500 absolute removeFile cursor-pointer rounded-2xl m-1 px-1 right-0 top-0 hover:text-black hover:scale-110"></i>
                        </div>                 
                     @endforeach
                </div>
            </div>       
            <a type='button' id="btnAddImg" class=' bg-green-700 rounded-md p-1 w-full my-1 hover:bg-green-500 hover:font-bold text-center text-white cursor-pointer'>ajouter d'autre photo</a>
        </div>
        <div>
            {{$slot}}
        </div>
        </div>   
         <div class="mt-6 flex w-3/12 gap-2">
            <button class="bg-[#499352] py-1 flex-1 text-white rounded font-medium">Save</button>
            <a href="{{ route($toRoute.".index") }}" class="border-[1px] text-center border-solid border-black py-1 flex-1 rounded">Cancel</a>
         </div>
    </form>
</div>